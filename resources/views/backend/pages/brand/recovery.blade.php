@extends('backend.layouts.master')

@section('fav_title', 'brand List')

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
    <h1><i class="fa fa-briefcase"></i> {{ __('backend/brand.brand_recovery') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/brand.brand_recovery') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/brand.brand_recovery') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.brand.create') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @php
        $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
        ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
        $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp
       {{--  <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>Name</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Category</b></a> |
          <a href="#" class="toggle-vis" data-column="3"><b>Subcategory</b></a> |
          <a href="#" class="toggle-vis" data-column="4"><b>Image</b></a> |
          <a href="#" class="toggle-vis" data-column="5"><b>Status</b></a> |
          <a href="#" class="toggle-vis" data-column="6"><b>Action</b></a>
        </div> --}}

          @php
              $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
              ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
              $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
          @endphp
        
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>Name</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Image</th>
              <th>Status</th>
              <th class="action">Action</th>
            </thead>

            <tbody>
            @foreach($barand as $key => $row)
              <tr class="{{ $row->status == 0 ? 'deactive_':'' }}">
                <td>{{ ($key+1) }}  </td>
                <td>{{ $row->title_en }}<br>{{ $row->title_bn }}</td>
                <td>{{ ($row->category ? $row->category->title_en : '') }} </td>
                <td>{{ ($row->subCategory ? $row->subCategory->title_en : '') }}</td>
                 <td>
                     <img style="width: 80px; height: 80px " src="{{asset($row->image)}}" alt="">
                 </td>
                  <td>{{ $row->status == 1 ? 'Active' : 'Deleted' }}</td>
                <td class="action">
                    <div class="btn-group">
                          @foreach($permissions->submenus as $key => $permission)
                            @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                                @if($key == 0)
                                <a href="{{route($permission->route, $row->id)}}" class="btn btn-info" title="Recover your data..!"><i class="fa fa-repeat"></i></a>
                                   
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
