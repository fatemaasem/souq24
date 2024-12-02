<?php


use App\Http\Controllers\Orders\OrderController ;
use Illuminate\Support\Facades\Route;
//create new store order
Route::post('orders/store',[OrderController::class,'request_store']);

