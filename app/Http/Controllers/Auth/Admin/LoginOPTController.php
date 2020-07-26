<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;

class LoginOTPController extends Controller
{
  public function GetOtp(Request $request)
  {
    return "okay";
  }   
}
