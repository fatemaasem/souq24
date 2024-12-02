<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en','icon','price'];
    protected $appends = ['icon_url'];
    protected $hidden = ['icon'];
    public function services(){
        return $this->hasMany(Service::class,'categoryService_id');
    }
    public function getIconUrlAttribute()
    {
        return  url('storage/' . $this->icon) ;
    }
}
