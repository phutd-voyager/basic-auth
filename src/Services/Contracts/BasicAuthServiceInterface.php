<?php

namespace VoyagerInc\BasicAuth\Services\Contracts;

interface BasicAuthServiceInterface
{
    public function authenticate(string $username, string $password): void;

    public function isAuthenticated(): bool;
}
