<?php

namespace App\AlertChannels;

use App\Contracts\AlertChannel;

class SlackAlertChannel implements AlertChannel
{
    public function send(string $message, array $context = []): bool
    {
        echo "Sending alert message via slack...";

        dump([
            'message' => $message,
            'context' => $context,
        ]);

        return true;
    }

    public function key(): string
    {
        return 'slack';
    }
}