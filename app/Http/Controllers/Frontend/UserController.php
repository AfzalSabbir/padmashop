<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($username)
    {
        if(request()->route('username') == Auth::user()->username){
            return view('frontend.pages.user.index');
        }
        else{
            return view('errors.401');
        }
    }


    public function checkMobile(Request $request)
    {
    	$user = DB::table('users')->where('mobile', $request->mobile)->first();
    	if($user){
    		return $user->mobile;
    	}
    	else{
    		return 'available';
    	}
    }


    public function updateProfile(Request $request)
    {
    	$data = array(
    		'name' => $request->name,
    		'mobile' => $request->mobile,
    	);

    	DB::table('users')->where('id', $request->id)->update($data);

    	return $data;
    }


    /**
     * Change Password
    */
    public function passwordChange(Request $request)
    {

        $user = Auth::user();

        if(Hash::check($request->oldPassword, $user->password)){
          $user->password = Hash::make($request->newPassword);
          $user->save();

          return $user;
        }
        else{
            return "mismatch";
        }
    }


    /**
     * Change Image
    */
    public function changeImage(Request $request)
    {
        $img = $request->get('image');


        //remove extra parts
        $exploded =  explode(",", $img);

        //Extension
        if (str_contains($exploded[0], 'gif')) {
            $ext = 'gif';
        } else if (str_contains($exploded[0], 'jpg')) {
            $ext = 'jpg';
        } else if (str_contains($exploded[0], 'png')) {
            $ext = 'png';
        } else if (str_contains($exploded[0], 'jpeg')) {
            $ext = 'jpeg';
        }

        // Decode
        $decoded_data = base64_decode($exploded[1]);

        $file_name = time(). ".".$ext;

        // Local folder path
        $path = "public/images/user/" .$file_name;

        // Upload
        if (file_put_contents($path, $decoded_data)) {
            $user = Auth::user();
            if($user->image){
                ImageUploadHelper::delete($user->image);
            }
            $user->image = 'public/images/user/'.$file_name;
            $user->save();
            return json_encode(['uploaded' => 1]);
        }else{
            return json_encode(['uploaded' => 0]);
        }
    }


    /**
     * get user order
    */
    public function getMyOrder($user_id)
    {
        $orders = Order::orderBy('id', 'desc')->where('user_id', $user_id)->get();

        return $orders;    
    }
}