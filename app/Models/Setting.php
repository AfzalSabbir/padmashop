<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = "settings";
	
    protected $fillable = ['title', 'logo', 'favicon', 'offer', 'email', 'mobile', 'facebook', 'twitter', 'youtube', 'linkedin', 'address', 'order', 'processing', 'delivered'];
}