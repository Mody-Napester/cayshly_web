<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['categories'] = Category::getAllBy('parent_id', 0);
        return view('@public.category.index', $data);
    }

    /**
     * Display products for category.
     */
    public function show($category)
    {
        $data['category'] = Category::getOneBy('slug', $category);
        $data['categories'] = Category::getAllBy('parent_id', $data['category']->id);
        return view('@public.category.show', $data);
    }

    /**
     * Display child for category.
     */
    public function products($category)
    {
        $data['category'] = Category::getOneBy('slug', $category);
        $data['products'] = $data['category']->products()->active()->paginate(30);
        return view('@public.category.product.index', $data);
    }
}
