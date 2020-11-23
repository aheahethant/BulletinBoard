<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    /**
     * user List
     * @param Object
     * @return $userList
     */
    public function getUserList()
    {
        $users = User::all();
        return view('users.user_list', compact('users'));
    }

    /**
     * save User
     * @param \Illuminate\Http\Request $request
     */
    public function saveUser($request)
    {
        $user = new User();
        $user->name = $request->c_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->confirm_password);
        $user->profile = $request->profile;
        $user->type = $request->c_type;
        $user->phone = $request->c_phone;
        $user->address = $request->c_address;
        $user->dob = $request->c_dob;
        $user->create_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
        $user->save();
    }

    /**
     * get User by Id
     * @param int $id
     */
    public function getUserById($id)
    {
        return User::find($id);
    }

    /**
     * update User
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function updateUser($request, $id)
    {
        if ($request->hasfile('new_profile')) {
            $profile = $request->file('new_profile');
            $upload_dir = public_path() . '/storage_image/';
            $name = time() . '.' . $profile->getClientOriginalExtension();
            $profile->move($upload_dir, $name);
            $path = 'storage_image/' . $name;
        } else {
            $path = $request->old_profile;
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->old_password;
        $user->profile = $path;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->create_user_id = $request->create_user;
        $user->updated_user_id = Auth::user()->id;
        $user->save();
    }

    /**
     * change password
     * @param \Illuminate\Http\Request $request
     */
    public function changePassword($request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->confirm_new_password);
        $user->update();
    }

    /**
     * delete user by id
     * @param \Illuminate\Http\Request $request
     */
    public function deleteUserById($request)
    {
        User::find($request->id)->delete();
    }
}
