@extends('backend.layouts.master')

@section('fav_title', 'Add Menu')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-laptop"></i> {{ __('backend/menu.menu_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-code-fork fa-lg fa-fw"></i> {{ __('backend/all.developer') }}</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">{{ __('backend/menu.menu') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/menu.menu') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.menu.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/menu.menu_list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.error_message')
        <form id="myform" action="{{ route('admin.menu.store') }}" method="post">
          @csrf
          <div class="form-row">
            <div class="col-md-4 form-group">
              <label for="menu">Name (En) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="menu" id="menu" required placeholder="menu english name">
            </div>

            <div class="col-md-4 form-group">
              <label for="menu_bn">Name (Bn) <span class="text-danger">*</span></label>
              <input type="text" class="form-control avro_bn" name="menu_bn" id="menu_bn" required placeholder="menu bangla name">
            </div>

            <div class="col-md-4 form-group">
              <label for="url">URL </label>
              <input type="text" class="form-control" name="url" id="url" placeholder="menu name">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="parent_id">Parent Menu</label>
              <select name="parent_id" id="parent_id" class="form-control">
                <option value="" selected disabled>Select Parent Menu</option>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->menu }} 
                  @php
                  $sub = $menu->parent_id;
                  if($sub){
                    $sub_first = $menu->parent;
                    echo ' \ '.$sub_first->menu;
                    $sub_second = $sub_first->parent_id;
                    if($sub_second){
                      echo ' \ '.$sub_first->parent->menu;
                    }
                  }
                  @endphp  
                </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 form-group">
              <label for="menu_position">Position <span class="text-danger">*</span></label>
              <select name="menu_position" id="menu_position" class="form-control" required>
                <option value="" disabled selected>Select Position</option>
                <option value="0">Sidebar</option>
                <option value="1">In Body</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="icon">Icon <span class="text-danger">*</span></label>
              {{-- <input type="text" class="form-control" name="icon" id="icon" placeholder="menu icon" required> --}}

              <select name="icon" id="fontawesome_" class="form-control fontawesome_"></select>
            </div>

            <div class="col-md-6 form-group">
              <label for="order">Menu Order <span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="order" id="order" placeholder="menu order" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="route">Route </label>
              <input type="text" class="form-control" name="route" id="route" placeholder="menu route">
            </div>

            <div class="col-md-6 form-group">
              <label for="status">Status </label>
              <select name="status" id="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Deactive</option>
              </select>
            </div>
          </div>

          <button type="submit" name="save_menu" class="btn btn-success float-right">{{ __('backend/default.submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

  @include('backend.partials.script_add_fontawesome')

  <script type="text/javascript" charset="utf-8">
    $(function(){
      $('input[name=menu_bn]').avro();
    });
    $(function(){
      $('input[name=menu_bn]').avro({'bangla':true});
    });
  </script>
  <script>
   $(document).ready(function(){
    $('#parent_id').select2();
      $('#myform').validate({
      // initialize the plugin
      // rules: {
      //     menu_bn: {
      //         required: true,
      //     },
      //     menu: {
      //         required: true,
      //     }
      // },
      messages: {
        menu: "{{ __('default.required_validation') }}",
        menu_bn: "{{ __('default.required_validation') }}",
        icon: "{{ __('default.required_validation') }}",
        order: "{{ __('default.required_validation') }}",
      } 
    });
    });
  </script>
@endsection
