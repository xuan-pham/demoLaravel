@extends('layouts/admin');
@section('title', 'Create New Blog');
@section('main')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content">
        {{-- url('admin/category/create') --}}
        <form action="{{ route('blog.store') }}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-9">
                    <input type="text" name="account_id" hidden value="{{Auth::user()->id}}" id="">

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Title</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                            name="name" placeholder="Mời bạn nhập tiêu đề..." autofocus>
                        @error('name')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Description</label>
                        <textarea name="description" id="content"
                            class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
                        @error('description')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Detail</label>
                            <textarea name="sumaty" id="", class="form-control @error('price') is-invalid @enderror" cols="30" rows="10"></textarea>
                        @error('sumaty')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrioty" class="form-label">Image</label>
                        <input type="file" class="form-control @error('file_uploads') is-invalid @enderror"
                            id="exampleInputimage" name="file_uploads">
                        @error('file_uploads')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="radio" name="status" hidden value="1" checked>
                </div>
            </div>
            <a href="{{ route('blog.index') }}"><button type="button" class="btn btn-primary"><i
                        class="nav-icon fas fa-chevron-circle-left"></i> <span>Back List</span> </button></a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('js')
    <script src="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#content').summernote({
                height: 250,
                placeholder: "Mô tả chi tiết sản phẩm"
            });
        });
    </script>
@endsection
