<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['menu', 'sub_menu', 'role', 'status'];

    public function menu()
    {
    	return $this->belongsTo(Menu::class);
    }

    public static function checkedMenu($menuId, $menus)
    {
    	if($menus){
            foreach ($menus as $menu) {
                if($menu == $menuId){
                    return 'checked';
                    break;
                }
            }
        }
        else{
            return "";
        }
    }
}
