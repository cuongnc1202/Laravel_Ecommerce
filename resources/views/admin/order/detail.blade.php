@extends('master.admin')
@section('title', "Order's Detail")

@section('content')

    <div class="content px-5">
        <div class="row">
            <form action="{{ route('order.status', $order->id) }}" method="post" class="form-inline">
                @csrf @method('PUT')
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Select 1</option>
                        <option value="1">Confirmed</option>
                        <option value="2">Delivering</option>
                        <option value="3">Recieved</option>
                    </select>
                    <button class="btn btn-danger">Update</button>
                </div>
            </form>
            @if ($order->status == 0)
                <a href="" class="btn btn-default">Pending</a>
            @elseif ($order->status == 1)
                <a href="" class="btn btn-primary">Confirmed</a>
            @elseif ($order->status == 2)
                <a href="" class="btn btn-warning">Delivering</a>
            @else
                <a href="" class="btn btn-success">Recieved</a>
            @endif
            <a href="{{route('order.index')}}" class="btn btn-info">Back</a>
        </div>

        <hr>
        <div class="row mt-5">
            <h5><b>Customer's information</b></h5>
            <table class="table table table-striped table-inverse">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>
        <div class="row mt-5">
            <h5><b>Products</b></h5>
            <table class="table table table-striped table-inverse">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Image</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $data)
                        <tr>
                            <td>{{ $loop->index += 1 }}</td>
                            <td>{{ $data->product->name }}</td>
                            <td>{{ $data->cart_size }}</td>
                            <td style="width: 100px"><img class="img-fluid" src="{{url('uploads')}}/{{ $data->product->feature_image }}" alt=""></td>
                            <td style="text-align: center;">{{ $data->quantity }}</td>
                            <td style="text-align: center;">${{ ($data->product->sale_price ? $data->product->sale_price : $data->product->price) }}
                            </td>
                            <td style="text-align: center;">${{ ($data->quantity * ($data->product->sale_price ? $data->product->sale_price : $data->product->price)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="total--price d-flex justify-content-end" style="width: 100%">
                <h3>Cart Total: ${{ ($order->getTotal()) }} </h3>
            </div>
        </div>
    </div>

@stop()
