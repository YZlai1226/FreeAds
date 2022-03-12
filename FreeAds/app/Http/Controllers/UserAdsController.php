<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ads;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Location;
use App\Http\Requests\ImageUploadRequest;
use App\Models\User;
use Illuminate\Support\Facades\Blade;


class UserAdsController extends Controller
{
    // public function getAdsbyUser($userID)
    // {
    //     // error_log("user id in the first function is " . $userID);
    //     $ad = Ads::getAdsbyUser($userID);
    //     // error_log("result in the first function is " . $ad);
    //     // error_log("auth id is " . Auth::id());
    //     // error_log("user is " . Auth::user());
    //     return view('userAds', ['UserAd' => $ad, 'Hidden_user_id' => $userID]);
    // }

    
    public function showUser()
    {
        // $user = User::find($userId);
        $userId = Auth::id();
        $user = Auth::user();
        // error_log("user id is " . $this->userId);
        // error_log("user id is " . $this->userId);
        $ad = Ads::getAdsbyUser($userId);
        return view('user', ['user' => $user, 'UserAd' => $ad, 'Hidden_user_id' => $userId]);
    }

    public function EditAdsbyUser($userID)
    {
        $categories = Categories::getCategoryData()->toArray();
        $location = Location::getLocationData()->toArray();

        $ad = Ads::find($userID);
        return view("editAds")->with('UserAd', $ad)->with('categories', $categories)->with("location", $location);
    }

    public function EditAdsbyUserconfirm(Request $request)
    {
        $newPic = $request->file('image');
        $UserAd = $request->input('userID');
        $AdId = $request->input('AdID');
        $title = $request->input('title');
        $category = $request->input('categories');
        $description = $request->input('description');
        $price = $request->input('Price');
        $location = $request->input('Location');
        error_log("new picture is " . $newPic);
        if (!$newPic) {
            Ads::where('id', $AdId)->update(['title' => $title, 'category' => $category, 'description' => $description, 'price' => $price, 'location' => $location]);
        }
        else {
            $path = request('image')->store('pictures', 'public');
            Ads::where('id', $AdId)->update(['title' => $title, 'category' => $category, 'description' => $description, 'picture' =>$path, 'price' => $price, 'location' => $location]);
        }
         return $this->showUser($UserAd);
    }


    public function DeleteAdsbyUserconfirm($AdID)
    {
        $ad = Ads::find($AdID);
        $userId = Ads::getUserbyAd($AdID);
        $ad->delete();
        error_log("ad id is " . $AdID);
        error_log("user id is " . $userId);
        return $this->showUser($userId);
    }

    public function InsertAdForm($USERID)
    {

        $categories = Categories::getCategoryData();
        $Location = Location::getLocationData();
        return view("ad_create")->with('UserID', $USERID)->with('categories', $categories)->with("Location", $Location);
    }

    public function AddNewAd(Request $request)
    {
        $path = request('image')->store('pictures', 'public');
        $UserId = $request->input('userID');
        $title = $request->input('adTitle');
        $category = $request->input('adCategories');
        $description = $request->input('adDes');
        $price = $request->input('adPrice');
        $location = $request->input('Location');
        Ads::create(['title' => $title, 'category' => $category, 'description' => $description, 'picture' => $path, 'price' => $price, 'location' => $location, 'user_id' => $UserId]);
        return $this->showUser($UserId);
    }


}

