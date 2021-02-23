<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandPublicController extends Controller
{
    /**
     * Index all brands.
     */
    public function index(){
        $data['brands'] = Brand::getAllBy('is_active', 1);
        return view('@public.brand.index', $data);
    }

}