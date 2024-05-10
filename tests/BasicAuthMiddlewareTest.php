<?php

use VoyagerInc\BasicAuth\Middleware\BasicAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class BasicAuthMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    protected $basicAuthService;
    protected $basicAuthConfig;
    protected $middleware;

    protected function setUp(): void
    {
        parent::setUp();

        $this->basicAuthService = $this->mock(\VoyagerInc\BasicAuth\Services\Contracts\BasicAuthServiceInterface::class);
        
        $this->basicAuthConfig = $this->mock(\VoyagerInc\BasicAuth\Services\Contracts\BasicAuthConfigInterface::class);

        $this->middleware = new BasicAuthMiddleware($this->basicAuthService, $this->basicAuthConfig);
    }

    public function testHandleWithDisabledConfig()
    {
        $request = new Request();
        $response = new Response();

        $this->basicAuthConfig->shouldReceive('isEnabled')->andReturn(false);

        $result = $this->middleware->handle($request, function () use ($response) {
            return $response;
        });

        $this->assertEquals($response, $result);
    }

    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }
}
