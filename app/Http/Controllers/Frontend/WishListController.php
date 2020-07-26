<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Auth;
use DB;

class WishListController extends Controller
{
    public function index()
    {
    	$mac_address_info = exec('getmac'); 
        $only_mac_address = explode(' ', $mac_address_info);
        if(Auth::user()){
            $wishListItems = WishList::where('user_mac', Auth::user()->id)->get();
        }else{
            $wishListItems = [];
        }
        return $wishListItems;
    }


    public function addToWishList(Request $request)
    {
        // $mac_address_info = exec('getmac'); 
        // $only_mac_address = explode(' ', $mac_address_info);

        $wishlist = new WishList();
        $wishlist->user_mac = Auth::user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();

        $wishlist->setAttribute('product', $request->product);

        return $wishlist;
    }


    public function deleteWishList(Request $request)
    {
    	$wishItem = WishList::where('product_id', $request->product_id)->delete();

        return 1;
    }


    public function checkWished($id)
    {
        if(WishList::where('product_id', $id)->first()){
            return "exist";
        }
        else{
            return "not exist";
        }
    }
}
