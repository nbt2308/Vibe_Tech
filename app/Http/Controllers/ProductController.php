<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $products = $query->latest()->with('category','brand')
                            ->paginate(5)
                            ->appends(['search' => $keyword]); 
        $category = Category::all();
        $brand = Brand::all();
        return view("admin.products.index", compact("products","category","brand"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands=Brand::all();
        return view('admin.products.create', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|decimal:0,2',
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=> 'required|boolean',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $duongDanAnh = null;
        if ($request->hasFile('thumbnail')) {
            $duongDanAnh = $request->file("thumbnail")->store("product-thumbnail", "public");
        }

        $product=Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "stock_quantity" => $request->stock_quantity,
            "category_id" => $request->category_id,
            "brand_id" => $request->brand_id,
            "thumbnail" => $duongDanAnh,
            "status" => $request->status,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('product_galleries', 'public');
                
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path
                ]);
            }
        }
        return redirect()->back()->with('success', 'Thêm sản phẩm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
