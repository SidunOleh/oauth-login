# Login with OAuth

```
php artisan migrate
```

```
set providers credentials in config/oauth.php

php artisan vendor:publish
````

```
route('oauth.redirect', ['provider' => 'google'])
route('oauth.redirect', ['provider' => 'github'])
```