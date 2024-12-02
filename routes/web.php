<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Services\CategoryController as CategoryService ;
use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\Templates\CategoryController as CategoryStore;
use App\Http\Controllers\Templates\TemplateController;
use Illuminate\Support\Facades\Route;

Route::get('test',function(){
return view('test');
});
/*
store order
*/
// get all store orders
Route::get('/',[OrderController::class,'getSroreOrders'])->name('admin.dashboard');
//delete store order
Route::delete('store-order/destroy/{id}',[OrderController::class,'destroy'])->name('store-order.destroy');
/*
category store
*/
// Define route to view all category stores
Route::get('categories-template', [CategoryStore::class, 'viewIndex'])->name('store-categories.all');
//view create form
Route::get('categories-template/create', [CategoryStore::class, 'create'])->name('store-categories.create');
//store new category
Route::post('categories-template/store', [CategoryStore::class, 'store'])->name('store-categories.store');
//get all template for one category

Route::get('categories-template/templates/{id}',[CategoryStore::class,'view_templatesForOneCategory'])->name('templates.one.category');

//view category store
Route::get('categories-template/{id}', [CategoryStore::class, 'view'])->name('store-categories.view');
//delete all
Route::delete("categories-template/deleteAll",[CategoryStore::class, 'deleteAll'])->name('store-categories.deleteAll');

/*
template
*/


//create template
Route::get('templates/create',[TemplateController::class,'create'])->name('templates.create');
//store template
Route::post('templates/store',[TemplateController::class,'store'])->name('templates.store');
//delete template
Route::delete('templates/destroy/{id}',[TemplateController::class,'destroy'])->name('templates.destroy');

//delete all
Route::delete('templates/deleteAll/{id}',[TemplateController::class,'delateAllOneCategory'])->name('templates.deleteAll');
/*
category service
*/
// Define route to view all category services
Route::get('categories-service', [CategoryService::class, 'viewIndex'])->name('service-categories.all');
//route for get all services for one category
Route::get('categories-service/services/{id}',[CategoryService::class,'view_templatesForOneCategory'])->name('services.one.category');
//create new category service
Route::get('categories-service/create', [CategoryService::class, 'create'])->name('categories-service.create');
//store category service
Route::post('categories-service/store', [CategoryService::class, 'store'])->name('categories-service.store');
//view category service
Route::get('categories-service/{id}', [CategoryService::class, 'view'])->name('categories-service.view');
//delete all services.delete.all
Route::delete('categories-service/deleteAll', [CategoryService::class, 'deleteAll'])->name('category.services.delete.all');
/*
service
*/
//delete service
Route::delete('services/destroy/{id}',[ServiceController::class,'destroy'])->name('services.destroy');
//create service
Route::get('services/create',[ServiceController::class,'create'])->name('services.create');
//store service
Route::post('services/store',[ServiceController::class,'store'])->name('services.store');
//delete all
Route::delete('services/deleteAll', [ServiceController::class, 'deleteAll'])->name('services.delete.all');