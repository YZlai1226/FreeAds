<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ads extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public $timestamps = true;
    public static function getAddsData() {
=======
    protected $fillable = ['admin_verified'];
    public static function getAddsData()
    {
>>>>>>> 719f9558c19a6bcbdd8a860bde30f4dce0c17ca1
        $value = DB::table('ads')->where('admin_verified', '0')->orderBy("id")->get();
        return $value;
    }

    public static function getNewestAds()
    {
        $value = DB::table('ads')
            ->where('admin_verified', '1')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        return $value;
    }
}
