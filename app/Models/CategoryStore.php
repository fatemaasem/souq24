<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStore extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en','icon','price'];
    protected $appends = ['icon_url'];
    protected $hidden = ['icon'];
    public function templates(){
        return $this->hasMany(Template::class,'categoryStore_id');
    }
    public function getIconUrlAttribute()
    {
        return  url('storage/' . $this->icon) ;
    }
}
