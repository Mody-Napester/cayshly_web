<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePublicController extends Controller
{
    // Home
    public function home(){
        $data['sliders'] = Slider::all();
        $data['brands'] = Brand::getAllBy('is_active', 1);
        return view('@public/home/index', $data);
    }
}
