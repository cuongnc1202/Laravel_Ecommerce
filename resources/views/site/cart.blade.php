@extends('master.home')

@section('title', 'Giỏ Hàng')

@section('content')
@if ($cart->getTotalQuantity() > 0)
    <div class="container py-5">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành Tiền</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->items as $product)
                    <tr>
                        <td scope="row">{{ $product['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $product['id']) }}" class="form-inline" method="get">
                                <input style="width: 100px;" type="number" name="quantity" value="{{ $product['quantity'] }}">
                                <button type="submit" class="btn-success">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($product['sale_price'] ? $product['sale_price'] : $product['price']) }}</td>
                        <td>{{ number_format($product['quantity'] * ($product['sale_price'] ? $product['sale_price'] : $product['price'])) }}
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('cart.delete', $product['id']) }}"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row py-1">
            <div class="col-lg-8">
                <h3>Số Lượng Sản Phẩm</h3>
            </div>
            <div class="col-lg-4" style="text-align: right; padding-right: 170px;">
                <h3>{{ $cart->getTotalQuantity() }}</h3>
            </div>
        </div>
        <hr>
        <div class="row py-1">
            <div class="col-lg-8">
                <h1>Tổng Tiền</h1>
            </div>
            <div class="col-lg-4" style="text-align: right">
                <h1>{{ number_format($cart->getTotalPrice()) }} <sup>vnđ</sup></h1>
            </div>
        </div>
        <hr>
        <div class="row py-5">
            <div class="col-lg-6">
                <a href="{{ route('site.shop') }}" class=" btn primary-btn cart-btn bg-primary text-white"><b>TIẾP TỤC MUA
                        SẮM</b></a>
                <a href="{{ route('cart.clear') }}"
                    class=" btn primary-btn cart-btn cart-btn-right bg-danger text-white"><span
                        class="icon_loading"></span><b>XÓA HẾT GIỎ HÀNG</b></a>
            </div>
            <div class="col-lg-6" style="text-align: right;">
                <a href="{{ route('order.checkout') }}" class="btn btn-success"><b>TIẾP TỤC ĐẶT HÀNG</b></a>
            </div>
        </div>
    </div>
    @else 
    <div class="container py-5">
        <div class="alert alert-danger py-5" role="alert">
            <p class="text-dark text-center py-5"><strong>Giỏ hàng rỗng, vui lòng quay lại shop để mua sắm!</strong></p>
            <div class="backShop text-center"><a href="{{ route('site.shop')}}" class="btn btn-primary">QUAY LẠI CỬA HÀNG</a></div>
        </div>
    </div>
    @endif

@stop()
