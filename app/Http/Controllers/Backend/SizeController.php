<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Size;

class SizeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$sizes = Size::orderBy('status','desc')->orderBy('id','desc')->get();
		// dd($sizes);
		return view('backend.pages.size.index', compact('sizes'));
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

		QueryHelper::simpleInsert('Size', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.size.index');
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

		Size::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.size.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);

		$data = array(
			'status' => 0
		);

		QueryHelper::simpleUpdate('Size', $data, $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.size.index');
	}

}
