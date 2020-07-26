<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DCommission extends Model
{
	protected $fillable = [
		'title', 'commission',  'status', 'created_at', 'updated_at'
	];
}
