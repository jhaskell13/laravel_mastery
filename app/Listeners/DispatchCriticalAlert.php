<?php

namespace App\Listeners;

use App\Events\CriticalAlertRaised;
use App\Jobs\SendAlertThroughChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DispatchCriticalAlert
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {}

    /**
     * Handle the event.
     */
    public function handle(CriticalAlertRaised $event): void
    {
        $channels = app()->tagged('alert.channel');

        foreach ($channels as $channel) {
            SendAlertThroughChannel::dispatch(
                get_class($channel),
                $event->message,
                $event->context,
            );
        }
    }
}
