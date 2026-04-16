<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\isFalse;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status;
        $perPage = $request->per_page ?? 5;
        $query = Category::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        if($request->has('status') && $status !== null && $status !== ''){
            $query->where('status', $status);
        }
        $categories = $query->latest()->withCount('products')
                            ->paginate($perPage) 
                            ->withQueryString(); 
        //tổng danh mục
        $category_total = Category::count();
        $categories_status_true = Category::where('status', 1)->count();
        $categories_status_false= Category::where('status', 0)->count();
        //select count(*) from products join categories on products.category_id = categories.id
        $categories_linked_products = Product::join('categories', 'products.category_id', '=', 'categories.id')->count();
        //select count(*) from products join categories on products.category_id = categories.id where products.category_id = categories.id
        
        return view("admin.categories.index", compact("categories", "categories_status_true","categories_status_false", "categories_linked_products", "category_total"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        

        $duongDanAnh = null;
        if ($request->hasFile('thumbnail')) {
            $duongDanAnh = $request->file("thumbnail")->store("category-image", "public");
        }

        Category::create([
            "name" => $request->name,
            "description" => $request->description,
            "status"=> $request->status,
            "thumbnail" => $duongDanAnh,
        ]);
        return redirect()->back()->with('success', 'Thêm danh mục mới thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        

        $category = Category::findOrFail($id);
        $duongDanAnh = $category->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($category->thumbnail) {
                if (Storage::disk('public')->exists($category->thumbnail)) {
                    Storage::disk('public')->delete($category->thumbnail);
                }
            }
            $duongDanAnh = $request->file("thumbnail")->store("category-image", "public");
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->thumbnail = $duongDanAnh;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $category = Category::find($id);
        return view('admin.categories.delete', compact('category'));
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if($category->thumbnail){
            Storage::disk('public')->delete($category->thumbnail);
        }
        return redirect()->back()->with('success', 'Xóa danh mục thành công');
    }
}
