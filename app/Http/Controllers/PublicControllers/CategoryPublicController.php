<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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
        $data['categories'] = Category::getAllActiveBy('parent_id', 0);
        return view('@public.category.index', $data);
    }

    /**
     * Display products for category.
     */
    public function show($category)
    {
        $data['category'] = Category::getOneActiveBy('slug', $category);
        $data['categories'] = Category::getAllActiveBy('parent_id', $data['category']->id);

        if($data['category']->count() > 0){
            $data['category']->update(['views' => DB::raw('views + 1')]);
        }else{
            return back();
        }

        return view('@public.category.show', $data);
    }

    /**
     * Display child for category.
     */
    public function products($category)
    {
        $data['category'] = Category::getOneActiveBy('slug', $category);
        $data['products'] = $data['category']->products()->active()->paginate(30);

        if($data['category']->count() > 0){
            $data['category']->update(['views' => DB::raw('views + 1')]);
        }else{
            return back();
        }

        return view('@public.category.product.index', $data);
    }
}
