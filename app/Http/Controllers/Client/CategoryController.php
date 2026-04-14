<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy sản phẩm thuộc category đó
        $products = Product::where('category_id', $category->id)->where('status', 1)->paginate(10);
        return view('user.categories.show', compact('category', 'products'));
    }
}
