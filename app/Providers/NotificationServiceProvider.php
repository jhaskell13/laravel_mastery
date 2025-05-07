<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Notification;
use App\Notifications\EmailNotification;
use App\Notifications\SlackNotification;
use App\Http\Controllers\NotificationController;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(Notification::class, function () {
        //     return match (config('notifications.channel')) {
        //         'email' => new EmailNotification,
        //         'slack' => new SlackNotification,
        //     };
        // });

        $this->app->bind('email', EmailNotification::class);
        $this->app->bind('slack', SlackNotification::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
