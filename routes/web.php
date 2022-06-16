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
use App\Http\Controllers\Favourite\FavouriteController;

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



Route::get('/', [PagesController::class, 'index'])->name('home');

Auth::routes();

    /*Social*/

Route::get('/auth/github/redirect', function () { return Socialite::driver('github')->redirect(); });
Route::get('/auth/github/callback', [SocialController::class, 'loginWithGitHub']);

Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function(){

    /*Profile*/

    Route::get('/', [PagesController::class, 'showProfilePage'])->name('profile')->middleware('auth');
    Route::post('/update', [ProfileController::class, 'update'])->middleware('auth');
    Route::post('/update/image', [ProfileController::class, 'updateImage'])->middleware('auth');
});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {

    /*Admin*/

    Route::group(['namespace' => 'Users'], function() {
        Route::get('/', [IndexController::class, 'index'])
            ->name('admin.index')
            ->middleware(['auth', 'admin']);

        /*Admin-User`s-Advertisements*/

        Route::get('/users', [IndexController::class, 'users'])
            ->name('admin.user.index')
            ->middleware(['auth', 'admin']);

        Route::get('users/{id}', [IndexController::class, 'showAllAdvertisements'])
            ->middleware(['auth', 'admin'])
            ->name('admin.user.showAll');

        Route::get('/user/{user_id}/advertisement/{id}', [IndexController::class, 'showOneAdvertisement'])
            ->middleware(['auth', 'admin'])
            ->name('admin.advertisements.showOne');

        Route::post('/advertisement/updatePage', [IndexController::class, 'updatePage'])
            ->name('admin.advertisement.updatePage')
            ->middleware('auth');

        Route::post('/advertisement/update', [IndexController::class, 'updateAdvertisement'])
            ->name('admin.advertisement.update')
            ->middleware('auth');

        Route::post('/advertisement/delete', [IndexController::class, 'destroy'])
            ->name('admin.advertisement.destroy')
            ->middleware('auth');

        Route::post('/advertisement/moderate', [IndexController::class, 'moderate'])
            ->name('admin.advertisement.moderate')
            ->middleware(['auth', 'admin']);

        Route::post('/advertisement/vip', [IndexController::class, 'madeVip'])
            ->name('admin.advertisement.madeVip')
            ->middleware(['auth', 'admin']);

        Route::post('/advertisement/removeVip', [IndexController::class, 'removeVip'])
            ->name('admin.advertisement.removeVip')
            ->middleware(['auth', 'admin']);

        /*Admin-Profile*/

        Route::post('/users/updatePage', [IndexController::class, 'updateUser'])
            ->name('admin.user.updatePage')
            ->middleware(['auth', 'admin']);

        Route::post('users/update', [IndexController::class, 'update'])
            ->middleware(['auth', 'admin'])
            ->name('admin.user.update');

        Route::post('user/update/image', [IndexController::class, 'updateImage'])
            ->middleware(['auth', 'admin'])
            ->name('admin.user.updateImage');


    });
});

Route::group(['namespace' => 'Advertisement'], function(){

    /*Advertisement*/

    Route::get('/advertisements',[AdvertisementController::class, 'showAllAdvertisements'])
        ->name('advertisement.showAll')
        ->middleware('auth');

    Route::get('/advertisement/create', [AdvertisementController::class, 'index'])
        ->name('advertisement.index')
        ->middleware('auth');

    Route::post('/advertisement/create', [AdvertisementController::class, 'store'])
        ->name('advertisement.store')
        ->middleware('auth');

    Route::post('/advertisement/update', [AdvertisementController::class, 'update'])
        ->name('advertisement.update')
        ->middleware('auth');

    Route::post('/advertisement/delete', [AdvertisementController::class, 'destroy'])
        ->name('advertisement.destroy')
        ->middleware('auth');

    Route::post('/advertisement/updatePage', [AdvertisementController::class, 'updatePage'])
        ->name('advertisement.updatePage')
        ->middleware('auth');

    Route::get('/advertisement/{id}', [AdvertisementController::class, 'showAdvertisement'])
        ->name('advertisement.view');

    /*Category*/

    Route::get('/category/{id}', [CategoryController::class, 'index']);

    /*Favourite*/

    Route::get('favourites', [FavouriteController::class, 'index'])
        ->name('favourites.show')
        ->middleware('auth');

    Route::post('favourite/add', [FavouriteController::class, 'add'])
        ->name('favourite.add')
        ->middleware('auth');

    Route::post('favourite/delete', [FavouriteController::class, 'delete'])
        ->name('favourite.delete')
        ->middleware('auth');
});

