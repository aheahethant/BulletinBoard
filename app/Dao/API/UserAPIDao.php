<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use App\Models\User;

class UserAPIDao implements UserAPIDaoInterface
{
    /**
     * user List
     * @return $userList
     */
    public function index()
    {
        return User::with('user')->get();
    }
}