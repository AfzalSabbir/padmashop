<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $barand = Brand::orderBy('id', 'desc')
            ->where('status', 1)
            ->where('status', '!=', 9)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->get();
        }
        else{
            $barand = Brand::orderBy('id', 'desc')
            ->where('status', 1)
            ->where('status', '!=', 9)
            ->get();
        }
        return view('backend.pages.brand.index',compact('barand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $category = Category::where('status','1')->where('admin_id', Auth::guard('admin')->user()->id)->get();
            $subCategory = subCategory::where('status','1')->where('admin_id', Auth::guard('admin')->user()->id)->get();
        }
        else{
            $category = Category::where('status','1')->get();
            $subCategory = subCategory::where('status','1')->get();
        }
        return view('backend.pages.brand.add',compact('category','subCategory'));
    }



    public function store(Request $request)
    {
        //Validation Check
        $request->validate([
            'title_en'=>'required|unique:brands',
            'title_bn'=>'required|unique:brands',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'image'=> 'required',
        ]);

        // This Code for Image Upload Here ImageUpolder is a Helper
        $image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/brand');
        $brand_image = 'public/images/brand/'.$image;

        // This Data array Using For all Request Set in DB insert
        $data = array (
            'title_en'             => $request->title_en,
            'title_bn'             => $request->title_bn,
            'category_id'       => $request->category_id,
            'sub_category_id'   => $request->sub_category_id,
            'image' => $brand_image,
            'slug'  => StringHelper::createSlug($request->title_en, 'Brand', 'slug'),
            'status' => 1
        );

        if(Auth::guard('admin')->user()->is_merchant){
            $data['admin_id'] = Auth::guard('admin')->user()->id;
        }

        Brand::create($data);

        session()->flash('add_message', 'Brand Successfully Saved!');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $category = Category::where('status','1')->where('admin_id', Auth::guard('admin')->user()->id)->get();
            $subCategory = subCategory::where('status','1')->where('admin_id', Auth::guard('admin')->user()->id)->get();
        }
        else{
            $category = Category::where('status','1')->get();
            $subCategory = subCategory::where('status','1')->get();
        }
        $brand = Brand::where('slug',$slug)->first();
        return view('backend.pages.brand.edit',compact('brand','category','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        //Validation Check
        $request->validate([
            'title_en'=>'required|unique:brands,title_en,'.$request->id,
            'title_bn'=>'required|unique:brands,title_bn,'.$request->id,
        ]);

        // This Data array Using For all Request Set in DB Update
        if($request->image){
            // This Code Fore Image Uploade Heare ImageUpolder is Helper
            if ($request->old_image != null) {
                $image = ImageUploadHelper::update('image', $request->image, time(), 'public/images/brand', $request->old_image);
            } else {
                $image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/brand');
            }

            $brand_image = 'public/images/brand/'.$image;

            $data = array (
                'title_en'          => $request->title_en,
                'title_bn'          => $request->title_bn,
                'category_id'       => $request->category_id,
                'sub_category_id'   => $request->sub_category_id,
                'image' => $brand_image,
                'status' => $request->status
            );
        }else{
            $data = array (
                'title_en'          => $request->title_en,
                'title_bn'          => $request->title_bn,
                'category_id'       => $request->category_id,
                'sub_category_id'   => $request->sub_category_id,
                'status' => $request->status
            );
        }

        if(Auth::guard('admin')->user()->is_merchant){
            $data['admin_id'] = Auth::guard('admin')->user()->id;
        }

        $sub_category = Brand::where('slug', $slug)->first();
        $sub_category->update($data);

        session()->flash('update_message', 'Brand Successfully Update!');

        return redirect()->route('admin.brand.index');
    }


    public function delete($slug)
    {

        $brand = Brand::where('slug', $slug)->update(['status' => 9]);
        $brand = Brand::where('slug', $slug)->first();
        
        $id = $brand->id;

        Product::where('brand_id', $id)->update(['status' => 9]);

        session()->flash('delete_message', 'Deleted');
        return redirect()->route('admin.brand.index');

    }

    public function recovery()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $barand = Brand::orderBy('id', 'desc')
            ->where('status', 9)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->get();
        }
        else{
            $barand = Brand::orderBy('id', 'desc')
            ->where('status', 9)
            ->get();
        }
        return view('backend.pages.brand.recovery',compact('barand'));
    }
    public function recover($id)
    {
        Brand::where('id', $id)->update(['status' => 1]);
        session()->flash('recover_success', 'Recover Successfully...');
        return redirect()->route('admin.brand.index');
    }
}
