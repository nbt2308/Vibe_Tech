<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */

    protected function prepareForValidation()
    {
        $newThumbnail = null;
        if ($this->hasFile('thumbnail')) {
            $newThumbnail = $this->file('thumbnail');
        }

        $newGallery = [];
        if ($this->has('gallery')) {
            foreach ($this->gallery as $item) {
                if ($item instanceof \Illuminate\Http\UploadedFile) {
                    $newGallery[] = $item;
                }
            }
        }


        $this->merge([
            'new_thumbnail' => $newThumbnail,
            'new_gallery' => $newGallery,
        ]);
    }
    public function rules(): array
    {
        // Khai báo các rule dùng chung cho cả Thêm và Sửa
        $productId = $this->input('id');
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($productId),
            ],
            'sku' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'sku')->ignore($productId),
            ],
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|decimal:0,2',
            'sale_price'=> 'nullable|numeric|min:0|decimal:0,2|lt:price',
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'status' => 'required|in:1,0',
            'discount_percent' => 'nullable|numeric|between:0,100',
        ];


        if ($this->isMethod('post') && !$productId) {
            $rules['thumbnail'] = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
        } else {
            $rules['new_thumbnail'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048';

        }

        $rules['new_gallery.*'] = 'image|mimes:jpeg,png,jpg,webp|max:2048';

        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'sku.required' => 'Mã sản phẩm không được để trống.',
            'sku.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
            'sku.unique' => 'Mã sản phẩm đã tồn tại.',
            'description.required' => 'Mô tả sản phẩm không được để trống.',
            'price.numeric' => 'Giá gốc phải là số.',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'sale_price.numeric' => 'Giá giảm phải là số.',
            'sale_price.min' => 'Giá giảm phải lớn hơn hoặc bằng 0.',
            'sale_price.lt' => 'Giá giảm phải nhỏ hơn giá gốc.',
            'stock_quantity.required' => 'Số lượng tồn kho không được để trống.',
            'stock_quantity.min' => 'Số lượng tồn kho phải lớn hơn hoặc bằng 0.',
            'category_id.required' => 'Danh mục sản phẩm không được để trống.',
            'category_id.exists' => 'Danh mục sản phẩm không hợp lệ.',
            'brand_id.required' => 'Thương hiệu sản phẩm không được để trống.',
            'brand_id.exists' => 'Thương hiệu sản phẩm không hợp lệ.',
            'status.required' => 'Trạng thái sản phẩm không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'discount_percent.numeric'=> 'Giảm giá phải là số.',
            'discount_percent.between'=> 'Giảm giá phải từ 0 đến 100%',
            'thumbnail.required' => 'Ảnh đại diện sản phẩm không được để trống.',
            'thumbnail.image' => 'Ảnh đại diện phải là file ảnh.',
            'thumbnail.mimes' => 'Ảnh đại diện phải có định dạng jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Ảnh đại diện không được vượt quá 2MB.',
            'gallery.image' => 'Ảnh gallery phải là file ảnh.',
            'gallery.mimes' => 'Ảnh gallery phải có định dạng jpeg, png, jpg, webp.',
            'gallery.max' => 'Ảnh gallery không được vượt quá 2MB.',
        ];
    }

}
