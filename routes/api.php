<?php

use App\Events\AuditEvent;
use App\Events\CriticalAlertRaised;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'rate.limit'])->group(function () {

    Route::post('/notify', [NotificationController::class, 'send'])->name('api.notify');
    
    Route::post('/audit', function (Request $request) {
        AuditEvent::dispatch(
            $request->input('action'),
            $request->input('context'),
        );
    })->name('api.audit');
    
    Route::post('/alert', function (Request $request) {
        CriticalAlertRaised::dispatch(
            $request->input('message'),
            $request->input('context'),
        );
    })->name('api.alert.critical');
});