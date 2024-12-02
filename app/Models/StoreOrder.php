<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'store_name_ar',
        'store_name_en',
        'categoryStore_id',
        'created_at',
        'status'
    ];

    /**
     * Define the relationship with the CategoryStore model (if applicable).
     */
    public function categoryStore()
    {
        return $this->belongsTo(CategoryStore::class, 'categoryStore_id','id');
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('F j, Y, g:i a');
    }
}
