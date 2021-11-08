@extends('layouts/admin');
@section('title', 'Create New Account');
@section('main')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content">
        {{-- url('admin/category/create') --}}
        <form action="{{ route('account.store') }}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                            name="name" placeholder="Tên tài khoản..." autofocus>

                        @error('name')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email tài khoản...">
                        @error('email')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Address</label>
                        <input type="text" name="address" placeholder="Địa chỉ người dùng..." class="form-control ">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option>--SELECT ONE--</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control" placeholder="Số điện thoại người dùng...">
                        @error('phone')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Mật khẩu tài khoản...">
                        @error('password')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password"
                            class="form-control @error('confirm_password') is-invalid @enderror"
                            placeholder="Xác minh lại mật khẩu...">
                        @error('confirm_password')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="radio" hidden name="status" value="1" checked>
                    </div>
                </div>
            </div>
            <a href="{{ route('account.index') }}"><button type="button" class="btn btn-primary"><i
                        class="nav-icon fas fa-chevron-circle-left"></i> <span>Back List</span> </button></a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@endsection
