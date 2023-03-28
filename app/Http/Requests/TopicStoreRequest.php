<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicStoreRequest extends FormRequest
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
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tên.',
            'title.min' => 'Tên có ít nhất 2 ký tự.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả.',
        ];
    }
}
