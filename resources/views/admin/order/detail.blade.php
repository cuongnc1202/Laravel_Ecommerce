@extends('master.admin')
@section('title', 'Chi Tiết Đơn Hàng')

@section('content')

    <div class="content px-5">
        <div class="row">
            <form action="{{ route('order.status', $order->id) }}" method="post" class="form-inline">
                @csrf @method('PUT')
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Chọn 1</option>
                        <option value="1">Đã xác nhận</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                    </select>
                    <button class="btn btn-danger">Cập nhật</button>
                </div>
            </form>
            @if ($order->status == 0)
                <a href="" class="btn btn-default">Chưa xác nhận</a>
            @elseif ($order->status == 1)
                <a href="" class="btn btn-primary">Đã xác nhận</a>
            @elseif ($order->status == 2)
                <a href="" class="btn btn-warning">Đang giao hàng</a>
            @else
                <a href="" class="btn btn-success">Đã nhận hàng</a>
            @endif
            <a href="{{route('order.index')}}" class="btn btn-info">Quay lại</a>
        </div>

        <hr>
        <div class="row mt-5">
            <h5><b>Thông Tin Khách Hàng</b></h5>
            <table class="table table table-striped table-inverse">
                <thead>
                    <tr>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>
        <div class="row mt-5">
            <h5><b>Thông Tin Sản Phẩm</b></h5>
            <table class="table table table-striped table-inverse">
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $data)
                        <tr>
                            <td>{{ $data->product->id }}</td>
                            <td>{{ $data->product->name }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ number_format($data->product->sale_price ? $data->product->sale_price : $data->product->price) }}
                            </td>
                            <td>{{ number_format($data->quantity * ($data->product->sale_price ? $data->product->sale_price : $data->product->price)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
        </div>
    </div>

@stop()
