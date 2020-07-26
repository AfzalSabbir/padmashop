@extends('backend.layouts.master')

@section('fav_title', 'Add Category')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-pie-chart"></i> {{ __('backend/category.category_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">{{ __('backend/category.category') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-plus-square"></i> {{ __('backend/category.category') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.category.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.error_message')
        <form class="form-horizontal" id="myform" action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Name(en) <span class="text-danger">*</span></label>
            <div class="col-md-5">
              <input id="title_en" class="form-control" type="text" name="title_en"  required placeholder="English">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Name(bn) <span class="text-danger">*</span></label>
            <div class="col-md-5">
              <input id="title_bn" class="form-control avro_bn" type="text" name="title_bn"  required placeholder="বাংলা">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-md-3 text-right">Photo <span class="text-danger">*</span></label>
            <div class="col-md-5">
              <input id="image" class="form-control" type="file" name="image"  required>
              <input type="hidden" name="url" value="{{ url('/') }}">     
            </div>
          </div>

            <div class="form-group row">
                <label class="control-label col-md-3 text-right" for="status">Status <span class="text-danger">*</span></label>
                <div class="col-md-5">
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
            </div>
        
          <div class="form-row">
            <div class="col-md-8 mt-3">
                <button type="submit" name="save" class="btn btn-primary float-right">{{ __('backend/default.submit') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript" charset="utf-8">
    $(function(){
      $('input[name=title_bn]').avro();
    });
  </script>
  <script type="text/javascript" charset="utf-8">
    $(function(){
      $('input[name=title_bn]').avro({'bangla':true});
    });
  </script>
@endsection
