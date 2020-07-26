<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WishList extends Model
{
    protected $fillable = ['product_id', 'user_mac', 'status'];

    protected $with = ['product'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }


    public function getCreatedAtAttribute()
    {
    	 return  Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
