<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $banners = Banner::orderby('id','ASC')->limit(3)->get();
        $topCategory = Category::orderBy('id','ASC')->limit(3)->get();
        $topProduct = Product::inRandomOrder()->limit(3)->get();
        $product = Product::orderby('id','DESC')->limit(3)->get();
        return view('site.index', compact('topProduct','topCategory','product', 'banners','blogs'));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('id','DESC')->paginate(2);
        return view('site.blog-list', compact('blogs'));
    }
    public function blog_detail(Blog $blog)
    {
        // dd($blog);
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        return view('site.blog-detail', compact('blog', 'blogs'));
    }
    public function about()
    {
        return view('site.about');
    }

    public function contact()
    {
        return view('site.contact');
    }
    public function post_contact(Request $request)
    {
        $data = $request->only('name','email','phone','address','title','description');
        if (Contact::create($data)) {
            return redirect()->back()->with('true', 'Gửi liên hệ thành công');
        }
        return redirect()->back()->with('false', 'Gửi liên hệ thất bại');
    }
    
    public function register()
    {
        return view('site.customer.register');
    }

    public function check_register(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $data = $request->only('name', 'phone','email','address');
        $data['password'] = bcrypt($request->password);
        if ($customer = Customer::create($data)) {
            auth('customer')->loginUsingId($customer->id);
            return redirect()->route('site.index')->with('true', 'Đăng ký thành công');
        }
        return redirect()->back()->with('false', 'Đăng ký thất bại');
    }

    public function logout()
    {
        auth('customer')->logout();
        return redirect()->route('site.index')->with('true', 'Đăng xuất thành công');
    }

    public function login()
    {
        return view('site.customer.login');
    }

    public function check_login(Request $request)
    {
        $customer = $request->only('email','password');
        $check = auth()->guard('customer')->attempt($customer, $request->has('remember'));        
        if ($check) {
            return redirect()->route('site.index')->with('true', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('false', 'Đăng nhập thất bại');
    }

    public function shop(Request $request)
    {
        $product = Product::orderBy('id', 'DESC')->paginate(6);
        $keyword = $request->keyword;
        if ($keyword) {
            $product = Product::where('name','like','%'.$keyword.'%')->paginate();
        }
        if($request->has('from') and ('to')) {
            $product = Product::where('name','like','%'.$keyword.'%')->whereBetween('price',[request('from'), request('to')])->paginate();
        }
        return view('site.shop', compact('product'));
    }

    
    public function category_detail(Request $request, Category $category)
    {
        $products = $category->products()->paginate();
        $keyword = $request->keyword;
        if ($keyword) {
            $products = $category->products()->where('name','like','%'.$keyword.'%')->paginate();
        }
        if($request->has('from') and ('to')) {
            $products = $category->products()->whereBetween('price',[request('from'), request('to')])->paginate();
        }
        return view('site.category', compact('products', 'category'));
    }

    public function product_detail(Product $product)
    {
        $relatedProduct = Product::inRandomOrder()->where('category_id', $product->category_id)->limit(3)->get();
        return view('site.product-detail', compact('product','relatedProduct'));
    }
    

    public function update_user ()
    {
        return view('site.customer.profile');
    }

    public function post_update (Request $request, Customer $user)
    {
        $data = $request->only('name','phone','email','address');
        if (auth('customer')->user()->update($data)) {
            return redirect()->route('site.index')->with('true','Cập nhật thông tin người dùng thành công');
        }
        return redirect()->back()->with('false','Cập nhật thông tin người dùng thất bại');
    }
    
    public function change_password ()
    {
        return view('site.customer.password');
    }

    public function update_password (Request $request, Customer $user)
    {
        $request->validate([
            'old_password' => [
                'required',
                function($attribute, $value, $fail) {
                    $customer = auth('customer')->user();
                    $check = Hash::check($value, $customer->password);
                }
            ],
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $new_password = bcrypt($request->password);
        if (auth('customer')->user()->update(['password' => $new_password])) {
            return redirect()->route('site.index')->with('true','Cập nhật mật khẩu thành công');
        }
        return redirect()->back()->with('false','Cập nhật mật khẩu thất bại');
    }

}