<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $type
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if ($request->user()->type != $type) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'You are not authorized to access the requested resource.'], 401);
            }
            abort(401, 'You are not authorized to access the requested resource.');
        }
        return $next($request);
    }
}
