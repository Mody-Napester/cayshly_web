<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartPublicController extends Controller
{
    /**
     * Index cart.
     */
    public function details(){

        if(auth()->check()){
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', auth()->user()->id);

            $data['cart_products'] = $products->select('products.*')->get();
            $data['cart_product_count'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
            $data['cart_price_sum'] = $products->sum('products.price');
        }else{
            if(session()->has('carts')){
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                foreach (session('carts') as $product_uuid => $product_quantity){
                    $product = Product::getOneBy('uuid', $product_uuid);
                    $data['cart_products'][] = $product;
                    $single_price = intval($product->price) * intval($product_quantity);
                    $data['cart_price_sum'] += $single_price;
                }
                $data['cart_product_count'] = count(session('carts'));

            }else{
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                $data['cart_product_count'] = 0;
            }
        }

        return view('@public.cart.details', $data);
    }

    /**
     * Add to cart.
     */
    public function store(Request $request){
        $item = ($request->has('item'))? $request->item : null;
        if(!is_null($item)){
            $product = Product::getOneBy('uuid', $item);
            if($product){
                if(auth()->check()){
                    // Check Added before in table
                    $old_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();

                    // Add in table
                    if(!$old_cart){
                        $new_cart = Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $product->id,
                            'quantity' => 1,
                        ]);

                        $data['message'] = [
                            'type'=>'success',
                            'title'=> trans('messages.Added_to_cart'),
                            'text'=> trans('messages.This_item_has_been_added_to_your_cart')
                        ];
                    }else{
                        $data['message'] = [
                            'type'=>'danger',
                            'title'=> trans('messages.Not_Added_to_cart'),
                            'text'=> trans('messages.Sorry_item_added_before')
                        ];
                    }

                    $data['cart_price_sum'] = DB::table('carts')
                        ->join('products', 'carts.product_id', '=', 'products.id')
                        ->where('carts.user_id', auth()->user()->id)->sum('products.price');

                    $data['carts'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
                }else{
                    // Check Added before in table
                    if(session()->has('carts')){
                        $old_cart = key_exists($product->uuid, session('carts'));

                        // Add in session [Product id, Quantity]
                        if(!$old_cart){
                            $request->session()->push('carts.'.$product->uuid, 1);

                            $data['message'] = [
                                'type'=>'success',
                                'title'=> trans('messages.Added_to_cart'),
                                'text'=> trans('messages.This_item_has_been_added_to_your_cart')
                            ];
                        }else{
                            $data['message'] = [
                                'type'=>'danger',
                                'title'=> trans('messages.Not_Added_to_cart'),
                                'text'=> trans('messages.Sorry_item_added_before')
                            ];
                        }
                    }else{
                        $request->session()->push('carts.'.$product->uuid, 1);

                        $data['message'] = [
                            'type'=>'success',
                            'title'=> trans('messages.Added_to_cart'),
                            'text'=> trans('messages.This_item_has_been_added_to_your_cart')
                        ];
                    }

                    $data['cart_price_sum'] = 0;
                    foreach (session('carts') as $product_uuid => $product_quantity){
                        $product = Product::getOneBy('uuid', $product_uuid);
                        $single_price = intval($product->price) * intval($product_quantity);
                        $data['cart_price_sum'] += $single_price;
                    }

                    $data['carts'] = count(session('carts'));
                    $data['cart'] = session('carts');
                }

                return response($data);
            }else{
                $data['message'] = [
                    'type'=>'danger',
                    'title'=> trans('messages.Not_Added_to_cart'),
                    'text'=> trans('messages.Sorry_item_not_exists')
                ];

                return response($data);
            }
        }else{
            $data['message'] = [
                'type'=>'danger',
                'title'=> trans('messages.Not_Added_to_cart'),
                'text'=> trans('messages.Please_choose_item')
            ];

            return response($data);
        }
    }

    /**
     * Add to cart.
     */
    public function empty_cart(){

        if(auth()->check()){
            // Check Added before in table
            $carts = Cart::where('user_id', auth()->user()->id)->pluck('id')->toArray();
            if($carts){
                Cart::destroy($carts);

                $data['message'] = [
                    'type'=>'success',
                    'text'=> trans('messages.Cart_now_empty')
                ];
            }else{
                $data['message'] = [
                    'type'=>'danger',
                    'text'=> trans('messages.Sorry_item_cant_be_deleted')
                ];
            }
        }else{
            // Check Added before in table
            if(session()->has('carts')){
                session()->forget('carts');

                $data['message'] = [
                    'type'=>'success',
                    'text'=> trans('messages.Cart_now_empty')
                ];
            }else{
                $data['message'] = [
                    'type'=>'danger',
                    'text'=> trans('messages.Sorry_item_cant_be_deleted')
                ];
            }
        }

        return back()->with('message', $data['message']);
    }

    /**
     * remove product from cart.
     */
    public function remove($product_uuid){

        if(auth()->check()){
            $product = Product::getOneBy('uuid', $product_uuid);
            if($product){
                $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
                if($cart){
                    $cart->delete();

                    $data['message'] = [
                        'type'=>'success',
                        'text'=> trans('messages.Product_deleted')
                    ];
                }else{
                    $data['message'] = [
                        'type'=>'danger',
                        'text'=> trans('messages.Sorry_item_cant_be_deleted')
                    ];
                }
            }else{
                $data['message'] = [
                    'type'=>'danger',
                    'text'=> trans('messages.Sorry_item_not_fount')
                ];
            }
        }else{
            if(session()->has('carts')){
                session()->pull('carts.' . $product_uuid);

                $data['message'] = [
                    'type'=>'success',
                    'text'=> trans('messages.Product_deleted')
                ];
            }else{
                $data['message'] = [
                    'type'=>'danger',
                    'text'=> trans('messages.Sorry_item_cant_be_deleted')
                ];
            }
        }

        return back()->with('message', $data['message']);
    }

    /**
     * cart user details.
     */
    public function user_details(){

        if(auth()->check()){
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', auth()->user()->id);

            $data['cart_products'] = $products->select('products.*', 'quantity')->get();
            $data['cart_product_count'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
            $data['cart_price_sum'] = $products->sum('products.price');
        }else{
            if(session()->has('carts')){
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                foreach (session('carts') as $product_uuid => $product_quantity){
                    $product = Product::getOneBy('uuid', $product_uuid);
                    $product->quantity = $product_quantity[0];
                    $data['cart_products'][] = $product;
                    $single_price = intval($product->price) * intval($product_quantity);
                    $data['cart_price_sum'] += $single_price;
                }
                $data['cart_product_count'] = count(session('carts'));
            }else{
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                $data['cart_product_count'] = 0;
            }
        }

        if ($data['cart_product_count'] == 0){
            return redirect('/');
        }

        if(!session()->has('order')){
            // Add new order session
            $order = [
                ['address' => ''],
                ['payment' => '']
            ];
            session()->push('order', $order);
        }

        $data['cart_address'] = session('order')[0][0]['address'];
        $data['cart_payment'] = session('order')[0][1]['payment'];

        return view('@public.cart.user_details', $data);
    }

    /**
     * cart payment.
     */
    public function payment(Request $request){

        if(!session()->has('order')){
            return redirect('/');
        }else{
            if(!$request->has('cart_request_address')){
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => trans('messages.please_select_address')
                ]);
            }
            // $request->cart_request_address
            session()->put('order.0.0.address', $request->cart_request_address);

            $data['cart_address'] = session('order')[0][0]['address'];
            $data['cart_payment'] = session('order')[0][1]['payment'];
        }

        if(auth()->check()){
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', auth()->user()->id);

            $data['cart_products'] = $products->select('products.*', 'quantity')->get();
            $data['cart_product_count'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
            $data['cart_price_sum'] = $products->sum('products.price');
        }else{
            if(session()->has('carts')){
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                foreach (session('carts') as $product_uuid => $product_quantity){
                    $product = Product::getOneBy('uuid', $product_uuid);
                    $product->quantity = $product_quantity[0];
                    $data['cart_products'][] = $product;
                    $single_price = intval($product->price) * intval($product_quantity);
                    $data['cart_price_sum'] += $single_price;
                }
                $data['cart_product_count'] = count(session('carts'));
            }else{
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                $data['cart_product_count'] = 0;
            }
        }

        return view('@public.cart.payment', $data);
    }

    /**
     * cart review.
     */
    public function review(){

        if(!session()->has('order')){
            return redirect('/');
        }else{
            $data['cart_address'] = session('order')[0][0]['address'];
            $data['cart_payment'] = session('order')[0][1]['payment'];
        }

        if(auth()->check()){
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', auth()->user()->id);

            $data['cart_products'] = $products->select('products.*', 'quantity')->get();
            $data['cart_product_count'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
            $data['cart_price_sum'] = $products->sum('products.price');
        }else{
            if(session()->has('carts')){
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                foreach (session('carts') as $product_uuid => $product_quantity){
                    $product = Product::getOneBy('uuid', $product_uuid);
                    $product->quantity = $product_quantity[0];
                    $data['cart_products'][] = $product;
                    $single_price = intval($product->price) * intval($product_quantity);
                    $data['cart_price_sum'] += $single_price;
                }
                $data['cart_product_count'] = count(session('carts'));
            }else{
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                $data['cart_product_count'] = 0;
            }
        }

        // Cart Full Details
        $data['client_name'] = auth()->user()->name;
        $data['client_address'] = Address::getOneBy('uuid', $data['cart_address'])->address;
        $data['client_phone'] = auth()->user()->phone;
        $data['client_payment'] = 'Cash on delivery';

        return view('@public.cart.review', $data);
    }

    /**
     * cart complete.
     */
    public function complete(){

        if(!session()->has('order')){
            return redirect('/');
        }else{
            $data['cart_address'] = session('order')[0][0]['address'];
            $data['cart_payment'] = session('order')[0][1]['payment'];
        }

        // Add New Order
        $data['order_number'] = time().auth()->user()->id.rand(1111,9999);
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'address_name' => Address::getOneBy('uuid', $data['cart_address'])->address,
            'order_number' => $data['order_number'],
            'comments' => '',
            'lookup_payment_method_id' => 1,
        ]);

        // Order Details
        $carts = Cart::getAllBy('user_id', auth()->user()->id);
        foreach($carts as $cart){
            if ($cart){
                $product = Product::getOneBy('id', $cart->product_id);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'product_points' => $product->points,
                    'product_quantity' => $cart->quantity,
                    'lookup_deliver_status_id' => 0,
                    'deliver_date' => '',
                    'quantity_delivered' => 0,
                    'comments' => '',
                ]);
            }
        }

        // Clear Cart
        $this->empty_cart();

        // Clear Sessions
        session()->forget('order');

        return view('@public.cart.complete', $data);
    }



}
