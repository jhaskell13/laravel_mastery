<?php

namespace App\Providers;

use App\Services\RateLimiter;
use Illuminate\Support\ServiceProvider;

class RateLimiterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RateLimiter::class, function () {
            return new RateLimiter(config('ratelimit.limit'), config('ratelimit.cooldown'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
