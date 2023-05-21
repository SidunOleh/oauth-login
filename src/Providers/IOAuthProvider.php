<?php

namespace Sova\OAuthLogin\Providers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

interface IOAuthProvider
{
    public function redirect(): RedirectResponse; 

    public function user(string $code): User;
}