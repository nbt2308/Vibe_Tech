<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug, Request $request)
    {
        $query = Product::query()->where('status', 1);
        if ($request->has('brand_id')) {
            $query->whereIn('brand_id', $request->brand_id);
        }
        if( $request->has('sort')) {
            $sort = explode('|', $request->sort);
            $query->orderBy($sort[0], $sort[1]);
        }
        if ($request->has('price_range')) {
            $ranges = $request->price_range;

            $query->where(function ($q) use ($ranges) {
                foreach ($ranges as $range) {
                    // Tách chuỗi "0-1000000" thành mảng [0, 1000000]
                    $parts = explode('-', $range);

                    if (count($parts) == 2) {
                        $min = $parts[0];
                        $max = $parts[1];

                        if ($max > 0) {
                            //1-2tr, 2-3tr ,.... không có sale_price thì lọc price(giá gốc)
                            $q->orWhereRaw('COALESCE(sale_price, price) BETWEEN ? AND ?', [$min, $max]);
                        } else {
                            //trên 10 tr
                            $q->orWhereRaw('COALESCE(sale_price, price) >= ?', [$min]);
                        }
                    }
                }
            });
        }
        $category = Category::where('slug', $slug)->firstOrFail();
        $breadcrumbs = [
            ['label' => $category->name]
        ];
        $products = $query->where('category_id', $category->id)->where('status', 1)->paginate(12);
        return view('user.categories.show', compact('category', 'products', 'breadcrumbs'));
    }
}
