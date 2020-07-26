<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/referral_balance.referral_balance') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-credit-card-alt' }}"></i> {{ __('backend/referral_balance.referral_balance_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/referral_balance.referral_balance') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-table' }}"></i> {{ __('backend/referral_balance.referral_balance_list') }}</h2></div>
					{{-- <div class="col-md-6"><a href="{{ route('admin.referral_balance.add') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a></div> --}}
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="card-body">
				<h3 class="text-center alert-success py-2 br-2">{{ $rows->first()->first()->d_name }}</h3>
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
					<a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/default.user_name') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/default.total_sold') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/distributor.total_commission') }}</b></a> |
					<a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/default.action') }}</small></b></a>

				</div>
				<div class="table-responsive pt-1">
					<table id="datatable" class="table table-bordered table-hover display">
						<thead>
							<th>{{ __('backend/default.sl') }}</th>
							<th>{{ __('backend/default.customer_name') }}</th>
							<th>{{ __('backend/default.total_sold') }}</th>
							<th>{{ __('backend/distributor.total_commission') }}</th>
							<th width="50" class="action">{{ __('backend/default.action') }}</th>
						</thead>
						<tbody>

							@foreach ($rows as $row)
								<tr class="{{-- {{ $row->status == 0 ? 'deactive_':'' }} --}}">
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $row[0]->customer_name }}</td>
									<td>{{ $row->sum('grand_total') }} TK</td>
									<td>
										<?php $total_commission = 0; ?>
										@foreach($row as $key => $value)
											@php
												$grand_total = $value->grand_total;
												$percentage  = $value->percentage;
												$commission  = ($grand_total*$percentage)/100;
												$total_commission += $commission;
											@endphp
										@endforeach
										{{ $total_commission }} TK
									</td>
									<td class="action">
										<div class="btn-group">
											<!-- Checking Admin Access -->
											<a class="btn btn-success" href="{{ route('admin.referral_balance.details_view', [$d_code, $row[0]->customer_id]) }}"><i class="fa fa-list-alt"></i></a>
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