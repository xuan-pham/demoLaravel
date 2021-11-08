<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Account\StoreRequest;

class AccountController extends Controller
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
        $data = Account::search()->paginate(5);
        return view('admin.account.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.account.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        if (Account::create($request->all())) {
            return redirect()->route('account.index')->with('success', 'Thêm mới tài khoản thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

        $roles = role::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.account.edit', compact('roles', 'account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $passwords = $account->password;
        $request->merge(['password' => $passwords]);
        if ($account->update($request->all())) {
            return redirect()->route('account.index')->with('success', 'Sửa thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
