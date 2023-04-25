<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 13:19:49 GMT -->

<head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{ url('/') }}/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/pages/waves/css/waves.min.css" type="text/css"
        media="all">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/icon/feather/css/feather.css">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/pages.css">
</head>

<body themebg-pattern="theme1">

    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="login-block">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <form class="md-float-material form-material" action="{{ route('validateLogin') }}" method="POST">
                        @csrf
                        <div class="text-center">
                            {{-- <img src="{{ url('/') }}/assets/images/logo.png" alt="logo.png"> --}}
                            <h5>Property Beehive</h5>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                {{-- <div class="row m-b-20">
                                    <div class="col-md-6">
                                        <button class="btn btn-facebook m-b-20 btn-block"><i
                                                class="icofont icofont-social-facebook"></i>facebook</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-twitter m-b-20 btn-block"><i
                                                class="icofont icofont-social-twitter"></i>twitter</button>
                                    </div>
                                </div> --}}
                                <p class="text-muted text-center p-b-5">Sign in with your account</p>
                                <div class="form-group form-primary">
                                    <input type="text" name="contact_no" id="contact_no"
                                        @if (Cookie::has('saved_input')) value="{{ Cookie::get('saved_input') }}" class="form-control fill" @else class="form-control" @endif
                                        required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Contact Number</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" id="password"
                                        @if (Cookie::has('saved_password')) value="{{ Cookie::get('saved_password') }}" class="form-control fill" @else class="form-control" @endif
                                        required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" name="remember"
                                                    @if (Cookie::has('saved_input')) checked="checked" @else checked="" @endif>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right float-right">
                                            <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                    </div>
                                </div>
                                {{-- <p class="text-inverse text-left">Don't have an account?<a
                                        href="auth-sign-up-social.html"> <b>Register here </b></a>for free!</p> --}}
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        </div>

    </section>


    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ url('/') }}/assets/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ url('/') }}/assets/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ url('/') }}/assets/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ url('/') }}/assets/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ url('/') }}/assets/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


    <script type="text/javascript" src="{{ url('/') }}/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ url('/') }}/assets/pages/waves/js/waves.min.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/bower_components/jquery-slimscroll/js/jquery.slimscroll.js">
    </script>

    <script type="text/javascript" src="{{ url('/') }}/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/bower_components/modernizr/js/css-scrollbars.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/js/common-pages.js"></script>
</body>

</html>
