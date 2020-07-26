<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class AjaxController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function getSubCategory($id=null){
		return json_encode(SubCategory::where('category_id', $id)->get()->toArray());
	}
}
