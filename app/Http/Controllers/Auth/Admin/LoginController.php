<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Helpers\QueryHelper;
use Jenssegers\Agent\Agent;
use Location;
use Auth;
use Session;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = 'admin-ctp';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest:admin')->except('logout');
  }


  public function showLoginForm()
  {
    return view('backend.auth.login');
  }


  public function login(Request $request)
  {
      //Validate the form data
    $this->validate($request, [
      'username' 		=> 'required',
      'password' 		=> 'required|min:6'
    ]);

    //Attempt to log the employee in
    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {

      $this->saveAccess();

      //If successful then redirect to the intended location
      return redirect()->intended(route('admin.home'));
    }

    //If unsuccessfull, then redirect to the admin login with the data
    Session::flash('login_error', "Invalid username / password");
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
  }


  private function saveAccess()
  {
    $agent = new Agent();

    if($agent->isDesktop()){
      $device = "PC";
    }
    else{
      $device = "Mobile";
    }

    $browser = $agent->browser();

    $data = array(
      'admin_id' => Auth::guard('admin')->user()->id,
      'ip' => \Request::ip(),
      'country' => Location::get()->countryCode,
      'browser' => $browser,
      'device' => $device
    );
    QueryHelper::loginInfo('AdminAccessInfo', $data);
  }


  public function username()
  {
    return 'username';
  }
}
