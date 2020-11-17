<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;

class UserController extends Controller
{
    private $userInterface;

    /**
     * create a new controller instance
     * 
     * @param UserServiceInterface
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * show the User List
     * 
     * @return userList
     */
    public function getUserList()
    {
        return $this->userInterface->getUserList();
    }
}
