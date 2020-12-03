<?php

namespace App\Contracts\Services\API;

interface UserAPIServiceInterface
{
    /**
     * get the User List
     * @return array userList
     */
    public function index();
}