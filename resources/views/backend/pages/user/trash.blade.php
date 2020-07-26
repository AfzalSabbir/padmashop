@extends('backend.layouts.master')
@section('fav_title', 'User')
@section('styles')
<style>
    .action{
        min-width: 70px;
    }
</style>
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i> {{ __('backend/user.user_management') }}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('backend/user.user') }}</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/user.user') }}</h2></div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.user.trash') }}" method="post" class="none">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group date" id="fromDate" data-provide="datepicker">
                                        <input type="text" class="form-control from_date" name="from_date" value="{{ $app->request->input('from_date') }}" autocomplete="off">
                                        <div class="input-group-addon from_icon">
                                            <span><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group date" id="toDate" data-provide="datepicker">
                                        <input type="text" class="form-control to_date" name="to_date" value="{{ $app->request->input('to_date') }}" autocomplete="off">
                                        <div class="input-group-addon to_icon">
                                            <span><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="row">
                                        <button class="btn btn-primary searchByDate" type="submit">{{ __('backend/default.search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @php
                $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
                ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
                $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
                @endphp
                {{-- <div class="toggle-table-column">
                    <strong>{{ __('backend/default.table_toggle_message') }} </strong>
                    <a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/user.name') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/user.mobile') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/upazilla.country') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/district.district') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="5"><b>{{ __('backend/upazilla.upazilla') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="6"><b>{{ __('backend/default.status') }}</b></a> |
                    <a href="#" class="toggle-vis" data-column="7"><b>{{ __('backend/default.action') }}</b></a>
                </div> --}}

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover display">
                        <thead>
                            <th>{{ __('backend/default.sl') }}</th>
                            <th>{{ __('backend/default.id') }}</th>
                            <th>{{ __('backend/default.date') }}</th>
                            <th>{{ __('backend/user.name') }}</th>
                            <th style="white-space:nowrap;">
                                {{ __('backend/user.d_name') }} (ID)
                            </th>
                            <th>{{ __('backend/user.mobile') }}</th>
                            <th>{{ __('backend/upazilla.country') }}</th>
                            <th>{{ __('backend/district.district') }}</th>
                            <th>{{ __('backend/upazilla.upazilla') }}</th>
                            <th>{{ __('backend/default.status') }}</th>
                            <th class="action">{{ __('backend/default.action') }}</th>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ \App\Helpers\CalculationHelper::generateVoucher($user->id) }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->distributor ? $user->distributor->name : "N/A" }} {{ "-".$user->d_code }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->district_id ? $user->district->name : 'N/A' }}</td>
                                <td>{{ $user->upazilla_id ? $user->upazilla->name : 'N/A' }}</td>
                                <td>{{ $user->status == 1 ? 'Active' : 'Deactive' }}</td>
                                <td class="action">
                                    <div class="btn-group">
                                    @foreach($permissions->submenus as $key => $permission)
                                        @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                                        @if($key == 0)
                                            <a href="{{ route($permission->route, $user->id) }}" class="{{ $user->status == 1 ? 'btn btn-warning' : 'btn btn-success btn-sm' }}"
                                                title="Restore User">
                                                <i class="fa fa-history"></i>
                                            </a>
                                        @else
                                            <button class="btn btn-danger" onClick="deleteMethod({{ $user->id }})"><i class="fa fa-trash"></i></button>
                                        @endif
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
