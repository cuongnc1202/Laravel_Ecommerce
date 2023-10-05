<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart
{
    public $items = [];


    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function add($product, $quantity = 1, $cart_size)
    {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $item = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->feature_image,
                'cart_size' => $cart_size,
                'price' => $product->price,
                'sale_price' => $product->sale_price,
                'quantity' => $quantity,
            ];
            $this->items[$product->id] = $item;
        }

        session(['cart' => $this->items]);
    }


    public function update($id)
    {
        if (isset($this->items[$id])) {
            $quantity = $_GET['quantity'];
            $this->items[$id]['quantity'] = $quantity;
            session(['cart' => $this->items]);
        }
    }


    public function delete($id)
    {
        unset($this->items[$id]);
        session(['cart' => $this->items]);
    }


    public function clear()
    {
        session(['cart' => null]);
    }



    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['quantity'] * ($item['sale_price'] ? $item['sale_price'] : $item['price']);
        }
        return $totalPrice;
    }

    public function getTotalQuantity()
    {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity += $item['quantity'];
        }
        return $totalQuantity;
    }

}