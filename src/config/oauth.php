<?php

return [
    'redirect_after_login' => '/',

    'providers' => [
        'google' => [
            'client_id' => '',
            'client_secret' => '',
            'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
            'redirect_uri' => route('oauth.callback', ['provider' => 'google']),
        ],
    
        'github' => [
            'client_id' => '',
            'client_secret' => '',
            'scope' => 'read:user',
            'redirect_uri' => route('oauth.callback', ['provider' => 'github']),
        ],
    ],
];