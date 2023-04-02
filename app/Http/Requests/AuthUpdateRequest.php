<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|min:8',
            'password' => 'required|min:8',
            'email' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'Tên đăng nhập không được bỏ trống.',
            'username.min' => 'Tên đăng nhập  nhất 8 ký tự.',
            'password.required' => 'Mật khẩu không được bỏ trống.',
            'password.min' => 'Tên đăng nhập  nhất 8 ký tự.',
        ];
    }
}
