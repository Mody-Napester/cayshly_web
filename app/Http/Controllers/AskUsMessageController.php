<?php

namespace App\Http\Controllers;

use App\Models\AskUsMessage;
use Illuminate\Http\Request;

class AskUsMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check Authority
//        if (!check_authority('index.message')){
//            return redirect('/');
//        }

        $data['resources'] = AskUsMessage::all();
        return view('@dashboard.message.index', $data);
    }

    // ask_us
    public function store(Request $request){

        $ask_message = new AskUsMessage();
        $ask_message->email = $request->email;
        $ask_message->phone = $request->phone;
        $ask_message->message = $request->message;
        $ask_message->save();

        if($ask_message){
            $data['message'] = [
                'type'=>'success',
                'title'=> trans('messages.Thank_You'),
                'text'=> trans('messages.Your_message_was_sent')
            ];
        }else{
            $data['message'] = [
                'type'=>'danger',
                'title'=> trans('messages.Sorry'),
                'text'=> trans('messages.Sorry_some_thing_error')
            ];
        }

        return response($data);
    }
}
