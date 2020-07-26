@extends('backend.layouts.master')

@section('fav_title', 'Menu')

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
    <h1><i class="fa fa-laptop"></i> {{ __('backend/menu.menu_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-code-fork fa-lg fa-fw"></i> {{ __('backend/all.developer') }}</li>
    <li class="breadcrumb-item active">{{ __('backend/menu.menu') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/menu.menu') }}</h2></div>
          <div class="col-md-6">
            <a href="{{ route('admin.menu.create') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a>
            <a href="{{ route('admin.role.assign', 'super-admin') }}" style="color: white;" class="float-right btn btn-basic Menu_Permission mr-2" title="Super Admin Permission"><i class="fa fa-cogs"></i>/ <i class="fa fa-gavel"></i>/ <i class="fa fa-pencil"></i></a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>Menu(En)</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Menu(Bn)</b></a> | 
          <a href="#" class="toggle-vis" data-column="3"><b>Parent</b></a> | 
          <a href="#" class="toggle-vis" data-column="4"><b>Position</b></a> | 
          <a href="#" class="toggle-vis" data-column="5"><b>Icon</b></a> |
          <a href="#" class="toggle-vis" data-column="6"><b>URL & Route</b></a> |
          <a href="#" class="toggle-vis" data-column="7"><b>Status</b></a> |
          <a href="#" class="toggle-vis" data-column="8"><b>Action</b></a>
        </div>
        
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>Menu(En)</th>
              <th>Menu(Bn)</th>
              <th>Parent</th>
              <th>Position</th>
              <th>Icon</th>
              <th>URL<br>Route</th>
              <th>Status</th>
              <th class="action">Action</th>
            </thead>

            <tbody>

              @foreach($menus as $menu)
              <tr class="{{ $menu->status == 0 ? 'deactive_':'' }}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $menu->menu }}</td>
                <td>{{ $menu->menu_bn }}</td>
                <td>{{ $menu->parent_id ? $menu->parent->menu : 'N/A' }}</td>
                <td>{{ $menu->menu_position == 0 ? 'Sidebar' : ($menu->menu_position == 1 ? 'In Body' : 'N/A') }}</td>
                <td><h4><i class="{{ $menu->icon }}"></i></h4></td>
                <td>{{ $menu->url ? $menu->url : "----------" }}<br>{{ $menu->route ? $menu->route : "----------" }}</td>
                <td>{{ $menu->status == 1 ? 'Active' : 'Deactive' }}</td>
                <td class="action">
                  <div class="btn-group">
                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger" onClick="deleteMethod({{ $menu->id }})" role="button"><i class="fa fa-trash"></i></button>
                  </div>
                </td>
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
