<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ __('Reset Password') }} - Admin</title>

    <style>
        .login-content .login-box {
            position: relative;
            min-width: 500px;
            min-height: 550px !important;
            background-color: #fff;
            -webkit-box-shadow: 0px 29px 147.5px 102.5px rgba(0, 0, 0, 0.05), 0px 29px 95px 0px rgba(0, 0, 0, 0.16);
            box-shadow: 0px 29px 147.5px 102.5px rgba(0, 0, 0, 0.05), 0px 29px 95px 0px rgba(0, 0, 0, 0.16);
            -webkit-perspective: 800px;
            perspective: 800px;
            -webkit-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }
    </style>
</head>


<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>Demo Admin</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="{{ route('admin.password.request') }}" method="post">
            @csrf

            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>{{ __('Reset Password') }}</h3>
            <input type="hidden" name="token" value="{{ $token }}">

            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label class="control-label">{{ __('E-Mail Address') }}</label>
                <input class="form-control" type="email" placeholder="Email" name="email" autofocus required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                       <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">{{ __('Password') }}</label>
                <input class="form-control" type="password" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">{{ __('Confirm Password') }}</label>
                <input class="form-control" type="password" placeholder="Password" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                       <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Reset Password') }}</button>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="{{ asset('public/backend/js/plugins/pace.min.js') }}"></script>
</body>
</html>
