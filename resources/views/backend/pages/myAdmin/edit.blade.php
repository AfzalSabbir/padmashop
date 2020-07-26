@extends('backend.layouts.master')

@section('fav_title', 'Edit Profile')

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
        <li class="breadcrumb-item"><a href="{{ route('admin.myadmin.index') }}">{{ __('backend/all.my_admins') }}</a></li>
        <li class="breadcrumb-item active">{{ __('backend/default.edit') }}</li>
    </ul>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h2><i class="fa fa-pencil-square"></i> {{ $admin->name }}</h2></div>
                    <div class="col-md-6"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.partials.message')
                <form class="form-horizontal" action="{{ route('admin.myadmin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="title">Name<span class="text-danger">*</span></label>
                            <div>
                                <input type="text" value="{{ $admin->name }}" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="admin_role">Role<span class="text-danger">*</span></label>
                            <div>
                                <select name="admin_role" class="form-control" id="admin_role">
                                    <option value="1" {{ $admin->admin_role==1 ? 'selected': '' }}>Super Admin</option>
                                    <option value="2" {{ $admin->admin_role==2 ? 'selected': '' }}>Admin</option>
                                    <option value="3" {{ $admin->admin_role==3 ? 'selected': '' }}>User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                            <div>
                                <input type="email" value="{{ $admin->email }}" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="username">Username <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" value="{{ $admin->username }}" class="form-control" name="username" id="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="status">Status <span class="text-danger">*</span></label>
                            <div>
                                <select name="status" class="form-control" id="status">
                                    <option value='1'{{ $admin->status==1 ? 'selected': '' }}>Active</option>
                                    <option value='0'{{ $admin->status==0 ? 'selected': '' }}>Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">{{ __('backend/default.update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection
