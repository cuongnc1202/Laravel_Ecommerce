<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDetail $detail)
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate();
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.order.detail', compact('order'));
    }


    public function status(Order $order, Request $request)
    {

        $request->validate([
            'status' => 'required'
        ],[
            'status.required' => 'Giá trị không được để trống !'
        ]);
        $status = request('status');
        if ($order->status > $status) {
            return redirect()->back()->with('false', 'Bạn không thể cập nhật trạng thái từ trên xuống');
        }
        $order->update(['status' => $status]);
        return redirect()->back()->with('true', 'Cập nhật trạng thái đơn hàng thành công');
    }

}
