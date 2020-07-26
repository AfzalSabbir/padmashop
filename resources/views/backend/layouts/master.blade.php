<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  
  <link rel="icon" type="image/png" sizes="16x16" href="">

  <!-- Document Title -->
  @php
  $site_setting = \App\Models\Setting::first();
  @endphp
  <title>{{ ucwords($site_setting->title) }} - @yield('fav_title')</title>
  <link rel="icon" href="{!!  asset('public/images/settings/'.$site_setting->favicon)  !!}" type="image/gif" sizes="16x16"> 
  {{-- <link href="https://fonts.googleapis.com/css?family=Pacifico|Chango" rel="stylesheet"> --}}
  {{-- <title>Ecom - @yield('fav_title')</title> --}}

  @include('backend.partials.styles')

  <style>
    .preloader {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     z-index: 9999;
     background-image: "{{ asset('public/5.gif')  }}";
     background-repeat: no-repeat; 
     background-color: #FFF;
     background-position: center;
   }
 </style>

 @section('styles')
 @show

</head>

<body class="app sidebar-mini rtl">

  {{-- <div class="preloader"></div> --}}

  @include('backend.partials.nav')

  @include('backend.partials.sidebar')

  <div id="main-wrapper">
    @include('backend.partials.message')
    <main class="app-content" id="app">

      <init :auth_id="{{ Auth::guard('admin')->user()->id }}" domain="{{ url('/') }}"></init>

      @section('content')
      @show

    </main>

  </div>

  @include('backend.partials.scripts')

  @section('scripts')
  @show

  
</body>
</html>