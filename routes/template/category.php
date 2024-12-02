<?php

use App\Http\Controllers\Templates\CategoryController;
use Illuminate\Support\Facades\Route;
//route for get all templates for one category
Route::get('categories-template/templates/{id}',[CategoryController::class,'templatesForOneCategory'])->name('templates.one.category');

// Apply middleware to all routes except `index` and `show` for categories-template
Route::apiResource('categories-template', CategoryController::class)
    ->except(['index', 'show'])
    ->middleware('auth:sanctum');

// Define `index` and `show` routes separately without middleware
Route::get('categories-template', [CategoryController::class, 'index']);
Route::get('categories-template/{category}', [CategoryController::class, 'show']);

