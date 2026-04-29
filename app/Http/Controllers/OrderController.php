<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart_items;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->search;
        $status = $request->status;
        $perPage = $request->per_page ?? 5;
        $query = Order::query();
        if ($keyword) {
            $query->where('order_code', 'like', "%{$keyword}%")
                ->orWhere('customer_name', 'like', "%{$keyword}%")
                ->orWhere('customer_email', 'like', "%{$keyword}%")
                ->orWhere('customer_phone', 'like', "%{$keyword}%")
                ->orWhere('customer_address', 'like', "%{$keyword}%");
        }
        if ($status) {
            $query->where('status', $status);
        }
        //lấy danh sách đơn hàng kèm sản phẩm của đơn hàng
        $orders = $query->latest()->with('orderDetails.product', 'updatedByUser')->paginate($perPage);

        //tổng đơn hàng
        $totalOrders = Order::count();
        //tổng đơn hàng chờ xác nhận
        $pendingOrders = Order::where('status', 'pending')->count();
        //tổng đơn hàng đã xác nhận
        $confirmedOrders = Order::where('status', 'confirmed')->count();
        //tổng đơn hàng đang giao
        $shippingOrders = Order::where('status', 'shipping')->count();
        //tổng đơn hàng đã hoàn thành
        $completedOrders = Order::where('status', 'completed')->count();
        //tổng đơn hàng đã hủy
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        return view("admin.orders.index", compact('orders', 'totalOrders', 'pendingOrders', 'confirmedOrders', 'shippingOrders', 'completedOrders', 'cancelledOrders'));
    }

    public function orderHistory(Request $request)
    {
        $status = $request->status;
        $perPage = $request->per_page ?? 5;
        $query = Order::query();

        if ($status) {
            $query->where('status', $status);
        }
        //lấy danh sách đơn hàng kèm sản phẩm của đơn hàng
        $orders = $query->where('user_id', auth()->id())->latest()->with('orderDetails.product', 'updatedByUser')->paginate($perPage);

        $breadcrumbs = [
            ['label' => 'Lịch sử đơn hàng'],
        ];
        return view("user.order.index", compact('orders', 'breadcrumbs'));
    }

    public function getDataForPayment()
    {
        $cart = Carts::where('user_id', auth()->id())->with('cart_items.product')->first();
        $items = $cart ? $cart->cart_items : collect();
        $breadcrumbs = [
            ['label' => 'Thanh toán'],
        ];
        return view("user.order.payment", compact('breadcrumbs', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => ['required', 'string','regex:/^(0|84|\+84)(3|5|7|8|9)([0-9]{8})$/'],
            'customer_email' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            ]
        );
        $cart = Carts::where('user_id', auth()->id())->with('cart_items.product')->first();
        if (!$cart || $cart->cart_items->isEmpty()) {
            return redirect()->route('home')->with('error', 'Giỏ hàng của bạn đang trống!');
        }
        try {
            $subTotal = 0;
            foreach ($cart->cart_items as $item) {
                $price = $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price;
                $subTotal += $price * $item->quantity;
            }

            $shippingFee = ($subTotal >= 500000) ? 0 : 30000;

            $totalAmount = $subTotal + $shippingFee;

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_code' => 'DH' . strtoupper(uniqid()),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'sub_total' => $subTotal,
                'shipping_fee' => $shippingFee,
                'total_amount' => $totalAmount,
                'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            foreach ($cart->cart_items as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price
                ]);

                // Trừ số lượng trong kho
                $item->product->decrement('stock_quantity', $item->quantity);
            }

            // Xóa giỏ hàng
            $cart->cart_items()->delete();

            return redirect()->route('home')->with('success', 'Đặt hàng thành công, đơn hàng của bạn sẽ được xử lý sớm nhất!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, $id)
    {
        //
        $order = Order::where('id', $id)->with('orderDetails.product')->first();
        $oldStatus = $order->status;
        $newStatus = $request->status;


        if ($oldStatus === $newStatus) {
            return back()->with('error', 'Trạng thái đơn hàng không thay đổi!');
        }


        $validMoves = [
            'pending' => ['confirmed', 'cancelled'],
            'confirmed' => ['shipping'],
            'shipping' => ['completed'],
            'completed' => [],
            'cancelled' => [],
        ];

        // kiểm tra trạng thái hiện tại có nằm trong ds trạng thái có thể đi tiếp k
        // kiểm tra trạng thái mới có nằm trong ds trạng thái có thể đi tiếp của trạng thái hiện tại k
        if (!isset($validMoves[$oldStatus]) || !in_array($newStatus, $validMoves[$oldStatus])) {

            if ($newStatus === 'cancelled' && $oldStatus !== 'pending') {
                return back()->with('error', 'Đơn hàng đã được xử lý, không thể hủy ở giai đoạn này!');
            }

            return back()->with('error', 'Chuyển đổi trạng thái không hợp lệ (không được chuyển ngược hoặc nhảy bậc).');
        }

        try {
            if ($newStatus === 'cancelled') {
                foreach ($order->orderDetails as $item) {
                    $item->product->increment('stock_quantity', $item->quantity);
                }
                $order->updated_by = auth()->id();
                $order->updated_by_user_type = 1;
                $order->reason_cancel = $request->reason_cancel;
            }

            $order->status = $newStatus;
            $order->updated_at = now();
            $order->save();
            return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    //huỷ đơn của khách
    public function cancelOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->with('orderDetails.product')
            ->where('user_id', auth()->id())
            ->firstOrFail();


        $cancelableStatuses = ['pending', 'confirmed', 'shipping'];

        // Kiểm tra trạng thái hiện tại
        if (!in_array($order->status, $cancelableStatuses)) {
            return back()->with('error', 'Rất tiếc, đơn hàng này đã qua giai đoạn có thể huỷ.');
        }

        // Tiến hành cập nhật trạng thái huỷ
        $order->update([
            'status' => 'cancelled',
            'reason_cancel' => $request->reason_cancel,
            'updated_at' => now(),
            'updated_by' => auth()->id(),
            'updated_by_user_type' => 0,
        ]);
        foreach ($order->orderDetails as $item) {
            $item->product->increment('stock_quantity', $item->quantity);
        }

        return back()->with('success', 'Huỷ đơn hàng thành công!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
