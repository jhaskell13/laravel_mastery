<?php

namespace App\Contracts;

interface AuditLogger
{
    public function log(string $action, array $context = []): void;
}