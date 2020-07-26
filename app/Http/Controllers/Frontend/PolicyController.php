<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PolicyController extends Controller
{

	public function index()
	{

		$data['privacyInfo'] = DB::table('policies')->where('type', 'privacy')->first();

		return view('frontend.pages.policy.index', $data);
	}


	public function shipping()
	{

		$data['shippingInfo'] = DB::table('policies')->where('type', 'shipping')->first();

		return view('frontend.pages.policy.shipping', $data);
	}

	public function payment()
	{

		$data['paymentInfo'] = DB::table('policies')->where('type', 'payment')->first();

		return view('frontend.pages.policy.payment', $data);
	}


	public function site_mape()
	{

		$data['sitemapeInfo'] = DB::table('policies')->where('type', 'site_mape')->first();

		return view('frontend.pages.policy.sitemape', $data);
	}
}
