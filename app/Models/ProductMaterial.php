<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Material;

class ProductMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'material_id', 'status'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }
}

