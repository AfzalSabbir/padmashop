<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/d_commission.edit_d_commission') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-certificate' }}"></i> {{ __('backend/d_commission.d_commission_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('admin.d_commission.index') }}">{{ __('backend/d_commission.d_commission') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.edit') }}</li>
	</ul>
</div>

<!-- Edit Form Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-pencil-square' }}"></i> {{ __('backend/default.edit_d_commission') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.d_commission.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{ route('admin.d_commission.update',$row->id) }}" method="post" enctype="multipart/form-data">
					@csrf


					<div class="form-group">
						<label for="commission">Commission Amount</label>
						<input type="number" min="0" step="any" value="{{ $row->commission }}" class="form-control" name="commission" id="commission" placeholder="Enter commission amount...">
					</div>


					<button type="submit" class="btn btn-primary float-right">{{ __('backend/default.update') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection