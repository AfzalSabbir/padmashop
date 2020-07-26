<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use Auth;
use DB;
use Artisan;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->initalItems = 20;
    }

    public function index()
    {
        //dd(Auth::user()->district_id);
        // $product_area = [["product_area","!=", 'bagerhat'],["is_feature_product","!=", 1]];
        $product_area = [["is_feature_product","!=", 1]];
        // dd(Auth::check());
        
        if (request()->filled('items')) {
            $items = request()->items;
        }else{
            $items = $this->initalItems;
        }

        $categories = DB::table('categories')
                ->leftjoin('products','categories.id','products.category_id')
                ->select('categories.*')
                ->selectRaw('count(products.id) as count_product')
                ->groupBy('categories.id')
                ->where('products.status', 1)
                ->where('categories.status', 1)->get();

        $sub_categories =  DB::table('sub_categories')
        ->where('status', 1)
        ->get();	

        $brands =  DB::table('brands')
        ->where('status', 1)
        ->get();	

        if (request()->category) {
            if (request()->sub_category) {
                if (request()->brand) {
                    $brand = DB::table('brands')->where('slug',request()->brand)->first();
                    $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
                    $category = DB::table('categories')->where('slug',request()->category)->first();
                    
                    if($brand && $sub_category && $category){
                        $products = DB::table('products')
                        ->orderBy('created_at', 'desc')
                        ->where('brand_id', $brand->id)
                        ->where('sub_category_id', $sub_category->id)
                        ->where('category_id', $category->id)
                        ->where($product_area)
                        ->where('status', 1)
                        ->paginate($items);
                        $total = $products->total();
                    }
                    else{
                        return view('errors.404');
                    }
                } else {
                    $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
                    $category = DB::table('categories')->where('slug',request()->category)->first();
                    
                    if($sub_category && $category){
                        $products = DB::table('products')
                        ->orderBy('created_at', 'desc')
                        ->where('sub_category_id', $sub_category->id)
                        ->where('category_id', $category->id)
                        ->where($product_area)
                        ->where('status', 1)
                        ->paginate($items);
                        $total = $products->total();
                    }
                    else{
                        return view('errors.404');
                    }
                }
            } 
            else {
                $category = DB::table('categories')->where('slug',request()->category)->first();
                if($category){
                    $products = DB::table('products')
                    ->orderBy('created_at', 'desc')
                    ->where('category_id', $category->id)
                    // ->where($product_area)
                    ->where('status', 1)
                    ->paginate($items);
                    $total = $products->total();
                }
                else{
                    return view('errors.404');
                }
            }
        } else if (request()->sub_category) {
            $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
            if($sub_category){
                $products = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->where('sub_category_id', $sub_category->id)
                ->where($product_area)
                ->where('status', 1)
                ->paginate($items);
                $total = $products->total();
            }
            else{
                return view('errors.404');
            }
        } else if (request()->is_offer) {
            $products = DB::table('products')
            ->orderBy('created_at', 'desc')
            ->where('is_offer', 1)
            ->where($product_area)
            ->where('status', 1)
            ->paginate($items);
            $total = $products->total();
        } else if (request()->brand) {
            $brand = DB::table('brands')->where('slug',request()->brand)->first();
            if($brand){
                $products = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->where('brand_id', $brand->id)
                ->where($product_area)
                ->where('status', 1)
                ->paginate($items);
                $total = $products->total();
            }
            else{
                return view('errors.404');
            }
        } else {
            $products = DB::table('products')
            ->where($product_area)
            ->orderBy('created_at', 'desc')
            ->where('status', 1)
            ->paginate($items);
            $total = $products->total();
        }
        
        return view('frontend.pages.shop.index', compact('products', 'categories', 'sub_categories', 'brands', 'total', 'items'));
    }

    public function bagerhat_bazar()
    {
        
        //dd(Auth::user()->district_id);
        $product_area = ["product_area"=>"bagerhat"];
        $is_feature_product = [["is_feature_product","!=", 1]];
        if(Auth::user()){
            $user_district = District::where("id", Auth::user()->district_id)->first()->name;
            $product_area = ["product_area" => strtolower(trim($user_district))];
        }
        
        if (request()->filled('items')) {
            $items = request()->items;
        }else{
            $items = $this->initalItems;
        }

        $categories = DB::table('categories')
                ->leftjoin('products','categories.id','products.category_id')
                ->select('categories.*')
                ->selectRaw('count(products.id) as count_product')
                ->groupBy('categories.id')
                ->where('categories.status',1)->get();

        $sub_categories =  DB::table('sub_categories')
        ->where('status', 1)
        ->get();	

        $brands =  DB::table('brands')
        ->where('status', 1)
        ->get();	

        if (request()->category) {
            if (request()->sub_category) {
                if (request()->brand) {
                    $brand = DB::table('brands')->where('slug',request()->brand)->first();
                    $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
                    $category = DB::table('categories')->where('slug',request()->category)->first();
                    
                    if($brand && $sub_category && $category){
                        $products = DB::table('products')
                        ->orderBy('created_at', 'desc')
                        ->where('brand_id', $brand->id)
                        ->where('sub_category_id', $sub_category->id)
                        ->where('category_id', $category->id)
                        ->where($is_feature_product)
                        ->where($product_area)
                        ->where('status', 1)
                        ->paginate($items);
                        $total = $products->total();
                    }
                    else{
                        return view('errors.404');
                    }
                } else {
                    $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
                    $category = DB::table('categories')->where('slug',request()->category)->first();
                    
                    if($sub_category && $category){
                        $products = DB::table('products')
                        ->orderBy('created_at', 'desc')
                        ->where('sub_category_id', $sub_category->id)
                        ->where('category_id', $category->id)
                        ->where($is_feature_product)
                        ->where($product_area)
                        ->where('status', 1)
                        ->paginate($items);
                        $total = $products->total();
                    }
                    else{
                        return view('errors.404');
                    }
                }
            } else {
                $category = DB::table('categories')->where('slug',request()->category)->first();
                if($category){
                    $products = DB::table('products')
                    ->orderBy('created_at', 'desc')
                    ->where('category_id', $category->id)
                    ->where($is_feature_product)
                    ->where($product_area)
                    ->where('status', 1)
                    ->paginate($items);
                    $total = $products->total();
                }
                else{
                    return view('errors.404');
                }
            }
        } else if (request()->sub_category) {
            $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
            if($sub_category){
                $products = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->where('sub_category_id', $sub_category->id)
                ->where($is_feature_product)
                ->where($product_area)
                ->where('status', 1)
                ->paginate($items);
                $total = $products->total();
            }
            else{
                return view('errors.404');
            }
        } else if (request()->brand) {
            $brand = DB::table('brands')->where('slug',request()->brand)->first();
            if($brand){
                $products = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->where('brand_id', $brand->id)
                ->where($is_feature_product)
                ->where($product_area)
                ->where('status', 1)
                ->paginate($items);
                $total = $products->total();
            }
            else{
                return view('errors.404');
            }
        } else {
            $products = DB::table('products')
            ->where($is_feature_product)
            ->where($product_area)
            ->orderBy('created_at', 'desc')
            ->where('status', 1)
            ->paginate($items);
            $total = $products->total();
        }
        
        $adv = DB::table('advertisements')->where(['type'=>'slider'],['status'=>1])->orderBy('id','DESC')->get();
        return view('frontend.pages.shop.index', compact('products', 'categories', 'sub_categories', 'brands', 'total', 'items', 'adv'));
    }


    public function ratingProduct($rating_product)
    {
        if (request()->filled('items')) {
            $items = request()->items;
        }else{
            $items = $this->initalItems;
        }

        $categories = DB::table('categories')
                ->leftjoin('products','categories.id','products.category_id')
                ->select('categories.*')
                ->selectRaw('count(products.id) as count_product')
                ->groupBy('categories.id')
                ->where('categories.status',1)->get();

        $sub_categories =  DB::table('sub_categories')
        ->where('status', 1)
        ->get();    

        $brands =  DB::table('brands')
        ->where('status', 1)
        ->get();    

        if (request()->category) {
            if (request()->sub_category) {
                if (request()->brand) {
                    $brand = DB::table('brands')->where('slug',request()->brand)->first();
                    $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
                    $category = DB::table('categories')->where('slug',request()->category)->first();
                    
                    if($brand && $sub_category && $category){
                        $products = DB::table('products')
                        ->orderBy('created_at', 'desc')
                        ->where('brand_id', $brand->id)
                        ->where('sub_category_id', $sub_category->id)
                        ->where('category_id', $category->id)
                        ->where('status', 1)
                        ->paginate($items);
                        $total = $products->total();
                    }
                    else{
                        return view('errors.404');
                    }
                } else {
                    $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
                    $category = DB::table('categories')->where('slug',request()->category)->first();
                    
                    if($sub_category && $category){
                        $products = DB::table('products')
                        ->orderBy('created_at', 'desc')
                        ->where('sub_category_id', $sub_category->id)
                        ->where('category_id', $category->id)
                        ->where('status', 1)
                        ->paginate($items);
                        $total = $products->total();
                    }
                    else{
                        return view('errors.404');
                    }
                }
            } else {
                $category = DB::table('categories')->where('slug',request()->category)->first();
                if($category){
                    $products = DB::table('products')
                    ->orderBy('created_at', 'desc')
                    ->where('category_id', $category->id)
                    ->where('status', 1)
                    ->paginate($items);
                    $total = $products->total();
                }
                else{
                    return view('errors.404');
                }
            }
        } else if (request()->sub_category) {
            $sub_category = DB::table('sub_categories')->where('slug',request()->sub_category)->first();
            if($sub_category){
                $products = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->where('sub_category_id', $sub_category->id)
                ->where('status', 1)
                ->paginate($items);
                $total = $products->total();
            }
            else{
                return view('errors.404');
            }
        } else if (request()->brand) {
            $brand = DB::table('brands')->where('slug',request()->brand)->first();
            if($brand){
                $products = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->where('brand_id', $brand->id)
                ->where('status', 1)
                ->paginate($items);
                $total = $products->total();
            }
            else{
                return view('errors.404');
            }
        }
        
        $rating = (int) $rating_product;

         $products = DB::table('products')
            ->orderBy('created_at', 'desc')
            ->where('rating', '>=', $rating)
            ->where('rating', '<', $rating+1)
            ->where('status', 1)
            ->paginate($items);
            $total = $products->total();

        return view('frontend.pages.shop.index', compact('products', 'categories', 'sub_categories', 'brands', 'total', 'items'));    
    }   
}
