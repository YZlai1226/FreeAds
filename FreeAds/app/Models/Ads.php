<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Ads extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['title', 'category', 'description', 'picture', 'price', 'location', 'admin_verified', 'user_id'];
    public static function getAddsData()
    {
        $value = DB::table('ads')->where('admin_verified', '0')->orderBy("updated_at")->get();
        return $value;
    }

    public static function getAllAds()
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->orderBy('id', 'asc')
            ->get();
        return $value;
    }

    public static function getAllAdsDesc()
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->orderBy('id', 'desc')
            ->get();
        return $value;
    }

    public static function getAllAdsByPriceAsc()
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->orderBy('price', 'asc')
            ->get();
        return $value;
    }

    public static function getAllAdsByPriceDesc()
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->orderBy('price', 'desc')
            ->get();
        return $value;
    }

    public static function getNewestAds($category)
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('category', $category)
            ->orderBy('id', 'desc')
            // ->limit(5)
            ->get();
        return $value;
    }

    public static function getOldestAds($category)
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('category', $category)
            ->orderBy('id', 'asc')
            ->get();
        return $value;
    }

    public static function getAdsbyCategorie($category)
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('category', $category)
            ->orderBy('id', 'desc')
            // ->limit(5)
            ->get();
        return $value;
    }


    public static function getAdsbyUser($userID)
    {

        error_log("================================user id in Ads model1 is " . $userID);
        $value = DB::table('ads')
            ->where('user_id', $userID)
            ->orderBy('admin_verified', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();
        error_log("*********************************result in Ads model1 is " . $value);
        return $value;
    }

    public static function getAdbyId($userId, $adId)
    {
        error_log("INSIDE: " . __FUNCTION__ . "(), userId: " . $userId);
        error_log("INSIDE: " . __FUNCTION__ . "(), adId: " . $adId);
        $value = DB::table('ads')
            ->where('id', $adId)
            ->where('user_id', $userId)
            ->get();
        error_log("INSIDE: " . __FUNCTION__ . "(), DB result is: " . $value);
        error_log("END OF FUNCTION: " . __FUNCTION__ . "()");
        return $value;
    }

    public static function getUserbyAd($AdID)
    {
        $value = DB::table('ads')
            ->where('id', $AdID)
            ->value('user_id');
        return $value;
    }

    public static function getAdsByPriceAsc($category)
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('category', $category)
            ->orderBy('price', 'asc')
            ->get();
        return $value;
    }

    public static function getAdsByPriceDesc($category)
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('category', $category)
            ->orderBy('price', 'desc')
            ->get();
        return $value;
    }


    public static function searchAds($research)
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('title', 'like', '%' . $research . '%')
            ->orWhere ('description', 'like', '%' . $research . '%')
            ->get();
        return $value;
    }

    public static function getTheAd($AdID)
    {
        $value = DB::table('ads')
            ->where('id', $AdID)
            ->get();
        return $value;
    }   

}