@extends('backend.layouts.master')

@section('fav_title', 'Page Content')

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
		<li class="breadcrumb-item">{{ __('backend/page_content.page_content') }}</li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-table"></i>&nbsp;{{ __('backend/page_content.page_content') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.page_content.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				@php
				$permissions = \App\Models\Menu::where('url', substr(url()->current(), 1+strlen(url('/'))))
				->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
				$bodyMenu = \App\Models\Role::where('role', Auth::guard()->user()->id)->first();
				@endphp
				<div class="toggle-table-column">
					<strong>{{ __('backend/default.table_toggle_message') }} </strong>
					<a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/default.name') }} <small>(en)</small></b></a> |
					<a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/default.name') }} <small>(bn)</small></b></a> |
					<a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/default.title') }} <small>(en)</small></b></a> |
					<a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/default.title') }} <small>(bn)</small></b></a> |
					<a href="#" class="toggle-vis" data-column="5"><b>{{ __('backend/default.parent') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="6"><b>{{ __('backend/default.status') }} </b></a> |
					<a href="#" class="toggle-vis" data-column="7"><b>{{ __('backend/default.action') }} </b></a>
				</div>
				<div class="table-responsive pt-1">
					<table id="datatable" class="table table-bordered table-hover display">
						<thead>
							<th>{{ __('backend/default.sl') }}</th>
							<th>{{ __('backend/default.name') }} <small>(en)</small></th>
							<th>{{ __('backend/default.name') }} <small>(bn)</small></th>
							<th>{{ __('backend/default.title') }} <small>(en)</small></th>
							<th>{{ __('backend/default.title') }} <small>(bn)</small></th>
							<th>{{ __('backend/default.parent') }}</th>
							<th>{{ __('backend/default.status') }} </th>
							<th class="action">{{ __('backend/default.action') }} </th>
						</thead>

						<tbody>
							@foreach ($page_contents as $page_content)
							<tr class="{{ $page_content->status == 0 ? 'deactive_':'' }}">
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $page_content->name_en }}</td>
								<td>{{ $page_content->name_bn }}</td>
								<td>{{ $page_content->title_en }}</td>
								<td>{{ $page_content->title_bn }}</td>
								<td>{{ $page_content->parent_id ? $page_content->parent->name_en : 'N/A' }}</td>
								<td>{{ $page_content->status == 1 ? 'Actived' : 'Deactived' }}</td>
								<td class="action">
									<div class="btn-group">
										@foreach($permissions->submenus as $key => $permission)
										@if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
										@if($key == 0)
										<a class="btn btn-info" href="{{ route($permission->route, $page_content->id) }}"><i class="fa fa-edit"></i></a>
										@else
										<button class="btn text-white {{ $page_content->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $page_content->id }})" {{ $page_content->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button>
										@endif
										@endif
										@endforeach
									</div>
								</td>
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
