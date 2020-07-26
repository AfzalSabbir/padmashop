@extends('backend.layouts.master')

@section('fav_title', 'Language')

@section('styles')
<style>
	.invoice {
		width: 150px;
		background: #ddd;
		text-align: center;
		padding: 1rem;
	}
	.border-btom {
		padding-bottom: 8px;
		margin-bottom: 20px;
		width: 170px;
		border-bottom: 1px solid #000 !important;
	}
	.border-btom2 {
		padding-bottom: 8px;
		margin-top: 40px;
		width: 250px;
		border-bottom: 1px solid #000 !important;
	}
	.inv-head {
		font-weight: 600;
	}
	#table {
		width: 100%;
	}
	#table tr th, #table tr td {
		padding: 5px 0px;
	}
</style>
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-shopping-basket"></i> {{ __('backend/order.order_management') }}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i>
            <a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('admin.order.pending') }}">{{ $order->order_status < 4 ? __('backend/order.pending_order') : __('backend/order.completed_order') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('backend/order.order').' #'.$order->id }}</li>
    </ul>
</div>
{{-- ==Create Tag== --}}
<div class="container mb-3">
	<div class="card">
		<div class="col-md-12">
			<div class="row my-4">
				<div class="col-md-6">
					<h2 class="invoice">Invoice</h2>
				</div>
				<div class="col-md-6">
					<img class="float-right" src="" alt="Your Logo">
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<h5 class="border-btom">Invoice Detail</h5>
					<label><span class="inv-head">Issue Date :&emsp;</span><span>10-12-19</span></label><br>
					<label><span class="inv-head">Invoice No :&emsp;</span><span>10121901</span></label><br>
				</div>
				<div class="col-md-4">
					<h5 class="border-btom">Invoice To</h5>
					<label class="inv-head">Jhon Rick</label><br>
					<label>22 cornation road, sankipara<br>Mymensingh</label><br>
					<label><span class="inv-head">Phone :&emsp;</span><span>+880 1402 005516</span></label><br>
					<label><span class="inv-head">Email :&emsp;</span><span>sadif50@outlook.com</span></label><br>
				</div>
				<div class="col-md-4">
					<h5 class="mb-4">22, Cornation Road, Sankipara<br>Mymensingh, BD.</h5>
					<label><span class="inv-head">Mobile :&emsp;</span><span>+880 1700 000000</span></label><br>
					<label><span class="inv-head">Email :&emsp;</span><span>info@freelanceitlab.com</span></label><br>
					<label><span class="inv-head">Website :&emsp;</span><span>https://freelanceitlab.com</span></label><br>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="mt-5 mb-2">
				<table class="table table-striped table-bordered">
					<tr>
						<th>{{ __('backend/default.sl') }}</th>
						<th>{{ __('backend/product.product') }}</th>
						<th>{{ __('backend/default.quantity') }}</th>
						<th>{{ __('backend/default.price') }}<small>(per unit)</small></th>
						<th>{{ __('backend/default.price') }}</th>
					</tr>
					@foreach($order->order_items as $item)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $item->product->title }}</td>
						<td>{{ $item->quantity }}</td>
						<td>{{ $item->price }}</td>
						<td>{{ $item->price * $item->quantity }}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-7">
					<h5 class="border-btom2">PAYMENT METHODS</h5>
					<label><span class="inv-head">Payment Method :&emsp;</span><span>Bkash</span></label><br>
					<label><span class="inv-head">Order Number :&emsp;</span><span>#10121901</span></label><br>
				</div>
				<div class="col-md-4">
					<table id="table">
						<tr>
							<th class="text-center">Subtotal:</th>
							<td class="text-center">$160.00</td>
						</tr>
						<tr>
							<th class="text-center">Taxes:</th>
							<td class="text-center">0.00%</td>
						</tr>
						<tr>
							<th class="text-center">Discount:</th>
							<td class="text-center">10.00%</td>
						</tr>
						<tr class="bg-primary">
							<th class="text-center text-white">Total:</th>
							<td class="text-center text-white">$144.00</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row my-5">
				<div class="col-md-3 text-center">
					<br>
					<br>
					<hr class="m-0">
					Customer Signature
				</div>
				<div class="col-md-6">
					<h4 class="text-center">Thank You For Shopping With Us !</h4>
				</div>
				<div class="col-md-3 text-center">
					<br>
					<br>
					<hr class="m-0">
					Director Signature
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
@endsection
