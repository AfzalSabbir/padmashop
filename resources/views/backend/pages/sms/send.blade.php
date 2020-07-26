<!-- Full Structure -->
@extends('backend.layouts.master')

@section('fav_title', __('backend/sms.sms') )

<!-- Write Styles <style>In Here</style> -->
@section('styles')
<style>
	.table-bordered th, .table-bordered td {
		border-left: 1px solid transparent;
		border-right: 1px solid transparent;
		border-top: 1px solid transparent;
		border-bottom: 1px solid #ddd !impotant;
	}
</style>
@endsection

<!-- This Section Will Shown <body>In Here</body> -->
@section('content')
<!-- Top Management Part -->
<div class="app-title">
	<div>
		<h1><i class="{{ 'fa fa-dashboard' }}"></i> {{ __('backend/sms.sms_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
		<li class="breadcrumb-item active">{{ __('backend/sms.sms') }}</li>
	</ul>
</div>

<!-- Table Part -->
<div class="row">
	<div class="col-md-12">
		<div class="card">

			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="{{ 'fa fa-envelope' }}"></i> SMS</h2></div>
				</div>
			</div>

			<div class="card-body">
				<form action="{{ route('admin.sms.get_user') }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-3 offset-md-3">
							<select name="select_option" class="form-control">
								<option value="user">Users</option>
								{{-- <option value="teacher">Teacher</option> --}}
							</select>
						</div>
						<div class="col-md-1">
							<div class="btn-group">
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
						</div>
					</div>
				</form>
				<hr>	
				<form action="{{ route('admin.sms.submit_send_sms') }}" method="post">
					<p class="text-right">
						<span class="mr-1"><strong class="text-success">Total SMS: {{ env('SMS_LIMIT') }}</strong></span>
						@php
							$total = (int) env('SMS_LIMIT');
							$sent = (int) \DB::table('sms_records')->where('is_send', 1)->sum('sms_count');
						@endphp
						<span class="mr-1"><strong class="text-info">Sent SMS: {{ $sent }}</strong></span>
						<span class="mr-1"><strong class="text-danger">Remaining SMS: {{ $total - $sent }}</strong></span>
					</p>
					@csrf
					<div class="row">
						<div class="col-md-1 offset-md-2">
							<strong>Users</strong>
						</div>
						<div class="col-md-8">
							<div class="table-responsive" style="height: 150px; overflow-x: auto; border: 1px solid #ddd">
								<table class="table table-bordered">
									@foreach($users as $key => $value)
									{{-- @php $value = (Object) $value @endphp --}}
									<tr>
										<td><input type="checkbox" class="form-control" name="mobile_no[]" value="{{ $value->mobile }}" checked></td>
										<td>{{ $value->name }}</td>
										<td>{{ $value->mobile }}</td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-1 offset-md-2"><strong>Message</strong></div>
						<div class="col-md-8">
							<textarea name="message" id="message" cols="30" rows="6" class="form-control" required></textarea>
							<span class="text-success text-right d-block">Message length <span class="count">0 </span> / <span class="length">0</span></span>
							<input type="hidden" class="form-control length" id="message_length" name="message_length">
						</div>
					</div>
					<div class="row">
						<div class="col-md-11">
							<button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$("#message").keyup(function(){
			var messLen = 0;
			var message = $(this).val();
			var charLength = message.length;
			var english = /^[~!@#$%^&*(){},.:/-_=+A-Za-z0-9 ]*$/;

			if (english.test(message)){
				if( charLength <= 160){ 
					messLen = 1; 
				}
				else if( charLength <= 306){ messLen = 2; }
				else if( charLength <= 459){ messLen = 3; }
				else if( charLength <= 612){ messLen = 4; }
				else if( charLength <= 765){ messLen = 5; }
				else if( charLength <= 918){ messLen = 6; }
				else if( charLength <= 1071){ messLen = 7; }
				else if( charLength <= 1080){ messLen = 8; }
				else { messLen = "Equal to an MMS!"; }		

			}else{
				if( charLength <= 63){ messLen = 1; }
				else if( charLength <= 126){ messLen = 2; }
				else if( charLength <= 189){ messLen = 3; }
				else if( charLength <= 252){ messLen = 4; }
				else if( charLength <= 315){ messLen = 5; }
				else if( charLength <= 378){ messLen = 6; }
				else if( charLength <= 441){ messLen = 7; }
				else if( charLength <= 504){ messLen = 8; }		
				else { messLen = "Equal to an MMS!"; }
			}
			$(".count").text(charLength);
			$(".length").text(messLen);
			$("#message_length").val(messLen);
		});
	});
</script>
@endsection