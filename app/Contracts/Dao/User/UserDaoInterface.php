<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    /**
     * get User List
     * @return array UserList
     */
    public function getUserList();
}