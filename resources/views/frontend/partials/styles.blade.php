<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('public/front/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">

<!--<link rel="stylesheet" href="{{ asset('public/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('public/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">-->

<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/custom.css') }}">

<style>
    /*@media screen and ( max-width: 520px ){

        li.page-item {

            display: none;
        }

        .page-item:first-child,
        .page-item:last-child,
        .page-item.active {

            display: block;
        }
    }*/

    #isLoading {
        transition: all 0.3s linear;
        margin-bottom: 25px;
    }
    #cartWrapper {
        width: 19.7rem!important;
    }
    .cart-section {

    }
    #layout_2 {
        position: fixed !important;
        top: 55px;
        right: 0;
        transition: all 400ms linear 0s;
        opacity: 0;
        z-index: 10;
        width: 0rem;
    }
    .show-cart{
        width:19.7rem !important; 
        opacity:1 !important;
        right: 22px !important;
    }
    .active{
        color: var(--secondary_color)!important;
    }
    @media screen and ( max-width: 520px ){

        li.page-item {

            display: none;
        }
        .page-item:first-child,
        .page-item:nth-child( 2 ),
        .page-item:nth-last-child( 2 ),
        .page-item:last-child,
        .page-item.active,
        .page-item.disabled {
            display: block;
        }
    }

    :root{
        --secondary_color: #ff9805;
    }
    @import url('https://fonts.maateen.me/siyam-rupali/font.css');
    body {
        font-family: 'SiyamRupali', sans-serif;
        scroll-behavior: smooth; 
    }
    .card .card-header{
        border-bottom: none;
        background: var(--primary_color);
        color: #fff;
        font-size: 15px;
    }
    .card .card-header i{
        font-size: 12px;
        color: #fff;
        top: 18px;
        transition: all 0.3s ease;
    }
    .modal-backdrop {
        display: none;
    }
    .modal {
        background: #0009;
    }
    .sidenav-1 {
        height: 89vh;
        max-height: 88vh;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.3s;
        padding-top: 15px;
        box-shadow: 0px -2px 5px #aaa;
    }
    
    .sidenav-1 a {
        text-decoration: none;
        font-size: 14px;
        color: #aaa;
        display: block;
        transition: 0.3s;
    }
    
    .sidenav-1 .closebtn {
        position: absolute;
        top: -5px;
        right: 8px;
        font-size: 36px;
        margin-left: 50px;
        z-index: 9999;
    }

    .sidenav-1 .closebtn:hover {
        color: red;
    }
    
    #main {
        transition: margin-left .5s;
        padding: 16px;
    }
    .cart-box {
        position: relative;
    }
    .cart-box .cart-item {
        background: #eff6fa;
        border-radius: 5px;
        padding: 5px;
        overflow: auto;
    }
    .cart-box .cart-item .count_e_r {
        width: 10%;
        float: left;
        position: relative;
    }
    .cart-box .cart-item .cart-photo {
        width: 14%;
        float: left;
        
    }
    .cart-box .cart-item .cart-name {
        width: 75%;
        float: left;
        padding: 0px 8px 0px 8px;
        font-size: 12px !important;
    }
    .cart-box .cart-item .cart-name a {
        font-size: 12px !important;
    }
    .cart-box .check-btn {
        margin: 0px auto 20px auto;
    }
    .cart-box .check-btn button{
        width: 100%;
    }
    .cart-box .cross-btn {
        color: #aaa;
        position: absolute;
        top: 20px;
        right: 5px;
        width: 25px;
        height: 25px;
        line-height: 25px;
        text-align: center;
        background: #fff;
        border: 1px solid 1px solid #ba0000;
        z-index: 999999;
        cursor:pointer;
        border-radius: 50%;
        color: #ff3547;
        box-shadow: 0 1px 6px #888;
        
    }

    .viewed_item .cart-button {
        position: absolute;
        bottom: 0;
        width: 100%;
        left:0;
    }
    .viewed_item .cart-button .cr-button{
        width: 100%;
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }
    .viewed_item:hover .cart-button .cr-button {
        opacity: 1;
    }
    .viewed_item .wishlist-btn {
        position: absolute;
        top: 22px;
        right: 10px;
        z-index: 1;
    }
    .viewed_item .wishlist-btn i:hover {
        color: var(--secondary_color);        
    }
    .viewed_item .wishlist-btn i {
        color: gray;
        height: 30px;
        width: 30px;
        line-height: 30px;
        /*border: 1px solid #ddd;*/
        opacity: 0;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }
    .viewed_item:hover .wishlist-btn i {
        opacity: 1;
    }
    .deals_image img {
        height: 310px !important;
    }
    .profile-dropdown {
        position: absolute;
        top: 11px;
        right: -1px;
        margin-top: -15px;
        display: inline-block;
    }
    .profile-dropdown-content {
        background-color: #fafafa;
        min-width: 175px;
        z-index: 1;
        display: none;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease-in-out;
    }
    .profile-dropdown-content a {
        padding: 8px 13px;
        display: block;
        color: #333;
    }
    .profile_hover:hover .profile-dropdown .profile-dropdown-content{
        display: block;
    }

    .profile-dropdown-content:hover {
        background: #eee;
    }
    .profile-dropdown-content.profile_name a:hover {
        color: inherit;
    }
    .profile-dropdown-content:hover a {
        color: var(--secondary_color);
    }
    .profile_hover:hover .profile-dropdown {
        box-shadow: 0px 8px 10px 5px rgba(0,0,0,0.2);
    }
    .profile-dropdown-content.profile_name{
        position: relative;
        text-align: center;
        font-weight: bold;
        background: var(--secondary_color);
    }
    .profile-dropdown-content.profile_name::after {
        content: "";
        position: absolute;
        border: 6px solid var(--primary_color);
        bottom: 92%;
        right: 22px;
        border-color: transparent transparent var(--secondary_color);
    }
    .profile-dropdown-content.profile_name a{
        color: #fff !important;
    }
    .profile-dropdown-content.profile_name:hover {
        background: var(--secondary_color);
        color: #fff;
    }

    .wishlist .order-b {
        position: relative;
    }
    .wishlist .order-b i {
        position: absolute;
        top: 6px;
        right: 5px;
        z-index: 1;
        color: #ff0000e6;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        cursor: pointer;
    }

    .footer {}

    /* Dalivary Status Style Here */
    .delivery-status {
        width: 20%;
        height: 135px;
        position:relative;
    }
    .delivery-status .hr {
        position: absolute;
        left: 0;
        top: 40%;
        display: block;
        width: 100%;
        height: 2px;
        border-width:5px;
        border-top-style:dotted;
    }
    .delivery-status .status {
        position:absolute;
        top: 5%;
        right: 28%;
        box-shadow: 2px 2px 5px 3px #666;
        display: block;
        width:100px;
        height:100px;
        border-radius:50%;
        border: 1px solid #666;
        background: #fff;
    }
    .delivery-status .status .extra-block-first,
    .delivery-status .status .extra-block-last {
        position:absolute;
        top: 45%;
        background: #fff;
        display: block;
        height: 15px;
    }
    .delivery-status .status .extra-block-first{
        left: -65px;
        width: 62%;
    }
    .delivery-status .status .extra-block-last{
        right: -70px;
        width: 62%;
    }
    .delivery-status .status img{
        margin: 28%;
    }
    .delivery-status .status-text{
        margin-top:60%;
        text-align: center;
    }
    

    @media only screen and (max-width: 992px){
        .delivery-status {
            width: 33.33%;
            margin-bottom: 70px;
        }
        .viewed_item .cart-button .cr-button {
            opacity: 1;
        }
    }

    @media only screen and (max-width: 768px){
        .delivery-status {
            width: 50%;
        }
        .delivery-status .status .extra-block-first{
            left: -85px;
            width: 78%;
        }
        .delivery-status .status .extra-block-last{
            right: -72px;
            width: 66%;
        }
        .hide-mobile{
            display: none;
        }
        .cart{
            margin-right: 15px;
        }
    }

    @media only screen and (max-width: 560px){
        .delivery-status {
            width: 100%;
            margin-bottom: 30px;
        }
        .delivery-status .status {
            left: 0;
        }
        .delivery-status .status .extra-block-first,
        .delivery-status .status .extra-block-last {
            display: none;
        }
        .delivery-status .status-text {
            margin-top: 20%;
        }
    }
    [v-cloak] {
        display: none;
    }
    .search-option {
        background: #fff;
        z-index: auto;
        position: absolute;
        width: 100%;
        top: 59px;
    }
    .viewed2 {}
    .sign_in a {
        color: #2faf2f;
        font-weight: 400;
    }
    .feature {
        /*margin-bottom: 100px;*/
        padding: 0 10px !important;
    }
    .padding_ {
        padding-top: 15px;
        padding-bottom: 35px;
    }
    .footer_column > p {
        text-align: justify;
        margin-top: 0px;
        line-height: 15px;
        font-size: 12px;
    }
    .footer_column h3 {
        margin-bottom: 0px;
    }
    .r-box {
        margin-top: 12px;
    }
    .r-product {
        border-radius: 5px;
        overflow: auto;
        background: #3c3c3c;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #565555;
        color: #ddd;
    }
    .r-product .r-img {
        width: 21%;
        margin-right: 5%;
        float: left;
    }
    .r-product .r-img img {
        width: 100% !important;
    }
    .r-product .r-name {
        width: 74%;
        float: left;
    }
    .r-product .r-name p {
        text-align: left !important;
        margin-bottom: 1px;
    }
    .order_info {
        position: absolute;
        top: -6px;
        right: 0;
    }
    
    .footer_social ul li {
        border-radius: 0% !important;
        box-shadow: 0px 1px 5px rgba(0,0,0,0.0) !important;
        background: transparent !important;
        border: 1px solid #aaa;
        transition: 0.3s;
    }
    .footer_social ul li:hover {
        background: #fafafa !important;
    }
    .shop {
        background: #eff6fa !important;
    }
    .mb-10 {
        margin-bottom: 20px;
    }

    /* cart animation start */
    #cartInimaItem{
    }
    #cartInimaItem{
        display: inline-block;
        max-height: 50px;
        height: 50%;
        position: fixed;
        z-index: 99999999;
        animation-iteration-count: 1;
        animation-duration: 0.8s;
        animation-fill-mode: both;
        animation-timing-function: linear;
    }
    @keyframes cartAnimate{
        0%{
            transform:scale(0);
        }
        50%{
            transform:scale(1);
        }
        85%{
            transform:scale(1.5);
        }
        100%{
            transform:scale(0);
            /*opacity: 0;*/
        }
    }
    /* cart animation end */
    


    /*man nav ber start*/
    #nav_wrapper{
        background: rgb(255, 255, 255);
        box-shadow: 0 2px 6px #d6d6d6;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        z-index: 28;
    }
    .navbar{
        padding:0;
    }
    .navbar-toggler{
      padding: 3px 5px;
      font-size: 14px;
      transition: all 0.3s ease-in-out;
    }
    .navbar-toggler:focus,
    .navbar-toggler:active{
      outline:none;
    }
    .navbar-toggler:hover{
      box-shadow: 0 2px 6px #ccc; 
    }
    .man_mega_menu_toggle{
        perspective: 1000px;
    }
    .man_mega_menu_toggle:hover::before{border-top-color: var(--secondary_color);}
    .man_mega_menu{
      top:100%;
      border: none;
      border-top: 2px solid  var(--secondary_color);
      border-radius: 0 0 6px 6px;
      box-shadow: 0 2px 10px #00000073;
      column-count: 4;
      padding:10px;position: absolute;
      background: #fff;
      backface-visibility: hidden;
      transition: all 0.3s ease-in-out;
      transform: rotateX(-90deg);
      opacity: 0;
      transform-origin:50% 0%;
      z-index: 9;
    }

    .man_mega_menu a{
      color: #444;
      display: block;
      position: relative;
      page-break-inside: avoid;
      padding: 0px 15px;
      white-space: nowrap; 
      overflow: hidden;
      text-overflow: ellipsis;
      line-height: 40px;
      transition: all 0.3s ease-in-out;
    }
    .man_mega_menu a:hover{color:var(--secondary_color);}
    .man_mega_menu .see_more{
      color: blue;
    }
    .man_mega_menu .see_more:before{display: none;}
    .man_mega_menu a:before{
      position: absolute;
      content:'';
      left: 1%;
      border: 3px solid #222;
      top: 41%;
      translate: transform(-50%, -50%);
      border-radius: 50%;
    }

    .navbar{
      perspective: 1600px;
      perspective-origin: top;
    }
    .navbar-light .navbar-nav .nav-link{
        color: #333;
        padding:0 20px;
        line-height: 60px;
        transition: all 0.3s ease-in-out;
    }
    
    .navbar-light .navbar-nav .nav-link:hover{
        color: var(--secondary_color);
    }
    .cotegories_wraper {
        line-height: inherit;
    }
    .man_categories_toggle{
      background: var(--secondary_color);
      line-height: 60px;
      display: inline-block;
      color:#fff;
      padding: 0 15px;
      transition: all 0.3s ease-in-out;
    }
    .man_categories_toggle:hover{
        color: #eee;
        box-shadow: 0 1px 6px #ccc;
    }
    .man_categories{
      background: #fff;
      list-style: none;
      padding:0;
      margin: 0;
      position: absolute;
      top: 100%;
      left: 0;
      width: 240px !important;
      width: 100%;
      box-shadow: 0 4px 8px #ccc;
      transform: rotateX(-90deg);
      transform-origin: 50% 0%;
      backface-visibility: hidden;
      transition: all 0.2s ease-in-out;
      opacity: 0;
    }

    .man_categories > li > a{
      perspective: 1000px;
      perspective-origin: left;
    }
    .man_categories .man_sub_dropdown{
        top: 0%;
        left: 100%;
        opacity: 0;
        width: 100%;
        z-index: 999;
        background: #fff;
        position: absolute;
        transform: rotateY(-90deg);
        backface-visibility: hidden;
        box-shadow: 1px 2px 10px #ccc;
        transition: all 0.3s ease-in-out;
        transform-origin: 0% 50%;height: 100%;
    }
    .man_categories>li:hover a+.man_sub_dropdown,
    .man_categories>li>a:hover +.man_sub_dropdown{
      transform: rotateY(0deg);
      opacity: 1;
    }
    .man_categories .man_sub_dropdown a{
      min-width: 100%;
      margin-top: -1px;
      border: 1px solid #ddd;
    }
    .man_categories .man_sub_dropdown li+li{
      border-top: 1px solid #ddd;
    }
    .man_categories>li:hover>a,
    .man_categories>a:hover{
      background: #eee;
    }

    .man_categories .man_sub_sub_dropdown li:hover>a,
    .man_categories .man_sub_sub_dropdown>a:hover,
    .man_categories .man_sub_dropdown li:hover>a,
    .man_categories .man_sub_dropdown>a:hover{
      background: #eee;
    }
    .man_categories .man_sub_sub_dropdown{
        top: 0;
        opacity: 0;
        left: 100%;
        height: 100%;
        position: absolute;
        background: #00000038;
        transform: rotate(50deg) translate(-100%, -300%);
        transition: all 0.6s cubic-bezier(0.49, 0.75, 0.75, 1.3);
    }
    
    
    .man_sub_dropdown>.sub_sub_dropdown_wrapper:hover a+.man_sub_sub_dropdown,
    .man_sub_dropdown>.sub_sub_dropdown_wrapper>a:hover +.man_sub_sub_dropdown{
        transform: rotate(0deg) translateX(0%);
        opacity: 1;
        width: inherit;
    }
    
    
    .man_categories a{
      position: relative;
      background: #fff;
      color: #333;
      display: block;
      padding: 0 20px;
      line-height: 40px;
      overflow: hidden;
      text-align: left;
      text-decoration:none;
      white-space: nowrap; 
      text-overflow: ellipsis;
      transition: all 0.3s ease-in-out;
    }

    .man_categories a .fa{
      display: inline-block;
      float: right;
      position: absolute;
      right: 0;
      padding-right: 15px;
      margin-left: 15px;
      line-height: 45px;
    }
    .man_categories li+li{
      border-top: 1px solid #eee;
    }
    /*man nav ber end*/



    .footr-img {

    }
    .footr-img img {
        width: 100%;
    }

    .hoverLink a{
        color: #3232a2 !important;
        transition: all 0.3s ease-in-out !important;
        margin-right: 5px;
    }
    .hoverLink a:hover{
        color: #1e1ece !important;
        font-weight: bold !important;
        text-decoration: underline !important;
    }
    #navbarSupportedContent, .wish_cart {
        line-height: inherit;
    }
    .wish_cart  {
        position: absolute;
        right: 0;
        top: 5.5px;
        transform: translateY(-5.5%);
    }
    .wish_cart li {
        display: inline-block;
    }
    .wish_cart_n {
        font-size: 10px;
        color: #eaeaea;
        position: absolute;
        left: 105%;
        top: -4px;
        transform: translate(-50%, -50%);
        background: var(--secondary_color);
        padding: 3px;
        border-radius: 50%;
        width: 16px;
        height: 15px;
        text-align: center;
        display: inline-block;
        line-height: 9px;
    }
    .responsive_heart {
        font-size: 25px;
        position: relative;
        color: #b3b3b3;
        font-size: 18px;
        margin-top: 17px;
    }

    @media all and (min-width: 992px){
        
        .man_categories_toggle+.man_categories:hover,
        .man_categories_toggle:hover +.man_categories{
            transform: rotateX(0deg);
            opacity: 1;
        }

        .man_mega_menu_toggle:hover+.man_mega_menu_dropdown,
        .man_mega_menu_dropdown:hover,
        .man_mega_menu_dropdown.active{
          transform: rotateX(0deg);
          opacity: 1;
        }
        .man_mega_menu_toggle::before{
            content: '';
            position: absolute;
            top: 54%;
            right: 0;
            transform: translate(-50%,-50%);
            display: inline-block;
            border: 4px solid;
            border-color: #525252 transparent transparent;
            transition: all 0.3s ease-in-out;
        }
        .hide-desktop {
            display: none !important;
        }
        
    }

    @media all and (max-width: 992px){
        #navbarSupportedContent{
            display: block;
            height: 0px;
            overflow: hidden;
            transition: height 0.3s ease-in-out;
        }
        caption {
            caption-side: top !important;
        }
        .wish_cart {
            position: absolute;
            right: 55px;
            top: calc(0% + 7.5px);
        }
        .header_main{
            /*padding-bottom: 20px;*/
        }
        .header_search_input[data-v-178b5cfe]{
            line-height: 40px !important;
            border-radius: 0px;
        }
        .header_search_button{
            border-radius: 0;
        }
        .man_categories_toggle{
            color: var(--secondary_color);
            background: #fff;
        }
        .navbar-light .navbar-nav .nav-item .nav-link{
            line-height: 45px;
        }
        .navbar-light .navbar-nav .nav-item + .nav-item .nav-link{
            border-top: 1px solid #eee;
        }

        .man_mega_menu{
          column-count: 3;
        }
        .man_categories_toggle:hover {
            color: #444;
            box-shadow: none;
        }
        .mobile-cart_fixed {
            position: fixed;
            bottom: 0;
            left: 15px;
            right: 15px;
            z-index: 9;
        }
        .mobile-cart_fixed button {
            width: 50% !important;
            float: left;
        }
    }
    @media all and (max-width: 768px){
      .man_mega_menu{
        column-count: 2;
      }
      /* Don't remove (7657)*/
        .viewed_item .wishlist-btn i {
            opacity: 1;
        }
    }
    @media all and (max-width: 500px){
        .man_mega_menu{
            column-count: 1;
        }
        .mobile-text {
            font-size: 12px !important;
        }
        #order_code_btn {
            display: none;
        }
    }
    /*man nav ber start*/

    .footr-img {

    }
    .footr-img img {
        width: 100%;
    }

    .hoverLink a{
        color: #3232a2 !important;
        transition: all 0.3s ease-in-out !important;
        margin-right: 5px;
    }
    .hoverLink a:hover{
        color: #1e1ece !important;
        font-weight: bold !important;
        text-decoration: underline !important;
    }
    #navbarSupportedContent, .wish_cart {
        line-height: inherit;
    }
    .wish_cart li {
        display: inline-block;
    }
    .viewed_item_wrapper2 {
        border: 1px solid #ddd;
        margin-bottom: -1px;
        margin-right: -1px;
        margin-bottom: 10px;
    }


    /*css for image zoom start*/
    .img-zoom-lens {
        position: absolute;
        border: 1px solid #5a5a5a;
        width: 150px;
        height: 150px;
        background: rgba(0,0,0,0.1);
        opacity: 0;
    }
    .image_selected{
        cursor: zoom-in;
    }
    .image_selected:hover .img-zoom-lens{
        opacity: 1;
    }
    .img-zoom-result {
        position: absolute;
        left: 100%;
        top: 0;
        width: 600px;
        height: 400px;
        display: none;
        z-index: 999;
        background: #fff;
    }
    .img_wraper:hover + div{
        border: 1px solid #d4d4d4;
        background: #fff;
        z-index: 9;
    }
    
    .image_selected:hover+.img-zoom-result{
        display: block;
    }

    @media all and (max-width: 768px ){
        .img-zoom-lens ,
        .img-zoom-result {
            display: none;
        }
    }
    /*css for image zoom end*/

    .block-ellipsis {
        display: block;
        display: -webkit-box;
        max-width: 100%;
        margin: 0 auto;
        font-size: 14px;
        -webkit-line-clamp: 11;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .subscriber_wrapper{
        background: rgb(255, 255, 255);
        background: url(https://ischebazar.com/public/bg.png);
        padding: 100px 15px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50%;
        background-attachment: fixed;
        position: relative;
    }
    .subscriber_wrapper::before {
        content: '';
        position: absolute;
        display: block;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.36);
        top: 0;
        bottom: 0;
    }
    .subscriber_wrapper #subscribers{
        max-width: 400px;
        margin: auto;
    }
    .subscriber_wrapper #subscribers input[type=email]{
        border-radius: 25px 0 0 25px;
        padding: 12px 26px;
        font-size: 16px;
        font-weight: 100;
    }
    .subscriber_wrapper #subscribers input[type=submit]{
        border-radius: 0 25px 25px 0;
        padding: 10px 26px;
        background: #ff3547 !important;
        font-size: 16px !important;
    }
    .subscriber_wrapper #subscribers input[type=email]:focus,
    .subscriber_wrapper #subscribers input[type=email]:hover
    .subscriber_wrapper #subscribers input[type=submit]:focus,
    .subscriber_wrapper #subscribers input[type=submit]:hover{
        outline: none;
        box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.49);
        border-color: #ced4da;
    }
    .__lololo {
        width: 90px;
        height: 90px;
        }
        @media (max-width: 768px) {
        .__lololo {
        width: 70px;
        height: 70px;
        }
    }
    
    
    .__fixed_side_nav {
        position: fixed;
        transform: rotate(-90deg) translate(-50%,0%);
        top: 50%;
        transform-origin: 0% 0%;
        left: 0;
        z-index: 30;
    }
    .__fixed_side_nav a {
        color: #ffffff;
        padding: 10px 20px;
        display: inline-block;
        border-radius: 0 0 7px 7px;
        width: 100%;
        box-shadow: 0px 0px 6px #0000005e;
        background: linear-gradient(156deg, #ff4a00, #ffc107);
        transition: all 0.3s ease-in-out;
    }
    .__fixed_side_nav a:hover{
        box-shadow: 0px 2px 10px #00000066;
        background: linear-gradient(-156deg, #ff4a00, #ffc107);
    }
    a.cartCount{
        display: none;
    }
    .cr-button{
        background: var(--secondary_color) !important;
    }
        
    @media (max-width: 768px){
        .__fixed_side_nav {
            bottom: 0%;
            left: 0px;
            right:0px;
            top: unset;
            transform: rotate(0deg) translate(0%,0%);
            display: flex;
        }
        .__fixed_side_nav a {
            box-shadow: -5px 0px 5px 1px #00000061;
            text-align: center;
            border-radius: 0;
        }
        .__fixed_side_nav > a.cartCount {
            box-shadow: none;
            /* text-align: center; */
            border-radius: 0;
            background: linear-gradient(24deg, #ffc107, #ff4a00);
            display: flex;
            text-align: center;
            justify-content: center;
            transition: all 400ms linear 0s;
        }
        .__fixed_side_nav > a.cartCount:hover {
            box-shadow: 0px 2px 10px #00000066;
            background: linear-gradient(-24deg, #ffc107, #ff4a00);
        }
    }
    .tooltip-inner {background-color: var(--secondary_color);}

    /* All Style By Abdullah Al Ahsan */
    .contact_submit_button {
        border: 1px solid transparent !important;
        border-radius: 5px !important;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom.css') }}">