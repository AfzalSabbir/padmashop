<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @section('metas')
  @show
    
  <!-- Document Title -->
  @php
  $site_setting = \App\Models\Setting::first();
  @endphp
  <title>{{ ucwords($site_setting->title) }} - @yield('title')</title>
  <link href="https://fonts.googleapis.com/css?family=Pacifico|Chango" rel="stylesheet">
  <link rel="icon" href="{!!  asset('public/images/settings/'.$site_setting->favicon)  !!}" type="image/gif" sizes="16x16"> 
  
  @include('frontend.partials.styles')
  <style type="text/css">
    .a {
      position: relative;
    }
  </style>

  <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  @section('styles')
  @show

  <script src="{{ asset('public/front/js/jquery-3.3.1.min.js') }}"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script type="text/javascript">
   toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "1000",
    "extendedTimeOut": "2000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>

</head>

<body>
  <div class="super_container" id="app">
    @if(Auth::check())
    <front-init front_url="{{ url('/') }}" :auth="{{ Auth::user() }}"></front-init>
    @else
    <front-init front_url="{{ url('/') }}"></front-init>
    @endif
    <!-- Header -->

    @include('frontend.partials.nav')
    @section('content')
    @show

    @if(request()->segment(count(request()->segments())) != 'login-form')

    <!-- Footer -->
    @include('frontend.partials.footer')
    @endif
  </div>

  @include('frontend.partials.scripts')

</body>
</html>
