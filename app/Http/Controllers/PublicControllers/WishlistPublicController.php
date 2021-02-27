<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WishlistPublicController extends Controller
{
    /**
     * Index user wishlist
     */
    public function index(){
        $data['user'] = auth()->user();
        $data['products'] = $data['user']->wishlists;
        return view('@public.wishlist.index', $data);
    }

    /**
     * Store user wishlist
     */
    public function store(Request $request){
        $data['product'] = Product::getOneBy('uuid', $request->wishlist_product);
        $data['user'] = auth()->user();

        // Check added before
        $wishlist = Wishlist::where('user_id', $data['user']->id)->where('product_id', $data['product']->id)->first();
        if(!$wishlist){
            $resource = Wishlist::create([
                'user_id' => $data['user']->id,
                'product_id' => $data['product']->id,
            ]);
        }else{
            $resource = false;
        }

        // Return
        if($resource){
            return back()->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

}
