<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status;
        $categoryFilter = $request->category_id;
        $query = Product::query()->where('status', 1);

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        if ($request->has('status') && $status !== null && $status !== '') {
            $query->where('status', $status);
        }
        if ($categoryFilter && $categoryFilter !== null) {
            $query->where('category_id', $categoryFilter);
        }
        $products = $query->latest()->with('category', 'brand', 'productImages')
            ->paginate(2)
            ->withQueryString();
        $category = Category::all();
        $brand = Brand::all();
        return view('user.home.index', compact('products', 'category', 'brand'));
    }
}
