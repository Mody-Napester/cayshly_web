<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StorePublicController extends Controller
{
    /**
     * Index all stores.
     */
    public function index(){
        $data['stores'] = Store::getAllActiveBy('is_active', 1);
        return view('@public.store.index', $data);
    }

    /**
     * Show store.
     */
    public function show($store){
        $data['store'] = Store::getOneActiveBy('slug', $store);
        return view('@public.store.show', $data);
    }

}
