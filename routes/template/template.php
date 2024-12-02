<?php



use App\Http\Controllers\Templates\TemplateController;
use Illuminate\Support\Facades\Route;


// Apply middleware to all routes except `index` and `show` for templates
Route::apiResource('templates', TemplateController::class)
    ->except(['index', 'show'])
    ->middleware('auth:sanctum');

// Define `index` and `show` routes separately without middleware
Route::get('templates', [TemplateController::class, 'index']);
Route::get('templates/{template}', [TemplateController::class, 'show']);
