<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::UseBootstrap();
        view()->composer('*', function($view){
            $cat_global = Category::orderBy('id','ASC')->get();
            $cart = new Cart();
            $product_global = Product::orderBy('id','DESC')->paginate(16);
            $color_global = Color::orderby('id','DESC')->get();
            $size_global = Size::orderby('id','DESC')->get();
            $view->with(compact('cat_global','product_global','color_global','size_global', 'cart'));
        });
    }
}
