<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Unit;

class UnitController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$units = Unit::orderBy('status','desc', 'id','desc')->get();
		return view('backend.pages.unit.index', compact('units'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'status' => $request->status
		);

		QueryHelper::simpleInsert('Unit', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.unit.index');
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'status' => $request->status
		);

		Unit::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.unit.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);

		$data = array(
			'status' => 0
		);

		QueryHelper::simpleUpdate('Unit', $data, $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.unit.index');
	}

}
