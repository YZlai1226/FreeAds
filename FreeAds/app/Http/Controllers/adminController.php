<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ads;
use App\Models\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function showAdsAndCategories() {
        $ads = Ads::getAddsData();
        $category = Categories::getCategoryData();
        return view('admin', ['ads' => $ads, 'category' => $category]);
    }

    // public function ShowCategories() {
    //     // error_log("INSIDE ShowCategory");
    //     $category = Categories::getCategoryData();
    //     return view('admin')->with('category', $category);
    // }
}