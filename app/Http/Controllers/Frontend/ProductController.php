<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserHistory;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Review;
use Auth;
use DB;

class ProductController extends Controller
{
    public function index($slug)
    {
        // single product view
        $product = DB::table('products')
        ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('sub_categories as sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->leftJoin('brands as brands', 'brands.id', '=', 'products.brand_id')
        ->orderBy('products.created_at', 'desc')
        ->where('products.slug', $slug)
        ->where('products.status', 1)
        ->select('products.*', 'categories.title_en as category_title', 'categories.id as category_id' , 'sub_categories.title_en as sub_category_title', 'sub_categories.id as sub_category_id' ,
            'brands.title_en as brand_title', 'brands.id as brand_id')
        ->first();

        //dd($product);

        $this->userHistory($product->id); 

        $similar_products = $this->similarProduct($product->category_id, $product->sub_category_id, $product->brand_id);
        $reviews = Review::orderBy('id', 'desc')->where('status', 1)->where('product_id', $product->id)->get();

        return view('frontend.pages.product.index', compact('product', 'reviews', 'similar_products'));
    }


    // increment total view
    public function incrementHitCount(Request $request)
    {
        Product::find($request->id)->increment('hit_count', 1);
    }


    // insert inot user_histories with mac if user never viewed this product
    private function userHistory($product_id)
    {
        // get mac address
        $mac_address_info = exec('getmac'); 
        $only_mac_address = explode(' ', $mac_address_info);

        $user_history = UserHistory::where('user_mac', $only_mac_address[0])
        ->where('product_id', $product_id)
        ->first();

        // if never seen this product    
        if(!$user_history){
            $data = array(
                'user_mac' => $only_mac_address[0],
                'product_id' => $product_id
            );

            UserHistory::create($data);
        }
        else{
            $user_history->touch();
        }

        return true;
    }


    // get similar products with category, sub_category, brand
    private function similarProduct($category_id, $subcategory_id, $brand_id)
    {
        $similar_products = DB::table('products')
        ->where('category_id', $category_id)
        ->orWhere('sub_category_id', $subcategory_id)
        ->orWhere('brand_id', $brand_id)
        ->where('status', 1)
        ->get();

        return $similar_products;                    
    }


    public function rating($rate_value, $product_id)
    {
        $data = array(
            'user_id' => Auth::guard('web')->user()->id,
            'product_id' => $product_id,
            'rate_value' => $rate_value
        );
        if(!DB::table('product_ratings')->where('user_id', Auth::guard('web')->user()->id)->where('product_id', $product_id)->first()){
            ProductRating::create($data);

            $rating = DB::table('product_ratings')->where('product_id', $product_id)->sum('rate_value');
            $count_rated_time = DB::table('product_ratings')->where('product_id', $product_id)->count();

            $total_rating = $rating / $count_rated_time;
            DB::table('products')->where('id', $product_id)->update(['rating' => $total_rating]);
        }

        return "success";
    }
}
