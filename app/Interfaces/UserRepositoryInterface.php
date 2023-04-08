<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(Array $newUserDetails);
    public function updateUserDetails(int $id, Array $userUpdateDetails);
}
