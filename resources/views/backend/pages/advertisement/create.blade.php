@extends('backend.layouts.master')

@section('fav_title', 'Add Advertisement')

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
		<h1><i class="fa fa-cloud"></i> {{ __('backend/advertisement.advertisement_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('admin.advertisement.index') }}">{{ __('backend/advertisement.advertisement') }}</a></li>
		<li class="breadcrumb-item">{{ __('backend/default.add_new') }}</li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-plus-square"></i>&nbsp;{{ __('backend/advertisement.add_advertisement') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.advertisement.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{ route('admin.advertisement.store') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="form-group row">
						<div class="col-md-6 get_height">
							<label class="col-form-label" for="title">Title<span class="text-danger">*</span></label>
							<div>
								<input type="text" class="form-control" name="title" id="title" required>
							</div>

							<label class="col-form-label" for="image">Upload Image <span class="text-danger">*</span></label>
							<div>
								<input type="file" class="form-control" name="image" id="image" required>
							</div>

							<label class="col-form-label" for="status">Type <span class="text-danger">*</span></label>
							<div>
								<select name="type" class="form-control">
									<option value='ad'>Verticale Ad</option>
									<option value='slider'>Slider Ad</option>
								</select>
							</div>

							<label class="col-form-label" for="status">Status <span class="text-danger">*</span></label>
							<div>
								<select name="status" class="form-control" id="status">
									<option value='1'>Active</option>
									<option value='0'>Deactive</option>
								</select>
							</div>

						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="description">Description<span class="text-danger">*</span></label>
							<textarea type="text" class="form-control put_height" name="description" id="description"></textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-primary float-right">{{ __('backend/default.submit') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('input').avro({
			'bangla':false
		},  function(isBangla){
			//alert('Bangla enabled = ' + isBangla);
		});
		$('textarea').avro({
			'bangla':false
		},  function(isBangla){
			//alert('Bangla enabled = ' + isBangla);
		});
	});
	$(document).ready(function(){
		$("#parent_id").select2();
		$('.put_height').height(8 * $('.form-control').height());
	});
</script>
@endsection