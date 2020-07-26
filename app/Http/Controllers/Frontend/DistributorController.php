<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use App\Models\Distributor;
use Auth;
use DB;

class DistributorController extends Controller
{
    public function index($d_code)
    {
    	if($d_code != ""){
    	    $distributor_name = Distributor::where('d_code', $d_code)->first();
    	    $distributor_name = $distributor_name ? $distributor_name->name : '';
    	}
    	return $distributor_name;
        
    }

}
