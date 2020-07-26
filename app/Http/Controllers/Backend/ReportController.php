<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->initalItems = 100000;
        $this->middleware('auth:admin');
    }


    /**
     * return all order which are completed (delivered)
     * => status 2 means order is delivered
     */
    public function index(Request $request)
    {
    	$this_month = date("m");
        if (request()->filled('items')) {
            $items = request()->items;
        } else {
            $items = $this->initalItems;
        }

        if($request->isMethod('post')){
        	//dd(date('Y-m-d', strtotime($request->to_date. ' + 1 days')));
            $orders = DB::table('orders')
            ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
            ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
            ->select('orders.id as id', 'orders.order_status as order_status', 'orders.total_quantity as qty',
                'orders.total_price as price', 'orders.address as address_', 'orders.created_at as date_', 'orders.alt_mobile as alt_mobile', 'orders.grand_total as grand_total', 'orders.is_paid as is_paid',
                'orders.payment_gateway_id as payment_gateway_id', 'users.name as name', 'users.mobile as mobile',
                'users.address as address', 'payment_methods.title as gateway_title',
                'upazillas.shipping_cost as shipping_cost', 'orders.txnid as txnid');
            
            if($request->mobile){
                $orders = $orders->where('orders.alt_mobile', $request->mobile);
            }
            if($request->id){
                $orders = $orders->where('orders.id', $request->id);
            }
            if($request->to_date){
                $orders = $orders->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
            }
            elseif($request->from_date){
                $orders = $orders->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
            }

            $orders = $orders->where('orders.order_status', '>=', 3)
                    ->orderBy('orders.id','desc')
                    ->paginate($items);

            $total = $orders->total();
        }
        else{
            $orders = DB::table('orders')
            ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
            ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
            ->select('orders.id as id', 'orders.order_status as order_status', 'orders.total_quantity as qty',
                'orders.total_price as price', 'orders.address as address_', 'orders.created_at as date_', 'orders.alt_mobile as alt_mobile', 'orders.grand_total as grand_total', 'orders.is_paid as is_paid',
                'orders.payment_gateway_id as payment_gateway_id', 'users.name as name', 'users.mobile as mobile',
                'users.address as address', 'payment_methods.title as gateway_title',
                'upazillas.shipping_cost as shipping_cost', 'orders.txnid as txnid')
            ->where('orders.order_status', '>=', 3)
            ->whereBetween('orders.created_at', [date("Y-m-01", strtotime(date("Y-m-d"))), date('Y-m-d', strtotime(date("Y-m-t", strtotime(date("Y-m-d"))). ' + 1 days'))])
            ->orderBy('orders.id','desc')
            ->paginate($items);

            $total = $orders->total();
        }

        $total = $orders->total();

        return view('backend.pages.report.index', compact('orders', 'items', 'total'));
    }
}
