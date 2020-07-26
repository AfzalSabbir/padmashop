<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
	protected $fillable = ['user_mac', 'product_id', 'status'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
