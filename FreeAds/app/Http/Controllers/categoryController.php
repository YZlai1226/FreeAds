<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\adminController;

class categoryController extends Controller
{
    // public function ShowCategories() {
    //     $category = Categories::getCategoryData();
    //     return view('admin')->with('category', $category);
    // }

    public function InsertForm() {
        // error_log("INSIDE InsertForm");
        return view('category_create');
    }

    public function AddNewCategory(Request $request) {
        // error_log("INSIDE AddNewCategory");
        $name = $request->input('categoryName');
        Categories::create(['name' => $name]);
        return redirect()->route('admin');
    }

    public function DeleteCategory($categoryId) {
        // error_log("INSIDE DeleteCategory");
        // error_log('categoryId is : ' . $categoryId);
        $category = Categories::find($categoryId);
        $category->delete();
        return redirect()->route('admin');
        // return $this->ShowCategories();
    }

    public function EditForm($categoryId) {
        // error_log("INSIDE EditForm");
        $category = Categories::find($categoryId);
        return view('category_edit')->with('category', $category);
    }

    public function EditCategory(Request $request) {
        $categoryId = $request->input('categoryId');
        $name = $request->input('categoryName');
        DB::table('categories')->where('id', $categoryId )->update(array('name' => $name));
        return redirect()->route('admin');
    }

}
