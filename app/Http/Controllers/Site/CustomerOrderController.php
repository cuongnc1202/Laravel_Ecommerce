<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;

class CustomerOrderController extends Controller
{
    public function checkout()
    {
        $customer = auth('customer')->user();
        return view('site.checkout', compact('customer'));
    }
    public function post_checkout(Request $request, Cart $cart)
    {
        $data = $request->only('name', 'phone','address','email','note');
        $data['customer_id'] = auth('customer')->user()->id;

        if ($order = Order::create($data)) {
            foreach ($cart->items as $item) {
                $detail = [
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['sale_price'] > 0 ? $item['sale_price'] : $item['price'],
                ];

                $orderId = OrderDetail::create($detail)->id;
            }
            $cart->clear();
            return redirect()->route('order.detail', $order->id)->with('true', 'Đặt hàng thành công');
        }
        return redirect()->back()->with('false', 'Đặt hàng thất bại');
    }
    public function history()
    {
        $customer = auth('customer')->user();
        $orders = $customer->orders;
        return view('site.customer.order-list', compact('orders'));
    }
    public function detail(Order $order)
    {
        // dd($order->details[0]->product);
       return view('site.customer.order-detail', compact('order'));
    }
}
