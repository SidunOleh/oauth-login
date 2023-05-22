<?php

namespace Sova\OAuthLogin\Providers\Interface;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

interface IOAuthProvider
{
    public function redirect(): RedirectResponse; 

    public function user(string $code): User;
}