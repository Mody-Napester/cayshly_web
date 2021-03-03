<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AddressPublicController extends Controller
{
    /**
     * Index user address
     */
    public function index(){
        $data['user'] = auth()->user();
        return view('@public.address.index', $data);
    }

    /**
     * Store user address
     */
    public function store(Request $request){
        $data['user'] = auth()->user();
        $resource = Address::create([
            'user_id' => $data['user']->id,
            'country_id' => null,
            'city_id' => null,
            'area_id' => null,
            'address' => $request->user_address,
        ]);
        if($resource){
            return back()->with('message', [
                'type' => 'success',
                'text' => 'Added successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Already added before.'
            ]);
        }
    }

}
