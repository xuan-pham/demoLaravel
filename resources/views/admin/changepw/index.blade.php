@extends('layouts/admin')
@section('title', 'Change Password');
@section('main')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="content">
{{-- url('admin/category/create') --}}
<form action="{{route('changepw.update',Auth::user()->id)}}" method="POST" role="form">
    {{ csrf_field() }}
    @method('PUT')
    <div class="mb-3">
        <input type="text" hidden name="id" value=" {{Auth::user()->id}}">
        <label for="exampleInputName" class="form-label">old password</label>
        <input type="text" class="form-control @error('password_old') is-invalid @enderror" id="exampleInputname" name="password_old"
            placeholder="Mời bạn nhập mật khẩu cũ..." autofocus>
        @error('password_old')
            <div class="alert ">{{ $message }}</div>
        @enderror
    </div>
    <hr>
    
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">new password</label>
        <input type="text" class="form-control @error('password_new') is-invalid @enderror" id="exampleInputname" name="password_new"
            placeholder="Mời bạn nhập mật khẩu mới..." autofocus>
        @error('password_new')
            <div class="alert ">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">confirm password</label>
        <input type="text" class="form-control @error('password_confirm') is-invalid @enderror" id="exampleInputname" name="password_confirm"
            placeholder="Mời bạn nhập lại mật khẩu..." autofocus>
        @error('password_confirm')
            <div class="alert ">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection