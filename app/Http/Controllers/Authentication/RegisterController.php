<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(): View
    {
        return view('Authentication.register');
    }

    public function handleRegister(Request $request) : RedirectResponse
    {
        $validRegistrationData = $request->validate([
            'email'=>'required|email|max:225|unique:users,email',
            'first_name' => 'required|max:225',
            'last_name' => 'required|max:225',
            'password' => 'required|min:7|max:255'
        ]);
        $newUser = $this->userService->registerUser($validRegistrationData);
        $message = [
            'message'=>"Registration Successful",
            'alert-type'=>"success"
        ];
        return redirect('/dashboard')->with($message);
    }

}
