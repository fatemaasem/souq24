<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable=['desc_ar','desc_en','image','categoryStore_id'];

    protected $appends = ['image_url'];

    protected $hidden = ['image'];

    public function CategoryStore(){
        return $this->belongsTo(CategoryStore::class,'categoryStore_id');
    }

    public function getImageUrlAttribute()
    {
        return  url('storage/' . $this->image) ;
    }
}
