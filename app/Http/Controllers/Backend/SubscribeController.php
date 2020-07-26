<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SubscribeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }


    public function index()
    {
    	$subscribers = DB::table('subscribers')->where('status', 1)->get();
    	return view('backend.pages.subscribe.index', compact('subscribers'));
    }

    public function delete($id) {
    	DB::table('subscribers')
    		->where('id', $id)
    		->update(['status' => 9]);

        session()->flash('delete_message', 'Deleted');
        return redirect()->route('admin.subscriber.index');
    }
    
}