<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view(Cart $cart)
    {
        // dd($cart);
        return view('site.cart', compact('cart'));
    }

    public function add(Product $product, Cart $cart, Request $request)
    {
    
        $quantity = $request->get('quantity', 1);
        $cart->add($product, $quantity);
        return redirect()->back()->with('true','Thêm sản phẩm vào giỏ hàng thành công!');

    }

    public function update($id, Cart $cart)
    {
       $quantity = $_GET['quantity'];
       $cart->update($id,$quantity);
       return redirect()->route('cart.view')->with('true','Cập nhật sản phẩm thành công!');

    }

    public function delete($id, Cart $cart)
    {
        // dd($id);
        $cart->delete($id); 
        return redirect()->route('cart.view')->with('true','Xóa sản phẩm thành công!');

    }
    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->route('cart.view')->with('true','Xóa giỏ hàng thành công!');

    }
}
