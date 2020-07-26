<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/distributor.add_distributor') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-random' }}"></i> {{ __('backend/distributor.distributor_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('admin.distributor.index') }}">{{ __('backend/distributor.distributor') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
	</ul>
</div>

<!-- Add Form Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-plus-square' }}"></i> {{ __('backend/distributor.add_distributor') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.distributor.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					<div class="clearfix"></div>

				</div>
			</div>
			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{ route('admin.distributor.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="control-label col-md-3 text-right mt-2" for="name">{{ __('backend/default.name') }} <span class="text-danger">*</span></label>
						<div class="col-md-5">
							<input id="name" class="form-control" type="text" name="name" required placeholder="Name">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 text-right mt-2" for="shop_name">{{ __('backend/distributor.shop_name') }}</label>
						<div class="col-md-5">
							<input id="shop_name" class="form-control" type="text" name="shop_name" placeholder="Name">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 text-right mt-2" for="mobile">{{ __('backend/default.mobile') }} <span class="text-danger">*</span></label>
						<div class="col-md-5">
							<input id="mobile" class="form-control" type="text" name="mobile" required placeholder="Mobile no...">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 text-right mt-2" for="address">{{ __('backend/default.address') }} <span class="text-danger">*</span></label>
						<div class="col-md-5">
							<textarea name="address" id="address" class="form-control" rows="6" type="text" required placeholder="Address..."></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-8 float-right">
							<button type="submit" class="btn btn-primary float-right">{{ __('backend/default.submit') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection