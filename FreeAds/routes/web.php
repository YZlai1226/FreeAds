<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\adsController;
use App\Http\Controllers\UserAdsController;
use App\Http\Controllers\UserController;

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

Route::get('/', [IndexController::class, 'showNewestAds'])->name('index');

Route::post('/index/droppingList', [IndexController::class, 'showAdsByCategory']);


Auth::routes(['verify' => true]);

require __DIR__.'/auth.php';


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('verified')->group(function () {

    

// admin_category ...

Route::get('/admin', [adminController::class, 'showAdsAndCategories'])->name('admin');

// Route::get('/admin', [categoryController::class, 'InsertForm']);
Route::get('/admin/adForm', [categoryController::class, 'InsertForm']);
Route::post('/admin/addCategory', [categoryController::class, 'AddNewCategory']);
Route::get('/admin/delete/{categoryId}', [categoryController::class, 'DeleteCategory']);
Route::get('/admin/edit/{categoryId}', [categoryController::class, 'EditForm']);
Route::post('admin/editConfirm', [categoryController::class, 'EditCategory']);
Route::get('/admin/verify/{adId}', [adsController::class, 'VerifyAd']);
Route::post('admin/editConfirm', [categoryController::class, 'EditCategory']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

});

//user dashboard ...

Route::get('/user/{userId}', [UserController::class, 'showUser']);

Route::get('/user/userEdit/{userID}', [UserController::class, 'EditUser']);
Route::post('/user/editsubmit', [UserController::class, 'EditConfirm']);

Route::get('/user/user_password/{userID}', [UserController::class, 'EditpasswordUser']);
Route::post('/user/editpasswordsubmit', [UserController::class, 'EditpasswordConfirm']);


Route::get('/user/userPublication/{userID}', [UserAdsController::class, 'getAdsbyUser'])->name("userpub");

Route::get('/user/AdEdit/{userID}', [UserAdsController::class, 'EditAdsbyUser']);
Route::post('/user/editAdsconfirm', [UserAdsController::class, 'EditAdsbyUserconfirm']);
Route::get('/user/AdDelete/{userID}', [UserAdsController::class, 'DeleteAdsbyUserconfirm']);

Route::get('/user/adForm', [UserAdsController::class, 'InsertAdForm']);