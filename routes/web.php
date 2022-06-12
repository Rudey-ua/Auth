<?php

use App\Http\Controllers\Admin\Users\IndexController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Advertisement\AdvertisementController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('/auth/github/redirect', function () { return Socialite::driver('github')->redirect(); });
Route::get('/auth/github/callback', [SocialController::class, 'loginWithGitHub']);

Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function(){
    Route::get('/', [PagesController::class, 'showProfilePage'])->name('profile')->middleware('auth');
    Route::post('/update', [ProfileController::class, 'update'])->middleware('auth');
    Route::post('/update/image', [ProfileController::class, 'updateImage'])->middleware('auth');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Users'], function() {
        Route::get('/', [IndexController::class, 'index'])->name('admin.index');
        Route::get('/users', [IndexController::class, 'users'])->name('admin.user.index');
    });
});

Route::group(['namespace' => 'Advertisement'], function(){
    Route::get('/advertisements',[AdvertisementController::class, 'showAllAdvertisements'])
        ->name('advertisement.showAll')
        ->middleware('auth');

    Route::get('/advertisement/create', [AdvertisementController::class, 'index'])
        ->name('advertisement.index')
        ->middleware('auth');

    Route::post('/advertisement/create', [AdvertisementController::class, 'store'])
        ->name('advertisement.store')
        ->middleware('auth');

    Route::get('/advertisement/create/category', [AdvertisementController::class, 'category'])
        ->name('advertisement.category')
        ->middleware('auth');

    Route::post('/advertisement/delete', [AdvertisementController::class, 'destroy'])
        ->name('advertisement.destroy')
        ->middleware('auth');

    Route::post('/advertisement/updatePage', [AdvertisementController::class, 'updatePage'])
        ->name('advertisement.updatePage')
        ->middleware('auth');

    Route::post('/advertisement/update', [AdvertisementController::class, 'update'])
        ->name('advertisement.update')
        ->middleware('auth');

    Route::get('/advertisement/{id}', [AdvertisementController::class, 'showAdvertisement'])
        ->name('advertisement.view');

    /*Category*/

    Route::get('/category/{id}', [CategoryController::class, 'index']);

});

