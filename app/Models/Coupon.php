<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['title', 'discount', 'code', 'taka', 'category', 'from',  'to', 'status', 'created_at', 'updated_at'];
}
