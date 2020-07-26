<script src="{{ asset('public/js/clipboard.min.js') }}"></script>
<script src="{{ asset('public/front/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('public/front/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/ScrollToPlugin.min.js') }}"></script>

{{-- <script src="{{ asset('public/front/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script> --}}
{{-- <script src="{{ asset('public/front/plugins/slick-1.8.0/slick.js') }}"></script> --}}

<script src="{{ asset('public/front/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('public/front/js/custom.js') }}"></script>
{{-- <script src="{{ asset('public/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script> --}}

@section('scripts')
@show

<script src="{{ asset('public/js/app.js') }}"></script>


<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="b85f535929402f07d7a62e20-|49" defer=""></script>

<script type="text/javascript">
    // fixed cart start
    window.addEventListener('scroll',cartonscrollfixed);

    function cartonscrollfixed(){
        var car_t_f_i_x = document.getElementById("car_t_f_i_x");
        if (window.pageYOffset > 135 && car_t_f_i_x) {
            car_t_f_i_x.classList.add("fix_cart_"); // add fixed
        } else if(car_t_f_i_x){
            car_t_f_i_x.classList.remove("fix_cart_"); // remove fixed
        }
    }
    // fixed cart end

    // Showing Tooltip for AllTime
    $('.tool_tip').tooltip({trigger:'manual'}).tooltip('show');

  new ClipboardJS('.copy_btn');


</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.header_search_input').focus(function() {
            $('.search-option').show();
            /*$('.header_search_input').keydown(function() {
                console.log($(this).val().length);
                if ($(this).val() != '') {
                    $('.search-option').show();
                } else {
                    $('.search-option').hide();
                }
            });*/
        });

        $('.header_search_input').blur(function(){
            $('body').click(function () {
                if (!$(this).hasClass('search-option') && !$(".header_search_input").is(":focus")) {
                    $('.search-option').hide();
                }
                else {
                    $('.search-option').show();
                }
            });
        });

        $('.cat_menu_title').click(function(){

            if ($('.cat_ul_container').hasClass('closed')) {
                $('.cat_ul_container').removeClass('closed');
                $('.cat_ul_container').addClass('opened');
                $('.cat_ul_container').fadeIn();
            } else {
                $('.cat_ul_container').removeClass('opened');
                $('.cat_ul_container').addClass('closed');
                $('.cat_ul_container').fadeOut();
            }
        });

        /***********************
        * Don't Delete
        ************************/
        /*
        * Functions
        */
        // function advertisement() {
        //   var height_ = $('#carouselExampleIndicators').height();
        //   if ($(window).width() > 767) {
        //     $('.add-top-right').css({
        //       'margin': 'auto',
        //       'margin-top': '',
        //       'margin-left': '',
        //       'width': '100%'
        //     });
        //   } else if ($(window).width() < 575) {
        //     $('.add-top-right').css({
        //       'width': $(window).width() - 30,
        //       'margin-left': '',
        //       'margin-top': '20px'
        //     });
        //   } else {
        //     $('.add-top-right').css({
        //       'width': $('.container').width(),
        //       'margin-left': ($(window).width() - $('.container').width())/2 - 15,
        //       'margin-top': '20px'
        //     });
        //   }
        // }
        // $(window).resize(function(){
        //   advertisement();
        // });
        // advertisement();

        // $('.cart').click(function(){
        //     $('#Sidenav').animate({marginRight: '0'}, 0);
        // });

        // $('.closebtn').click(function(){
        //     $('#Sidenav').animate({marginRight: '-=20rem'}, 0);
        // });
        
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('.me').css({
            'width': $('.container').width(),
            'left': '50%',
            'margin-left': -$('.container').width()/2
        });

        $('.me_here').html($('.copy_me').html());

        $('.cat_menu_container').click(function(){
          $('.cat_ul_container').toggle();
      });

        $(window).scroll(function() {

            if ($(window).scrollTop() > 251-15 && $('.me').hasClass('deactive__')) {

                $('.me').find('.menu_trigger').addClass('me_menu_trigger');
                $('.me').find('.menu_trigger').removeClass('menu_trigger');
                $('.me').find('.menu_trigger_container').addClass('d-none');

                $('.me').addClass('active__');
                $('.me').removeClass('deactive__');
                $('.me').slideDown();

            } else if ($(window).scrollTop() <= 251-15-$('.copy_me').height() && $('.me').hasClass('active__')) {

                $('.me').find('.menu_trigger').removeClass('me_menu_trigger');
                $('.me').find('.menu_trigger_container').addClass('d-none');

                $('.me').addClass('deactive__');
                $('.me').removeClass('active__');
                $('.me').fadeOut('fast');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.category_head').click(function(){
            $('.category_ul').slideToggle();
            if ($('.category_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.category_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.category_head > .fa-chevron-down').addClass('rotate_90')
            }
        });


        $('.publisher_ul').slideUp();
        $('.publisher_head').click(function(){
            $('.publisher_ul').slideToggle();
            if ($('.publisher_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.publisher_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.publisher_head > .fa-chevron-down').addClass('rotate_90')
            }
        });


        /*if window size less then 768px shop pae left aside's single section collapsed start*/
        if(window.innerWidth < 768){
            $('.seller_ul,.category_ul,.publisher_ul,.author_ul,.rating_ul').slideUp();
            $('').slideUp();
            $('').slideUp();
            $('').slideUp();
            $('').slideUp();
        }
        /*if window size less then 768px shop pae left aside's single section collapsed end*/

        $('.seller_head').click(function(){
            $('.seller_ul').slideToggle();
            if ($('.seller_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.seller_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.seller_head > .fa-chevron-down').addClass('rotate_90')
            }
        });

        $('.author_ul').slideUp();
        $('.author_head').click(function(){
            $('.author_ul').slideToggle();
            if ($('.author_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.author_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.author_head > .fa-chevron-down').addClass('rotate_90')
            }
        });

        $('.sub_category_ul').slideUp();
        $('.sub_category_head').click(function(){
            $('.sub_category_ul').slideToggle();
            if ($('.sub_category_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.sub_category_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.sub_category_head > .fa-chevron-down').addClass('rotate_90')
            }
        });

        $('.brand_ul').slideUp();
        $('.brand_head').click(function(){
            $('.brand_ul').slideToggle();
            if ($('.brand_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.brand_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.brand_head > .fa-chevron-down').addClass('rotate_90')
            }
        });

        $('.rating_head').click(function(){
            $('.rating_ul').slideToggle();
            if ($('.rating_head > .fa-chevron-down').hasClass('rotate_90')) {
                $('.rating_head > .fa-chevron-down').removeClass('rotate_90');
            } else {
                $('.rating_head > .fa-chevron-down').addClass('rotate_90')
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });

  /*man cart animation start*/
    let cartAnimationStart = document.querySelectorAll(".cartAnimationStart");
    if(cartAnimationStart){
        var cartInimaItem = document.getElementById("cartInimaItem");
        cartAnimationStart.forEach(function(x){
            x.onclick = function(event){
                let img = location.origin+'/'+this.dataset.img;
                document.querySelector('#cartInimaItem').src=img;
                
                cartInimaItem.style.top           = event.clientY-(cartInimaItem.offsetHeight/2)+'px';
                cartInimaItem.style.left          = event.clientX-(cartInimaItem.offsetWidth/2)+'px';
                cartInimaItem.style.animationName = "cartAnimate";

                let cartAnimationEndTop           = document.querySelector("#cartAnimationEnd").getBoundingClientRect().top;
                    cartAnimationEndleft          = document.querySelector("#cartAnimationEnd").getBoundingClientRect().left;

                cartInimaItem.style.transition    = 'all 0.8s linear';
                cartInimaItem.style.top           = cartAnimationEndTop+'px';
                cartInimaItem.style.left          = cartAnimationEndleft+'px';
            }
        });

        cartInimaItem.addEventListener('animationend',function(){
            cartInimaItem.style.animationName = "";
            cartInimaItem.style.transition    = '';
            cartInimaItem.style.top           = '';
            cartInimaItem.style.left          = '';
        });
    }
    /*man cart animation end*/

    /*man lazy loader start____________________________________________________________*/
    loadImage();
    function loadImage(){
        let content = document.querySelectorAll('.man_lazy');
        content.forEach((img) => {
            if(img.getBoundingClientRect().top<(window.innerHeight*2)){
                let src = img.dataset.src;
                let image = new Image();
                image.src = src;
                
                img.removeAttribute('data-src');
                img.classList.remove('man_lazy');
                
                image.onload = function(){
                    img.setAttribute('src',src);
                }
            }
        });
        
    }
    /*man lazy loader end____________________________________________________________*/


    /*man js placeholder animation start_____________________________________________*/
    var str  = man_placeholder_animation.getAttribute('placeholder'),
            strL = str.length,
            i    = 0;

        setInterval(function(){
            var oldPlaceholderValue = (man_placeholder_animation.getAttribute('placeholder'))? man_placeholder_animation.getAttribute('placeholder') : "";
            if(i==0){
                man_placeholder_animation.setAttribute('placeholder', str.substring(0, i));
            }else{
                man_placeholder_animation.setAttribute('placeholder', str.substring(0, i)+"|");
            }
            i++;
            if(i==(strL+1)){
                i = 0;
                man_placeholder_animation.setAttribute('placeholder', "");
            }
        }, 100);
    /*man js placeholder animation end_____________________________________________*/


    /*back to top start_____________________________________________________________*/
    window.onscroll = function(){
        if(window.pageYOffset>1200){
            document.querySelector('.backToTop').classList.add('active');
        }else{
            document.querySelector('.backToTop').classList.remove('active');
        }

        /*front end top nav fixed on scroll start*/
        var nav_wrapper       = document.querySelector("#nav_wrapper"),
            header_mainHeight = document.querySelector(".header_main").scrollHeight,
            top_barHeight     = document.querySelector(".top_bar").scrollHeight;

        if(window.pageYOffset>(header_mainHeight+top_barHeight)){
            nav_wrapper.style.cssText = '    position: fixed;z-index: 9;top: 0px;transition: all 0.3s ease-in-out 0s;';
        }else{
             nav_wrapper.style.cssText = 'position: static;';
        }
        /*front end top nav fixed on scroll end*/
        loadImage();
    }
    /*back to top end_____________________________________________________________*/
</script>
<script>
    $(document).ready(function() {
        $('a').on('click', function(event) {
            $('table').parent('div').addClass('table-responsive');
        });

        $('#order_code_btn').on('click', function(event) {
            $('#order_code').fadeToggle('fast');
        });
    });
</script>




<script>
    // image zoom script start
    if(screen.width>768 && document.querySelector('#myimage') && document.querySelector('#myresult')){
      imageZoom("myimage", "myresult");
    }

    window.addEventListener('resize', function(){
       if(screen.width>768 && document.querySelector('#myimage') && document.querySelector('#myresult')){
           imageZoom("myimage", "myresult");
        }  
    });
    
    function sendSrcToBigImgField(x,y) {
      document.getElementById(y).src=x;
    }

    function imageZoom(imgID, resultID) {
      var img, lens, result, cx, cy;
      
        img    = document.getElementById(imgID);
        result = document.getElementById(resultID);
        lens   = document.createElement("DIV");
        
        lens.setAttribute("class", "img-zoom-lens");
        img.parentElement.insertBefore(lens, img);
        
        lens.addEventListener('mousemove', moveLens, true);
        img.addEventListener('mousemove', moveLens, true);
        lens.addEventListener('touchmove', moveLens, true);
        img.addEventListener('touchmove', moveLens, true);
        // console.log(moveLens());

        function moveLens(e) {
            cx = result.offsetWidth / lens.offsetWidth;
            cy = result.offsetHeight / lens.offsetHeight;

            result.style.backgroundImage = "url('" + img.src + "')";
            result.style.backgroundRepeat = "no-repeat";
            result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";

            var pos, x, y;
            // e.preventDefault();
            pos = getCursorPos(e);
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
            if (x < 0) {x = 0;}
            if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if (y < 0) {y = 0;}
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
       }
      function getCursorPos(e) {
        var a, x = 0, y = 0;
        e = e || window.event;
        a = img.getBoundingClientRect();
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return {x : x, y : y};
      }
    }
    // image zoom script end
</script>
<script> 
    navbarToggler.addEventListener('click',function(){
        if(navbarSupportedContent.offsetHeight < 10){
            navbarSupportedContent.style.height=navbarSupportedContent.scrollHeight+"px";
        }else{
            navbarSupportedContent.style.height="0px";
        }
    });
</script>

<script>
    let flash_btn = document.querySelector('#flash_btn');
    if(flash_btn){
        flash_btn.addEventListener('click', ()=>{
            console.log("{{ url('/flash') }}");
            fetch("{{ url('/flash') }}")
            .then(myJson=>myJson.json())
            .then(data=>{
                console.log(data);
            });
        });
    }
</script>