<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['products'] = Product::getAllBy('is_active', 1);
        return view('@public.product.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Index best sales products.
     */
    public function index_best_sales_products()
    {
        $data['products'] = Product::where('is_active', 1)->paginate(30);
        return view('@public.product.best.index', $data);
    }

    /**
     * Index by free products.
     */
    public function index_by_free_products()
    {
        $data['products'] = Product::where('is_active', 1)->paginate(30);
        return view('@public.product.free.index', $data);
    }

}
