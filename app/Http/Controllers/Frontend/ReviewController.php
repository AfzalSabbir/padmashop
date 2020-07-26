<?php


namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\NumberHelper;
use App\Models\Review;

class ReviewController extends Controller
{

	public function __construct()
	{
		//$this->middleware('auth:admin');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'user_id' => 'required',
			'product_id' => 'required',
			'review' => 'required',
		]);

		$data = $request->except(['_token', 'product_slug']);
		QueryHelper::simpleInsert('Review', $data);
		session()->flash('add_message', 'Added');
		return redirect()->route('product.view',$request->product_slug);
	}
}
