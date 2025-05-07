<?php

namespace App\Http\Middleware;

use App\Services\RateLimiter;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RateLimitMiddleware
{
    public function __construct(protected RateLimiter $limiter)
    {}
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next,
    ): Response {
        $userId = $request->user()->id;
        $action = $request->route()->getName();

        if ($this->limiter->throttled($userId, $action)) {
            return response()->json([
                'message' => 'Too many actions.',
                'action' => $action
            ], 429);
        }

        return $next($request);
    }
}
