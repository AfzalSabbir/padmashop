<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use Auth;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        //Get All Categories
        if(Auth::guard('admin')->user()->is_merchant){
            $categories = Category::orderBy('position', 'asc')
            ->where('status', 1)
            ->where('status', '!=', 9)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->get();
        }
        else{
            $categories = Category::orderBy('position', 'asc')
            ->where('status', 1)
            ->where('status', '!=', 9)
            ->get();
        }

        return view('backend.pages.category.index', compact('categories'));
    }


    public function create()
    {

        return view('backend.pages.category.add');
    }


    public function store(Request $request)
    {
        //Validation Check 
        $request->validate([
            'title_en' => 'required|unique:categories',
            'title_bn' => 'required|unique:categories',
            'image' => 'required',
        ]);
        // This Code Fore Image Uploade Heare ImageUpolder is Helper
        $image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/category');
        $category_image = 'public/images/category/' . $image;
        // This Data array Using For all Request Set in DB insert   
        $data = array(
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'image' => $category_image,
            'slug' => StringHelper::createSlug($request->title_en, 'Category', 'slug'),
            'status' => $request->status
        );

        if(Auth::guard('admin')->user()->is_merchant){
            $data['admin_id'] = Auth::guard('admin')->user()->id;
        }

        // Heare simpoleInsert method Using For allrequest insert Data base  
        QueryHelper::simpleInsert('Category', $data);

        session()->flash('add_message', 'Category Successfully Saved!');

        return redirect()->route('admin.category.index');

    }



    public function edit($slug)
    {

        $categories = Category::where('slug', $slug)->first();

        return view('backend.pages.category.edit', compact('categories'));
    }

    public function editPosition($string)
    {
        $data = json_decode($string, true);
        foreach($data as $position => $id)
        {
            Category::where('id', $id)->update(['position' => $position]);
        }
    }


    public function update(Request $request, $slug)
    {

        //Validation Check 
        $request->validate([
            'title_en' => 'required|unique:categories,title_en,' . $request->id,
            'title_bn' => 'required|unique:categories,title_bn,' . $request->id
        ]);

        $category = Category::find($request->id);

        // This Data array Using For all Request Set in DB Update   
        if ($request->image) {
            // This Code Fore Image Uploade Heare ImageUpolder is Helper   
            if ($request->old_image != null) {
                $image = ImageUploadHelper::update('image', $request->image, time(), 'public/images/category', $request->old_image);
            } else {
                $image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/category');
            }

            $category_image = 'public/images/category/' . $image;
            $category->image = $category_image;
        }


        $category->title_en = $request->title_en;
        $category->title_bn = $request->title_bn;
        $category->status = $request->status;
        if(Auth::guard('admin')->user()->is_merchant){
            $category->admin_id = Auth::guard('admin')->user()->id;
        }
        $category->save();

        session()->flash('update_message', 'Category Successfully Update!');

        return redirect()->route('admin.category.index');

    }


    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->update(['status' => 9]);
        $category = Category::where('slug', $slug)->first();
        
        $id = $category->id;

        SubCategory::where('category_id', $id)->update(['status' => 9]);
        Brand::where('category_id', $id)->update(['status' => 9]);
        Product::where('category_id', $id)->update(['status' => 9]);

        session()->flash('delete_message', 'Deleted');
        return redirect()->route('admin.category.index');
    }

    public function recovery()
    {
        if(Auth::guard('admin')->user()->is_merchant){
            $categories = Category::orderBy('position', 'asc')
            ->where('status', 9)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->get();
        }
        else{
            $categories = Category::orderBy('position', 'asc')
            ->where('status', 9)
            ->get();
        }

        return view('backend.pages.category.recovery', compact('categories'));
    }
    public function recover($id)
    {
        $category = Category::where('id', $id)->update(['status' => 1]);
        session()->flash('recover_success', 'Successfully');
        return redirect()->Route('admin.category.recovery');

    }
}
