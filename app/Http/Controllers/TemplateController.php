<?php

namespace App\Http\Controllers;

use App\Models\CategoryStore;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function allCategories(){
        return CategoryStore::all();
    }

    public function templatesForOneCategory($id){
         // Attempt to find the store  by ID

        $store=CategoryStore::find($id);
        // Check if store was found
        if(!$store){
            return response()->json(['error' => 'This category not found'], 404);
        }
         // Return all templates for this store data as JSON
        return $store->templates;
    }
}
