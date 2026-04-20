<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AttributeTemplates;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
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
        $category = Category::where('status', 1)->get();
        $brand = Brand::where('status', 1)->get();

        return view('user.products.index', compact('products', 'category', 'brand'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $breadcrumbs = [
            ['label' => $product->category->name, 'url' => route('categories.show', $product->category->slug)],
            ['label' => $product->name]
        ];
        $attributeLabels = AttributeTemplates::pluck('display_name', 'name')->toArray();

        $comments = Comment::with(['user', 'product'])
                    ->where('product_id', $product->id)
                    ->where('comment_status', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(2);
        
        return view('user.products.show', compact('product', 'breadcrumbs', 'attributeLabels','comments'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $keyword = trim($keyword);
        $query = Product::query()->where('status', 1);

        if (empty($keyword)) {
            return redirect()->route('home');
        }
        else{
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $products = $query->latest()->with('category', 'brand', 'productImages')
            ->paginate(12)
            ->withQueryString();
        $category = Category::where('status', 1)->get();
        $brand = Brand::where('status', 1)->get();
        $breadcrumbs = [
            ['label' => 'Tìm kiếm'],
        ];
        return view('user.products.search', compact('products', 'category', 'brand', 'breadcrumbs'));

    }
}
