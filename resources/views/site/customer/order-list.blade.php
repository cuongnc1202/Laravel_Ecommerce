@extends('master.home')

@section('title', 'Order History')

@section('content')
    @if ($orders->count() > 0)
        <div class="container py-5">
            <h1 class="pb-5 my-3 text-center text-success">Order History</h1>
            <table class="table table-striped table-inverse table-responsive pb-5 mb-3">
                <thead class="thead-inverse">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 30%" class="text-center">Created at</th>
                        <th style="width: 30%">Total</th>
                        <th style="width: 30%">Status</th>
                        <th style="width: 5%" class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td class="text-center">{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>${{ $order->getTotal() }}</td>
                            <td>
                                @if ($order->status == 0)
                                    <p class="text-dark"><b>Pending</b></p>
                                @elseif ($order->status == 1)
                                    <p class="text-primary"><b>Confirmed</b></p>
                                @elseif ($order->status == 2)
                                    <p class="text-warning"><b>Delivering</b></p>
                                @else
                                    <p class="text-success"><b>Recieved</b></p>
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
                <p class="text-dark text-center py-5"><strong>You have no order yet.</strong></p>
                <div class="backShop text-center"><a href="{{ route('site.shop') }}" class="btn btn-primary">RETURN SHOP</a></div>
            </div>
        </div>
    @endif

@stop()
