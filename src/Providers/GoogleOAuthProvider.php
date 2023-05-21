<?php

namespace Sova\OAuthLogin\Providers;

class GoogleOAuthProvider extends AbstractOAuthProvider
{
    protected function config(): array
    {
        return config('oauth.providers.google');
    }

    protected function redirectUri(): string
    {
        return 'https://accounts.google.com/o/oauth2/auth';
    }

    protected function tokenUri(): string
    {
        return 'https://accounts.google.com/o/oauth2/token';
    }

    protected function userUri(): string
    {
        return 'https://www.googleapis.com/oauth2/v1/userinfo';
    }
}