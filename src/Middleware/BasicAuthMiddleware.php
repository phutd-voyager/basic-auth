<?php

namespace VoyagerInc\BasicAuth\Middleware;

use Closure;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use VoyagerInc\BasicAuth\Services\Contracts\BasicAuthServiceInterface;

class BasicAuthMiddleware
{
    private $basicAuthService;

    public function __construct(BasicAuthServiceInterface $basicAuthService)
    {
        $this->basicAuthService = $basicAuthService;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->basicAuthService->getStatusEnabled()) {
            return $next($request);
        }

        if (
            app()->environment('staging')
            || app()->environment('develop')
            || app()->environment('local')
        ) {
            $username = $request->getUser();
            $password = $request->getPassword();

            if (
                $username === $this->basicAuthService->getUserName()
                && $password === $this->basicAuthService->getPassword()
            ) {
                return $next($request);
            }

            abort(HttpResponse::HTTP_UNAUTHORIZED, $this->basicAuthService->getErrorMessage(), $this->basicAuthService->getHeaders());
        }

        return $next($request);
    }
}
