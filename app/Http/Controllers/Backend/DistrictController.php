<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\QueryHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Upazilla;
use Countries;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * return all district data
     */
    public function index()
    {
        $districts = District::orderBy('status','desc')->orderBy('name','asc')->get();
        $countries = Countries::getList('en');
        return view('backend.pages.district.index', compact('districts', 'countries'));
    }


    /**
     * save district data using queryhelper and model
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts',
            'country' => 'required',
            'shipping_cost' => 'required',
            'status' => 'required',
        ]);

        $data = $request->except(['_token']);

        $district = QueryHelper::simpleInsert('District', $data);

        session()->flash('add_message', 'Added');

        return redirect()->route('admin.district.index');
    }


    /**
     * update the row of table
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name,'.$id,
            'country' => 'required',
            'shipping_cost' => 'required',
            'status' => 'required',
        ]);

        $data = $request->except(['_token']);
        $where = array('id' => $id);

        District::where('id', $id)->update($data);

        session()->flash('update_message', 'Updated');

        return redirect()->route('admin.district.index');
    }


    /**
     * set value of status is 1 for delete
     */
    public function delete($id)
    {
        District::where('id', $id)->update(['status' => 0]);
        Upazilla::where('district_id', $id)->update(['status' => 0]);
        
        session()->flash('delete_message', 'Deleted');

        return redirect()->route('admin.district.index');
    }
}
