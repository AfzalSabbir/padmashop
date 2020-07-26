@extends('backend.layouts.master')

@section('fav_title', 'Site Settings')

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
    <h1><i class="fa fa-sliders"></i> {{ __('backend/default.setting_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('backend/default.setting') }}</li>
    <li class="breadcrumb-item active">{{ __('backend/default.edit') }}</li>
  </ul>
</div>
<div class="row mb-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-pencil-square"></i>&nbsp;{{ __('backend/default.edit') }}</h2></div>
          <div class="col-md-6 text-right">
            <button class="basic btn btn-primary active">{{ __('backend/default.basic') }}</button>
            <button class="other btn btn-primary">{{ __('backend/default.other') }}</button>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="card-body">


        <div class="row">
          <div class="col-md-3">
            <div class="position-relative p-1 pt-4 mt-4 setting_container col-sm-12">
              <span class="px-2 py-1 position-absolute setting_title l-1">Logo</span>
              <span class="px-2 py-1 position-absolute setting_title r-1">Favicon</span>
              <div class="row">
                <div class="col-sm-6">
                  <img src="{{ asset('public/images/settings/'.$setting->logo) }}" alt="" style="height: 60px" class="img img-thumbnail"><br>
                </div>
                <div class="col-sm-6">
                  <img src="{{ asset('public/images/settings/'.$setting->favicon) }}" alt="" style="height: 60px; width: 60px;" class="img img-thumbnail float-right">
                </div>
              </div>
            </div>
            <div class="position-relative p-1 pt-4 mt-4 setting_container col-sm-12">
              <span class="px-2 py-1 position-absolute setting_title l-1">Offer</span>
              <div class="row">
                <div class="col-sm-12">
                  <img src="{{ asset('public/images/settings/'.$setting->offer) }}" alt="" style="width: 100%;" class="img img-thumbnail float-right">
                </div>
              </div>
            </div>

            @if(request()->dev)
            <div class="position-relative p-1 pt-4 mt-4 setting_container col-sm-12">
              <span class="px-2 py-1 position-absolute setting_title l-1">Lazy Loader</span>
              <div class="row">
                <div class="col-sm-12">
                  <img src="{{ asset('public/'.$setting->lazy_loader) }}" alt="" style="width: 100%;" class="img img-thumbnail float-right">
                </div>
              </div>
            </div>
            @endif
          </div>
          <div class="col-md-9">
            @include('backend.partials.error_message')
            <form action="{{ route('admin.setting.store').request()->dev == 1 ? '?dev=1':'' }}" method="post" enctype="multipart/form-data">
              @csrf
              <div id="basic">
                <div class="position-relative p-4 mt-4 setting_container">
                  <span class="px-2 py-1 position-absolute setting_title">Contact</span>
                  <div class="form-row">
                    <div class="col-md-6 mt-3" id="address_div">
                      <label for="address" id="address_label">Address <span class="text-danger">*</span></label>
                      <textarea type="text" name="address" id="address" class="form-control" required>{!! $setting->address !!}</textarea> 
                    </div>
                    <div class="col-md-6" id="find_hide">
                      <div class="mt-3">
                        <label for="title">Site Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" value="{{ $setting->title }}" class="form-control" required>
                      </div>
                      <div class="mt-3">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" value="{{ $setting->email }}" class="form-control" required>
                      </div>
                      <div class="mt-3">
                        <label for="mobile">Mobile <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" id="mobile" value="{{ $setting->mobile }}" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="position-relative p-4 mt-4 setting_container">
                  <span class="px-2 py-1 position-absolute setting_title">Frontend</span>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="logo">Logo </label>
                      <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                    <div class="col-md-6 mt-3">
                      <label for="favicon">Favicon </label>
                      <input type="file" name="favicon" id="favicon" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-3">
                    <div class="col-sm-6">
                      <label for="offer">Offer </label>
                      <input type="file" name="offer" id="offer" class="form-control">
                    </div>
                    @if(request()->dev)
                    <div class="col-sm-6">
                      <label for="lazy_loader">Lazy Loader <code>[Use a .svg file]</code></label>
                      <input type="file" name="lazy_loader" id="lazy_loader" class="form-control">
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div id="other" style="display: none">
                <div class="position-relative p-4 mt-4 setting_container">
                  <span class="px-2 py-1 position-absolute setting_title">SMS</span>
                  <div class="form-row">
                    <div class="col-md-6 mt-3" id="order_div">
                      <label for="order" id="order_label">Order </label>
                      <textarea type="text" name="order" id="order" class="form-control">{!! $setting->order !!}</textarea>
                    </div>
                    <div class="col-md-6 mt-3" id="processing_div">
                      <label for="processing" id="processing_label">Processing </label>
                      <textarea type="text" name="processing" id="processing" class="form-control">{!! $setting->processing !!}</textarea>
                    </div>
                    <div class="col-md-6 mt-3" id="delivered_div">
                      <label for="delivered" id="delivered_label">Delivered </label>
                      <textarea type="text" name="delivered" id="delivered" class="form-control">{!! $setting->delivered !!}</textarea>
                    </div>
                  </div>
                </div>

                <div class="position-relative p-4 mt-4 setting_container">
                  <span class="px-2 py-1 position-absolute setting_title">Social</span>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="facebook">Facebook <span class="text-danger">*</span></label>
                      <input type="text" name="facebook" id="facebook" value="{{ $setting->facebook }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                      <label for="twitter">Twitter <span class="text-danger">*</span></label>
                      <input type="twitter" name="twitter" id="twitter" value="{{ $setting->twitter }}" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mt-3">
                      <label for="youtube">Youtube <span class="text-danger">*</span></label>
                      <input type="text" name="youtube" id="youtube" value="{{ $setting->youtube }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mt-3">
                      <label for="linkedin">Linkedin <span class="text-danger">*</span></label>
                      <input type="linkedin" name="linkedin" id="linkedin" value="{{ $setting->linkedin }}" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-success float-right mt-2" type="submit">{{ __('backend/default.submit') }}</button>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#address').css({
      'min-height': $('#find_hide').height() - $('label').outerHeight() - 24
    });
    $('.basic').click(function(){
      $('.basic').addClass('active');
      $('.other').removeClass('active');
      $('#basic').show();
      $('#other').hide();
    });
    $('.other').click(function(){
      $('.basic').removeClass('active');
      $('.other').addClass('active');
      $('#basic').hide();
      $('#other').show();
    });
  });
</script>
@endsection
