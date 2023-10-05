<?php

namespace App\Http\Controllers\Backend;

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
    public function index(OrderDetail $detail, Request $request)
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate();
        $keyword = $request->keyword;
        if ($keyword) {
            $products = Order::where('name','like','%'.$keyword.'%')->paginate();
        }
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
            'status.required' => 'Value cannot be empty'
        ]);
        $status = request('status');
        if ($order->status > $status) {
            return redirect()->back()->with('false', 'You cannot update the status from the top down');
        }
        $order->update(['status' => $status]);
        return redirect()->back()->with('true',  "Order's status updated successfully");
    }

}
