@extends('layouts/admin');
@section('title', 'Create New Product');
@section('main')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="content">
        {{-- url('admin/category/create') --}}
        <form action="{{ route('product.store') }}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                            name="name" placeholder="Mời bạn nhập tên sản phẩm..." autofocus>

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
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Image List</label>
                        <input type="file" multiple id="img[]" name="image_lists[]" class="form-control ">
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option>--SELECT ONE--</option>
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Giá của sản phẩm">
                        @error('price')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Sale Price</label>
                        <input type="number" name="sale_price"
                            class="form-control @error('sale_price') is-invalid @enderror" value="0" placeholder="Giảm giá sản phẩm">
                        @error('sale_price')
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
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Status</label>
                        <br>
                        <input type="radio" name="status" value="1" checked><Strong>Public</Strong> &nbsp;
                        <input type="radio" name="status" value="0"><Strong>Private</Strong>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="exampleInputPrioty" class="form-label">Prioty</label>
                        <input type="number" class="form-control @error('prioty') is-invalid @enderror"
                            id="exampleInputprioty" name="prioty" placeholder="Thứ tự ưu tiên của sản phẩm">

                        @error('prioty')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div> --}}
                </div>
            </div>
            <a href="{{ route('product.index') }}"><button type="button" class="btn btn-primary"><i
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
