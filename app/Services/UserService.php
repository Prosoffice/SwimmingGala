<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function authenticateUser($request): bool
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

    public function registerUser($validRegistrationData): User
    {
        return $this->userRepository->createUser($validRegistrationData);
    }

}
