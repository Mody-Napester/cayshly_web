<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
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

        if($data['store']->count() > 0){
            $data['store']->update(['views' => DB::raw('views + 1')]);
        }else{
            return back();
        }

        $data['products'] = $data['store']->products()->inRandomOrder()->paginate(36);

        return view('@public.store.show', $data);
    }

}
