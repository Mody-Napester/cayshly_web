<?php

// Get from json
function getFromJson($json , $lang){
    $data = json_decode($json, true);
    return $data[$lang];
}

// Get path
function get_path($path){
    return base_path() . '/' . config('vars.public') . '/' . $path;
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
    return \App\Models\Lookup::getAllBy('parent_id', $lookup->id);
}

// Get lookups
function str_well($value){
    return ucfirst(str_replace('_', ' ', $value));
}

// Human Date
function human_date($date){
//    $editDate = str_replace('-0001-11-30', '2016-11-30', $date);
    return Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
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

