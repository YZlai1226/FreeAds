<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function showAllAds()
    {
        $Ads = Ads::getAllAds();
        $categories = Categories::getCategoryData();
        $userId = Auth::id();
        error_log ("==========================in controller the first function user id is " . $userId);
        $admin = User::AdminCheck($userId);
        error_log ("**************************in controller the first function admin check is " . $admin);
        return view('dashboard', ['Ads' => $Ads, 'categories' => $categories, 'admin'=> $admin]);
    }


    public function showAdsFiltered(Request $request)
    {
        // dd($request);
        $category = $request->input('categories');
        error_log("=============================================categories1 is:" . $category);
        $order = $request->input('filter');
        error_log("=============================================order1 is:" . $order);


        if ($category == 'AllCategories' or $category == 'Select_option') {
            if ($order == 'orderByNew' or $order == 'Select_option') {
                $Ads = Ads::getAllAds();
                error_log("=============================================ads is1:" . $Ads);
            } elseif ($order == 'orderByOld') {
                $Ads = Ads::getAllAdsDesc();
            } elseif ($order == 'orderByAsc') {
                $Ads = Ads::getAllAdsByPriceAsc();
            } elseif ($order == 'orderByDesc') {
                $Ads = Ads::getAllAdsByPriceDesc();
            }
        } else {
            if ($order == 'orderByNew') {
                $Ads = Ads::getNewestAds($category);
            } elseif ($order == 'orderByOld') {
                $Ads = Ads::getOldestAds($category);
            } elseif ($order == 'orderByAsc') {
                $Ads = Ads::getAdsByPriceAsc($category);
            } elseif ($order == 'orderByDesc') {
                $Ads = Ads::getAdsByPriceDesc($category);
            } else {
                $Ads = Ads::getAdsbyCategorie($category);
            }
        }

        $categories = Categories::getCategoryData();
        error_log("categorie is" . $categories);
        $userId = Auth::id();
        $admin = User::AdminCheck($userId);
        return view('dashboard', ['Ads' => $Ads, 'categories' => $categories, 'admin'=> $admin]);
    }

    public static function showResearch(Request $request)
    {
        // error_log('================================================request is :' . $request);

        $search = $request->input('search');
        // error_log('================================================research is :' . $search);
        // dd($search);
        $Ads = Ads::searchAds($search);
        $categories = Categories::getCategoryData();
        $userId = Auth::id();
        $admin = User::AdminCheck($userId);
        return view('dashboard', ['Ads' => $Ads, 'categories' => $categories,  'admin'=> $admin]);
    }
}
