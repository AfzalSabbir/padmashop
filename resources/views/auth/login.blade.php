@extends('frontend.layouts.master')

@section('title', 'Home')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
<style>
    .padding-bottom-100 {
        padding-bottom: 30px !important;
    }
    .padding-top-30 {
        padding-top: 30px !important;
    }
    .section {
        position: relative;
        width: 100%;
        font-family: 'Lato', sans-serif;
    }
    .login-sec h2 {
        font-weight: 450;
        font-size: 18px;
        margin-bottom: 40px;
    }
    .login-sec li {
        list-style: none;
    }
    .login-sec li label {
        font-weight: 500;
        color: #000;
        width: 100%;
    }
    .login-sec li input {
        background: #fff;
        box-shadow: none;
        height: 40px;
        font-size: 14px;
        border: 1px solid #e2e2e2;
        margin-bottom: 10px;
        padding: 0 20px;
        margin-top: 5px;
    }
    .styled {
        position: absolute;
        top: 15px;
        left: 22px;
    }
    .checkbox-primary {
        margin-bottom: 20px;
    }
    .login-sec .forget {
        text-decoration: underline !important;
        color: #aaaaaa;
        float: right;
        margin-top: 10px;
    }
    .alert-success ul{
        margin-bottom: 10px;
    }
    #reset_password{
        display: none;
    }
</style>
@endsection

@section('content')
<section class="login-sec padding-top-30 padding-bottom-100 section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- Login Your Account -->
                <div class="card" id="signin_form">
                    <div class="card-header">
                        <h2 class="mb-0">Login Your Account</h2 class="mb-0">
                    </div>
                    <div class="card-body" style="position: relative;">
                        @if ( Session::has('login_error') )
                        <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {!! Session::get('login_error') !!}
                        </div>
                        @endif
                        @if ( Session::get('success_message') )
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {!! Session::get('success_message') !!}
                        </div>
                        @endif
                        <user-login
                            url="{{ Redirect::intended()->getTargetUrl() }}"
                        ></user-login>
                    </div>
                </div>

                <!-- Reset password of account -->
                <div class="card" id="reset_password">
                    <div class="card-header">
                        <h2 class="mb-0">Password Reset</h2 class="mb-0">
                    </div>
                    <div class="card-body">
                        @if ( Session::has('login_error') )
                        <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {!! Session::get('login_error') !!}
                        </div>
                        @endif

                        <!-- ========================== start password_reset form =========================== -->
                        <form action="{{ route('password.reset.code') }}" method="post" id="password_reset_frm">
                            @csrf
                            <input type="hidden" class="form-control" name="product">
                            <ul class="row">
                                <li class="com-md-12 alert-warning text-center w-100 p-2 mt-0" style="margin-top: -15px!important;color: red;display: none;" id="error_message">
                                    Your Username or Phone no is wrog...!
                                </li>
                                <li class="col-sm-12">
                                    <label>Username or Mobile
                                        <input type="text" class="form-control" name="nameorpass" placeholder="Enter username or Phone" required>
                                    </label>
                                </li>

                                <li class="col-sm-12 text-left mb-0">
                                    <a href="#signin_form" class="btn btn-success back">Back</a>
                                    <a href="{{ route('password.reset.code.verification') }}" class="btn btn-success">I have a code</a>
                                    <button type="submit" class="btn btn-success float-right" id="reset_code">Reset Code</button>
                                </li>
                            </ul>
                        </form>
                        <!-- ========================== end password_reset form =========================== -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('public/front/js/custom.js') }}" type="b85f535929402f07d7a62e20-text/javascript"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $('.forget').click(function()
       {
           $('#signin_form').hide();
           $('#reset_password').show();
       });
       $('.back').click(function()
       {
           $('#signin_form').show();
           $('#reset_password').hide();
       });
       $('#reset_code').click(function(event){
            if($('input[name=nameorpass]').val().length > 0){
                event.preventDefault();
                $.ajax({
                    type:'POST',
                    url: '/user/reset/code',
                    data:{
                        nameorpass: $('input[name=nameorpass]').val(),
                        _token: '{{csrf_token()}}',
                    },
                    success:function(data){
                        console.log(data);
                        if(+(data) == 0){
                            $('#error_message').show();
                        }
                        else{
                            $('#error_message').hide();
                            window.location.href = "{{ route('password.reset.code.verification') }}";
                        }
                    }
                });
            }

       });
   });

</script>

<script>
window.onload=function(){
    var site_url = "<?php echo url("/");?>";
    d_code.onkeyup=function(){
        if(d_code.value != ""){
            var xml = new XMLHttpRequest();
            xml.onreadystatechange=function(){
                if(this.readyState == 4 && this.status == 200){
                    d_name.value = xml.responseText;
                }
            }
            xml.open('GET', site_url+'/get-distributor/'+d_code.value, true);
            xml.send(); 
        }else{
            d_name.value="";
        }
    }
}

</script>

@endsection
