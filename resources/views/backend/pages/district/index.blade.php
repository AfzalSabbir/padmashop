@extends('backend.layouts.master')

@section('fav_title', 'District')

@section('styles')
<style>
  .action{
    min-width: 70px;
  }
  .select2-container{
    width: 100% !important;
  }
  .table th, .table td{
    vertical-align: middle;
  }
</style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-share-alt"></i> {{ __('backend/district.district_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/district.district') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/district.district') }}</h2></div>
          <div class="col-md-6"><button data-toggle="modal" data-target="#add_new" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</button></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @php
        $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
        ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
        $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp
        @include('backend.partials.error_message')
        <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>{{ __('backend/default.sl') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="1"><b>{{ __('backend/district.district') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="2"><b>{{ __('backend/district.country') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="3"><b>{{ __('backend/district.shipping_cost') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="4"><b>{{ __('backend/default.status') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="5"><b>{{ __('backend/default.action') }}</b></a>
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th width="45">{{ __('backend/default.sl') }}</th>
              <th>{{ __('backend/district.district') }}</th>
              <th>{{ __('backend/district.country') }}</th>
              <th>{{ __('backend/district.shipping_cost') }}</th>
              <th>{{ __('backend/default.status') }}</th>
              <th class="action" width="120">{{ __('backend/default.action') }}</th>
            </thead>

            <tbody>
              @foreach($districts as $district)
              <tr class="{{ $district->status == 0 ? 'deactive_':'' }}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $district->name }}</td>
                <td>{{ $district->country }}</td>
                <td>{{ $district->shipping_cost.' ৳' }}</td>
                <td>{{ $district->status == 1 ? 'Active' : 'Deactive' }}</td>
                <td class="action">
                  <div class="btn-group">
                    @foreach($permissions->submenus as $key => $permission)
                    @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                    @if($key == 0)
                    <button data-toggle="modal" data-target="#edit_page{{ $district->id }}" class="btn btn-info text-white"><i class="fa fa-edit"></i></button>
                    @else
                    <button class="btn btn-danger {{ $district->status == 0? ' btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ $district->id }})" role="button"><i class="fa fa-minus-circle"></i></button>
                    @endif
                    @endif
                    @endforeach
                  </div>
                  {{-- edit Modal --}}
                  <div class="modal fade" id="edit_page{{ $district->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil-square"></i> {{ __('backend/district.district') }} {{ __('backend/default.update') }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.district.update', $district->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label class="col-form-label" for="name">{{ __('backend/district.district') }}<span class="text-danger">*</span></label>
                              <div>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $district->name }}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label" for="country">{{ __('backend/district.country') }} <span class="text-danger">*</span></label>
                              <div>
                                <select class="form-control" name="country" id="country" required>
                                  @foreach($countries as $country)
                                  <option value="{{ $country  }}" {{ $country == $district->country ? 'selected' : '' }}>{{ $country  }}</option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label" for="shipping_cost">{{ __('backend/district.shipping_cost') }}<span class="text-danger">*</span></label>
                              <div>
                                <input type="number" class="form-control" name="shipping_cost" id="shipping_cost" value="{{ $district->shipping_cost }}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label" for="status">{{ __('backend/default.status') }} <span class="text-danger">*</span></label>
                              <div>
                                <select class="form-control" name="status" id="status" required>
                                  <option value="1" {{ $district->status == 1 ? 'selected' : '' }}>Active</option>
                                  <option value="0" {{ $district->status == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
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


{{--Add Modal--}}
<div class="modal fade" id="add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-square"></i> {{ __('backend/district.add_district') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.district.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label class="col-form-label" for="name">{{ __('backend/district.district') }}<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label" for="country">{{ __('backend/district.country') }} <span class="text-danger">*</span></label>
            <div>
              <select class="form-control" name="country" id="country" required>
                @foreach($countries as $country)
                <option value="{{ $country  }}" {{ $country == 'Bangladesh' ? 'selected' : '' }}>{{ $country  }}</option>
                @endforeach

              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label" for="shipping_cost">{{ __('backend/district.shipping_cost') }}<span class="text-danger">*</span></label>
            <div>
              <input type="number" class="form-control" name="shipping_cost" id="shipping_cost" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label" for="status">{{ __('backend/default.status') }} <span class="text-danger">*</span></label>
            <div>
              <select class="form-control" name="status" id="status" required>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
              </select>
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

@section('scripts')
<script>
  $(document).ready(function(){
    $('#country').select2();
  });
</script>
@endsection
