<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Models\FlashMessage;

use DB, Auth, Image;

class NotificationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin', ['except' => ['flash']]);
	}


	public function index(Request $request)
	{
		$flashMessages = FlashMessage::orderBy('id', 'desc');

		if (\Request::isMethod('post')) {
			$data 				= $request->except(['_token', 'date_to', 'image']);
			$data['admin_id'] 	= Auth::guard('admin')->user()->id;
			$data['date_to'] 	= $request->date_to ? $request->date_to.' 23:59:59':'3000-01-01 23:59:59';
			$data['code'] 		= time();
			

			if($request->image){
				$image = $flashMessages->where('type', 'push')->first(['image']);
				if(file_exists($image)){
					unlink($image);
				}
				$path = 'public/images/flash_message/push'.time().'.'.$request->image->getClientOriginalExtension();
				Image::make($request->image)->resize(200, 200)->save($path);
				$data['image'] = $path;
			}
			FlashMessage::where('type', $request->type)->update($data);
		}

		$flashMessages = $flashMessages->get();
		session()->flash('add_message', '');
		return view('backend.pages.notification.index', compact('flashMessages'));
	}


    public function flash()
    {
    	$flashMessages = FlashMessage::orderBy('id', 'desc')->where('type', 'flash')->first(['code']);

        $siteFlash = \Session::get('siteFlashe');
        $siteFlash[] = $flashMessages->code;

        \Session::put('siteFlashe', $siteFlash);
        // dd($flashMessages, $siteFlash, \Session::all());
        return response()->json($flashMessages, 200);
    }
}
