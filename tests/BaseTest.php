<?php

namespace VoyagerInc\BasicAuth\Tests;

class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected $basicAuthService;
    protected $basicAuthConfig;

    protected function setUp(): void
    {
        parent::setUp();

        $this->basicAuthConfig = new \VoyagerInc\BasicAuth\Services\BasicAuthConfig();
        $this->basicAuthService = new \VoyagerInc\BasicAuth\Services\BasicAuthService($this->basicAuthConfig);
    }

    protected function getPackageProviders($app)
    {
        return [\VoyagerInc\BasicAuth\ServiceProvider::class];
    }
}