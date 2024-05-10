<?php

namespace VoyagerInc\BasicAuth\Tests;

class BasicAuthServiceTest extends BaseTest
{
    #[test]
    public function test_get_username()
    {
        config(['basic_auth.username' => 'custom_username']);
        $basicAuthUsername = $this->basicAuthConfig->getUsername();
        $this->assertEquals('custom_username', $basicAuthUsername);
    }

    #[test]
    public function test_get_password()
    {
        config(['basic_auth.password' => 'custom_password']);
        $basicAuthPassword = $this->basicAuthConfig->getPassword();
        $this->assertEquals('custom_password', $basicAuthPassword);
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
