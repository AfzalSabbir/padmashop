@extends('frontend.layouts.master')

@section('title', 'Home')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
<style>
</style>
@endsection
@section('content')


<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-md-6">
			@if(session()->get('token'))
				<form action="{{ route('password.reset.code.change') }}" method="post">
					@csrf
					<div class="card mt-5 mb-5">
						<div class="card-header">Create New Password</div>
						<div class="card-body">
							<div class="row d-flex justify-content-center">
								<div class="col-md-10">
									<div class="form-group">
										<label for="new">New Password</label>
										<input type="text" placeholder="Enter New Password" class="form-control" name="password" required>
									</div>
									<div class="form-group">
										<label for="new">Confirm Password</label>
										<input type="text" placeholder="Confirm Password" class="form-control" name="confirm_password" required>
									</div>
									<div class="form-group">
										<input type="hidden" name="confirm_code" value="{{ old('confirm_code') }}">
										<input type="submit" value="Change" class="btn btn-success float-right">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			@else
				<form action="{{ route('password.reset.code.confirmation') }}" method="post">
					@csrf
					<div class="card mt-5 mb-5">
					<div class="card-header">Code Verification</div>
						<div class="card-body">
							@if(session()->get('wrog_code'))
							<div class="w-100 alert-warning p-2 mb-2 text-center" style="margin-top: -13px;">
								<span>{{ session()->get('wrog_code') }}</span>
							</div>
							@endif
							<div class="row d-flex justify-content-center">
								<div class="col-md-10">
									<div class="form-group d-flex">
										<input type="text" name="confirm_code" placeholder="Enter Verification Code" class="form-control" required>
										<input type="submit" value="Submit" class="btn btn-success float-right">
									</div>
									<a href="{{ route('user_register') }}" class="float-right">Again send verification code</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			@endif
		</div>
	</div>
</div>


@endsection

@section('scripts')

@endsection