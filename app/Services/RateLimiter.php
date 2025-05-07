<?php

namespace App\Services;

use App\Events\UserActionRateLimited;
use Illuminate\Support\Facades\Auth;

class RateLimiter
{
    public function __construct(protected int $limit, protected int $cooldown) {}

    public function throttled(int $userId, string $action): bool
    {
        // Track a user's actions and how many times they acted in a given timeframe
        $key = "user.{$userId}:action.{$action}";        
        cache()->put($key, (cache()->get($key) ?? 0) + 1, $this->cooldown);

        if (cache()->get($key) > $this->limit) {
            UserActionRateLimited::dispatch($userId, $action);
            return true;
        }

        return false;
    }
}