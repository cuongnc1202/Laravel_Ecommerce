@extends('master.admin')

@section('title', 'Quản Lý Banner')

@section('content')
    <div class="container-fluid px-5 py-3">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Nhập từ khóa ...">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a href="{{ route('banner.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Thêm Banner</a>
        </form>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Tên Banner</th>
                    <th>Hình Ảnh</th>
                    <th>Nội Dung</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banner as $bann)
                    <tr>
                        <td scope="row">{{ $bann->id }}</td>
                        <td>{{ $bann->name }}</td>
                        <td><img src="{{ url('uploads') }}/{{ $bann->image }}" width="120"></td>
                        <td>{!! $bann->description !!}</td>
                        <td>{{ $bann->status == 1 ? 'Hiển thị' : 'Tạm ẩn' }}</td>
                        <td>
                            <form action="{{ route('banner.destroy', $bann->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('banner.edit', $bann->id) }}" class="btn btn-warning"><i
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
