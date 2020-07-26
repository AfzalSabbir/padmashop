@extends('backend.layouts.master')

@section('fav_title', 'Profile')

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
		<h1><i class="fa fa-user-secret"></i> {{ __('backend/default.admin_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item">{{ __('backend/all.my_admins') }}</li>
	</ul>
</div>
<div class="row mb-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-table"></i>&nbsp;{{ __('backend/all.my_admins') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.myadmin.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/all.add_admin') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card-body">
				{{-- @php
				$permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
				->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
				$bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
				@endphp --}}
				<div class="table-responsive pt-1">
					<table id="datatable" class="table table-bordered table-hover display">
						<thead>
							<th>SL</th>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Role</th>
							<th>Merchant</th>
							<th>Status</th>
							<th class="action">Action</th>
						</thead>

						<tbody>
							@foreach ($myAdmines as $myAdmin)
							<tr class="{{ $myAdmin->status == 0 ? 'deactive_':'' }}">
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $myAdmin->name }}</td>
								<td>{{ $myAdmin->email }}</td>
								<td>{{ $myAdmin->username }}</td>
								<td>
									@if($myAdmin->admin_role == 1)
									{{ 'Super Admin' }}
									@elseif($myAdmin->admin_role == 2)
									{{ 'Admin' }}
									@else
									{{ 'User' }}	
									@endif
								</td>
								<td>{{ $myAdmin->is_merchant ? 'Merchant' : '' }}</td>
								<td>{{ $myAdmin->status == 1 ? 'Active' : 'Deactive' }}</td>
								{{-- <td>
									@foreach($permissions->submenus as $key => $permission)
									@if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
									@php
									if(($key == 0)){
										$icon = 'fa fa-edit';
										$button = 'btn btn-warning';
									}
									else if($key == 1){
										$icon = 'fa fa-trash';
										$button = 'btn btn-danger';
									}
									@endphp
									<a class="{{ $button }}" href="
									{{ $key != 1 ? route($permission->route, $myAdmin->id) : '#' }}
									"
									@if($key == 1)
									onClick="deleteMethod({{ $myAdmin->id }})"
									@endif
									><i class="{{ $icon }}"></i></a>
									@endif
									@endforeach
								</td> --}}
								<td class="action">
									<div class="btn-group">
										@if(Auth::guard('admin')->user()->admin_role == 1)
											<a href="{{ route('admin.myadmin.edit', $myAdmin->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
											<button class="btn btn-danger" onClick="deleteMethod({{ $myAdmin->id }})"><i class="fa fa-trash"></i></button>
										@endif
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

@section('scripts')
@endsection
