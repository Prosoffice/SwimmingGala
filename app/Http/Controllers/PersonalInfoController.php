<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\View\View;

class PersonalInfoController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function account(): View
    {
        return view('Dashboard.account');
    }

    public function handleUpdateAccount()
    {

    }

}
