<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CustomerOrderController;
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
    Route::post('/shop', [HomeController::class, 'search']);
    Route::get('/tin-tuc', [HomeController::class, 'blogs'])->name('blog.list');
    Route::get('/tin-tuc/{blog}', [HomeController::class, 'blog_detail'])->name('blog.detail');
    Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('site.about');
    Route::get('/lien-he', [HomeController::class, 'contact'])->name('site.contact');
    Route::post('/lien-he', [HomeController::class, 'post_contact']);
    Route::get('/danh-muc/{category}', [HomeController::class, 'category_detail'])->name('category.detail');
    Route::get('/san-pham/{product}', [HomeController::class, 'product_detail'])->name('product.detail');
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
    Route::resource('material', MaterialController::class);
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