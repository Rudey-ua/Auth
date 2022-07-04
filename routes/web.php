<?php

use App\Http\Controllers\Admin\Users\IndexController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Advertisement\AdvertisementController;
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

Auth::routes();

Route::get('/', [PagesController::class, 'index'])->name('home');

    /*Social*/

Route::get('/auth/github/redirect', function () { return Socialite::driver('github')->redirect(); });
Route::get('/auth/github/callback', [SocialController::class, 'loginWithGitHub']);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    /*Admin*/

    Route::group(['namespace' => 'Users'], function() {

        Route::get('/', [IndexController::class, 'index'])
            ->name('admin.index')
            ->middleware(['auth', 'admin']);

        /*Admin-User`s-Advertisements*/

        Route::get('/users', [IndexController::class, 'users'])
            ->name('admin.user.index');

        Route::get('users/{id}', [IndexController::class, 'showAllAdvertisements'])
            ->name('admin.user.showAll');

        Route::get('/user/{user_id}/advertisement/{id}', [IndexController::class, 'showOneAdvertisement'])
            ->name('admin.advertisements.showOne');

        Route::post('/advertisement/updatePage', [IndexController::class, 'updatePage'])
            ->name('admin.advertisement.updatePage');

        Route::post('/advertisement/update', [IndexController::class, 'updateAdvertisement'])
            ->name('admin.advertisement.update');

        Route::post('/advertisement/delete', [IndexController::class, 'destroy'])
            ->name('admin.advertisement.destroy');

        Route::post('/advertisement/moderate', [IndexController::class, 'moderate'])
            ->name('admin.advertisement.moderate');

        Route::post('/advertisement/vip', [IndexController::class, 'madeVip'])
            ->name('admin.advertisement.madeVip');

        Route::post('/advertisement/removeVip', [IndexController::class, 'removeVip'])
            ->name('admin.advertisement.removeVip');

        /*Admin-Profile*/

        Route::post('/users/updatePage', [IndexController::class, 'updateUser'])
            ->name('admin.user.updatePage');

        Route::post('users/update', [IndexController::class, 'update'])
            ->name('admin.user.update');

        Route::post('user/update/image', [IndexController::class, 'updateImage'])
            ->name('admin.user.updateImage');
    });
});

Route::group(['namespace' => 'Profile', 'prefix' => 'profile', 'middleware' => 'auth'], function(){
    /*Profile*/

    Route::get('/', [PagesController::class, 'showProfilePage'])->name('profile');
    Route::get('/purchases', [PagesController::class, 'showPurchasesPage'])->name('purchases');
    Route::post('/update', [ProfileController::class, 'update']);
    Route::post('/update/image', [ProfileController::class, 'updateImage']);
});

Route::group(['namespace' => 'Advertisement'], function(){

    Route::group(['middleware' => 'auth'], function(){
        /*Advertisement*/

        Route::get('/advertisements',[AdvertisementController::class, 'showAllAdvertisements'])
            ->name('advertisement.showAll');

        Route::get('/advertisement/create', [AdvertisementController::class, 'index'])
            ->name('advertisement.create');

        Route::post('/advertisement/store', [AdvertisementController::class, 'store'])
            ->name('advertisement.store');

        Route::post('/advertisement/update', [AdvertisementController::class, 'update'])
            ->name('advertisement.update');

        Route::post('/advertisement/delete', [AdvertisementController::class, 'destroy'])
            ->name('advertisement.destroy');

        Route::post('/advertisement/updatePage', [AdvertisementController::class, 'updatePage'])
            ->name('advertisement.updatePage');
    });

    /* Advertisement-View */

    Route::get('/advertisement/{id}', [AdvertisementController::class, 'showAdvertisement'])
        ->name('advertisement.view');

    Route::get('/search', [AdvertisementController::class, 'searchByTitle'])
        ->name('advertisement.search_result');

    /* Category-View */

    Route::get('/category/{id}', [PagesController::class, 'indexCategory'])->name('category');

    Route::get('/category/{id}/filter', [AdvertisementController::class, 'filter'])->name('filter');


    Route::group(['middleware' => 'auth'], function(){
        /*Favourite*/

        Route::get('favourites', [FavouriteController::class, 'index'])
            ->name('favourites.show');

        Route::post('favourite/add', [FavouriteController::class, 'add'])
            ->name('favourite.add');

        Route::post('favourite/delete', [FavouriteController::class, 'delete'])
            ->name('favourite.delete');
    });
});

Route::group(['middleware' => 'auth'], function(){
    /*Favourite*/
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/charge', [PaymentController::class, 'charge'])->name('charge');
    Route::get('/success', [PaymentController::class, 'success']);
    Route::get('/error', [PaymentController::class, 'error']);
});




