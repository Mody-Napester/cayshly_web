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
     * Destroy user wishlist
     */
    public function destroy($wishlist){
        $data['wishlist'] = Wishlist::getOneBy('uuid', $wishlist);

        // Return
        if($data['wishlist']){
            $data['wishlist']->delete();

            return back()->with('message', [
                'type' => 'success',
                'text' => 'Deleted successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Error!, Please try again later.'
            ]);
        }
    }

}
