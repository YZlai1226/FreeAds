<?php

namespace App\Http\Controllers;
use App\Models\Ads;
use App\Models\User;
use App\Models\Join;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function showAd($id)
    {
        
        $Ads = Ads::getTheAd($id);
        $Users = Join::getUserInfos($id);
        return view('ad', ['valueAd' => $Ads], ['valueUser' => $Users]);
    }

}
