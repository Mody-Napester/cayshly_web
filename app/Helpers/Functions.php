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
    $editDate = str_replace('-0001-11-30', '2016-11-30', $date);
    return Carbon\Carbon::createFromTimeStamp(strtotime($editDate))->diffForHumans();
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

