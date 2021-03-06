<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use App\Models\Social;
use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

        view()->composer('@public._layouts.master', function ($view) {
            $data['categories'] = Category::getAllBy('parent_id', 0);
            $data['contact'] = Contact::getOneBy('is_default', 1);
            $data['socials'] = Social::all();
            $data['pages'] = Page::all();

            $cart_details = Cart::details();
            $data['header_cart_products'] = $cart_details['cart_products'];
            $data['header_cart_product_count'] = $cart_details['cart_product_count'];
            $data['header_cart_price_sum'] = $cart_details['cart_price_sum'];

            $view->with($data);
        });
    }
}
