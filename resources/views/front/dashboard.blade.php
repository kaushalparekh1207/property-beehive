@section('home_page')
    active
    @endsection
@section('dashboard')
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
        <div class="page-title" style="background:#017efa url({{url('/')}}/front/assets/img/page-title.png) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <h2 class="ipt-title">@if(session('user')['name'] == NULL)
                            Hi,{{session('user')['role']}}
                        @else
                            Hi,{{session('user')['name']}}
                        @endif</h2>
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

{{--                    <div class="col-xl-9 col-lg-9 col-md-12">--}}
{{--                        <div class="dashboard-body">--}}

{{--                            <div class="row">--}}

{{--                                <div class="col-lg-4 col-md-6 col-sm-12">--}}
{{--                                    <div class="veshm-dash-wrapper widget-1">--}}
{{--                                        <div class="veshm-dash-icon">--}}
{{--                                            <div class="vsm-icon-lio bg-light-success text-success"><i class="fa-solid fa-sack-dollar"></i></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="veshm-dash-block">--}}
{{--                                            <div class="veshm-dash-block_content"><h4>$872M<span class="label font--medium label-purple me-2"><i class="fa-solid fa-arrow-trend-down"></i>07%</span></h4><h6>Total Income</h6></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-4 col-md-6 col-sm-12">--}}
{{--                                    <div class="veshm-dash-wrapper widget-2">--}}
{{--                                        <div class="veshm-dash-icon">--}}
{{--                                            <div class="vsm-icon-lio bg-light-danger text-danger"><i class="fa-brands fa-gg-circle"></i></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="veshm-dash-block">--}}
{{--                                            <div class="veshm-dash-block_content"><h4>2415</h4><h6>Total Property</h6></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-4 col-md-6 col-sm-12">--}}
{{--                                    <div class="veshm-dash-wrapper widget-3">--}}
{{--                                        <div class="veshm-dash-icon">--}}
{{--                                            <div class="vsm-icon-lio bg-light-warning text-warning"><i class="fa-solid fa-chart-line"></i></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="veshm-dash-block">--}}
{{--                                            <div class="veshm-dash-block_content"><h4>$.68M<span class="label font--medium label-success me-2"><i class="fa-solid fa-arrow-trend-up"></i>12%</span></h4><h6>Total Revenue</h6></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <!--  row -->--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h4 class="mb-0">Extra Area Chart</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <ul class="list-inline text-center m-t-40">--}}
{{--                                                <li>--}}
{{--                                                    <h5><i class="fa fa-circle me-1 text-warning"></i>Total Revenue</h5>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <h5><i class="fa fa-circle me-1 text-danger"></i>Total Property</h5>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <h5><i class="fa fa-circle me-1 text-success"></i>Total income</h5>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                            <div class="chart" id="line-chart" style="height:300px;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h6>New Clients</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="ground-client-list">--}}
{{--                                            <div class="ground-client-single-list">--}}
{{--                                                <div class="ground-client-first">--}}
{{--                                                    <div class="ground-client-thumb"><img src="assets/img/team-1.jpg" class="img-fluid circle" alt=""></div>--}}
{{--                                                    <div class="ground-client-caption">--}}
{{--                                                        <h5>Adam Leif Floyer</h5>--}}
{{--                                                        <span class="text-mid">Art Designer</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="ground-client-last">--}}
{{--                                                    <div class="ground-btn">--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-success text-success me-2"><i class="fa-brands fa-whatsapp"></i></a>--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-info text-info"><i class="fa-solid fa-phone"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground-client-single-list">--}}
{{--                                                <div class="ground-client-first">--}}
{{--                                                    <div class="ground-client-thumb"><img src="assets/img/team-2.jpg" class="img-fluid circle" alt=""></div>--}}
{{--                                                    <div class="ground-client-caption">--}}
{{--                                                        <h5>Ht. Wolf Gilwedkar</h5>--}}
{{--                                                        <span class="text-mid">PHP Developer</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="ground-client-last">--}}
{{--                                                    <div class="ground-btn">--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-success text-success me-2"><i class="fa-brands fa-whatsapp"></i></a>--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-info text-info"><i class="fa-solid fa-phone"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground-client-single-list">--}}
{{--                                                <div class="ground-client-first">--}}
{{--                                                    <div class="ground-client-thumb"><img src="assets/img/team-3.jpg" class="img-fluid circle" alt=""></div>--}}
{{--                                                    <div class="ground-client-caption">--}}
{{--                                                        <h5>Mr. Dhananjay Preet</h5>--}}
{{--                                                        <span class="text-mid">Product Designer</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="ground-client-last">--}}
{{--                                                    <div class="ground-btn">--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-success text-success me-2"><i class="fa-brands fa-whatsapp"></i></a>--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-info text-info"><i class="fa-solid fa-phone"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground-client-single-list">--}}
{{--                                                <div class="ground-client-first">--}}
{{--                                                    <div class="ground-client-thumb"><img src="assets/img/team-4.jpg" class="img-fluid circle" alt=""></div>--}}
{{--                                                    <div class="ground-client-caption">--}}
{{--                                                        <h5>Adam Wilsoryerd</h5>--}}
{{--                                                        <span class="text-mid">Web Designer</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="ground-client-last">--}}
{{--                                                    <div class="ground-btn">--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-success text-success me-2"><i class="fa-brands fa-whatsapp"></i></a>--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-info text-info"><i class="fa-solid fa-phone"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground-client-single-list">--}}
{{--                                                <div class="ground-client-first">--}}
{{--                                                    <div class="ground-client-thumb"><img src="assets/img/team-5.jpg" class="img-fluid circle" alt=""></div>--}}
{{--                                                    <div class="ground-client-caption">--}}
{{--                                                        <h5>Surya Prabhakar</h5>--}}
{{--                                                        <span class="text-mid">SEO Specialist</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="ground-client-last">--}}
{{--                                                    <div class="ground-btn">--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-success text-success me-2"><i class="fa-brands fa-whatsapp"></i></a>--}}
{{--                                                        <a href="JavaScript:Void(0);" class="btns bg-light-info text-info"><i class="fa-solid fa-phone"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- row -->--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-xl-8 col-lg-12 col-md-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h4 class="mb-0">Sold Property</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body p-0">--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table table-lg">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th>Name</th>--}}
{{--                                                        <th>Status</th>--}}
{{--                                                        <th>Price</th>--}}
{{--                                                        <th>Date Created</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}

{{--                                                    <tbody>--}}
{{--                                                    <tr>--}}
{{--                                                        <td><a href="#" class="font--medium"><img src="assets/img/prt-1.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Luxury House</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-success bg-light-success">Paid</div></td>--}}
{{--                                                        <td class="prt-fgi">$120M</td>--}}
{{--                                                        <td>04/10/2013</td>--}}
{{--                                                    </tr>--}}

{{--                                                    <tr>--}}
{{--                                                        <td><a href="#" class="font--medium"><img src="assets/img/prt-2.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Sargun Apartment</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-warning bg-light-warning">Pending</div></td>--}}
{{--                                                        <td class="prt-fgi">$210M</td>--}}
{{--                                                        <td>05/08/2014</td>--}}
{{--                                                    </tr>--}}

{{--                                                    <tr>--}}
{{--                                                        <td><a href="#" class="font--medium"><img src="assets/img/prt-3.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Preet Silver City</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-danger bg-light-danger">Cancel</div></td>--}}
{{--                                                        <td class="prt-fgi">$850M</td>--}}
{{--                                                        <td>11/05/2015</td>--}}
{{--                                                    </tr>--}}

{{--                                                    <tr>--}}
{{--                                                        <td><a href="#" class="font--medium"><img src="assets/img/prt-4.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Mount See Villa</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-success bg-light-success">Paid</div></td>--}}
{{--                                                        <td class="prt-fgi">$144M</td>--}}
{{--                                                        <td>06/09/2016</td>--}}
{{--                                                    </tr>--}}

{{--                                                    <tr>--}}
{{--                                                        <td><a href="#" class="font--medium"><img src="assets/img/prt-5.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Mount See Villa</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-info bg-light-info">On Hold</div></td>--}}
{{--                                                        <td class="prt-fgi">$410M</td>--}}
{{--                                                        <td>06/09/2016</td>--}}
{{--                                                    </tr>--}}

{{--                                                    <tr>--}}
{{--                                                        <td><a href="#" class="font--medium"><img src="assets/img/prt-6.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Mount See Villa</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-success bg-light-success">Paid</div></td>--}}
{{--                                                        <td class="prt-fgi">$317M</td>--}}
{{--                                                        <td>06/09/2016</td>--}}
{{--                                                    </tr>--}}

{{--                                                    <tr>--}}
{{--                                                        <td><a href="#"><img src="assets/img/prt-7.png" class="img-fluid rounded mr-2" width="60" alt="Avatar">Mount See Villa</a></td>--}}
{{--                                                        <td><div class="d-inline-flex label text-danger bg-light-danger">Cancel</div></td>--}}
{{--                                                        <td class="prt-fgi">$115M</td>--}}
{{--                                                        <td>06/09/2016</td>--}}
{{--                                                    </tr>--}}

{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h6>Notifications</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="ground-list ground-list-hove">--}}
{{--                                            <div class="ground ground-single-list">--}}
{{--                                                <a href="JavaScript:Void(0);">--}}
{{--                                                    <div class="btn-circle-40 text-warning bg-light-warning"><i class="fas fa-home"></i></div>--}}
{{--                                                </a>--}}

{{--                                                <div class="ground-content">--}}
{{--                                                    <h6><a href="#">Your listing <strong>Azreal Modern</strong> has been approved!.</a></h6>--}}
{{--                                                    <span class="small">Just Now</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground ground-single-list">--}}
{{--                                                <a href="#">--}}
{{--                                                    <div class="btn-circle-40 text-danger bg-light-danger"><i class="fa-solid fa-comments"></i></div>--}}
{{--                                                </a>--}}

{{--                                                <div class="ground-content">--}}
{{--                                                    <h6><a href="#">Litha Lynes left a review on <strong>Renovated Apartment</strong></a></h6>--}}
{{--                                                    <span class="small">20 min ago</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground ground-single-list">--}}
{{--                                                <a href="#">--}}
{{--                                                    <div class="btn-circle-40 text-info bg-light-info"><i class="fa-solid fa-heart"></i></div>--}}
{{--                                                </a>--}}

{{--                                                <div class="ground-content">--}}
{{--                                                    <h6><a href="#">Someone bookmark your View listing!<strong>Sargun Villa Bay</strong></a></h6>--}}
{{--                                                    <span class="small">1 day ago</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground ground-single-list">--}}
{{--                                                <a href="#">--}}
{{--                                                    <div class="btn-circle-40 text-danger bg-light-danger"><i class="fa-solid fa-thumbs-up"></i></div>--}}
{{--                                                </a>--}}

{{--                                                <div class="ground-content">--}}
{{--                                                    <h6><a href="#">Your listing <strong>Modern Family Home</strong> has been approved!.</a></h6>--}}
{{--                                                    <span class="small">10 days ago</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="ground ground-single-list">--}}
{{--                                                <a href="#">--}}
{{--                                                    <div class="btn-circle-40 text-success bg-light-success"><i class="fa-solid fa-comment-dots"></i></div>--}}
{{--                                                </a>--}}

{{--                                                <div class="ground-content">--}}
{{--                                                    <h6><a href="#">Adam Brown left a review on <strong>Renovated Apartment</strong></a></h6>--}}
{{--                                                    <span class="small">Just Now</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <!-- row -->--}}

{{--                        </div>--}}
{{--                    </div>--}}

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

    </body>

    </html>
