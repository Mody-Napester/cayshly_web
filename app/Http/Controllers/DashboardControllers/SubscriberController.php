<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!User::hasAuthority('index.subscriber')){
            return redirect('/');
        }

        $data['resources'] = Subscriber::paginate(config('vars.pagination'));
        return view('@dashboard.subscriber.index', $data);
    }
}
