<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CustomerOrderController;
use App\Http\Controllers\Helper\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [HomeController::class, 'login'])->name('site.login');
Route::post('/login', [HomeController::class, 'check_login']);
Route::get('/logout', [HomeController::class, 'logout'])->name('site.logout');
Route::get('/register', [HomeController::class, 'register'])->name('site.register');
Route::post('/register', [HomeController::class, 'check_register']);




Route::group(['prefix' => ''], function(){
    Route::get('/', [HomeController::class, 'index'])->name('site.index');
    Route::get('/shop', [HomeController::class, 'shop'])->name('site.shop');
    Route::get('/search', [HomeController::class, 'search'])->name('site.search');
    Route::get('/blog', [HomeController::class, 'blogs'])->name('blog.list');
    Route::get('/blog/{blog}', [HomeController::class, 'blog_detail'])->name('blog.detail');
    Route::get('/about-us', [HomeController::class, 'about'])->name('site.about');
    Route::get('/contact-us', [HomeController::class, 'contact'])->name('site.contact');
    Route::post('/contact-us', [HomeController::class, 'post_contact']);
    Route::get('/category/{category}', [HomeController::class, 'category_detail'])->name('category.detail');
    Route::get('/product/{product}', [HomeController::class, 'product_detail'])->name('product.detail');
    // Route::get('/product-quick-view/{product}', [HomeController::class, 'product_show'])->name('product.view');
});

Route::group(['prefix' => 'cart'], function() {
    Route::get('/view', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function() {
    Route::get('/update-user',  [HomeController::class, 'update_user'])->name('update.user');
    Route::post('/update-user', [HomeController::class, 'post_update']);
    Route::get('/change-password',  [HomeController::class, 'change_password'])->name('update.password');
    Route::post('/change-password', [HomeController::class, 'update_password']);
});

Route::group(['prefix' => 'order', 'middleware' => 'customer'], function() {
    Route::get('/checkout', [CustomerOrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/checkout', [CustomerOrderController::class, 'post_checkout']);
    Route::get('/history', [CustomerOrderController::class, 'history'])->name('order.history');
    Route::get('/detail/{order}', [CustomerOrderController::class, 'detail'])->name('order.detail');
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('banner', BannerController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('color',ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product', ProductController::class);
    Route::resource('blog', BlogController::class);
    Route::group(['prefix' => 'product'], function(){
        Route::get('/image/delete/{image}', [ProductController::class, 'delete_image'])->name('product.delete_image');
    });
    Route::group(['prefix' => 'contact'], function() {
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
        Route::put('/status/{contact}', [ContactController::class, 'status'])->name('contact.status');
        Route::get('/{contact}', [ContactController::class, 'show'])->name('contact.show');
    });
    Route::group(['prefix' => 'order'], function() {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::put('/status/{order}', [OrderController::class, 'status'])->name('order.status');
        Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
    });
    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/edit{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/update{customer}', [CustomerController::class, 'update'])->name('customer.update');
    });
});