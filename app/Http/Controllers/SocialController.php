<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google Callback

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUserGoogleUser($user);

        return redirect()->route('home');
    }

    protected function _registerOrLoginUserGoogleUser($incomingUser)
    {
        $user = User::where('google_id', '=', $incomingUser->id)->first();
        if (!$user) {
            $user = new User();
            $user->name = $incomingUser->name;
            $user->email = $incomingUser->email;
            $user->google_id = $incomingUser->id;
            $user->password = bcrypt('password');
            $user->save();
        }
        Auth::login($user);
    }
}
