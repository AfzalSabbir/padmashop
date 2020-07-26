<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $district = DB::table('districts')->orderBy('name', 'asc')->where('status',1)->get();
        return view('frontend.pages.auth.login',compact('district'));
    }


    public function login(Request $request)
    {
      //Validate the form data
      $this->validate($request, [
        'username'        => 'required',
        'password'        => 'required|min:6'
      ]);
      
      if (preg_replace('/[^0-9]/', '', $request->username) == $request->username) {
        //Attempt to log the employee in
        if (Auth::guard()->attempt(['mobile' => $request->username, 'password' => $request->password, 'status' => 1], $request->remember)) {

          //If successful then redirect to the intended location
          //return redirect()->intended(route('index'));
          if ($request->product) {
            return redirect()->route('product.view',$request->product);
          } else {
            return redirect()->intended(route('index'));
          }
        }
      } else {

        //Attempt to log the employee in
        if (Auth::guard()->attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1], $request->remember)) {

          //If successful then redirect to the intended location
          //return redirect()->intended(route('index'));
          if ($request->product) {
            return redirect()->route('product.view',$request->product);
          } else {
            return redirect()->intended(route('index'));
          }
        }
      }
      //If unsuccessfull, then redirect to the admin login with the data
      session()->flash('login_error', "Invalid Username or Mobile / Password");
      return redirect()->back()->withInput($request->only('username', 'remember'));
    }


    // protected function credentials(Request $request)
    // {
    //     // return $request->only($this->username(), 'password');
    //     return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    // }
}
