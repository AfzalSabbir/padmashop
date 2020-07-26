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
<div class="col-12" id="isLoading">
<section class="login-sec padding-top-30 padding-bottom-100 section">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Don’t have an Account? Register now -->
            <div class="col-md-7 position-relative">
                <!--<div class=".d-sm-none position-absolute" style="border-left:1px solid #ddd; width: 1px; left: 0; top:  0;height: 100%;"></div>-->

                <div class="card">
                  <div class="card-header">
                    <h2 class="mb-0">Don’t have an Account? Register now</h2 class="mb-0">
                    </div>
                    <div class="card-body">
                        <!-- FORM -->
                        @if ($errors->any())
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(Session::has('verify_message'))
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <ul>
                                        <p></p>{{ Session::get('verify_message') }}</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('user_register') }}" method="post">
                            @if(Session::has('verify_message'))
                                {{ Session::get('verify_message') }}
                            @endif
                            @csrf
                            <ul class="row">
                                <li class="col-sm-12 col-md-6">
                                    <label>Full Name
                                        <input type="text" class="form-control" name="name" placeholder="" required="">
                                    </label>
                                </li>
                                <li class="col-sm-12 col-md-6">
                                    <label>Username
                                        <input type="text" class="form-control" name="username" placeholder="" required="">
                                    </label>
                                </li>
                            </ul>
                            <ul class="row">
                                <li class="col-sm-12 col-md-6">
                                    <label>Password
                                        <input type="password" class="form-control" name="password" placeholder="" required="">
                                    </label>
                                </li>
                                <li class="col-sm-12 col-md-6">
                                    <label>Confirm Password
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </label>
                                </li>
                            </ul>
                            <ul class="row">
                                {{-- <li class="col-sm-12 col-md-6">
                                    <label>Email
                                        <input type="email" class="form-control" name="email" placeholder="" required="">
                                    </label>
                                </li> --}}
                                <li class="col-sm-12 col-md-6">
                                    <label>Mobile
                                        <input type="text" class="form-control" name="mobile" placeholder="" required="">
                                    </label>
                                </li>
                                </li>
                                <li class="col-sm-12 col-md-6">
                                    <label>Village
                                        <input type="village" class="form-control" name="village" placeholder="" required="">
                                    </label>
                                </li>
                            </ul>

                            {{-- Component --}}
                            <register :districts="{{ $district }}" >
                            </register>
                            <button type="submit" class="btn-success btn">Signup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
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
