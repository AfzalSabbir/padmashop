@extends('backend.layouts.master')

@section('fav_title', 'Product')

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
        <li class="breadcrumb-item active">{{ __('backend/product.product') }}</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/product.product') }}</h2></div>
                    <div class="col-md-6"><a href="{{ route('admin.product.create') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/product.add_product') }}</a></div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="card-body">
                @php
                $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
                ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
                $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
                @endphp

                @php
                    // Pagination Serial
                    if (request()->filled('page')){
                        $PreviousPageLastSN = $items*(request()->page-1); //PreviousPageLastSerialNumber
                        $PageNumber = request()->page;
                    }
                    else{
                        $PreviousPageLastSN = 0; //PreviousPageLastSerialNumber
                        $PageNumber = 1;
                    }

                    //Last Page Items Change Restriction
                    if ($PageNumber*$items > $total + $items){
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        die();
                    }
                    $paginateToRoute = \Route::current()->getName();
                @endphp

                @include('backend.partials.page_numbering', ['route' => $paginateToRoute])

                <div class="table-responsive">
                    <table {{-- id="datatable" --}} class="table table-bordered table-hover display">
                        <thead>
                            <th>{{ __('backend/default.sl') }}</th>
                            <th>{{ __('backend/product.title') }}</th>
                            <th>
                                &#9679;{{ __('backend/product.purchase_price') }}
                                <br>
                                &#9679;{{ __('backend/product.regular_price') }}
                            </th>
                            <th>{{ __('backend/default.price') }}<sup><small> Discount</sup></small></th>
                            <th style="min-width: 180px">
                                &#9679;{{ __('backend/category.category') }}
                                <br>
                                &#9679;{{ __('backend/subcategory.subcategory') }}
                                <br>
                                &#9679;{{ __('backend/brand.brand') }}
                            </th>
                            <th>{{ __('backend/product.quantity') }}</th>
                            <th>
                                &#9679;{{ __('backend/default.offer') }}
                                <br>
                                &#9679;{{ __('backend/default.status') }}
                                <br>
                                &#9679;<code class="text-nowrap">({{ __('backend/default.marchent') }})</code>
                            </th>
                            <th class="action text-center">{{ __('backend/default.action') }}</th>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr class="{{ $product->status == 0 ? 'deactive_':'' }}">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    &#9679;&nbsp;{{ $product->purchase_price }}
                                    <br>
                                    &#9679;&nbsp;{{ $product->regular_price }}</td>
                                <td><span class="text-success">{!! $product->regular_price - $product->regular_price * $product->discount / 100 .'&nbsp;৳' !!}</span><sup class="text-danger"> {{ $product->discount .'%' }}</sup></td>
                                <td>
                                    &#9679;&nbsp;{{ $product->category_id ? $product->category->title_en : 'N/A' }}
                                    <br>
                                    &#9679;&nbsp;{{ $product->sub_category_id ? $product->sub_category->title_en : 'N/A' }}
                                    <br>
                                    &#9679;&nbsp;{{ $product->brand_id ? $product->brand->title_en : 'N/A' }}
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td class="text-center">
                                    <i class="{{ $product->is_offer == 1 ? 'fa fa-star text-info' : 'fa fa-star text-light' }}"></i>
                                    <br>
                                    {{ $product->status == 1 ? 'Visible' : 'Invisible' }}
                                    <br>
                                    <code class="text-nowrap">({{ $product->admin_id ? $product->admin->username : 'N/A' }})</code>
                                </td>
                                <td class="action text-center">
                                    <div class="btn-group">
                                        @foreach($permissions->submenus as $key => $permission)
                                            @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                                                @if($key == 0)
                                                    <a href="{{route($permission->route, $product->slug)}}" class="btn btn-info"><i class="fa fa-repeat" title="Recover your data..."></i></a>
                                                @endif
                                                @if($key == 1)
                                                    {{-- <a href="{{route($permission->route, $product->id)}}" class="btn btn-info"><i class="fa fa-repeat" title="Delete your data..."></i></a> --}}
                                                    <button class="btn {{ $product->status == 0 ? 'btn-secondary disabled':' btn-danger' }}" onClick="deleteMethod({{ json_encode($product->id) }})" role="button" {{ $product->status == 0? 'disabled':'' }}><i class="fa fa-trash"></i></button>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('backend.partials.pagination', ['table' => $products])
            </div>
        </div>
    </div>
</div>
@endsection

