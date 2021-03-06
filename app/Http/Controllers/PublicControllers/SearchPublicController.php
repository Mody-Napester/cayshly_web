<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class SearchPublicController extends Controller
{
    public function index($product){
        $data['key'] = $product;
        $data['products'] = Product::where('name','like','%'.$product.'%')->paginate(30);
        return view('@public.search.index', $data);
    }
}
