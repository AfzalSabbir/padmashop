<?php

namespace App\Http\Controllers\backend;

use App\Helpers\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use DB;
use Illuminate\Http\Request;

class SliderController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function index(){

		// get all slider image
		$data['sliders'] = $sliderInfo = DB::table('sliders')->orderBy('position', 'asc')->get();

		return view('backend.pages.slider.index', $data);
	}

	public function store(Request $request)
	{
        //Validation Check
		$request->validate([
			'title'				=>'required',
			'image'				=> 'required',
		]);

        // This Code for Image Upload Here ImageUpolder is a Helper
		$image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/slider', 1170, 400);
		$image = 'public/images/slider/'.$image;

		// This Data array Using For all Request Set in DB insert
		
		$data = [
			'title'             => $request->title,
			'url'       		=> $request->url,
			'image' 			=> $image,
			'status' 			=> 1,
			'created_at' 		=> date("Y-m-d H:i:s"),
			'updated_at' 		=> date("Y-m-d H:i:s")
		];

		// save data nad return id
		$id = DB::table('sliders')->insertGetId($data);

		// update position
		DB::table('sliders')->where('id', $id)->update(['position' => $id]);


		//Slider::create($data);

		session()->flash('add_message', 'Slider Successfully Saved!');
		return redirect()->route('admin.slider.index');
	}

	public function approve($id)
    {
		$slider = new Slider();

		$sliderInfo = $slider->where('id', $id)->first();

		if(!empty($sliderInfo)){

			if($sliderInfo->status == 1){
				$slider->where('id', $id)->update(['status' => 0]);
				session()->flash('success_message', 'Disable');
			}else{
				$slider->where('id', $id)->update(['status' => 1]);
				session()->flash('success_message', 'Enable');
			}
		}else{
			session()->flash('warning_message', 'Data not Fount...!');
		}
		
        return redirect()->route('admin.slider.index');
	}
	
	public function delete($id)
    {
		$slider = new Slider();

		$sliderInfo = $slider->where('id', $id)->first();

		if(!empty($sliderInfo)){
			
			if(file_exists($sliderInfo->image)){
				unlink($sliderInfo->image);
			}

			$slider->where('id', $id)->delete();
	
			session()->flash('delete_message', 'Deleted');
		}else{
			session()->flash('warning_message', 'Data not Fount...!');
		}

        return redirect()->route('admin.slider.index');
    }
}
