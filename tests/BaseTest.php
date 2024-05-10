<?php

namespace VoyagerInc\BasicAuth\Tests;

class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected $basicAuthService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->basicAuthService = new \VoyagerInc\BasicAuth\Services\BasicAuthService();
    }

    protected function getPackageProviders($app)
    {
        return [\VoyagerInc\BasicAuth\ServiceProvider::class];
    }
}