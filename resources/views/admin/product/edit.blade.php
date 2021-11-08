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
        <form action="{{ route('product.update',$product->id) }}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <input type="text" name="id" hidden value="{{ $product->id }}">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                            name="name" placeholder="Mời bạn nhập tên sản phẩm..." value="{{$product->name}}" autofocus>

                        @error('name')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Description</label>
                        <textarea name="description" id="content"
                            class="form-control @error('description') is-invalid @enderror"  cols="30" rows="10">{{$product->description}}</textarea>
                        @error('description')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Image List</label>
                        <input type="file" multiple id="img[]" name="image_lists[]"  class="form-control ">
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="{{$product->cat->id}}">{{$product->cat->name}}</option>
                            <option>--------------------------------</option>
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Giá của sản phẩm" value="{{$product->price}}">
                        @error('price')
                            <div class="alert ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Sale Price</label>
                        <input type="number" name="sale_price"
                            class="form-control" placeholder="Giảm giá sản phẩm" value="{{$product->sale_price}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrioty" class="form-label">Image</label>
                        <input type="file" class="form-control"
                            id="exampleInputimage" name="file_uploads">

                        @error('file_uploads')
                            <div class="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Status</label>
                        <br>
                        @if ($product->status == 1)
                        <input type="radio" name="status"  value="1" checked ><Strong>Public</Strong> &nbsp;
                        <input type="radio" name="status" value="0" ><Strong>Private</Strong>
                        @else
                        <input type="radio" name="status"  value="1" ><Strong>Public</Strong> &nbsp;
                        <input type="radio" name="status" value="0" checked><Strong>Private</Strong>
                        @endif
                        
                    </div>
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
