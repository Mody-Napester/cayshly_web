<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserPublicController extends Controller
{
    /**
     * Show user profile.
     */
    public function show($user){
        if(!auth()->check()){
            return redirect('/');
        }

        $data['user'] = auth()->user();
        return view('@public.user.show', $data);
    }

    /**
     * Update user data
     */
    public function update(Request $request){

//        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            'phone' => 'required|string|max:20|min:4',
//            'password' => 'string|confirmed|min:8',
        ]);

        auth()->user()->update([
            'name' => $request->name,
//            'email' => $request->email,
            'phone' => $request->phone,
            'password' => ($request->has('password'))? Hash::make($request->password) : auth()->user()->password,
        ]);

        return back()->with('message', [
            'type' => 'success',
            'text' => trans('messages.Updated_successfully')
        ]);

        return redirect()->back();
    }

}
