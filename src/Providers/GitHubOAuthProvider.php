<?php

namespace Sova\OAuthLogin\Providers;

class GitHubOAuthProvider extends AbstractOAuthProvider
{
    protected function config(): array
    {
        return config('oauth.providers.github');
    }

    protected function redirectUri(): string
    {
        return 'https://github.com/login/oauth/authorize';
    }

    protected function tokenUri(): string
    {
        return 'https://github.com/login/oauth/access_token';
    }

    protected function userUri(): string
    {
        return 'https://api.github.com/user';
    }
}