<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\User;

class AuctoinController extends Controller
{
    public function make_bid(Request $req)
    {
        $user_id = $req['uid'];
        $ad_id = $req['ad_id'];
        $price = $req['price'];
        Bid::create([
            'advertisement_id' => $ad_id,
            'user_id' => $user_id,
            'price' => $price
        ]);
        return [
            'price' => $price + Advertisement::where(['id' => $ad_id])->get()->first()->min_bid,
            'count' => count(Bid::where(['advertisement_id' => $ad_id])->get()),
            'login' => User::where(['id'=>$user_id])->get()->first()->login
        ];
    }
}
