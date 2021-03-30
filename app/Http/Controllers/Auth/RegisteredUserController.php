<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Webpatser\Uuid\Uuid;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('@authentication.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'dob' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $parent_id = rand(1, User::count());
        Auth::login($user = User::create([
            'uuid' => Uuid::generate()->string,
            'parent_id' => $parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->lookup_gender_id,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }


    /**
     * Order store.
     */
    public function order_store(Request $request)
    {
//        dd(url()->previous());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
        ]);

        $parent_id = rand(1, User::count());
        $password = rand(111111111, 999999999);

        $user = User::create([
            'uuid' => Uuid::generate()->string,
            'parent_id' => $parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => '',
            'gender' => 1,
            'password' => Hash::make($password),
        ]);

        $resource = Address::create([
            'user_id' => $user->id,
            'country_id' => null,
            'city_id' => null,
            'area_id' => null,
            'address' => $request->address,
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $password])) {
            // Add Session Cart To Table
            if(session()->has('carts')){
                foreach (session('carts') as $product_uuid => $product_quantity){
                    $product = Product::getOneBy('uuid', $product_uuid);
                    $old_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
                    if(!$old_cart){
                        $new_cart = Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $product->id,
                            'quantity' => $product_quantity[0],
                        ]);
                    }
                }
            }
        }

        $data['message'] = [
            'type'=>'success',
            'text'=> trans('messages.you_are_in')
        ];

        return back()->with('message', $data['message']);
    }
}
