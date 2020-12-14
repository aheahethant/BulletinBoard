<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserAPIDao implements UserAPIDaoInterface
{
    /**
     * user List
     * @return $userList
     */
    public function index()
    {
        return User::with('user')->get();
    }
    
    /**
     * create user
     * @param \Illuminate\Http\Request $request
     */
    public function createUser($request)
    {
        if ($request->hasfile('profile')) {
            $profile = $request->file('profile');
            $upload_dir = public_path() . '/storage_image/';
            $name = time() . '.' . $profile->getClientOriginalExtension();
            $profile->move($upload_dir, $name);
            $path = 'storage_image/' . $name;
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $path;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->create_user_id = $request->create_user_id;
        $user->updated_user_id = $request->updated_user_id;
        $user->save();
        $token = $user->createToken('LaravelAuthApp')->accessToken;
        return response()->json(['token' => $token], 200);
    }
    
    /**
     * login
     */
    public function login($request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $user = auth()->user();
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token, 'user' => $user], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    
    /**
     * logout
     */
    public function logout($request)
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
         }
    }
    /**
     * update user
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function updateUser($request, $id)
    {
        if ($request->hasfile('profile')) {
            $profile = $request->file('profile');
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
        $user->profile = $path;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->create_user_id = $request->create_user_id;
        $user->updated_user_id = $request->updated_user_id;
        $user->update();
        return $user;
    }

    /**
     * delete user
     */
    public function destroy($id)
    {
        $user = User::find($id);
 
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 400);
        }
 
        if ($user->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User can not be deleted'
            ], 500);
        }
    }
    
    /**
     * change password
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function changePassword($request, $id)
    {
        $user = User::find($id);
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
        // $this->userInterface->changePassword($request);
        // $user->password = Hash::make($request->password);
        // $user->update();
        return response()->json($request);
    }
}