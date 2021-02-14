<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Home
    public function home(){
        return view('@dashboard/home/index');
    }
}
