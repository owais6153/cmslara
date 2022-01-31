<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IP;
use Validator;
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
            echo 'Good';
        }
    }
    public function storeIP(Request $request){
        $validation = Validator::make($request->all(),[
          'ip' => 'required',
        ]);
        if ($validation->fails())
        {
            return response()->json(['error', 'Sorry we got an error in storing your IP!']);
        }
        else{
            $countIP = IP::where('ip', $request->ip)->count();
            if ($countIP < 1) {
                $ip = new IP();
                $ip->ip = $request->ip;
                $ip->save();
            }
        }

        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'IP stored'], 200);
    }
}
