<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
    public function show_products($category)
    {
        $data['category'] = Category::getOneBy('slug', $category);
        return view('@public.category.products.show', $data);
    }

    /**
     * Display child for category.
     */
    public function show_child($category)
    {
        $data['category'] = Category::getOneBy('slug', $category);
        return view('@public.category.child.show', $data);
    }
}
