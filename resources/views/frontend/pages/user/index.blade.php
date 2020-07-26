@extends('frontend.layouts.master')

@section('title', ucwords(Auth::user()->name))

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
<style>
    .order-b {
        border: 1px solid #ddd;
    }
    .order-b p {
        font-size: 11px;
        width: 100% !important;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12 layout_2" id="isLoading">
        <user-panel :auth="{{ Auth::user() }}"></user-panel>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#my-orders').click(function(){
            $('.hide_me').hide();
        });
        $('#my-profile').click(function(){
            $('.hide_me').show();
        });
    });
    $(document).ready(function(){
        $("ul.nav a.nav-link").click(function(){
            $("ul.nav").find(".active").removeClass("active");
            $(this).addClass("active");
            //if ($(this).attr('id') == 'my-orders') {
                $('.'+$(this).attr('id')).removeClass("d-none");
                $('.'+$(this).attr('id')).siblings().addClass("d-none");
            //}
        });  
    });
</script>
@endsection
