<?php

namespace App\Listeners;

use App\Events\AuditEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Container\Container;

class DispatchAuditLoggers
{
    /**
     * Create the event listener.
     */
    public function __construct(protected Container $app)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AuditEvent $event): void
    {
        $loggers = $this->app->tagged('audit.logger');

        foreach ($loggers as $logger) {
            $logger->log($event->action, $event->context);
        }
    }
}
