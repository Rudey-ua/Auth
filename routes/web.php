<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/profile', [PagesController::class, 'showProfilePage'])->name('profile')->middleware('auth');
Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth');
Route::post('/profile/update/image', [ProfileController::class, 'updateImage'])->middleware('auth');
//Route::post('/profile/delete/image', [ProfileController::class, 'deleteImage']);
//Route::post('/profile/update/password', [ProfileController::class, 'updatePassword']);

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', [SocialController::class, 'loginWithGitHub']);


Route::get('/admin', function () {
    return 123;
})->middleware(['auth', 'admin']);
