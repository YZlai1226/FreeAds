<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class location extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = ['name'];
    public static function getLocationData()
    {
        $value = DB::table('location')->orderBy('id')->get();
        return $value;
    }
}
