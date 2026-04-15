<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status;
        $categoryFilter = $request->category_id;
        $perPage = $request->per_page ?? 5;
        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('sku', 'LIKE', '%' . $keyword . '%');
        }
        if ($request->has('status') && $status !== null && $status !== '') {
            $query->where('status', $status);
        }
        if ($categoryFilter && $categoryFilter !== null) {
            $query->where('category_id', $categoryFilter);
        }
        $products = $query->latest()->with('category', 'brand', 'productImages')
            ->paginate($perPage)
            ->withQueryString();
        $category = Category::where('status',1)->get();
        $brand = Brand::where('status',1)->get();

        //product còn bán
        $product_status_true = Product::where('status', 1)->count();
        //product số lượng <10
        $product_stock_less_10 = Product::where('stock_quantity', '<', 10)->count();
        //product hết hàng
        $product_status_false = Product::where('status', 0)->count();
        return view("admin.products.index", compact("products", "category", "brand", "product_status_true", "product_stock_less_10", "product_status_false"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $duongDanAnh = null;
        if ($request->hasFile('thumbnail')) {
            $duongDanAnh = $request->file("thumbnail")->store("product-thumbnail", "public");
        }

        $product = Product::create([
            "name" => $request->name,
            "sku" => $request->sku,
            "description" => $request->description,
            "price" => $request->price,
            "sale_price" => $request->sale_price,
            "stock_quantity" => $request->stock_quantity,
            "category_id" => $request->category_id,
            "brand_id" => $request->brand_id,
            "thumbnail" => $duongDanAnh,
            "status" => $request->status,
            "discount_percent"=> $request->discount_percent
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
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        //
        try {

            //Validate nếu người dùng không up ảnh mới thì thumbnail và gallery sẽ là string
            $newThumbnail = [];
            $newGallery = [];
            if ($request->has('thumbnail')) {
                if ($request->thumbnail instanceof \Illuminate\Http\UploadedFile) {
                    $newThumbnail[] = $request->thumbnail;
                }

            }
            if ($request->has('gallery')) {
                foreach ($request->gallery as $item) {
                    if ($item instanceof \Illuminate\Http\UploadedFile) {
                        $newGallery[] = $item;
                    }
                }
            }
            $request->merge(['new_thumbnail' => $newThumbnail]);
            $request->merge(['new_gallery' => $newGallery]);
            $request->validate([
                'new_thumbnail.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
                'new_gallery.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
            ]);

            $product = Product::findOrFail($id);
            $duongDanAnh = $product->thumbnail;
            if ($request->hasFile('thumbnail')) {
                if (Storage::disk('public')->exists($product->thumbnail)) {
                    Storage::disk('public')->delete($product->thumbnail);
                }
                $duongDanAnh = $request->file("thumbnail")->store("product-thumbnail", "public");
            }

            $product->update([
                "name" => $request->name,
                "sku" => $request->sku,
                "description" => $request->description,
                "price" => $request->price,
                "sale_price" => $request->sale_price,
                "stock_quantity" => $request->stock_quantity,
                "category_id" => $request->category_id,
                "brand_id" => $request->brand_id,
                "thumbnail" => $duongDanAnh,
                "status" => $request->status,
                "discount_percent"=> $request->discount_percent
            ]);

            $keptImages = [];

            if ($request->has('gallery')) {
                foreach ($request->gallery as $item) {
                    if (is_string($item)) {
                        $relativePath = str_replace(asset('storage') . '/', '', $item);
                        $keptImages[] = $relativePath;
                    }
                }
            }


            $imagesToDelete = ProductImage::where('product_id', $product->id)
                //lấy ds ảnh ngoại trừ các ảnh đã có trong kept
                ->whereNotIn('image_path', $keptImages)
                ->get();

            foreach ($imagesToDelete as $img) {
                if (Storage::disk('public')->exists($img->image_path)) {
                    Storage::disk('public')->delete($img->image_path);
                }
                $img->delete();
            }


            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $image) {
                    if ($image->isValid()) {
                        $path = $image->store('product_galleries', 'public');

                        ProductImage::create([
                            'product_id' => $product->id,
                            'image_path' => $path
                        ]);
                    }
                }
            }
            return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Product::find($id);
        return view('admin.products.delete', compact('product'));
    }
    public function destroy($id)
    {
        try {
            // Xóa thumbnail
            $product = Product::findOrFail($id);
            if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
                Storage::disk('public')->delete($product->thumbnail);
            }

            // Xóa gallery images
            foreach ($product->productImages as $image) {
                if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
                $image->delete();
            }

            $product->delete();

            return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm: ' . $e->getMessage());
        }
    }
}
