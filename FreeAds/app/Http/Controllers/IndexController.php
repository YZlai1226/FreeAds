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
        // error_log("value is:" . $categories);
        return view('index', ['Ads' => $Ads], ['categories' => $categories]);
    }

// public function store

    public function showAdsByCategory(Request $request)
    {
        // $categories = Ads::filter($Request)->get();

        // error_log("value 2 is:" . $Request);
        $category = $request->input('valueCategory');
        error_log("value categoriy :" . $category);
        $Ads = Ads::getAdsbyCategorie($category);
        // error_log("value 3 is:" . $categories);
        // return redirect()->route('index');

        return view('index', ['Ads' => $Ads], ['categories' => $category]);

    }
}
