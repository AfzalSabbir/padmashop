@extends('backend.layouts.master')

@section('fav_title', 'Admin Profile')

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
        <li class="breadcrumb-item"><a href="{{ route('admin.myadmin.index') }}">{{ __('backend/default.admin') }}</a></li>
        <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
    </ul>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h2><i class="fa fa-plus-square"></i> {{ __('backend/all.add_admin') }}</h2></div>
                    <div class="col-md-6"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.message')
                <form autocomplete="off" class="form-horizontal" action="{{ route('admin.myadmin.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="title">Name<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="admin_role">Role<span class="text-danger">*</span></label>
                            <div>
                                <select name="admin_role" class="form-control" id="admin_role">
                                    <option selected value="" disabled>Select Role</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                            <div>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="username">Username <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control" name="username" id="username" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div>
                                <input type="password" class="form-control" name="password" id="password" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="is_merchant">Merchant <span class="text-danger">*</span> <code class="alert-light cursor-help p-1" title="Click to select!">[Set Role: <strong>Admin</strong>]</code></label>
                            <div>
                                <input type="hidden" name="is_merchant" id="is_merchant">
                                <select name="is_merchant_dumy" class="form-control" id="is_merchant_dumy" readonly disabled>
                                    <option value='0' class="marchent_unchecked">No</option>
                                    <option value='1' class="marchent_checked">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">{{ __('backend/default.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#admin_role').on('change', function(event) {
            if($(this).val() == 2) {
                $('.marchent_checked').attr('selected', 'selected');
                $('.marchent_unchecked').removeAttr('selected', 'selected');
                $('#is_merchant').val('1');

            } else {
                $('.marchent_unchecked').attr('selected', 'selected');
                $('.marchent_checked').removeAttr('selected', 'selected');
                $('#is_merchant').val('0');
            }
        });
        
        $('.cursor-help').on('click', function(event) {
            $('.marchent_checked').attr('selected', 'selected');
            $('.marchent_unchecked').removeAttr('selected', 'selected');
            $('#is_merchant').val('1');
            $('#admin_role>option:eq(2)').prop('selected', true);
        });
    }); 
</script>
@endsection
