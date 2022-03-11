<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;



class UserController extends Controller
{
    public function showUser($userId)
    {
        $user = User::find($userId);
        return view('user', ['user' => $user]);
    }

    public function DeleteUser($userId)
    {
        $user = User::find($userId);;
        $user->delete();
        return redirect()->route('index');
    }

    public function EditUser($userID)
    {
        $user = User::find($userID);
        return view('userEdit', ['user' => $user]);
    }

    public function EditConfirm(Request $request)
    {
        $userID = $request->input('userID');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        DB::table('users')->where('id', $userID)->update(array('name' => $name, 'email' => $email, 'phone' => $phone));
        $user = User::find($userID);
        return view('user', ['user' => $user]);
    }



    public function EditpasswordUser($password)
    {
        $user = User::find($password);
        return view('user_password', ['user' => $user]);
    }

    public function EditpasswordConfirm(Request $request)
    {
        $userID = $request->input('userID');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        // error_log('password is : ' . $password);
        // error_log('password_confirmation is : ' . $password_confirmation);

        if ($password == $password_confirmation) {
            $password = bcrypt($password);
            DB::table('users')->where('id', $userID)->update(array('password' => $password));
            $user = User::find($userID);
            return view('user', ['user' => $user]);
        } else {

            echo 'password confirmation must be identical to password';
        }
    }
}
