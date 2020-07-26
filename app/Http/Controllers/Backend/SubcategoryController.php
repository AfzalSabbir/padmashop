<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Helpers\QueryHelper;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use Auth;

class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $subcategory = SubCategory::orderBy('id', 'desc')
            ->where('status', 1)
            ->where('status', '!=', 9)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->get();
        }
        else{
            $subcategory = SubCategory::orderBy('id', 'desc')
            ->where('status', 1)
            ->where('status', '!=', 9)
            ->get();
        }
        return view('backend.pages.subcategory.index',compact('subcategory'));
    }



    public function create()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $category = Category::where('status','1')->where('admin_id', Auth::guard('admin')->user()->id)->get();
        }
        else{
            $category = Category::where('status','1')->get();
        }
        return view('backend.pages.subcategory.add',compact('category'));
    }



    public function store(Request $request)
    {

        //Validation Check
        $request->validate([
            'title_en'=>'required|unique:sub_categories',
            'title_bn'=>'required|unique:sub_categories',
            'image'=> 'required',
        ]);

        // This Code for Image Upload Here ImageUpolder is a Helper
        $image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/subcategory');
        $category_image = 'public/images/subcategory/'.$image;

        // This Data array Using For all Request Set in DB insert
        $data = array (
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'category_id' => $request->category_id,
            'image' => $category_image,
            'slug'  => StringHelper::createSlug($request->title_en, 'Category', 'slug'),
            'status' => 1
        );
        if(Auth::guard('admin')->user()->is_merchant){
            $data['admin_id'] = Auth::guard('admin')->user()->id;
        }
        // Heare simpoleInsert method Using For allrequest insert Data base;
        SubCategory::create($data);

        session()->flash('add_message', 'Subcategory Successfully Saved!');
        return redirect()->route('admin.subcategory.index');
    }



    public function edit($slug)
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $category = Category::where('status','1')->where('admin_id', Auth::guard('admin')->user()->id)->get();
        }
        else{
            $category = Category::where('status','1')->get();
        }
        $subcategory = Subcategory::where('slug',$slug)->first();
        return view('backend.pages.subcategory.edit',compact('subcategory','category'));
    }



    public function update(Request $request, $slug)
    {
        //Validation Check
        $request->validate([
            'title_en'=>'required|unique:sub_categories,title_en,'.$request->id,
            'title_bn'=>'required|unique:sub_categories,title_bn,'.$request->id,
        ]);

        // This Data array Using For all Request Set in DB Update
        if($request->image){
            // This Code Fore Image Uploade Heare ImageUpolder is Helper
            if ($request->old_image != null) {
                $image = ImageUploadHelper::update('image', $request->image, time(), 'public/images/subcategory', $request->old_image);
            }else{
                $image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/subcategory');
            }
            $subcategory_image = 'public/images/subcategory/'.$image;

            $data = array (
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'category_id' => $request->category_id,
                'image' => $subcategory_image,
                'status' => $request->status
            );
        }else{
            $data = array (
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'category_id' => $request->category_id,
                'status' => $request->status
            );
        }

        if(Auth::guard('admin')->user()->is_merchant){
            $data['admin_id'] = Auth::guard('admin')->user()->id;
        }

        // Set Condition
        $condition = array(
            'slug' => $slug
        );

        //QueryHelper::simpleUpdate('Subcategory', $data, $condition);
        $sub_category = SubCategory::where('slug', $slug)->first();
        $sub_category->update($data);

        session()->flash('update_message', 'Subcategory Successfully Update!');

        return redirect()->route('admin.subcategory.index');
    }


    public function delete($slug)
    {
        $sub_category = SubCategory::where('slug', $slug)->update(['status' => 9]);
        $sub_category = SubCategory::where('slug', $slug)->first();

        $id = $sub_category->id;

        Brand::where('sub_category_id', $id)->update(['status' => 9]);
        Product::where('sub_category_id', $id)->update(['status' => 9]);

        session()->flash('delete_message', 'Deleted');
        return redirect()->route('admin.subcategory.index');
    }

    public function recovery()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $subcategory = SubCategory::orderBy('id', 'desc')
            ->where('status',9)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->get();
        }
        else{
            $subcategory = SubCategory::orderBy('id', 'desc')
            ->where('status', 9)
            ->get();
        }
        return view('backend.pages.subcategory.recovery',compact('subcategory'));
    }
    public function recover($id)
    {
        SubCategory::where('id', $id)->update(['status' => 1]);

        session()->flash('recover_success', 'Recover Successfully...');
        return redirect()->route('admin.subcategory.recovery');
    }
}
