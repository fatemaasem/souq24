<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['title_ar','title_en','desc_ar','desc_en','image','categoryService_id'];

    protected $appends = ['image_url'];

    protected $hidden = ['image'];
    
    public function getImageUrlAttribute()
    {
        return  url('storage/' . $this->image) ;
    }
    public function categoryService(){
        return $this->belongsTo(CategoryService::class,'categoryService_id');
    }
}
