<?php
namespace App\Dtos\Templates;



class TemplateDto{

    public static function create($request){
       
        return [
            'desc_ar' => $request->desc_ar??null,
            'desc_en' => $request->desc_en??null,
            'image' => $request->image??null,
            'categoryStore_id' => $request->categoryStore_id??null,
        ];
    }
}