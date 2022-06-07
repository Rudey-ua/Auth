<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialController extends Controller
{
    public function loginWithGitHub()
    {
        $socialUser = Socialite::driver('github')->user();

        $user = User::where([
            'github_id' => $socialUser->getId()
        ])->first();

        if(!$user) {
            $user = User::create([
                'github_id' => $socialUser->getId(),
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'login' => $socialUser->getNickname(),
                'password' => Hash::make('user'),
                'img_src' => $socialUser->getAvatar()
            ]);
            Auth::login($user);
            return redirect()->route('home');
        }
        Auth::login($user);
        return redirect()->route('home');

    }
}
