<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    protected $fillable = ['order_id','product_id','feature_image','cart_size','quantity','price'];

    public function order()
    {
        return $this->hasOne(Order::class, 'id','order_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->details->order as $detail) {
            $total += number_format($detail->quantity * ($detail->product->sale_price ? $detail->product->sale_price : $detail->product->price));
        }
        return $total;
    }

}
