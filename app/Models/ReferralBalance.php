<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralBalances extends Model
{
    protected $fillable = [
    	'd_code', 'customer_id', 'order_id', 'percentage', 'status'
    ];
}
