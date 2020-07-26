<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', 'index')

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-eye' }}"></i> {{ __('backend/checking.checking_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		@if ('index' == 'index')
		<li class="breadcrumb-item active">{{ __('backend/checking.checking') }}</li>
		@elseif ('index' == 'add')
		<li class="breadcrumb-item"><a href="{{ route('admin.checking.index') }}">{{ __('backend/checking.checking') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
		@elseif ('index' == 'edit')
		<li class="breadcrumb-item"><a href="{{ route('admin.checking.index') }}">{{ __('backend/checking.checking') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.edit') }}</li>
		@endif
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					@if ('index' == 'index')
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/checking.checking_list') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.checking.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div>

					@elseif ('index' == 'add')
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/checking.add_checking') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.checking.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>

					@elseif ('index' == 'edit')
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/checking.edit_checking') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.checking.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
					@endif
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">

				<!-- Permission for Admin Access -->
				@php
				$permissions = \App\Models\Menu::where('url', substr(url()->current(), 1+strlen(url('/'))))
				->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
				$bodyMenu = \App\Models\Role::where('role', Auth::guard()->user()->id)->first();
				@endphp

				<div class="toggle-table-column">
					<strong>{{ __('backend/default.table_toggle_message') }} </strong>

					<a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |

					<!--<a></a>
					.
					.
					.	
					<a></a>-->

					<a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/default.status') }}</small></b></a> |
					<a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/default.action') }}</small></b></a>

				</div>
				<div class="table-responsive pt-1">
					<table id="datatable" class="table table-bordered table-hover display">

						<thead>
							<th>{{ __('backend/default.sl') }}</th>

							<!--<th></th>
							.
							.
							.
							<th></th>-->

							<th>{{ __('backend/default.status') }}</th>
							<th class="action">{{ __('backend/default.action') }}</th>
						</thead>
						<tbody>

						<!--Remove from Comment {{--...--}} -->
						
						{{--
							@foreach ($rows as $row)
							<tr class="{{ $row->status == 0 ? 'deactive_':'' }}">
								<td>{{ $loop->index+1 }}</td>

								<!--<td></td>
								.
								.
								.
								<td></td>-->

								<td>{{ $row->status == 1 ? 'Actived' : 'Deactived' }}</td>
								<td class="action">
									<div class="btn-group">

										<!-- Checking Admin Access -->
										@foreach($permissions->submenus as $key => $permission)
										@if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
										@if($key == 0)
										<a class="btn btn-info" href="{{ route($permission->route, $row->id) }}"><i class="fa fa-edit"></i></a>
										@else
										<button class="btn text-white {{ $row->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $row->id }})" {{ $row->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button>
										@endif
										@endif
										@endforeach
									</div>
								</td>
							</tr>
							@endforeach
						--}}
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