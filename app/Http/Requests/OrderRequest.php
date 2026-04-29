<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'payment_method' => 'required|string|max:255',
            'status' => [
                'required',
                Rule::in(['pending', 'confirmed', 'shipping', 'completed', 'cancelled']),
            ],
            'reason_cancel' => 'nullable|required_if:status,cancelled|string|max:255',
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Họ và tên không được để trống',
            'customer_name.max' => 'Họ và tên không được vượt quá 255 ký tự',
            'customer_phone.required' => 'Số điện thoại không được để trống',
            'customer_phone.max' => 'Số điện thoại không được vượt quá 255 ký tự',
            'customer_email.required' => 'Email không được để trống',
            'customer_email.max' => 'Email không được vượt quá 255 ký tự',
            'customer_address.required' => 'Địa chỉ không được để trống',
            'customer_address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'payment_method.required' => 'Phương thức thanh toán không được để trống',
            'payment_method.max' => 'Phương thức thanh toán không được vượt quá 255 ký tự',
            'status.required' => 'Trạng thái không được để trống',
            'status.in' => 'Trạng thái không hợp lệ',
            'reason_cancel.required_if' => 'Lý do huỷ đơn không được để trống',
            'reason_cancel.string' => 'Lý do huỷ đơn phải là chuỗi',
            'reason_cancel.max' => 'Lý do huỷ đơn không được vượt quá 255 ký tự',
        ];
    }
}
