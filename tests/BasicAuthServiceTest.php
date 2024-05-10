<?php

namespace VoyagerInc\BasicAuth\Tests;

class BasicAuthServiceTest extends BaseTest
{
    #[test]
    public function test_get_username()
    {
        config(['basic_auth.username' => 'custom_username']);
        $this->assertEquals('custom_username', $this->basicAuthService->getUsername());

        config(['basic_auth.username' => '']);
        $this->assertEquals('admin', $this->basicAuthService->getUsername());
    }

    #[test]
    public function test_get_password()
    {
        config(['basic_auth.password' => 'custom_password']);
        $this->assertEquals('custom_password', $this->basicAuthService->getPassword());

        config(['basic_auth.password' => '']);
        $this->assertEquals('password', $this->basicAuthService->getPassword());
    }

    #[test]
    public function test_authenticate()
    {
        $this->basicAuthService->authenticate('admin', 'password');
        $this->assertTrue($this->basicAuthService->isAuthenticated());

        $this->basicAuthService->authenticate('admin', 'wrong_password');
        $this->assertFalse($this->basicAuthService->isAuthenticated());

        config(['basic_auth.enabled' => false]);
        $this->basicAuthService->authenticate('admin', 'password');
        $this->assertFalse($this->basicAuthService->isAuthenticated());
    }

    #[test]
    public function test_is_authenticated()
    {
        $this->basicAuthService->authenticate('admin', 'password');
        $this->assertTrue($this->basicAuthService->isAuthenticated());

        $this->basicAuthService->authenticate('admin', 'wrong_password');
        $this->assertFalse($this->basicAuthService->isAuthenticated());
    }
}
