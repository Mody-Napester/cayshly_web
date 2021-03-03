<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderPublicController extends Controller
{
    /**
     * Index user orders
     */
    public function index(){
        if(!auth()->check()){
            return redirect('/');
        }
        $data['user'] = auth()->user();
        return view('@public.order.index', $data);
    }

}
