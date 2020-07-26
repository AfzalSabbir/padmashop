<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\OrderItem;
use DB;

class HomeProductController extends Controller
{
    public $product_area = [["products.product_area","!=", "bagerhat"]];
    
    public function index()
    {
        /*$top_three_sale = DB::table('order_items')
                            ->where('status', 1)
                            ->select(DB::raw('count(*) as product_total'), 'product_id')
                            ->groupBy('product_id')
                            ->get()
                            ->toArray();
        rsort($top_three_sale); 
        $top_three_sale = array_slice($top_three_sale, 0 ,3);
        dd($top_three_sale);*/
        
        // hot discount offers
        $offers = $this->offers();

        // all discount offers
        $discount_products = $this->discount_products();

        // all new arrivals
        $new_arrivals = $this->new_arrivals();

        // retrieve best sellers
        $best_sellers = $this->best_sellers();

        // retrieve recently viewed products of user
        $recently_viewed = $this->recently_viewed();
        
        //feature_product of user
        $feature_products = $this->feature_product();

        // advertisements
        $advertisements = $this->advertisements();
        // Get all Category
        $categories = DB::table('categories')->where('status',1)->orderBy('position','asc')->take(12)->get();
        $sliders = DB::table('sliders')->where('status', 1)->get();

        $category_products = DB::table('products')
            ->leftJoin('categories as categories', 'products.category_id', '=', 'categories.id')
            ->where('products.status', 1)
            ->where('products.is_feature_product','!=', 1)
            ->where($this->product_area)
            ->where('products.status', '!=', 9)
            ->select('products.*', 'categories.slug as category_slug')
            /*->where('admin_id', '>', 0)*/
            ->take(12)
            ->get()
            ->groupBy('category_id');


        $offer_products = DB::table('products')
            ->where('is_offer', 1)
            ->where('is_feature_product','!=', 1)
            ->where($this->product_area)
            ->where('status', '!=', 9)
            ->where('status', '!=', 0)
            ->take(12)
            ->get();

        
        $adv = DB::table('advertisements')->where(['type'=>'ad'],['status'=>1])->orderBy('id','DESC')->get()->take(3);
        return view('frontend.pages.index', compact('offers', 'discount_products', 'new_arrivals', 'best_sellers', 'advertisements', 'recently_viewed', 'categories', 'sliders', 'feature_products', 'category_products', 'offer_products', 'adv'));
    }



    public function search(Request $request)
    {
        // search in products table
        $search_products = DB::table('products')
        ->where('title', 'like', '%' . $request->search_query . '%')
        ->where('status', 1)
        ->where('is_feature_product','!=', 1)
        ->get();

        // search categories 
        $categories = DB::table('categories') 
        ->where('title_en', $request->search_query)
        ->where('status', 1)
        ->get();  

        // search products for founded categories
        foreach($categories as $category){
            $category_products = DB::table('products')
            ->where('is_feature_product','!=', 1)
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->get();

            // merge category_products with previous products array
            if(count($category_products) > 0){
                if(count($search_products)){
                    $search_products = array_merge($search_products, $category_products);
                }
                else{
                    // assign to products
                    $search_products = $category_products;
                }
            }
        } 


        // search sub_categories 
        $sub_categories = DB::table('sub_categories') 
        ->where('title_en', $request->search_query)
        ->where('status', 1)
        ->get();

        // search products for founded sub_categories    
        foreach($sub_categories as $sub_category){
            $sub_category_products = DB::table('products')
            ->where('is_feature_product','!=', 1)
            ->where('sub_category_id', $sub_category->id)
            ->where('status', 1)
            ->get();

            // merge sub_category_products with previous products array
            if(count($sub_category_products) > 0){
                if(count($search_products)){
                    $search_products = array_merge($search_products, $sub_category_products);
                }
                else{
                    // assign to products
                    $search_products = $sub_category_products;
                }
            }
        }  


        // search brands
        $brands = DB::table('brands') 
        ->where('title_en', $request->search_query)
        ->where('status', 1)
        ->get();  

        // search products for founded brands
        foreach($brands as $brand){
            $brand_products = DB::table('products')
            ->where('is_feature_product','!=', 1)
            ->where('sub_category_id', $brand->id)
            ->where('status', 1)
            ->get();

            // merge brand_products with previous products array
            if(count($brand_products) > 0){
                if(count($search_products)){
                    $search_products = array_merge($search_products, $brand_products);
                }
                else{
                    // assign to products
                    $search_products = $brand_products;
                }
            }
        }

        $products = $search_products; 

        return response()->json($products);        
    }

