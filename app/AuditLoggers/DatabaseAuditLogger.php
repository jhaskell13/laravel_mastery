<?php

namespace App\AuditLoggers;

use App\Contracts\AuditLogger;

class DatabaseAuditLogger implements AuditLogger
{
    public function log(string $action, array $context = []): void
    {
        echo "Logs being uploaded to database...\n";

        dump([
            'audit_type' => 'DB',
            'action' => $action,
            'context' => $context,
        ]);
    }
}