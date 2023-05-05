<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','name','phone','address','email','note','status'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->details as $detail) {
            $total += $detail->quantity * $detail->price;
        }
        return $total;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
