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

            if(auth()->check()){
                $products = DB::table('carts')
                    ->join('products', 'carts.product_id', '=', 'products.id')
                    ->where('carts.user_id', auth()->user()->id);

                $data['header_cart_product_count'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
                $data['header_cart_price_sum'] = $products->sum('products.price');
            }else{
                if(session()->has('carts')){
                    $data['header_cart_price_sum'] = 0;
                    foreach (session('carts') as $product_uuid => $product_quantity){
                        $product = Product::getOneBy('uuid', $product_uuid);
                        $single_price = intval($product->price) * intval($product_quantity);
                        $data['header_cart_price_sum'] += $single_price;
                    }
                    $data['header_cart_product_count'] = count(session('carts'));
                }else{
                    $data['header_cart_price_sum'] = 0;
                    $data['header_cart_product_count'] = 0;
                }
            }

//            session()->flush();

            $view->with($data);
        });
    }
}
