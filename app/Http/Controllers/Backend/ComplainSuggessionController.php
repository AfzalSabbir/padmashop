<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\ComplainSuggession;

class ComplainSuggessionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$complain_suggessions = ComplainSuggession::orderBy('status','desc')->orderBy('id','desc')->get();
		return view('backend.pages.complain_suggession.index', compact('complain_suggessions'));
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

		QueryHelper::simpleInsert('ComplainSuggession', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.complain_suggession.index');
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

		ComplainSuggession::where('id', $id)->update($data);
		
		session()->flash('update_message', 'Added');
		return redirect()->route('admin.complain_suggession.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);

		$data = array(
			'status' => 0
		);

		QueryHelper::simpleUpdate('ComplainSuggession', $data, $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.complain_suggession.index');
	}

}
