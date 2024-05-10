<?php

namespace VoyagerInc\BasicAuth\Middleware;

use Closure;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use VoyagerInc\BasicAuth\Services\Contracts\BasicAuthConfigInterface;
use VoyagerInc\BasicAuth\Services\Contracts\BasicAuthServiceInterface;

class BasicAuthMiddleware
{
    private $basicAuthService;
    private $basicAuthConfig;

    public function __construct(BasicAuthServiceInterface $basicAuthService, BasicAuthConfigInterface $basicAuthConfig)
    {
        $this->basicAuthService = $basicAuthService;
        $this->basicAuthConfig = $basicAuthConfig;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->basicAuthConfig->isEnabled()) {
            return $next($request);
        }

        if (
            app()->environment('staging')
            || app()->environment('develop')
            || app()->environment('local')
        ) {
            $username = $request->getUser();
            $password = $request->getPassword();

            if (!empty($username) && !empty($password)) {
                $this->basicAuthService->authenticate($username, $password);
            }

            if ($this->basicAuthService->isAuthenticated()) {
                return $next($request);
            }

            abort(HttpResponse::HTTP_UNAUTHORIZED, $this->basicAuthService->getErrorMessage(), $this->basicAuthService->getHeaders());
        }

        return $next($request);
    }
}
