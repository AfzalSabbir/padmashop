<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/#fileDirectory#.#fileName#_#fileDirectory#') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ '#fafaOfSideMenu#' }}"></i> {{ __('#langFolderDirectory#/#fileDirectory#.#tagManagement#') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('#dashboardRoute#') }}">{{ __('#langFolderDirectory#/default.dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('#indexFileRoute#') }}">{{ __('#langFolderDirectory#/#fileDirectory#.#fileDirectory#') }}</a></li>
		<li class="breadcrumb-item active">{{ __('#langFolderDirectory#/default.add_new') }}</li>
	</ul>
</div>

<!-- Add Form Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ '#fafaCardHeader#' }}"></i> {{ __('#langFolderDirectory#/#fileDirectory#.add_#fileDirectory#') }}</h2></div>
					{{-- <div class="col-md-6"><a href="{{ route('#indexFileRoute#') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('#langFolderDirectory#/default.list') }}</a></div> --}}
					<div class="clearfix"></div>

				</div>
			</div>
			<div class="card-body">
				@include('backend.partials.error_message')
				<form class="form-horizontal" action="{{-- route('admin.#fileDirectory#.store') --}}" method="post" enctype="multipart/form-data">
					@csrf


					<div class="form-group row">
						<!--Inputs / TextAreas / Selects ... -->
					</div>


					<button type="submit" class="btn btn-primary float-right">{{ __('#langFolderDirectory#/default.submit') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection