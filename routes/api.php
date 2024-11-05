<?php

use App\Http\Controllers\CategoryStoreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TemplateController;
use App\Models\CategoryStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// template  routes

 Route::get('categories-template',[TemplateController::class,'allCategories'])->name('categories-template');


 Route::get('templates/{id}',[TemplateController::class,'templatesForOneCategory'])->name('templates');

 // service  routes

 Route::get('categories-service',[ServiceController::class,'allCategories'])->name('categories.service');

 Route::get('services/{id}',[ServiceController::class,'servicesForOneCategory'])->name('services');

 //post Route
 Route::get('categories-post',[PostController::class,'allCategories'])->name('categories-post');


 Route::get('posts/{id}',[PostController::class,'postsForOneCategory'])->name('posts');

 Route::get('post/{id}',[PostController::class,'showPost'])->name('post.show');
