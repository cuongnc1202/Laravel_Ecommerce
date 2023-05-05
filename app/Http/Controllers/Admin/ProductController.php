<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Thumbnail;
use App\Models\ProductMaterial;
use App\Models\Material;
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
        $products = Product::orderBy('id','DESC')->paginate(4);
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
        $materials = Material::all();
        $categories = Category::all();
        return view('admin.product.create', compact('categories','materials'));
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
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'thumbnail[]' => 'mimes:jpg,jpeg,png,gif',
        ],[
            'name.required' => 'Tên sản phẩm không được để trống !',
            'name.unique' => 'Tên sản phẩm đã tồn tại, thử tên khác !',
            'image.required' => 'Ảnh sản phẩm không được để trống !',
            'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png hoặc gif !',
            'thumbnail[].mimes' => 'Định dạng ảnh phải là jpg, jpeg, png hoặc gif !',
        ]);
        if(Product::addProduct()) {
            return redirect()->route('product.index')->with('true','Thêm thành công sản phẩm: '.$request->name);
        }
        return redirect()->back()->with('false', 'Tạo mới sản phẩm không thành công!');
    }

    //
    
    public function edit(Product $product)
    {
        $materials = Material::all();
        $materialIds = $product->materials->pluck('material_id')->toArray();
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories','materials','materialIds'));
    }

    public function delete_image (Product $product, Thumbnail $image)
    {
        if ($image->delete()) {
            return redirect()->back()->with('true', 'Xóa ảnh thành công!');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, ProductMaterial $productMaterial)
    {
        $data = $request->only('name','price','sale_price','category_id','description','status');
        if ($request->has('image')) {
            $file_name = $request->image->getClientOriginalName();
            $request->image->move(public_path('/uploads'), $file_name);
            $data['image'] = $file_name;
        } else {
            $data['image'] = $product['image'];
        }
        
        if ($product->update($data)) {
            if ($request->thumbnail) {
                foreach($request->thumbnail as $file) {
                    $thumbnail = $file->getClientOriginalName();
                    if ($file->move(public_path('/uploads'), $thumbnail)) {
                        Thumbnail::create([
                            'name' => $thumbnail,
                            'product_id' => $product->id,
                            'status' => 1,
                        ]);
                    }
                }
            }

            ProductMaterial::where('product_id', $product->id)->delete();
            if (is_array($request->material_id) && count($request->material_id) > 0) {
               
                foreach($request->material_id as $material_id) {
                    ProductMaterial::create([
                        'product_id' => $product->id,
                        'material_id' => $material_id,
                        'status' => 1,
                    ]);
                }
            }
           
            return redirect()->route('product.index')->with('true','Cập nhật thành công sản phẩm: '.$data['name']);
        }
        return redirect()->back()->with('false', 'Cập nhật sản phẩm không thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect()->route('product.index')->with('true','Xóa thành công sản phẩm: '.$product->name);
        }
        return redirect()->back()->with('false', 'Xóa sản phẩm không thành công!');
    }
}