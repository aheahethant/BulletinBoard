<?php

namespace App\Contracts\Services\API;

interface UserAPIServiceInterface
{
    /**
     * get the User List
     * @return array userList
     */
    public function index();
    
    /**
     * create user
     * @param \Illuminate\Http\Request $request
     */
    public function createUser($request);

    /**
     * login
     * @param \Illuminate\Http\Request $request
     */
    public function login($request);

     /**
     * logout
     */
    public function logout($request);

    /**
     * update user
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function updateUser($request, $id);

    /**
     * delete user
     * @param int $id
     */
    public function destroy($id);

    /**
    * change password
    * @param \Illuminate\Http\Request $request
    */
   public function changePassword($request, $id);
   
    /**
     * detail user
     * @param int $id
     */
    public function userDetail($id);
}