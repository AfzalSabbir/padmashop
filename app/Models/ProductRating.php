<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $fillable = ['user_id', 'rate_value', 'product_id'];
}
