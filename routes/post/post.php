<?php
//category post route

use App\Http\Controllers\posts\PostController;
use Illuminate\Support\Facades\Route;


// Apply middleware to all routes except `index` and `show` for posts
Route::apiResource('posts', PostController::class)
    ->except(['index', 'show'])
    ->middleware('auth:sanctum');

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show']);