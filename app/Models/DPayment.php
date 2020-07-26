<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DPayment extends Model
{
	protected $fillable = [
		'd_id', 'date',  'payment', 'remarks'
	];

	public function distributor()
	{
		return $this->hasOne(Distributor::class, 'id', 'd_id');
	}
}