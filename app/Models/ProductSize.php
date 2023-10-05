<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Size;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'size_id', 'status'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
}
