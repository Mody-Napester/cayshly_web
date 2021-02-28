<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!User::hasAuthority('index.order')){
            return redirect('/');
        }

        $data['resources'] = Order::paginate(config('vars.pagination'));
        return view('@dashboard.order.index', $data);
    }
}
