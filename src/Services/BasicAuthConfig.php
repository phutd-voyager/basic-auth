<?php

namespace VoyagerInc\BasicAuth\Services;

class BasicAuthConfig implements Contracts\BasicAuthConfigInterface
{
    public function isEnabled(): bool
    {
        return config('basic_auth.enabled', true);
    }

    public function getUsername(): string
    {
        return config('basic_auth.username', 'admin');
    }

    public function getPassword(): string
    {
        return config('basic_auth.password', 'password');
    }

    public function getHeaders(): array
    {
        $headerDefault = [
            'WWW-Authenticate' => 'Basic realm="Sample Private Page"',
            'Content-Type' => 'text/plain; charset=utf-8'
        ];

        return config('basic_auth.headers', $headerDefault);
    }

    public function getErrorMessage(): string
    {
        return config('basic_auth.error_message', 'Unauthorized');
    }
}
