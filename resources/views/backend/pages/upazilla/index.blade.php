@extends('backend.layouts.master')

@section('fav_title', 'District')

@section('styles')
<style>
  .action {
    min-width: 70px;
  }

  .select2-container {
    width: 100% !important;
  }
  .table th, .table td{
    vertical-align: middle;
  }
</style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-usb"></i> {{ __('backend/upazilla.upazilla_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a
      href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
      <li class="breadcrumb-item active">{{ __('backend/upazilla.upazilla') }}</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/upazilla.upazilla') }}</h2>
            </div>
            <div class="col-md-6">
              <a href="{{ route('admin.upazilla.create') }}" class="float-right btn btn-primary"><i
                class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a>
              </div>
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
              <a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
              <a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/upazilla.upazilla') }}</b></a> |
              <a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/district.district') }}</b></a> |
              <a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/district.country') }}</b></a> |
              <a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/district.shipping_cost') }}</b></a> |
              <a href="#" class="toggle-vis" data-column="5"><b>{{ __('backend/default.status') }}</b></a> |
              <a href="#" class="toggle-vis" data-column="6"><b>{{ __('backend/default.action') }}</b></a>
            </div> --}}

            <div class="table-responsive">
              <table id="datatable" class="table table-bordered table-hover display">
                <thead>
                  <th>{{ __('backend/default.sl') }}</th>
                  <th>{{ __('backend/upazilla.upazilla') }}</th>
                  <th>{{ __('backend/district.district') }}</th>
                  <th>{{ __('backend/district.country') }}</th>
                  <th>{{ __('backend/district.shipping_cost') }}</th>
                  <th>{{ __('backend/default.status') }}</th>
                  <th class="action">{{ __('backend/default.action') }}</th>
                </thead>
                @foreach($upazillas as $upazilla)
                <tr class="{{ $upazilla->status == 0 ? 'deactive_':'' }}">
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $upazilla->name }}</td>
                  <td>{{ $upazilla->district->name }}</td>
                  <td>{{ $upazilla->country }}</td>
                  <td>{{ $upazilla->shipping_cost.' ৳' }}</td>
                  <td>{{ $upazilla->status == 1 ? 'Active' : 'Deactive' }}</td>
                  <td class="action">
                    <div class="btn-group">
                      @foreach($permissions->submenus as $key => $permission)
                      @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                      @if($key == 0)
                      <a class="btn btn-info" href="{{ route($permission->route, $upazilla->id) }}"><i class="fa fa-edit"></i></a>
                      @else
                      <button class="btn text-white {{ $upazilla->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $upazilla->id }})" {{ $upazilla->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button>
                      @endif
                      @endif
                      @endforeach
                    </div>
                  </td>
                </tr>
                @endforeach
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
