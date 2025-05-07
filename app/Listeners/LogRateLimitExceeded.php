<?php

namespace App\Listeners;

use App\Events\UserActionRateLimited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogRateLimitExceeded
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserActionRateLimited $event): void
    {
        logger()->warning("User [{$event->userId}] has been rate limited due to excessive requests to [{$event->action}].");
    }
}
