@php
    use App\Models\CommercialProperty;
    use App\Models\IndustrialProperty;
    use App\Models\ResidentialProperty;
    use App\Models\AgriculturalProperty;
@endphp
@section('home_page')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive</title>
    @include('front.assets.links')
    <script></script>
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


        <!-- ============================ Hero Banner  Start================================== -->
        <div class="image-cover hero-header"
            style="background:url({{ url('/') }}/front/assets/img/brand/banner-image.jpg) no-repeat;"
            data-overlay="6">
            <div class="container">

                <div class="inner-banner-text text-center">
                    <h1>Discover A Beautiful<br>Place With Us</h1>
                    <p class="text-light">Would you explore nature paradise in the world, let't find the best property
                        in California withus.</p>
                </div>

                <div class="full-search-2 mt-5">
                    <form id="property_result" action="{{ route('property_result_search') }}" method="post">
                        @csrf
                        <div class="btn-group-horizontal " role="group"
                            aria-label="horizontal radio toggle button group" style="margin-left: 100px;">
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio1"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio1"><a style="color: #fff;"
                                    href="{{ route('front_buy') }}">Buy</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio2"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio2"><a style="color: #fff;"
                                    href="{{ route('front_rent') }}">Rent</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio3"><a style="color: #fff;"
                                    href="{{ url('/') }}/pg">PG</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio4"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio4"><a style="color: #fff;"
                                    href="{{ url('/') }}/land">Land</a></label>
                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio5"
                                autocomplete="off">
                            <label class="btn" for="vbtn-radio5"><a style="color: #fff;"
                                    href="{{ url('/') }}/commercial">Commercial</a></label>
                        </div>
                        <div class="hero-search-content colored">
                            <div class="row classic-search-box m-0 gx-2">
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="city_id" id="city_id_dropdown">
                                                <option value="">Select City</option>
                                                @foreach ($city as $cities)
                                                    <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="taluka_id" id="taluka_id_dropdown">
                                                <option value="">Select Taluka</option>
                                                @foreach ($taluka as $talukas)
                                                    <option value="{{ $talukas->id }}">{{ $talukas->taluka }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            {{-- <select class="form-control" name="property_type_id"> --}}
                                            <select class="js-select2" name="property_type_id"
                                                id="property_type_dropdown">
                                                <option value="">Property types</option>
                                                @foreach ($propertyType as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->property_category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="fliox-search-wiop">
                                        <div class="form-group me-2">
                                            <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                data-bs-target="#filter" class="btn btn-filter-search"><i
                                                    class="fa-solid fa-filter"></i>Filter</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary full-width">Search</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->

        <!-- ============================= Explore Categories =============================== -->
        <section>
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-10 text-center">
                        <div class="sec-heading center">
                            <h2>Properties on Beehive</h2>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content gx-3 gy-4">

                    <!-- Single Property -->
                    @foreach ($properties as $property)
                        @php
                            $commercial_property = CommercialProperty::where('flag', 1)->get();
                            $residential_property = ResidentialProperty::where('flag', 1)->get();
                            $industrial_property = IndustrialProperty::where('flag', 1)->get();
                            $agriculture_property = AgriculturalProperty::where('flag', 1)->get();
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="veshm-list-wraps">
                                @if ($property->property_status == 'Sale')
                                    <div class="veshm-type fr-sale"><span>For {{ $property->property_status }}</span>
                                    </div>
                                @elseif($property->property_status == 'Rent/Lease')
                                    <div class="veshm-type"><span>For {{ $property->property_status }}</span></div>
                                @elseif($property->property_status == 'PG/Hostel')
                                    <div class="veshm-type fr-pg"><span>For {{ $property->property_status }}</span>
                                    </div>
                                @endif

                                <div class="veshm-list-thumb">

                                    <div class="veshm-list-img-slide">
                                        <div class="veshm-list-click">
                                            <div><a
                                                    href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                        src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                        class="img-fluid mx-auto" alt=""></a></div>
                                            {{-- <div><a href="single-property-1.html"><img
                                                    src="{{asset('storage/property/banner_image/'. $property->cover_image) }}"
                                                    class="img-fluid mx-auto" alt=""></a></div>
                                        <div><a href="single-property-1.html"><img
                                                    src="{{asset('storage/property/banner_image/'. $property->cover_image) }}"
                                                    class="img-fluid mx-auto" alt=""></a></div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="veshm-list-block">
                                    <div class="veshm-list-head">
                                        <div class="veshm-list-head-caption">
                                            <div class="rlhc-price">
                                                <h4 class="rlhc-price-name theme-cl">₹@php
                                                    echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                @endphp
                                                </h4>
                                                @if ($property->property_status == 'Sale')
                                                    <span class="monthly">One Time</span>
                                                @elseif ($property->property_status == 'Rent/Lease')
                                                    <span class="monthly">/Months</span>
                                                @elseif ($property->property_status == 'PG/Hostel')
                                                    <span class="monthly">/Months</span>
                                                @endif
                                            </div>
                                            <div class="listing-short-detail-flex">
                                                <h5 class="rlhc-title-name verified"><a
                                                        href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                        class="prt-link-detail">{{ $property->name_of_project }}</a>
                                                </h5>
                                            </div>
                                            <div class="veshm-list-icons">
                                                <ul>
                                                    @foreach ($residential_property as $residential)
                                                        @if ($property->id == $residential->property_master_id)
                                                            <li>
                                                                @if ($residential->total_bedrooms != null)
                                                                    <i class="fa-solid fa-bed"></i><span>{{ $residential->total_bedrooms }}
                                                                        Bed</span>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                @if ($residential->total_bathrooms != null)
                                                                    <i class="fa-solid fa-bath"></i><span>{{ $residential->total_bathrooms }}
                                                                        Ba</span>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                @if ($residential->carpet_area != null)
                                                                    <i class="fa-solid fa-vector-square"></i><span>{{ $residential->carpet_area }}
                                                                        sft</span>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    @foreach ($commercial_property as $commercial)
                                                        @if ($property->id == $commercial->property_master_id)
                                                            <li>
                                                                @if ($commercial->total_floor != null)
                                                                    <i class="fa-solid fa-layer-group"></i><span>{{ $commercial->total_floor }}
                                                                        Floor</span>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                @if ($commercial->total_washrooms != null)
                                                                    <i class="fas fa-toilet"></i><span>{{ $commercial->total_washrooms }}
                                                                        Washroom</span>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                @if ($commercial->total_washrooms != null)
                                                                    <i class="fa-solid fa-vector-square"></i><span>{{ $commercial->carpet_area }}
                                                                        sft</span>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check"></i></button>
                                    </div> --}}
                                    </div>

                                    <div class="resi-prty-offers-box">

                                        <div class="prty-offers-btn text-center">

                                            <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                class="btn btn-offer-send">View Details</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- End Single Property -->
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
                closeOnSelect: true
            });
        });
    </script>

</body>

</html>
