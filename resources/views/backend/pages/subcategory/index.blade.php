@extends('backend.layouts.master')

@section('fav_title', 'Subsubcategory List')

@section('styles')
<style>
.action{
  min-width: 70px;
}
  .table th, .table td{
    vertical-align: middle;
  }
</style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-yelp"></i> {{ __('backend/subcategory.subcategory_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/subcategory.subcategory') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/subcategory.subcategory_list') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.subcategory.create') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @php
          $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
          ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
          $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp

        {{-- <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>Name</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Category</b></a> |
          <a href="#" class="toggle-vis" data-column="3"><b>Image</b></a> |
          <a href="#" class="toggle-vis" data-column="4"><b>Status</b></a> |
          <a href="#" class="toggle-vis" data-column="5"><b>Action</b></a>
        </div> --}}
        
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>Name</th>
              <th>Category</th>
              <th>Image</th>
              <th>Status</th>
              <th class="action">Action</th>
            </thead>

            <tbody>
              @foreach($subcategory as $key => $row)
              <tr class="{{ $row->status == 0 ? 'deactive_':'' }}">
                <td>{{ 1+$key }}</td>
                <td>{{ $row->title_en }}<br>{{ $row->title_bn }}</td>
                <td> {{ $row->category ? $row->category->title_en : '' }} </td>
                <td>
                  <img width="50" height="50" src="{{ asset($row->image) }}" alt="">
                </td>
                <td>{{ $row->status == 1 ? 'Active' : 'Deactive' }}</td>
                <td class="action">
                  <div class="btn-group">
                    @foreach($permissions->submenus as $key => $permission)
                      @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                        @if($key == 0)
                          <a href="{{route($permission->route, $row->slug)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        @else
                          {{-- <button class="btn btn-danger" onClick="deleteMethod({{ json_encode($row->slug) }})" role="button"><i class="fa fa-trash"></i></button> --}}
                          <button class="btn btn-danger" onClick="deleteMethod({{ json_encode($row->slug) }})"><i class="fa fa-trash"></i></button>
                        @endif
                      @endif
                    @endforeach
                  </div>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
