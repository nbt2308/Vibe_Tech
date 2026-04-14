<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status;
        $query = Brand::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        if($request->has('status') && $status !== null && $status !== ''){
            $query->where('status', $status);
        }

        $brands = $query->latest()->withCount('products')
                        ->paginate(5) 
                        ->withQueryString();

        $brands_status_true = Brand::where('status', 1)->count();
        $brands_status_false= Brand::where('status', 0)->count();
        //select count(*) from products join brands on products.brand_id = brands.id
        $brands_linked_products = Product::join('brands', 'products.brand_id', '=', 'brands.id')->count();
        return view("admin.brands.index", compact("brands", "brands_status_true", "brands_status_false", "brands_linked_products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        
        $duongDanAnh = null;
        if ($request->hasFile('logo')) {
            $duongDanAnh = $request->file("logo")->store("brand-image", "public");
        }
        Brand::create([
            "name" => $request->name,
            "description" => $request->description,
            "status"=> $request->status,
            "logo" => $duongDanAnh
        ]);
        return redirect()->back()->with('success', 'Thêm thương hiệu mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, $id)
    {
        

        $brand = Brand::findOrFail($id);
        $duongDanAnh = $brand->logo;
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                if (Storage::disk('public')->exists($brand->logo)) {
                    Storage::disk('public')->delete($brand->logo);
                }
            }
            $duongDanAnh = $request->file("logo")->store("brand-image", "public");
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->logo = $duongDanAnh;
        $brand->save();
        return redirect()->back()->with('success', 'Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.delete', compact('brand'));
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        if($brand->logo){
            Storage::disk('public')->delete($brand->logo);
        }
        return redirect()->back()->with('success', 'Xóa thương hiệu thành công');
    }
}
