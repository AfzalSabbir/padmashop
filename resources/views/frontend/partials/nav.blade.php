{{-- =====Wishlist Modal Start===== --}}
<div class="modal fade" id="wishlistModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('frontend/default.wishlist') }}{{-- Wishlist --}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="cart-box">
                    <wish-list 
                        url="{{ url('/') }}"
                        nothing_to_show="{{ __('frontend/default.nothing_to_show') }}"
                    > 
                    </wish-list>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- =====Wishlist Modal End==== --}}

<header class="header">
    <!-- Top Bar -->
    <div class="container">
        @php
            $checkedCodes = [];
            $thisDate = date('Y-m-d H:i:s');
            if(\Session::get('siteFlashe')) $checkedCodes = \Session::get('siteFlashe');

            // print_r(\Session::all());

            $where = [['date_from', '<=', $thisDate], ['date_to', '>=', $thisDate], ['type', 'flash']];

            $flashMessage = \App\Models\FlashMessage::where($where)
                ->whereNotIn('code', $checkedCodes)
                ->orderBy('id', 'desc')
                ->first();
        @endphp
        @if(!empty($flashMessage))
        <div class="row">
            <div class="col-12">
                <p class="alert alert-info alert-dismissible fade show rounded-0 pr-5 text-justify" role="alert">
                    {{ $flashMessage->body }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="flash_btn">
                        <span aria-hidden="true" class="text-danger cursor-pointer">&times;</span>
                    </button>
                </p>
            </div>
        </div>
        @endif
    </div>
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        <div class="top_bar_icon"><img src="{{ asset('public/front/images/phone.png') }}" alt=""> {{ __('frontend/default.help') }}: {{ $site_setting->mobile }}</div>
                    </div>
                    <div class="top_bar_contact_item hide-575">
                        <div class="top_bar_icon"><img src="{{ asset('public/front/images/mail.png') }}" alt=""></div>
                        <a class="cursor-pointer" data-toggle="tooltip" data-placement="right" title="Send Mail" onclick="location.href='mailto:{{ $site_setting->email }}';"><span
                            class="__cf_email__" data-cfemail="f19790828582909d9482b1969c90989ddf929e9c">{{ $site_setting->email }}</span></a>
                        </div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_user">

                                <div class="top_bar_content ml-auto">
                                    <div class="top_bar_user">
                                        <span class="mr-2">
                                            @if(Config::get('app.locale') == 'bn')
                                            <a href="{{ route('language', 'en') }}">
                                                <img src="{{ asset('public/images/flag/en.png') }}" class="mb-1" width="18" height="18">
                                                &nbsp;
                                                <span title="Click for english">English</span>
                                            </a>
                                            @else
                                            <a href="{{ route('language', 'bn') }}">
                                                <img src="{{ asset('public/images/flag/bn.png') }}" class="mb-1" width="18" height="18">
                                                &nbsp;
                                                <span title="বাংলার জন্য ক্লিক করুন">বাংলা</span>
                                            </a>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @if(Auth::check())
                                <div class="profile_hover cursor-default d-none">
                                    <div class="user_icon">
                                        <img src="{{ asset('public/front/images/user.svg') }}" alt="">
                                    </div>
                                    <div class="user_name">
                                        <span>{{ Auth::user()->name }}</span>
                                    </div>

                                    <div>
                                        <ul class="profile-dropdown">
                                            <li class="profile-dropdown-content cursor-pointer">
                                                <a href="{{ route('user.index',Auth::user()->username) }}">My Account</a>
                                            </li>
                                            {{-- <li class="profile-dropdown-content cursor-pointer">
                                                <a href="#">My Order</a>
                                            </li>
                                            <li class="profile-dropdown-content cursor-pointer">
                                                <a href="#">My List</a>
                                            </li>
                                            <li class="profile-dropdown-content cursor-pointer">
                                                <a href="#">My Wishlist</a>
                                            </li>
                                            <li class="profile-dropdown-content cursor-pointer">
                                                <a href="#">Order Track</a>
                                            </li> --}}
                                            <li class="profile-dropdown-content cursor-pointer">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </ul>
                                        {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a> --}}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                @else
                                {{-- <div class="user_icon"><img src="{{ asset('public/front/images/user.svg') }}" alt=""></div>
                                <div class="sign_in"><a href="{{ route('register') }}">{{ __('frontend/default.register') }} {{ __('frontend/default.or_') }} {{ __('frontend/default.sign_in') }}</a></div> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
        $coupons = \App\Models\Coupon::where('status','1')->get();
        @endphp
        @if(count($coupons) > 0)
        <div class="container">
            <div class="position-relative border background mt-2 p-1">
                <div class="position-absolute p-1 h-100"
                style="font-family: 'Pacifico', cursive; left: 0; top: 0; background-color: #e1e1e1; z-index: 1;">
                {{ __('frontend/default.coupon') }}
            </div>
            <p class="marquee_ marquee">
                <b>
                    @foreach($coupons as $coupon)
                    <span class="mx-2 px-1 {{ $coupon->category == 0 ? 'span-a':'span-b' }}"><span style="font-weight: normal; color: #fff; "><i class="fas fa-ticket-alt text-warning"></i> {{ $coupon->category == 0 ? 'New User Coupon: ' :  'Pro User Coupon: ' }}</span> <span class="copy_btn text-white" data-clipboard-text="{{ $coupon->code }}" data-toggle="tooltip" data-placement="bottom" title="Click to copy tag">{{ $coupon->code }}</span></span>
                    @endforeach
                </b>
            </p>
        </div>
    </div>
    @endif

    @php
        $coupons = \App\Models\Coupon::where('status','1')->get();
    @endphp
    @if(count($coupons) > 0)
        <div class="container">
            <div class="position-relative border background mt-2 p-1">
                <div class="position-absolute p-1 h-100"
                    style="font-family: 'Pacifico', cursive; left: 0; top: 0; background-color: #e1e1e1; z-index: 1;">
                    Coupon
                </div>
                <p class="marquee_ marquee">
                    <b>
                        @foreach($coupons as $coupon)
                        <span class="mx-2 px-1 {{ $coupon->category == 0 ? 'span-a':'span-b' }}"><span style="font-weight: normal;"><i class="fas fa-ticket-alt text-white"></i> {{ $coupon->category == 0 ? 'New User Coupon: ' :  'Pro User Coupon: ' }}</span> <span class="copy_btn text-white" data-clipboard-text="{{ $coupon->code }}" data-toggle="tooltip" data-placement="bottom" title="Click to copy tag">{{ $coupon->code }}</span></span>
                        @endforeach
                    </b>
                </p>
            </div>
        </div>
    @endif
    <!-- Header Main -->
    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-lg-1 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{ route('index') }}" title="HOME"><img class="man_lazy __lololo" src="{{ asset('public/lazy_load.png') }}" data-src="{{ asset('public/images/settings/'.$site_setting->logo) }}"></a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-8 col-12 text-lg-left text-right order-lg-2 order-3">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <search 
                                    url="{{ url('/') }}"
                                    search_place="Search Your Favourite Product..." 
                                ></search>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-9 text-lg-left text-right order-lg-3 order-2">
                    
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <!-- App -->
                        <div>
                            <a href="{{asset('public/front/app/Padma_Shop.apk')}}" title="Download App" download="Padma Shop">
                                <i style="font-size: 35px; color: var(--secondary_color); margin-right: 44px;" class="fab fa-android tool_tip" title="Download App" data-toggle="tooltip" data-placement="top"></i>
                            </a>
                        </div>

                        <!-- Signin & Signup -->
                        @if(Auth::check())
                            <div class="profile_hover cursor-pointer">
                                <div class="user_icon">
                                    @if(is_null(Auth::user()->image))
                                        <img src="{{ asset('public/images/user.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset(Auth::user()->image) }}" alt="">
                                    @endif
                                </div>

                                <div>
                                    <ul class="profile-dropdown">
                                        <li class="profile-dropdown-content cursor-pointer profile_name">
                                            <a href="javascript:void(0)">
                                                <span style="text-transform: capitalize;">{{ Auth::user()->name }}</span></li>
                                            </a>
                                        <li class="profile-dropdown-content cursor-pointer">
                                            <a href="{{ route('user.index',Auth::user()->username) }}">{{ __('frontend/default.my_account') }}</a>
                                        </li>
                                        <li class="profile-dropdown-content cursor-pointer">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('frontend/default.logout') }}</a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            {{-- <div class="user_icon"><img src="{{ asset('public/front/images/user.svg') }}" alt=""></div> --}}
                            <div class="sign_in">
                                <a href="{{ route('login') }}" style="color: #333;font-weight: normal;">
                                    <span>Login</span>
                                </a>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <!-- <div class="container">
        <div class="me deactive__ l-0" style=" position: fixed; top:0; z-index: 9999; display: none;">
            <div class="bg-white me_here"></div>
            <div class="bg-default me_here_menu"></div>
        </div>
    </div> -->

    <!-- start -->
    @php
        $categories         = \App\Models\Category::where('status',1)->get();
        $categories_count   = $categories->count();
        $categories         = $categories->take(9);
    @endphp
    <div style="height: 56px;">
        <div class="container-fluid" id="nav_wrapper">
            <div class="row">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="cotegories_wraper">
                            <a class="man_categories_toggle" href="{{ asset('/shop') }}">
                                <i class="fa fa-bars"></i>&nbsp;{{ __('frontend/default.categories') }}&nbsp;&nbsp;
                            </a>
                            <ul class="man_categories">
                                @foreach($categories as $category)
                                <li>
                                    @php
                                        $subcategories = $category->subcategories;
                                    @endphp
                                    @if(count($subcategories) > 0 )
                                        <a href="javascript:void(0)">
                                            {{ ucfirst(Session::get('locale') == 'bn' ? ($category->title_bn == '' ? $category->title_en : $category->title_bn) : $category->title_en)}}
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>

                                            <!-------------------------------------------------- -->
                                            <div class="man_sub_dropdown">
                                            @foreach($subcategories as $subcategory)
                                                @php
                                                    $brands = $subcategory->brands;
                                                @endphp
                                                @if(count($brands) > 0)
                                                    <div class="sub_sub_dropdown_wrapper">
                                                        <a href="javascript:void(0)">
                                                          {{ $subcategory->title_en }}
                                                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                         
                                                        </a>
                                                        <!-- ----------------------------------------- -->
                                                        <div class="man_sub_sub_dropdown">
                                                            @foreach($brands as $brand)
                                                                <a href="{{ asset('shop?category='.$category->slug.'&sub_category='.$subcategory->slug.'&brand='.$brand->slug) }}" style="min-width: 200px;">
                                                                  {{ $brand->title_en }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                        <!-- ----------------------------------------- -->
                                                    </div>
                                                @else
                                                    <a href="{{ asset('shop?category='.$category->slug.'&sub_category='.$subcategory->slug) }}">
                                                      {{ $subcategory->title_en }} 
                                                    </a>
                                                @endif

                                            @endforeach
                                            </div>
                                         <!-------------------------------------------------- -->
                                        </a>
                                    @else
                                        <a href="{{ asset('shop?category='.$category->slug) }}">
                                            {{ ucfirst(Session::get('locale') == 'bn' ? ($category->title_bn == '' ? $category->title_en : $category->title_bn) : $category->title_en)}}
                                        </a>
                                    @endif
                                </li>
                                @endforeach

                                @if($categories_count > 9)
                                <li><a class="see_more" href="{{ asset('shop#categories') }}" style="color:var(--secondary_color)">See More...</a></li>
                                @endif
                            </ul>
                        </div>
                        <button class="navbar-toggler" id="navbarToggler" type="button" >
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">     
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('index') ? 'active':'' }}" href="{{ route('index') }}">{{ __("frontend/default.home") }} <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('shop') && !(array_key_exists('Gift', Request::all()) || array_key_exists('IscheBazar', Request::all()) || array_key_exists('author', Request::all())) ? 'active':'' }}" href="{{ route('shop') }}">{{ __("frontend/default.shop") }}</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <li><a href="{{ route('bagerhat_bazar') }}">{{ __('frontend/default.bagerhat_bazar') }}<i class="fas fa-chevron-down"></i></a></li> --}}
                                    <a class="nav-link {{ Route::is('bagerhat_bazar') && !(array_key_exists('Gift', Request::all()) || array_key_exists('IscheBazar', Request::all()) || array_key_exists('author', Request::all())) ? 'active':'' }}" href="{{ route('bagerhat_bazar') }}">{{ __("frontend/default.bagerhat_bazar") }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contact') ? 'active':'' }}" href="{{ route('contact') }}">{{ __("frontend/default.contact") }}</a>
                                </li>

                            </ul>
                        </div>
                    </nav>

                    <ul class="wish_cart avbar-nav mr-auto d-flex">
                        <!-- Wishlist -->
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end cursor-pointer" data-toggle="modal" data-target="#wishlistModalCenter">
                            <div class="wishlist_icon">
                                <i class="far fa-heart"></i>
                                <div class="cart_count">
                                    <span title="WishList">
                                        <total-wish></total-wish>
                                    </span>
                                </div>
                                <span class="hide-mobile">
                                    Wishlist
                                </span>
                            </div>
                        </div>

                        <!-- Cart -->
                        <div class="cart cursor-pointer ml-md-3" id="main">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end"  @click="cart">
                                <div id="cartAnimationEnd" class="cart_icon">
                                    <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                    <div class="cart_count">
                                        <span title="Cart" >
                                            <cart-count url="{{ url('/') }}"></cart-count>
                                        </span>
                                    </div>
                                    <span class="hide-mobile cart">
                                        Cart
                                    </span>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    
    <!-- Menu -->
    <div class="page_menu mt-0">
        <div class="container copy_me_menu">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input"
                                placeholder="{{ __('frontend/default.search_product') }}">
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="__fixed_side_nav">
    <a class="nav-link {{ Route::is('bagerhat_bazar') && !(array_key_exists('Gift', Request::all()) || array_key_exists('IscheBazar', Request::all()) || array_key_exists('author', Request::all())) ? 'active':'' }}" href="{{ route('bagerhat_bazar') }}">{{ __("frontend/default.bagerhat_bazar") }}</a>
    <a class="cartCount" href="{{ route('cart') }}"><span><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;</span>Cart-<cart-count></cart-count></a>
</div>
