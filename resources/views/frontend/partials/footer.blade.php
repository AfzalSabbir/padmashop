

<div id="layout_2" :class="layout_2">
    <div id="cartWrapper"  v-if="cartBtn">
        <div class="position-relative">
            {{-- ======== Cart Sidebar Start ========= --}}
            <div class="col-xs-12 sidenav-1 pt-0 mt-3 mr-3">
                <h4 class="text-center py-2 alert-secondary"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;{{ __('frontend/default.my_cart') }}</h4>
                <a href="javascript:void(0)" title="Close" class="closebtn" @click="cart">&times;</a>
                <hr class="m-0">
                <div class="cart-box fade_me">
                    <cart 
                        url="{{ url('/')  }}"
                        nothing_to="{{ __('frontend/default.nothingTo') }}"
                        view_all="{{ __('frontend/default.view_all') }}"
                    ></cart>
                </div>
            </div>
            {{-- =====Cart Sidebar End===== --}}
        </div>
    </div>
</div>
    <!-- Newsletter -->
    <!-- home page window.load(); Large modal html here -->
    <div class="container_">
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="btn_close">
                        <a id="close"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <img class="img-thumbnail" src="{{ asset('public/images/settings/'.$site_setting->offer) }}" alt="Photo Not Found">
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter" id="subscribers">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if(session()->get('subscriber_message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('subscriber_message') }}</strong>
                        </div>
                    @endif

                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{ asset('public/front/images/send.png') }}" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>&nbsp;</p></div>
                        </div>
                        <div class="newsletter_content clearfix ml-25">
                            <form method="post" action="{{ route('admin.subscriber.store') }}" class="newsletter_form">
                                @csrf
                                <input type="text" autocomplete="off" name="email" class="form-control newsletter_input" placeholder="Enter Your Email Address/Phone Number here" required>
                                <input type="submit" value="{{ __('frontend/default.subscribe') }}" class="newsletter_button">
                            </form>
                            {{-- <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                <button class="newsletter_button">Subscribe</button>
                            </form> --}}
                            <!--<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gradient_footer"></div>


