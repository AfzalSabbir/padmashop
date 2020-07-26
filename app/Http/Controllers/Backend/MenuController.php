<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Models\Role;
use DB;

class MenuController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$menus = QueryHelper::simpleRead('Menu');
		return view('backend.pages.menu.index', compact('menus'));
	}


	public function create()
	{
		$menus = QueryHelper::simpleRead('Menu');
		return view('backend.pages.menu.add', compact('menus'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'menu' => 'required',
			'menu_bn' => 'required',
			'menu_position' => 'required',
			'order' => 'required'
		]);

		if($request->status == 1){
			$status = 1;
		}
		else{
			$status = 0;
		}

		$data = array(
			'menu'           => $request->menu,
			'menu_bn'        => $request->menu_bn,
			'parent_id'      => $request->parent_id,
			'menu_position'  => $request->menu_position,
			'icon'  		 => $request->icon,
			'url'  		     => $request->url,
			'order'  		 => $request->order,
			'route'  		 => $request->route,
			'status'         => $status
		);

		$menu = QueryHelper::simpleInsert('Menu', $data);

		if($this->getLocalLanguage()){
			session()->flash('add_message', 'Menu Information Has Been Added Successfully !!!');
		}
		else{
			session()->flash('add_message', 'মেনু সফলভাবে সংযোজন করা হয়েছে !!!');
		}
		return redirect()->route('admin.menu.index');
	}


	public function edit($id)
	{
		$menus = QueryHelper::simpleRead('Menu');
		$condition = array(
			'id' => $id
		);
		$singleMenu = QueryHelper::complexSingleRead('Menu', $condition);
		return view('backend.pages.menu.edit', compact('menus', 'singleMenu'));
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'menu' => 'required',
			'menu_bn' => 'required',
			'menu_position' => 'required',
			'order' => 'required'
		]);

		if($request->status == 1){
			$status = 1;
		}
		else{
			$status = 0;
		}

		$data = array(
			'menu'           => $request->menu,
			'menu_bn'        => $request->menu_bn,
			'parent_id'      => $request->parent_id,
			'menu_position'  => $request->menu_position,
			'icon'  		 => $request->icon,
			'url'  		     => $request->url,
			'order'  		 => $request->order,
			'route'  		 => $request->route,
			'status'         => $status
		);

		$condition = array(
			'id' => $id
		);

		$menu = QueryHelper::simpleUpdate('Menu', $data, $condition);

		if($this->getLocalLanguage()){
			session()->flash('update_message', 'Menu Information Has Been Updated Successfully !!!');
		}
		else{
			session()->flash('update_message', 'মেনু সফলভাবে আপডেট করা হয়েছে !!!');
		}
		return redirect()->route('admin.menu.index');
	}


	public function delete($id)
	{
		$condition = array(
			'id' => $id
		);

		// delete menu
		QueryHelper::delete('Menu', $condition);

		$menuCondition = array(
			'parent_id' => $id
		);


		$allSubMenusForRole = QueryHelper::complexRead('Menu', $menuCondition);
		// delete the menu of role
		if($allSubMenusForRole){
			foreach($allSubMenusForRole as $role_key => $allSubMenuForRole){
				$allMenus = QueryHelper::simpleRead('Role', 'id', 'asc');

				foreach($allMenus as $menu_key => $allMenu){
					$sub_menu_arrays = json_decode($allMenu->sub_menu);

					foreach($sub_menu_arrays as $sub_menu_array_key => $sub_menu_array){
						if($sub_menu_array == $allSubMenuForRole->id){
							unset($sub_menu_arrays[$sub_menu_array_key]);
							$array = array_values($sub_menu_arrays);
							$enocde = json_encode($array);
							$data = array(
								'sub_menu' => $enocde
							);
							QueryHelper::simpleUpdate("Role", $data, array('id' => $allMenu->id));
							break;
						}
					}
				}
			}
		}

		// delete submenus for which the menu is parent menu
		QueryHelper::delete('Menu', $menuCondition);
		
		$allMenus = QueryHelper::simpleRead('Role', 'id', 'asc');
		foreach($allMenus as $menu_key => $allMenu){
			$menu_arrays = json_decode($allMenu->menu);
			$sub_menu_arrays = json_decode($allMenu->sub_menu);

			foreach($menu_arrays as $menu_array_key => $menu_array){
				if($menu_array == $id){
					unset($menu_arrays[$menu_array_key]);
					$array = array_values($menu_arrays);
					$enocde = json_encode($array);
					$data = array(
						'menu' => $enocde
					);
					QueryHelper::simpleUpdate("Role", $data, array('id' => $allMenu->id));
					break;
				}
			}

			foreach($sub_menu_arrays as $sub_menu_array_key => $sub_menu_array){
				if($sub_menu_array == $id){
					unset($sub_menu_arrays[$sub_menu_array_key]);
					$array = array_values($sub_menu_arrays);
					$enocde = json_encode($array);
					$data = array(
						'sub_menu' => $enocde
					);
					QueryHelper::simpleUpdate("Role", $data, array('id' => $allMenu->id));
					break;
				}
			}
		}

		if($this->getLocalLanguage()){
			session()->flash('delete_message', 'Menu Information Has Been Deleted Successfully !!!');
		}
		else{
			session()->flash('delete_message', 'মেনু সফলভাবে ডিলিট হয়েছে !!!');
		}
		return redirect()->route('admin.menu.index');
	}



	public function sort()
	{
		$menus = DB::table('menus')
		->where('parent_id', null)
		->where('menu_position', 0)
		->get();
		return view('backend.pages.menu.sort', compact('menus'));
	}


	public function sort_update(Request $request)
	{
		$data_ = [];
		foreach ($request->order as $key => $order) {
			$data_[$request->id[$key]] = $order;
		}

		$this->validate($request, [
			'order' => 'required'
		]);

		foreach ($data_ as $key => $data) {
			DB::table('menus')
	            ->where('id', $key)
	            ->update(['order' => $data]);
		}

		session()->flash('update_message', 'Update!!!');
		return redirect()->route('admin.menu.sort');
	}


	private function getLocalLanguage()
	{
		if(\Config::get('app.locale') == 'en'){
			return true;
		}
		else{
			return false;
		}
	}
}
