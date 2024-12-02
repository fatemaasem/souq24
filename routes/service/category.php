<?php

use App\Http\Controllers\Services\CategoryController;
use Illuminate\Support\Facades\Route;

//route for get all services for one category
Route::get('categories-service/services/{id}',[CategoryController::class,'servicesForOneCategory'])->name('services.one.category');

// Apply middleware to all routes except `index` and `show` for categories-service
Route::apiResource('categories-service', CategoryController::class)
    ->except(['index', 'show'])
    ->middleware('auth:sanctum');

// Define `index` and `show` routes separately without middleware
Route::get('categories-service', [CategoryController::class, 'index']);
Route::get('categories-service/{category}', [CategoryController::class, 'show']);