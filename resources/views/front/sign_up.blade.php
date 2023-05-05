<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive | Sign Up/Sign In</title>
    @include('front.assets.links')
    <style>
        .ipn-subtitle{
            color: white !important;
        }
        sup {
            color: red;
        }
    </style>
</head>

<body>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    @include('front.assets.header')
        <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#017efa url(assets/img/page-title.png) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Create An Account</h2>
                    <span class="ipn-subtitle">Create an account or signin</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Login Form Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <!-- row Start -->
            <div class="row justify-content-center">

                <!-- Single blog Grid -->
                <div class="col-xl-6 col-lg-8 col-md-12">
                    <div class="vesh-detail-bloc">
                        <div class="vesh-detail-bloc-body pt-3">
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="register-tab" data-bs-toggle="pill"
                                            data-bs-target="#register" type="button" role="tab" aria-controls="register"
                                            aria-selected="false" tabindex="-1">Sign Up</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="signin-tab" data-bs-toggle="pill"
                                            data-bs-target="#signin" type="button" role="tab" aria-controls="signin"
                                            aria-selected="true">Sign In</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane" id="signin" role="tabpanel"
                                     aria-labelledby="signin-tab" tabindex="0">
                                    <div class="row gx-3 gy-4">
                                        <div class="modal-login-form">
                                            <form id="loginForm" method="post" action="{{route('loginUser')}}">
                                                @csrf
                                                <div class="form-floating mb-4">
                                                    <input type="number" class="form-control"
                                                           placeholder="Contact Number" name="contact_no" id="login_contact">
{{--                                                    <small id="contact_no_error"></small>--}}
                                                    <label>Contact Number</label>
                                                </div>

                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control"
                                                           placeholder="Password" name="password" id="login_password">
{{--                                                    <small id="password_error"></small>--}}
                                                    <label>Password</label>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit"
                                                            class="btn btn-primary full-width font--bold btn-lg">Log
                                                        In</button>
                                                </div>

                                                <div class="modal-flex-item mb-3">
                                                    <div class="modal-flex-first">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                   id="savepassword" name="savepassword">
                                                            <label class="form-check-label" for="savepassword">Save
                                                                Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-flex-last">
                                                        <a href="JavaScript:Void(0);">Forget Password?</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="social-login">
                                            <ul>
                                                <li><a href="JavaScript:Void(0);" class="btn connect-fb"><i
                                                            class="fa-brands fa-facebook"></i>Facebook</a></li>
                                                <li><a href="JavaScript:Void(0);" class="btn connect-google"><i
                                                            class="fa-brands fa-google"></i>Google</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="register" role="tabpanel"
                                     aria-labelledby="register-tab" tabindex="0">
                                    <div class="row gx-3 gy-4">
                                        <div class="modal-login-form">
                                            <form id="myForm" method="post" action="{{route('registerUser')}}">
                                            @csrf
                                                <div class="form-floating mb-4">
                                                    <select class="form-control" name="regsiter_as" id="register_as">
{{--                                                        <option value="" disabled>Select One</option>--}}
                                                        @foreach($clientTypes as $clientType)
                                                            <option value="{{$clientType->id}}">{{$clientType->client_type}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small id="register_as_error"></small>
                                                    <label>Register as: <sup>*</sup></label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <input type="number" class="form-control"
                                                           placeholder="Contact Number" name="contact_no"
                                                           maxlength="10" minlength="10" id="contact_no">
                                                    <small id="contact_no_error"></small>
                                                    <label>Contact Number: <sup>*</sup></label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control"
                                                           placeholder="Password" name="password" id="password">
                                                    <small id="password_error"></small>
                                                    <label>Password: <sup>*</sup></label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control"
                                                           placeholder="Password" name="confirmed_password" id="confirmed_password">
                                                    <small id="confirmed_password_error"></small>
                                                    <label>Confirm Password: <sup>*</sup></label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" id="create_an_account"
                                                            class="btn btn-primary full-width font--bold btn-lg">Create an Account</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- ============================ Login Form End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <section class="bg-cover call-action-container dark"
             style="background:#065eb5 url(assets/img/footer-bg-dark.png)no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                    <div class="call-action-wrap">
                        <div class="call-action-caption">
                            <h2 class="text-light">Are You Already Working With Us?</h2>
                            <p class="text-light">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                molestias</p>
                        </div>
                        <div class="call-action-form">
                            <form>
                                <div class="newsltr-form">
                                    <input type="text" class="form-control" placeholder="Enter Your email">
                                    <button type="button" class="btn btn-subscribe">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->

    <!-- ============================ Footer Start ================================== -->
    @include('front.assets.footer')
        <!-- ============================ Footer End ================================== -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


@include('front.assets.scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{url('/')}}/front/assets/js/custom_validation.js"></script>
</body>

<!-- Mirrored from themezhub.net/veshm-demo/veshm/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2023 10:27:46 GMT -->

</html>
