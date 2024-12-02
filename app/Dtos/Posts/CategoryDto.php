<?php

namespace App\Dtos\Posts;

class CategoryDto{
    public static function create($request){
        return [
            'name_ar'=>$request->name_ar??null,
            'name_en'=>$request->name_en??null,
        ];
    }
}

