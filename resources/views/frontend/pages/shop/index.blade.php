@extends('frontend.layouts.master')

@section('title', 'Shop')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
<style>
    .product_grid {
        background: #fff;
        padding: 15px;
    }
    .____middle_cart___ {
        display: flex;
        width: 100%;
        background: rgba(0,0,0,0.5);
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        color: #fff !important;
        line-height: 32px;
        font-size: 30px;
        /* padding: 115px 30px; */
        transition: all 400ms linear 0s;
        opacity: 0;
        pointer-events: none;
        cursor: pointer;
        justify-content: center;
        align-items: center;
    }
    .viewed_item:hover .____middle_cart___ {
        opacity: 1;
        pointer-events: auto;
    }
    .viewed_item .wishlist-btn, .cart-button {
        z-index: 3;
    }
    .viewed_item .wishlist-btn i {
        color: #11da3c; 
    }
    /* style By Abdullah All Ahsan */
    .btn-success:hover {
        color: #fff !important;
        background: #FF5A01 !important;
        border: 1px solid #FF5A01 !important;
    }
</style>
@endsection

@section('content')
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

        $category_ = request()->filled('category');
        $sub_category_ = request()->filled('sub_category');
        $brand_ = request()->filled('brand');
    @endphp
<div class="row">
    <div class="col-12 layout_2" id="isLoading">
        <!--this slider only for bagerhat bazar start-->
        @if(Request::is('bagerhat_bazar') && count($adv)>0)
        <div class="container" style="margin-top: 25px;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($adv as $key => $value)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ ($key==0) ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                
                <div class="carousel-inner">
                    @foreach($adv as $key => $value)
                        <div class="carousel-item {{ ($key==0) ? 'active' : '' }}">
                            <img class="d-block w-100" src="{{ asset($value->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        @endif
        <!--this slider only for bagerhat bazar end-->
        
            <div class="shop">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-3 w-100">
                                <h4 class="d-block category_head card-header cursor-pointer position-relative"><i class="fa fa-chevron-down position-absolute r-2 t-15 {{ $category_ ? '' : 'rotate_90'}}"></i> {{ __('frontend/default.category') }}</h4>
                                <ul class="list-group list-group-flush category_ul" style="{{ $category_ ? '' : 'display: none;'}}">
                                    @foreach($categories as $category)
                                    <li><a class="d-block text-secondary list-group-item py-2 shop_ {{ request()->category == $category->slug ? 'active_shop' : '' }}" href="{{ asset('/shop') }}?category={{ $category->slug }}">{{ ucfirst(Session::get('locale') == 'bn' ? ($category->title_bn == null ? $category->title_en : $category->title_bn) : $category->title_en) }}<small>({{ $category->count_product }})</small></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card mb-3 w-100" id="categories">
                                <h4 class="d-block sub_category_head card-header cursor-pointer position-relative"><i class="fa fa-chevron-down position-absolute r-2 t-15 {{ $sub_category_ ? '' : 'rotate_90'}}"></i> {{ __('frontend/default.sub_category') }}</h4>
                                <ul class="list-group list-group-flush sub_category_ul" style="{{ $sub_category_ ? '' : 'display: none;'}}">
                                    @foreach($sub_categories as $sub_category)
                                    <li><a class="d-block text-secondary list-group-item py-2 shop_ {{ request()->sub_category == $sub_category->slug ? 'active_shop' : '' }}" href="?sub_category={{ $sub_category->slug }}">{{ Session::get('locale') == 'bn' ? ($sub_category->title_bn == null ? $sub_category->title_en : $sub_category->title_bn) : $sub_category->title_en }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card mb-3 w-100">
                                <h4 class="d-block brand_head card-header cursor-pointer position-relative"><i class="fa fa-chevron-down position-absolute r-2 t-15 {{ $brand_ ? '' : 'rotate_90'}}"></i> {{ __('frontend/default.brand') }}</h4>
                                <ul class="list-group list-group-flush brand_ul" style="{{ $brand_ ? '' : 'display: none;'}}">
                                    @foreach($brands as $brand)
                                    <li><a class="d-block text-secondary list-group-item py-2 shop_ {{ request()->brand == $brand->slug ? 'active_shop' : '' }}" href="?brand={{ $brand->slug }}">{{ Session::get('locale') == 'bn' ? ($brand->title_bn == null ? $brand->title_en : $brand->title_bn) : $brand->title_en }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card mb-3 w-100">
                                <h4 class="d-block reating_head card-header cursor-pointer position-relative"> Rating</h4>
                                <ul class="list-group list-group-flush cursor-pointer">
                                    <li class="d-block text-secondary list-group-item text-success" onclick="getRatingProducts(1)"><i class="fas fa-star"></i></li>
                                    <li class="d-block text-secondary list-group-item text-success" onclick="getRatingProducts(2)">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </li>
                                    <li class="d-block text-secondary list-group-item text-success" onclick="getRatingProducts(3)">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </li>
                                    <li class="d-block text-secondary list-group-item text-success" onclick="getRatingProducts(4)">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </li>
                                    <li class="d-block text-secondary list-group-item text-success" onclick="getRatingProducts(5)">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <!-- Shop Content -->
                            <div class="product_grid">
                                @if(Request::is('bagerhat_bazar'))
                                    <h2 style="border-bottom: 1px solid #eee;padding-bottom: 10px;font-size: 20px;">Bagerhat Bazar</h2>
                                @endif
                                
                                <div class="row m-0">
                                    
                                    <!-- Product Item -->
                                    @foreach($products as $product)
                                        <div class="col-md-3 col-sm-4 col-6 p-0" title="{{ $product->title }}">
                                            <div class="viewed_item">
                                                {{-- <div class="wishlist-btn">
                                                    <i title="Add to wishlist." class="fas fa-heart"></i>
                                                </div> --}}
                                                @if(Auth::check())
                                                    @php
                                                    if(\App\Models\WishList::where('product_id', $product->id)->first()){
                                                        $find = 'find';
                                                    }
                                                    else{
                                                        $find = 'not';
                                                    }
                                                    @endphp
                                                    <add-to-wish-list :style_wish="0" :product="{{ json_encode($product) }}" url="{{ url('/') }}" find="{{ $find }}"></add-to-wish-list>
                                                    @endif
                                                <a href="{{ asset('product/'.$product->slug) }}" tabindex="0" class="d-block">
                                                    <div class="viewed_image" style="margin:auto">
                                                        @php
                                                        $images = json_decode($product->image)
                                                        @endphp
                                                        <img src="{{ asset($images[0]) }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_name product_text text-truncate">
                                                            {{ $product->title }}
                                                        </div>
                                                        <div class="viewed_price">{{ $product->regular_price - (($product->regular_price * $product->discount) / 100).' TK' }} <span>{{ $product->regular_price.' TK' }}{{-- (($product->regular_price * $product->discount) / 100).' TK' --}}</span></div>
                                                    </div>


                                                    <ul class="item_marks d-none">
                                                        <li class="item_mark item_discount">{{ $product->discount }}</li>
                                                    </ul>
                                                </a>
                                                <add-to-cart :hover_product="2" :product="{{ json_encode($product) }}"></add-to-cart>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>

                            <!-- Shop Page Navigation -->

                            <div class="shop_page_nav {{ $total > 0 ? 'b-0':'mt-0' }}">
                                <div class="row">
                                    @include('frontend.partials.pagination', ['products' => $products])
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

<script src="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
<script>
    $(document).ready(function(){
        getRatingProducts = function(rating_value){
            window.location.href = "{{ url('/') }}"+'/'+'/product/rating_/'+rating_value;
        }
    });



   // console.log(Notification.permission);
   // if (Notification.permission === "granted") 
   // {
   //    alert("we have permission");
   // } else if (Notification.permission !== "denied") 
   // {
   //    Notification.requestPermission().then(permission => {
   //       console.log(permission);
   //    });
   // }

   // function showNotification() {
   //     const notification = new Notification("New message incoming", {
   //        body: "Hi there. How are you doing?"
   //     })
   //     console.log(notification);
   //  }
   //  showNotification();
</script>





@endsection
