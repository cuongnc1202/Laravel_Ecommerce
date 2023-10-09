    <h1>Your order has been created.</h1>
    <hr>
    <div class="receiver">
        <p>Name: {{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
        <p>Phone: {{ $order->phone }}</p>
        <p>Address: {{ $order->address }}</p>
        <p>Email: {{ $order->email }}</p>
    </div>        
    <hr>
    <table class="table table-striped table-inverse table-responsive my-5">
        <thead class="thead-inverse">
            <tr>
                <th style="width: 5%; text-align: center">No</th>
                <th style="width: 35%; text-align: center">Name</th>
                <th style="width: 15%; text-align: center">Image</th>
                <th style="width: 15%; text-align: center">Size</th>
                <th style="width: 15%; text-align: center">Quantity</th>
                <th style="width: 15%; text-align: center">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $detail)
                <tr>
                    <td style="text-align: center">{{ $loop->index += 1 }}</td>
                    <td style="text-align: center">{{ $detail->product->name }}</td>
                    <td style="width: 100px"><img class="img-fluid" src="{{url('uploads')}}/{{ $detail->product->feature_image }}" alt=""></td>
                    <td style="text-align: center">{{ $detail->cart_size }}</td>
                    <td style="text-align: center">{{ $detail->quantity }}</td>
                    <td style="text-align: center">
                        ${{ ($detail->quantity * $detail->product->sale_price > 0 ? $detail->product->sale_price : $detail->product->price) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row" style="text-align: right">
        <div class="col-12">
            <h2>Total: ${{ ($order->getTotal()) }}</h2>
        </div>
    </div>
    <hr>

