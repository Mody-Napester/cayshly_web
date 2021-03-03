<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
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
        if (!check_authority('index.order')){
            return redirect('/');
        }

        $data['resources'] = Order::paginate(config('vars.pagination'));
        return view('@dashboard.order.index', $data);
    }

    /**
     * Display a listing of details.
     */
    public function details($order){
        // Check Authority
        if (!check_authority('index.order')){
            return redirect('/');
        }

        $data['order'] = Order::getOneBy('uuid', $order);
        $data['details'] = OrderDetail::getAllBy('order_id', $data['order']->id);

        return view('@dashboard.order.details', $data);
    }
}
