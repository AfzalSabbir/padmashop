<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;

class RoleController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		return view('backend.pages.role.index');
	}


	public function create($role)
	{
		// set tiny value according to admin type
		if($role == 'super-admin'){
			$role = 1;
		}
		else if($role == 'admin'){
			$role = 2;
		}
		else{
			$role = 3;
		}

		$condition = array(
			'role' => $role
		);
		$menus = QueryHelper::simpleRead('Menu', 'order', 'asc');
		$role_wise = QueryHelper::complexSingleRead('Role', $condition);
		return view('backend.pages.role.assign', compact('menus', 'role', 'role_wise'));
	}


	public function store(Request $request)
	{
		$order_menu = $request->menu; // all menus that is selected by super admin
		$order_sub_menu = $request->submenu; // all submenus that is selected by super admin
		$order_in_body = $request->in_body; // all submenus that is selected by super admin

		// loop through size of the menu
		for($i=0; $i<sizeof($order_menu); $i++){
			// get the value of order of menu 
			$current_menu = QueryHelper::getDbSingleResults('menus', array('id' => $request->menu[$i]))->order;
			// loop through all the menus to check order of the menus each other
			for($j=$i; $j<sizeof($order_menu); $j++){
				// get the value of order menu to compare
				$compare_with_menu = QueryHelper::getDbSingleResults('menus', array('id' => $request->menu[$j]))->order;
				// condition of bubble sort to change value according to order
				if($current_menu > $compare_with_menu){
					$temp = $order_menu[$i];
					$order_menu[$i] = $order_menu[$j];
					$order_menu[$j] = $temp;
				}
			}
		}

		// loop through size of the submenu
		if($request->submenu){
			for($i=0; $i<sizeof($order_sub_menu); $i++){
				// get the value of order of submenu
				$current_menu = QueryHelper::getDbSingleResults('menus', array('id' => $request->submenu[$i]))->order;
				// loop through all the menus to check order of the submenus each other
				for($j=$i; $j<sizeof($order_sub_menu); $j++){
					// get the value of order submenu to compare
					$compare_with_menu = QueryHelper::getDbSingleResults('menus', array('id' => $request->submenu[$j]))->order;
					// condition of bubble sort to change value according to order
					if($current_menu > $compare_with_menu){
						$temp = $order_sub_menu[$i];
						$order_sub_menu[$i] = $order_sub_menu[$j];
						$order_sub_menu[$j] = $temp;
					}
				}
			}
		}

		// loop through size of the inbody menus
		if($request->in_body){
			for($i=0; $i<sizeof($order_in_body); $i++){
				// get the value of order of inbody menus 
				$current_menu = QueryHelper::getDbSingleResults('menus', array('id' => $request->in_body[$i]))->order;
				// loop through all the menus to check order of the inbody menus each other
				for($j=$i; $j<sizeof($order_in_body); $j++){
					// get the value of order inbody menus to compare
					$compare_with_menu = QueryHelper::getDbSingleResults('menus', array('id' => $request->in_body[$j]))->order;
					// condition of bubble sort to change value according to order
					if($current_menu > $compare_with_menu){
						$temp = $order_in_body[$i];
						$order_in_body[$i] = $order_in_body[$j];
						$order_in_body[$j] = $temp;
					}
				}
			}
		}

		$all_menu = json_encode($order_menu); // encode menus
		$all_sub_menu = json_encode($order_sub_menu); // encode submenus
		$all_in_body = json_encode($order_in_body); // encode in body menus
		$data = array(
			'menu'     => $all_menu,
			'sub_menu' => $all_sub_menu,
			'in_body'  => $all_in_body,
			'role'     => $request->role_type
		);

		$condition = array(
			'role' => $request->role_type
		);

		// if role is set for this user_role then update otherwise create for this role
		if(QueryHelper::complexSingleRead('Role', $condition)){
			QueryHelper::simpleUpdate('Role', $data, $condition);
		}
		else{
			QueryHelper::simpleInsert('Role', $data);
		}

		session()->flash('update_message', 'Role');
		return redirect()->route('admin.role.index');
	}
}
