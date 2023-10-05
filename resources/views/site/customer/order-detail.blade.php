@extends('master.home')

@section('title', 'Order Detail')

@section('content')

    <div class="container py-5">
        <h1 style="text-decoration: underline" class="mb-5 text-center text-success">Order Detail</h1>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <p>Name:</p>
                    </div>
                    <div class="col-10 text-left">
                        <h5>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p>Phone:</p>
                    </div>
                    <div class="col-10 text-left">
                        <h5>{{ $order->phone }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p>Address:</p>
                    </div>
                    <div class="col-10 text-left">
                        <h5>{{ $order->address }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p>Email:</p>
                    </div>
                    <div class="col-10 text-left">
                        <h5>{{ $order->email }}</h5>
                    </div>
                </div>
            </div>
        </div>        
        <br>
        <table class="table table-striped table-inverse table-responsive my-5">
            <thead class="thead-inverse">
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 35%">Name</th>
                    <th>Image</th>
                    <th style="width: 5%">Size</th>
                    <th class="text-center" style="width: 15%">Quantity</th>
                    <th class="text-center" style="width: 15%">Price</th>
                    <th class="text-center" style="width: 20%">Sub total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $detail)
                    <tr>
                        <td>{{ $loop->index += 1 }}</td>
                        <td>{{ $detail->product->name }}</td>
                        <td style="width: 100px"><img class="img-fluid" src="{{url('uploads')}}/{{ $detail->product->feature_image }}" alt=""></td>
                        <td>{{ $detail->cart_size }}</td>
                        <td class="text-center">{{ $detail->quantity }}</td>
                        <td class="text-center">
                            ${{ ($detail->product->sale_price > 0 ? $detail->product->sale_price : $detail->product->price) }}
                        </td>
                        <td class="text-center">
                            ${{ ($detail->quantity * $detail->product->sale_price > 0 ? $detail->product->sale_price : $detail->product->price) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row" style="text-align: right">
            <div class="col-12">
                <h2>Total: ${{ ($order->getTotal()) }}</h2>
            </div>
        </div>
        <hr>
        <div class="row mb-5 mt-5" style="text-align: right">
            <div class="col-12">
                <a class="btn btn-success" href="{{route('site.index')}}"><i class="fa fa-arrow-left"></i> Home Page</a>
            </div>
        </div>
    </div>

@stop()

<!-- @section('js')
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

@stop() -->