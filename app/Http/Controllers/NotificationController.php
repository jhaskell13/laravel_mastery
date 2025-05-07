<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\NotificationManager;

class NotificationController extends Controller
{    
    public function __construct(protected NotificationManager $notificationManager) {}

    public function send(): JsonResponse
    {
        $sent = $this->notificationManager->send(
            request()->input('channel'), 
            request()->input('to'), 
            request()->input('message')
        );

        return response()->json([
            'sent' => $sent,
            'requestBody' => request()->all(),
            'status' => 200,
        ]);
    }
}
