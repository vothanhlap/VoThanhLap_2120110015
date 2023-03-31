<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'link' => 'required',
            'position' => 'required',
       
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'name.min' => 'Tên có ít nhất 2 ký tự.',
            'link.required' => 'Bạn chưa nhập link.',
            'position.required' => 'Bạn chưa nhập posistion.',
        ];
    }
}
