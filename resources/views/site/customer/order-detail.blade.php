@extends('master.home')

@section('title', 'Chi Tiết Đơn Hàng')

@section('content')

    <div class="container py-5">
        <h1 style="text-decoration: underline" class="mb-5 text-center text-success">Chi Tiết Đơn Hàng</h1>
        <hr>
        <div class="row">
            <div class="col-xl-2">
                <p>Đơn vị bán hàng:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>ChipStore</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Số điện thoại:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>0858.030.444</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Địa chỉ:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>16/8 Road 1, Beverly Hills, California.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Email:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>info@chipstore.com</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Số tài khoản:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>TPBANK: 333 8228 3456</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-2">
                <p>Họ tên khách hàng:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>{{ $order->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Số điện thoại:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>{{ $order->phone }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Địa chỉ:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>{{ $order->address }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <p>Email:</p>
            </div>
            <div class="col-xl-10 text-left">
                <h3>{{ $order->email }}</h3>
            </div>
        </div>
        <hr>
        <table class="table table-striped table-inverse table-responsive my-5">
            <thead class="thead-inverse">
                <tr>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $detail)
                    <tr>
                        <td scope="row">{{ $detail->product->id }}</td>
                        <td scope="row">{{ $detail->product->name }}</td>
                        <td scope="row">{{ $detail->quantity }}</td>
                        <td scope="row">
                            {{ number_format($detail->product->sale_price > 0 ? $detail->product->sale_price : $detail->product->price) }}
                        </td>
                        <td scope="row">
                            {{ number_format($detail->quantity * $detail->product->sale_price > 0 ? $detail->product->sale_price : $detail->product->price) }}<sup>vnđ</sup>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row" style="text-align: right">
            <h2>Tổng tiền: {{ number_format($order->getTotal()) }}<sup>vnđ</sup></h2>
        </div>
        <hr>
        <div class="row" style="text-align: right">
            <div class="">
                <a class="btn btn-success" href="{{route('site.index')}}"> Về trang chủ</a>
            </div>
        </div>
    </div>

@stop()

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (Session::get('true'))
<script>
    Swal.fire({
    position: 'mid-center',
    icon: 'success',
    title: '{{ Session::get("true")}}',
    showConfirmButton: true,
    timer: 3500
    })
</script>
@endif

@stop()