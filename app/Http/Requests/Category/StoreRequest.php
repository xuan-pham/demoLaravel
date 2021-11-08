<?php

namespace App\Http\Requests\Category;

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
            'prioty' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không để trống',
            'prioty.required' => 'Thứ tự ưu tiên không được để trống',
            'name.unique' => 'Danh mục này đã có trong CSDL'
        ];
    }
}
