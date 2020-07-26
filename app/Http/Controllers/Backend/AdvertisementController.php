<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Advertisement;


class AdvertisementController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index(){
		$advertisements = Advertisement::orderBy('status','desc')->orderBy('id','desc')->get();
		return view('backend.pages.advertisement.index', compact('advertisements'));
	}

	public function create()
	{
		$parents = Advertisement::orderBy('id', 'desc')->where('status', '>', '0')->get();
		return view('backend.pages.advertisement.create', compact( 'parents'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'image' => 'required',
			'status' => 'required'
		]);

       // This Code Fore Image Uploade Heare ImageUpolder is Helper   
		$image = ImageUploadHelper::uploadWithOriginalSize('image', $request->image, time(), 'public/images/advertisement');
		$advertisement_image = 'public/images/advertisement/'.$image;

        // This Data array Using For all Request Set in DB insert  
		$data = array(
			'title' => $request->title,
			'description' => $request->description,
			'image' => $advertisement_image,
			'type' => $request->type,
			'status' => $request->status,
		);

		QueryHelper::simpleInsert('Advertisement', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.advertisement.index');
	}


	public function edit($id)
	{   
		$advertisement = Advertisement::where('id',$id)->first();
		return view('backend.pages.advertisement.edit', compact('advertisement'));
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'status' => 'required'
		]);

		$old_image = $request->old_image;
       // This Code Fore Image Uploade Heare ImageUpolder is Helper   
		if($request->image){
			$image = ImageUploadHelper::updateWithOriginalSize('image', $request->image, time(), 'public/images/advertisement', $old_image);
			$advertisement_image = 'public/images/advertisement/'.$image;
		}
		else{
			$advertisement_image = $old_image;
		}

        // This Data array Using For all Request Set in DB insert  
		$data = array(
			'title' => $request->title,
			'description' => $request->description,
			'image' => $advertisement_image,
			'type' => $request->type,
			'status' => $request->status,
		);

		Advertisement::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.advertisement.index');
	}


	public function delete($id)
	{
		$advertisement = Advertisement::where('id', $id);
		unlink($advertisement->first()->image);
		$advertisement->delete();
		session()->flash('delete_message', 'Deleted');
		return redirect()->route('admin.advertisement.index');
	}
}
