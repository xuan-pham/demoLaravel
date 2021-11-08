@extends('layouts/admin');
@section('title', 'Edit Category');
@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content">
        {{-- url('admin/category/create') --}}
        <form action="{{ route('category.update', $category->id) }}" method="POST" role="form">
            {{ csrf_field() }}
            @method('PUT')
            <input type="text" name="id" hidden value="{{ $category->id }}">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname" name="name"
                    placeholder="Mời bạn nhập tên danh mục..." value="{{ $category->name }}" autofocus>
                @error('name')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Status</label>
                <br>
                <input type="radio" name="status" value="1" checked><Strong>Public</Strong> &nbsp;
                <input type="radio" name="status" value="0"><Strong>Private</Strong>
            </div>
            <div class="mb-3">
                <label for="exampleInputPrioty" class="form-label">Prioty</label>
                <input type="number" class="form-control @error('prioty') is-invalid @enderror" id="exampleInputprioty"
                    value="{{ $category->prioty }}" name="prioty">
                @error('prioty')
                    <div class="alert">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('category.index') }}"><button type="button" class="btn btn-primary"><i
                        class="nav-icon fas fa-chevron-circle-left"></i> <span>Back List</span> </button></a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
