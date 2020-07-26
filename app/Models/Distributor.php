<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ["d_code", "name", "shop_name", "mobile", "address", "status"];
}
