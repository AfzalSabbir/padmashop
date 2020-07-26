@extends('backend.layouts.master')

@section('fav_title', 'Menu Permission')

@section('styles')
<style type="text/css">
  .methods > .each_method{
    float: left;
    width: 184px;
    padding: 10px 0;
  }
  .table th, .table td{
    vertical-align: middle;
  }
</style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-gavel"></i> {{ __('backend/menu.menu_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.admin_setting') }}</li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.role') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h2><i class="fa fa-table"> </i> {{ __('backend/admin_setting.role') }}</h2>
      </div>
      <div class="card-body">
        @php
        $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
        ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
        $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp
        <div class="table-reponsive">
          <table class="table table-striped table-bordered">
            <thead>
              <th>{{ __('backend/default.sl') }}</th>
              <th>{{ __('backend/admin_setting.role') }}</th>
              <th>{{ __('backend/default.action') }}</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Super Admin</td>
                <td>
                  @foreach($permissions->submenus as $key => $permission)
                  @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                  <a class="btn btn-primary" href="{{ route($permission->route, 'super-admin') }}"
                    ><i class="{{ $permission->icon }}"></i></a>
                    @endif
                    @endforeach
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Admin</td>
                  <td>
                    @foreach($permissions->submenus as $key => $permission)
                    @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                    <a class="btn btn-primary" href="{{ route($permission->route, 'admin') }}"
                      ><i class="{{ $permission->icon }}"></i></a>
                      @endif
                      @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>User</td>
                    <td>
                      @foreach($permissions->submenus as $key => $permission)
                      @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                      <a class="btn btn-primary" href="{{ route($permission->route, 'user') }}"
                        ><i class="{{ $permission->icon }}"></i></a>
                        @endif
                        @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection

      @section('scripts')
      <script>
        $(document).ready(function () {
          $(document).on('change', '.select_all', function () {
            var change = $(this);
            $(this).closest('tr').find('.methods').find('input').each(function () {
              if (change.is(':checked')) {
                $(this).prop('checked', true);
              }
              else {
                $(this).prop('checked', false);
              }
            });
          });
        });
      </script>
      @endsection
