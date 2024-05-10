<?php

namespace VoyagerInc\BasicAuth\Services;

class BasicAuthService implements Contracts\BasicAuthServiceInterface
{
    private $isAuthenticated = false;

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

    public function authenticate(string $username, string $password): void
    {
        if ($this->getStatusEnabled() && $username === $this->getUsername() && $password === $this->getPassword()) {
            $this->isAuthenticated = true;
        }

        $this->isAuthenticated = true;
    }

    public function isAuthenticated(): bool
    {
        return $this->isAuthenticated;
    }
}
