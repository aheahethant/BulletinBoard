<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserConfirmRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

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

    /**
     * create User
     */
    public function createUser(UserCreateRequest $request)
    {
        if ($request->hasfile('profile')) {
            $profile = $request->file('profile');
            $upload_dir = public_path() . '/storage_image/';
            $name = time() . '.' . $profile->getClientOriginalExtension();
            $profile->move($upload_dir, $name);
            $path = 'storage_image/' . $name;
        }
        return view('users.confirm', [
            "image" => $path,
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => $request['password'],
            "confirm_password" => $request['confirm_password'],
            'type' => $request['type'],
            "phone" => $request['phone'],
            "dob" => $request['dob'],
            "address" => $request['address'],
        ]);
    }

    /**
     * save User
     * @param \Illuminate\Http\Request $request
     */
    public function saveUser(UserConfirmRequest $request)
    {
        $this->userInterface->saveUser($request);
        return redirect()->route('main')->with('message', 'Your account has been Sucessfully created.');
    }

    /**
     * get User by Id
     *@param int $id
     */
    public function editUser($id)
    {
        $user = $this->userInterface->getUserById($id);
        return view('users.edit', compact('user'));
    }

    /**
     * update User
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function updateUser(UserUpdateRequest $request, $id)
    {
        $this->userInterface->updateUser($request, $id);
        return redirect()->route('user_list');
    }

    /**
     * change password
     * @param \Illuminate\Http\Request $request
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $this->userInterface->changePassword($validated);
        return redirect()->route('profile');
    }
    
    /**
     * delete user by id
     * @param \Illuminate\Http\Request $request
     */
    public function deleteUserById(Request $request)
    {
        $this->userInterface->deleteUserById($request);
        return redirect()->route('user_list');
    }

    /**
     * edit profile
     */
    public function editProfile(Request $request, $id)
    {
        $this->userInterface->editProfile($request, $id);
        return redirect()->route('profile');
    }
}
