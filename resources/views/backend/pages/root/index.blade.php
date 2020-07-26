@extends('backend.layouts.master')

@section('fav_title', __('backend/default.root') )

@section('styles')
<!-- google font link here -->
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Heebo:300,400,700,900" rel="stylesheet">
<link src="{{ asset('public/backend/css/material_input.css') }}" rel="stylesheet">

<style type="text/css">
	{{--
	only for "/root/index.blade.php"
	--}}
	input::-webkit-input-placeholder {
		color: #eee !important;
	}
	input:focus::-webkit-input-placeholder {
		color: #aaa !important;
	}
	/* Firefox > 19 */
	input::-moz-placeholder {
		color: #eee !important;
	}
	input:focus::-moz-placeholder {
		color: #aaa !important;
	}
	/* Internet Explorer 10 */
	input:-ms-input-placeholder {
		color: #eee !important;
	}
	input:focus:-ms-input-placeholder {
		color: #aaa !important;
	}
	kbd {
		padding: 0 2px;
	}
</style>
<style type="text/css">
	*, *:after, *:before {padding: 0; margin: 0;}

	.matarial_form {
		max-width: 960px;
		width: 100%;
		margin: 50px auto;
		box-sizing: border-box;
		font-family: 'Heebo', sans-serif;
	}
	.matarial_form .form_blog {
		width: 100%;
		display: block;
		padding: 15px;
		box-sizing: border-box;
	}
	.matarial_form .form_row {
		position: relative;
		overflow: hidden;
		padding-top: 15px;
	}
	.matarial_form .form_row .form_input {
		display: block;
		width: 96.5%;
		margin: 10px 0;
		font-size: 18px;
		padding: 0 15px;
		line-height: 35px;
		border-radius: 4px;
		border: 2px solid #BDBDBD;
		background-color: rgba(0, 0, 0, 0)
	}
	.matarial_form .form_row .form_input:focus {border: 2px solid #009688 !important;}
	.matarial_form .form_row .form_input:required {border-left: 2px solid #ff1744 !important;}
	.matarial_form .form_row label {
		position: absolute;
		font-size: 18px;
		top: 32px;
		left: 15px;
		color: #BDBDBD;
		transition: all 0.3s ease-in-out;
		/* z-index: -1; */
	}
	.matarial_form label {
		cursor: text;
	}
	.matarial_form .form_row label.text_none {top: 0;font-size: 15px;color: #009688;}
	.matarial_form .submit, .matarial_form .reset {
		border: 1px solid transparent;
		padding: 10px 25px;
		float: right;
		margin: 15px 0;
		font-weight: 700;
		font-size: 18px;
	}
	.matarial_form .submit {background: #388E3C;color: #fff;}
	.matarial_form .reset {margin-right: 15px;background: #e53935;color: #fff;}
	.matarial_form .submit:focus, .matarial_form .reset:focus {box-shadow: 0px 1px 8px 1px #37474F;}
</style>
@endsection
@section('content')
<div class="app-title">
	<div>
		<h1 class="shortKey_container"><i class="fa fa-free-code-camp"></i> {{ __('backend/default.root_management') }} <code class="shortKey_" style="display: none;"><sup>[<small><kbd>ctrl</kbd>+<kbd>alt</kbd>+<kbd>Shift</kbd>+<kbd>r</kbd></small>]</sup></code></h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-code-fork fa-lg"></i> {{ __('backend/default.developer') }}</li>
		<li class="breadcrumb-item">{{ __('backend/default.root') }}</li>
		<li class="breadcrumb-item active">{{ __('backend/default.add') }}</li>
	</ul>
</div>
{{-- ==Create Tag== --}}
<div class="row mb-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"><h2><i class="fa fa-plus-square"></i> {{ __('backend/default.add_file') }}</h2></div>
					<div class="col-md-6">
						<div class="btn-group float-right">
							<a class="btn btn-info " href="{{ route('admin.menu.create') }}"><i class="fa fa-laptop"></i><i class="fa fa-arrow-right text-slash text-sm-center"></i><i class="fa fa-plus"></i></a>
							<a class="btn btn-primary" href="{{ route('admin.language.index') }}"><i class="fa fa-globe"></i></a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="card-body">

				<form onkeypress="return event.keyCode != 13;" action="{{ route('admin.root.create') }}" method="post">
					@csrf
					<div class="container-fluid">
						<div class="row">

							@if (Session::has('root_done_'))

							@php
							$migrations = glob("./database/migrations/*.php");
							$start = strlen('./database/migrations/');
							//dd($migrations, substr($migrations[sizeof($migrations)-1], $start));
							$created = Session::get('root_done_');
							$type_ = Session::get('type_');
							$controller__ = Session::get('controller__');
							$migration__ = Session::get('migration__');
							$tab = '<span style="margin-left: 16px;"></span>';
							//$tab = '&nbsp;&nbsp;&nbsp;&nbsp;';
							//$created_s = str_plural(strtolower(preg_replace("/[\s+]/", "_", $created)));
							$created_s = substr($migrations[sizeof($migrations)-1], $start);
							$CreateD = preg_replace("/[\s+]/", "", ucwords(preg_replace("/[\-_]/", " ",  $created)));
							@endphp
							<div class="col-lg-12">
								<div id="created_" class="alert alert-success alert-dismissible fade show position-relative" role="alert">
									<h3 class="text-center"><code><span class="text-secondary">Copy from below and paste it in "</span>web.php<span class="text-secondary">"</span></code></h3>
									@if($controller__ == 'no' )
									<span style="display: block;" class="text-center alert alert-info">run: <kbd>php artisan make:controller Backend\{{ $CreateD }}Controller</kbd></span>
									@endif
									@if($migration__ == 'yes' )
									<span style="display: block;" class="text-center alert alert-info">Migration created successfully!!!<br>Check in <code>database/migrations</code> for <kbd class="bg-success">{{ $created_s }}</kbd></span>
									@endif
									<hr>
									<i class="fa fa-clipboard r-4 position-absolute text-secondary clipboard_" style="display: none; font-size: x-large;" aria-hidden="true"></i>
									<p class="right-side-header cursor-copy alert alert-secondary" title="Click to Copy Text" id="text_" onclick="copyElementText(this.id)">
										<tt>
											@include('backend.pages.root.route')
										</tt>
									</p>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
							@if($controller__ == 'yes' )
							<div class="col-lg-12 text_2-container">
								<div id="created_" class="alert alert-success alert-dismissible fade show position-relative" role="alert">
									<h3 class="text-center"><code><span class="text-secondary">Copy from below and paste it in "</span><code>Backend\{{ $CreateD }}Controller.php</code><span class="text-secondary">"</span></code></h3>

									<span style="display: block;" class="text-center alert alert-info">Check in <code>Controllers\Backend</code> for <kbd class="bg-success">{{ $CreateD }}Controller.php</kbd><br>run: <kbd>php artisan make:model Models\{{ str_singular($CreateD) }}</kbd> <i class="text-info" style="font-size: smaller;"><br>[Note: Model Name Must be Singular]</i></span>
									<hr>
									<i class="fa fa-clipboard r-4 position-absolute text-secondary clipboard_2" style="display: none; font-size: x-large;" aria-hidden="true"></i>
									<p class="right-side-header cursor-copy alert alert-secondary" title="Click to Copy Text" id="text_2" onclick="copyElementText(this.id)">
										<tt>
											@include('backend.pages.root.controller')
										</tt>
									</p>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
							@endif
							@endif
							<div class="col-lg-8 form-group">

								{{-- <div class="matarial_form">
									<form action="" method="">
										<fieldset class="form_blog">
											<legend><h2>Contact Form With Matarials</h2></legend>

											<div class="form_row">
												<label class="" for="">First Name</label>
												<input class="form_input" type="text" name="" value=" " step="any" required>
											</div>
											<div class="form_row">
												<label class="" for="">Middle Name</label>
												<input class="form_input" type="text" name="" value="" step="any">
											</div>
											<div class="form_row">
												<label class="" for="">Last Name</label>
												<input class="form_input" type="text" name="" value="" step="any">
											</div>

											<div class="form_row">
												<label class="" for="">Full Name</label>
												<input class="form_input" type="text" name="" value="" step="any">
											</div>
											
											<div class="form_row">
												<label class="" for="">Mobile No.</label>
												<input class="form_input" type="text" name="" value="" step="any">
											</div>
											
											<div class="form_row">
												<label class="" for="">Email No.</label>
												<input class="form_input" type="email" name="" value="" step="any">
											</div>
											
											<div class="form_row">
												<label class="" for="">Address</label>
												<textarea class="form_input" name="" id="" rows="5"></textarea>
											</div>

											<input type="submit" class="submit" value="Save" name="sub">
											<input type="reset" class="reset" value="Clear" name="clear">
										</fieldset>
										
									</form>
								</div> --}}
								<div class="row">

									<div class="col-lg-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form">File Folder Name</label>
										<input required class="form-control fileDirectory" type="text" name="fileDirectory" placeholder="views/backend/pages/[folderName]">
									</div>
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form bg-done">File Type</label>
										<select required class="form-control fileType" name="fileType">
											<option value="oneClickAll">Index, Add & Edit</option>
											<option value="oneClickAllWithView">Index, Add, Edit & View</option>
											<option value="modal">Modal</option>
											<option value="index">Index</option>
											<option value="add">Add</option>
											<option value="edit">Edit</option>
											<option value="view">View</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form bg-done">Make Controller</label>
										<select required class="form-control makeController" name="makeController">
											<option value="no">No</option>
											<option value="yes">Yes</option>
										</select>
									</div>

									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form bg-done">Make Migration</label>
										<select required class="form-control makeMigration" name="makeMigration">
											<option value="no">No</option>
											<option value="yes">Yes</option>
										</select>
									</div>
								</div>
								<div class="row">

									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form">File Name</label>
										<input required class="form-control fileName" type="text" name="fileName" placeholder="[fileName].blade.php" disabled>
									</div>

									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form">Language Folder Name</label>
										<input required class="form-control" type="text" name="langFolderDirectory" placeholder="lang/(bn/en)/[folderName]" value="backend">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form">Side Menu Icon</label>
										<input required class="form-control fafaOfSideMenu" type="text" name="fafaOfSideMenu" placeholder="[fa fa-#iconName#]">
									</div>
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form">Card Header Icon</label>
										<input required class="form-control fafaCardHeader" type="text" name="fafaCardHeader" placeholder="[fa fa-#iconName#]" disabled>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form auto_done">Management Name</label>
										<input required class="form-control tagManagement" type="text" name="tagManagement" placeholder="[fileName Management]">
									</div>
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form auto_done">Route of Dashboard</label>
										<input required class="form-control" type="text" name="dashboardRoute" placeholder="[dashboardRoute]" value="admin.home" readonly="">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form auto_done">Route of Index File</label>
										<input required class="form-control indexFileRoute" type="text" name="indexFileRoute" placeholder="Route of [indexFile]">
									</div>
									<div class="col-md-6 position-relative mt-5">
										<label class="col-form-label position-absolute root_form auto_done">Route of Add New Button</label>
										<input required class="form-control addNewButtonRoute" type="text" name="addNewButtonRoute" placeholder="Route of [addNewButtonRoute] Button">
									</div>
								</div>
								<button id="save_file" type="submit" class="btn btn-success px-4 float-right ml-3 mt-2">Create</button>
							</div>
							<div class="col-lg-4 pt-4 pb-3">
								@include('backend.pages.root.descriptions')
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('public/backend/js/material_input.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$('.form_row label').click(function(){
			$(this).next().focus();
		});

		$('#detail_container').html($('.description_container').html());
		$('input, select').blur(function() {
			if ($(this).val() !== '') {
				$(this).siblings().addClass('bg-done');
			}
			$('#detail_container').html($('.description_container').html());
		});
		$('.fileDirectory').blur(function() {
			$('.fileDirectory').val($('.fileDirectory').val().toLowerCase().replace(/ /g, '_'))
		});
		$('input, select').focus(function() {
			//$('.description_container').fadeOut();
			$('#detail_container').html($('.description_'+$(this).attr('name')).html());
			$(this).keyup(function(){

				if ($(this).attr('name') == 'fileDirectory') {
					$('.fileDirectoryText').text($(this).val().replace(/ /g, '_').replace(/-/g, '_'));
					$('.getFileName').text($(this).val().toLowerCase().replace(/-/g, ' ').replace(/_/g, ' ').replace(/\b[a-z]/g, function(letter) {
						return letter.toUpperCase();
					}).replace(/ /g, ''));
					$('.getFileName_').text($(this).val().toLowerCase().replace(/-/g, ' ').replace(/_/g, ' ').plural());

				} else if ($(this).attr('name') == 'langFolderDirectory') {
					$('.langFolderDirectory').text($(this).val());
				} else if ($(this).attr('name') == 'tagManagement') {
					$('.tagManagement_').text($(this).val());
				}

			});
			if ($(this).attr('name') == 'tagManagement') {
				$('.fafa-fafaOfSideMenu').addClass($('.fafaOfSideMenu').val());
			} else if ($(this).attr('name') == 'fileDirectory') {
				$(this).on('change', function() {
					if ($(this).val().length > 0) {
						// ucwords()
						var str_ = $('.fileDirectory').val().toLowerCase();
						var str = str_+' management';
						str = str.replace(/-/g, ' ').replace(/_/g, ' ');
						str = str.replace(/\b[a-z]/g, function(letter) {
							return letter.toUpperCase();
						});

						$('.tagManagement').val(str);
						$('.indexFileRoute').val('admin.'+str_.replace(/ /g,"_")+'.index');
						$('.addNewButtonRoute').val('admin.'+str_.replace(/ /g,"_")+'.add');
						$('.fileDirectoryText').text(str_).replace(/ /g,"_").replace(/-/g,"_");
						$('.auto_done').addClass('bg-done');

					}
				});
			}
		});
		$('.fileType').on('change', function() {
			if ($('.fileType').find(":selected").val() == 'oneClickAll' || $('.fileType').find(":selected").val() == 'oneClickAllWithView') {
				$('.fileName').attr('disabled','disabled').val('');
				$('.fafaCardHeader').attr('disabled','disabled').val('');
			} else {
				$('.fileName').removeAttr('disabled');
				$('.fafaCardHeader').removeAttr('disabled');				
			}

			// Helping
			if ($('.fileType').find(":selected").val() == 'index' || $('.fileType').find(":selected").val() == 'model') {
				$('.fileName').val('index');
				$('.fafaCardHeader').val('fa fa-table');

			} else if ($('.fileType').find(":selected").val() == 'add') {
				$('.fileName').val($('.fileType').find(":selected").val());
				$('.fafaCardHeader').val('fa fa-plus-square');

			} else if ($('.fileType').find(":selected").val() == 'edit') {
				$('.fileName').val($('.fileType').find(":selected").val());
				$('.fafaCardHeader').val('fa fa-pencil-square');

			} else if ($('.fileType').find(":selected").val() == 'view') {
				$('.fileName').val($('.fileType').find(":selected").val());
				$('.fafaCardHeader').val('fa fa-eye');

			}
		});
		//Copy Text
		$('#text_').hover(function() {
			$('.clipboard_').fadeIn();
		}, function() {
			$('.clipboard_').fadeOut();
		});
		$('#text_').click(function() {
			$('.clipboard_').removeClass('fa-clipboard text-secondary').addClass('fa-check text-success');
			$(this).attr('title', 'Text Copied');
		});
		//Copy Text
		$('#text_2').hover(function() {
			$('.clipboard_2').fadeIn();
		}, function() {
			$('.clipboard_2').fadeOut();
		});
		$('#text_2').click(function() {
			$('.clipboard_2').removeClass('fa-clipboard text-secondary').addClass('fa-check text-success');
			$(this).attr('title', 'Text Copied');
		});
	});
	function copyElementText(id) {
		var text = document.getElementById(id).innerText;
		var elem = document.createElement("textarea");
		document.body.appendChild(elem);
		elem.value = text;
		elem.select();
		document.execCommand("copy");
		document.body.removeChild(elem);
	}
</script>
@endsection
