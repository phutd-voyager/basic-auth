<?php

namespace VoyagerInc\BasicAuth\Middleware;

use Closure;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;

class BasicAuthMiddleware
{
    private $username;
    private $password;
    private $errorMessage;
    private $headers;

    public function __construct()
    {
        $this->username = config('basic_auth.username');
        $this->password = config('basic_auth.password');
        $this->errorMessage = config('basic_auth.errorMessage');

        $this->headers = [
            header('WWW-Authenticate: Basic realm="Sample Private Page"'),
            header('Content-Type: text/plain; charset=utf-8')
        ];
    }

    public function handle(Request $request, Closure $next)
    {
        if (
            app()->environment('staging')
            || app()->environment('develop')
            || app()->environment('local')
        ) {
            $username = $request->getUser();
            $password = $request->getPassword();

            if ($username === $this->username && $password === $this->password) {
                return $next($request);
            }

            abort(HttpResponse::HTTP_UNAUTHORIZED, $this->errorMessage, $this->headers);
        }

        return $next($request);
    }
}
