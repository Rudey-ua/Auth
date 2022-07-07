<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;

class PagesController extends Controller
{
    public function showProfilePage(){

        return view('profile', [
            'user' => Auth::user()
        ]);
    }

    public function showPurchasesPage(){

        $purchases = Purchase::where('user_id', Auth::user()->getAuthIdentifier())->get();

        return view('purchases', [
            'user' => Auth::user(),
            'purchases' => $purchases
        ]);
    }

    public function index() {

        return view('home', [
            'categories' => Category::all(),
            'advertisements' => Advertisement::inRandomOrder()->where('is_vip', 1)->limit(4)->get(),
        ]);
    }

    public function indexCategory($id) {

        $advertisements = Advertisement::where('category_id', $id)
            ->where('checked', 1)
            ->get();
        $category = Category::where('id', $id)->get();

        return view('advertisement.category', [
            'advertisements' => $advertisements,
            'category' => $category
        ]);
    }
}
