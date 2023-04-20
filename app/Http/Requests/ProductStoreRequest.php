<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'detail' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price_buy' => 'required|numeric',
            'image' => 'required',
            'number' => 'required|numeric',
        
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm.',
            'name.min' => 'Tên có ít nhất 2 ký tự.',
            'detail.required' => 'Bạn chưa nhập chi tiết sản phẩm.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả sản phẩm.',
            'category_id.required' => 'Chưa chọn danh mục sản phẩm',
            'brand_id.required' => 'Chưa chọn thương hiệu sản phẩm.',
            'image.required' => 'Vui lòng chọn hinh.',
            'price_buy.required' => 'Vui lòng nhập giá',
            'number.required' => 'Vui lòng nhập số lượng',
            'number.numeric' => 'Dữ liệu nhập phải có dạng chữ số.',
            'price_buy.numeric' => 'Dữ liệu nhập phải có dạng chữ số.',
           

        ];
    }
}
