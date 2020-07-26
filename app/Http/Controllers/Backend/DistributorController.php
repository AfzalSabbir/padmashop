<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\NumberHelper;
use App\Models\Distributor;
use App\Models\DPayment;

class DistributorController extends Controller
{

    /**
    * Site Access
    **/
    public function __construct()
    {
        $this->initalValue = 1568;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rows = Distributor::orderBy('status', 'desc')->orderBy('id', 'desc')->where('status', '!=', '9')->get();
        return view('backend.pages.distributor.index', compact('rows'));
    }

    public function add()
    {
        return view('backend.pages.distributor.add');
    }

    public function store(Request $request)
    {
        $last_id = Distributor::max('id');
        $d_code = $this->initalValue + (int)$last_id + 1;
        $this->validate($request, [
            'name' => 'required',
            'mobile'=>'required',
            'address'=>'required'
        ]);

        $data = $request->except(['_token']);
        $data['d_code'] = $d_code;

        QueryHelper::simpleInsert('Distributor', $data);
        session()->flash('add_message', 'Added');
        return redirect()->route('admin.distributor.index');
    }

    public function edit($id)
    {
        $row = Distributor::where('id', $id)->first();
        return view('backend.pages.distributor.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $distributor = Distributor::where('id', $id)->first();
        
        $this->validate($request, [
            'name' => 'required',
            'mobile'=>'required',
            'address'=>'required'
        ]);

        $data = $request->except(['_token']);

        $distributor->update($data);
        session()->flash('update_message', 'Added');
        return redirect()->route('admin.distributor.index');
    }

    public function delete($id)
    {
        $distributor = Distributor::where('id', $id)->first();
        $data['status'] = 9;
        $distributor->update($data);
        session()->flash('deactive_message', 'Deactived');
        return redirect()->route('admin.distributor.index');
    }

    // distributor
    public function payment()
    {
        $distributors = Distributor::where('status', 1)->get();
        return view('backend.pages.distributor.payment', compact('distributors'));
    }

    public function paymentRecord(Request $request)
    {
        $data = $request->except(['_token']);
        DPayment::insert($data);
        session()->flash('add_message', 'Record Stored Successfully');
        return redirect(route('admin.distributor.payment.list'));
    }

    public function paymentList(Request $request)
    {
        $payments = new DPayment();

        if($request->isMethod('post')){
            $condition = [];

            if($request->from_date){
                $condition[] = ['date','>=', $request->from_date];
            }
            if($request->to_date){
                $condition[] = ['date','<=', $request->to_date];
            }
            if($request->d_id){
                $condition[] = ['d_id','=',$request->d_id];
            }
            $payments = $payments->where($condition);
        }
        $payments = $payments->get();
        $distributors = Distributor::where('status', 1)->get();
        return view('backend.pages.distributor.payment_list', compact('payments', 'distributors'));
    }
}
