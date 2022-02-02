<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IP;
use App\Models\Settings;
use Validator;
use App\Notifications\PushNotification;
use App\Http\Requests\Admin\SendNotificationRequest;
use Illuminate\Support\Facades\Notification;

class SendNotification extends Controller
{
    public  function index(){
        return view('admin.notification.index');
    }
    public function send(SendNotificationRequest $request){
        $notify = $request->getNotification();
        $Settings = Settings::get('general');
        $IPs= IP::pluck('ip');
        if(!empty($IPs)){
            Notification::send($IPs, new PushNotification($notify['title'], $notify['body'], $notify['action'], $notify['featured_image'], (isset($Settings['site_logo'])) ? $Settings['site_logo'] : ''));
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
