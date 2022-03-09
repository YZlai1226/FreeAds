<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;

class IndexController extends Controller
{

    public function showNewestAds()
    {
        $Ads = Ads::getNewestAds();
        return view('index')->with('Ads', $Ads);
    }
}
