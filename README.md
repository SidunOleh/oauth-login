# Login with OAuth

run migrates
```
php artisan migrate
```

set providers credentials in config/oauth.php
```
php artisan vendor:publish
````

routes
```
route('oauth.redirect', ['provider' => 'google'])
route('oauth.redirect', ['provider' => 'github'])
```