@extends('backend.layouts.master')

@section('fav_title', 'Language')

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
		<h1><i class="fa fa-globe"></i> {{ __('backend/all.language_management') }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-code-fork fa-lg"></i> {{ __('backend/all.developer') }}</li>
		<li class="breadcrumb-item">{{ __('backend/all.language') }}</li>
	</ul>
</div>


{{-- ==Files Name Loading== --}}
@php

for ($i=0; $i < 2; $i++) {
	if ($i == 0) {
		$place = 'backend';
	} else {
		$place = 'frontend';
	}
	$dir = 'resources/lang/bn/'.$place.'/';
	$files = glob($dir.'*php');
	$bn = array();
	foreach($files as $key => $file) {
		$bn[$key] = substr($file, strlen($dir), -4);
	}
	$dir = 'resources/lang/en/'.$place.'/';
	$files = glob($dir.'*php');
	$en = array();
	foreach($files as $key => $file) {
		$en[$key] = substr($file, strlen($dir), -4);
	}
	
	if ($i == 0) {
		$backend = array_intersect($bn,$en);
	} else {
		$frontend = array_intersect($bn,$en);
	}
}
@endphp
{{-- ==Create Tag== --}}
<div class="row mb-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-plus-square"></i>&nbsp;{{ __('backend/all.add_name') }}</h2></div>
					<div class="col-md-6"></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card-body">
				<form onkeypress="return event.keyCode != 13;" action="{{ route('admin.language.insert') }}" method="post">
					@csrf
					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label">Tag :</label>
							<input required="" class="form-control" type="text" name="tag">
						</div>
						<div class="col-md-3">
							<label class="col-form-label">For :</label>
							<select required="" class="form-control add_place" name="place">
								<option value="backend">Backend</option>
								<option value="frontend">Frontend</option>
							</select>
						</div>
						<div class="col-md-3">
							<label class="col-form-label">File :</label>
							<select required="" class="form-control file_name" name="name">

								<!-- <option class="back_hide" disabled="" selected="">--Select File--</option> -->

								@foreach($frontend as $front)
								<option class="front_hide" value="{{ $front }}">Frontend / {{ $front }}.php</option>
								@endforeach

								@foreach($backend as $back)
								<option class="back_hide" value="{{ $back }}">Backend / {{ $back }}.php</option>
								@endforeach

							</select>
							<br>
							<span class="alert_front_back" style="color: red;">Select Backend/*.php</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label">Bangla :</label>
							<input required="" class="form-control avro_bn" type="text" name="bn">
						</div>
						<div class="col-md-6">
							<label class="col-form-label">English :</label>
							<input required="" class="form-control en_reform" type="text" name="en">
						</div>
					</div>
					<button id="save_tag" class="btn btn-success px-4 float-right" type="submit">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- ==Create File== --}}
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-file-code-o"></i>&nbsp;{{ __('backend/all.add_file') }}</h2></div>
					<div class="col-md-6"></div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card-body">
				<form onkeypress="return event.keyCode != 13;" action="{{ route('admin.language.create') }}" method="post">
					@csrf
					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-form-label">For :</label>
							<select required="" class="form-control place" name="place">
								<option value="backend">Backend</option>
								<option value="frontend">Frontend</option>
							</select>
						</div>

						<div class="col-md-6">
							<label class="col-form-label">File Name :</label>
							<input required="" class="file_name_ form-control" type="text" name="name" placeholder="Exm.: file_name_only">
						</div>

						{{-- ==Hidden For Checking== --}}
						<div class="col-md-6 d-none">
							<label class="col-form-label">For :</label>
							<select class="form-control file_names_back" name="file_names_back">
								<option selected="" disabled="">Select file Name</option>
								@foreach($backend as $back)
								<option value="{{ $back }}">Backend/{{ $back }}.php</option>
								@endforeach
							</select>
							<select class="form-control file_names_front" name="file_names_front">
								<option selected="" disabled="">Select file Name</option>
								@foreach($frontend as $front)
								<option value="{{ $front }}">Frontend/{{ $front }}.php</option>
								@endforeach
							</select>
						</div>
					</div>
					<button id="save_file" class="btn btn-success px-4 float-right" type="submit">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript" charset="utf-8">

	$(function(){
		$('input[name=bn]').avro({
			'bangla':true
		});
	});


	$(document).ready(function() {

		$('.file_name').select2(); //Select2
		
		//Warning to select directory Backend/Frontend
		$('.add_place').on('change', function() {
			//$('span.alert_front_back').text('Select '+$('.add_place').find(":selected").text()+'/*.php');
			if ($('span.alert_front_back').text().match(/Frontend/g) && $('.file_name').find(":selected").text().match(/Frontend/g)){
				$('span.alert_front_back').text('Select '+$('.add_place').find(":selected").text()+'/*.php');
				$('span.alert_front_back').css({'color':'red'});
				$('#save_tag').attr({'disabled':'disabled'});
			}else if ($('span.alert_front_back').text().match(/Backend/g) && $('.file_name').find(":selected").text().match(/Backend/g)){
				$('span.alert_front_back').text('Select '+$('.add_place').find(":selected").text()+'/*.php');
				$('span.alert_front_back').css({'color':'red'});
				$('#save_tag').attr({'disabled':'disabled'});
			} else {
				$('span.alert_front_back').text('Select '+$('.add_place').find(":selected").text()+'/*.php');
				$('span.alert_front_back').css({'color':'green'});
				$('#save_tag').removeAttr('disabled');
			}
		});
		//Confirming the direction Backend/Frontend
		$('.file_name').on('change', function() {
			if ($('span.alert_front_back').text().match(/Frontend/g) && $('.file_name').find(":selected").text().match(/Frontend/g)){
				$('span.alert_front_back').css({'color':'green'});
				$('#save_tag').removeAttr('disabled');
			}else if ($('span.alert_front_back').text().match(/Backend/g) && $('.file_name').find(":selected").text().match(/Backend/g)){
				$('span.alert_front_back').css({'color':'green'});
				$('#save_tag').removeAttr('disabled');
			} else {
				$('span.alert_front_back').css({'color':'red'});
				$('#save_tag').attr({'disabled':'disabled'});
			}
		});
		//English Name Re-Formeing
		$('.en_reform').blur(function() {
			var str = $('.en_reform').val();
			str = str.replace(/-/g, ' ').replace(/_/g, ' ').toLowerCase();
			str = str.replace(/\b[a-z]/g, function(letter) {
				return letter.toUpperCase();
			});
			$('.en_reform').val(str);
		});

		//File Existence Checking
		var optionValues_back = [];
		$('.file_names_back option').each(function() {
			optionValues_back.push($(this).val());
		});
		var optionValues_front = [];
		$('.file_names_front option').each(function() {
			optionValues_front.push($(this).val());
		});
		//New File Suggession
		$('.file_name_').blur(function() {
			var str = $('.file_name_').val();
			str = str.replace(/-/g, '_').replace(/\s+/g, '_').toLowerCase();
			$('.file_name_').val(str);

			if(jQuery.inArray($('.file_name_').val(), optionValues_back) !== -1 && $('.place').find(":selected").text() == 'Backend')
			{
				$('.file_name_').val($('.file_name_').val()+'_');
				$('#save_file').attr({'disabled':'disabled'});
				alert('"'+str+'" exists in backend directory');
			} else if(jQuery.inArray($('.file_name_').val(), optionValues_front) !== -1 && $('.place').find(":selected").text() == 'Frontend')
			{
				$('.file_name_').val($('.file_name_').val()+'_');
				$('#save_file').attr({'disabled':'disabled'});
				alert('"'+str+'" exists in frontend directory');
			} else {
				$('#save_file').removeAttr('disabled');
			}
		});
	});


</script>
@endsection
