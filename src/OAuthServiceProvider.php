<?php

namespace Sova\OAuthLogin;

use Illuminate\Support\ServiceProvider;

class OAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'./database/migrations');
        $this->publishes([
            './config/oauth.php' => config_path('oauth.php'),
        ]);
        $this->loadRoutesFrom('./routes/web.php');
    }
}
