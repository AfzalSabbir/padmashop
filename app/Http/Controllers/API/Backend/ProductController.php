<?php

namespace App\Http\Controllers\API\Backend;

use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller{

    public function deleteImage(Request $request)
    {
        ImageUploadHelper::delete($request->image);
        ImageUploadHelper::delete($request->original_image);

        $product = Product::find($request->id);
        $images = $product->image;
        $original_images = $product->original_image;

        $new_image = [];
        $new_original_image = [];
        foreach($images as $image){
            if($image != $request->image){
                $new_image[] = $image;
            }
        }


        foreach($original_images as $original_image){
            if($original_image != $request->original_image){
                $new_original_image[] = $original_image;
            }
        }

        $product->image = json_encode($new_image);
        $product->original_image = json_encode($new_original_image);
        $product->save();

        return 1;
    }
}
