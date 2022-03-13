<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\Ads;
use Illuminate\Support\Facades\DB;



class Join extends Model
{
    use HasFactory;

    public static function getUserInfos($AdID)
    {
        $value = DB::table('users')
            ->join('ads', 'users.id', '=', 'ads.user_id')
            ->where('users.id', $AdID)
            ->get();
        return $value;
    }
}
