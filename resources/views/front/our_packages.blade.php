@section('home_page')
    active
@endsection
@section('our_packages')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Properties</title>
    @include('front.assets.links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


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

                        <h2 class="ipt-title">Hi, {{ session('user')['role'] }}</h2>
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
                                <div class="frm_submit_block">
                                    <section>
                                        <div class="container">

                                            <div class="row justify-content-center">
                                                <div class="col-lg-7 col-md-10 text-center">
                                                    <div class="sec-heading center">
                                                        <h2>See our packages</h2>
                                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus
                                                            qui blanditiis praesentium voluptatum deleniti atque
                                                            corrupti quos dolores</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gx-4 gy-4">

                                                <!-- Single Package -->
                                                {{-- <div class="col-xl-4 collg-4 col-md-4 col-sm-12 col-12"> --}}
                                                <div class="col-sm-12">

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="swiper mySwiper">
                                                                <div class="swiper-wrapper">
                                                                    @foreach ($packages as $package)
                                                                        <div class="swiper-slide">
                                                                            <div class="veshm-pricing-box">
                                                                                <div class="veshm-pricing-header">
                                                                                    <div class="vesh-prc-icon">
                                                                                        <i class="fa-solid fa-fire"></i>
                                                                                    </div>
                                                                                    <div class="vesh-prc-icon-caption">
                                                                                        <span
                                                                                            class="standard">{{ $package->package_type }}</span>
                                                                                        <h5>{{ $package->package_name }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="veshm-pricing-middle">
                                                                                    <div class="veshm-prc-title">
                                                                                        <h2><sup>₹</sup>{{ $package->price }}<sub>/
                                                                                                Month</sub></h2>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="veshm-pricing-content">
                                                                                    <ul>
                                                                                        <li><i
                                                                                                class="fa-solid fa-circle-check"></i>{{ $package->number_of_listing_property }}
                                                                                            Listings
                                                                                        </li>
                                                                                        <li><i
                                                                                                class="fa-solid fa-circle-check"></i>5
                                                                                            Buyer</li>
                                                                                        <li><i
                                                                                                class="fa-solid fa-circle-check"></i>{{ $package->number_of_ads }}
                                                                                            Ads</li>
                                                                                        <li><i
                                                                                                class="fa-solid fa-circle-check"></i>Contact
                                                                                            With
                                                                                            Agent</li>
                                                                                        <li class="deactive"><i
                                                                                                class="fa-solid fa-circle-xmark"></i>No
                                                                                            Support
                                                                                        </li>
                                                                                        <li class="deactive"><i
                                                                                                class="fa-solid fa-circle-xmark"></i>Dashboard
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="veshm-pricing-footer">
                                                                                    <button class="btn btn-subscribe"
                                                                                        type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#pay">Subscribe
                                                                                        Now</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="swiper-slide">
                                                                        <div class="veshm-pricing-box featured">
                                                                            <div class="veshm-pricing-header">
                                                                                <div class="vesh-prc-icon">
                                                                                    <i class="fa-solid fa-bahai"></i>
                                                                                </div>
                                                                                <div class="vesh-prc-icon-caption">
                                                                                    <span class="golden">For Team</span>
                                                                                    <h5>Golden Plan</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-middle">
                                                                                <div class="veshm-prc-title">
                                                                                    <h2><sup>₹</sup>499<sub>/
                                                                                            Month</sub></h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-content">
                                                                                <ul>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>5+
                                                                                        Listings
                                                                                    </li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>15
                                                                                        Buyer
                                                                                    </li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>2
                                                                                        Ads</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>Contact
                                                                                        With
                                                                                        Agent</li>
                                                                                    <li class="deactive"><i
                                                                                            class="fa-solid fa-circle-xmark"></i>No
                                                                                        Support
                                                                                    </li>
                                                                                    <li class="deactive"><i
                                                                                            class="fa-solid fa-circle-xmark"></i>Admin
                                                                                        Dashboard</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="veshm-pricing-footer">
                                                                                <button class="btn btn-subscribe"
                                                                                    type="button">Subscribe
                                                                                    Now</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="veshm-pricing-box">
                                                                            <div class="veshm-pricing-header">
                                                                                <div class="vesh-prc-icon">
                                                                                    <i class="fa-solid fa-gem"></i>
                                                                                </div>
                                                                                <div class="vesh-prc-icon-caption">
                                                                                    <span class="platinum">For
                                                                                        Organization</span>
                                                                                    <h5>Platinum Plan</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-middle">
                                                                                <div class="veshm-prc-title">
                                                                                    <h2><sup>₹</sup>999<sub>/
                                                                                            Month</sub></h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-content">
                                                                                <ul>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>10+
                                                                                        Listings
                                                                                    </li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>25
                                                                                        Buyer
                                                                                    </li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>10
                                                                                        Ads</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>Contact
                                                                                        With
                                                                                        Agent</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>24x7
                                                                                        Fully
                                                                                        Support</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>Admin
                                                                                        Dashboard</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="veshm-pricing-footer">
                                                                                <button class="btn btn-subscribe"
                                                                                    type="button">Subscribe
                                                                                    Now</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="veshm-pricing-box">
                                                                            <div class="veshm-pricing-header">
                                                                                <div class="vesh-prc-icon">
                                                                                    <i class="fa-solid fa-fire"></i>
                                                                                </div>
                                                                                <div class="vesh-prc-icon-caption">
                                                                                    <span class="standard">For
                                                                                        Personal</span>
                                                                                    <h5>Standard Plan</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-middle">
                                                                                <div class="veshm-prc-title">
                                                                                    <h2><sup>₹</sup>199<sub>/
                                                                                            Month</sub></h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-content">
                                                                                <ul>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>2+
                                                                                        Listings
                                                                                    </li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>5
                                                                                        Buyer</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>0
                                                                                        Ads</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>Contact
                                                                                        With
                                                                                        Agent</li>
                                                                                    <li class="deactive"><i
                                                                                            class="fa-solid fa-circle-xmark"></i>No
                                                                                        Support
                                                                                    </li>
                                                                                    <li class="deactive"><i
                                                                                            class="fa-solid fa-circle-xmark"></i>Dashboard
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="veshm-pricing-footer">
                                                                                <button class="btn btn-subscribe"
                                                                                    type="button">Subscribe
                                                                                    Now</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="veshm-pricing-box">
                                                                            <div class="veshm-pricing-header">
                                                                                <div class="vesh-prc-icon">
                                                                                    <i class="fa-solid fa-fire"></i>
                                                                                </div>
                                                                                <div class="vesh-prc-icon-caption">
                                                                                    <span class="standard">For
                                                                                        Personal</span>
                                                                                    <h5>Standard Plan</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-middle">
                                                                                <div class="veshm-prc-title">
                                                                                    <h2><sup>₹</sup>199<sub>/
                                                                                            Month</sub></h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="veshm-pricing-content">
                                                                                <ul>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>2+
                                                                                        Listings
                                                                                    </li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>5
                                                                                        Buyer</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>0
                                                                                        Ads</li>
                                                                                    <li><i
                                                                                            class="fa-solid fa-circle-check"></i>Contact
                                                                                        With
                                                                                        Agent</li>
                                                                                    <li class="deactive"><i
                                                                                            class="fa-solid fa-circle-xmark"></i>No
                                                                                        Support
                                                                                    </li>
                                                                                    <li class="deactive"><i
                                                                                            class="fa-solid fa-circle-xmark"></i>Dashboard
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="veshm-pricing-footer">
                                                                                <button class="btn btn-subscribe"
                                                                                    type="button">Subscribe
                                                                                    Now</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="swiper-pagination"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>



                                                {{-- </div> --}}

                                                {{-- <!-- Single Package -->
                                                <div class="col-xl-4 collg-4 col-md-4 col-sm-12 col-12">
                                                    <div class="veshm-pricing-box featured">
                                                        <div class="veshm-pricing-header">
                                                            <div class="vesh-prc-icon">
                                                                <i class="fa-solid fa-bahai"></i>
                                                            </div>
                                                            <div class="vesh-prc-icon-caption">
                                                                <span class="golden">For Team</span>
                                                                <h5>Golden Plan</h5>
                                                            </div>
                                                        </div>
                                                        <div class="veshm-pricing-middle">
                                                            <div class="veshm-prc-title">
                                                                <h2><sup>₹</sup>499<sub>/ Month</sub></h2>
                                                            </div>
                                                        </div>
                                                        <div class="veshm-pricing-content">
                                                            <ul>
                                                                <li><i class="fa-solid fa-circle-check"></i>5+ Listings
                                                                </li>
                                                                <li><i class="fa-solid fa-circle-check"></i>15 Buyer
                                                                </li>
                                                                <li><i class="fa-solid fa-circle-check"></i>2 Ads</li>
                                                                <li><i class="fa-solid fa-circle-check"></i>Contact With
                                                                    Agent</li>
                                                                <li class="deactive"><i
                                                                        class="fa-solid fa-circle-xmark"></i>No Support
                                                                </li>
                                                                <li class="deactive"><i
                                                                        class="fa-solid fa-circle-xmark"></i>Admin
                                                                    Dashboard</li>
                                                            </ul>
                                                        </div>
                                                        <div class="veshm-pricing-footer">
                                                            <button class="btn btn-subscribe" type="button">Subscribe
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Package -->
                                                <div class="col-xl-4 collg-4 col-md-4 col-sm-12 col-12">
                                                    <div class="veshm-pricing-box">
                                                        <div class="veshm-pricing-header">
                                                            <div class="vesh-prc-icon">
                                                                <i class="fa-solid fa-gem"></i>
                                                            </div>
                                                            <div class="vesh-prc-icon-caption">
                                                                <span class="platinum">For Organization</span>
                                                                <h5>Platinum Plan</h5>
                                                            </div>
                                                        </div>
                                                        <div class="veshm-pricing-middle">
                                                            <div class="veshm-prc-title">
                                                                <h2><sup>₹</sup>999<sub>/ Month</sub></h2>
                                                            </div>
                                                        </div>
                                                        <div class="veshm-pricing-content">
                                                            <ul>
                                                                <li><i class="fa-solid fa-circle-check"></i>10+ Listings
                                                                </li>
                                                                <li><i class="fa-solid fa-circle-check"></i>25 Buyer
                                                                </li>
                                                                <li><i class="fa-solid fa-circle-check"></i>10 Ads</li>
                                                                <li><i class="fa-solid fa-circle-check"></i>Contact With
                                                                    Agent</li>
                                                                <li><i class="fa-solid fa-circle-check"></i>24x7 Fully
                                                                    Support</li>
                                                                <li><i class="fa-solid fa-circle-check"></i>Admin
                                                                    Dashboard</li>
                                                            </ul>
                                                        </div>
                                                        <div class="veshm-pricing-footer">
                                                            <button class="btn btn-subscribe" type="button">Subscribe
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                            </div>

                                        </div>
                                    </section>
                                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
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
