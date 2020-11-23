<?php

namespace App\Services\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Contracts\Dao\User\UserDaoInterface;
use GuzzleHttp\Psr7\Request;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorPostDaoInterface
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Get User List
     * @param Object
     * @return array $userList
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }    

    /**
     * save User
     * @param \Illuminate\Http\Request $request
     */
    public function saveUser($request)
    {
        return $this->userDao->saveUser($request);
    }

    /**
     * get User by Id
     * @param int $id
     */
    public function getUserById($id)
    {
        return $this->userDao->getUserById($id);
    }

    /**
     * update User
     * 
     */
    public function updateUser($request,$id)
    {
        return $this->userDao->updateUser($request,$id);
    }

    /**
     * change password
     * @param \Illuminate\Http\Request $request
     */
    public function changePassword($request)
    {
        return $this->userDao->changePassword($request);
    }

    /**
     * delete user by id
     * @param \Illuminate\Http\Request $request
     */
    public function deleteUserById($request)
    {
        return $this->userDao->deleteUserById($request);
    }
}