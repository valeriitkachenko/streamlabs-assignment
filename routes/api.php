<?php

use App\Http\Controllers\Api\Events\HighlightsController;
use App\Http\Controllers\Api\Events\EventsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->name('api.')->group(function () {
    Route::prefix('events')->name('events.')->group(function() {
        Route::get('', [EventsController::class, 'index']);
        Route::get('highlights', [HighlightsController::class, 'index']);
    });
});
