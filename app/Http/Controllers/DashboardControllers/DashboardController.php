<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Home
    public function home(){
        // Check Authority
        if (!User::hasAuthority('index.dashboard')){
            return redirect('/');
        }

        return view('@dashboard/home/index');
    }
}
