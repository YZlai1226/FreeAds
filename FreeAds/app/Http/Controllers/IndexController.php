<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Categories;

class IndexController extends Controller
{

    public function showNewestAds()
    {
        $Ads = Ads::getNewestAds();
        $categories = Categories::getCategoryData();
        // var_dump($categories);

        return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    }


    public function showAdsByCategory($valueCategory)
    {
        $categories = Ads::getAdsbyCategorie($valueCategory);
        return view('index', ['categories' => $categories]);
    }
}
