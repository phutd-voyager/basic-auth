<?php

namespace VoyagerInc\BasicAuth\Services\Contracts;

interface BasicAuthConfigInterface
{
    public function isEnabled(): bool;

    public function getUsername(): string;

    public function getPassword(): string;

    public function getHeaders(): array;

    public function getErrorMessage(): string;
}