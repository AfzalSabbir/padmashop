@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
<style>

</style>
@endsection

@section('content')
<div class="container pb-5 pt-5">
    <div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Shipping Address</h3>
                    </div>
                    
                    @php
                        $user_district = [
                            "id" => (Auth::user()->district->id ? Auth::user()->district->id : "N/A"),
                            "name" => (Auth::user()->district->name ? Auth::user()->district->name : "N/A")
                        ];
                        $user_upazilla = [
                            "id" => (Auth::user()->upazilla->id ? Auth::user()->upazilla->id : "N/A"),
                            "name" => (Auth::user()->upazilla->name ? Auth::user()->upazilla->name : "N/A")
                        ];
                    @endphp
                    <div class="card-body">
                        <payment
                            :districts="{{ $districts }}"
                            :payment_gateway="{{ $payment_gateway }}"
                            :order_id="{{ $created_order->id }}"
                            :user_id="{{ Auth::id() }}"
                            :order_total="{{ $created_order->total_price }}"
                            :shipping_cost="{{ Auth::user()->upazilla->shipping_cost }}"
                            :user="{{ Auth::user() }}"
                            :user_upazilla="{{ json_encode($user_upazilla) }}"
                            :user_district="{{ json_encode($user_district) }}"
                            >
                        </payment>
                    </div>
                </div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Checkout Summary</h3>
                    </div>
                    <div class="card-body">
                        <h4>Payment Details</h4>
                        <table class="table">
                            <order-info
                                :total_price="{{ $created_order->total_price }}"
                                :shipping_cost="{{ Auth::user()->upazilla->shipping_cost }}">
                            </order-info>
{{--                            <tr>--}}
{{--                                <td>Subtotal</td>--}}
{{--                                <td class="text-right">{{ $created_order->total_price }} TK</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Shipping</td>--}}
{{--                                <td class="text-right">{{ Auth::user()->upazilla->shipping_cost }} TK</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>Total</td>--}}
{{--                                <td class="text-right">{{ $created_order->total_price + $created_order->upazilla->shipping_cost }} Tk</td>--}}
{{--                            </tr>--}}
                        </table>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3>User Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td class="text-right">{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td class="text-right">{{ Auth::user()->mobile }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-right">{{ Auth::user()->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/front/js/custom.js') }}" type="b85f535929402f07d7a62e20-text/javascript"></script>
@endsection
