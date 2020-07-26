<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/default.notification') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-bell' }}"></i> {{ __('backend/default.notification_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/default.notification') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/default.notification_list') }}</h2></div>
					{{-- <div class="col-md-6"><a href="{{ route('admin.notification.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div> --}}
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-6 offset-3">
						<form action="" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-row mb-3">
								<div class="col-6">
									<select class="form-control" name="type" id="type" required="">
										<option disabled selected>-- Type ---</option>
										<option value="flash">Flash</option>
										<option value="push">Push</option>
									</select>
								</div>
								<div class="col-6">
									<input type="file" class="form-control" name="image" id="image" placeholder="Image" disabled="true">
								</div>
							</div>
							<div class="form-row mb-3">
								<div class="col-12">
									<input type="text" class="form-control" name="title" id="title" placeholder="Title" disabled="true">
								</div>
							</div>
							<div class="form-row mb-3">
								<div class="col-12">
									<textarea class="form-control" name="body" id="body" placeholder="Description" required=""></textarea>
								</div>
							</div>
							<div class="form-row mb-3">
								<div class="col-5">
		                            <div class="input-group date" id="fromDate" data-provide="datepicker">
		                                <input type="text" class="form-control" name="date_from" id="date_from" placeholder="Date From" autocomplete="off" required="" disabled="">
		                                <div class="input-group-addon">
		                                    <span><i class="fa fa-calendar"></i></span>
		                                </div>
		                            </div>
								</div>
								<div class="col-5">
		                            <div class="input-group date" id="toDate" data-provide="datepicker">
		                                <input type="text" class="form-control" name="date_to" id="date_to" placeholder="Date To" autocomplete="off" required="" disabled="">
		                                <div class="input-group-addon">
		                                    <span><i class="fa fa-calendar"></i></span>
		                                </div>
		                            </div>
								</div>
								<div class="col-2">
									<button type="submit" class="btn btn-success w-100">Save</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-3">
						<img style="width: 100%; display: none;" id="image_view" alt="push">
					</div>
				</div>

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
				{{--
				<div class="toggle-table-column">
					<strong>{{ __('backend/default.table_toggle_message') }} </strong>

					<a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |

					<!--<a></a>
					.
					.
					.	
					<a></a>-->

					<a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/default.status') }}</small></b></a> |
					<a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/default.action') }}</small></b></a>

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


										<!--
										  --
										  -- Without View 
										  --
										  -->
										@if($key == 0)
										<a class="btn btn-info" href="{{ route($permission->route, $row->id) }}"><i class="fa fa-edit"></i></a>
										@else
										<button class="btn text-white {{ $row->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $row->id }})" {{ $row->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button>
										@endif
										<!-- Without View -->



										<!--
										  --
										  -- With View
										  --
										  -->
                                        @if($key == 0)
                                        <a href="{{route($permission->route, $row->slug)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        @elseif($key == 1)
                                        <a href="{{route($permission->route, $row->slug)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        @else
                                        <button class="btn {{ $row->status == 0 ? 'btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ json_encode($row->slug) }})" role="button" {{ $row->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button>
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
				--}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
 $(document).ready(function(){
	let _push = {};
	let _flash = {};
	@foreach($flashMessages as $flashMessage)
		@if($flashMessage->type == 'push')
			_push.body 			= "{{ $flashMessage->body }}";
			_push.title 		= "{{ $flashMessage->title }}";
			_push.image 		= "{{ asset($flashMessage->image) }}";
			_push.date_from 	= "{{ date('Y-m-d', strtotime($flashMessage->date_from)) }}";
			_push.date_to 		= "{{ date('Y-m-d', strtotime($flashMessage->date_to)) }}";
		@else
			_flash.body 		= "{{ $flashMessage->body }}";
			_flash.title 		= "{{ $flashMessage->title }}";
			_flash.image 		= "{{ asset($flashMessage->image) }}";
			_flash.date_from 	= "{{ date('Y-m-d', strtotime($flashMessage->date_from)) }}";
			_flash.date_to 		= "{{ date('Y-m-d', strtotime($flashMessage->date_to)) }}";
		@endif
	@endforeach
	console.log(_flash)
    $('#type').change(function(){
    	if($(this).val() == 'push'){
    		$('#image').prop('disabled', '');
    		$('#title').prop('disabled', '');
    		$('#date_from').prop('disabled', 'true');
    		$('#date_to').prop('disabled', 'true');
    		$('#body').val(_push.body);
    		$('#title').val(_push.title);
    		$('#date_from').val(_push.date_from);
    		$('#date_to').val(_push.date_to);
    		$('#image_view').attr('src', _push.image).show();
    	}
    	else {
    		$('#image').prop('disabled', 'true');
    		$('#title').prop('disabled', 'true');
    		$('#date_from').prop('disabled', '');
    		$('#date_to').prop('disabled', '');
    		$('#body').val(_flash.body);
    		$('#title').val(_flash.title);
    		$('#date_from').val(_flash.date_from);
    		$('#date_to').val(_flash.date_to);
    		$('#image_view').attr('src', _push.image).hide();
    	}
    });

    $('#fromDate').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });

    $('#toDate').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight:'TRUE',
        autoclose: true,
    });
});
</script>
@endsection   
