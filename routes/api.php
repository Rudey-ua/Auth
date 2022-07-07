<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticlesController;
use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Bid;

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


///////////////////

Route::get('/first-user', function () {
    return User::all()->first();
});

Route::get('/auction', function () {
    $users = User::all();
    $user1 = $users[0];
    $user2 = $users[1];
    $user3 = $users[2];
    $date = '2022-07-06 23:31:00';
    $ad = Advertisement::create([
        'title' => "ad1",
        'description' => "some some some some some some some some some some some some ",
        'price' => 500,
        'user_id' => $user1->id,
        'min_bid' => 50,
        'time' => $date
    ]);
    $user2->do_bid($ad, 550);
    $user3->do_bid($ad, 570);
    $origin = new DateTime(date('Y-m-d H:i:s'));
    $target = new DateTime($date);
    $diff = $target->getTimestamp() - $origin->getTimestamp() - 3 * 60 * 60 + 5;
    sleep($diff);
    dd(Advertisement::all());
});

Route::get('/max', function(){
    return Bid::all();
});

// DROP EVENT IF EXISTS cr_pr;
// DELIMITER //
// CREATE EVENT cr_pr
// on SCHEDULE EVERY 1 second
// DO
// BEGIN
// 	START TRANSACTION;
// 	UPDATE advertisements a SET price = (SELECT MAX(price) FROM bids b WHERE b.advertisement_id = a.id) WHERE time = CURRENT_TIMESTAMP;
//     COMMIT;
// END //
// DELIMITER ;

// DROP TRIGGER if EXISTS after_ad_update;
// DELIMITER $$

// CREATE TRIGGER after_ad_update
// AFTER UPDATE
// ON advertisements FOR EACH ROW
// BEGIN
//     IF OLD.price <> new.price THEN
//         INSERT INTO purchases(advertisement_id, user_id) VALUES(new.id, (SELECT user_id FROM bids b WHERE b.advertisement_id = new.id AND b.price = (SELECT max(price) FROM bids b1 WHERE b1.advertisement_id = b.advertisement_id) LIMIT 1));
//     END IF;
// END$$

// DELIMITER ;