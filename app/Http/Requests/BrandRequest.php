<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
        $newLogo = null;
        if ($this->hasFile('logo')) {
            $newLogo = $this->file('logo');
        }


        $this->merge([
            'new_logo' => $newLogo
        ]);
    }
    public function rules(): array
    {
        $brandId = $this->input('id');
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands', 'name')->ignore($brandId),
            ],
            'description' => 'required|string|max:255',
            'status' => 'required|in:1,0'
        ];
        if ($this->isMethod('post') && !$brandId) {
            $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
        } else {
            $rules['new_logo'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048';
        }
        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên thương hiệu không được để trống.',
            'name.unique' => 'Tên thương hiệu đã tồn tại.',
            'name.max' => 'Tên thương hiệu không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả thương hiệu không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'logo.required' => 'Ảnh đại diện thương hiệu không được để trống.',
            'logo.image' => 'Ảnh đại diện thương hiệu phải là file ảnh.',
            'logo.mimes' => 'Ảnh đại diện thương hiệu phải có định dạng jpeg, png, jpg, gif.',
            'logo.max' => 'Ảnh đại diện thương hiệu không được vượt quá 2MB.',
            'new_logo.image' => 'Ảnh đại diện thương hiệu phải là file ảnh.',
            'new_logo.mimes' => 'Ảnh đại diện thương hiệu phải có định dạng jpeg, png, jpg, gif.',
            'new_logo.max' => 'Ảnh đại diện thương hiệu không được vượt quá 2MB.'
        ];
    }
}   
