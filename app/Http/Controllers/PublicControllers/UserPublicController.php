<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserPublicController extends Controller
{
    /**
     * Show user profile.
     */
    public function show($user){
        $data['user'] = auth()->user();
        return view('@public.user.show', $data);
    }

}
