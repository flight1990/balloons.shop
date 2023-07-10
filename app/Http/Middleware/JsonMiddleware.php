<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Accept');

        if ($header != 'application/json') {
            return response(['message' => 'Only JSON requests are allowed'], 406);
        }

        return $next($request);
    }
}
