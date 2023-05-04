<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Property</b>Beehive</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to your Account</p>

            <form action="{{route('validateLogin')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="number" name="contact_no" id="contact_no" class="form-control" placeholder="Contact Number" @if (Cookie::has('saved_input')) value="{{ Cookie::get('saved_input') }}" class="form-control fill" @else class="form-control" @endif>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" @if (Cookie::has('saved_password')) value="{{ Cookie::get('saved_password') }}" class="form-control fill" @else class="form-control" @endif>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" @if (Cookie::has('saved_input')) checked="checked" @else checked="" @endif>
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

{{--            <div class="social-auth-links text-center mt-2 mb-3">--}}
{{--                <a href="#" class="btn btn-block btn-primary">--}}
{{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--                </a>--}}
{{--                <a href="#" class="btn btn-block btn-danger">--}}
{{--                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--                </a>--}}
{{--            </div>--}}
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('/') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
