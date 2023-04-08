<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    function createUser(array $newUserDetails)
    {
        $newUserDetails["password"] = Hash::make($newUserDetails["password"]);
        return User::create($newUserDetails);
    }

    function updateUserDetails(int $id, array $userUpdateDetails)
    {
        // TODO: Implement updateUserDetails() method.
    }
}
