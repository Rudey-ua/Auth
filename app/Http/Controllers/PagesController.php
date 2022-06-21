<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function showProfilePage(){
        return view('profile', [
            'user' => Auth::user()
        ]);
    }

    public function index() {

        return view('home', [
            'categories' => Category::all(),
            'advertisements' => Advertisement::all(),
        ]);
    }

    public function indexCategory($id) {

        $advertisements = Advertisement::where('category_id', $id)->get();
        $category = Category::where('id', $id)->get();

        return view('advertisement.category', [
            'advertisements' => $advertisements,
            'category' => $category
        ]);
    }
}
