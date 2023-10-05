<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name','product_id','status'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
