<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    /**
     * get User List
     * @return array UserList
     */
    public function getUserList();

    /**
     * save User
     * @param \Illuminate\Http\Request $request
     */
    public function saveUser($request);

    /**
     * get User by Id
     * @param int $id
     */
    public function getUserById($id);

    /**
     * update User
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function updateUser($request,$id);

    /**
     * change password
     * @param \Illuminate\Http\Request $request
     */
    public function changePassword($request);

    /**
     * delete user by id
     * @param \Illuminate\Http\Request $request
     */
    public function deleteUserById($request);
}