<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\QueryHelper;
use App\Helpers\SMSHelper;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Setting;
use Auth;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->initalItems = 50;
        $this->middleware('auth:admin');
    }


    /**
     * return all order which is still pending, need action to deliver
     * => status 1 means order is pending
     */
    public function pendingOrder(Request $request)
    {
        if (request()->filled('items')) {
            $items = request()->items;
        }else{
            $items = $this->initalItems;
        }

        if($request->isMethod('post') && ($request->from_date || $request->to_date || $request->id || $request->status_choose != null )){
            if(Auth::guard('admin')->user()->is_merchant){
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('order_items as order_items', 'order_items.order_id', '=', 'orders.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'upazillas.id', '=', 'orders.upazilla_id')
                ->select('orders.id as id','orders.is_return as is_return', 'order_items.order_status as order_status', 'orders.total_quantity as qty',
                    'orders.total_price as price', 'orders.address as address_', 'orders.alt_mobile as alt_mobile', 'orders.grand_total as grand_total', 'orders.is_paid as is_paid',
                    'orders.payment_gateway_id as payment_gateway_id', 'users.name as name', 'users.mobile as mobile', 'users.address as address', 'payment_methods.title as gateway_title',
                    'upazillas.shipping_cost as shipping_cost', 'orders.txnid as txnid')
                ->where('order_items.admin_id', Auth::guard('admin')->user()->id)
                ->groupBy('orders.id');

                $orders_sum = DB::table('order_items')
                    ->leftJoin('orders as orders', 'orders.id', '=', 'order_items.order_id')
                    ->where('admin_id', Auth()->user()->id);

                if($request->mobile){
                    $orders = $orders->where('orders.alt_mobile', $request->mobile);
                    $orders_sum = $orders_sum->where('orders.alt_mobile', $request->mobile);
                }
                if($request->id){
                    $orders = $orders->where('orders.id', $request->id);
                    $orders_sum = $orders_sum->where('orders.id', $request->id);
                }
                if($request->status_choose != null){
                    $orders = $orders->where('orders.order_status', $request->status_choose);
                    $orders_sum = $orders_sum->where('orders.order_status', $request->status_choose);
                }
                if($request->to_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('order_items.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                }
                elseif($request->from_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('order_items.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                }

                $orders_sum = $orders_sum
                    ->groupBy('order_items.order_status')
                    ->select('order_items.order_status', DB::raw('sum(order_items.quantity*order_items.price) as total'))
                    ->get()
                    ->groupBy('order_items.order_status')
                    ->toArray();
            }
            else{
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'upazillas.id', '=', 'orders.upazilla_id')
                ->select(
                    'orders.id as id',
                    'orders.txnid as txnid',
                    'orders.is_paid as is_paid',
                    'orders.address as address_',
                    'orders.total_price as price',
                    'orders.total_quantity as qty',
                    'orders.alt_mobile as alt_mobile',
                    'orders.grand_total as grand_total',
                    'orders.order_status as order_status',
                    'orders.payment_gateway_id as payment_gateway_id',

                    'orders.is_return as is_return',

                    'users.name as name',
                    'users.mobile as mobile',
                    'users.address as address',

                    'payment_methods.title as gateway_title',

                    'upazillas.shipping_cost as shipping_cost'
                );

                $orders_sum = DB::table('orders');

                if($request->mobile){
                    $orders = $orders->where('orders.alt_mobile', $request->mobile);
                    $orders_sum = $orders_sum->where('orders.alt_mobile', $request->mobile);
                }
                if($request->id){
                    $orders = $orders->where('orders.id', $request->id);
                    $orders_sum = $orders_sum->where('orders.id', $request->id);
                }
                if($request->status_choose != null){
                    $orders = $orders->where('orders.order_status', $request->status_choose);
                    $orders_sum = $orders_sum->where('orders.order_status', $request->status_choose);
                }
                if($request->to_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                }
                elseif($request->from_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('orders.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                }

                $orders_sum = $orders_sum
                    ->groupBy('order_status')
                    ->select('order_status', DB::raw('sum(grand_total) as total'))
                    ->get()
                    ->groupBy('order_status')
                    ->toArray();
            }
            $orders = $orders
                ->where('orders.order_status', '<', 3)
                ->orderBy('orders.id','desc')
                ->paginate($items);

            $total = $orders->total();

        }
        else{
            if(Auth::guard('admin')->user()->is_merchant){
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('order_items as order_items', 'order_items.order_id', '=', 'orders.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')

                ->select(
                        'orders.id as id',
                        'orders.txnid as txnid',
                        'orders.is_paid as is_paid',
                        'orders.address as address_',
                        // 'orders.total_price as price',
                        // 'orders.total_quantity as qty',
                        'orders.alt_mobile as alt_mobile',
                        'orders.grand_total as grand_total',
                        'orders.payment_gateway_id as payment_gateway_id',

                        'order_items.order_status as order_status',

                        'orders.is_return as is_return',

                        'users.name as name',
                        'users.mobile as mobile',
                        'users.address as address',

                        'payment_methods.title as gateway_title',

                        'upazillas.shipping_cost as shipping_cost'
                    )

                ->where('order_items.order_status', '<', 3)
                ->where('order_items.admin_id', Auth::guard('admin')->user()->id)
                ->orderBy('orders.id','desc')
                ->groupBy('orders.id')
                ->paginate($items);

                $orders_sum = DB::table('order_items')
                    ->where('admin_id', Auth()->user()->id)
                    ->groupBy('order_status')
                    ->select('order_status', DB::raw('sum(quantity*price) as total'))
                    ->get()
                    ->groupBy('order_status')
                    ->toArray();
            }
            else{
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                // ->leftJoin('order_items as order_items', 'order_items.order_id', '=', 'orders.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
                ->select(
                        'orders.id as id',
                        'orders.txnid as txnid',
                        'orders.is_paid as is_paid',
                        'orders.address as address_',
                        'orders.total_price as price',
                        'orders.total_quantity as qty',
                        'orders.alt_mobile as alt_mobile',
                        'orders.grand_total as grand_total',
                        'orders.order_status as order_status',
                        'orders.payment_gateway_id as payment_gateway_id',
                        
                        'orders.is_return as is_return',

                        'users.name as name',
                        'users.mobile as mobile',
                        'users.address as address',

                        'payment_methods.title as gateway_title',

                        'upazillas.shipping_cost as shipping_cost'

                    )
                ->where('orders.order_status', '<', 3)
                ->orderBy('orders.id','desc')
                //->groupBy('orders.id')
                ->paginate($items);


                $orders_sum = DB::table('orders')
                    ->groupBy('order_status')
                    ->select('order_status', DB::raw('sum(grand_total) as total'))
                    ->get()
                    ->groupBy('order_status')
                    ->toArray();

            }

            $total = $orders->total();
        }

        return view('backend.pages.order.pending', compact('orders','items', 'total', 'orders_sum'));
    }


    /**
     * return to order view pages with single order details (pendingToReceved)
     */
    public function pending_view($id)
    {

        $order = OrderItem::where('order_id', $id);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        /*
            if (Auth()->user()->admin_role != 1 && $order->get()[0]->order_status < 1) {
                $order->update(['order_status' => 1]);

                $order_status = (int)$order_temp->get()->min('order_status');
                DB::table('orders')
                    ->where('id', $id)
                    ->update(['order_status' => $order_status]);
            }
        */

        $order_item = $order->first();

        if (!$order_item) {
            return view('errors.404');
        }

        $order = Order::find($id);
        if ($order->order_status < 3) {
            return view('backend.pages.order.view', compact('order', 'order_item'));
        } else {
            return redirect()->route('admin.order.completed-view',$id);
        }
    }


    /**
     * make the order State
     */
    public function orderManager(Request $request)
    {
        $order_status = $request->order_stat;

        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        // if (Auth()->user()->admin_role == 2) {
            $order->update(['order_status' => $order_status]);

            // $order_status = (int)$order_temp->get()->min('order_status'); //
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);
        // }

        $order_items = $order->first();
        
        $user_id = $order_items->user_id;
        $mobile = User::where('id', $user_id)->first()->mobile;
        
        if($request->order_stat == 2) SMSHelper::sendSMS($mobile, Setting::first()->processing);
        if($request->order_stat == 4) SMSHelper::sendSMS($mobile, Setting::first()->delivered);

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.order.pending-view', $order_items->order_id);
    }





    /**
     * make the received order to pending order
     */
    public function receivedToPending(Request $request)
    {
        $order_status = $request->order_stat;

        // dd($request);

        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        if (Auth()->user()->admin_role == 2 && $order->get()[0]->order_status == 1) {
            $order->update(['order_status' => $order_status]);

            // $order_status = (int)$order_temp->get()->min('order_status');
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);
        }

        $order_items = $order->first();
        // dd($order_items);

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.order.pending-view', $order_items->order_id);
    }

    /**
     * make the pending order to received order
     */
    public function pendingToReceived(Request $request)
    {
        $order_status = $request->order_stat;

        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        if (Auth()->user()->admin_role == 2 && $order->get()[0]->order_status != $order_status) {
            $order->update(['order_status' => $order_status]);

            // $order_status = (int)$order_temp->get()->min('order_status');
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);
        }

        $order_items = $order->first();

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.order.pending-view', $order_items->order_id);
    }

    /**
     * make the pending order to complete order (mark as delivered and return to completed order page)
     */
    public function receivedToProcessing(Request $request)
    {
        $order_status = $request->order_stat;
        
        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        if (Auth()->user()->admin_role == 2 && $order->get()[0]->order_status != $order_status) {
            $order->update(['order_status' => $order_status]);

            // $order_status = (int)$order_temp->get()->min('order_status');
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);
        }

        $order_items = $order->first();

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.order.pending-view', $order_items->order_id);
    }


    /**
     * (processToOnTheWay)
     */
    public function processToOnTheWay(Request $request)
    {
        $order_status = $request->order_stat;
        
        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        if (Auth()->user()->admin_role == 2 && $order->get()[0]->order_status != $order_status) {
            $order->update(['order_status' => $order_status]);

            // $order_status = (int)$order_temp->get()->min('order_status');
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);
        }

        $order_items = $order->first();

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.order.pending-view', $order_items->order_id);
    }


    public function pendingToComplete(Request $request)
    {
        $order_status = $request->order_stat;
        
        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }
        if (Auth()->user()->admin_role == 2 && $order->get()[0]->order_status != $order_status) {
            $order->update(['order_status' => $order_status]);

            // $order_status = (int)$order_temp->get()->min('order_status');
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);
        }

        $order_items = $order->first();

        session()->flash('update_message', 'Updated');
        return redirect()->route('admin.order.pending-view', $order_items->order_id);
    }


    /**
     * (onTheWayToCustomer)
     */
    public function receivedByCustomer(Request $request)
    {
        $order = DB::table('order_items')->where('order_id', $request->orderId);
        $order_temp = $order;

        if(Auth::guard('admin')->user()->is_merchant){
            $order = $order->where('admin_id', Auth()->user()->id);
        }

        if (Auth()->user()->admin_role == 2 && $order->get()[0]->order_status < 4) {
            $order->update(['order_status' => 4]);

            $order_status = (int)$order_temp->get()->min('order_status');
            DB::table('orders')
                ->where('id', $request->orderId)
                ->update(['order_status' => $order_status]);            

            /*set data of order_id,user_id,d_code,grand_total,commission in to referral_balance table start*/
            $data = DB::table('orders')
                    ->leftJoin('users', 'orders.user_id', 'users.id')
                    ->where('orders.id', $request->orderId)
                    ->select('orders.grand_total','orders.id as order_id','orders.user_id as customer_id','users.d_code')
                    ->get();
            $commission = DB::table('d_commissions')->first()->commission;

            /*insert data into referral_balance table*/
            if($data->first()->d_code){
                DB::table('referral_balances')->insert([
                    'd_code'=>$data->first()->d_code,
                    'customer_id'=>$data->first()->customer_id,
                    'order_id'=>$data->first()->order_id,
                    'percentage'=>$commission,
                    'grand_total'=>$data->first()->grand_total,
                ]);
            }
            /*set data of order_id,user_id,d_code,grand_total,commission in to referral_balance table end*/
        }
        session()->flash('add_message', 'Updated');
        return redirect()->route('admin.order.completed');
    }


    /**
     * return all order which are completed (delivered)
     * => status 2 means order is delivered
     */
    public function completedOrder(Request $request)
    {
        if(request()->filled('items')) {
            $items = request()->items;
        }else{
            $items = $this->initalItems;
        }

        if($request->isMethod('post') && ($request->from_date || $request->to_date || $request->id || $request->status_choose != null )){
            if(Auth::guard('admin')->user()->is_merchant){
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('order_items as order_items', 'order_items.order_id', '=', 'orders.id')
                ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
                ->select(
                    'orders.id as id', 
                    'order_items.order_status as order_status', 
                    'orders.total_quantity as qty',
                    'orders.total_price as price', 
                    'orders.address as address_', 
                    'orders.alt_mobile as alt_mobile', 
                    'orders.grand_total as grand_total', 
                    'orders.is_paid as is_paid',
                    'orders.payment_gateway_id as payment_gateway_id', 
                    'users.name as name', 
                    'users.mobile as mobile',
                    'users.address as address', 
                    'payment_methods.title as gateway_title',
                    'orders.is_return as is_return',
                    'upazillas.shipping_cost as shipping_cost', 
                    'orders.txnid as txnid'
                )
                ->where('order_items.admin_id', Auth::guard('admin')->user()->id)
                ->groupBy('orders.id');

                $orders_sum = DB::table('order_items')
                    ->leftJoin('orders as orders', 'orders.id', '=', 'order_items.order_id')
                    ->where('admin_id', Auth()->user()->id);

                if($request->mobile){
                    $orders = $orders->where('orders.alt_mobile', $request->mobile);
                    $orders_sum = $orders_sum->where('orders.alt_mobile', $request->mobile);
                }
                if($request->id){
                    $orders = $orders->where('orders.id', $request->id);
                    $orders_sum = $orders_sum->where('orders.id', $request->id);
                }
                if($request->status_choose != null){
                    $orders = $orders->where('orders.order_status', $request->status_choose);
                    $orders_sum = $orders_sum->where('orders.order_status', $request->status_choose);
                }
                if($request->to_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('order_items.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                }
                elseif($request->from_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('order_items.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                }

                $orders_sum = $orders_sum
                    ->groupBy('order_items.order_status')
                    ->select('order_items.order_status', DB::raw('sum(order_items.quantity*order_items.price) as total'))
                    ->get()
                    ->groupBy('order_items.order_status')
                    ->toArray();
            }
            else{
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
                ->select(
                    'orders.id as id',
                    'orders.txnid as txnid',
                    'orders.is_paid as is_paid',
                    'orders.address as address_',
                    'orders.total_price as price',
                    'orders.total_quantity as qty',
                    'orders.alt_mobile as alt_mobile',
                    'orders.grand_total as grand_total',
                    'orders.order_status as order_status',
                    'orders.payment_gateway_id as payment_gateway_id',
                    'orders.is_return as is_return',
                    'users.name as name',
                    'users.mobile as mobile',
                    'users.address as address',

                    'payment_methods.title as gateway_title',

                    'upazillas.shipping_cost as shipping_cost'
                );

                $orders_sum = DB::table('orders');

                if($request->mobile){
                    $orders = $orders->where('orders.alt_mobile', $request->mobile);
                    $orders_sum = $orders_sum->where('orders.alt_mobile', $request->mobile);
                }
                if($request->id){
                    $orders = $orders->where('orders.id', $request->id);
                    $orders_sum = $orders_sum->where('orders.id', $request->id);
                }
                if($request->status_choose != null){
                    $orders = $orders->where('orders.order_status', $request->status_choose);
                    $orders_sum = $orders_sum->where('orders.order_status', $request->status_choose);
                }
                if($request->to_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('orders.created_at', [$request->from_date, date('Y-m-d', strtotime($request->to_date. ' + 1 days'))]);
                }
                elseif($request->from_date){
                    $orders = $orders->whereBetween('orders.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                    $orders_sum = $orders_sum->whereBetween('orders.created_at', [$request->from_date,  date('Y-m-d', strtotime($request->from_date. ' + 1 days'))]);
                }

                $orders_sum = $orders_sum
                    ->groupBy('order_status')
                    ->select('order_status', DB::raw('sum(grand_total) as total'))
                    ->get()
                    ->groupBy('order_status')
                    ->toArray();
            }

            $orders = $orders
                ->where('orders.order_status', '>=', 3)
                ->orderBy('orders.id','desc')
                ->paginate($items);

            $total = $orders->total();
        }
        else{
            if(Auth::guard('admin')->user()->is_merchant){
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
                ->leftJoin('order_items as order_items', 'order_items.order_id', '=', 'orders.id')
                ->select(
                        'orders.id as id',
                        'orders.txnid as txnid',
                        'orders.is_paid as is_paid',
                        'orders.address as address_',
                        // 'orders.total_price as price',
                        // 'orders.total_quantity as qty',
                        'orders.alt_mobile as alt_mobile',
                        'orders.grand_total as grand_total',
                        'orders.payment_gateway_id as payment_gateway_id',

                        'order_items.order_status as order_status',
                        'orders.is_return as is_return',
                        'users.name as name',
                        'users.mobile as mobile',
                        'users.address as address',

                        'payment_methods.title as gateway_title',

                        'upazillas.shipping_cost as shipping_cost'
                    )
                ->where('order_items.order_status', '>=', 3)
                ->where('order_items.admin_id', Auth::guard('admin')->user()->id)
                ->orderBy('orders.id','desc')
                ->groupBy('orders.id')
                ->paginate($items);


                $orders_sum = DB::table('order_items')
                    ->where('admin_id', Auth()->user()->id)
                    ->groupBy('order_status')
                    ->select('order_status', DB::raw('sum(quantity*price) as total'))
                    ->get()
                    ->groupBy('order_status')
                    ->toArray();
            }
            else{
                $orders = DB::table('orders')
                ->leftJoin('users as users', 'orders.user_id', '=', 'users.id')
                // ->leftJoin('order_items as order_items', 'order_items.order_id', '=', 'orders.id')
                ->leftJoin('payment_methods as payment_methods', 'orders.payment_gateway_id', '=', 'payment_methods.id')
                ->leftJoin('upazillas as upazillas', 'orders.upazilla_id', '=', 'upazillas.id')
                ->select(
                        'orders.id as id',
                        'orders.txnid as txnid',
                        'orders.is_paid as is_paid',
                        'orders.address as address_',
                        'orders.total_price as price',
                        'orders.total_quantity as qty',
                        'orders.alt_mobile as alt_mobile',
                        'orders.grand_total as grand_total',
                        'orders.order_status as order_status',
                        'orders.payment_gateway_id as payment_gateway_id',
                        'orders.is_return as is_return',
                        'users.name as name',
                        'users.mobile as mobile',
                        'users.address as address', 'payment_methods.title as gateway_title',

                        'upazillas.shipping_cost as shipping_cost', 'orders.txnid as txnid'

                )
                ->where('orders.order_status', '>=', 3)
                ->orderBy('orders.id','desc')
                ->paginate($items);


                $orders_sum = DB::table('orders')
                    ->groupBy('order_status')
                    ->select('order_status', DB::raw('sum(grand_total) as total'))
                    ->get()
                    ->groupBy('order_status')
                    ->toArray();
            }

            $total = $orders->total();
        }

        $total = $orders->total();

        return view('backend.pages.order.completed', compact('orders', 'items', 'total', 'orders_sum'));
    }


    public function completed_view($id)
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