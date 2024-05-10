<?php

namespace VoyagerInc\BasicAuth\Services;

class BasicAuthService implements Contracts\BasicAuthServiceInterface
{
    private $isAuthenticated = false;

    public function getStatusEnabled(): bool
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

    public function getErrorMessage(): string
    {
        return config('basic_auth.error_message', 'Unauthorized');
    }

    public function getHeaders(): array
    {
        $headerDefault = [
            'WWW-Authenticate' => 'Basic realm="Sample Private Page"',
            'Content-Type' => 'text/plain; charset=utf-8'
        ];

        return config('basic_auth.headers', $headerDefault);
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
