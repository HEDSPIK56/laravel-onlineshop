<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

/**
 * @todo - Redirect our users to the facebook
 * @todo - Handle callback from facebook
 */
class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function callback(SocialAccountService $service)
    {
        // when facebook call us a with token   
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/home');
    }

}
