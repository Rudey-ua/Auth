<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id) {

        $advertisements = Advertisement::where('category_id', $id)->get();
        $category = Category::where('id', $id)->get();

        return view('advertisement.category', [
            'advertisements' => $advertisements,
            'category' => $category
        ]);
    }
}
