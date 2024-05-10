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
    'username' => 'admin', // config username
    'password' => 'password', // config password
    'error_message' => 'Unauthorized', // custom error message
];
```

- Example

```bash
Route::get('/test', function () {
    return 'basic auth route';
})->middleware(['basic-auth']);
```