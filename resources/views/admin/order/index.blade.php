@extends('master.admin')

@section('title', 'Order Management')

@section('content')
    <div class="content px-5">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Enter keyword...">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <hr>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Customer's name</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{ $order->id }}</td>
                        <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                        <td>{{ $order->created_at }}</td>
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
                        <td> <a class="text-white btn btn-success" href="{{ route('order.show', $order->id) }}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
