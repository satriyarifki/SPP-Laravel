<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::get('notifications', NotificationController::class)->name('notifications');
});

use Illuminate\Support\Facades\Artisan;
Route::get('/config', function () {
    Artisan::call(
        'migrate:fresh',
        [
            '--force' => true,
        ]
    );
    Artisan::call(
        'db:seed',
        [
            '--force' => true,
        ]
    );
});