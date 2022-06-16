<?php

namespace App\Http\Controllers\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FavouriteController extends Controller
{
    public function index(){

        $user_id = Auth::user()['id'];

        return view('advertisement.favourite', [
            'advertisements' => Advertisement::where('user_id', $user_id)->get(),
            'favourites' => Favourite::where('user_id', $user_id)->get(),
        ]);
    }

    public function add(Request $request) {
        $user_id = Auth::user()['id'];
        $advertisement = Advertisement::find($request['id']);

        Favourite::create([
            'user_id' => $user_id,
            'advertisement_id' => $advertisement['id']
        ]);

        return redirect()->route('favourites.show');
    }

    public function delete(Request $request) {
        $favourite = Favourite::find($request['id']);
        $favourite->delete();

        return redirect()->route('favourites.show');
    }

}
