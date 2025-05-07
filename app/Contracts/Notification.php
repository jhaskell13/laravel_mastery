<?php

namespace App\Contracts;

interface Notification
{
    public function send(string $to, string $message): bool;
}