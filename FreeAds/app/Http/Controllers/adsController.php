<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ads;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class adsController extends Controller
{
    public function VerifyAd($adId) {
        $ad = Ads::find($adId);
        Ads::where('id', $adId )->update(['admin_verified' => '1']);
        return redirect()->route('admin');

    }
}
