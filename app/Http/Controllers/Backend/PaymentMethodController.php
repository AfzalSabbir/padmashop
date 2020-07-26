<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$payment_methods = PaymentMethod::orderBy('status','desc')->orderBy('id','desc')->get();
		return view('backend.pages.payment_method.index', compact('payment_methods'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' 			=> $request->title,
			'status' 			=> $request->status,
			'payment_mobile_no' => $request->payment_mobile_no,
		);


		if($request->icon) {
        	$data['icon'] = 'public/images/paymentgetway/'.ImageUploadHelper::uploadWithResize('icon', $request->file('icon'), time().'_'.$request->title, 'public/images/paymentgetway');
    	}

		QueryHelper::simpleInsert('PaymentMethod', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.payment_method.index');
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required',
		]);

		$data = array(
			'title' 			=> $request->title,
			'status' 			=> $request->status,
			'payment_mobile_no'	=> $request->payment_mobile_no,
		);


		if($request->icon) {
        	$data['icon'] = 'public/images/paymentgetway/'.ImageUploadHelper::uploadWithResize('icon', $request->file('icon'), time().'_'.$request->title, 'public/images/paymentgetway');
    	}

		PaymentMethod::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.payment_method.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);

		$data = array(
			'status' => 0
		);

		QueryHelper::simpleUpdate('PaymentMethod', $data, $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.payment_method.index');
	}

}
