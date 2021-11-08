@extends('layouts/admin');
@section('title', 'Edit Account');
@section('main')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content">
        {{-- url('admin/category/create') --}}
        <form action="{{ route('account.update', $account->id) }}" method="POST" role="form">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <input type="text" hidden name="id" value="{{ $account->id }}" id="">
                   
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                            name="name" placeholder="Tên tài khoản..." value="{{ $account->name }}" autofocus>
                        @error('name')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror"
                            placeholder="Email tài khoản..." value="{{ $account->email }}">
                        @error('email')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Address</label>
                        <input type="text" name="address" placeholder="Địa chỉ người dùng..."
                            value="{{ $account->address }}" class="form-control ">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="{{ $account->roleList->id }}">{{ $account->roleList->name }}</option>
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
                        <input type="number" name="phone" class="form-control" value="{{ $account->phone }}"
                            placeholder="Số điện thoại người dùng...">
                        @error('phone')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Status</label>
                        <br>
                        <input type="radio" name="status" value="1" checked><Strong>Public</Strong> &nbsp;
                        <input type="radio" name="status" value="0"><Strong>Private</Strong>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Password</label>
                        <input type="password" name="password_id" value="*************" class="form-control "
                            disabled placeholder="Mật khẩu tài khoản...">
                        
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
