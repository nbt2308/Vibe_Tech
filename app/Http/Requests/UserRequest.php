<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $userId = $this->input('id');
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');
        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email'=> [
                $isUpdate?'nullable':'required',
                'string',
                'max:255',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => ['required', 'string','regex:/^(0|84|\+84)(3|5|7|8|9)([0-9]{8})$/', Rule::unique('users', 'phone')->ignore($userId),],
            'password'=> [
                $isUpdate?'nullable':'required',
                'string',
                'max:255',
                'min:8',
            ],
            'status'=> [
                'required',
                'in:1,0',
            ],
            'address'=>['string', 'max:255'],
        ];
        return $rules;
    }

    public function messages(): array{
        return [
            'name.required' => 'Tên người dùng không được để trống.',
            'name.max' => 'Tên người dùng không được vượt quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự.',
            'password.min' => 'Mật khẩu phải lớn hơn hoặc bằng 8 ký tự.',
            'password.confirmed' => 'Mật khẩu không khớp.',
            'user_type.required' => 'Loại người dùng không được để trống.',
            'user_type.in' => 'Loại người dùng không hợp lệ.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];
    }
}
