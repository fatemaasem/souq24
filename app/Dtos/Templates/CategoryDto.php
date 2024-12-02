<?php
namespace App\Dtos\Templates;

use App\Models\CategoryStore;

class CategoryDto{

    public static function create($request,$category=null){
       // Ensure $category is an instance of CategoryStore or default to a new one
    $category = $category ?? new CategoryStore;
    
        return[
            'name_ar'=>$request->name_ar??$category->name_ar,
            'name_en'=>$request->name_en??$category->name_en,
            'icon'=>$request->icon?$request->icon->store('category_stores','public'):$category->icon,
            'price'=>$request->price??null
        ];
    }
}