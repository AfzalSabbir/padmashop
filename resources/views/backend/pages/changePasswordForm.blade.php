@extends('backend.layouts.master')

@section('fav_title', 'Change Password')

@section('styles')
<style type="text/css">
  #eye{
    right: 0;
    bottom: 0;
    font-size: 20px;
    height: 36px;
    color: #009688;
  }
  #eye:hover,
  #eye:focus{
    -webkit-box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.4) !important;
    box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.4) !important;
  }
</style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-key"></i> {{ __('backend/admin_setting.change_password') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.admin_setting') }}</li>
    <li class="breadcrumb-item active">{{ __('backend/admin_setting.change_password') }}</li>
  </ul>
</div>

<div class="main-body">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3 col-md-6 offset-md-3">
      <div class="card-body">
        @include('backend.partials.message')
        <form action="{!! route('admin.password.change') !!}" method="post">
          @csrf
          <div class="form-group">
            <label for="old_password">{{ __('backend/default.old') .' '. __('backend/default.password') }} <span class="text-danger required">*</span></label>
            <input type="password" class="form-control" name="old_password" id="old_password" value="" placeholder="{{ __('backend/default.old') .' '. __('backend/default.password') }}" required>
            @if ($errors->has('old_password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('old_password') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            <label for="password">{{ __('backend/default.new') .' '. __('backend/default.password') }} <span class="text-danger required">*</span></label>
            <input type="password" class="form-control" name="password" id="password" value="" placeholder="{{ __('backend/default.new') .' '. __('backend/default.password') }}" required>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group position-relative">
            <label for="password_confirmation">{{ __('backend/default.confirm') .' '. __('backend/default.password') }} <span class="text-danger required">*</span></label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="{{ __('backend/default.confirm') .' '. __('backend/default.new') .' '. __('backend/default.password') }}" required>
            <span id="eye" class="fa fa-eye btn btn-xs py-0 position-absolute"></span>
            @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
          </div>

          <button type="submit" class="btn btn-success float-right mt-2"><i class="fa fa-fw fa-sign-in"></i>{{ __('backend/default.submit') }}</button>
        </form>
      </div><!-- end card-->
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#eye').click(function(){
      if ($(this).hasClass('fa-eye')) {
        $('#password_confirmation').attr('type', 'text'); 
        $('.fa-eye').addClass('fa-eye-slash');
        $('.fa-eye-slash').removeClass('fa-eye');
      }else if ($(this).hasClass('fa-eye-slash')) {
        $('#password_confirmation').attr('type', 'password'); 
        $('.fa-eye-slash').addClass('fa-eye');
        $('.fa-eye').removeClass('fa-eye-slash');
      }
    }); 
  });
</script>
@endsection
