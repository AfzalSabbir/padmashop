<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;

class LoginOPTController extends Controller
{
  public function GetOtp(Request $request)
  {
  	$user_information = DB::table('users')->where('mobile', $request->mobile)->first();

    return $user_information;
  }   
}