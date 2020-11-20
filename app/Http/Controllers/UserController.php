<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function createUser(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users',
            'password' => 'min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
            'profile' => 'required|mimes:jpeg,bmp,png',
            'type' => 'required',
            'phone' => '',
            'dob' => '',
            'address' => '',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('profile')) {
            $profile = $request->file('profile');
            $upload_dir = public_path() . '/storage_image/';
            $name = time() . '.' . $profile->getClientOriginalExtension();
            $profile->move($upload_dir, $name);
            $path = 'storage_image/' . $name;
        }
        return view('users.confirm', [
            "image" => $path,
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "confirm_password" => $request->confirm_password,
            'type' => $request->type,
            "phone" => $request->phone,
            "dob" => $request->dob,
            "address" => $request->address,
        ]);
    }

    /**
     * save User
     * @param \Illuminate\Http\Request $request
     */
    public function saveUser(Request $request)
    {
        $request->validate([
            'c_name' => 'required',
            'email' => 'required',
            'c_password' => 'required',
            'confirm_password' => 'required_with:c_password|same:c_password',
            'profile' => 'required',
            'c_type' => 'required'
        ]);
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
    public function updateUser(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required',
            'type' => 'required',
            'phone' => '',
            'dob' => '',
            'address' => '',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->userInterface->updateUser($request, $id);
        return redirect()->route('user_list');
    }

    /**
     * change password
     * @param \Illuminate\Http\Request $request
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }
            ],
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'required_with:new_password|same:new_password',
        ]);
        $this->userInterface->changePassword($request);
        return redirect()->route('profile');
    }

    /**
     * user detail
     * @param int $id
     */
    public function detailUser($id)
    {
        $user = $this->userInterface->detailUser($id);
        $returnHTML = view('users.user_list',['id'=> $user->id])->render();
        return response()->json( ['html'=>$returnHTML]);
    }

    public function deleteUserById($id)
    {
        $this->userInterface->deleteUserById($id);
        return redirect()->route('user_list');
    }
}
