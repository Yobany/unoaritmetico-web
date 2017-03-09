<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class VerifyAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(strcasecmp($request->user()->role, "ADMIN")!=0){
            throw new UnauthorizedHttpException("Only admins are allowed", "Only admins are allowed");
        }
        return $next($request);
    }
}
