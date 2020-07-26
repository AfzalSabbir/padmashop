@extends('backend.layouts.master')

@section('fav_title', 'Add brand')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ __('backend/brand.brand_management') }}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">{{ __('backend/brand.brand') }}</a></li>
            <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><h2><i class="fa fa-plus-square"></i> {{ __('backend/brand.add_brand') }}</h2></div>
                        <div class="col-md-6"><a href="{{ route('admin.brand.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="card-body">
                    @include('backend.partials.error_message')
                    <form class="form-horizontal" id="myform" action="{{ route('admin.policy') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-5 pr-0">
								<select name="type" class="form-control" required="true">
									<option value="privacy" 	{{ $type == 'policy' ? 'selected' : ''  }} > --- Privacy Policy --- </option>
									<option value="shipping" 	{{ ($type == 'shipping' 	? 'selected' : '')  }}> --- Privacy Shipping --- </option>
									<option value="payment" 	{{ ($type == 'payment' 	? 'selected' : '')  }}> --- Privacy Payment --- </option>
									<option value="site_mape" 	{{ ($type == 'site_mape' 	? 'selected' : '')  }}> --- Privacy Site Mape --- </option>
								</select>
                            </div>
                            <div class="col-md-3 pl-0">
                                <button type="submit" class="btn btn-primary">{{ __('backend/default.search') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

	        <div class="col-md-12">
	        	<div class="card">
					<form action="{{ route('admin.policy.update') }}" method="post">
						@csrf
			        	<div class="card-body">
			        		<div class="form-group">
				        		<label for="">Title</label>
				        		<input type="text" name="title" class="form-control" value="{{ ($policy ? $policy->title : '') }}">
				        		<input type="hidden" name="type" value="{{ ($type) }}">
				        	</div>
			        		<div class="form-group">
				        		<label for="">Content</label>
				        		<textarea class="form-control" name="content" id="description">{!! ($policy ? $policy->content : '') !!}</textarea>
				        	</div>
			        		<div class="form-group d-flex justify-content-end">
				        		<input type="submit" value="Submit" class="btn btn-success">
				        	</div>
			        	</div>
			        </form>
		        </div>
	        </div>
	    </form>

    </div>
@endsection

@section('scripts')
  
@endsection