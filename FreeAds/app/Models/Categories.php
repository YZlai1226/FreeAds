<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    use HasFactory;
    public static function getCategoryData() {
        $value=DB::table('categories')->orderBy('id')->get();
        return $value;
    }

}
