@extends('backend.layouts.master')

@section('fav_title', 'Add Category')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-pie-chart"></i> {{ __('backend/category.category_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.distributor.index') }}">{{ __('backend/distributor.distributor') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-plus-square"></i> {{ __('backend/distributor.payment') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.distributor.payment.list') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.error_message')
        <form class="form-horizontal" id="myform" action="{{ route('admin.distributor.payment') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Date<span class="text-danger">*</span></label>
            <div class="col-md-5">
              <input type="text" name="date" class="form-control" readonly="true" value="{{ date('Y-m-d') }}">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Distributor <span class="text-danger">*</span></label>
            <div class="col-md-5">
              <select name="d_id" class="form-control select2" required="true">
              	<option value="" selected="true" disabled="true"> --- Select distributor --- </option>
              	@foreach($distributors as $distributor)
              		<option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
              	@endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Amount<span class="text-danger">*</span></label>
            <div class="col-md-5">
              <input class="form-control" type="number" min="0" name="payment" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Remarks<span class="text-danger">*</span></label>
            <div class="col-md-5">
              <input class="form-control" type="text" name="remarks" required>
            </div>
          </div>
        
          <div class="form-row">
            <div class="col-md-8 mt-3">
                <button type="submit" class="btn btn-primary float-right">{{ __('backend/default.submit') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
	<script>
	  	$(".select2").select2();
	</script>
@endsection
