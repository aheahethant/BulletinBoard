<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    /**
     * get User List
     * @return array UserList
     */
    public function getUserList();
}