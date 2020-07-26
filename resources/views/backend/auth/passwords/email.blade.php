<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Demo | Admin-Password Reset</title>

  <link rel="shortcut icon" href="{!! asset('public/backend/assets/images/favicon.ico') !!}">

  <!-- Bootstrap CSS -->
  <link href="{!! asset('public/backend/assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome CSS -->
  <link href="{!! asset('public/backend/assets/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />

  <!-- Custom CSS -->
  <link href="{!! asset('public/backend/assets/css/style.css') !!}" rel="stylesheet" type="text/css" />

  <link href="{!! asset('public/backend/assets/css/login.css') !!}" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="container login-margin">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('admin.password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>