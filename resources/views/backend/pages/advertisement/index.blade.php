@extends('backend.layouts.master')

@section('fav_title', 'Advertisement')

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
		<li class="breadcrumb-item">{{ __('backend/advertisement.advertisement') }}</li>
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-table"></i>&nbsp;{{ __('backend/advertisement.advertisement') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.advertisement.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				@php
				$permissions = \App\Models\Menu::where('url', substr(url()->current(), 1+strlen(url('/'))))
				->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
				$bodyMenu = \App\Models\Role::where('role', Auth::guard()->user()->id)->first();
				@endphp
				<div class="table-responsive pt-1">
					<table class="table table-bordered table-hover display">
						<thead>
							<th>{{ __('backend/default.sl') }}</th>
							<th>{{ __('backend/default.title') }} <small>(en)</small></th>
							<th>{{ __('backend/default.description') }}</th>
							<th>{{ __('backend/default.image') }}</th>
							<th>{{ __('backend/default.type') }}</th>
							<th>{{ __('backend/default.status') }}</th>
							<th class="action">{{ __('backend/default.action') }}</th>
						</thead>

						<tbody>
							@foreach ($advertisements as $advertisement)
							<tr class="{{ $advertisement->status == 0 ? 'deactive_':'' }}">
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $advertisement->title }}</td>
								<td>{{ $advertisement->description }}</td>
								<td><img style="height:60px;width:auto;" src="{{ asset($advertisement->image) }}" alt=""></td>
								<td>{{ $advertisement->type == "slider" ? 'Slider Ad' : 'Verticale Ad' }}</td>
								<td>{{ $advertisement->status == 1 ? 'Actived' : 'Deactived' }}</td>
								<td class="action">
									<div class="btn-group">
										@foreach($permissions->submenus as $key => $permission)
										@if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
											@if($key == 0)
											<a class="btn btn-info" href="{{ route($permission->route, $advertisement->id) }}"><i class="fa fa-edit"></i></a>
											@else
											<button class="btn text-white {{ $advertisement->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $advertisement->id }})" {{ $advertisement->status == 0? 'disabled':'' }}><i class="fa fa-trash"></i></button> 
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
