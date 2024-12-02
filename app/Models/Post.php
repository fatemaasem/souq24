<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title_ar','title_en','desc_ar','desc_en','image','categoryPost_id'];
    protected $appends = ['image_url'];

    protected $hidden = ['image'];
    
    public function getImageUrlAttribute()
    {
        return  url('storage/' . $this->image) ;
    }
    public function categoryPost(){
        return $this->belongsTo(CategoryPost::class,'categoryPost_id');
    }
}
