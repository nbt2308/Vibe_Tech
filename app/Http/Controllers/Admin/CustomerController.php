<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

     public function index(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status;
        $perPage = $request->per_page ?? 5;
        $query = User::query()->where('user_type', 0);

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }
        if ($request->has('status') && $status !== null && $status !== '') {
            $query->where('status', $status);
        }
        
        $customers = $query->latest()->with('orders')
            ->paginate($perPage)
            ->withQueryString();
        //tổng người dùng
        $customer_total = User::where('user_type', 0)->count();
        //user còn hoạt động
        $customer_status_true = User::where('user_type', 0)->where('status', 1)->count();
        //user ngưng hoạt động
        $customer_status_false = User::where('user_type', 0)->where('status', 0)->count();
        return view("admin.customers.index", compact("customers", "customer_total", "customer_status_true", "customer_status_false"));
    }
}
