<?php

namespace App\Http\Controllers\Frontend;

use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\Upazilla;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Setting;

use App\Helpers\QueryHelper;
use App\Helpers\SMSHelper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Countries;
use Auth;
use Cart;
use DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getUpazilla']]);
    }

    /**
     * save order in orders table
     * save each product with order_id and product_id in order_items table
     * destroy cart
     */
    public function index()
    {
        if(Cart::count() > 0){
            $data = array(
                'user_id' => Auth::id(),
                'total_quantity' => Cart::count(),
                'total_price' => str_replace( ',', '', Cart::subtotal()),
                'is_paid' => 0,
            );

            $order = new Order();
            $created_order = $order->create($data);
            $order_items = [];
            foreach(Cart::content() as $cart){
                $merchant_id = DB::table('products')->where('id', $cart->id)->first()->admin_id;
                $order_items[] = array(
                    'user_id' => Auth::id(),
                    'order_id' => $created_order->id,
                    'product_id' => $cart->id,
                    'quantity' => $cart->qty,
                    'price' => str_replace( ',', '', $cart->price),
                    'size' => $cart->options->selected_size ? $cart->options->selected_size->title : '',
                    'color' => $cart->options->selected_color ? $cart->options->selected_color->title : '',
                    'admin_id' => $merchant_id
                );
            }

            OrderItem::insert($order_items);

            Cart::destroy();

            $districts = District::orderBy('name', 'asc')->where('status', 1)->get();
            $upazillas = Upazilla::orderBy('name', 'asc')->where('status', 1)->get();
            $payment_gateway = PaymentMethod::orderBy('title', 'asc')->where('status', 1)->get();

            return redirect()->route('order.detail', $created_order->id);
        }
        else{
            return back();
        }
    }



    public function order_detail_varification()
    {
        $subtotal = str_replace(',', '', Cart::subtotal());
        $cart = Cart::content();
        $cart = array_values($cart->toArray());
        $districts = District::orderBy('name', 'asc')->where('status', 1)->get();
        $payment_gateway = PaymentMethod::orderBy('title', 'asc')->where('status', 1)->get();

        return view('frontend.pages.order.order_info', compact('cart','districts', 'payment_gateway','subtotal'));
    }

    public function CheckoutWithPayment(Request $request){

        //Cart Information
        if(Cart::count() > 0){
            $data = array(
                'user_id' => Auth::id(),
                'total_quantity' => Cart::count(),
                'total_price' => str_replace( ',', '', Cart::subtotal()),
                'is_paid' => 0,
            );

            $order = new Order();
            $created_order = $order->create($data);
            $order_items = [];
            foreach(Cart::content() as $cart){
                $merchant_id = DB::table('products')->where('id', $cart->id)->first()->admin_id;
                $order_items[] = array(
                    'user_id' => Auth::id(),
                    'order_id' => $created_order->id,
                    'product_id' => $cart->id,
                    'quantity' => $cart->qty,
                    'price' => str_replace( ',', '', $cart->price),
                    'size' => $cart->options->selected_size ? $cart->options->selected_size->title : '',
                    'color' => $cart->options->selected_color ? $cart->options->selected_color->title : '',
                    'admin_id' => $merchant_id
                );
            }
            
            $order = Setting::first()->order;
            if(!empty($order)) SMSHelper::sendSMS(Auth::user()->mobile, Setting::first()->order);

            OrderItem::insert($order_items);

            Cart::destroy();

            $districts = District::orderBy('name', 'asc')->where('status', 1)->get();
            $upazillas = Upazilla::orderBy('name', 'asc')->where('status', 1)->get();
            $payment_gateway = PaymentMethod::orderBy('title', 'asc')->where('status', 1)->get();

            // return redirect()->route('order.detail', $created_order->id);

            //Checkout information
            if($request->grand_total){
                $grand_total = $request->grand_total;
            }
            else{
                $grand_total= '';
            }

            $data = array(
                'alt_mobile' => $request->alt_mobile,
                'txnid' => $request->txnid,
                'payment_gateway_id' => $request->payment_gateway_id,
                'district_id' => $request->district_id,
                'upazilla_id' => $request->upazilla_id,
                'is_paid' => 1,
                'address' => $request->address,
                'grand_total' => $grand_total,
                'coupon_discount' => $request->coupon_discount,
                'shipping_cost' => $request->shipping_cost,
            );

            $order = Order::where('id', $created_order->id)->update($data);

            if($request->coupon_category == 0){
                $user = User::where('id', $request->user_id)->first();
                $user->coupon_is_used = 1;
                $user->save();
            }

            return $created_order->id;
        }

    }

    public function order_detail($id)
    {
        $created_order = Order::find($id);
        if($created_order->is_paid == 0){
            $districts = District::orderBy('name', 'asc')->where('status', 1)->get();
            $payment_gateway = PaymentMethod::orderBy('title', 'asc')->where('status', 1)->get();

            return view('frontend.pages.order.index', compact('created_order','districts', 'payment_gateway'));
        }
        else{
            return back();
        }
    }


    public function detail($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order) {
            if ($order->user_id == Auth::id()) {
                return view('frontend.pages.order.detail', compact('order'));
            }else{
                return view('errors.401');
            }
        }else{
            return view('errors.401');
        }
    }

    public function payment(Request $request)
    {

    }

    public function update(Request $request, $id)
    {
        if($request->grand_total){
            $grand_total = $request->grand_total;
        }
        else{
            $grand_total= '';
        }

        $data = array(
            'alt_mobile' => $request->alt_mobile,
            'txnid' => $request->txnid,
            'payment_gateway_id' => $request->payment_gateway_id,
            'district_id' => $request->district_id,
            'upazilla_id' => $request->upazilla_id,
            'is_paid' => 1,
            'address' => $request->address,
            'grand_total' => $grand_total,
            'coupon_discount' => $request->coupon_discount,
            'shipping_cost' => $request->shipping_cost,
        );

        $order = Order::where('id', $id)->update($data);

        if($request->coupon_category == 0){
            $user = User::where('id', $request->user_id)->first();
            $user->coupon_is_used = 1;
            $user->save();
        }

        return $order;
    }


    public function getUpazilla(Request $request)
    {
        $upazillas = Upazilla::orderBy('name', 'asc')->where('district_id', $request->district_id)->where('status', 1)->get();
        return $upazillas;
    }


    public function getShippingCost(Request $request)
    {
        $upazilla = Upazilla::find($request->upazilla_id);
        return $upazilla;
    }

    public function getCoupon(Request $request)
    {
        $getCoupon = Coupon::where('code', $request->couponNumber)->where('to', '>=', date('Y-m-d'))->where('status', 1)->first();
        if($getCoupon){
            if($getCoupon->category == 0){
                $user = User::where('id', $request->user_id)->first();
                if($user->coupon_is_used == 1){
                    return "already used";
                }
                else{
                    return $getCoupon;
                }
            }
            else{
                if($getCoupon->taka <= $request->order_total){
                    return $getCoupon;
                }
                else{
                    return "not available";
                }
            }
        }
        else{
            return 'not available';
        }
    }

}