    /**
     * get a single advertisement for every 10 seconds
    */
    public function getRealTimeAdvertise()
    {
        $advertise = Advertisement::where('status', 1)->inRandomOrder()->first();

        return $advertise;
    }


    /**
     * get hot discount offers
    */
    private function offers()
    {
        $offers = DB::table('products')
        ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('sub_categories as sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->leftJoin('brands as brands', 'brands.id', '=', 'products.brand_id')
        ->orderBy('products.created_at', 'desc')
        ->where('products.discount_time', '>', date('Y-m-d'))
        ->where($this->product_area)
        ->where('products.is_feature_product','!=', 1)
        ->where('products.status', 1)
        ->select('products.*', 'categories.title_en as category_title', 'sub_categories.title_en as sub_category_title',
            'brands.title_en as brand_title')
        ->take(12)
        ->get();

        return $offers;
    }


    /**
     * get discount products
    */
    private function discount_products()
    {
        $discount_products = DB::table('products')
        ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('sub_categories as sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->leftJoin('brands as brands', 'brands.id', '=', 'products.brand_id')
        ->orderBy('products.created_at', 'desc')
        ->where('discount', '!=', null)
        ->where($this->product_area)
        ->where('products.status', 1)
        ->where('products.is_feature_product','!=', 1)
        ->select('products.*', 'categories.title_en as category_title', 'sub_categories.title_en as sub_category_title',
            'brands.title_en as brand_title')
        ->get();

        return $discount_products;
    }


    /**
     * get newly arrival products
    */
    private function new_arrivals()
    {
        $new_arrivals = DB::table('products')
        ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
        ->orderBy('products.created_at', 'desc')
        ->where($this->product_area)
        ->where('products.is_feature_product','!=', 1)
        ->where('products.status', 1)
        ->select('products.*', 'categories.title_en as category_title')
        ->take(12)
        ->get();
        // dd($new_arrivals);

        return $new_arrivals;
    }

    /**
     * get newly featured products
    */
    private function feature_product()
    {
        $new_arrivals = DB::table('products')
        ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
        ->orderBy('products.created_at', 'desc')
        ->where($this->product_area)
        ->where('products.status', 1)
        ->where('products.is_feature_product', 1)
        ->select('products.*', 'categories.title_en as category_title')
        ->take(12)
        ->get();
        return $new_arrivals;
    }


    /**
     * get best selled products
    */
    private function best_sellers()
    {
        $best_sellers = DB::table('products')
        ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
        ->orderBy('total_sale', 'desc')
        ->where($this->product_area)
        ->where('products.status', 1)
        ->where('products.is_feature_product','!=', 1)
        ->select('products.*', 'categories.title_en as category_title')
        ->take(12)
        ->get();

        return $best_sellers;
    }


    /**
     * get recently viewed products
    */
    private function recently_viewed()
    {
        $mac_address_info = exec('getmac'); 
        $only_mac_address = explode(' ', $mac_address_info);

        $product_histories = DB::table('user_histories')
        ->where('user_mac', $only_mac_address[0])
        ->get();
        
        $products = array();
        foreach($product_histories as $history){
            $product = DB::table('products')
            ->leftJoin('categories as categories', 'categories.id', '=', 'products.category_id')
            ->orderBy('total_sale', 'desc')
            ->where('products.id', $history->product_id)
            ->where($this->product_area)
            ->where('products.status', 1)
            ->where('products.is_feature_product','!=', 1)
            ->select('products.*', 'categories.title_en as category_title')
            ->first();
            if($product != null) {
                array_push($products, $product);
            }
        }
        
        return $products;   
    }


    private function advertisements()
    {
        $advertisements = DB::table('advertisements')->orderBy('created_at', 'desc')->where('status', 1)->get();
        return $advertisements;
    }

    public function contact()
    {
        return"ok";
    }

    public function store(Request $request)
    {
        if(DB::table('subscribers')->where('mail', request()->email)->first() != null){
            DB::table('subscribers')->insert(['mail'=>request()->email]);
        }
        session()->flash('subscriber_message', 'Subscribe successfull');
        return header('location:'.$_SERVER['HTTP_REFERER'].'#subscribers');
    }
}
