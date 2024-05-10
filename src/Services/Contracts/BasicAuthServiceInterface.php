<?php

namespace VoyagerInc\BasicAuth\Services\Contracts;

interface BasicAuthServiceInterface
{
    public function getStatusEnabled(): bool;

    public function getUsername(): string;

    public function getPassword(): string;

    public function getErrorMessage(): string;

    public function getHeaders(): array;

    public function authenticate(string $username, string $password): void;

    public function isAuthenticated(): bool;
}
