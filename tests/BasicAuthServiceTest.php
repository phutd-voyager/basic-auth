<?php

namespace VoyagerInc\BasicAuth\Tests;

class BasicAuthServiceTest extends BaseTest
{
    #[test]
    public function test_can_authenticate_user()
    {
        $username = 'admin';
        $password = 'password';

        $this->basicAuthService->authenticate($username, $password);

        $this->assertTrue($this->basicAuthService->isAuthenticated());

        $this->assertEquals($username, $this->basicAuthService->getUsername());
        $this->assertEquals($password, $this->basicAuthService->getPassword());
    }

    #[test]
    public function test_cant_authenticate_user()
    {
        $username = 'admin1';
        $password = 'password';

        $this->basicAuthService->authenticate($username, $password);

        $this->assertFalse($this->basicAuthService->isAuthenticated());
    }
}
