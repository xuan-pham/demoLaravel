@extends('layouts/admin');
@section('title', 'Edit Banner');
@section('main')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content">
        {{-- url('admin/category/create') --}}
        <form action="{{ route('banner.update',$banner->id) }}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method("PUT")
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                            name="name" value='{{$banner->name}}' placeholder="Mời bạn nhập tiêu đề..." autofocus>
                        @error('name')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Description</label>
                        <textarea name="description" id="content"
                            class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{$banner->description}}</textarea>
                        @error('description')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputPrioty" class="form-label">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror"
                            id="exampleInputimage" name="link" value="{{$banner->link}}" placeholder="Mời bạn nhập link của banner">
                        @error('link')
                            <div class="alert">{{ $message }}</div>
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
            <a href="{{ route('banner.index') }}"><button type="button" class="btn btn-primary"><i
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
                placeholder: "Mời bạn nhập mô tả"
            });
        });
    </script>
@endsection
