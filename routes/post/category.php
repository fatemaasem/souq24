<?php

use App\Http\Controllers\Posts\CategoryController;
use Illuminate\Support\Facades\Route;


//get all posts for one category
Route::get('categories-post/posts/{id}',[CategoryController::class,'postsForOneCategory'])->name('posts.one.category');




Route::apiResource('categories-post', CategoryController::class)
    ->middleware('auth:sanctum')
    ->except(['index', 'show']);

Route::get('categories-post', [CategoryController::class, 'index']);
Route::get('categories-post/{category}', [CategoryController::class, 'show']);