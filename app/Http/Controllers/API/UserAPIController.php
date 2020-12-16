<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\API\UserAPIServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    /**
     * create user
     * @param \Illuminate\Http\Request $request
     */
    public function createUser(Request $request)
    {
        return $this->userAPIInterface->createUser($request);
    }
    
    /**
     * Login
     * @param \Illuminate\Http\Request $request
     */
    public function login(Request $request)
    {
        return $this->userAPIInterface->login($request);
    }   

    /**
     * logout
     */
    public function logout(Request $request) 
    {
        return $this->userAPIInterface->logout($request);
    }

    /**
     * update user
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function updateUser(Request $request,$id)
    {
        return $this->userAPIInterface->updateUser($request, $id);
    }
    
    /**
     * user delete
     * @param int $id
     */
    public function destroy($id)
    {
        return $this->userAPIInterface->destroy($id);
    }
    
    /**
     * change password
     * @param \Illuminate\Http\Request $request
     */
    public function changePassword(Request $request, $id)
    {
        return $this->userAPIInterface->changePassword($request, $id);
    }
    
    /**
     * detail user
     * @param int $id
     */
    public function userDetail($id)
    {
        return $this->userAPIInterface->userDetail($id);
    }
}