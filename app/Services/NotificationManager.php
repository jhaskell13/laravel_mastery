<?php

namespace App\Services;

use App\Contracts\Notification;
use Illuminate\Contracts\Container\Container;

class NotificationManager
{
    public function __construct(
        protected Container $app,
        // protected Notification $notification
    ) {}

    public function send(string $channel, string $to, string $message): bool
    {
        $binding = config("notifications.channels.{$channel}");

        if (! $binding || ! $this->app->bound($binding)) {
            throw new \InvalidArgumentException("Notification channel [{$channel}] is not supported.");
        }

        $this->app->make($binding)->send($to, $message);
        return true;
    }
}