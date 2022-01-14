<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;
use App\Models\Settings;
use Illuminate\Auth\Events\Verified;

class AuthController extends Controller
{
    

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials, request()->has('remember') )) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'authenticate' => 'Credentials do not matched our records.'
        ])->withInput();    
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with(['msg' => 'You signed out!', 'msg_type' => 'warning']);
    }
    public function login()
    {
        $Settings = Settings::get('registration');
        return view('auth.login', compact('Settings'));
    }
    public function verificationNotice()
    {
         return view('auth.verify-email');
    }
    public function register(RegisterRequest $request){
        $Settings = Settings::get('registration');

        $userData= $request->getUserData();

        $user = new User;
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = $userData['password'];

        if(!isset($Settings['email_verification_on_reg']) || $Settings['email_verification_on_reg'] != 1){
            $user->email_verified_at = $userData['email_verified_at'];
            $user->save();
            $user->assign($request->role);
            Auth::loginUsingId($Settings['default_role']);
            return Redirect::route('admin')->with(['msg' => 'Thanks for registration', 'msg_type' => 'success']);
        }
        else{
            $user->save();
            $user->assign($Settings['default_role']);
            Auth::loginUsingId($user->id);   
            $user->sendEmailVerificationNotification();
            return Redirect::route('verification.notice')->with(['msg' => 'User added', 'msg_type' => 'success']);
        }
    }

}
