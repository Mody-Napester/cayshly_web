<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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
    public function show($product)
    {
        $data['product'] = Product::where('slug', $product)->first();
        if($data['product']->picture == ''){
            $data['product']->picture = 'placeholder.jpg';
        }
        $data['option_parent'] = DB::table('options')->join('product_option', 'options.id', '=','product_option.option_id')
            ->where('product_id', $data['product']->id)
            ->groupBy('options.parent_id')
            ->select('options.parent_id')
            ->pluck('parent_id');

        $data['options'] = [];
        foreach ($data['option_parent'] as $key => $parent){
            $data['options'][$key]['parent'] = Option::where('id', $parent)->first();
            foreach (Option::where('parent_id', $parent)->get() as $child){
                $child_data = DB::table('options')
                    ->join('product_option', 'options.id', '=','product_option.option_id')
                    ->where('product_option.product_id', $data['product']->id)
                    ->where('product_option.option_id', $child->id)
                    ->select('options.*')
                    ->get();
                if(count($child_data) > 0){
                    $data['options'][$key]['child'][] = $child_data;
                }
            }
        }
        $data['similar_products'] = Product::where('brand_id', $data['product']->brand_id)
            ->where('id', '<>',$data['product']->id)
            ->limit(20)
            ->get();
        return view('@public.product.show', $data);
    }

    /**
     * Index best sales products.
     */
    public function index_best_sales_products()
    {
        $data['products'] = Product::inRandomOrder()->where('is_active', 1)->paginate(30);
        return view('@public.product.best.index', $data);
    }

    /**
     * Index by free products.
     */
    public function index_by_free_products()
    {
        $data['products'] = Product::inRandomOrder()->where('is_active', 1)->paginate(30);
        return view('@public.product.free.index', $data);
    }

}
