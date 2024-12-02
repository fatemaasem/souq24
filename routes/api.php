<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\CategoryStoreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TemplateController;
use App\Models\CategoryStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login route

Route::post('login',[LoginController::class,'login']);



require __DIR__."/post/category.php";
require __DIR__."/post/post.php";

require __DIR__."/service/category.php";
require __DIR__."/service/service.php";

require __DIR__."/template/category.php";
require __DIR__."/template/template.php";

require __DIR__."/order/store.php";