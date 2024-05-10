<?php

namespace VoyagerInc\BasicAuth\Services\Contracts;

interface BasicAuthServiceInterface
{
    public function getStatusEnabled(): bool;

    public function getUsername(): string;

    public function getPassword(): string;

    public function getErrorMessage(): string;

    public function getHeaders(): array;
}
