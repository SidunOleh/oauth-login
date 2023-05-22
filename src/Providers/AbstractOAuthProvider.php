<?php

namespace Sova\OAuthLogin\Providers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Sova\OAuthLogin\Providers\Interface\IOAuthProvider;

abstract class AbstractOAuthProvider implements IOAuthProvider
{
    public function redirect(): RedirectResponse
    {
        $config = $this->config();

        $query_str = http_build_query([
            'client_id' => $config['client_id'],
            'scope' => $config['scope'],
            'redirect_uri' => $config['redirect_uri'],
            'response_type' => 'code',
        ]);

        return redirect($this->redirectUri() . "?{$query_str}");
    }

    public function user(string $code): User
    {
        $token = $this->token($code);
        $userinfo = $this->userinfo($token);

        $user = User::where('email', $userinfo['email'])->first();
        if ($user == null) {
            $user = User::create([
                'name' => $userinfo['name'],
                'email' => $userinfo['email'],
            ]);
            event(new Registered($user));
        }

        return $user;
    }

    protected function token(string $code): string
    {
        $config = $this->config();        

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post(
            $this->tokenUri(),
            [
                'client_id' => $config['client_id'],
                'client_secret' => $config['client_secret'],
                'redirect_uri' => $config['redirect_uri'],
                'grant_type' => 'authorization_code',
                'code' => $code,
            ]
        )->json();

        return $response['access_token'];
    }

    protected function userinfo(string $token): array
    {
        $userinfo = Http::withToken($token)
            ->get($this->userUri())
            ->json();

        return $userinfo;
    }

    abstract protected function config(): array;

    abstract protected function redirectUri(): string;

    abstract protected function tokenUri(): string;

    abstract protected function userUri(): string;
}