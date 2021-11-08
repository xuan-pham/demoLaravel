<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:category',
            'description' => 'required',
            'price'=>'required',
            'file_uploads'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không để trống',
            'description.required'=>'Mô tả sản phẩm ko được để trống',
            'price.required'=>'Giá sản phẩm không được để trống',
            'file_uploads.required'=>'Hình ảnh không được để trống',
            'name.unique' => 'Sản phẩm này đã có trong CSDL'
        ];
    }
}
