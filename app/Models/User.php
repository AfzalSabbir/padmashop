<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'd_code', 'district_id', 'village', 'upazilla_id', 'username', 'password', 'is_merchant', 'status','reset_code','code_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public function upazilla()
    {
        return $this->belongsTo(Upazilla::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'd_code', 'd_code');
    }
}
