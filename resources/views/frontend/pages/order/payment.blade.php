@extends('frontend.layouts.master')

@section('title', 'Payment')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
@endsection

@section('content')
<div class="container pb-5 pt-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Payment</h3>
                    </div>
                    <div class="card-body">
                        <form class="" action="#" method="post">
                            <div class="form-group">
                                <label for="payment">Payment Method</label>
                                <input type="text" class="form-control" name="payment_method" id="payment" disabled>
                            </div>
                            <div class="form-group">
                                <label for="transaction">Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_id" id="transaction" placeholder="Transaction ID">
                            </div>

                            <div class="button-group">
                                <input name="confirm" id="" class="btn btn-primary float-right" type="submit" value="Confirm Order">
                            </div>
                        </form>
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
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right">314 Tk</td>
                            </tr>
                            <tr>
                                <td>shipping</td>
                                <td class="text-right">40 Tk</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-right">354 Tk</td>
                            </tr>
                            <tr>
                                <td>Payable Total</td>
                                <td class="text-right">354 Tk</td>
                            </tr>
                        </table>

                        <h4>Your Address</h4>
                        <table class="table">
                            <tr>
                                <td width="150">Name</td>
                                <td class="text-right">S. M. Sujan</td>
                            </tr>
                            <tr>
                                <td>Shipping Address</td>
                                <td class="text-right">22, Cornation Road, Sankipara, Mymensingh.</td>
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