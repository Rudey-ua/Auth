<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function showAdvertisements() {

        $advertisements = Advertisement::all();

        return response()->json($advertisements, 200);
    }

    public function showAdvertisement($id)
    {
        $advertisement = Advertisement::find($id);

        if(!$advertisement) {
            return response()->json([
                "status" => false,
                "message" => "Advertisement Not Found"
            ], 404)->setStatusCode(404, "Advertisement Not Found");
        }

        return response()->json($advertisement, 200);
    }

    public function storeAdvertisements(Request $request)
    {
        $request_data = $request->only(['title', 'description', 'price', 'category_id','user_id']);

        $validator = Validator::make($request_data, [
           'title' => ['required', 'string'],
           'description' => ['required', 'string'],
           'price' => ['required'],
           'user_id' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }

        $advertisement = Advertisement::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'user_id' => $request['user_id'],
        ]);

        return response()->json([
            "status" => true,
            "advertisement" => $advertisement
        ])->setStatusCode(201, "Advertisement is stored");
    }

    public function deleteAdvertisement($id) {
        $advertisement = Advertisement::find($id);

        if(!$advertisement) {
            return response()->json([
                "status" => false,
                "message" => "Advertisement Not Found"
            ], 404)->setStatusCode(404, "Advertisement Not Found");
        }

        $advertisement->delete();

        return response()->json([
            "status" => true,
            "message" => "Advertisement successfully deleted",
        ])->setStatusCode(204);
    }
}
