<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
            'metakey' => 'required',
            'metadesc' => 'required',
            'detail' => 'required',
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
            'top_id.required' => 'Chưa có chủ đề',
        ];
    }
}
