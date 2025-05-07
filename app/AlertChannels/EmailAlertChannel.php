<?php

namespace App\AlertChannels;

use App\Contracts\AlertChannel;

class EmailAlertChannel implements AlertChannel
{
    public function send(string $message, array $context = []): bool
    {
        echo "Sending alert message via email...";

        dump([
            'message' => $message,
            'context' => $context,
        ]);

        return true;
    }

    public function key(): string
    {
        return 'email';
    }
}