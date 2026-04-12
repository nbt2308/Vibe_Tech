<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $query = Category::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $categories = $query->latest() 
                            ->paginate(5) 
                            ->appends(['search' => $keyword]); 
        return view("admin.categories.index", compact("categories"));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $duongDanAnh = null;
        if ($request->hasFile('thumbnail')) {
            $duongDanAnh = $request->file("thumbnail")->store("category-image", "public");
        }

        Category::create([
            "name" => $request->name,
            "description" => $request->description,
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

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
