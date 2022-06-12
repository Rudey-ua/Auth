<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find($request['id']);

/*        dd(Hash::check(request('user'), $user->password));*/

        /*Пароль*/

        //$response = Hash::check(request('old_password'), $user->password);

        /*if($response)
        {
            $user['password'] = Hash::make($request['password']);
            $user->save();
        }
        else
        {
            Session::flash('error_message');
        }*/

        //$request->validate(['new_password' => ['required', 'min:8']]);


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

        return redirect()->to('/profile');
    }

    public function updateImage(Request $request){

        $user = User::find($request['id']);
        $path = $request->file('image')->store('images', 'public');
        $path = 'storage/' . $path;
        $user['img_src'] = $path;
        $user->save();

        Session::flash('success_message');

        return redirect()->to('/profile');
    }

    /*Delete Image*/
    /*public function deleteImage(Request $request)
    {
        $user = User::find($request['id']);
        $user['img_src'] = "";
        $user->save();

        return redirect()->to('/profile');
    }*/

}
