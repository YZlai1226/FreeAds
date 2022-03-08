<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function ShowCategories() {
        $category = categories::getCategoryData();
        return view ('admin')->with('category', $category);
    }

    public function InsertForm() {
        return view('category_create');
    }

    public function AddNewCategory(Request $request) {
        $name = $request->input('categoryName');
        // $date = 'CURDATE()';
        $data = array('name' => $name);
        DB::table('categories')->insert($data);
        if ($request->add_category == 'Add') {
            return view('admin');
        }
    }
}
