<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ads extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['title', 'category', 'description', 'picture', 'price', 'location', 'admin_verified', 'user_id'];
    public static function getAddsData()
    {
        $value = DB::table('ads')->where('admin_verified', '0')->orderBy("id")->get();
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
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->where('user_id', $userID)
            ->get();
        return $value;
    }

    public static function getUserbyAd($AdID)
    {
        $value = DB::table('ads')
        ->where('id', $AdID)
        ->value('user_id');
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
}
