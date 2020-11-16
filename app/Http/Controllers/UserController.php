<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

class UserController extends Controller
{
    private $userInterface;

    /**
     * create a new controller instance
     * 
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface) {
        $this->userInterface = $userInterface;
    }
}
