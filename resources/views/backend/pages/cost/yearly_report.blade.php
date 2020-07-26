<!-- Full Structure -->
@extends('backend.layouts.master')
@section('fav_title','Yearly Report')
<!-- Write Styles <style>In Here</style> -->
@section('styles')
<style type="text/css">
	.datepicker {
		margin-top: 60px;
	}
	.input-group-addon i {
		height: 33px !important;
		right: 2px;
		top: 2px;
	}
</style>
@include('backend.partials.print')
@endsection
<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2><i class="fa fa-table"></i> Yearly Report</h2>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="card-body">
		<form action="{{route('admin.cost.yearly_report_search')}}" method="post" class="none">
			@csrf
			<div class="row mb-3">
				<div class="col-md-3">
					<select name="year" class="form-control" required>
						{{-- @php
						$year = date("Y");
						$startYear = $year-10;
						@endphp
						@for($startYear; $startYear <= $year; $startYear++ )
						<option value="{{ $startYear }}">{{ $startYear }}</option>
						@endfor --}}
						<option value="">Select Year</option>
						<option value="{{ date('Y') }}">{{ date('Y') }}</option>
					</select>
				</div>
				<div class="col-md-1">
					<button class="btn btn-primary searchByDate" type="submit">{{ __('backend/default.search') }}</button>
				</div>
			</div>
		</form>
		<br>
		<hr class="none" width="100%">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4>Yearly Report</h4>
							</div>
							<div class="col-md-6">
								<button class="btn btn-default float-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i></button>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div class="hide">
								<div class="col-sm-2">
									<figure class="float-left">
										<img class="img-responsive" src="{{ asset('public/images/testimonials/logo.png') }}" style="width: 100px; height: 100px;" alt="">
									</figure>
								</div>
								<div class="col-sm-10">
									<div class="institute">
										<h2 class="text-center title" style="margin-top: 10; font-weight: bold;">Border Guard Public School and College</h2>
										<h3 class="text-center" style="margin: 0;">MYMENSINGH</h3>
									</div>
								</div>
								<div class="col-sm-12 mt-5">
									<hr style="border-bottom: 1px solid #ccc;">
									<h4 class="hide text-center" style="margin: 0px 0 20px 0;"> Cost Yearly Report </h4>
								</div>
							</div>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<th>SL</th>
										<th>Cost Field</th>
										<th>Jan</th>
										<th>Feb</th>
										<th>Mar</th>
										<th>Apr</th>
										<th>May</th>
										<th>Jun</th>
										<th>Jul</th>
										<th>Aug</th>
										<th>Sep</th>
										<th>Oct</th>
										<th>Nov</th>
										<th>Dec</th>
										<th>Total</th>
									</tr>
									@php
									$grandTotal = 0;
									@endphp
									@foreach($cost_fields as $cost_field)
									@php
									$rowTotal = 0;
									@endphp
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $cost_field->title }}</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-01-01';
											$end_date = $app->request->input('year').'-01-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-02-01';
											$end_date = $app->request->input('year').'-02-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-03-01';
											$end_date = $app->request->input('year').'-03-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-04-01';
											$end_date = $app->request->input('year').'-04-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-05-01';
											$end_date = $app->request->input('year').'-05-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-06-01';
											$end_date = $app->request->input('year').'-06-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-07-01';
											$end_date = $app->request->input('year').'-07-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-08-01';
											$end_date = $app->request->input('year').'-08-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-09-01';
											$end_date = $app->request->input('year').'-09-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-10-01';
											$end_date = $app->request->input('year').'-10-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-11-01';
											$end_date = $app->request->input('year').'-11-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											@php
											$start_date = $app->request->input('year').'-12-01';
											$end_date = $app->request->input('year').'-12-31';
											$total = \DB::table('costs')->where('pickdate', '>=', $start_date)->where('pickdate', '<=', $end_date)->where('cost_field_id', $cost_field->id)->where('status', 1)->sum('price');
											$rowTotal += $total;
											@endphp
											{{ $total }}
										</td>
										<td>
											{{ $rowTotal }}
											@php
											$grandTotal += $rowTotal;
											@endphp
										</td>
									</tr>
									@endforeach
									<tr>
										<td class="text-right" colspan="14">Total</td>
										<td>{{ $grandTotal }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- Write Scripts <script fileType="text/javascript">In Here</script> -->
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
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