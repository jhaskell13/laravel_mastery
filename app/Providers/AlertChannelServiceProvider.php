<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AlertChannels\EmailAlertChannel;
use App\AlertChannels\SlackAlertChannel;
use App\AlertChannels\WebhookAlertChannel;

class AlertChannelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmailAlertChannel::class);
        $this->app->bind(SlackAlertChannel::class);
        $this->app->bind(WebhookAlertChannel::class);

        $this->app->tag([
            EmailAlertChannel::class,
            SlackAlertChannel::class,
            WebhookAlertChannel::class,
        ], 'alert.channel');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
