<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$myAdmines = Admin::orderBy('id','desc')
					->where('status',1)
					->orWhere('status', 0)
					->get();
		return view('backend.pages.myAdmin.index', compact('myAdmines'));
	} 


	public function create()
	{
		return view('backend.pages.myAdmin.create');
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|unique:admins',
			'username' => 'required|unique:admins',
			'admin_role' => 'required',
			'password' => 'required',
			'is_merchant' => 'required',
		]);

		$data = array(
			'name' => $request->name,
			'email' => $request->email,
			'username' => $request->username,
			'admin_role' => $request->admin_role,
			'password' => Hash::make($request->password),
			'is_merchant' => $request->is_merchant,
			'status' => 1,
		);
		QueryHelper::simpleInsert('Admin', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.myadmin.index');
	}


	public function edit($id)
	{
		$admin = Admin::where('id', $id)->first();
		return view('backend.pages.myAdmin.edit', compact('admin'));
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required',
			'admin_role' => 'required',
			'username' => 'required|unique:admins,username,'.$id,
			'email' => 'required|unique:admins,email,'.$id,
		]);

		$data = array(
			'name' => $request->name,
			'admin_role' => $request->admin_role,
			'username' => $request->username,
			'email' => $request->email,
			'is_merchant' => $request->is_merchant,
			'status' => $request->status,
		);

		if ($request->password) {
			$data['password'] = Hash::make($request->password);
		}

		//$where = array('id' => $id);
		//QueryHelper::simpleUpdate('Admin', $data, $where);
		Admin::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.myadmin.index');
	}


	public function delete($id)
	{
		// $where = array('id' => $slug);
		// $data = array(
		// 	'status' => 9
		// );

		// QueryHelper::simpleUpdate('Admin', $data, $where);
		Admin::where('id', $id)->update(['status' => 9]);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.myadmin.index');
	}
}
