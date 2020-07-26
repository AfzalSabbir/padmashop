@extends('backend.layouts.master')

@section('fav_title', 'Edit | '. $page_content->name_en)

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
		<h1><i class="fa fa-cubes"></i> {{ __('backend/page_content.page_content_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('admin.page_content.index') }}">{{ __('backend/page_content.page_content') }}</a></li>
		<li class="breadcrumb-item">{{ __('backend/default.edit') }}</li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-pencil-square"></i>&nbsp;{{ __('backend/page_content.page_content_update') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.page_content.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{ route('admin.page_content.update', $page_content->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label" for="name_en">{{ __('backend/default.name') }} <small>(en)</small><span class="text-danger">*</span></label>
							<div>
								<input type="text" value="{{ $page_content->name_en }}" class="form-control" name="name_en" id="name_en" required>
							</div>
						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="name_bn">{{ __('backend/default.name') }} <small>(bn)</small><span class="text-danger">*</span></label>
							<div>
								<input type="text" value="{{ $page_content->name_bn }}" class="form-control avro_bn" name="name_bn" id="name_bn" required>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label" for="title_en">{{ __('backend/default.title') }} <small>(en)</small><span class="text-danger">*</span></label>
							<div>
								<input type="text" value="{{ $page_content->title_en }}" class="form-control" name="title_en" id="title_en" required>
							</div>
						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="title_bn">{{ __('backend/default.title') }} <small>(bn)</small><span class="text-danger">*</span></label>
							<div>
								<input type="text" value="{{ $page_content->title_bn }}" class="form-control avro_bn" name="title_bn" id="title_bn" required>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label" for="description_en">{{ __('backend/default.description') }} <small>(en)</small><span class="text-danger">*</span></label>
							<textarea type="text" class="form-control" name="description_en" id="description_en" required>{!! $page_content->description_en !!}</textarea>
						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="description_bn">{{ __('backend/default.description') }} <small>(bn)</small><span class="text-danger">*</span></label>
							<textarea type="text" class="form-control avro_bn" name="description_bn" id="description_bn" required>{!! $page_content->description_bn !!}</textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label" for="image">{{ __('backend/default.upload') }} {{ __('backend/default.image') }} <span class="text-danger">*</span></label>
							<div>
								<input type="file" class="form-control" name="image" id="image">
							</div>
						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="route">{{ __('backend/default.route') }} <span class="text-danger">*</span></label>
							<div>
								<input type="text" value="{{ $page_content->route }}" class="form-control" name="route" id="route" required>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label" for="parent_id">{{ __('backend/default.parent') }} <span class="text-danger">*</span></label>
							<div>
								<select name="parent_id" id="parent_id" class="form-control">
									<option selected disabled>Select Parent Menu</option>
									@foreach($parents as $parent)
										@if($parent->id != $page_content->id && $parent->parent_id != $page_content->id)
											<option value="{{ $parent->id }}" {{ $page_content->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name_en }}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<label class="col-form-label" for="status">{{ __('backend/default.status') }} <span class="text-danger">*</span></label>
							<div>
								<select name="status" class="form-control" id="status">
									<option value='1' {{ $page_content->status == 1 ? 'selected' : '' }} >Active</option>
									<option value='0' {{ $page_content->status == 0 ? 'selected' : '' }} >Deactive</option>
								</select>
							</div>
						</div>

						<input type="hidden" name="old_image" value="{{ $page_content->image }}">
					</div>

					<button type="submit" class="btn btn-primary float-right">{{ __('backend/default.update') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('.avro_bn').avro({
			'bangla':true
		},  function(isBangla){
			//alert('Bangla enabled = ' + isBangla);
		});
	});
	$(document).ready(function(){
		$("#parent_id").select2();
	});
</script>
@endsection