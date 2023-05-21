<?php

use Illuminate\Support\Facades\Route;
use Sova\OAuthLogin\Controllers\OAuthController;

Route::get('/auth/oauth/{provider}/redirect', [OAuthController::class, 'redirect'])
    ->name('oauth.redirect');
Route::get('/auth/oauth/{provider}/callback', [OAuthController::class, 'callback']);