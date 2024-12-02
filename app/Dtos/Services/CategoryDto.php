<?php
namespace App\Dtos\Services;

use App\Models\CategoryService;

class CategoryDto{

    public static function create($request,$category=null){
        $category = $category ?? new CategoryService();
        return[
            'name_ar'=>$request->name_ar??null,
            'name_en'=>$request->name_en??null,
            'icon'=>$request->icon?$request->icon->store('category_services','public'):$category->icon,
            'price'=>$request->price??null
        ];
    }
}