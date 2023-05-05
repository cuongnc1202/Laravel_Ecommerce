@extends('master.admin')

@section('title', 'Quản Lý Sản Phẩm')

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
            <a href="{{ route('product.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i>Thêm Sản Phẩm</a>
        </form>
        <hr>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th style="width: 20%;">Tên Sản Phẩm</th>
                    <th>Avatar</th>
                    <th>Giá Bán</th>
                    <th>Giá Khuyến Mại</th>
                    <th>Danh Mục</th>
                    <th style="width: 20%;">Mô Tả</th>

                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td scope="row">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ url('uploads') }}/{{ $product->image }}" width="80"></td>

                        <td>{{ number_format($product->price) }}<sup>vnđ</sup></td>
                        <td>{{ number_format($product->sale_price) }}<sup>vnđ</sup></td>
                        <td>{{ $product->category->name }}</td>
                        <td>{!! Str::words($product->description, 20) !!}</td>

                        <td>{{ $product->status == 1 ? 'Hiển thị' : 'Tạm ẩn' }}</td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products -> links()}}
    </div>
@stop()
