<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/books_request.view') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-paper-plane' }}"></i> {{ __('backend/books_request.books_request_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('admin.books_request.index') }}">{{ __('backend/books_request.books_request') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.view') }}</li>
	</ul>
</div>

<!-- Add Form Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-eye' }}"></i> {{ __('backend/books_request.view') }}</h2></div>
					{{-- <div class="col-md-6"><a href="{{ route('admin.books_request.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div> --}}
					<div class="clearfix"></div>

				</div>
			</div>
			<div class="card-body">
				@include('backend.partials.error_message')
				<table class="table table-bordered">
					<tr>
						<th>{{ __('backend/default.name') }}</th>
						<td>{{ $row->name }}</td>
						<th>{{ __('backend/default.mobile') }}</th>
						<td>{{ $row->mobile }}</td>
					</tr>
					<tr>
						<th>{{ __('backend/books_request.address') }}</th>
						<td colspan="3">{{ $row->address  }}</td>
					</tr>
					<tr>
						<th>{{ __('backend/books_request.author_book') }}</th>
						<td colspan="3">{{ $row->author_book  }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection