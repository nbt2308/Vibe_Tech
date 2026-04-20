<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeTemplateRequest extends FormRequest
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
    public function rules(): array
    {
        $templateId = $this->input('id');   
        $rules = [
            'display_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('attribute_templates', 'display_name')->ignore($templateId),
            ],
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'display_name.required' => 'Tên hiển thị không được để trống.',
            'display_name.max' => 'Tên hiển thị không được vượt quá 255 ký tự.',
            'display_name.unique' => 'Tên hiển thị đã tồn tại.',
        ];
    }
}
