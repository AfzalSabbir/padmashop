@extends('backend.layouts.master')

@section('fav_title', 'Category List')

@section('styles')
  <style>
    .action{
      min-width: 70px;
    }
    .table th, .table td{
      vertical-align: middle;
    }
    .drag-sort-enable>tr{
      cursor: move;
    }
    .table tr.drag-sort-active {
      border: 1px solid #4ca1af;
    }
    .table tr.drag-sort-active>*{
      visibility: hidden;
    }
  </style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-pie-chart"></i> {{ __('backend/distributor.distributor') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/distributor.distributor') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/distributor.distributor') }}</h2></div>
          <div class="col-md-6">
            <div class="btn-group float-right">
              <a href="{{ route('admin.distributor.payment') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a>
              {{-- <a id="dragSorting" class="btn btn-warning" title="Enable Drag Sorting"><i class="fa fa-arrows" aria-hidden="true"></i></a> --}}
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">

      	<form action="{{ route('admin.distributor.payment.list') }}" method="post" class="none">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-md-2">
                            <div class="input-group date" id="fromDate" data-provide="datepicker" >
                                <input type="text" class="form-control" name="from_date" value="" autocomplete="off">
                                <div class="input-group-addon">
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group date" id="toDate" data-provide="datepicker" >
                                <input type="text" class="form-control" name="to_date" value="" autocomplete="off">
                                <div class="input-group-addon">
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <select name="d_id" class="form-control select2">
                            	<option value="" selected="true" disabled="true">-- Select Distributor --</option>
                            	@foreach($distributors as $distributor)
                            	<option value="{{ $distributor->id }}"> {{ $distributor->name }} </option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">{{ __('backend/default.search') }}</button>
                        </div>
                    </div>
                </form>
        <div id="alert"></div>
        @php
        $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
        ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
        $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp
        
        <div class="table-responsive">
          <table class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>date</th>
              <th>D_Name</th>
              <th>Amount</th>
              <th>Remarks</th>
            </thead>

            <tbody id="drag_sortable">
              @php
              	$total_amount = 0;
              @endphp
              @foreach ($payments as $key => $row)
              <tr class="" >
                <td> {{ $key+1 }} </td>
                <td> {{ $row->date }} </td>
                <td> {{ $row->distributor ? $row->distributor->name : "N/A" }} </td>
                <td> {{ $row->payment }} @php $total_amount += $row->payment; @endphp </td>
                <td> {{ $row->remarks }} </td>
              </tr>
                @endforeach
                <tr>
                	<th colspan="3" class="text-right">{{ __('backend/default.total') }}</th>
                	<th>{{ $total_amount.' tk' }}</th>
                  <th></th>
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
 $(document).ready(function(){
    $('#fromDate').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });

    $('#toDate').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });

    $('.select2').select2();
});
</script>
@endsection