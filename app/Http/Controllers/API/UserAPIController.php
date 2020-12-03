<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\API\UserAPIServiceInterface;
use App\Http\Controllers\Controller;

class UserAPIController extends Controller
{
    var $userAPIInterface;

    /**
     * Constructor Class
     * @param
     */
    public function __construct(UserAPIServiceInterface $userAPIInterface) {
        $this->userAPIInterface = $userAPIInterface;
    }
    
    /**
     * show the User List
     * @return userList
     */
    public function index()
    {
        return $this->userAPIInterface->index();
    }
}