@extends('master.admin')

@section('title', 'Quản Lý Đơn Hàng')

@section('content')
    <div class="content px-5">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Nhập từ khóa ...">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <hr>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td>{{ $order->customer ? $order->name : '' }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            @if ($order->status == 0)
                                <p class="text-dark"><b>Chưa xác nhận</b></p>
                            @elseif ($order->status == 1)
                                <p class="text-primary"><b>Đã xác nhận</b></p>
                            @elseif ($order->status == 2)
                                <p class="text-warning"><b>Đang giao hàng</b></p>
                            @else
                                <p class="text-success"><b>Đã nhận hàng</b></p>
                            @endif
                        </td>
                        <td> <a class="text-white btn btn-success" href="{{ route('order.show', $order->id) }}">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
