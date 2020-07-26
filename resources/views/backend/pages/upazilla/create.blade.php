@extends('backend.layouts.master')

@section('fav_title', 'District')

@section('styles')
    <style>
        .action {
            min-width: 70px;
        }
    </style>
@endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-usb"></i> {{ __('backend/upazilla.upazilla_management') }}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a
                        href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.upazilla.index') }}">{{ __('backend/upazilla.upazilla') }}</a></li>
            <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/upazilla.add_upazilla') }}</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.upazilla.index') }}" class="float-right btn btn-primary"><i
                                        class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="card-body">
                    @include('backend.partials.error_message')
                    <form action="{{ route('admin.upazilla.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="name" class="col-form-label">Upazilla <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="district_id" class="col-form-label">District <span class="text-danger">*</span></label>
                                <select name="district_id" id="district_id" class="form-control" required>
                                    <option disabled selected>Select District</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 form-group">
                                <label for="country" class="col-form-label">Country <span class="text-danger">*</span></label>
                                <select name="country" id="country" class="form-control" required>
                                    <option disabled selected>Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}" {{ $country == 'Bangladesh' ? 'selected' : '' }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="shipping_cost" class="col-form-label">Shipping Cost <span class="text-danger">*</span></label>
                                <input type="number" name="shipping_cost" id="shipping_cost" class="form-control" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="col-form-label" for="status">{{ __('backend/default.status') }} <span class="text-danger">*</span></label>
                                <div>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success float-right" type="submit">{{ __('backend/default.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#country').select2();
            $('#district_id').select2();
        });
    </script>
@endsection
