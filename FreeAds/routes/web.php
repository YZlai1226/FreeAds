<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Index page ...

Route::get('/', function () {
    return view('index');
});


//admin_category ...

Route::get('/admin', [adminController::class, 'showAdsAndCategories'])->name('admin');

// Route::get('/admin', [categoryController::class, 'InsertForm']);
Route::get('/admin/adForm', [categoryController::class, 'InsertForm']);
Route::post('/admin/addCategory', [categoryController::class, 'AddNewCategory']);
Route::get('/admin/delete/{categoryId}', [categoryController::class, 'DeleteCategory']);
Route::get('/admin/edit/{categoryId}', [categoryController::class, 'EditForm']);
Route::post('admin/editConfirm', [categoryController::class, 'EditCategory']);
Route::get('/admin/verify/{adId}', [adsController::class, 'VerifyAd']);
// Route::post('admin/editConfirm', [categoryController::class, 'EditCategory']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
