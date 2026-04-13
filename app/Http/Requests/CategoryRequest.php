<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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


        $this->merge([
            'new_thumbnail' => $newThumbnail
        ]);
    }
    public function rules(): array
    {
        $categoryId = $this->input('id');
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($categoryId),
            ],
            'description' => 'required|string|max:255'
        ];

        if ($this->isMethod('post')) {
            $rules['thumbnail'] = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
        } else {
            $rules['new_thumbnail'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048';
        }

        return $rules;
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không được để trống.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'description.required' => 'Mô tả danh mục không được để trống.',
            'thumbnail.required' => 'Ảnh đại diện danh mục không được để trống.',
            'thumbnail.image' => 'Ảnh đại diện danh mục phải là file ảnh.',
            'thumbnail.mimes' => 'Ảnh đại diện danh mục phải có định dạng jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Ảnh đại diện không được vượt quá 2MB.'
        ];
    }
}
