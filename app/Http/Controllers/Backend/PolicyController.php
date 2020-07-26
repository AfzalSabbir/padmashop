<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Policy;


class PolicyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index(Request $request)
	{
		$policy =  new Policy();
		$type = '';

		if($request->isMethod('post'))
		{
			$type = $request->type;
			$policy =  $policy->where('type', $request->type);
		}

		$policy = $policy->first();
		return view('backend.pages.policy.index', compact('policy', 'type'));
	}

	public function policy(Request $request)
	{
		if($request->isMethod('post')){
			$data = $request->except(['_token']);
			$type = $request->type;
			$policy = new Policy();

			$policy = $policy->where('type', $request->type);
			if($policy->get()->isEmpty()){
				$policy->create($data);
			}
			else{
				$policy->update($data);
			}

			$policy = $policy->first();
			return view('backend.pages.policy.index', compact('policy', 'type'));
		}
		else{
			return redirect()->route('admin.policy');
		}
	}
}
