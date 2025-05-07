<?php

namespace App\AlertChannels;

use App\Contracts\AlertChannel;

class WebhookAlertChannel implements AlertChannel
{
    public function send(string $message, array $context = []): bool
    {
        echo "Sending alert message via webhook...";

        dump([
            'message' => $message,
            'context' => $context,
        ]);

        return true;
    }

    public function key(): string
    {
        return 'webhook';
    }
}