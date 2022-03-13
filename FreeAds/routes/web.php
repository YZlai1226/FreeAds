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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AdController;


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

Route::get('/', [IndexController::class, 'showAllAds'])->name('index');
Route::post('/Filter', [IndexController::class, 'showAdsFiltered']);
Route::post('/Search', [IndexController::class, 'showResearch']);

Route::get('/ad/{id}', [AdController::class, 'showAd']);

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

Route::middleware('can:admin')->group(function () {

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

});

Route::middleware('verified')->group(function () {
    //user dashboard ...
    
    Route::get('/dashboard', [dashboardController::class, 'showAllAds'])->middleware(['auth'])->name('dashboard');
    Route::post('/dashboard/Filter', [dashboardController::class, 'showAdsFiltered']);
    Route::post('/dashboard/Search', [dashboardController::class, 'showResearch']);
    
Route::get('/user', [UserAdsController::class, 'showUser'])->name('user');

Route::get('/user/userEdit', [UserController::class, 'EditUser']);
Route::post('/user/editsubmit', [UserController::class, 'EditConfirm']);

Route::get('/user/user_password', [UserController::class, 'EditpasswordUser']);
Route::post('/user/editpasswordsubmit', [UserController::class, 'EditpasswordConfirm']);

// Route::get('/user/userPublication/{userID}', [UserAdsController::class, 'getAdsbyUser'])->name("userpub");

// Route::get('/user/AdEdit', [UserAdsController::class, 'EditAdsbyUser']);
Route::post('/user/AdEdit', [UserAdsController::class, 'EditAdsbyUser']);
Route::post('/user', [UserAdsController::class, 'EditAdsbyUserconfirm']);
Route::post('/user/AdDelete', [UserAdsController::class, 'DeleteAdsbyUserconfirm']);

Route::get('/user/adForm', [UserAdsController::class, 'InsertAdForm']);
Route::post('/user/addAds', [UserAdsController::class, 'AddNewAd']);
// Route::post('/ad_create',[UserAdsController::class, 'upload']);
Route::controller(UserController::class)->group(function () {
    Route::get('/ad_create', 'create')->name('user.create');
    Route::post('/ad_create', 'store')->name('user.store');
});
});
