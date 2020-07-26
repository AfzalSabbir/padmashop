@extends('frontend.layouts.master')

@section('title', 'Cart')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/cart_responsive.css') }}">
<style>
    .cart_bg {
        background: #fff;
        box-shadow: 1px 1px 5px 1px #ddd;
        padding: 15px;
    }
</style>
@endsection

@section('content')
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container cart_bg">
                    <div class="cart_title">My Cart</div>
                    <my-cart></my-cart>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
@endsection
