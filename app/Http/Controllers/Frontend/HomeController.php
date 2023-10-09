<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Customer;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Color;
use App\Models\Size;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderby('id', 'DESC')->get();
        $banners = Banner::orderby('id', 'DESC')->get();
        $categories = Category::orderby('id', 'DESC')->limit(5)->get();
        $products = Product::orderby('id', 'DESC')->paginate(12);
        $sizes = Size::orderby('id', 'DESC')->get();
        $colors = Color::orderby('id', 'DESC')->get();

        return view('site.index', compact('categories', 'banners', 'blogs', 'products', 'colors', 'sizes'));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(2);
        return view('site.blog-list', compact('blogs'));
    }
    public function blog_detail(Blog $blog)
    {
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
        Mail::to($request->email)->send(new ContactMail($request->first_name, $request->last_name, $request->email, $request->phone, $request->address, $request->subject, $request->mail_body));
        return redirect()->route('site.contact')->with('true', 'Contact has been sent');
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
        $data = $request->only('first_name', 'last_name', 'phone', 'email', 'address');
        $data['password'] = bcrypt($request->password);
        if ($customer = Customer::create($data)) {
            auth('customer')->loginUsingId($customer->id);
            return redirect()->route('site.index')->with('true', 'Registered successfully');
        }
        return redirect()->back()->with('false', 'Register failed');
    }

    public function logout()
    {
        auth('customer')->logout();
        return redirect()->route('site.index')->with('true', 'Loged out');
    }

    public function login()
    {
        return view('site.customer.login');
    }

    public function check_login(Request $request)
    {
        $customer = $request->only('email', 'password');
        $check = auth()->guard('customer')->attempt($customer, $request->has('remember'));
        if ($check) {
            return redirect()->route('site.index')->with('true', 'Loged in successfully');
        }
        return redirect()->back()->with('false', 'invalid email or password');
    }

    public function shop(Request $request)
    {
        $sortBy = request('sortby', 'id');
        $sort = request('sort', 'DESC');
        $from = request('from');
        $to = request('to');
        $colorName = request('color');
        $sizeName = request('size');

        $size = Size::where('name', $sizeName)->get('id')->toArray();
        $productIds = ProductSize::where('size_id', $size)->get('product_id')->toArray();

        $color = Color::where('name', $colorName)->get('id')->toArray();

        $query = Product::orderby($sortBy, $sort);

        if ($sortBy) {
            $query = $query->orderBy($sortBy, $sort);
        }

        if ($to) {
            $query = $query->whereBetween('price', [$from, $to]);
        }

        if ($colorName) {
            $query = $query->where('color_id', $color);
        }

        if ($sizeName) {
            $query = $query->whereIn('id', $productIds);
        }

        $products = $query->paginate(12);
        return view('site.shop', compact('products'));

    }

    public function category_detail(Request $request, Category $category)
    {
        $sortBy = request('sortby', 'id');
        $sort = request('sort', 'DESC');
        $from = request('from');
        $to = request('to');
        $colorName = request('color');
        $sizeName = request('size');

        $size = Size::where('name', $sizeName)->get('id')->toArray();
        $productIds = ProductSize::where('size_id', $size)->get('product_id')->toArray();

        $color = Color::where('name', $colorName)->get('id')->toArray();

        $query = $category->products()->orderBy($sortBy, $sort);

        if ($sortBy) {
            $query = $query->orderBy($sortBy, $sort);
        }

        if ($to) {
            $query = $query->whereBetween('price', [$from, $to]);
        }

        if ($colorName) {
            $query = $query->where('color_id', $color);
        }

        if ($sizeName) {
            $query = $query->whereIn('id', $productIds);
        }

        $products = $query->paginate(12);
        return view('site.category', compact('products', 'category'));
    }

    public function product_detail(Product $product)
    {
        $sizeIds = $product->sizes->pluck('size_id')->toArray();
        $sizes = Size::whereIn('id', $sizeIds)->get()->toArray();

        $relatedProduct = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->inRandomOrder()->limit(4)->get();
        return view('site.product-detail', compact('product', 'sizes', 'relatedProduct'));
    }


    public function update_user()
    {
        return view('site.customer.profile');
    }

    public function post_update(Request $request, Customer $user)
    {
        $data = $request->only('first_name', 'last_name', 'phone', 'email', 'address');
        if (auth('customer')->user()->update($data)) {
            return redirect()->route('site.index')->with('true', "User's information updated successfully");
        }
        return redirect()->back()->with('false', 'Update information failed');
    }

    public function change_password()
    {
        return view('site.customer.password');
    }

    public function update_password(Request $request, Customer $user)
    {
        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $customer = auth('customer')->user();
                    $check = Hash::check($value, $customer->password);
                }
            ],
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $new_password = bcrypt($request->password);
        if (auth('customer')->user()->update(['password' => $new_password])) {
            return redirect()->route('site.index')->with('true', 'Password updated successfully');
        }
        return redirect()->back()->with('false', 'Password update failed');
    }

    public function search(Request $request)
    {
        $keyword = request('keyword');
        $sortBy = request('sortby', 'id');
        $sort = request('sort', 'DESC');
        $from = request('from');
        $to = request('to');

        $colorName = request('color');
        $sizeName = request('size');

        $size = Size::where('name', $sizeName)->get('id')->toArray();
        $productIds = ProductSize::where('size_id', $size)->get('product_id')->toArray();

        $color = Color::where('name', $colorName)->get('id')->toArray();

        $query = Product::where('name', 'like', '%' . $keyword . '%');

        if ($sortBy) {
            $query = $query->orderBy($sortBy, $sort);
        }

        if ($to) {
            $query = $query->whereBetween('price', [$from, $to]);
        }

        if ($colorName) {
            $query = $query->where('color_id', $color);
        }

        if ($sizeName) {
            $query = $query->whereIn('id', $productIds);
        }

        $products = $query->paginate(12);
        return view('site.search', compact('products'));
    }

}