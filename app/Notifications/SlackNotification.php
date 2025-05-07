<?php

namespace App\Notifications;

use App\Contracts\Notification;

class SlackNotification implements Notification
{
    public function send(string $to, string $message): bool
    {
        echo "Slack message [{$message}] sent to [{$to}] successfully";
        return true;
    }
}