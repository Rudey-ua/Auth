<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $result = Advertisement::where('title', 'LIKE', '%'.$request->title.'%')->get();

        dd($result);
    }
}
