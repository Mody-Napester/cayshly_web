<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Point;
use Illuminate\Http\Request;

class PointPublicController extends Controller
{
    /**
     * Index user point
     */
    public function index(){
        $data['user'] = auth()->user();
        $data['points'] = auth()->user()->points;
        return view('@public.point.index', $data);
    }

}
