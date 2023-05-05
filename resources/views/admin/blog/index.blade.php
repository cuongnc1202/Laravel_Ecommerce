@extends('master.admin')

@section('title', 'Quản Lý Tin Tức')

@section('content')
    <div class="content">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Nhập từ khóa ...">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a href="{{ route('blog.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Thêm Tin Tức</a>
        </form>
        <hr>
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Tên Bài Đăng</th>
                    <th>Avatar</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->name}}</td>
                    <td><img src="{{url('/uploads')}}/{{$blog->avatar}}" width="150"></td>
                    <td>{{$blog->status == 1 ? 'Hiển thị' : 'Tạm ẩn'}}</td>
                    <td>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
