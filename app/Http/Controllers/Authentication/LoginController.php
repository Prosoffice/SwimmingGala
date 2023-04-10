<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    private function authenticateUser($request): bool
    {
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(Auth::attempt($loginData)){
            return true;
        }
        else{
            return false;
        }
    }

    public function login(): View
    {
        return view('Authentication.login');
    }

    public function handleLogin(Request $request) : RedirectResponse
    {
        if ($this->authenticateUser($request)) {
            $message = [
                'message'=>"Login Successful",
                'alert-type'=>"success"
            ];
            return redirect('/dashboard')->with($message);
        } else {
            $message = [
                'message'=>"Invalid login details",
                'alert-type'=>"error"
            ];
            return redirect('/login')->with($message);
        }
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }

}
