<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ads;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Location;


class UserAdsController extends Controller
{
    public function getAdsbyUser($userID)
    {
        Error_log("user id in the first function is " . $userID);
        $ad = Ads::getAdsbyUser($userID);
        Error_log("result in the first function is " . $ad);
        return view('userAds', ['UserAd' => $ad, 'Hidden_user_id' => $userID]);
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
        $UserAd = $request->input('userID');
        $AdId = $request->input('AdID');
        $title = $request->input('title');
        $category = $request->input('categories');
        $description = $request->input('description');
        $price = $request->input('Price');
        $location = $request->input('Location');
        Ads::where('id', $AdId)->update(['title' => $title, 'category' => $category, 'description' => $description, 'price' => $price, 'location' => $location]);
        return $this->getAdsbyUser($UserAd);
    }


    public function DeleteAdsbyUserconfirm($AdID)
    {
        $ad = Ads::find($AdID);
        $userId = Ads::getUserbyAd($AdID);
        $ad->delete();
        error_log("ad id is " . $AdID);
        error_log("user id is " . $userId);
        return $this->getAdsbyUser($userId);
    }

    public function InsertAdForm($USERID)
    {

        $categories = Categories::getCategoryData();
        $Location = Location::getLocationData();
        return view("ad_create")->with('UserID', $USERID)->with('categories', $categories)->with("Location", $Location);
    }

    public function AddNewAd(Request $request)
    {

        $UserId = $request->input('userID');
        error_log("user id is " . $UserId);
        $title = $request->input('adTitle');
        error_log("title is " . $title);
        $category = $request->input('adCategories');
        error_log("category is " . $category);
        $description = $request->input('adDes');
        error_log("des is " . $description);
        $picture = $request->input('adPicture');
        error_log("picture is " . $picture);
        $price = $request->input('adPrice');
        error_log("price is " . $price);
        $location = $request->input('Location');
        error_log("location is " . $location);
        Ads::create(['title' => $title, 'category' => $category, 'description' => $description, 'picture' => $picture, 'price' => $price, 'location' => $location, 'user_id' => $UserId]);
        return $this->getAdsbyUser($UserId);
    }
}
