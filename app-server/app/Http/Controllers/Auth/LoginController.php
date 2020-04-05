<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Socialite;
use Auth;
use Log;

class LoginController extends Controller
{
    /**
     * Redirect the user to the OAuth Provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('laravelpassport')
            ->scopes(['*'])
            ->redirect();
    }

    /**
     * Obtain the user information from the OAuth Provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $oauthUser = Socialite::driver('laravelpassport')->user();

            session()->put([
                'user.id' => $oauthUser->getId(),
                'user.name' => $oauthUser->getName(),
                'user.email' => $oauthUser->getEmail(),
                'oauth.token' => $oauthUser->token,
                'oauth.refreshToken' => $oauthUser->refreshToken,
                'oauth.expiresAt' => now()->addSeconds($oauthUser->expiresIn)
            ]);

            auth()->loginUsingId($oauthUser->id);

            $response = redirect()->intended();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $response = redirect('/');
        }

        return $response;
    }
}
