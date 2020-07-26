@extends('backend.layouts.master')

@section('fav_title', 'Message')

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
            <h1><i class="fa fa-envelope"></i> All Message</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{{ __('backend/message') }}</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="toggle-table-column">
                        <strong>{{ __('backend/default.table_toggle_message') }} </strong>
                        <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> |
                        <a href="#" class="toggle-vis" data-column="1"><b>Name</b></a> |
                        <a href="#" class="toggle-vis" data-column="2"><b>Mobile</b></a> |
                        <a href="#" class="toggle-vis" data-column="3"><b>Email</b></a> |
                        <a href="#" class="toggle-vis" data-column="4"><b>Message</b></a>
                        <a href="#" class="toggle-vis" data-column="9"><b>Action</b></a>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover display">
                            <thead>
                            <th width="20">SL</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th width="30" class="action text-center">Action</th>
                            </thead>

                            <tbody>
                            @foreach($message as $key => $row)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ ucfirst($row->name) }}</td>
                                    <td>{{ $row->mobile }}</td>
                                    <td> {{$row->email}} </td>
                                    <td>
                                        {{ ucfirst($row->message) }}
                                    </td>
                                    <td class="text-center">
                                        <button onClick="deleteMethod({{ $row->id }})" class="btn btn-danger">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
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
