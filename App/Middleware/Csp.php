<?php
namespace App\Middleware;

class Csp
{
    public function __invoke($request, $response, $next)
    {
        $response = $next($request, $response);

        /**
        * More information on CSP can be found:
        *
        * https://content-security-policy.com
        * https://developers.google.com/web/fundamentals/security/csp/
        *
        */
        $policy = "script-src 'self'";
        $response = $response->withHeader('Content-Security-Policy', $policy);

        return $response;
    }
}
