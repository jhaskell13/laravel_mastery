<?php

namespace App\Contracts;

interface AlertChannel
{
    public function send(string $message, array $context = []): bool;
    public function key(): string;
}