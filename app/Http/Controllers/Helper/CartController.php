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
        $cart_size = $request->get('cart_size');
        $cart->add($product, $quantity, $cart_size);
        return redirect()->back()->with('true','Product has been added to cart');

    }

    public function update($id, Cart $cart)
    {
       $quantity = $_GET['quantity'];
       $cart->update($id, $quantity);
       return redirect()->route('cart.view')->with('true', "Product's quantity updated successfully");

    }

    public function delete($id, Cart $cart)
    {
        // dd($id);
        $cart->delete($id); 
        return redirect()->route('cart.view')->with('true','Product has been removed from cart');

    }
    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->route('cart.view')->with('true','Cart has been cleared');

    }
}
