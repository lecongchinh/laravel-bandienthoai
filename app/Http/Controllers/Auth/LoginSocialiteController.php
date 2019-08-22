<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Socialite;
use App\Http\Controllers\Controller;

class LoginSocialiteController extends Controller
{
    public function redirectToProvider()
    {
        // dd(12);
        return Socialite::driver('google')->redirect();
        
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        // dd(123);
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        dd($user);

        // $user->token;
    }
}
