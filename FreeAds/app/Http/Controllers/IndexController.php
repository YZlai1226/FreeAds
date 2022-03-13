<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Categories;

class IndexController extends Controller
{

    public function showAllAds()
    {
        $Ads = Ads::SimplePaginate(5);
        $categories = Categories::getCategoryData();
        return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    }

    public function showAdsFiltered(Request $request)
    {
        $category = $request->input('categories');
        // dd($category);
        $order = $request->input('filter');
        error_log ("===============================category is:" . $category);
        error_log ("===============================order is:" . $category);


        if ($category == 'AllCategories' or $category == 'Select_option') {
            if ($order == 'orderByNew' or $order == 'Select_option') {
                $Ads = Ads::getAllAds();
                error_log ("===================================ads is1:" . $Ads);

            } elseif ($order == 'orderByOld') {
                $Ads = Ads::getAllAdsDesc();
            } elseif ($order == 'orderByAsc') {
                $Ads = Ads::getAllAdsByPriceAsc();
            } elseif ($order == 'orderByDesc') {
                $Ads = Ads::getAllAdsByPriceDesc();
                // } else {
                // $Ads = Ads::getAdsbyCategorie();
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

        return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    }

    public static function showResearch(Request $request)
    {
        error_log('================================================request is :' . $request);

        $search = $request->input('search');
        error_log('================================================research is :' . $search);
        // dd($search);
        $Ads = Ads::searchAds($search);
        $categories = Categories::getCategoryData();

        return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    }

}
