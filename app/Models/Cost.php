<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{    
	protected $fillable = [
		'title', 'cost_field_id', 'cost_by', 'cost_type', 'pickdate', 'quantity', 'description', 'price', 'status', 'created_at', 'updated_at'
	];

    public function cost_sector()
    {
        return $this->belongsTo(Cost_field::class, 'cost_field_id');
    }
}
