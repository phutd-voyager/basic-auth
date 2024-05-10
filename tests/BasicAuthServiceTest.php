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

        $this->assertEquals($userName, $this->basicAuthService->getUsername());
        $this->assertEquals($password, $this->basicAuthService->getPassword());
    }
}
