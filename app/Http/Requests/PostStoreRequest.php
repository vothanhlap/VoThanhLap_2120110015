<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
            'metakey' => 'required',
            'metadesc' => 'required',
            'detail' => 'required',
            'image' => 'required',
            'top_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tên bài viết.',
            'title.min' => 'Tên có ít nhất 2 ký tự.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả bài viết.',
            'detail.required' => 'Chưa có tiết bài viết',
            'image.required' => 'Chưa có chọn hình',
            'top_id.required' => 'Chưa có chủ đề',
        ];
    }
}
