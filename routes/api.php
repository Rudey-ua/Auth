<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticlesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/advertisements', [ArticlesController::class, 'showAdvertisements']);
Route::get('/advertisements/{id}', [ArticlesController::class, 'showAdvertisement']);

Route::post('/advertisements', [ArticlesController::class, 'storeAdvertisements']);
Route::delete('advertisements/{id}', [ArticlesController::class, 'deleteAdvertisement']);
