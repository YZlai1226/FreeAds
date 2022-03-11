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
        $ad = Ads::getAdsbyUser($userID);
        // $ad -> get();
        return view('userAds', ['UserAd' => $ad]);
    }

    public function EditAdsbyUser($userID)
    {
        $categories = Categories::getCategoryData()->toArray();
        $location = Location::getLocationData()->toArray();

        $ad = Ads::find($userID);
        //return view('editAds', ['UserAd' => $ad], ['categories' => $categories], ['location' => $location]);
        return view("editAds")->with('UserAd', $ad)->with('categories', $categories)->with("location", $location);
    }

    public function EditAdsbyUserconfirm(Request $request)
    {
        $UserAd = $request->input('userID');
        error_log('user id is ' . $UserAd);
        $title = $request->input('title');
        $category = $request->input('categories');
        $description = $request->input('description');
        $price = $request->input('Price');
        $location = $request->input('Location');
        Ads::where('id', $UserAd)->update(['title' => $title, 'category' => $category, 'description' => $description, 'price' => $price, 'location' => $location]);
        // $user = Ads::find($UserAd);
        return $this->getAdsbyUser($UserAd);
    }


    public function DeleteAdsbyUserconfirm($UserAd)
    {
        $ad = Ads::find($UserAd);
        $ad->delete();  
        error_log($UserAd);
        dd($UserAd);
        return $this->getAdsbyUser($UserAd);
  
    }
}
