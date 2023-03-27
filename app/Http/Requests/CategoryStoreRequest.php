<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2|unique:vtl_category',
            'metakey' => 'required',
            'metadesc' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'name.min' => 'Tên có ít nhất 2 ký tự.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả.',
            //Tùy chỉnh hiển thị thông báo không thõa điều kiện
            'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2MB',

        ];
    }
}
