<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'massage','email','mobile', 'created_at', 'updated_at'];
    
}
