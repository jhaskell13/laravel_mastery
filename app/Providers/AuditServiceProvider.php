<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AuditLoggers\DatabaseAuditLogger;
use App\AuditLoggers\FileAuditLogger;

class AuditServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DatabaseAuditLogger::class);
        $this->app->bind(FileAuditLogger::class);
        
        $this->app->tag([DatabaseAuditLogger::class, FileAuditLogger::class], 'audit.logger');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
