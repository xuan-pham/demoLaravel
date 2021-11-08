<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|unique:product,name,'. request()->id,
            'description' => 'required',
            'price'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không để trống',
            'description.required'=>'Mô tả sản phẩm ko được để trống',
            'price.required'=>'Giá sản phẩm không được để trống',
            'name.unique' => 'Sản phẩm này đã có trong CSDL'
        ];
    }
}
