<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Models\OrderItem;
use App\Models\Order;
use DB;

class ReturnItemController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    public function index()
    {
    	$items = OrderItem::where(['is_return'=>1])->select("*", DB::raw("sum(price) as total_price"))->get();
    	$orderItem = OrderItem::get();
    	return view('backend.pages.return_item.index', compact('items', 'orderItem'));
    }

    public function view($id)
    {
        $order = DB::table('order_items')
            ->where('order_id', $id);
            // ->where('admin_id', Auth()->user()->id);

        $order_item = $order->first();
        $order = Order::find($id);
        if (!$order) {
            return view('errors.404');
        }
        if ($order_item->order_status >= 3) {
            return view('backend.pages.order.view', compact('order', 'order_item'));
        } else {
            return redirect()->route('admin.order.pending-view',$id);
        }
    }
}