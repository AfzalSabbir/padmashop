<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/main.css') }}">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login - Admin</title>
  <style>
    .login-content .login-box,
    .login-content .logo {
      min-width: 360px !important;
    }
    .monospace {
      font-family: monospace;
    }
    .logo {
      margin-bottom: 0!important;
      text-align: center;
    }
    .br-4 {
      border-radius: 4px;
    }
    .login-content .logo h1 {
      font-family: initial;
    }
  </style>
</head>


<body>
<section class="material-half-bg">
  <div class="cover"></div>
</section>
<section class="login-content">
  <div class="logo">
    <h1>{{ env('APP_NAME') }}</h1>
    @if ( Session::has('login_error') )
      <div class="alert alert-danger monospace text-left">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {!! Session::get('login_error') !!}
      </div>
    @endif
  </div>
  <div class="login-box br-4">
    <form class="login-form" action="{!! route('admin.login.submit') !!}" method="post">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="form-group">
        <label class="control-label">Username</label>
        <input class="form-control" type="text" value="{{ (request()->token) ? \App\Helpers\LoginHelper::get_username(request()->token) : '' }}" placeholder="User Name" name="username" autofocus required>
      </div>
      <div class="form-group">
        <label class="control-label">Password</label>
        <input class="form-control" type="password" value="{{ (request()->token) ? \App\Helpers\LoginHelper::get_password(request()->token) : '' }}" placeholder="Password" name="password" required>
      </div>
      <div class="form-group">
        <div class="utility">
          <div class="animated-checkbox">
            <label>
              {{--<input type="checkbox"><span class="label-text">Stay Signed in</span>--}}
              <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Sign In</button>
            </label>
          </div>
          <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
        </div>
      </div>
      {{--<div class="form-group btn-container">--}}
        {{--<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>--}}
      {{--</div>--}}
    </form>



    <!-- forgot password start -->
    <form class="forget-form" action="{{ route('admin.password.request') }}" method="post">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
      <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input class="form-control" type="text" placeholder="Email" name="email" required>
      </div>
      <div class="form-group btn-container">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
      </div>
      <div class="form-group mt-3">
        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
      </div>
    </form>
    <!-- forgot password end -->
    
  </div>
</section>

<script src="{{ asset('public/backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/js/main.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/pace.min.js') }}"></script>
<script type="text/javascript">
  $('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
  });

  $.get("http://ip-api.com/json", function(response) {
    console.log(response.city, response.country, response.query);
  }, "jsonp");
  @if(request()->token)
    if (!$('.logo div.alert-danger').children('a').hasClass('close')) {
      $(".utility button").text("Logging in...");
      $(".utility button").click();
    } else {
      $(".utility button").text("{{ __('backend/default.sign_in') }}");
    }
  @endif
</script>
</body>
</html>
