<?php

namespace App\Http\Controllers;
use Exception;
use Laravel\Socialite\Facades\Socialite;


use Illuminate\Http\Request;

class OauthController extends Controller
{
    //
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();
            dd($user);

            // return response()->json([
            //     'name' => $user->getName(),
            //     'email' => $user->getEmail(),
            //     'avatar' => $user->getAvatar(),
            //     'google_id' => $user->getId()
            // ]);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
