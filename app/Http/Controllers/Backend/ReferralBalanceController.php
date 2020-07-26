<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\NumberHelper;
use App\Models\ReferralBalance;
use DB;

class ReferralBalanceController extends Controller
{
    /**
    * Site Access
    **/
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        /*muhib's code start here*/
        $rows = DB::table('referral_balances')
                ->join('distributors', 'referral_balances.d_code', '=', 'distributors.d_code')
                ->get()
                ->groupBy('referral_balances.d_code');
        /*muhib's code end here*/

        return view('backend.pages.referral_balance.index', compact('rows'));
    }

    public function details($d_code) {
        /*muhib's code start here*/
        $rows = DB::table('referral_balances')
                ->leftjoin('distributors', 'referral_balances.d_code', '=', 'distributors.d_code')
                ->rightjoin('users', 'users.id', '=', 'referral_balances.customer_id')
                ->where('referral_balances.d_code', '=', $d_code)
                ->select(
                    'referral_balances.customer_id as customer_id',
                    'distributors.name as d_name',
                    'users.name as customer_name',
                    'referral_balances.grand_total',
                    'referral_balances.percentage'
                )
                ->get()
                ->groupBy('customer_id');
        /*muhib's code end here*/

        return view('backend.pages.referral_balance.details', compact('rows', 'd_code'));
    }

    public function details_view($d_code, $id) {
        /*muhib's code start here*/
        $rows = DB::table('referral_balances')
                ->leftjoin('distributors', 'referral_balances.d_code', '=', 'distributors.d_code')
                ->rightjoin('users', 'users.id', '=', 'referral_balances.customer_id')
                ->where('users.id', '=', $id)
                ->where('referral_balances.d_code', '=', $d_code)
                ->select(
                    'referral_balances.customer_id as customer_id',
                    'distributors.name as d_name',
                    'users.name as customer_name',
                    'referral_balances.grand_total',
                    'referral_balances.percentage'
                )
                ->get();
        /*muhib's code end here*/

            // dd($rows);
        return view('backend.pages.referral_balance.view', compact('rows'));
    }
}
