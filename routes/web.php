<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MitosFaktaController;
use App\Http\Controllers\PillsController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;


// Homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('document/{uuid}/download', [DocumentController::class, 'download'])->name('download-doc');
Route::get('poster/{uuid}/download', [PosterController::class, 'download'])->name('download-poster');


// Dashboard
Route::prefix('dashboard')
    ->middleware(['auth:sanctum','admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('document', DocumentController::class);
        Route::resource('mitos-fakta', MitosFaktaController::class);
        Route::resource('poster', PosterController::class);
        Route::resource('video', VideoController::class);
        Route::resource('pills', PillsController::class);
        Route::resource('notification', NotificationController::class);
        Route::post('/send-notification', [NotificationController::class, 'send'])->name('notif');
        Route::delete('/delete-all', [NotificationController::class, 'deleteAll']);
        
    });

