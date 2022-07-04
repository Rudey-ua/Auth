<?php

namespace App\Http\Controllers\Advertisement;


use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Filters\Filter;
use Spatie\QueryBuilder\QueryBuilder;

class AdvertisementController extends Controller
{
    public function showAllAdvertisements(){
        $user = Auth::user();
        $ads = Advertisement::where('user_id', $user['id'])->get();

        return view('advertisement.showAll', compact('user', 'ads'));
    }

    public function showAdvertisement($id){

        $advertisement = Advertisement::where(['id' => $id])
            ->where(['checked' => 1])
            ->get();

        if(count($advertisement) == 0){
            return abort(403);
        }

        $photos = Photo::where(['advertisement_id' => $id])->get();

        return view('advertisement.showOne', [
            'advertisement' => $advertisement,
            'photos' => $photos
        ]);

    }

    public function index(){
        $categories = Category::all();
        return view('advertisement.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $advertisement = Advertisement::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'user_id' => Auth::user()['id'],
            'category_id' => $request['category_id'],

            /*Vehicles*/

            'engine_type' => $request['engine_type'],
            'engine_power' => $request['engine_power'],
            'engine_volume' => $request['engine_volume'],
            'type' => $request['type'],
            'transmission' => $request['transmission'],
            'type_of_drive' => $request['type_of_drive'],
            'mileage' => $request['car_mileage'],
            'year' => $request['year_of_issue'],
            'color' => $request['painting_color'],
            'seats' => $request['seats'],
            'load_capacity' => $request['load_capacity'],
            'body_type' => $request['body_type'],
            'number_of_axles' => $request['number_of_axles'],

            /*Property*/

            'object_type' => $request['object_type'],
            'floor' => $request['floor'],
            'rooms' => $request['rooms'],
            'square' => $request['square'],
            'kitchen_square' => $request['kitchen_square'],
            'class' => $request['class'],
            'furniture' => $request['furniture'],
            'storeys' => $request['storeys'],
            'house_type' => $request['house_type'],
            'amount_acres' => $request['amount_acres'],
            'heating' => $request['heating'],

            /*Electronics*/

            'phone_brand' => $request['phone_brand'],
            'operating_system' => $request['operating_system'],
            'screen_diagonal' => $request['screen_diagonal'],
            'console_type' => $request['console_type'],
            'camera_type' => $request['camera_type'],
            'laptops_type' => $request['laptops_type'],

            /*Pets*/

            'bred' => $request['bred'],

            /*Clothing*/

            /*'gender' => $request['gender'],
            'size' => $request['size'],*/
        ]);

        if($request->files->get('images') != null) {
            foreach ($request->file('images') as $file) {

                $path = $file->store('images', 'public');
                $path = 'storage/' . $path;

                Photo::create([
                    'advertisement_id' => $advertisement['id'],
                    'img_src' => $path,
                ]);
            }
        }

        return redirect()->route('home');
    }

    public function updatePage(Request $request) {
        $advertisement = Advertisement::find($request['id']);

        return view('advertisement.update', [
            'advertisement' => $advertisement
        ]);
    }

    public function update(Request $request) {
        $advertisement = Advertisement::find($request['id']);
        $advertisement['title'] = $request['title'];
        $advertisement['description'] = $request['description'];
        $advertisement['price'] = $request['price'];
        $advertisement['checked'] = 0;
        $advertisement->save();

        return redirect()->route('advertisement.showAll');
    }

    public function destroy(Request $request) {

        $advertisement = Advertisement::find($request['id']);
        $advertisement->delete();
        return redirect()->route('advertisement.showAll');
    }

    public function searchByTitle(Request $request) {
        if(isset($request->title)) {
            $search_request = $request->title;
            $advertisements = Advertisement::where('title', 'LIKE', '%' . $request->title . '%')
                    ->where(['checked' => 1])
                    ->get();
            return view('advertisement.search_result', compact(['advertisements', 'search_request']));
        }
        return redirect()->route('home');
    }

    public function filter(Request $request)
    {

        $category_id = $request['category_id'];
        $category = Category::find($category_id);

        $advertisements = Advertisement::where('category_id', $category_id);

        if(isset($request['engine_type'])){
            $advertisements->whereIn('engine_type', $request['engine_type']);
        }

        if(isset($request['type'])){
            $advertisements->whereIn('type', $request['type']);
        }

        if(isset($request['transmission'])){
            $advertisements->whereIn('transmission', $request['transmission']);
        }

        if(isset($request['type_of_drive'])){
            $advertisements->whereIn('type_of_drive', $request['type_of_drive']);
        }

        if(isset($request['color'])){
            $advertisements->whereIn('color', $request['color']);
        }

        if(isset($request['seats'])){
            $advertisements->whereIn('seats', $request['seats']);
        }

        if(isset($request['from']) || isset($request['to'])){
            $from = (int)$request['from'];
            $to = (int)$request['to'];

            $advertisements->whereBetween('price', [$from, $to]);
        }

        $advertisements = $advertisements->get();

        return view('advertisement.category', [
            'advertisements' => $advertisements,
            'category'=> $category
        ]);

    }
}
