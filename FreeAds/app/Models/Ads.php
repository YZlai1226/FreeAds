<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ads extends Model
{
    use HasFactory;
    public $timestamps = true;
    public static function getAddsData() {
        $value = DB::table('ads')->where('admin_verified', '0')->orderBy("id")->get();
        return $value;
    }
}
