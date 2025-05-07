<?php

namespace App\AuditLoggers;

use App\Contracts\AuditLogger;

class FileAuditLogger implements AuditLogger
{
    public function log(string $action, array $context = []): void
    {
        echo "Logs being exported to system files...\n";

        dump([
            'audit_type' => 'File',
            'action' => $action,
            'context' => $context,
        ]);
    }
}