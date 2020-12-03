<?php

namespace App\Contracts\Dao\API;

interface UserAPIDaoInterface
{
    /**
     * get the User List
     * @return array userList
     */
    public function index();
}