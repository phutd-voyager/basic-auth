<?php

namespace VoyagerInc\BasicAuth\Services;

use VoyagerInc\BasicAuth\Services\Contracts\BasicAuthConfigInterface;

class BasicAuthService implements Contracts\BasicAuthServiceInterface
{
    private $config;
    private $isAuthenticated = false;

    public function __construct(BasicAuthConfigInterface $config)
    {
        $this->config = $config;
    }

    public function authenticate(string $username, string $password): void
    {
        if ($this->config->isEnabled() && $username === $this->config->getUsername() && $password === $this->config->getPassword()) {
            $this->setIsAuthenticated(true);
            return;
        }

        $this->setIsAuthenticated(false);
    }

    public function isAuthenticated(): bool
    {
        return $this->isAuthenticated;
    }

    private function setIsAuthenticated(bool $status)
    {
        $this->isAuthenticated = $status;
    }
}
