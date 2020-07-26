<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/cost.add_cost') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
<style type="text/css">
	.datepicker {
		margin-top: 60px;
	}
	.input-group-addon i {
		height: 37px !important;
	}
</style>
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-contao' }}"></i> {{ __('backend/cost.cost_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		@if ('add' == 'index')
		<li class="breadcrumb-item active">{{ __('backend/cost.cost') }}</li>
		@elseif ('add' == 'add')
		<li class="breadcrumb-item"><a href="{{ route('admin.cost.index') }}">{{ __('backend/cost.cost') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
		@elseif ('add' == 'edit')
		<li class="breadcrumb-item"><a href="{{ route('admin.cost.index') }}">{{ __('backend/cost.cost') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.edit') }}</li>
		@endif
	</ul>
</div>

<!-- Add Form Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					@if ('add' == 'index')
					<div class="col-md-6"><a href="{{ route('admin.cost.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div>

					@elseif ('add' == 'add')
					<div class="col-md-6"><h2><i class="{{ 'fa fa-plus-square' }}"></i> {{ __('backend/cost.add_cost') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.cost.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>

					@elseif ('add' == 'edit')
					<div class="col-md-6"><h2><i class="{{ 'fa fa-plus-square' }}"></i> {{ __('backend/cost.edit_cost') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.cost.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					@endif
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{ route('admin.cost.store') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="form-row mb-0">
						<div class="col-md-6 form-group mb-0">
							<div class="form-group form-row">
								<div class="col-md-6 form-group">
									<label for="cost_field_id">{{ __('backend/cost.cost_field') }} <span class="text-danger">*</span></label>
									<select name="cost_field_id" id="cost_field_id" class="form-control" required>
										<option disabled selected>Select Cost Field</option>
										@foreach($cost_field as $costField)
										<option value="{{ $costField->id }}">{{ $costField->title }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-6 form-group mb-0">
									<div class="form-group">
										<label for="price">{{ __('backend/cost.cost') }} <span class="text-danger">*</span></label>
										<input type="number" step="0.01" class="form-control" name="price" id="price" required placeholder="">
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group">
									<label for="quantity">{{ __('backend/default.date') }} <span class="text-danger">*</span></label>
									<div class="input-group date" id="pickdate" data-provide="datepicker">
										<input type="text" class="form-control pickdate" name="pickdate" value="{{ $app->request->input('pickdate') ? $app->request->input('pickdate') : date('Y-m-d') }}" required>
										<div class="input-group-addon from_icon">
											<span><i class="fa fa-calendar"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 form-group mb-0">
									<div class="form-group">
										<label for="cost_by">{{ __('backend/cost.cost_by') }} <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="cost_by" id="cost_by" required placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 form-group mb-0">
							<div class="form-group">
								<label for="description">{{ __('backend/default.description') }} <span class="text-danger">*</span></label>
								<textarea class="form-control" name="description" required placeholder="" rows="6"></textarea>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary float-right">{{ __('backend/default.submit') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#pickdate').datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight:'TRUE',
			autoclose: true,
		});
		
		$('#cost_field_id').select2();

	});
</script>
@endsection