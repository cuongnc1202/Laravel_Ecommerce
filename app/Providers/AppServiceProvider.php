<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Product;
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
            $view->with(compact('cat_global', 'cart'));

        });
    }
}
