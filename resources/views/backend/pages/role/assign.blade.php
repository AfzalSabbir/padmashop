@extends('backend.layouts.master')

@section('fav_title', 'Assign Permission')

@section('styles')
<style type="text/css">
  .methods > .each_method{
    float: left;
    width: 184px;
    padding: 2px 0;
  }
</style>
@endsection

@section('content')
  @php
    $role_ = ucwords(request()->segment(count(request()->segments())), '-');
    $role_ = str_replace('-',' ', $role_);
  @endphp
<div class="app-title">
  <div>
    <h1><i class="fa fa-gavel"></i> {{ $role_.' '.__('backend/default.management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.admin_setting') }}</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">{{ __('backend/admin_setting.role') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.assign') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h2><i class="fa fa-table"> </i> {{ $role_ }}</h2>
      </div>
      <div class="card-body">
        @php
          $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
          ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
          $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp
        <form action="{{ route('admin.role.store') }}" method="post">
          @csrf
          <input type="hidden" name="role_type" value="{{ $role }}">
          <table class="table table-bordered">
            <thead>
              <th>{{ __('backend/menu.menu') }}</th>
              <th>{{ __('backend/menu.submenu') }}</th>
            </thead>
            <tbody>
              @php
              if(!is_null($role_wise)){
                $role_wise_menus = json_decode($role_wise->menu);
                $role_wise_sub_menus = json_decode($role_wise->sub_menu);
                $role_wise_in_body_menus = json_decode($role_wise->in_body);
              }
              else{
                $role_wise_menus = array();
                $role_wise_sub_menus = array();
                $role_wise_in_body_menus = array();
              }
              @endphp
              @foreach($menus as $menu)
              @if(is_null($menu->parent_id))
              <tr>
                <td> 
                  <input type="checkbox" class="select_all" name="menu[]" id="menu{{ $menu->id }}" value="{{ $menu->id }}" {{ \App\Models\Role::checkedMenu($menu->id, $role_wise_menus) }}> 
                  @if(Config::get('app.locale') == 'en')
                  {{ $menu->menu }}
                  @else
                  {{ $menu->menu_bn }}
                  @endif
                </td>
                <td class="methods">
                  @foreach($menu->submenus as $submenu)
                  <div class="each_method">
                    <input type="checkbox" class="submenus" name="submenu[]" id="submenu{{ $submenu->id }}" value="{{ $submenu->id }}" {{ \App\Models\Role::checkedMenu($submenu->id, $role_wise_sub_menus) }}> 
                    @if(Config::get('app.locale') == 'en')
                    {{ $submenu->menu }}
                    @else
                    {{ $submenu->menu_bn }}
                    @endif
                    @if(count($submenu->submenus) >= 1)
                    <br>
                    @foreach($submenu->submenus as $in_body)
                    └<input type="checkbox" class="in_body" name="in_body[]" id="inbody{{ $in_body->id }}" value="{{ $in_body->id }}" {{ \App\Models\Role::checkedMenu($in_body->id, $role_wise_in_body_menus) }}> 
                    @if(Config::get('app.locale') == 'en')
                    {{ $in_body->menu }}
                    @else
                    {{ $in_body->menu_bn }}
                    @endif
                    @endforeach
                    @endif
                  </div>
                  @endforeach
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
          <button type="submit" class="btn btn-success float-right" id="button">{{ __('backend/default.save') }}</button>
        </form>
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

    $(document).on('change', '.submenus', function () {
      var change = $(this);
      $(this).closest('div').find('input').each(function () {
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
