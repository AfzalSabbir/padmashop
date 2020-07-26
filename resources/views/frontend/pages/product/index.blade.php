@extends('frontend.layouts.master')

@section('title', 'Product')

@php
    $getImage = json_decode($product->original_image);
    $getColor = json_decode($product->color_id);
    $getSize = json_decode($product->size_id);
@endphp

@section('metas')
    <meta property="og:url"                content="{{ Request::fullUrl() }}" />
    <meta property="og:type"               content="Product" />
    <meta property="og:title"              content="{{ $product->title }}" />
    <meta property="og:description"        content="{{ trim(strip_tags($product->description)) }}" />
    <meta property="og:image"              content="{{ asset($getImage[0]) }}" />
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/rating/awesomeRating.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .totalRating {
            
        }
        .totalRating li {
            display: inline;
        }
        .clearfix {
            clear:both;
        }

        .text-center {text-align:center;}

        a {
            color: tomato;
            text-decoration: none;
        }

        a:hover {
            background: #FF5A01;
            color: #EEE;
        }

        pre {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #F5F5F5;
            border: 1px solid #CCC;
            border-radius: 4px;
        }

        .header_s {
            padding: 6px 0;
            position: relative;
            margin: 10px 0;
            
        }

        .header_s:after {
            content:"";
            display:block;
            height:1px;
            /*background:#eee;*/
            position:absolute; 
            left:30%; right:30%;
        }

        .header_s h2 {
            font-size:3em;
            font-weight:300;
            margin-bottom:0.2em;
        }

        .header_s p {
            font-size:14px;
        }
        #a-footer {
            margin: 20px 0;
        }

        .new-react-version {
            padding: 20px 20px;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
            
            text-align: center;
            font-size: 14px;
            line-height: 1.7;
        }

        .new-react-version .react-svg-logo {
            text-align: center;
            max-width: 60px;
            margin: 20px auto;
            margin-top: 0;
        }





        .success-box {
            margin:50px 0;
            padding:10px 10px;
            border:1px solid #eee;
            background:#f9f9f9;
        }

        .success-box img {
            margin-right:10px;
            display:inline-block;
            vertical-align:top;
        }

        .success-box > div {
            vertical-align:top;
            display:inline-block;
            color:#888;
        }


        /* / Rating Star Widgets Style / */
        .rating-stars ul {
            list-style-type:none;
            padding:0;
            
            -moz-user-select:none;
            -webkit-user-select:none;
        }
        .rating-stars ul > li.star {
            display:inline-block;
        
        }

        /* / Idle State of the stars / */
        .rating-stars ul > li.star > i.fa {
            font-size:18px; /* Change the size of the stars */
            color:#ccc; /* Color on idle state */
        }

        /* / Hover state of the stars / */
        .rating-stars ul > li.star.hover > i.fa {
            color:#FFCC36;
        }

        /* / Selected state of the stars / */
        .rating-stars ul > li.star.selected > i.fa {
            color:#FF912C;
        }
        /* ============show star rating============ */

        .stars-outer {
            display: inline-block;
            position: relative;
            font-family: FontAwesome;
        }
            
        .stars-outer::before {
            content: "\f006 \f006 \f006 \f006 \f006";
        }
            
        .stars-inner {
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
        }
            
        .stars-inner::before {
            content: "\f005 \f005 \f005 \f005 \f005";
            color: #f8ce0b;
        }
        .image_list {
            display: flex;
        }
        .myBtn {
            width: 100%;
            border-radius: 0;
            padding: 5px 8px;
            font-size: .81rem;
            color: #fff;
            margin-top: 4px;
            background: #FF912C;
            border: 0;
            text-transform: uppercase;
            font-size: 14px;
            line-height: 1.5;
        }
        @media (max-width: 992px){
            .mobile-fix {
                position: fixed;
                bottom: 42px;
                left: 30px;
                right: 30px;
                z-index: 1;
            }
            .sm-p {
                padding: 0;
            }
        }
        .offer_box {
            background: #deece0;
            padding: 15px;
            color: #4c4c4c;
            height: 325px;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-12 layout_2" id="isLoading">
        <div class="single_product">
            <div class="container">
                <div class="row" style="background: #fff; margin: 0; padding: 30px 20px;">

                        <increment-count :product_id="{{ $product->id }}"></increment-count>

                        <!-- Selected Image -->
                        <div class="col-sm-3 order-lg-2 order-1">
                            <div class="image_selected">
                                <img id="myimage" src="{{ asset($getImage[0]) }}" alt="">
                            </div>
                            <div id="myresult" class="img-zoom-result"></div>
                            <ul class="image_list mt-3">
                                @foreach($getImage as $key => $image)
                                <li data-image="{{ asset($image) }}"><img class="img-fluid" src="{{ asset($image) }}" alt=""></li>
                                @endforeach
                            </ul>
                            <div class="clearfix">
                                <div style="display: flex; align-items: center; ">
                                    <div>
                                        <!-- Load Facebook SDK for JavaScript -->
                                    <div id="fb-root"></div>
                                    <!-- Your share button code -->
                                    <div class="fb-share-button" 
                                        data-href="http://nurshop2u.com/product/mini-wristband-bracelet-micro-usb-cable-charger-charging-data-syn" 
                                        data-layout="button_count">
                                    </div>
                                    </div>
                                
                                    <div style="margin: 8px 0 0 15px">
                                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 order-3">
                            <div class="product_description">
                                {{-- {{ dd($product) }} --}}
                                <div class="mb-3"><h3>{{ $product->title}}</h3></div>
                                <div class="product_price mb-3">
                                    <label class="mb-0" for="">Tk.</label>
                                    @if($product->discount)
                                        @php
                                            $productPrice =  (($product->regular_price*$product->discount)/100);
                                            echo  $price = ($product->regular_price - $productPrice);
                                            echo '<del style="margin-left: 10px;font-size: 15px;color: gray;">'.ceil($product->regular_price).'</del>';
                                        @endphp
                                    @else
                                        ৳ {{ $product->sale_price }}
                                    @endif
                                    <small class="text-success" style="font-size: 12px;">({{ $product->discount }}% Off)</small>
                                </div>
                                <div class="row align-items-md-end">
                                    <div class="col-12">
                                        <div class="mb-2" style="font-size: 14.5px"><span style="font-size: 16px">Category: </span>{{ $product->category_title }}</div>
                                        <div class="mb-2" style="font-size: 14.5px"><span style="font-size: 16px">Sub Category: </span>{{ $product->sub_category_title}}</div>
                                        <div class="mb-2" style="font-size: 14.5px"><span style="font-size: 16px">Brand: </span>{{ $product->brand_title}}</div>
                                        

                                        @php
                                            $my_rating = 0;

                                            $this_ratings = \App\Models\ProductRating::where('product_id', $product->id)->get();
                                            if($this_ratings->sum('rate_value') > 0){
                                                $rating = $this_ratings->sum('rate_value')/$this_ratings->count('rate_value');
                                            }else{
                                                $rating = 0;
                                            }

                                            if(Auth::check()){
                                                $my_rating = \App\Models\ProductRating::where('product_id', $product->id)->where('user_id', Auth::guard('web')->user()->id)->first();
                                                if ($my_rating){
                                                    $my_rating = $my_rating->rate_value;
                                                } else {
                                                    $my_rating = 0;
                                                }
                                            }
                                        @endphp


                                        <table class="mb-2">
                                            <tr>
                                                <td>
                                                    <div class="stars-outer">
                                                        <div class="stars-inner" id="stars-inner"></div>
                                                    </div>
                                                </td>
                                                {{-- {{ $rating }} --}}
                                                <td>
                                                    (<strong>{{ $rating }}</strong> out of 5)<span>&nbsp;&nbsp;&nbsp;{{ $this_ratings->count('rate_value') }}</span>&nbsp;Ratings
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <header class='header_s pt-0'>
                                            <h4>Rate This Product</h4>
                                        </header>
                                        <section class='rating-widget'>
                                            <!-- Rating Stars Box -->
                                            <div class='rating-stars'>
                                                <ul id='stars'>
                                                    <li class='star {{ $my_rating >= 1 ? "selected" : ""}}' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw give_rate'></i>
                                                    </li>
                                                    <li class='star {{ $my_rating >= 2 ? "selected" : ""}}' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw give_rate'></i>
                                                    </li>
                                                    <li class='star {{ $my_rating >= 3 ? "selected" : ""}}' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw give_rate'></i>
                                                    </li>
                                                    <li class='star {{ $my_rating >= 4 ? "selected" : ""}}' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw give_rate'></i>
                                                    </li>
                                                    <li class='star {{ $my_rating >= 5 ? "selected" : ""}}' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw give_rate'></i>
                                                    </li>
                                                    <li class="mb-2">
                                                        @if(Auth::check())
                                                            <button class="btn_custom d-none" onclick="submitRating()">{{ __("frontend/default.submit") }}</button>
                                                        @else
                                                            <a href="{{ asset('register?product='.$product->slug) }}">Login For Rate this</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div> 
                                        </section>
                                    </div>
                                </div>
                                <div class="row mobile-fix">
                                    {{-- <div class="col-6 sm-p">
                                        <add-to-cart :hover_product="0" :product="{{ json_encode($product) }}"></add-to-cart>
                                    </div> --}}
                                    <div class="col-6 sm-p">
                                        {{-- <button class="myBtn"><i class="fas fa-heart"></i>&nbsp;Add To Wishlist</button> --}}
                                        @if(Auth::check())
                                            @php
                                                if(\App\Models\WishList::where('product_id', $product->id)->where('user_mac', Auth::user()->id)->first()){
                                                    $find = 'find';
                                                }
                                                else{
                                                    $find = 'not';
                                                }
                                            @endphp

                                            <add-to-wish-list-single
                                                :style_wish="0"
                                                :product="{{ json_encode($product) }}"
                                                url="{{ url('/') }}"
                                                find="{{ $find }}"
                                            ></add-to-wish-list-single>

                                        @else
                                            <a class="myBtn btn" style="box-shadow:0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" href="{{ asset('register?product='.$product->slug) }}">
                                                <i class="fas fa-heart"></i>&nbsp;{{ __("frontend/default.add_to_wishlist") }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 order-3">
                            <div class="offer_box">
                                <ul>
                                    <li class="mt-2 text-right"><strong>Delivery Time :</strong><br>{{ $product->delivery }}</li>
                                    <!--<li class="mt-2 text-right"><strong>Minimum Order :</strong><br>200 TK</li>-->
                                    <li class="mt-2 text-right"><strong>Return :</strong><br>{{ $product->product_return }}</li>
                                    <li class="mt-2 text-right"><strong>Warranty :</strong><br>{{ $product->warranty }}</li>
                                    <li class="mt-2 text-right"><strong>Product End Time :</strong><br>{{ $product->discount_time }}</li>
                                    <li class="mt-2 text-right"><strong>Offer :</strong><br>{{ $product->is_offer == 1 ? "Offer available ✔" : "Offer not available ❌" }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 order-5 pt-4">
                            <h3>Product Specification & Summary</h3>
                            <hr>
                            <div style="text-align: justify;" id="product_description"> {!! $product->description !!} </div>
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <div class="col-12">
                            <div class="container-fluid">
                                @if(Auth::check())
                                <div class="row">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <img src="{{ Auth::user()->image != '' ? asset(Auth::user()->image) : asset('public/images/user.jpg') }}" alt="" class="float-left img-thumbnail border-0 mr-2 mb-2" style="width: 66px;">
                                            <h1 class="text-monospace mt-0" style="font-size: 25px; line-height: 40px;">{{ Auth::user()->name }}</h1>
                                            <form class="form-horizontal" action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $product->slug }}" name="product_slug">
                                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                                <textarea name="review" class="form-control" placeholder="Enter your review" rows="3"></textarea>
                                                <button type="submit" class="btn btn-success float-right mt-2">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="card w-100 alert-warning">
                                        <p class="text-center p-4"><a href="{{ asset('/login?product='.$product->slug) }}">Login to review</a></p>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    @foreach($reviews as $review)
                                        <div class="w-100">
                                            <div class="card p-4 mt-2">
                                                <div class="">
                                                    <img src="{{ $review->user->image != '' ? asset($review->user->image) : asset('public/images/user.jpg') }}" alt="" height="40" class="float-left mr-2">
                                                    <h1 class="float-left" style="font-size: 18px;">
                                                        <span>{{ ucwords($review->user->name) }}</span><br>
                                                        <span class="float-left" style="font-size: xx-small;">{{ $review->created_at->diffForHumans() }}</span><br>
                                                    </h1>
                                                </div>
                                                <article class="text-justify" style="font-size: 14px;">
                                                    {!! $review->review !!}
                                                </article>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('frontend.pages.product.suggession') --}}
    @endsection

    @section('scripts')
    <script src="{{ asset('public/front/js/product_custom.js') }}"></script>
    <script src="{{ asset('public/css/rating/awesomeRating.min.js') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');

    </script>
    {{-- <script>
        window.onload = function() {
            document.getElementById("search-form").onsubmit = function() {
                loadXMLDoc('file.xml');
                return false;
            };
        };
    </script> --}}
    <script>
        $(document).ready(function(){

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });
                
            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });
        
        
            /* 2. Action to perform on click */
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');
                
                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }
                
                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }
                
                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                // var msg = "";
                // if (ratingValue > 1) {
                //     msg = "Thanks! You rated this " + ratingValue + " stars.";
                // }
                // else {
                //     msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                // }
                // responseMessage(msg);

                if(ratingValue > 0){
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/') }}" + '/product/rating/'+ratingValue+'/'+"{{ $product->id }}",
                        success: function( msg ) {
                            console.log(msg);
                            toastr.success('Rated Successfully');
                            location.reload();
                        }
                    });
                }
                
            });

            // $('.give_rate').on('click', function(event) {
            //     submitRating();
            // });
        });

        function responseMessage(msg) {
            // $('.success-box').fadeIn(200);  
            // $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }

        // function submitRating(){
        //     var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

        //     if(ratingValue > 0){
        //         $.ajax({
        //             type: "GET",
        //             url: "{{ url('/') }}" + '/product/rating/'+ratingValue+'/'+"{{ $product->id }}",
        //             success: function( msg ) {
        //                 console.log(msg);
        //                 toastr.success('Rated Successfully');
        //                 location.reload();
        //             }
        //         });
        //     }
        // }
    </script>
    <script>
        var element_num = "{{ $rating }}";
        var starTotal = 5;
        var starPercentage = (element_num/starTotal)*100+"%";
        // var starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
        
        $(document).ready(function(){
            $(".stars-inner").css({
                "width": starPercentage
            });
        });
    </script>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    @endsection
