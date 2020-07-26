@extends('backend.layouts.master')

@section('fav_title', 'Coupon')

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
    <h1><i class="fa fa-ticket"></i> {{ __('backend/coupon.coupon_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> <a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('backend/coupon.coupon') }}</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h2><i class="fa fa-table"></i>&nbsp;{{ __('backend/coupon.coupon') }}</h2>
          </div>
          <div class="col-md-6"><button data-toggle="modal" data-target="#add_new" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</button></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.error_message')
        @php
        $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
        ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
        $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp

        <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/coupon.coupon') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/coupon.code') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/coupon.discount') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/default.from') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="5"><b>{{ __('backend/default.to') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="6"><b>{{ __('backend/default.status') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="7"><b>{{ __('backend/default.action') }}</b></a>
        </div>

        <div class="table-responsive pt-1">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th width="45">{{ __('backend/default.sl') }}</th>
              <th>{{ __('backend/coupon.coupon') }}</th>
              <th>{{ __('backend/coupon.code') }}</th>
              <th>{{ __('backend/coupon.discount') }}</th>
              <th>{{ __('backend/default.from') }}</th>
              <th>{{ __('backend/default.to') }}</th>
              <th>{{ __('backend/default.status') }}</th>
              <th class="action" width="120">{{ __('backend/default.action') }}</th>
            </thead>
            <tbody>

              @foreach($coupons as $coupon)
              <tr class="{{ $coupon->status == 0 ? 'deactive_':'' }}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $coupon->title }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->discount.' TK' }}</td>
                <td>{{ date("d-M-Y", strtotime($coupon->from)) }}</td>
                <td>{{ date("d-M-Y", strtotime($coupon->to)) }}</td>
                <td>{{ $coupon->status == 1 ? 'Active' : 'Deactive' }}</td>
                <td class="action">
                  <div class="btn-group">
                    @foreach($permissions->submenus as $key => $permission)
                    @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                    @if($key == 0)
                    <button data-toggle="modal" data-target="#edit_page{{ $coupon->id }}" class="btn btn-info text-white"><i class="fa fa-edit"></i></button>
                    @else
                    <button class="btn text-white {{ $coupon->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $coupon->id }})" role="button" {{ $coupon->status == 0? 'disabled':'' }}><i class="fa fa-minus-circle"></i></button>
                    @endif
                    @endif
                    @endforeach
                  </div>
                  {{-- edit Modal --}}
                  <div class="modal fade" id="edit_page{{ $coupon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil-square"></i> {{ __('backend/coupon.coupon') }} {{ __('backend/default.update') }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-6 pl-0 pr-1">
                                    <label class="col-form-label" for="title">{{ __('backend/default.title') }}<span class="text-danger">*</span></label>
                                    <div>
                                      <input type="text" class="form-control" name="title" value="{{ $coupon->title }}" id="title" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6 pr-0 pl-1">
                                    <label class="col-form-label" for="discount">{{ __('backend/coupon.discount') }} <small></small><span class="text-danger">*</span></label>
                                    <div>
                                      <input type="number" class="form-control" name="discount" value="{{ $coupon->discount }}" id="discount" required>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="form-group">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-6 pl-0 pr-1">
                                    <label class="col-form-label" for="code">{{ __('backend/coupon.code') }}<span class="text-danger">*</span></label>
                                    <div>
                                      <input type="text" class="form-control" name="code" value="{{ $coupon->code }}" id="code" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6 pr-0 pl-1">
                                    <label class="col-form-label" for="taka">{{ __('backend/default.taka') }}<span class="text-danger">*</span></label>
                                    <div>
                                      <input type="number" class="form-control" name="taka" value="{{ $coupon->taka }}" id="taka" required placeholder="Minimum Buy For Coupon">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-6 pl-0 pr-1">
                                    <label class="col-form-label" for="from">{{ __('backend/default.from') }}<span class="text-danger">*</span></label>
                                    <div>
                                      <input type="date" class="form-control" name="from" value="{{ $coupon->from }}" id="from" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6 pr-0 pl-1">
                                    <label class="col-form-label" for="to">{{ __('backend/default.to') }}<span class="text-danger">*</span></label>
                                    <div>
                                      <input type="date" class="form-control" name="to" value="{{ $coupon->to }}" id="to" required>
                                    </div>
                                  </div>
                                </div></div>
                              </div>
                              <div class="form-group">
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-md-6 pl-0 pr-1">
                                      <label class="col-form-label" for="category">{{ __('backend/category.category') }}<span class="text-danger">*</span></label>
                                      <div>
                                        <select class="form-control" name="category" id="category" required>
                                          <option selected="" disabled="">--Select Category--</option>
                                          <option value="0" {{ $coupon->category == 0 ? 'selected' : '' }}>Fresh Customer</option>
                                          <option value="1" {{ $coupon->category == 1 ? 'selected' : '' }}>Regular Customer</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6 pr-0 pl-1">
                                      <label class="col-form-label" for="status">{{ __('backend/default.status') }} <span class="text-danger">*</span></label>
                                      <div>
                                        <select class="form-control" name="status" id="status" required>
                                          <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active</option>
                                          <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>Deactive</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="button-group pull-right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('backend/default.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('backend/default.update') }}</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>                      
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
{{-- Add Modal --}}
<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-square"></i> {{ __('backend/coupon.add_coupon') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.coupon.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 pl-0 pr-1">
                  <label class="col-form-label" for="title">{{ __('backend/default.title') }}<span class="text-danger">*</span></label>
                  <div>
                    <input type="text" class="form-control" name="title" id="title" required>
                  </div>
                </div>
                <div class="col-md-6 pr-0 pl-1">
                  <label class="col-form-label" for="discount">{{ __('backend/coupon.discount') }} <small></small><span class="text-danger">*</span></label>
                  <div>
                    <input type="number" class="form-control" name="discount" id="discount" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 pl-0 pr-1">
                  <label class="col-form-label" for="code">{{ __('backend/coupon.code') }}<span class="text-danger">*</span></label>
                  <div>
                    <input type="text" class="form-control" name="code" value="" id="code" required>
                  </div>
                </div>
                <div class="col-md-6 pr-0 pl-1">
                  <label class="col-form-label" for="taka">{{ __('backend/default.taka') }}<span class="text-danger">*</span></label>
                  <div>
                    <input type="number" class="form-control" name="taka" value="" id="taka" required placeholder="Minimum Buy For Coupon">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 pl-0 pr-1">
                  <label class="col-form-label" for="from">{{ __('backend/default.from') }}<span class="text-danger">*</span></label>
                  <div>
                    <input type="date" class="form-control" name="from" id="from" required>
                  </div>
                </div>
                <div class="col-md-6 pr-0 pl-1">
                  <label class="col-form-label" for="to">{{ __('backend/default.to') }}<span class="text-danger">*</span></label>
                  <div>
                    <input type="date" class="form-control" name="to" id="to" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 pl-0 pr-1">
                  <label class="col-form-label" for="category">{{ __('backend/category.category') }}<span class="text-danger">*</span></label>
                  <div>
                    <select class="form-control" name="category" id="category" required>
                      <option selected="" disabled="">--Select Category--</option>
                      <option value="0">Fresh Customer</option>
                      <option value="1">Regular Customer</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 pr-0 pl-1">
                  <label class="col-form-label" for="status">{{ __('backend/default.status') }} <span class="text-danger">*</span></label>
                  <div>
                    <select class="form-control" name="status" id="status" required>
                      <option value="1">Active</option>
                      <option value="0">Deactive</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="button-group pull-right">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('backend/default.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('backend/default.submit') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection