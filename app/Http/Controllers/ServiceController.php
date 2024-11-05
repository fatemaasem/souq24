<?php

namespace App\Http\Controllers;

use App\Models\CategoryService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function allCategories(){
        return CategoryService::all();
    }

    public function servicesForOneCategory($id){
         // Attempt to find the store  by ID

         $categoryService=CategoryService::find($id);
         // Check if store was found
         if(!$categoryService){
             return response()->json(['error' => 'This category service not found'], 404);
         }
          // Return all templates for this store data as JSON
         return $categoryService->services;
    }
}
