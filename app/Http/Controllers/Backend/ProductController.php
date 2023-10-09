<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        $keyword = $request->keyword;
        if ($keyword) {
            $products = Product::where('name','like','%'.$keyword.'%')->paginate();
        }
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::orderby('name', 'ASC')->get();
        $colors = Color::orderby('name', 'ASC')->get();
        $categories = Category::orderby('id','DESC')->get();
        return view('admin.product.create', compact('categories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'feature_image' => 'required|mimes:jpg,jpeg,png,gif',
            'images[]' => 'mimes:jpg,jpeg,png,gif',
            'price' => 'required|numeric|gt:0',
            'sale_price' => 'numeric|lt:price',
        ],[
            'name.required' => "Product's name can not be empty!",
            'name.unique' => "Product's name already exists, please try another name!",
            'feature_image.required' => "Product's feature_image can not be empty!",
            'feature_image.mimes' => "Image's format must be jpg, jpeg, png or gif!",
            'images[].mimes' => "Image's format must be jpg, jpeg, png or gif!",
            'price.required' => "Product's price can not be empty!",
            'price.numeric' => "Product's price must be numeric!",
            'price.gt:0' => "Product's price must be greater than 0!",
            'sale_price.numeric' => "Product's sale price must be numeric!",
            'sale_price.lt:price' => "Promotional price must be less than original price!",
        ]);

        if(Product::addProduct()) {
            return redirect()->route('product.index')->with('true','Added product '.$request->name);
        }
        return redirect()->back()->with('false', 'Create product failed');
    }

    //
    
    public function edit(Product $product)
    {
        $colors = Color::all();
        $sizes = Size::all();
        $sizeIds = $product->sizes->pluck('size_id')->toArray();
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories','colors','sizes','sizeIds'));
    }

    public function delete_image (Product $product, Image $image)
    {
        if ($image->delete()) {
            return redirect()->back();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, ProductSize $productSize)
    {
        $request->validate([
            'price' => 'required|numeric|gt:0',
            'sale_price' => 'lt:price',
            'stock' => 'max:quantity',
        ],[
            'price.required' => "Product's price can not be empty!",
            'price.numeric' => "Product's price must be numeric!",
            'price.gt:0' => "Product's price must be greater than 0!",
            'sale_price.lt:price' => 'Promotional price must be less than original price!'
        ]);
        
        $data = $request->only('name','price','sale_price','stock','category_id','description','short_description','status');
        if ($request->has('feature_image')) {
            $file_name = $request->feature_image->getClientOriginalName();
            $request->feature_image->move(public_path('/uploads'), $file_name);
            $data['feature_image'] = $file_name;
        } else {
            $data['feature_image'] = $product['feature_image'];
        }
        
        if ($product->update($data)) {
            if ($request->images) {
                foreach($request->images as $file) {
                    $images = $file->getClientOriginalName();
                    if ($file->move(public_path('/uploads'), $images)) {
                        Image::create([
                            'name' => $images,
                            'product_id' => $product->id,
                            'status' => 1,
                        ]);
                    }
                }
            }

            ProductSize::where('product_id', $product->id)->delete();
            if (is_array($request->size_id) && count($request->size_id) > 0) {
               
                foreach($request->size_id as $size_id) {
                    ProductSize::create([
                        'product_id' => $product->id,
                        'size_id' => $size_id,
                        'status' => 1,
                    ]);
                }
            }
           
            return redirect()->route('product.index')->with('true','Updated product '.$product->name);
        }
        return redirect()->back()->with('false', 'Product update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductSize $productSize)
    {
        if ($product->delete()) {
            return redirect()->route('product.index')->with('true','Deleted product '.$product->name);
        }
        return redirect()->back()->with('false', 'Product delete failed');
    }
}