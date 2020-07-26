<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Models\FlashMessage;


class AjaxController extends Controller
{
    /**
     * return to cart page
     */
    public function categories()
    {
    	$categories = DB::table('categories')
                ->leftjoin('products','categories.id','products.category_id')
                ->select('categories.*')
                ->selectRaw('count(products.id) as count_product')
                ->groupBy('categories.id')
                ->where('products.status', 1)
                ->where('categories.status', 1)->get();
                
        return response()->json($categories, 200);
    }

    /**
     * Push Message
     */

    public function pushNotification()
    {
        $msg = FlashMessage::where('type', 'push')->first();
        return response()->json($msg, 200);
    }

}
