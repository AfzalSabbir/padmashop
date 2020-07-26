<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\NumberHelper;
use App\Models\DCommission;

class DCommissionController extends Controller
{

	/**
	* Site Access
	**/
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index()
	{
		$rows = DCommission::orderBy('status', 'desc')->orderBy('id', 'desc')->get();
		return view('backend.pages.d_commission.index', compact('rows'));
	}

	public function add()
	{
		$row = DCommission::where('status', 1)->first();

		if($row){
			return view('backend.pages.d_commission.edit', compact('row'));
		}else{
			return view('backend.pages.d_commission.add');
		}
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'commission' => 'required',
		]);

		$data = $request->except(['_token']);
		QueryHelper::simpleInsert('DCommission', $data);
		session()->flash('add_message', 'Added');
		return redirect()->route('admin.d_commission.index');
	}

	public function edit($id)
	{
		$row = DCommission::where('id', $id)->first();
		return view('backend.pages.d_commission.edit', compact('row'));
	}

	public function update(Request $request, $id)
	{
		$d_commission = DCommission::where('id', $id)->first();
		$this->validate($request, [
			'commission' => 'required',
		]);
		$data = $request->except(['_token']);
		$d_commission->update($data);
		session()->flash('update_message', 'Added');
		return redirect()->route('admin.d_commission.index');
	}

	public function delete($id)
	{
		$d_commission = DCommission::where('id', $id)->first();
		$data['status'] = 0;
		$d_commission->update($data);
		session()->flash('deactive_message', 'Deactived');
		return redirect()->route('admin.d_commission.index');
	}
}
