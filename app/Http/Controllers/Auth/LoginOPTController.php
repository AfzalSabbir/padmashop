<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Helpers\SMSHelper;
use App\Models\User;
use DB;
use Hash;

class LoginOPTController extends Controller
{

  public function GetOtp(Request $request)
  {
    $message = '';
    $user_information = DB::table('users')->where('mobile', $request->mobile);
    if($user_information->first()){
      $optcode = rand(10000,999999);
      $user_information->update(['otp_code'=> $optcode]);
      SMSHelper::sendSMS($user_information->first()->mobile, "Your \"www.padmashop.com\" OTP code is $optcode", '1');
      $message = "success";
    }else if(strlen($request->mobile) > 10 && strlen($request->mobile) == 11){
      $validate = SMSHelper::sendSMS($request->mobile, "An account has been opened on your \"www.padmashop.com\" ", '1');
      if($validate){
        $optcode = rand(10000,999999);
        $user_default_info = [
          'name' => $request->mobile,
          'mobile' => $request->mobile,
          'username' => $request->mobile,
          'password' => Hash::make($request->mobile),
          'village' => "N/A",
          'address' => "N/A",
          'status' => 1,
          'otp_code' => $optcode,
        ];
        if(User::insert($user_default_info)){
          SMSHelper::sendSMS($user_information->first()->mobile, "Your \"www.padmashop.com\" OTP code is $optcode", '1');
          $message = "success";
        }
      }
    }
    return $message;
  } 

  public function login(Request $request)
  {
    $message = '';
    $user_information = DB::table('users')
    ->where(['otp_code'=> $request->otp_code])
    ->where(['mobile'=> $request->mobile])
    ->first();
    if($user_information){
      $user_id = $user_information->id;
      $user = User::find($user_id);
    Auth::login($user);
      $message = "success";
    }else{
      $message = 'sorry';
    }
    return $message;
  } 

}