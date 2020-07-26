<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\NumberHelper;
use App\Models\Cost_field;

class Cost_fieldController extends Controller
{

    /**
     * Site Access
    **/
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $rows = Cost_field::orderBy('status', 'desc')->where('status', '!=', 9)->get();
        return view('backend.pages.cost_field.index', compact('rows'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $data = $request->except(['_token']);
        QueryHelper::simpleInsert('Cost_field', $data);
        session()->flash('add_message', 'Added');
        return redirect()->route('admin.cost_field.index');
    }

    public function update(Request $request, $id)
    {
        $cost_field = Cost_field::where('id', $id)->first();
        $this->validate($request, [
            'title' => 'required',
        ]);
        $data = $request->except(['_token']);
        $cost_field->update($data);
        session()->flash('update_message', 'Added');
        return redirect()->route('admin.cost_field.index');
    }

    public function delete($id)
    {
        $cost_field = Cost_field::where('id', $id)->first();
        $data['status'] = 9;
        $cost_field->update($data);
        session()->flash('deactive_message', 'Deactived');
        return redirect()->route('admin.cost_field.index');
    }
}
