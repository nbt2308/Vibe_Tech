<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
         $rules = [
            'comment_content' => 'required|string|min:5|max:1000',
            'comment_rating' => 'nullable|integer|min:1|max:5',
        ];
        return $rules;
    }
    public function messages(): array
    {
        return [
            'comment_content.required' => 'Nội dung bình luận không được để trống.',
            'comment_content.min' => 'Nội dung bình luận phải có ít nhất 5 ký tự.',
            'comment_content.max' => 'Nội dung bình luận không được vượt quá 1000 ký tự.',
            'comment_rating.integer' => 'Đánh giá phải là số nguyên.',
            'comment_rating.min' => 'Đánh giá tối thiểu là 1 sao.',
            'comment_rating.max' => 'Đánh giá tối đa là 5 sao.',
        ];
    }
}
