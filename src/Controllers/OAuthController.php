<?php

namespace Sova\OAuthLogin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sova\OAuthLogin\Providers\OAuthProviderFactory;

class OAuthController extends Controller
{
    public function redirect($provider)
    {
        return (new OAuthProviderFactory)
            ->build($provider)
            ->redirect();
    }

    public function callback(Request $request, $provider)
    {
        $user = (new OAuthProviderFactory)
            ->build($provider)
            ->user($request->query('code'));

        Auth::login($user);
        
        return redirect(config('oauth.redirect_after_login'));
    }
}
