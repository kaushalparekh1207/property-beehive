@section('home_page')
    active
@endsection
@section('inqury_list')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inquiry List</title>
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
                                <div class="frm_submit_block">
                                    <section>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="dashboard_property">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead style="background: #FA962A; color:antiquewhite">
                                                                    <tr>
                                                                        <th scope="col">Property Name</th>
                                                                        <th scope="col" class="m2_hide">Client Name
                                                                        </th>
                                                                        <th scope="col" class="m2_hide">Client
                                                                            Contact No</th>
                                                                        <th scope="col" class="m2_hide">
                                                                            Client Email Id</th>
                                                                        {{-- <th scope="col" class="m2_hide">Area(Sq Ft)
                                                                        </th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Action</th> --}}
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- tr block -->
                                                                    @if ($InquiryList->count() == 0)
                                                                        <tr>
                                                                            <th>
                                                                                <h5 style="text-align:center;">
                                                                                    No
                                                                                    Record Found </h5>
                                                                            </th>
                                                                        </tr>
                                                                    @else
                                                                        @foreach ($InquiryList as $inquiry)
                                                                            <tr>
                                                                                {{-- <td>
                                                                                <div class="dash_prt_wrap">
                                                                                    <div class="dash_prt_thumb">
                                                                                        @if ($residential->cover_image == null)
                                                                                            <img src={{ url('storage/public/property/banner_image/no.jpg') }}
                                                                                                class="img-fluid"
                                                                                                alt="">
                                                                                        @else
                                                                                            <img src={{ url('storage/public/property/banner_image/' . $residential->cover_image) }}
                                                                                                class="img-fluid"
                                                                                                alt="">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </td> --}}
                                                                                <td class="m2_hide">
                                                                                    <div class="dash_prt_caption">
                                                                                        <h5>{{ $inquiry->name_of_project }}
                                                                                        </h5>
                                                                                        {{-- <div class="prt_dashb_lot">
                                                                                        {{ $residential->locality }}
                                                                                    </div>
                                                                                    <div class="prt_dash_rate">
                                                                                        <span>{{ $residential->expected_price }}/-</span>
                                                                                    </div> --}}
                                                                                    </div>
                                                                                </td>
                                                                                <td class="m2_hide">
                                                                                    <div class="prt_leads">
                                                                                        <h6>
                                                                                            {{ $inquiry->name }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="m2_hide">
                                                                                    <div class="_leads_view">
                                                                                        <h5 class="up">
                                                                                            {{ $inquiry->contact }}
                                                                                        </h5>
                                                                                    </div>
                                                                                    {{-- <div class="_leads_view_title">
                                                                                    @if ($residential->total_bedrooms != null)
                                                                                        <span>{{ $residential->total_bedrooms }}
                                                                                            Rooms</span>
                                                                                    @endif
                                                                                    @if ($residential->total_bathrooms != null)
                                                                                        <span>{{ $residential->total_bathrooms }}
                                                                                            Bathrooms</span>
                                                                                    @endif
                                                                                </div> --}}
                                                                                </td>
                                                                                <td class="m2_hide">
                                                                                    <div class="_leads_posted">
                                                                                        <h5>{{ $inquiry->email }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </td>
                                                                                {{-- <td>
                                                                                <div class="_leads_status"><span
                                                                                        class="active">Active</span>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="_leads_action">
                                                                                    <a href="#"><i
                                                                                            class="fas fa-edit"></i></a>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-trash"></i></a>
                                                                                </div>
                                                                            </td> --}}
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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
