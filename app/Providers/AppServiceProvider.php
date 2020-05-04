<?php

namespace App\Providers;

use URL;
use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use App\Brand;
use Session;

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
        if ($this->app->environment() == 'production') {
            URL::forceScheme('https');
        }
        view()->composer('../header', function ($view) {
            $loai_sp = ProductType::where('status',1)->get();
            $view->with('loai_sp', $loai_sp);
        });
        view()->composer('../header', function ($view) {
            $nha_cung_cap_sp = Brand::where('status',1)->get();
            $view->with('nha_cung_cap_sp', $nha_cung_cap_sp);
        });
        view()->composer(['../header', 'page.checkout'], function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
            }
        });
    }
}
