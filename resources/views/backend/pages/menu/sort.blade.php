@extends('backend.layouts.master')

@section('fav_title', 'Edit Menu')

@section('styles')
<style type="text/css">
  table .form-control,
  table .form-control:active,
  table .form-control:hover,
  table .form-control:focus {
    border: none !important;
  }
  tbody.listitems td:last-child {
    padding: 0 !important;
  }
  table {
    border-collapse: inherit;
  }
</style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-laptop"></i> {{ __('backend/menu.menu_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-code-fork fa-lg fa-fw"></i> {{ __('backend/all.developer') }}</li>
    <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">{{ __('backend/menu.menu') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/default.edit') }}</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/menu.menu_sort') }}</h2></div>
          <div class="col-md-6"><a href="{{ route('admin.menu.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/menu.menu_list') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.error_message')
        <form action="{{ route('admin.menu.sort_update') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-7 mx-auto">
                <table class="table table-bordered br-4">
                  <thead>
                    <tr class="alert-secondary">
                      <th for="SL" class="">SL </th>
                      <th for="menu" class="w-75">Name </th>
                      <th for="order" class="">Order </th>
                    </tr>
                  </thead>
                  <tbody class="listitems autosort">
                    @foreach($menus as $menu)
                    <tr data-position="{{ $menu->order }}">
                      <td class="cursor-default" id="index"></td>
                      <td class="cursor-default">{{ $menu->menu }}</td>
                      <td style="background-image: linear-gradient(#eee, #fff, #fff, #eee);">
                        <input type="hidden" class="form-control avro_bn" name="id[]" id="id" value="{{ $menu->id }}" required>
                        <input type="text" class="form-control avro_bn" name="order[]" id="order" value="{{ $menu->order }}" required style="background: transparent;">
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <button type="submit" name="save_menu" class="btn btn-success float-right">{{ __('backend/default.submit') }}</button>
            </div>
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
    $('#parent_id').select2();
    $(".listitems").each(function(){
      $(this).html($(this).children('tr').sort(function(a, b){
        return ($(b).data('position')) < ($(a).data('position')) ? 1 : -1;
      }));
    });
    var ind = 0;
    $('tbody #index').each(function() {
      ind = ind +1;
      $(this).prepend("<span>" + ind + "</span>");
    });
  });
  
  $(function(){
    $('input[name=menu_bn]').avro({'bangla':true}, 
      /*function(isBangla){
      alert('Bangla enabled = ' + isBangla);
    }*/
    );
  });
</script>
@endsection
