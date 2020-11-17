<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;

class UserDao implements UserDaoInterface
{
    /**
     * user List
     * @param Object
     * @return $userList
     */
    public function getUserList()
    {
        $users = User::all();
        return view('users.user_list', compact('users'));
    }
}