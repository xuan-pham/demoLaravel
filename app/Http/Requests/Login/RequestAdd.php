<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdd extends FormRequest
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
            
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email phải đúng định dạng có @.gmail.com',
            'phone.required' => 'Số điện thoại không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}
