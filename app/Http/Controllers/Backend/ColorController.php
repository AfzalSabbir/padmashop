<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Color;

class ColorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$colors = Color::orderBy('status','desc')->orderBy('id','desc')->get();
		return view('backend.pages.color.index', compact('colors'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => ucwords($request->title),
			'status' => $request->status
		);

		QueryHelper::simpleInsert('Color', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.color.index');
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => ucwords($request->title),
			'status' => $request->status
		);

		Color::where('id', $id)->update($data);
		
		session()->flash('update_message', 'Added');
		return redirect()->route('admin.color.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);

		$data = array(
			'status' => 0
		);

		QueryHelper::simpleUpdate('Color', $data, $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.color.index');
	}

}
