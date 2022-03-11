<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Categories;

class IndexController extends Controller
{

    public function showAllAds()
    {
        $Ads = Ads::getAllAds();
        $categories = Categories::getCategoryData();
        return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    }



    // public function showAdsByCategory(Request $request)
    // {
    //     $category = $request->input('categories');

    //     if ($category == 'AllCategories') {
    //         $Ads = Ads::getAllAds();
    //     } else {
    //         $Ads = Ads::getAdsbyCategorie($category);
    //         error_log("++++++++++++++++++++++++++category1 is:" . $category);

    //     }

    //     $categories = Categories::getCategoryData();

    //     return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    // }


    public function showAdsFiltered(Request $request)
    {
        $category = $request->input('categories');
        $order = $request->input('filter');


        if ($category == 'AllCategories' or $category == 'Select_option') {
            if ($order == 'orderByNew') {
                $Ads = Ads::getAllAds();

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
}
// public function showAdsByCategory(Request $request)
// {
    //     $category = $request->input('categories');
    //     $result = $request->input('filter');
    //     error_log("\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\result is:" . $result);
    //     error_log("\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\category is:" . $category);
    
    //     if ($category == 'AllCategories' ) {
    //         $Ads = Ads::getAllAds();
    //         error_log("++++++++++++++++++++++++++result1 is:" . $result);
    //         error_log("++++++++++++++++++++++++++category1 is:" . $category);
    //         error_log("++++++++++++++++++++++++++ads1 is:" . $Ads);

    //         if ($result == 'orderByNew') {
    //             $Ads = Ads::getNewestAds($category);
    //         } elseif ($result == 'orderByOld') {
    //             $Ads = Ads::getOldestAds($category);
    //         }
    //     } else {
    //         $Ads = Ads::getAdsbyCategorie($category);
    //         if ($result == 'orderByNew') {
    //             $Ads = Ads::getNewestAds($category);
    //         } elseif ($result == 'orderByOld') {
    //             $Ads = Ads::getOldestAds($category);
    //         } elseif ($result == 'orderByAsc') {
    //             $Ads = Ads::getAdsByPriceAsc($category);
    //         } elseif ($result == 'orderByDesc') {
    //             $Ads = Ads::getAdsByPriceDesc($category);
    //         };
    //     }

    //     $categories = Categories::getCategoryData();

    //     return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    // }

    // public function showAdsOrderBy(Request $request)
    // {
    //     $this->showAdsByCategory($request);

    //     $categories = Categories::getCategoryData();

    //     $result = $request->input('filter');
    //     error_log("\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\result is:" . $result);

    //     if ($result == 'orderByNew') {
    //         $Ads = Ads::getNewestAds($category);
    //         error_log("============= value from ads1" . $Ads);
    //     } elseif ($result == 'orderByOld') {
    //         $Ads = Ads::getOldestAds($category);
    //         error_log($Ads);
    //         error_log("============= value from ads2" . $Ads);
    //     } elseif ($result == 'orderByAsc') {
    //         $Ads = Ads::getAdsByPriceAsc($category);
    //         error_log("============= value from ads3" . $Ads);
    //     } elseif ($result == 'orderByDesc') {
    //         $Ads = Ads::getAdsByPriceDesc($category);
    //         error_log("============= value from ads4" . $Ads);
    //     };

    //     return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    // }
