<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\NumberHelper;
use App\Models\Review;

class ReviewController extends Controller
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
		$rows = Review::orderBy('status', 'desc')->orderBy('id', 'desc')->where('status', 1)->get();
		return view('backend.pages.review.index', compact('rows'));
	}

	public function add()
	{
		return view('backend.pages.review.add');
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

	public function view($id)
	{
		$row = Review::where('id', $id)->first();
		return view('backend.pages.review.view', compact('row'));
	}

	public function edit($id)
	{
		$row = Review::where('id', $id)->first();
		return view('backend.pages.review.edit', compact('row'));
	}

	public function update(Request $request, $id)
	{
		$review = Review::where('id', $id)->first();
		$this->validate($request, [
			'' => '',
		]);
		$data = $request->except(['_token']);
		$review->update($data);
		session()->flash('update_message', 'Added');
		return redirect()->route('admin.review.index');
	}

	public function delete($id)
	{
		$review = Review::where('id', $id)->first();
		$data['status'] = 0;
		$review->update($data);
		session()->flash('deactive_message', 'Deactived');
		return redirect()->route('admin.review.index');
	}
}
