<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SubscriberController extends Controller
{
	public function subscriber(Request $request)
	{
	    if(!DB::table('subscribers')->where('mail',request()->email)->first())
	    {
	      DB::table('subscribers')->insert(['mail'=>request()->email]);
	    }
	    session()->flash('subscriber_message', 'Subscription successfully completed');
	    return redirect($_SERVER['HTTP_REFERER'].'#subscribers');
	}
}