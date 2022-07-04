<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function users()
    {
        $users = User::paginate(10);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /*Admin-Profile*/

    public function updateUser(Request $request) {
        $user = User::find($request['id']);

        return view('admin.users.update_profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request['id']);

        if($request->validate(['name' => ['required', 'min:2']])){

            if($user['name'] !== $request['name'])
                Session::flash('success_message');
            $user['name'] = $request['name'];
            $user->save();
        }

        if($request->validate(['email' => ['required', 'email']])){

            if($user['email'] !== $request['email']) Session::flash('success_message');

            $user['email'] = $request['email'];
            $user->save();
        }

        if($request->validate(['dob' => ['required']])){

            if($user['dob'] !== $request['dob']) Session::flash('success_message');
            $user['dob'] = $request['dob'];
            $user->save();
        }

        return redirect()->route('admin.user.index');
    }

    public function updateImage(Request $request){

        $user = User::find($request['id']);
        $path = $request->file('image')->store('images', 'public');
        $path = 'storage/' . $path;
        $user['img_src'] = $path;
        $user->save();

        Session::flash('success_message');

        return redirect()->route('admin.user.index');
    }

    public function showAllAdvertisements($id) {
        $advertisements = Advertisement::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();

        if(!isset($user)){
            return abort(403);
        }

        return view('admin.users.advertisements', [
            'advertisements' => $advertisements,
            'user' => $user
        ]);
    }

    public function showOneAdvertisement($user_id, $id){

        $advertisement = Advertisement::where([
            ['id', '=', $id]])->get();

        $photos = Photo::where(['advertisement_id' => $id])->get();

        return view('admin.users.showOneAdmin', [
            'advertisement' => $advertisement,
            'photos' => $photos,
            'user_id' => $user_id
        ]);
    }

    public function updatePage(Request $request) {

        $advertisement = Advertisement::find($request['id']);

        return view('admin.users.admin_update', [
            'advertisement' => $advertisement,
            'user_id' => $request['user_id']
        ]);
    }

    public function updateAdvertisement(Request $request) {

        $advertisement = Advertisement::find($request['id']);
        $advertisement['title'] = $request['title'];
        $advertisement['description'] = $request['description'];
        $advertisement['price'] = $request['price'];
        $advertisement->save();

        return redirect()->to('admin/users/' . $request['user_id']);
    }

    public function destroy(Request $request) {

        $advertisement = Advertisement::find($request['id']);
        $advertisement->delete();
        return redirect()->to('admin/users/' . $request['user_id']);
    }

    public function moderate(Request $request) {
        $advertisement = Advertisement::find($request['advertisement_id']);
        $advertisement['checked'] = 1;
        $advertisement->save();

        $path = 'admin/user/' . $request['user_id'] . '/advertisement/' . $request['advertisement_id'];
        return redirect()->to($path);
    }

    public function madeVip(Request $request) {

        $advertisement = Advertisement::find($request['advertisement_id']);
        $advertisement['is_vip'] = 1;
        $advertisement->save();
        $path = 'admin/user/' . $request['user_id'] . '/advertisement/' . $request['advertisement_id'];

        return redirect()->to($path);
    }

    public function removeVip(Request $request) {
        $advertisement = Advertisement::find($request['advertisement_id']);
        $advertisement['is_vip'] = 0;
        $advertisement->save();

        $path = 'admin/user/' . $request['user_id'] . '/advertisement/' . $request['advertisement_id'];

        return redirect()->to($path);
    }
}
