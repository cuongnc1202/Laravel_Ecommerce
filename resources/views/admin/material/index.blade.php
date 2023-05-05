@extends('master.admin')

@section('title', 'Quản Lý Chất Liệu')

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
            <a href="{{ route('material.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Thêm Chất Liệu</a>
        </form>
        <hr>
        <table class="table table-striped table-inverse ">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Tên Chất Liệu</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                    <tr>
                        <td scope="row">{{ $material->id }}</td>
                        <td>{{ $material->name }}</td>
                        <td>{{ $material->status == 1 ? 'Hiển thị' : 'Tạm ẩn' }}</td>
                        <td>
                            <form action="{{ route('material.destroy', $material->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('material.edit', $material->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
