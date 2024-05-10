<?php

namespace VoyagerInc\BasicAuth;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/basic_auth.php' => config_path('basic_auth.php'),
        ], 'basic-auth-config');

        $this->registerMiddleware();
    }

    protected function registerMiddleware()
    {
        $this->app['router']->aliasMiddleware('basic-auth', Middleware\BasicAuthMiddleware::class);
    }

    protected function registerServices()
    {
        $this->app->bind(Services\Contracts\BasicAuthServiceInterface::class, Services\BasicAuthService::class);
    }
}
