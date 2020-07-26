<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use Countries;
use Auth;
use Hash;
use DB;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

    /**
     * Admin Dashboard 
    */
    public function index()
    {
      $product = DB::table('products')->where('status', 1)->count();
      $category = DB::table('categories')->where('status', 1)->count();
      $sub_category = DB::table('sub_categories')->where('status', 1)->count();
      $brand = DB::table('brands')->where('status', 1)->count();
      $advertisement = DB::table('advertisements')->where('status', 1)->count();
      $color = DB::table('colors')->where('status', 1)->count();
      $size = DB::table('sizes')->where('status', 1)->count();
      $coupon = DB::table('sizes')->where('status', 1)->count();
      $completed_order = DB::table('orders')->where('order_status', '>=', 3)->count();
      $pending_order = DB::table('orders')->where('order_status', '<', 3)->count();
      $user = DB::table('users')->where('status', '<', 3)->count();
      $payment_method = DB::table('payment_methods')->where('status', 1)->count();
      $today_sale = $this->getTodaySale();
      $this_week_sale = $this->getThiWeekSale();
      $this_month_sale = $this->getThiMonthSale();

      return view('backend.pages.index', compact('product', 'category', 'sub_category', 'brand', 'advertisement', 'color', 'size', 'coupon', 'completed_order', 'pending_order', 'user', 'payment_method', 'today_sale', 'this_week_sale', 'this_month_sale'));
    }


    private function getTodaySale()
    {
      $today_sales = DB::table('orders')->select('total_price', 'grand_total')->where('created_at', '>=', date('Y-m-d'))->where('is_paid', 1)->get();

      $total = 0;

      foreach($today_sales as $today_sale){
        if($today_sale->grand_total){
          $total += $today_sale->grand_total;
        }
        else{
          $total += $today_sale->total_price;
        }
      }

      return $total;
    }


    public function getThiWeekSale()
    {
      $oneWeek = date("Y-m-d", strtotime("-1 week"));
      $this_week_sales = DB::table('orders')->select('total_price', 'grand_total')->where('created_at', '>=', $oneWeek)->where('is_paid', 1)->get();

      $total = 0;

      foreach($this_week_sales as $this_week_sale){
        if($this_week_sale->grand_total){
          $total += $this_week_sale->grand_total;
        }
        else{
          $total += $this_week_sale->total_price;
        }
      }

      return $total;
    }


    public function getThiMonthSale()
    {
      $oneMonth = date("Y-m-d", strtotime("-1 month"));
      $this_month_sales = DB::table('orders')->select('total_price', 'grand_total')->where('created_at', '>=', $oneMonth)->where('is_paid', 1)->get();

      $total = 0;

      foreach($this_month_sales as $this_month_sale){
        if($this_month_sale->grand_total){
          $total += $this_month_sale->grand_total;
        }
        else{
          $total += $this_month_sale->total_price;
        }
      }

      return $total;
    }

    public function message(){
        $message = DB::table('contacts')->where('status', 1)->get();
        return view('backend.pages.message', compact('message'));
    }

    public function messageDelete($id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        session()->flash('delete_message', 'Delete Successfull.');
        return redirect()->back();
    }


    /*
     * Change password form
    */
    public function chnagePasswordForm()
    {
      return view('backend.pages.changePasswordForm');
    }


    /*
    * Change password with matching old one
    */
    public function chnagePassword(Request $request)
    {
      $this->validate($request, [
        'old_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
      ]);

      $admin = Auth::guard('admin')->user();

      if(Hash::check($request->old_password, $admin->password)){
        $admin->password = Hash::make($request->password);
        $admin->save();

        session()->flash('success', 'Password changed successfully');
        return back();
      }
      else{
        session()->flash('old_password', 'Old password does not match');
        return back();
      }
    }
  }
