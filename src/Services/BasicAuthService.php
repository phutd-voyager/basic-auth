<?php

namespace VoyagerInc\BasicAuth\Services;

class BasicAuthService implements Contracts\BasicAuthServiceInterface
{
    public function getStatusEnabled(): bool
    {
        return config('basic_auth.enabled');
    }

    public function getUsername(): string
    {
        return config('basic_auth.username');
    }

    public function getPassword(): string
    {
        return config('basic_auth.password');
    }

    public function getErrorMessage(): string
    {
        return config('basic_auth.error_message');
    }

    public function getHeaders(): array
    {
        return config('basic_auth.headers');
    }
}
