<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart_items;
use App\Models\Carts;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $cart = Carts::where('user_id', auth()->id())->with('cart_items.product')->first();
        $items = $cart ? $cart->cart_items : collect();
        $breadcrumbs = [
            ['label' => 'Giỏ hàng'],
        ];

        return view('user.cart.index', compact('items', 'breadcrumbs'));
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
    public function store(CartRequest $request, $productId)
    {
        //
        $product = Product::findOrFail($productId);
        $finalPrice = ($product->sale_price > 0) ? $product->sale_price : $product->price;


        $userId = Auth::user()->id;
        $cart = Carts::firstOrCreate(
            ['user_id' => $userId],
            ['created_at' => now()]
        );
        $cartItem = Cart_items::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();
        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $cartItem = Cart_items::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $request->quantity,
                'price' => $finalPrice,
            ]);
        }
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carts $carts)
    {
        //
    }

    public function changeQuantity(CartRequest $request, $cartItem_id)
    {
        $cartItem = Cart_items::findOrFail($cartItem_id);
        $stock = $cartItem->product->stock_quantity;
        $currentQuantity= (int) $cartItem->quantity;
        // dd($request->all());

        $newQuantity= (int) $request->quantity;
        if ($newQuantity!== $cartItem->quantity) {
            
            if($newQuantity < 1){
                $cartItem->delete();
                return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
            }
            if($newQuantity > $stock){
                return redirect()->back()->with('error', 'Số lượng không được vượt quá số lượng tồn kho!');
            }
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
            return redirect()->back()->with('success', 'Đã cập nhật số lượng!');
        } 

        if($request->has('action')) {
            if ($request->action == 'increase') {
                if ($currentQuantity < $stock) {
                    $cartItem->increment('quantity');
                }
                else{
                    return redirect()->back()->with('error', 'Số lượng không được vượt quá số lượng tồn kho!');
                }
            } elseif($request->action == 'decrease') {
                if($currentQuantity > 1){
                    $cartItem->decrement('quantity');
                }
                else{
                    $cartItem->delete();
                    return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
                }
            }
        }
         return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carts $carts)
    {
        //
    }

    public function delete($cartItem_id)
    {
        $cartItem = Cart_items::findOrFail($cartItem_id);
        $cartItem->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
}
