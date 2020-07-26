<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\NumberHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Coupon;

class CouponController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{

		$coupons = Coupon::orderBy('status','desc')->orderBy('id','desc')->get();
		return view('backend.pages.coupon.index', compact('coupons'));
	}


	public function store(Request $request)
	{

		$this->validate($request, [
			'title' => 'required|unique:coupons',
			'discount' => 'required',
			'code' => 'required',
			'taka' => 'required',
			'category' => 'required',
			'from' => 'required',
			'to' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'discount' => NumberHelper::simpleMod(NumberHelper::simpleDryString($request->discount), 100),
			'code' => $request->code,
			'taka' => $request->taka,
			'category' => $request->category,
			'from' => $request->from,
			'to' => $request->to,
			'status' => $request->status
		);

		QueryHelper::simpleInsert('Coupon', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.coupon.index');
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required|unique:coupons,title,'.$id,
			'discount' => 'required',
			'code' => 'required',
			'taka' => 'required',
			'category' => 'required',
			'from' => 'required',
			'to' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'discount' => NumberHelper::simpleMod(NumberHelper::simpleDryString($request->discount), 100),
			'code' => $request->code,
			'taka' => $request->taka,
			'category' => $request->category,
			'from' => $request->from,
			'to' => $request->to,
			'status' => $request->status
		);

		Coupon::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.coupon.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);

		$data = array(
			'status' => 0
		);

		QueryHelper::simpleUpdate('Coupon', $data, $where);

		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.coupon.index');
	}

}
