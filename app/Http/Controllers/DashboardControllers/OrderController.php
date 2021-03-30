<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Point;
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
        if (!check_authority('index.orders')){
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
        if (!check_authority('index.orders')){
            return redirect('/');
        }

        $data['order'] = Order::getOneBy('uuid', $order);
        $data['details'] = OrderDetail::getAllBy('order_id', $data['order']->id);
        $data['deliver_status'] = lookups('deliver_status');

        $data['total_pre_deliver_price'] = 0;
        $data['total_deliver_price'] = 0;
        foreach ($data['details'] as $detail){
            $data['total_pre_deliver_price'] += ($detail->product_quantity * $detail->product_price);
            $data['total_deliver_price'] += ($detail->quantity_delivered * $detail->product_price);
        }

        return view('@dashboard.order.details', $data);
    }

    /**
     * Update details.
     */
    public function update_details(Request $request){
        // Check Authority
        if (!check_authority('index.orders')){
            return redirect('/');
        }
//        dd($request->all());

        if ($request->has('order')){
            $order = $request->order;
            $data['order'] = Order::getOneBy('uuid', $request->order);
            $data['details'] = OrderDetail::getAllBy('order_id', $data['order']->id);

            foreach ($data['details'] as $detail) {

                if(key_exists($detail->uuid, $request->deliver_status)){
                    // Update detail
                    $deliver_status_id = lookup('uuid', $request->deliver_status[$detail->uuid])->id;
                    $detail->update([
                        'lookup_deliver_status_id' => $deliver_status_id,
                        'deliver_date' => $request->deliver_date[$detail->uuid],
                        'quantity_delivered' => $request->quantity_delivered[$detail->uuid],
                        'comments' => $request->comments[$detail->uuid],
                        'updated_by' => auth()->user()->id,
                    ]);

                    // Add points if delivered ( Lookup ID  = 23)
                    if ($deliver_status_id == 23){
                        if($detail->quantity_delivered > 0){
                            $point = new Point();
                            $point->user_id = $data['order']->user_id;
                            $point->amount = ($detail->product_points * $detail->quantity_delivered);
                            $point->lookup_point_reason_id = 27; // a_successful_purchase
                            $point->product_id = $detail->product_id;
                            $point->save();
                        }
                    }
                }
            }

            // Return
            return back()->with('message', [
                'type' => 'success',
                'text' => 'Order Updated successfully'
            ]);
        }else{
            return back();
        }
    }
}
