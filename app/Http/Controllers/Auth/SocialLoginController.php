<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use App\Repositories\User\UserRepository;

class SocialLoginController extends Controller
{

    public function getSocialRedirect($provider)
    {
        $providerKey = Config::get('services.'.$provider);

        if (empty($providerKey)) {
            return redirect()->action('Auth\LoginController@showLoginForm')
                            ->with('status', 'danger')
                            ->with('message', trans('settings.messages.login.no_provider'));
        }
        return Socialite::driver($provider)->redirect();
    }

    public function handleSocialLogin($provider)
    {
        if (Input::get('denied')) {
            return redirect()->action('Auth\LoginController@showLoginForm')
                            ->with('status', 'danger')
                            ->with('message', trans('settings.messages.not_share_provider'));
        }

        $user = Socialite::driver($provider)->user();
    }
}
