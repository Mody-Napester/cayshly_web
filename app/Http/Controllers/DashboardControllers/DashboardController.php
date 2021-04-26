<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Home
    public function home(){
        // Check Authority
        if (!check_authority('index.dashboard')){
            return redirect('/');
        }

        $data['resources'] = Order::orderBy('id', 'desc')->where('created_at', 'like', "%" . date('Y-m-d') . "%")->get();

        return view('@dashboard/home/index', $data);
    }
}
