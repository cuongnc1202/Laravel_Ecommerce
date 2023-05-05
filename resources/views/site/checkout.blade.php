@extends('master.home')

@section('title', 'Thanh Toán')

@section('content')
    <div class="container">
        <h1 class="text-center pt-5">Chi Tiết Đơn Hàng</h1>
        <div class="card text-left my-5">
            <div class="card-body">
                <section class="checkout spad">
                    <div class="container checkout__form">
                        <form action="{{ route('order.checkout') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p>Họ tên khách hàng<span>*</span></p>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $customer->name }}">
                                                <p class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>Địa chỉ<span>*</span></p>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $customer->address }}">
                                            <p class="text-danger">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p>Số điện thoại<span>*</span></p>
                                                <input type="number" class="form-control" name="phone"
                                                    value="{{ $customer->phone }}">
                                                <p class="text-danger">
                                                    @error('phone')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p>Email<span>*</span></p>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $customer->email }}">
                                                <p class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <label for="">Ghi chú</label>
                                                <textarea class="form-control" name="note" rows="3"></textarea>
                                                <p class="text-danger">
                                                    @error('note')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6"
                                    style="background-color: rgb(240, 234, 234); margin-left: auto">
                                    <div class="px-3 py-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Số Lượng</th>
                                                    <th>Đơn Giá</th>
                                                    <th>Thành Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart->items as $product)
                                                    <tr>
                                                        <td scope="row">{{ $loop->index }}</td>
                                                        <td>{{ $product['name'] }}</td>
                                                        <td>{{ $product['quantity'] }}</td>
                                                        <td>{{ number_format($product['price']) }}</td>
                                                        <td>{{ number_format($product['quantity'] * $product['price']) }}
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                        <div class="row pt-5">
                                            <table>
                                                <td>
                                                    <h2>Tổng Tiền</h2>
                                                </td>
                                                <td style="text-align: right; padding-right: 60px;">
                                                    <h2>{{ number_format($cart->getTotalPrice()) }} vnđ</h2>
                                                </td>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">XÁC NHẬN ĐẶT HÀNG</button>
                            <a class="btn btn-primary" href="{{ route('cart.view') }}">QUAY LẠI</a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop()
