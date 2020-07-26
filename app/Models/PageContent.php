<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
	protected $fillable = ['name_en', 'name_bn', 'title_en','title_bn','description_en','description_bn','image','route','parent_id','status'];


    public function submenu()
    {
    	return $this->hasMany(PageContent::class, 'parent_id');
    }


    public function parent()
    {
    	return $this->belongsTo(PageContent::class, 'parent_id');
    }
}
