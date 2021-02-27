<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePublicController extends Controller
{
    // Home
    public function home(){
        $data['sliders'] = Slider::where('is_active', 1)->where('is_featured', 0)->get();
        $data['featured_sliders'] = Slider::where('is_active', 1)->where('is_featured', 1)->limit(2)->get();
        $data['trending_products'] = Product::inRandomOrder()->where('is_active', 1)->limit(30)->get();
        $data['offers'] = Offer::inRandomOrder()->where('is_active', 1)->limit(2)->get();
        $data['brands'] = Brand::getAllBy('is_active', 1);
        return view('@public/home/index', $data);
    }
}
