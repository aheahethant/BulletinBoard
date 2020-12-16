<?php

namespace App\Services\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use App\contracts\Services\API\UserAPIServiceInterface;

class UserAPIService implements UserAPIServiceInterface
{
    private $userAPIDao;

    /**
     * Class Constructor
     * @param \App\Contracts\Dao\API\UserAPIDaoInterface $userAPIDao
     */
    public function __construct(UserAPIDaoInterface $userAPIDao)
    {
        $this->userAPIDao = $userAPIDao;
    }

    /**
     * Get user List
     * @param Object
     * @return array $userList
     */
    public function index()
    {
        return $this->userAPIDao->index();
    }
    
    /**
     * create user
     * @param \Illuminate\Http\Request $request
     */
    public function createUser($request)
    {
        return $this->userAPIDao->createUser($request);
    }
    
    /**
     * login
     * @param \Illuminate\Http\Request $request
     */
    public function login($request)
    {
        return $this->userAPIDao->login($request);
    }
    
     /**
     * logout
     */
    public function logout($request)
    {
        return $this->userAPIDao->logout($request);
    }

    /**
     * update user
     * @param int $id
     * @param \Illuminate\Http\Request $request
     */
    public function updateUser($request, $id)
    {
        return $this->userAPIDao->updateUser($request, $id);
    }
    
    /**
     * delete user
     * @param int $id
     */
    public function destroy($id)
    {
        return $this->userAPIDao->destroy($id);
    }

    /**
    * change password
    * @param \Illuminate\Http\Request $request
    */
   public function changePassword($request, $id)
   {
       return $this->userAPIDao->changePassword($request, $id);
   }
   
    /**
     * detail user
     * @param int $id
     */
    public function userDetail($id)
    {
        return $this->userAPIDao->userDetail($id);
    }
}