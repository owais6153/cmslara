<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IP;
use Validator;
use App\Notifications\PushNotification;
use Illuminate\Support\Facades\Notification;

class SendNotification extends Controller
{
    public  function index(){
        return view('admin.notification.index');
    }
    public function send(Request $request){
        $validation = Validator::make($request->all(),[
          'title' => 'required',
          'body' => 'required',
          'featured_image' => 'required',
          'action' => 'required',
        ]);

        if ($validation->fails())
        {
            return back()->withErrors($validation->messages()->getMessages())->withInput();
        }
        else{
            $IPs= IP::pluck('ip');
            if(!empty($IPs)){
                Notification::send($IPs, new PushNotification($request->title, $request->body, $request->action, $request->featured_image));
            }
            return back()->with(['msg' => 'Notification Sent.', 'msg_type' => 'success']);   
            
        }
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(),[
          'currentToken' => 'required',
        ]);
        if ($validation->fails())
        {
            return response()->json(['error', 'Sorry we got an error in storing your IP!']);
        }
        else{
            $countIP = IP::where('ip', $request->currentToken)->count();
            if ($countIP < 1) {
                $ip = new IP();
                $ip->ip = $request->currentToken;
                $ip->save();
            }
        }

        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'IP stored'], 200);
    }
}
