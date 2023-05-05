@extends('master.admin')

@section('title', 'Quản Lý Danh Mục')

@section('content')
    <div class="content px-5">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Nhập từ khóa ...">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a href="{{ route('category.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Thêm Danh Mục</a>
        </form>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Avatar</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ url('uploads') }}/{{ $category->image }}" width="80"></td>
                        <td>{{ $category->status == 1 ? 'Hiển thị' : 'Tạm ẩn' }}</td>
                        <td>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning"><i
                                        class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
