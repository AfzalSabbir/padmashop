@extends('backend.layouts.master')

@section('fav_title', 'Edit | '. $advertisement->title)

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
		<li class="breadcrumb-item">{{ __('backend/default.edit') }}</li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-pencil-square"></i>&nbsp;{{ __('backend/advertisement.advertisement') .' '. __('backend/default.update') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.advertisement.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{ route('admin.advertisement.update', $advertisement->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<div class="col-md-6 get_height">
							<label class="col-form-label" for="title">Title<span class="text-danger">*</span></label>
							<div>
								<input type="text" class="form-control" name="title" id="title" value="{{ $advertisement->title }}" required>
							</div>

							<label class="col-form-label" for="image">Upload Image <span class="text-danger">*</span></label>
							<div>
								<input type="file" class="form-control" name="image" id="image">
							</div>

							<label class="col-form-label" for="status">Status <span class="text-danger">*</span></label>
							<div>
								<select name="status" class="form-control" id="status">
									<option value='1' {{ $advertisement->status == 1 ? 'selected' : '' }} >Active</option>
									<option value='0' {{ $advertisement->status == 0 ? 'selected' : '' }} >Deactive</option>
								</select>
							</div>

							<label class="col-form-label" for="status">Type <span class="text-danger">*</span></label>
							<div>
								<select name="type" class="form-control">
									<option {{ $advertisement->type == "ad" ? 'selected' : '' }} value='ad'>Verticale Ad</option>
									<option {{ $advertisement->type == "slider" ? 'selected' : '' }} value='slider'>Slider Ad</option>
								</select>
							</div>

							<input type="hidden" name="old_image" value="{{ $advertisement->image }}">
						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="description">Description<span class="text-danger">*</span></label>
							<textarea type="text" class="form-control put_height" name="description" id="description">{!! $advertisement->description !!}</textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-primary float-right">{{ __('backend/default.update') }}</button>
				</form>
				
				<div style="">
				    <img src="{{ asset($advertisement->image) }}" alt="">
				</div>
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