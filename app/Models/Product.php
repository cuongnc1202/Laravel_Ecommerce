<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Image;
use App\Models\ProductSize;
use App\Models\Color;
use App\Models\OrderDetail;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','feature_image','price','sale_price','color_id','category_id','short_description','description','status'];
    
    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }
    
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function scopeAddProduct($query)
    {
        $check = true;
        $data = request()->only('name','feature_image','price','sale_price','color_id','category_id','short_description','description','status');
        $file_name = request()->feature_image->getClientOriginalName();

        if (request()->feature_image->move(public_path('/uploads'), $file_name)) {
            $data['feature_image'] = $file_name;
            if ($product = Product::create($data)) {

                if (request()->images) {

                    foreach(request()->images as $file) {
                        $images = $file->getClientOriginalName();
                        if ($file->move(public_path('/uploads'), $images)) {
                            $imagesData = [
                                'name' => $images,
                                'product_id' => $product->id,
                                'status' => '1',
                            ];

                            if (!Image::create($imagesData)) {
                                $check = false;
                                break;
                            }
                        }
                    }

                }

                if (request()->size_id && count(request()->size_id) > 0) {

                    foreach(request()->size_id as $size_id) {

                        $sizeData = [
                            'product_id' => $product->id,
                            'size_id' => $size_id,
                            'status' => 1,
                        ];

                        if (!ProductSize::create($sizeData )) {
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