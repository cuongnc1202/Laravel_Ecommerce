<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductMaterial;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name','status'];

    public function productMaterials()
    {
        return $this->hasMany(ProductMaterial::class, 'material_id', 'id');
    }
}
