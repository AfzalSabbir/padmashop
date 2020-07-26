<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu', 'menu_bn', 'parent_id', 'menu_position', 'icon', 'url', 'order', 'route', 'status'];

    public function parent()
    {
    	return $this->belongsTo(Menu::class);
    }

    public function submenus()
    {
    	return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    public static function roleMenu($menuId)
    {
        $menu = Menu::find($menuId);
        if($menu){
            return $menu;
        }
        else{
            return false;
        }
    }

    public static function existForRole($menuId, $submenus)
    {
    	if(isset($menuId) && isset($submenus)){
            foreach ($submenus as $submenu) {
                if($submenu == $menuId){
                    return true;
                    break;
                }
            }
        }
        else{
            return false;
        }
    }

    public static function checkBodyMenu($menuId, $roleMenus)
    {
        if(isset($menuId) && isset($roleMenus)){
            if($roleMenus){
                $roleMenus = json_decode($roleMenus);
                foreach ($roleMenus as $roleMenu) {
                    if($roleMenu == $menuId){
                        return true;
                        break;
                    }
                }
            }
            else{
                return false;
            }

        }
        else{
            return false;
        }
    }
}
