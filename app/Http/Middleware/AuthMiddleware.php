<?php

namespace App\Http\Middleware;

// use Illuminate\Database\Eloquent\Model;
use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next) {
        if (auth()->guest()) {
            return redirect('user/signin');
        }
        return $next($request);
    }
}
