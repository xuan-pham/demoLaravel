<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;



class AdminController extends Controller
{
  
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email phải đúng định dạng @gmail.com',
                'password.required'=>"Mật khẩu không được để trống"
            ]
        );
        if ( Auth::attempt($credentials = ['email' => $request->email, 'password' => $request->password, 'status' => 1],$remember=true)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác!');
        }
    }
    public function register()
    {
        return view('admin.register');
    }
    public function postregister(Request $request)
    {
        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        if (Account::create($request->all())) {
            return redirect()->route('login')->with('success', 'Thêm mới tài khoản thành công!');
        }
    }
    public function forgot()
    {
        return view('admin.forgot');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
