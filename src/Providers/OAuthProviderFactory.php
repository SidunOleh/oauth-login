<?php

namespace Sova\OAuthLogin\Providers;

use Sova\OAuthLogin\Exceptions\OAuthException;
use Sova\OAuthLogin\Providers\Interface\IOAuthProvider;

class OAuthProviderFactory
{
    public function build($provider): IOAuthProvider
    {
        switch ($provider) {
            case 'google':
                return new GoogleOAuthProvider();
            case 'github':
                return new GitHubOAuthProvider();
            default:
                throw new OAuthException('Invalid provider.');
        }
    }
}