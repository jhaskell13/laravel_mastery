<?php

namespace App\Jobs;

use App\Contracts\AlertChannel;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendAlertThroughChannel implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $channelClass,
        public string $message,
        public array $context = [],
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $channel = app()->make($this->channelClass);

        if (! $channel instanceof AlertChannel || ! $channel) {
            throw new \Exception('Unsupported channel or null given.');
        }

        $key = 'alert:throttle' . $channel->key();

        if (cache()->has($key)) {
            return; // Skip if already throttled
        }

        if (config("alerts.channels.{$channel->key()}")) {
            if ($channel->send($this->message, $this->context)) {
                cache()->put($key, true, 300); // Throttle for 5 mins
            } else {
                throw new \Exception('Failed to send alert.');
            }
        }
    }
}
