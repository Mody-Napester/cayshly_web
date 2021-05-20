<?php

// Get from json
use App\Models\Cart;

function getFromJson($json , $lang){
    if(!empty($json)){
        $data = json_decode($json, true);
        return $data[$lang];
    }else{
        return '-';
    }
}

function getProductAfterDiscount($product){
    $data['price'] = 0;
    $data['discount'] = 0;

    if($product->discount_type == 1){
        $data['price'] = $product->price;
        $data['discount'] = 0;
    }
    elseif($product->discount_type == 2){
        $data['price'] = $product->price - (($product->price * $product->discount_unit)/100);
        $data['discount'] = '- ' . round($product->discount_unit, 2) . ' %';
    }
    elseif($product->discount_type == 3){
        $data['price'] = $product->price - $product->discount_unit;
        $data['discount'] = '- ' . round($product->discount_unit, 2) . ' EGP';
    }

    return $data;
}

// Get path
function get_path($path){
    return base_path() . '/' . config('vars.public') . '/' . $path;
}

// Default language
function check_authority($authority){
    return \App\Models\User::hasAuthority($authority);
}

// Default language
function lang(){
    return app()->getLocale();
}

// System languages
function langs($get = null){
    $get_array = [];
    if($get == null){
        $get_array = config('vars.langs');
    }else{
        foreach (config('vars.langs') as $lang) {
            if($get == 'short_name'){
                $get_array[] = $lang['short_name'];
            }
        }
    }
    return $get_array;
}

// Get lookup
function lookup($by, $value){
    $results = null;
    $by_array = ['id','uuid','name','parent_id'];
    if (in_array($by, $by_array)){$results = \App\Models\Lookup::where($by, $value)->first();}
    return $results;
}

// Get lookups
function lookups($key){
    $lookup = \App\Models\Lookup::getOneBy('key', $key);
    if($lookup){
        return \App\Models\Lookup::getAllBy('parent_id', $lookup->id);
    }else{
        return null;
    }
}

// Get lookups
function str_well($value){
    return ucfirst(str_replace('_', ' ', $value));
}

// Custom Date
function custom_date($date){
    return date('d-m-Y, g:i:s a', strtotime($date));
}

// Human Date
function human_date($date){
//    $editDate = str_replace('-0001-11-30', '2016-11-30', $date);
    return Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
}

// User points
function user_points($user_id){
    $user = \App\Models\User::where('id', $user_id)->first();

    $data['up_points'] = $user->points()->where('action', 1)->sum('amount');
    $data['down_points'] = $user->points()->where('action', 0)->sum('amount');
    $data['points'] = $data['up_points'] - $data['down_points'];

    return $data;
}

// Check product in the cart
function check_product_in_the_cart($product){
    if (auth()->check()){
        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
    }else{
        if(session()->has('carts')){
            $cart = key_exists($product->uuid, session('carts'));
        }else{
            $cart = false;
        }
    }

    if ($cart){
        return true;
    }else{
        return false;
    }
}

// Products points schema
function pointify($price){
    $points = 0;
    switch ($price) {
        case $price >= 0 && $price <= 20 :
            $points = $price * (.08 * 100);
            break;

        case $price >= 21 && $price <= 60 :
            $points = $price * (.07 * 100);
            break;

        case $price >= 61 && $price <= 150 :
            $points = $price * (.06 * 100);
            break;

        case $price >= 151 && $price <= 400 :
            $points = $price * (.05 * 100);
            break;

        case $price >= 401 && $price <= 800 :
            $points = $price * (.05 * 100);
            break;

        case $price >= 801 && $price <= 2000 :
            $points = $price * (.04 * 100);
            break;

        case $price >= 2001 && $price <= 10000 :
            $points = $price * (.03 * 100);
            break;

        case $price >= 10001 && $price <= 100000 :
            $points = $price * (.02 * 100);
            break;

        case $price >= 100001 :
            $points = $price * (.01 * 100);
            break;
    }

    return $points;
}

// Upload files
function upload_file($type, $file, $path){

    $results = [
        'status' => false,
        'filename' => null,
        'message' => null,
    ];

    $extention = strtolower($file->getClientOriginalExtension());

    if ($type == 'image'){
        $validExtentions = ['jpg', 'png'];
    }
    elseif ($type == 'text'){
        $validExtentions = ['txt', 'doc'];
    }

    if (in_array($extention, $validExtentions)) {

        $filename = time().rand(1000,9999).'.'.$extention;
        $destinationPath = get_path($path);

        $upload = $file->move($destinationPath, $filename);

        if ($upload) {
            // File Uploaded
            $results['status'] = true;
            $results['filename'] = $filename;
            $results['message'] = 'Uploaded Successfully';

            return $results;
        }else{
            // Error Uploading
            $results['message'] = 'Error Uploading';

            return $results;
        }

    }else{
        // File not valid
        $results['message'] = 'File not valid';

        return $results;
    }
}

