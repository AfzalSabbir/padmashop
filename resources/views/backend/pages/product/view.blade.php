@extends('backend.layouts.master')

@section('fav_title', 'View Product')

@section('styles')
<style>
    .action{
        min-width: 70px;
    }
    .table th, .table td{
        vertical-align: middle;
    }
</style>
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-archive"></i> {{ __('backend/product.product_management') }}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{ __('backend/product.product') }}</a></li>
        <li class="breadcrumb-item active">{{ __('backend/default.details') }}</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>{{-- <i class="fa fa-table">{{ __('backend/product.product') }}</i> --}}<img src="{{ asset($product->image[0]) }}" height="30px">{{ $product->title }}</h2></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered display table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Title: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->title }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Photo<small><sub>(s)</sub></small>: </strong>
                                        </td>
                                        <td>
                                            @foreach($product->image as $image)
                                            <img class="monospace-inconsolata" style="width: 200px;" src="{{ asset($image) }}">
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Category: </strong> 
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->category_id ? $product->category->title_en : 'N/A' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Sub-Category: </strong> 
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->sub_category_id ? $product->sub_category->title_en : 'N/A' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Brand: </strong> 
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->brand_id ? $product->brand->title_en : 'N/A' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Delivery: </strong> 
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->delivery }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Return: </strong> 
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->product_return }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Warranty: </strong> 
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->warranty }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Purchase Price: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->purchase_price }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Regular Price: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->regular_price }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Discount: </strong>
                                        </td>
                                        <td data-toggle="tooltip" data-placement="left" title="{{ $product->discount.'% Discount' }}">
                                            <span class="monospace-inconsolata">{{ $product->discount.'% ' }}
                                                <small>
                                                    @if($product->discount_time)
                                                        (Untill {{ date("d-M-Y", strtotime($product->discount_time)) }})
                                                    @endif
                                                </small>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Min Sales Quantity: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->min_sale_quantity }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Sale Price: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->regular_price - $product->regular_price * $product->discount / 100 }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Description: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{!! $product->description !!}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Quantity: </strong>
                                        </td>
                                        <td>
                                            <span class="monospace-inconsolata">{{ $product->quantity }}</span>
                                        </td>
                                    </tr>
                                {{-- <tr>
                                    <td>
                                        <strong>Discount Time: </strong>
                                    </td>
                                    <td>
                                        <span class="monospace-inconsolata">{{ $product->discount_time }}</span>
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td>
                                        <strong>Hit Count: </strong>
                                    </td>
                                    <td>
                                        <span class="monospace-inconsolata">{{ $product->hit_count }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Total Sale: </strong>
                                    </td>
                                    <td>
                                        <span class="monospace-inconsolata">{{ $product->total_sale }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Status: </strong>
                                    </td>
                                    <td>
                                        <span class="monospace-inconsolata">{{ $product->status == 1 ? 'Active' : 'Deactive' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Bagerhat Area: </strong>
                                    </td>
                                    <td>
                                        <span class="monospace-inconsolata">{{ $product->product_area ? ucfirst($product->product_area) : "General" }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
