<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\PageContent;


class PageContentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		$page_contents = PageContent::orderBy('status','desc')->orderBy('id','desc')->get();
		return view('backend.pages.page_content.index', compact('page_contents'));
	}

	public function create()
	{
		$parents = PageContent::orderBy('id', 'desc')->where('status', '>', '0')->get();
		return view('backend.pages.page_content.create', compact('parents'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'title_en' => 'required',
			'title_bn' => 'required',
			'name_en' => 'required',
			'name_bn' => 'required',
			'description_en' => 'required',
			'description_bn' => 'required',
			'image' => 'required',
			'route' => 'required',
			'status' => 'required'
		]);

       // This Code Fore Image Uploade Heare ImageUpolder is Helper   
		$image = ImageUploadHelper::upload('image', $request->image, time(), 'public/images/page-content');
		$page_content_image = 'public/images/page-content/'.$image;

        // This Data array Using For all Request Set in DB insert  
		$data = array(
			'title_en' => $request->title_en,
			'title_bn' => $request->title_bn,
			'name_en' => $request->name_en,
			'name_bn' => $request->name_bn,
			'description_en' => $request->description_en,
			'description_bn' => $request->description_bn,
			'image' => $page_content_image,
			'route' => $request->route,
			'parent_id' => $request->parent_id,
			'status' => $request->status
		);

		QueryHelper::simpleInsert('PageContent', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.page_content.index');
	}


	public function edit($id)
	{   
		$page_content = PageContent::where('id',$id)->first();
		$parents = PageContent::orderBy('id', 'desc')->where('status', '>', '0')->get();
		return view('backend.pages.page_content.edit', compact('page_content', 'parents'));
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title_en' => 'required',
			'title_bn' => 'required',
			'name_en' => 'required',
			'name_bn' => 'required',
			'description_en' => 'required',
			'description_bn' => 'required',
			'route' => 'required',
			'status' => 'required'
		]);

		$old_image = $request->old_image;
       // This Code Fore Image Uploade Heare ImageUpolder is Helper   
		if($request->image){
			$image = ImageUploadHelper::update('image', $request->image, time(), 'public/images/page-content', $old_image);
			$page_content_image = 'public/images/page-content/'.$image;
		}
		else{
			$page_content_image = $old_image;
		}

        // This Data array Using For all Request Set in DB insert  
		$data = array(
			'title_en' => $request->title_en,
			'title_bn' => $request->title_bn,
			'name_en' => $request->name_en,
			'name_bn' => $request->name_bn,
			'description_en' => $request->description_en,
			'description_bn' => $request->description_bn,
			'image' => $page_content_image,
			'route' => $request->route,
			'parent_id' => $request->parent_id,
			'status' => $request->status
		);

		PageContent::where('id', $id)->update($data);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.page_content.index');
	}


    public function delete($id)
    {
        PageContent::where('id', $id)->update(['status' => 0]);
        PageContent::where('parent_id', $id)->update(['status' => 0]);

        session()->flash('delete_message', 'Deleted');
        return redirect()->route('admin.page_content.index');
    }



}
