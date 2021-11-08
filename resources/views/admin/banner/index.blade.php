<head>
    <style>
        .paginateAdmin {
            display: flex;
            justify-content: center;
        }

    </style>
</head>
@extends('layouts/admin');
@section('title', 'Banner List')

@section('main')
    <form action="" class="form-inline">
        <div class="form-group">
            {{-- <label class="sr-only" for="">label</label> --}}
            <input type="text" class="form-control" name="keySearch" id="" placeholder="Tên danh mục...">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form>
    <hr>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Link</th>
                <th scope="col">Status</th>
                <th scope="col">Created Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="text-center">
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ url('public/uploads/banner') }}/{{ $item->image }}" style="height: 40px;width:50px"></td>
                    <td>{{$item->link}}</td>
                    <td>
                        @if ($item->status == 0)
                            <span class="badge badge-danger">Private</span>
                        @else
                            <span class="badge badge-success">Publish</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('banner.edit', $item->id) }}" class="mr-3 btn btn-primary "><i
                                class="fas fa-edit"></i></a>
                        <a href="{{ route('banner.destroy', $item->id) }}" class="ml-3 btn btn-danger btndelete"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="" method="POST" id="form-delete">
        {{ csrf_field() }}
        @method('DELETE')
    </form>
    <div class="paginateAdmin">
        {{-- dùng appends(request()->all()) để dữ lại key tìm kiếm khi chuyển trang --}}
        {{ $data->appends(request()->all())->links() }}
    </div>
@endsection
@section('js')
    <script>
        $('.btndelete').click(function(e) {
            e.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);
            if (confirm('bạn có chắc muốn xoá nó không!')) {
                $('form#form-delete').submit();
            }
        })
    </script>
@endsection
