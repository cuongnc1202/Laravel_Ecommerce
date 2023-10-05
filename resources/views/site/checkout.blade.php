@extends('master.home')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <h1 class="text-center pt-5">Order Checkout</h1>
        <div class="card text-left my-5" id="checkout__card">
            <div class="card-body">
                <section class="checkout spad">
                    <div class="container checkout__content">
                        <form action="{{ route('order.checkout') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 checkout__form">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="checkout__input">
                                                <p>First name<span>*</span></p>
                                                <input type="text" class="form-control" name="first_name"
                                                    value="{{ $customer->first_name }}">
                                                <p class="text-danger">
                                                    @error('first_name')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="checkout__input">
                                                <p>Last name<span>*</span></p>
                                                <input type="text" class="form-control" name="last_name"
                                                    value="{{ $customer->last_name }}">
                                                <p class="text-danger">
                                                    @error('last_name')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="checkout__input">
                                                <p>Phone<span>*</span></p>
                                                <input type="number" class="form-control" name="phone"
                                                    value="{{ $customer->phone }}">
                                                <p class="text-danger">
                                                    @error('phone')
                                                        {{ $message }}
                                                    @enderror
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
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
                                            <p>Address<span>*</span></p>
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
                                                <label for="">Note</label>
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
                                <div class="col-12 checkout__product mt-4">
                                    <div class="px-3 py-3" style="background-color: rgb(240, 234, 234); margin-bottom: 15px">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">No</th>
                                                    <th style="width: 30%">Name</th>
                                                    <th>Image</th>
                                                    <th style="width: 5%">Size</th>
                                                    <th style="width: 15%">Quantity</th>
                                                    <th style="width: 20%; text-align: center;">Price</th>
                                                    <th style="width: 20% text-align: center;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart->items as $product)
                                                    <tr>
                                                        <td scope="row">{{ $loop->index += 1}}</td>
                                                        <td>{{ $product['name'] }}</td>
                                                        <td><img src="{{ url('/uploads') }}/{{ $product['image'] }}" width="80"></td>
                                                        <td>{{ $product['cart_size'] }}</td>
                                                        <td style="text-align: center;">{{ $product['quantity'] }}</td>
                                                        <td style="text-align: center;">${{ ($product['price']) }}</td>
                                                        <td style="text-align: center;">${{ ($product['quantity'] * $product['price']) }}
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                        <div class="row pt-5 px-4 product__checkout__total">
                                            <h2>Cart Total: ${{ ($cart->getTotalPrice()) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__button my-4">
                                <a class="btn btn-warning" href="{{ route('cart.view') }}">Back to cart</a>
                                <button type="submit" class="btn btn-success" onclick="return confirm('Place order?')">Place order</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop()
