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
        if(!auth()->check()){
            return redirect('/');
        }

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

    /**
     * Update user address
     */
    public function update(Request $request, $address){
        $data['user'] = auth()->user();
        $data['address'] = Address::where('uuid', $address)->first();

        $resource = $data['address']->update([
            'address' => $request->address,
        ]);

        if($resource){
            return back()->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Some thing wrong, try again later.'
            ]);
        }
    }

    /**
     * Delete user address
     */
    public function delete($address){
        $data['user'] = auth()->user();
        $data['address'] = Address::where('uuid', $address)->first();

        if($data['address'] and $data['address']->user_id == $data['user']->id){
            $data['address']->delete();

            return back()->with('message', [
                'type' => 'success',
                'text' => 'Deleted successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Some thing wrong, try again later.'
            ]);
        }
    }

}
