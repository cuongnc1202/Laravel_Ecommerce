<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Thumbnail;
use App\Models\ProductMaterial;
use App\Models\OrderDetail;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price','sale_price','category_id','description','status'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function images()
    {
        return $this->hasMany(Thumbnail::class, 'product_id', 'id');
    }
    
    public function materials()
    {
        return $this->hasMany(ProductMaterial::class, 'product_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function scopeAddProduct($query)
    {
        $check = true;
        $data = request()->only('name','price','sale_price','category_id','description','status');
        $file_name = request()->image->getClientOriginalName();

        if (request()->image->move(public_path('/uploads'), $file_name)) {
            $data['image'] = $file_name;
            if ($product = Product::create($data)) {

                if (request()->thumbnail) {

                    foreach(request()->thumbnail as $file) {
                        $thumbnail = $file->getClientOriginalName();
                        if ($file->move(public_path('/uploads'), $thumbnail)) {
                            $thumbnailData = [
                                'name' => $thumbnail,
                                'product_id' => $product->id,
                                'status' => '1',
                            ];

                            if (!Thumbnail::create($thumbnailData)) {
                                $check = false;
                                break;
                            }
                        }
                    }

                }

                if (request()->material_id && count(request()->material_id) > 0) {

                    foreach(request()->material_id as $material_id) {

                        $materialData = [
                            'product_id' => $product->id,
                            'material_id' => $material_id,
                            'status' => 1,
                        ];

                        if (!ProductMaterial::create($materialData )) {
                            $check = false;
                            break;
                        }
                    }
                }
            }
               
        }

        return $check;
    }

}