<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishList;
use Cart;
use DB;

class CartController extends Controller
{
    /**
     * return to cart page
     */
    public function index()
    {
        return view('frontend.pages.cart.index');
    }


    /**
     * get all cart content
     */
    public function getCart()
    {
        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }


    /**
     * add to session cart using Crinsane shopping cart
     */
    public function addToCart(Request $request)
    {
        $price = $request->product_price - (($request->product_price * $request->product_discount) / 100);

        // $colors = array();
        // $color_decode = json_decode($request->product_color);
        // foreach($color_decode as $pr_color){
        //     $color = DB::table('colors')->where('id', $pr_color)->first();
        //     array_push($colors, $color);
        // }

        // $sizes = [];
        // $size_decode = json_decode($request->product_size);
        // foreach($size_decode as $pr_size){
        //     $size = DB::table('sizes')->where('id', $pr_size)->first();
        //     array_push($sizes, $size);
        // }

        $cart = Cart::add([
            'id'         => $request->product_id,
            'name'       => $request->product_name,
            'qty'        => $request->min_quantity,
            'price'      => $price,
            
            'options'    => [
                'image'         => $request->product_image,
                'min_quantity'  => $request->min_quantity,
                // 'colors' => $colors,
                // 'sizes' => $sizes,
                // 'selected_color' => $color,
                // 'selected_size' => $size
            ]
        ]);

        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }


    /**
     * add to session cart using Crinsane shopping cart
     */
    public function addToCartFromWishlist(Request $request)
    {
        $price = $request->product_price - (($request->product_price * $request->product_discount) / 100);
        // WishList::where('product_id', $request->product_id)->delete();
        $cart = Cart::add([
            'id' => $request->product_id,
            'name' => $request->product_name,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'image' => $request->product_image,
                // 'colors' => $colors,
                // 'sizes' => $sizes,
                // 'selected_color' => $color,
                // 'selected_size' => $size
            ]
        ]);

        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }


    /**
     * get image of product (not used)
     */
    public function getCartImage($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return response()->json($product);
    }


    /**
     * update quantity of a product
     */
    public function updateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }


    /**
     * update color of a product
     */
    public function updateColor(Request $request)
    {
        $cart = Cart::get($request->rowId);
        $option = $cart->options;

        Cart::update($request->rowId, [
            'options' => [
                'image' => $option->image,
                'colors' => $option->colors,
                'sizes' => $option->sizes,
                'selected_color' => (object) $request->color,
                'selected_size' => $option->selected_size
            ]
        ]);

        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }


    /**
     * update size of a product
     */
    public function updateSize(Request $request)
    {
        $cart = Cart::get($request->rowId);
        $option = $cart->options;

        Cart::update($request->rowId, [
            'options' => [
                'image' => $option->image,
                'colors' => $option->colors,
                'sizes' => $option->sizes,
                'selected_color' => $option->selected_color,
                'selected_size' => (object) $request->size
            ]
        ]);

        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }


    /**
     * get colors of a product (not used)
     */
    public function getColor($id)
    {
        $product = Product::where('id', $id)->first();
        $color = json_decode($product->color_id);
        return $color;
    }


    /**
     * Delete cart item
     */
    public function deleteFromCart(Request $request)
    {
        Cart::remove($request->rowId);

        return response()->json(['cart' => Cart::content(), 'total' => Cart::subtotal(), 'count' => Cart::count()]);
    }
}
