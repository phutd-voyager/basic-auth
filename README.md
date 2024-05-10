# Simple block blacklist and whitelist IP

[`PHP v8.2`](https://php.net)

[`Laravel v11.x`](https://github.com/laravel/laravel)

## Installation

```bash
composer require voyager-inc/basic-auth
```

- Publish provider
```bash
php artisan vendor:publish --provider="VoyagerInc\BasicAuth\ServiceProvider"
```

## Usage

- We have new middleware with the aliases `basic-auth`

```bash
return [
    'enabled' => env('BASIC_AUTH_ENABLED', true), // 'true' to enable, 'false' to disable
    'username' => 'admin', // config username
    'password' => 'password', // config password
    'error_message' => 'Unauthorized', // custom error message
    'headers' => [ // config headers
        'WWW-Authenticate' => 'Basic realm="Sample Private Page"',
        'Content-Type' => 'text/plain; charset=utf-8'
    ],
];
```

- Example

```bash
Route::get('/test', function () {
    return 'basic auth route';
})->middleware(['basic-auth']);
```