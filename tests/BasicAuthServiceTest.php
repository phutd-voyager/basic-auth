<?php

namespace VoyagerInc\BasicAuth\Tests;

class BasicAuthServiceTest extends BaseTest
{
    #[test]
    public function test_it_can_authenticate_user()
    {
        $userName = 'admin';
        $password = 'password';

        $this->basicAuthService->authenticate('admin', 'password');

        $this->assertTrue($this->basicAuthService->isAuthenticated());

        $this->assertEquals($userName, $this->basicAuthService->getUsername());
        $this->assertEquals($password, $this->basicAuthService->getPassword());
    }
}
