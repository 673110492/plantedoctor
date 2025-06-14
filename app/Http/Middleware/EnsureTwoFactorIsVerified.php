<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorIsVerified
{
   public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->two_factor_code) {
        return redirect()->route('2fa.index');
    }

    return $next($request);
}
}
