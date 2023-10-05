@extends('master.home')

@section('title', 'Cart')

@section('content')
@if ($cart->getTotalQuantity() > 0)
    <div class="container py-5">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 29%;">Name</th>
                    <th style="width: 10%;">Image</th>
                    <th style="width: 5%;">Size</th>
                    <th style="width: 20%; text-align: center">Quantity</th>
                    <th style="width: 13%;">Price</th>
                    <th style="width: 13%;">Total</th>
                    <th style="width: 5%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->items as $product)
                    <tr>
                        <td scope="row">{{ $loop->index += 1 }}</td>
                        <td scope="row">{{ $product['name'] }}</td>
                        <td><img src="{{ url('/uploads') }}/{{ $product['image'] }}" width="80"></td>
                        <td scope="row">{{ $product['cart_size'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $product['id']) }}" class="form-inline" method="get">
                                <input style="width: 100px;" type="number" name="quantity" value="{{ $product['quantity'] }}">
                                <button type="submit" class="btn-success">Update</button>
                            </form>
                        </td>
                        <td>${{ ($product['sale_price'] ? $product['sale_price'] : $product['price']) }}</td>
                        <td>${{ ($product['sale_price'] ? $product['sale_price'] : $product['price'])*$product['quantity'] }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('cart.delete', $product['id']) }}"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row py-1 mb-3">
            <div class="col-12 text-right">
            <a href="{{ route('cart.clear') }}"
                    class=" btn primary-btn cart-btn cart-btn-right bg-danger text-white"><span
                        class="icon_loading"></span><b>Clear cart</b></a>
            </div>
        </div>
        <div class="row py-1">
            <div class="col-12">
                <h3>Total quantity: <span>{{ $cart->getTotalQuantity() }}</span></h3>
            </div>
        </div>
        <hr>
        <div class="row py-1">
            <div class="col-12">
                <h2>Total price: <span>${{ ($cart->getTotalPrice()) }}</span></h2>
            </div>
        </div>
        <hr>
        <div class="row py-5">
            <div class="col-md-6 col-sm-12">
                <a href="{{ route('site.shop') }}" class=" btn primary-btn cart-btn bg-primary text-white"><b>Return shop</b></a>
                <a href="{{ route('order.checkout') }}" class="btn btn-success"><b>Continue order</b></a>
            </div>
        </div>
    </div>
    @else 
    <div class="container py-5">
        <div class="alert alert-danger py-5" role="alert">
            <p class="text-dark text-center py-5"><strong>Your cart is empty. Please return to shop to buy product!</strong></p>
            <div class="backShop text-center"><a href="{{ route('site.shop')}}" class="btn btn-primary">Return shop</a></div>
        </div>
    </div>
    @endif

@stop()
