@php
    use App\Models\CommercialProperty;
    use App\Models\IndustrialProperty;
    use App\Models\ResidentialProperty;
    use App\Models\AgriculturalProperty;
@endphp@section('home_page')
active
@endsection
@section('my_properties')
active
@endsection
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>My Properties</title>
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
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="dashboard_property">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead style="background: #FA962A; color:antiquewhite">
                                                                <tr>
                                                                    <th scope="col">Image</th>
                                                                    <th scope="col" class="m2_hide">Details</th>
                                                                    <th scope="col" class="m2_hide">For</th>
                                                                    <th scope="col" class="m2_hide">
                                                                        Type</th>
                                                                    <th scope="col" class="m2_hide">Area(Sq Ft)
                                                                    </th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- tr block -->
                                                                @foreach ($allPropertyDetails as $property)
                                                                    @php
                                                                        $commercial_property = CommercialProperty::where('flag', 1)->get();
                                                                        $residential_property = ResidentialProperty::where('flag', 1)->get();
                                                                        $industrial_property = IndustrialProperty::where('flag', 1)->get();
                                                                        $agriculture_property = AgriculturalProperty::where('flag', 1)->get();
                                                                    @endphp
                                                                    <tr>
                                                                        <td>
                                                                            <div class="dash_prt_wrap">
                                                                                <div class="dash_prt_thumb">
                                                                                    @if ($property->cover_image == null)
                                                                                        <img src={{ url('front\assets\img\ag-10.png') }}
                                                                                            class="img-fluid"
                                                                                            alt="">
                                                                                    @else
                                                                                        <img src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                                                            class="img-fluid"
                                                                                            alt="">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="m2_hide">
                                                                            <div class="dash_prt_caption">
                                                                                <h5>{{ $property->name_of_project }}
                                                                                </h5>
                                                                                <div class="prt_dashb_lot">
                                                                                    {{ $property->locality }}
                                                                                </div>
                                                                                <div class="prt_dash_rate">
                                                                                    <span
                                                                                        style="color: red">₹@php
                                                                                            echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                                                        @endphp/-</span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="m2_hide">
                                                                            <div class="prt_leads">
                                                                                @if ($property->property_status == 'Sale')
                                                                                    <h6 style="color: #dc3545;">
                                                                                        {{ $property->property_status }}
                                                                                    </h6>
                                                                                @elseif($property->property_status == 'Rent/Lease')
                                                                                    <h6 style="color: #003e70;">
                                                                                        {{ $property->property_status }}
                                                                                    </h6>
                                                                                @elseif($property->property_status == 'PG/Hostel')
                                                                                    <h6 style="color:#009245;">
                                                                                        {{ $property->property_status }}
                                                                                    </h6>
                                                                                @endif
                                                                            </div>
                                                                            {{-- <div class="prt_leads_list">
                                                                                    <ul>
                                                                                        <li><a href="#"><img
                                                                                                    src="assets/img/team-1.jpg"
                                                                                                    class="img-fluid circle"
                                                                                                    alt=""></a>
                                                                                        </li>
                                                                                        <li><a href="#"><img
                                                                                                    src="assets/img/team-2.jpg"
                                                                                                    class="img-fluid circle"
                                                                                                    alt=""></a>
                                                                                        </li>
                                                                                        <li><a href="#"
                                                                                                class="_leads_name style-1">K</a>
                                                                                        </li>
                                                                                        <li><a href="#"><img
                                                                                                    src="assets/img/team-3.jpg"
                                                                                                    class="img-fluid circle"
                                                                                                    alt=""></a>
                                                                                        </li>
                                                                                        <li><a href="#"
                                                                                                class="leades_more">14+</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div> --}}
                                                                        </td>
                                                                        <td class="m2_hide">
                                                                            <div class="_leads_view">
                                                                                <h5 class="up">
                                                                                    {{ $property->property_category_name }}
                                                                                </h5>
                                                                            </div>
                                                                            @foreach ($residential_property as $residential)
                                                                                @if ($property->id == $residential->property_master_id)
                                                                                    <div class="_leads_view_title">
                                                                                        @if ($residential->total_bedrooms != null)
                                                                                            <span>{{ $residential->total_bedrooms }}
                                                                                                Rooms</span>
                                                                                        @endif
                                                                                        @if ($residential->total_bathrooms != null)
                                                                                            <span>{{ $residential->total_bathrooms }}
                                                                                                Bathrooms</span>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ($commercial_property as $commercial)
                                                                                @if ($property->id == $commercial->property_master_id)
                                                                                    <div class="_leads_view_title">
                                                                                        @if ($commercial->total_floor != null)
                                                                                            <span>{{ $commercial->total_floor }}
                                                                                                Rooms</span>
                                                                                        @endif
                                                                                        @if ($commercial->total_washrooms != null)
                                                                                            <span>{{ $commercial->total_washrooms }}
                                                                                                Washrooms</span>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ($industrial_property as $industrial)
                                                                                @if ($property->id == $industrial->property_master_id)
                                                                                    <div class="_leads_view_title">
                                                                                        @if ($industrial->floor_allowed_for_construction != null)
                                                                                            <span>{{ $industrial->floor_allowed_for_construction }}
                                                                                                Floors Allowed For
                                                                                                Build</span>
                                                                                        @endif
                                                                                        {{-- @if ($industrial->total_washrooms != null)
                                                                                            <span>{{ $industrial->total_washrooms }}
                                                                                                Washrooms</span>
                                                                                        @endif --}}
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            {{-- @foreach ($agriculture_property as $agriculture)
                                                                                @if ($property->id == $agriculture->property_master_id)
                                                                                    <div class="_leads_view_title">
                                                                                        @if ($agriculture->plot_area != null)
                                                                                            <span>{{ $agriculture->plot_area }}
                                                                                                Land Area</span>
                                                                                        @endif
                                                                                        @if ($agriculture->total_washrooms != null)
                                                                                            <span>{{ $agriculture->total_washrooms }}
                                                                                                Washrooms</span>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach --}}
                                                                        </td>
                                                                        <td class="m2_hide">
                                                                            @foreach ($residential_property as $residential)
                                                                                @if ($property->id == $residential->property_master_id)
                                                                                    <div class="_leads_posted">
                                                                                        @if ($residential->carpet_area != null)
                                                                                            <h5>{{ $residential->carpet_area }}
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5>Not Available
                                                                                            </h5>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ($commercial_property as $commercial)
                                                                                @if ($property->id == $commercial->property_master_id)
                                                                                    <div class="_leads_posted">
                                                                                        @if ($commercial->carpet_area != null)
                                                                                            <h5>{{ $commercial->carpet_area }}
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5>Not Available
                                                                                            </h5>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ($industrial_property as $industrial)
                                                                                @if ($property->id == $industrial->property_master_id)
                                                                                    <div class="_leads_posted">
                                                                                        @if ($industrial->plot_area != null)
                                                                                            <h5>{{ $industrial->plot_area }}
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5>Not Available
                                                                                            </h5>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ($agriculture_property as $agriculture)
                                                                                @if ($property->id == $agriculture->property_master_id)
                                                                                    <div class="_leads_posted">
                                                                                        @if ($agriculture->plot_area != null)
                                                                                            <h5>{{ $agriculture->plot_area }}
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5>Not Available
                                                                                            </h5>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            {{-- <div class="_leads_view_title"><span>12
                                                                                        Days
                                                                                        ago</span></div> --}}
                                                                        </td>
                                                                        <td>
                                                                            <div class="_leads_status"><span
                                                                                    class="active">Active</span>
                                                                            </div>
                                                                            {{-- <div class="_leads_view_title">
                                                                                    <span>Till 12
                                                                                        Oct</span>
                                                                                </div> --}}
                                                                        </td>
                                                                        <td>
                                                                            <div class="_leads_action">
                                                                                <a href="#"><i
                                                                                        class="fas fa-edit"></i></a>
                                                                                <a
                                                                                    href="{{ route('destroyMyProperties', $property->id) }}"><i
                                                                                        class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
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
