<?php


use App\Http\Controllers\Services\ServiceController;
use Illuminate\Support\Facades\Route;


// Apply middleware to all routes except `index` and `show` for services
Route::apiResource('services', ServiceController::class)
    ->except(['index', 'show'])
    ->middleware('auth:sanctum');

// Define `index` and `show` routes separately without middleware
Route::get('services', [ServiceController::class, 'index']);
Route::get('services/{service}', [ServiceController::class, 'show']);