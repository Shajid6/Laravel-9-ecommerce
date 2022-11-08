<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
   
        Paginator::useBootstrap();
    
        $websiteSetting = Setting::first();
        View::share('appSetting', $websiteSetting);

        $cart = Cart::first();
        view::share('cart', $cart);

        $brands = Brand::first();
        view::share('brands', $brands);

       
    }
}
