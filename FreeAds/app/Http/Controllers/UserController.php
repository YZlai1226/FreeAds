<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;



class UserController extends Controller
{
    // public function showUser($userId)
    // {
    //     $user = User::find($userId);
    //     $ad = Ads::getAdsbyUser($userId);
    //     return view('user', ['user' => $user]);
    //     return view('userAds', ['UserAd' => $ad, 'Hidden_user_id' => $userId]);
    // }

    public function DeleteUser($userId)
    {
        $user = User::find($userId);;
        $user->delete();
        return redirect()->route('index');
    }

    public function EditUser()
    {
        $user = Auth::user();
        // $user = User::find($userID);
        return view('userEdit', ['user' => $user]);
    }

    public function EditConfirm(Request $request)
    {
        $userId = Auth::id();
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        DB::table('users')->where('id', $userId)->update(array('name' => $name, 'email' => $email, 'phone' => $phone));
        return redirect()->route('user');
        // $user = Auth::user();
        // $ad = Ads::getAdsbyUser($userId);
        // return view('user', ['user' => $user, 'UserAd' => $ad, 'Hidden_user_id' => $userId]);
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

        if ($password == $password_confirmation) {
            $password = bcrypt($password);
            DB::table('users')->where('id', $userID)->update(array('password' => $password));
            $user = User::find($userID);
            return view('user', ['user' => $user]);
        } else {
            // echo 'password confirmation must be identical to password';
            return back()->withErrors(['message'=>'Whoops, looks like something went wrong !']);
        }
    }
}
