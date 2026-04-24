<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        //Tổng doanh thu
        $total_revenue = Order::where('status', 'completed')->sum('total_amount');
        //product số lượng cần nhập
        $product_stock_less_10 = Product::where('stock_quantity', '<', 10)->count();
        //Khách hàng mới (top 5)
        $recentCustomers = User::where('user_type', 0)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        //đơn hàng mới(top 5)
        $recentOrders = Order::orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();
        // Doanh thu theo tháng
        $currentYear = date('Y');
        $revenueData = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_amount) as total_revenue')
        )
            ->whereYear('created_at', $currentYear)
            ->where('status', 'completed')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_revenue', 'month')
            ->toArray();
        $monthlyRevenue = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyRevenue[$i] = $revenueData[$i] ?? 0;
        }

        // Doanh thu theo danh mục
        $categoryData = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed') // Chỉ tính các đơn hàng đã hoàn thành
            ->select(
                'categories.name',
                DB::raw('SUM(orders.total_amount) as total_revenue')
            )
            ->groupBy('categories.id', 'categories.name')
            ->get();

        $labels = $categoryData->pluck('name')->toArray();
        $values = $categoryData->pluck('total_revenue')->toArray();
        return view('admin.dashboard.index', compact('monthlyRevenue', 'labels', 'values', 'total_revenue', 'product_stock_less_10', 'recentCustomers', 'recentOrders'));
    }
    public function users()
    {
        return view('admin.users.index');
    }
    public function products()
    {
        return view('admin.products.index');
    }
    public function categories()
    {
        return view('admin.categories.index');
    }
    public function brands()
    {
        return view('admin.brands.index');
    }



}
