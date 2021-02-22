<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OfferPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data['offers'] = Offer::getAllBy('is_active', 1);
        return view('@public.offer.index', $data);
    }
}
