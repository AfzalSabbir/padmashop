<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    protected $fillable = ['name', 'country', 'district_id', 'shipping_cost', 'status'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
