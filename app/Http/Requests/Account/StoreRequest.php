<?php

namespace App\Http\Requests\Account;

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
            'name' => 'required',
            'email' => 'required|email|unique:account',
            'phone' => 'required',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên tài khoản không để trống',
            'role.required' => 'Phân quyền không được để trống',
            'email.unique' => 'Email đã có trong CSDL',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email phải đúng định dạng có @.gmail.com',
            'phone.required' => 'Số điện thoại không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'confirm_password.required' => 'Nhập lại mật khẩu',
            'confirm_password.same' => 'Nhập lại mật khẩu không chính xác',
        ];
    }
}
