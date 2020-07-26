<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/d_commission.d_commission') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-certificate' }}"></i> {{ __('backend/d_commission.d_commission_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/d_commission.d_commission') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/default.d_commission_list') }}</h2></div>
					<div class="col-md-6"><a href="{{ route('admin.d_commission.add') }}" class="float-right btn btn-primary">
						<i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a>
					</div>
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

				<div class="toggle-table-column">
					<strong>{{ __('backend/default.table_toggle_message') }} </strong>

					<a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/default.commission') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/default.status') }}</small></b></a> |
					<a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/default.action') }}</small></b></a>

				</div>
				<div class="table-responsive pt-1">
					<table id="datatable" class="table table-bordered table-hover display">

						<thead>
							<th width="30">{{ __('backend/default.sl') }}</th>

							<th>Commission Amount</th>

							<th>{{ __('backend/default.status') }}</th>
							<th class="action" width="80">{{ __('backend/default.action') }}</th>
						</thead>
						<tbody>

							<!--Remove from Comment {{--...--}} -->

						    
							@foreach ($rows as $row)
							<tr class="{{ $row->status == 0 ? 'deactive_':'' }}">
								<td>{{ $loop->index+1 }}</td>

								<td>{{ $row->commission }} %</td>

								<td>{{ $row->status == 1 ? 'Actived' : 'Deactived' }}</td>
								<td class="action">
									<div class="btn-group">

										<!-- Checking Admin Access -->
										@foreach($permissions->submenus as $key => $permission)
										@if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))


										<!--
										  --
										  -- With View
										  --
										  -->
                                        @if($key == 0)
                                        <a href="{{route($permission->route, $row->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        @elseif($key == 1)
                                        <a href="{{route('admin.d_commission.edit', $row->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        @else
                                        {{-- <button class="btn {{ $row->status == 0 ? 'btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ json_encode($row->id) }})" role="button" {{ $row->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button> --}}
                                        @endif
										<!-- With View -->

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

<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
@endsection