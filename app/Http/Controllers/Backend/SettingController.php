<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Setting;


class SettingController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        // return "I'm On!";
        $setting = Setting::first();
        return view('backend.pages.setting.index', compact('setting'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'address' => 'required',
            'title' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
            'linkedin' => 'required',
            'lazy_loader' => 'mimes:svg',
        ]);

        $setting = Setting::first();

        if($request->logo){
            $setting->logo = ImageUploadHelper::update('logo', $request->file('logo'), 'logo-'.time(), 'public/images/settings', $setting->logo);
        }
        else{
            $setting->logo = $setting->logo;
        }

        if($request->lazy_loader){
            $setting->lazy_loader = ImageUploadHelper::update_no_resize('lazy_loader', $request->file('lazy_loader'), 'lazyload', 'public', $setting->lazy_loader);
        }
        else{
            $setting->lazy_loader = $setting->lazy_loader;
        }

        if($request->favicon){
            $setting->favicon = ImageUploadHelper::update('favicon', $request->file('favicon'), 'favicon-'.time(), 'public/images/settings', $setting->favicon);
        }
        else{
            $setting->favicon = $setting->favicon;
        }

        if($request->offer){
            $setting->offer = ImageUploadHelper::update('offer', $request->file('offer'), 'offer-'.time(), 'public/images/settings', $setting->offer);
        }
        else{
            $setting->offer = $setting->offer;
        }

        $data = $request->except(['_token', 'logo', 'favicon', 'offer']); // this fields are not received to $data array
        //$data['address'] = nl2br($request->address);
        $setting->update($data);

        session()->flash('update_message','Updated');
        return request()->dev ? redirect()->route('admin.setting.index', ['dev' => 1]) : redirect()->route('admin.setting.index');
    }

}
