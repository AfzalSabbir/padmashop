@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
<style>

</style>
@endsection

@section('content')
    
<div class="col-12" id="isLoading">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Shipping Address</h3>
                    </div>
                    
                    @php
                        $user_district = [
                            "id" => (Auth::user()->district ? Auth::user()->district->id : ""),
                            "name" => (Auth::user()->district ? Auth::user()->district->name : "")
                        ];
                        $user_upazilla = [
                            "id" => (Auth::user()->upazilla ? Auth::user()->upazilla->id : ""),
                            "name" => (Auth::user()->upazilla ? Auth::user()->upazilla->name : "")
                        ];
                    @endphp
                    <div class="card-body">
                        <payment-submit
                            :districts="{{ $districts }}"
                            :payment_gateway="{{ $payment_gateway }}"
                            {{-- :order_id="{{ $created_order->id }}" --}}
                            :user_id="{{ Auth::id() }}"
                            :order_total="{{ $subtotal }}"
                            :shipping_cost="{{ Auth::user()->upazilla ? Auth::user()->upazilla->shipping_cost : floatval(0.00) }}"
                            :user="{{ Auth::user() }}"
                            :user_upazilla="{{ json_encode($user_upazilla) }}"
                            :user_district="{{ json_encode($user_district) }}"
                        >
                        </payment-submit>
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
                                :total_price="{{ $subtotal }}"
                                :shipping_cost="{{ Auth::user()->upazilla ? Auth::user()->upazilla->shipping_cost : floatval(0.00) }}">
                            </order-info>
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
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/front/js/custom.js') }}" type="b85f535929402f07d7a62e20-text/javascript"></script>
@endsection
