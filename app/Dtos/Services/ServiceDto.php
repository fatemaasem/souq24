<?php
namespace App\Dtos\Services;
class ServiceDto{

    public static function create($request){
        return [
            'title_ar' => $request->title_ar??null,
            'title_en' => $request->title_en??null,
            'desc_ar' => $request->desc_ar??null,
            'desc_en' => $request->desc_en??null,
            'image' => $request->image??null,
            'categoryService_id' => $request->categoryService_id??null,
        ];
    }
}