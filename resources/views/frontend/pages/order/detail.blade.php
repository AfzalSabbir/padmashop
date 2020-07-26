@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
<style>
    tr td{
        border-top: 1px dashed #e1e1e1 !important;
    }
    tr:last-child{
        border-bottom: 1px dashed #e1e1e1 !important;
    }
</style>
@endsection

@section('content')
<div class="container pb-5 pt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                   <user-order-items
                        :order_id="2"
                    >
                    </user-order-items> 
                </div>
            </div>
            
            <div class="col-md-5">
                <div class="row">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Order Details<span class="ditted float-right">#{{ $order->id }}</span></h4>
                        </div>
                        <div class="card-body">
                            <table class="table mb-0 table-borderless">
                                <tr>
                                    <td>Order Received</td>
                                    <td class="text-right">{{ $order->updated_at }}</td>
                                </tr>
                                <tr class="{{ $order->is_paid == 1 ? 'bg-success text-white' : 'bg-warning' }}">
                                    <td>Payment {{ $order->is_paid == 0 ? 'is pending' : ''}}</td>
                                    <td class="text-right"><i class="fa {{ $order->is_paid == 1 ? 'fa-check text-white' : '' }}"></i></td>
                                </tr>
                                <tr>
                                    <td>Payment Gateway</td>
                                    <td class="text-right">{{ $order->payment_gateway ? $order->payment_gateway->title : "Not Selected" }}</td>
                                </tr>
                                <tr>
                                    <td>TxnId</td>
                                    <td class="text-right">{{ $order->txnid }}</td>
                                </tr>
                                <tr>
                                    @php
                                        if($order->order_status == 0){
                                            $status = 'Pending';
                                        }else if($order->order_status == 1){
                                            $status = 'Received';
                                        }else if($order->order_status == 2){
                                            $status = 'Procesing';
                                        }else if($order->order_status == 3){
                                            $status = 'On the Way';
                                        }else if($order->order_status == 4){
                                            $status = 'Received';
                                        }
                                    @endphp
                                    <td>Order Status</td>
                                    <td class="text-right">{{ $status }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td class="text-right">{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="text-right">{{ $order->grand_total }}</td>
                                </tr>
                            </table>
                        </div>
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
