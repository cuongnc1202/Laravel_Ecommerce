@extends('master.home')

@section('title', 'Lịch Sử Đơn Hàng')

@section('content')
    @if ($orders->count() > 0)
        <div class="container py-5">
            <h1 style="text-decoration: underline" class="pb-5 mb-5 text-center text-success">Lịch Sử Đơn Hàng</h1>
            <table class="table table-striped table-inverse table-responsive pb-5 mb-5">
                <thead class="thead-inverse">
                    <tr>
                        <th>Mã</th>
                        <th>Ngày Tạo</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th class="text-center">Xem Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td scope="row">{{ $order->id }}</td>
                            <td scope="row">{{ $order->created_at->format('d/m/Y') }}</td>
                            <td scope="row">{{ number_format($order->getTotal()) }}<sup>vnđ</sup></td>
                            <td scope="row">
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
                            <td class="text-center">
                                <a class="btn btn-success" href="{{ route('order.detail', $order->id) }}"><i
                                        class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
        <div class="container py-5">
            <div class="alert alert-danger py-5" role="alert">
                <p class="text-dark text-center py-5"><strong>Bạn chưa tạo đơn hàng nào.</strong></p>
                <div class="backShop text-center"><a href="{{ route('site.shop') }}" class="btn btn-primary">QUAY LẠI CỬA
                        HÀNG</a></div>
            </div>
        </div>
    @endif

@stop()
