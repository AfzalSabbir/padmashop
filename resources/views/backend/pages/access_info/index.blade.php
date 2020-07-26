@extends('backend.layouts.master')

@section('fav_title', 'Login Activity')

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
    <h1><i class="fa fa-history"></i> {{ __('backend/admin_setting.log_activity') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.admin_setting') }}</li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.log_activity') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/admin_setting.access_information') }}</h2></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/default.name') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/admin_setting.ip') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/admin_setting.device') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/admin_setting.browser') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="5"><b>{{ __('backend/default.time') }}</b></a>
        </div>
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>{{ __('backend/default.sl') }}</th>
              <th>{{ __('backend/default.name') }}</th>
              <th>{{ __('backend/admin_setting.ip') }}</th>
              <th>{{ __('backend/admin_setting.device') }}</th>
              <th>{{ __('backend/admin_setting.browser') }}</th>
              <th>{{ __('backend/default.time') }}</th>
            </thead>

            <tbody>
              @foreach($infos as $info)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $info->admin->name }}</td>
                <td>{{ $info->ip }}</td>
                <td>{{ $info->device }}</td>
                <td>{{ $info->browser }}</td>
                <td>{{ $info->created_at->diffForHumans() }}</td>
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
