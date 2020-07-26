<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;

class AdminAccessInfoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    /**
     * Information of admin panel access
    */
    public function index()
    {
    	$infos = QueryHelper::simpleRead('AdminAccessInfo');
    	return view('backend.pages.access_info.index', compact('infos'));
    }
}
