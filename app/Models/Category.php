<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'title_en', 'title_bn', 'image', 'slug', 'admin_id','position'
    ];


    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
