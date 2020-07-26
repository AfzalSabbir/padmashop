<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\SMSHelper;
use SoapClient;
use App\Models\User;
use DB;
use Hash;

class UserPasswordReset extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function resetCode(Request $request)
	{
		$flug = 0;
		$user = DB::table('users')
		->where('username', $request->nameorpass)
		->orWhere('mobile', $request->nameorpass)
		->first();
		if($user)
		{
			/*=================== database update ====================*/
			$random = rand(111111,999999);
			DB::table('users')
			->where('username', $request->nameorpass)
			->orWhere('mobile', $request->nameorpass)->update(['reset_code'=>$random ,'code_status'=>0]);
			$flug = 1;

			/*================ SMS Modeul ===============*/
			$username = env('SMS_USERNAME');
	        $password = env('SMS_PASSWORD');
	        $url = env('SMS_URL');

	        $paramArray = array(
	            'userName'    => $username,
	            'userPassword'  => $password,
	            'mobileNumber'  => $user->mobile,
	            'smsText'   => 'Your Verification Code is '.$random,
	            'type'      => "TEXT",
	            'maskName'    => "",
	            'campaignName'  => ""
	        );
	        $soapClient = new SoapClient($url);
	        $value = $soapClient->__call("OneToOne", array($paramArray));
			/*================ END SMS Modeul ===============*/
		}
		
		return $flug;
	}
	public function showVerificationform()
	{
		return view('frontend.pages.auth.password_reset');
	}
	public function confirmation(Request $request)
	{
		// dd($request);
		$user = DB::table('users')->where('reset_code',$request->confirm_code)->first();
		if($user)
		{
			if($user->code_status == 1){
				session()->flash('wrog_code', 'This verification code already used..!');
				return redirect()->back();	
			}
			else{
				session()->flash('token', request()->_token);
				return redirect()->back()->withInput();	
			}
		}
		else
		{
			session()->flash('wrog_code', 'Your verification code is not matched..!');
			return redirect()->back();
		}
	}

	public function change(Request $request)
	{
		request()->validate([
			'password'=>'required|min:6',
			'confirm_password'=>'required|min:6|same:password|min:6'
		]);
		// dd($request);
		$result = DB::table('users')
		->where('reset_code',$request->confirm_code)
		->update([
			'password'=> Hash::make($request->password),
			'code_status'=> 1
		]);
		session()->flash('success_message', 'Password Changed Successfully...');
		return redirect('/register');
	}
}
