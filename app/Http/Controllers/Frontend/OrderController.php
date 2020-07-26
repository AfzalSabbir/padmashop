<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductRating;
use App\Models\Review;
use Auth;
use DB;

class OrderController extends Controller
{
	public function index($order_id)
	{
		$user_order = Order::where('id', $order_id)->first()->toArray();
		return $user_order;
	}
	public function returnItem($item_id=null)
	{	
		$item = OrderItem::where('id', $item_id)->first()->toArray();
		if(date("Y-m-d h:i:s", strtotime($item['created_at']." +7day")) >= date("Y-m-d h:i:s")){
			OrderItem::where('id', $item_id)->update(['is_return'=>1]);
			$item = OrderItem::where('id', $item_id)->first()->toArray();

			/*
			* order
			*/
			$order = Order::where('id', $item['order_id']);
			$order->update(['is_return'=>1]);
			$order = $order->first()->toArray();
		}
		else{
			$order = "error";
		}
		return $order;
	}
}