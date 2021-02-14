<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home
    public function home(){
        return view('@public/home/index');
    }
}
