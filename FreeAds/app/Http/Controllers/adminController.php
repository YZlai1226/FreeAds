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
    public $timestamps = true;
    public function showAdsAndCategories() {
        $ads = Ads::where('admin_verified', '0')->simplePaginate(3);
        return view('admin', ['ads' => $ads]);
    }

    public function ShowCategories() {
        $category = Categories::getCategoryData();
        return view('admin', ['category' => $category]);
    }
}