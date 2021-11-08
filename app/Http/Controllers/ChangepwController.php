<?php

namespace App\Http\Controllers;

use App\Models\Changepw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Hashing\BcryptHasher;

class ChangepwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.changepw.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Changepw  $changepw
     * @return \Illuminate\Http\Response
     */
    public function show(Changepw $changepw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Changepw  $changepw
     * @return \Illuminate\Http\Response
     */
    public function edit(Changepw $changepw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Changepw  $changepw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Changepw $changepw)
    {
        $password_news = bcrypt($request->password_new);
        $user = User::find($request->id);
        $hasher = app('hash');
        if ($hasher->check($request->password_old, $user->password)) {
            $request->merge(['password' => $password_news]);
            $changepw->update($request->only('password'));
            return redirect()->route('changepw.index')->with('success', 'Thay đổi mật khẩu thành công!');
        } else {
            return back()->with('error', 'Mật khẩu không đúng!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Changepw  $changepw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Changepw $changepw)
    {
        //
    }
}
