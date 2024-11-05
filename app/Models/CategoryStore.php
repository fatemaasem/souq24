<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStore extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en'];

    protected $hidden = ['id','updated_at','created_at'];
    public function templates(){
        return $this->hasMany(Template::class,'categoryStore_id');
    }
}
