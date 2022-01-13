<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


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
        ]);    
    }
}