<img id="cartInimaItem" src="" alt="">
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            @php
                $top_three_sale = DB::table('order_items')
                                    ->where('status', 1)
                                    ->where('status','!=', 9)
                                    ->select(/*DB::raw('count(*) as product_total'), */'product_id')
                                    ->groupBy('product_id')
                                    ->get()
                                    ->toArray();
                                    // dd($top_three_sale);
                rsort($top_three_sale); 
                
                $top_three_sale = array_slice($top_three_sale, 0 ,3);

                if(count($top_three_sale) == 3){
                    $top3 = DB::table('products')
                                    ->where('status', 1)
                                    ->where('status', '!=', 9)
                                    ->where('id', $top_three_sale[0]->product_id)
                                    ->orWhere('id', $top_three_sale[1]->product_id)
                                    ->orWhere('id', $top_three_sale[2]->product_id)
                                    ->get();
                } else {
                    $top3 = [];
                }
                
                $last_three_products = DB::table('products')
                                    ->orderBy('id', 'desc')
                                    ->where('status', 1)
                                    ->where('status','!=', 9)
                                    ->take(3)
                                    ->get()
                                    ->toArray();
            @endphp
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer_col mb-3">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">{{ $site_setting->title }}</a></div>
                    </div>
                    <div class="footer_info_text">
                        <div class="footer_title">
                            <p>Got Question? Contacted Us 24/7</p>
                        </div>
                        <div class="footer_phone">
                            <p><span><i class="fa fa-phone"></i></span>{{ $site_setting->mobile }}</p>
                        </div>
                        <div class="footer_email">
                            <p><span><i class="fa fa-envelope"></i></span>{{ $site_setting->email }}</p>
                        </div>
                        <div class="footer_contact_text">
                            <p><span>{!! nl2br($site_setting->address) !!}</span></p>
                        </div>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a target="_blank" href="{{ $site_setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{ $site_setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ $site_setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a target="_blank" href="{{ $site_setting->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <div class="footer_column">
                    <h3>Important Link</h3>
                    <div class="col-sm-12 r-box">
                        <ul class="important_link">
                            <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('shipping') }}">Shipping Policy</a></li>
                            <li><a href="{{ route('payment') }}">Payment Policy</a></li>
                            <li><a href="{{ route('sitemape') }}">Site Mape</a></li>
                            <li><a href="{{ route('contact') }}">Contact US</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <div class="footer_column">
                    <h3> {{ __('frontend/default.popular_products') }} </h3>
                    <div class="col-sm-12 r-box">
                        @foreach($top3 as $key => $top)
                            <a href="{{ asset('/product/'.$top->slug) }}">
                                <div class="row r-product">
                                    <div class="col-2 px-0 my-auto">
                                        <img class="man_lazy img-fluid" src="{{ asset('public/lazyload.svg') }}" data-src="{{ asset(json_decode($top->image)[0]) }}" alt="{{ $top->title }}">
                                    </div>
                                    <div class="col-10 text-left pl-2">
                                        <span title="{{ $top->title }}" class="footer_prodect_text d-block text-truncate">{{ $top->title }}</span>
                                        <span class="d-block font-weight-bold">Tk. {{ $top->regular_price }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <div class="footer_column">
                    <h3>Recent Product</h3>
                    <div class="col-sm-12 r-box">
                        @foreach($last_three_products as $key => $last)
                            <a href="{{ asset('/product/'.$last->slug) }}">
                                <div class="row r-product">
                                    <div class="col-2 px-0 my-auto">
                                        <img class="man_lazy img-fluid" src="{{ asset("public/lazyload.svg") }}" data-src="{{ asset(json_decode($last->image)[0]) }}" alt="{{ $last->title }}">
                                    </div>
                                    <div class="col-10 text-left pl-2">
                                        <span title="{{ $last->title }}" class="footer_prodect_text d-block text-truncate">{{ $last->title }}</span>
                                        <span class="d-block font-weight-bold">Tk. {{ $last->regular_price }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <div class="footer_column">
                    <div class="logo_container">
                        <div class="logo text-center"><a href="{{ route('index') }}" title="HOME"><img class="man_lazy" src="{{ asset('public/lazyload.svg') }}" data-src="{{ asset('public/images/settings/'.$site_setting->logo) }}" height="85px" width="85px" class="rounded-circle"></a></div>
                    </div>
                    <p class="block-ellipsis" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, consequuntur nobis cupiditate inventore voluptatibus nostrum qui non, doloribus nam impedit expedita voluptate recusandae assumenda, consequatur laboriosam eveniet, quos nulla! Neque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, consequuntur nobis cupiditate inventore voluptatibus nostrum qui non, doloribus nam impedit expedita voluptate recusandae assumenda, consequatur laboriosam eveniet, quos nulla! Neque.">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, consequuntur nobis cupiditate inventore voluptatibus nostrum qui non, doloribus nam impedit expedita voluptate recusandae assumenda, consequatur laboriosam eveniet, quos nulla! Neque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, consequuntur nobis cupiditate inventore voluptatibus nostrum qui non, doloribus nam impedit expedita voluptate recusandae assumenda, consequatur laboriosam eveniet, quos nulla! Neque.</p>
                </div>
            </div> -->
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                        &copy; {{ env('APP_NAME') }}. All rights reserved | Developed by <a href="{{ env('APP_DEVELOPER_URL') }}" target="_blank">{{ env('APP_DEVELOPER') }}.</a>
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            @foreach(\App\Models\PaymentMethod::get() as $PaymentMethod)
                            @if(!is_null($PaymentMethod->icon))
                                <li><a target="_blank" href="#"><img class="img-fluid img-thumbnail" width="90px" src="{{ asset($PaymentMethod->icon) }}" alt="{{ $PaymentMethod->title }}"></a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" class="backToTop active"><i class="fa fa-arrow-up"></i></a>