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
    public function index(Request $request){
        // Check Authority
        if (!check_authority('index.orders')){
            return redirect('/');
        }

//        dd($request->all());

        if($request->has('number') || $request->has('date') || $request->has('by') || $request->has('status')){
            $data['resources'] = new Order;

            if($request->has('number') && !is_null($request->number)){
                $data['resources'] = $data['resources']->where('orders.order_number', 'like', "%".$request->number."%");
            }

            if($request->has('date_from') && $request->has('date_to') && !is_null($request->date_from) && !is_null($request->date_to)){
//                $data['resources'] = $data['resources']->where('orders.created_at', 'like', "%".$request->date."%");
                $data['resources'] = $data['resources']->whereBetween('orders.created_at', [$request->date_from, $request->date_to]);
            }

//            if($request->has('by') && !is_null($request->by)){
//                $data['resources'] = $data['resources']->join('users', 'orders.user_id', '=', 'users.id')->where('users.name', 'like', "%".$request->by."%");
//            }

            if($request->has('status') && $request->status != 'Choose'){
                $data['resources'] = $data['resources']->join('order_details', 'orders.id', '=', 'order_details.order_id');

                if($request->status == 1){
                    $data['resources'] = $data['resources']->where('order_details.quantity_delivered', '>' , 0);
                }
                if($request->status == 2){
                    $data['resources'] = $data['resources']->where('order_details.quantity_delivered', '>=' , 0);
                }
                if($request->status == 3){
                    $data['resources'] = $data['resources']->where('order_details.quantity_delivered', '==' , 0);
                }
            }

            $data['resources'] = $data['resources']->select('orders.*')->distinct()->paginate(50);

        }else{
            $data['resources'] = Order::orderBy('id', 'desc')->paginate(config('vars.pagination'));
        }

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

            $userTotalPoints = user_points($data['order']->user_id)['points'];

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
                            // Remove Points
//                            $totalPointsToRemove = $detail->product_points * $detail->quantity_delivered;
                            $totalPointsToRemove = $detail->product_price * 100;
                            if($userTotalPoints >= $totalPointsToRemove){
                                $pointsToRemove = $userTotalPoints - $totalPointsToRemove;
                                $userTotalPoints = $userTotalPoints - $pointsToRemove;
                            }else{
                                $pointsToRemove = $userTotalPoints;
                                $userTotalPoints = $userTotalPoints - $pointsToRemove;
                            }

                            if($data['order']->lookup_payment_method_id == 2) // Redeem
                            {
                                $point_up = new Point();
                                $point_up->user_id = $data['order']->user_id;
                                $point_up->amount = $pointsToRemove;
                                $point_up->lookup_point_reason_id = 34; // buy_products_by_redeem_points
                                $point_up->product_id = $detail->product_id;
                                $point_up->action = 0;
                                $point_up->save();
                            }

                            $point = new Point();
                            $point->user_id = $data['order']->user_id;
                            $point->amount = (($detail->product_points * $detail->quantity_delivered) * .75);
                            $point->lookup_point_reason_id = 27; // a_successful_purchase
                            $point->product_id = $detail->product_id;
                            $point->action = 1;
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
