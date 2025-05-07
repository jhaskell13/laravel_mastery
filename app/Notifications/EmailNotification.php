<?php

namespace App\Notifications;

use App\Contracts\Notification;

class EmailNotification implements Notification
{
    public function send(string $to, string $message): bool
    {
        echo "Email message [{$message}] sent to [{$to}] successfully";
        return true;
    }
}