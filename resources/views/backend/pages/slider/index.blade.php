<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/slider.slider') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
<style>
	/* gallery style */
	.gallery figure{
		width: 24% !important;
		float: left;
		background: #ccc;
		margin: 5px;
	}

	.image-gallery figure{
		width: 195px;
	}

	.gallery figure .video{
		width:  335px;
		border-left: 3px solid #ccc;
		border-top: 3px solid #ccc;
		border-right: 3px solid #ccc;
	}
	.gallery figure .video iframe{
		width:  100% !important;
	}

	.gallery figure img{
		width: 100%;
		height: 130px;
		border-left: 3px solid #ccc;
		border-top: 3px solid #ccc;
		border-right: 3px solid #ccc;
	}
	.gallery figure a{
		display: block;
	}
	.gallery figure{
		float: left;
		background: #ccc;
		margin: 5px;
	}

	.image-gallery figure{
		width: 195px;
	}

	.gallery figure .video{
		width:  335px;
		border-left: 3px solid #ccc;
		border-top: 3px solid #ccc;
		border-right: 3px solid #ccc;
	}
	.gallery figure .video iframe{
		width:  100% !important;
	}

	.gallery figure img{
		width: 100%;
		height: 130px;
		border-left: 3px solid #ccc;
		border-top: 3px solid #ccc;
		border-right: 3px solid #ccc;
	}
	.gallery figure a{
		display: block;
	}
</style>
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-magic' }}"></i> {{ __('backend/slider.slider_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/slider.slider') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/slider.slider') }}</h2></div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				<!-- Permission for Admin Access -->
				@php
				$permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
				->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
				if(Auth::guard('admin')->user()->admin_role == 3){
					$bodyMenu = \App\Models\Role::where('admin_id', Auth::guard('admin')->id())->first();
				}
				else{
					$bodyMenu = \App\Models\Role::where('role', Auth::guard()->user()->admin_role)->first();
				}

				@endphp
				
				<div class="offset-3 col-md-6">
					@include('backend.partials.error_message')
					<form action="{{ route('admin.slider.store') }}" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-md-12 control-label">Slide Title <span class="text-danger">*</span></label>
							<div class="col-md-12">
								<input type="text" name="title" class="form-control file" danger-textuired="" placeholder="Maximum 100 characters" required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label">Slider Link</label>
							<div class="col-md-12">
								<input type="text" name="url" class="form-control file" placeholder="Enter Slider Link">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label">Image (1170 X 400)<span class="text-danger">*</span></label>
							<div class="col-md-12">
								<input type="file" class="form-control" name="image">
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="btn-group pull-right">
								<input type="submit" name="save" value="Save" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>

			<hr width="100%">

			<div class="gallery image-gallery clearfix">
				@foreach ($sliders as $slider)
					<figure>
						<img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
						<figcaption>
							<a class="btn btn-danger" onClick="deleteMethod({{ $slider->id }})" role="button">Delete</a>
							<!-- <a class="btn btn-primary" onClick="deleteMethod({{ $slider->id }})" role="button">Update</a> -->
							@if($slider->status == 1)
								<a class="btn btn-warning" href="{{ route('admin.slider.approve', [$slider->id]) }}" role="button">Disable</a>
							@else
								<a class="btn btn-success" href="{{ route('admin.slider.approve', [$slider->id]) }}" role="button">Enable</a>
							@endif
						</figcaption>
					</figure>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection