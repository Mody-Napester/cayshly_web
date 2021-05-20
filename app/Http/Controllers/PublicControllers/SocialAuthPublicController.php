<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Validator;
use Exception;
use Webpatser\Uuid\Uuid;


class SocialAuthPublicController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {

            $user = Socialite::driver('facebook')->user();
//            $facebookId = User::where('facebook_id', $user->id)->first();
            $facebookId = User::where('email', $user->email)->first();

            if($facebookId){
                auth()->login($facebookId);
                return redirect('/');
            }else{
                $parent_id = rand(1, User::count());
                $createUser = User::create([
                    'uuid' => Uuid::generate()->string,
                    'parent_id' => $parent_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => Hash::make('123456789'),
                ]);

                auth()->login($createUser);

                // Add Points For Registration
                $point = new Point();
                $point->user_id = auth()->user()->id;
                $point->amount = config('vars.registration_points');
                $point->lookup_point_reason_id = config('vars.points_reason_new_registration'); // new_registration
                $point->product_id = null;
                $point->save();

                event(new Registered($user));

                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
