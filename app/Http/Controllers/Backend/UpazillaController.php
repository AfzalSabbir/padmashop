<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Models\Upazilla;
use Countries;

class UpazillaController extends Controller
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
        $upazillas = Upazilla::orderBy('status','desc')->orderBy('district_id','asc')->orderBy('name','asc')->get();
        // $upazillas = QueryHelper::complexRead('Upazilla');
        return view('backend.pages.upazilla.index', compact('upazillas'));
    }



    public function create()
    {
        $countries = Countries::getList('en');
        $districts = QueryHelper::complexRead('District');
        return view('backend.pages.upazilla.create', compact('countries', 'districts'));
    }


    /**
     * save district data using queryhelper and model
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:upazillas',
            'country' => 'required',
            'district_id' => 'required',
            'shipping_cost' => 'required',
            'status' => 'required',
        ]);

        $data = $request->except(['_token']);
        $upazilla = QueryHelper::simpleInsert('Upazilla', $data);
        session()->flash('add_message', 'Added');
        return redirect()->route('admin.upazilla.index');
    }


    public function edit($id)
    {
        $countries = Countries::getList('en');
        $districts = QueryHelper::complexRead('District');
        $upazilla = Upazilla::where('id',$id)->first();
        //return view('backend.pages.advertisement.edit', compact('advertisement'));
        //$upazilla = QueryHelper::complexSingleRead('Upazilla', array('id' => $id));
        return view('backend.pages.upazilla.edit', compact('countries', 'districts', 'upazilla'));
    }


    /**
     * update the row of table
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:upazillas,name,'.$id,
            'country' => 'required',
            'district_id' => 'required',
            'shipping_cost' => 'required',
            'status' => 'required',
        ]);

        $data = $request->except(['_token']);
        //$where = array('id' => $id);
        //$upazilla = QueryHelper::simpleUpdate('Upazilla', $data, $where);
        Upazilla::where('id', $id)->update($data);

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.upazilla.index');
    }


    /**
     * set value of status is 1 for delete
     */
    public function delete($id)
    {
        Upazilla::where('id', $id)->update(['status' => 0]);
        session()->flash('delete_message', 'Deleted');
        return redirect()->route('admin.upazilla.index');
    }
}
