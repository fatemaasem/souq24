<?php
namespace App\Dtos\Orders;

use App\Models\CategoryStore;

class StoreDto{

    public static function create($request){
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'store_name_ar'=>$request->store_name_ar??null,
            'store_name_en'=>$request->store_name_en??null,
            'categoryStore_id'=>$request->categoryStore_id,
            'status'=>$request->status??'pending'
        ];
    }
}