<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/subscribe.subscribe') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-envelope-o' }}"></i> {{ __('backend/default.subscribe_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.subscribe') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/default.subscribe') }}</h2></div>
					{{-- <div class="col-md-6"><a href="{{ route('admin.subscribe.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div> --}}
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">

				<!-- Permission for Admin Access -->

				<div class="toggle-table-column">
					<strong>{{ __('backend/default.table_toggle_message') }} </strong>

					<a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/default.email') }}</b></a> 


				</div>
				<div class="table-responsive pt-1">
					<table id="datatable" class="table table-bordered table-hover display">

						<thead>
							<th width="10">{{ __('backend/default.sl') }}</th>
							<th>{{ __('backend/default.email') }}</th>
							<th>{{ __('backend/default.action') }}</th>
						</thead>
						<tbody>
						    
							@foreach ($subscribers as $row)
							<tr class="{{ $row->status == 0 ? 'deactive_':'' }}">
								<td>{{ $loop->index+1 }}</td>

								<td>{{ $row->mail }}</td>
								<td><a href="{{ route('admin.subscriber.delete', $row->id) }}" onclick="return confirm('Are you sure to delete this ?');" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
							</tr>
							@endforeach
						
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection