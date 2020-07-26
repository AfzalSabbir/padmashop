<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(Request $request)
    {   
        $condition = [['status', '!=', 9]];     
        $users = User::orderBy('id', 'asc');

        if($request->isMethod('post')){
            if(isset($request->from_date) && !empty($request->from_date)){
                $from_date = date_format(date_create_from_format('m/d/Y H:i:s', $request->from_date.' 00:00:00'), 'Y-m-d H:i:s');
                $condition[] = ['created_at', '>=', $from_date ];
            }
            
            if(isset($request->to_date) && !empty($request->from_date)){
                $to_date = date_format(date_create_from_format('m/d/Y H:i:s', $request->to_date.' 00:00:00'), 'Y-m-d H:i:s');
                $condition[] = ['created_at', '<=', $to_date ];
            }

        }
        $users = $users->where($condition)->get();

        return view('backend.pages.user.index', compact('users'));
    }


    public function trash(Request $request)
    {   
        $condition = [['status', '=', 9]];     
        $users = User::orderBy('id', 'asc');

        if($request->isMethod('post')){
            if(isset($request->from_date) && !empty($request->from_date)){
                $from_date = date_format(date_create_from_format('m/d/Y H:i:s', $request->from_date.' 00:00:00'), 'Y-m-d H:i:s');
                $condition[] = ['created_at', '>=', $from_date ];
            }
            
            if(isset($request->to_date) && !empty($request->from_date)){
                $to_date = date_format(date_create_from_format('m/d/Y H:i:s', $request->to_date.' 00:00:00'), 'Y-m-d H:i:s');
                $condition[] = ['created_at', '<=', $to_date ];
            }

        }
        $users = $users->where($condition)->get();

        return view('backend.pages.user.trash', compact('users'));
    }


    public function banUnban($id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            if($user->status == 1){
                $user->status = 0;
            }
            else{
                $user->status = 1;
            }

            $user->save();

            session()->flash('update_message', 'Updated');
            return redirect()->route('admin.user.index');
        }
        else{
            return back();
        }
    }


    public function delete($id)
    {
        User::where('id', $id)->update(['status' => 9]);

        session()->flash('delete_message', 'Updated');
        return redirect()->route('admin.user.index');
    }

    public function restore($id)
    {
        User::where('id', $id)->update(['status' => 1]);

        session()->flash('update_message', 'This user Restore successful');
        return redirect()->route('admin.user.trash');
    }
}
