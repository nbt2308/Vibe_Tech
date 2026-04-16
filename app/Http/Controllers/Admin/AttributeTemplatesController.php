<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeTemplateRequest;
use App\Models\AttributeTemplates;
use Illuminate\Http\Request;

class AttributeTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->search;
        $perPage = $request->per_page ?? 5;
        $query = AttributeTemplates::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        
        $attributeTemplates = $query->latest()
                            ->paginate($perPage) 
                            ->withQueryString(); 
           
        
        return view("admin.templates.index", compact("attributeTemplates"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeTemplateRequest $request)
    {
        //
         AttributeTemplates::create([
            "display_name" => $request->display_name,
        ]);
        return redirect()->back()->with('success', 'Thêm thuộc tính thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributeTemplates $attributeTemplates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeTemplates $attributeTemplates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeTemplateRequest $request, $id)
    {
        //
        $attribute = AttributeTemplates::findOrFail($id);
        $attribute->update([
            "display_name" => $request->display_name,
        ]);
        return redirect()->back()->with('success', 'Cập nhật thuộc tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $attribute = AttributeTemplates::find($id);
        return view('admin.templates.delete', compact('attribute'));
    }
    public function destroy($id)
    {
        //
        $attribute = AttributeTemplates::findOrFail($id);
        $attribute->delete();
        return redirect()->back()->with('success', 'Xóa thuộc tính thành công');
    }
}
