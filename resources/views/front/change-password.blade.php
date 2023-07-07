@section('home_page')
    active
@endsection
@section('changePassword')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive</title>
    @include('front.assets.links')

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


        <!-- ============================ Top Banner Start================================== -->
        <div class="page-title"
            style="background:#017efa url({{ url('/') }}/front/assets/img/page-title.png) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <h2 class="ipt-title">
                            @if (session('user')['name'] == null)
                                Hi,{{ session('user')['role'] }}
                            @else
                                Hi,{{ session('user')['name'] }}
                            @endif
                        </h2>
                        <span class="ipn-subtitle">Manage your profile and view property</span>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Top Banner End ================================== -->

        <!-- ============================= Explore Dashboard =============================== -->
        <section class="gray-simple pt-5 pb-5">
            <div class="container-fluid">

                <div class="row">

                    @include('front.assets.sidepanel')

                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="dashboard-body">

                            <div class="dashboard-wraper">

                                <!-- Basic Information -->
                                <form class="form-horizontal" id="myForm2" method="POST"
                                    action="{{ route('postChangePassword') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ session('user')['id'] }}">
                                    <div class="frm_submit_block">
                                        <h4>Change Your Password</h4>
                                        <div class="frm_submit_wrap">
                                            <div class="row">

                                                <div class="form-group col-lg-12 col-md-6">
                                                    <label>Old Password</label>
                                                    <input type="password" class="form-control" name="current_password">
                                                    <small id="current_password_error"></small>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control" name="new_password"
                                                        id="new_password">
                                                    <small id="new_password_error"></small>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Confirm password</label>
                                                    <input type="password" class="form-control"
                                                        name="new_password_confirmation">
                                                    <small id="new_password_confirmation_error"></small>
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12">
                                                    <button class="btn btn-primary" type="submit"
                                                        id="PasswordChange">Save Changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        @include('front.assets.footer')

        @include('front.assets.modal')

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    @include('front.assets.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('/') }}/front/assets/js/custom_validation.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-select2").select2({
                closeOnSelect: false
            });
            $(".js-select2-multi").select2({
                closeOnSelect: false
            });
        });
    </script>

</body>

</html>
