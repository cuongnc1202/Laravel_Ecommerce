<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSize;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['name','status'];

    public function products()
    {
        return $this->hasMany(ProductSize::class, 'size_id', 'id');
    }
}
