<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Notifications\UserRegister;
use Session;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $district = DB::table('districts')->orderBy('name', 'asc')->where('status',1)->get();
        return view('frontend.pages.auth.register',compact('district'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'district_id' => 'required',
            'upazilla_id' => 'required',
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            // 'email' => 'required|string|email|max:255|unique:users',
            'village' => 'required',
            'mobile' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'district_id' => 'required',
            'upazilla_id' => 'required',
        ]);


        $user_token = str_random(32);

        $data = $request->except(['_token','password','password_confirmation', 'd_code', 'd_name']);

        if (!empty($request->d_code) && DB::table('distributors')->where('d_code', $request->d_code)->where('status', 1)->select('name')->get()[0]->name == $request->d_name) {
            $data['d_code'] = $request->d_code;
        }
        $data['password'] = Hash::make(request()->password);
        $data['status'] = 1;

        $user = User::create($data);
        
        // $user = User::create([
        //     'name' => $data['name'],
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'mobile' => $data['mobile'],
        //     'district_id' => $data['district_id'],
        //     'upazilla_id' => $data['upazilla_id'],
        //     'password' => Hash::make($data['password']),
        //     'status' =>$user_token,
        // ]);

        // $user->notify(new UserRegister($user));

         //If unsuccessfull, then redirect to the admin login with the data
        Session::flash('verify_message', "Registration has been completed successfully.");
        return Redirect()->back()->withInput();
    }


    public function user_verify($token){
        DB::table('users')->where('status', $token)->update(['status'=>1]);
        return redirect()->route('login');
    }

    public function getUpazilla($district_id)
    {
        $upazilla = DB::table('upazillas')->where('district_id', $district_id)->where('status',1)->get();
        return $upazilla;
    }

    public function getDCodeUsername($d_code)
    {

        if (strlen($d_code) > 0) {
            $DCodeUsername = DB::table('distributors')->where('d_code', $d_code)->where('status', 1)->select('name')->get();
            if (count($DCodeUsername) > 0) {
                return $DCodeUsername[0]->name;
            }
        }
    }
}
