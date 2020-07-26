<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAccessInfo extends Model
{
    protected $fillable = ['admin_id', 'ip', 'country', 'device', 'browser'];

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }
}
