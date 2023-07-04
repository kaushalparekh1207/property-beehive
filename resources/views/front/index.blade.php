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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- Browser Back Button CLick Site Auto Refresh Meta Link-->
    <!-- Start -->
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <!-- End -->

    <style>
        .swiper-container {
            width: 100%;
            /* max-width: 940px; */
            height: 300px;
            margin: 0 auto;
        }

        .select2-container {

            height: 50px !important;
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
                        <input type="hidden" name="custom_filter" value="yes">
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
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="property_type_id" id="property_type">
                                                <option value="" selected disabled>Select Property types
                                                </option>
                                                @foreach ($propertyType as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->property_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-1 mt-1"></i>
                                        </div>
                                        <small id="property_type_error"></small>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="city_id" id="city_dropdown">
                                                <option value="" selected disabled>Select City</option>
                                                @foreach ($city as $cities)
                                                    <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs mb-1 mt-1"></i>
                                        </div>
                                        <small id="city_error"></small>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="taluka_id" id="taluka_dropdown">
                                                <option value="" selected disabled>Select City First</option>
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs mb-1 mt-1"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="property_category_id"
                                                id="property_category_dropdown">
                                                <option value="" selected disabled>Select Property Type First
                                                </option>
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-1 mt-1"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="budget" id="budget">
                                                <option value="" selected disabled>Budget
                                                </option>
                                                <option value="500000|1000000">5-10 Lacs</option>
                                                <option value="1000000|1500000">10-15 Lacs</option>
                                                <option value="1500000|2000000">15-20 Lacs</option>
                                                <option value="2000000|2500000">20-25 Lacs</option>
                                                <option value="2500000|3000000">25-30 Lacs</option>
                                                <option value="3000000|3500000">30-35 Lacs</option>
                                                <option value="3500000|4000000">35-40 Lacs</option>
                                                <option value="4000000|4500000">40-45 Lacs</option>
                                                <option value="4500000|5000000">45-50 Lacs</option>
                                                <option value="5000000|5500000">50-55 Lacs</option>
                                                <option value="5500000|6000000">55-60 Lacs</option>
                                                <option value="6000000|6500000">60-65 Lacs</option>
                                                <option value="6500000|7000000">65-70 Lacs</option>
                                                <option value="7000000|7500000">70-75 Lacs</option>
                                                <option value="7500000|8000000">75-80 Lacs</option>
                                                <option value="8000000|8500000">80-85 Lacs</option>
                                                <option value="8500000|9000000">85-90 Lacs</option>
                                                <option value="9000000|9500000">90-95 Lacs</option>
                                                <option value="9500000|10000000">95 Lacs -1 Cr</option>
                                                <option value="10000000|15000000">1-1.5 Cr</option>
                                                <option value="15000000|20000000">1.5-2 Cr</option>
                                                <option value="20000000|25000000">2-2.5 Cr</option>
                                                <option value="25000000|250000000">2.5 Cr +</option>
                                            </select>
                                            <i class="fa-solid fa-house-crack mb-1 mt-1"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-3 col-md-12 col-sm-12">
                                    <div class="fliox-search-wiop">
                                        <div class="form-group">
                                            <button type="button" id="btnSubmit"
                                                class="btn btn-primary full-width">Search</button>
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
                            <h2>Featured Properties</h2>
                            {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores</p> --}}
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
                                        @foreach ($properties as $property)
                                            <div class="swiper-slide">
                                                {{-- @php
                                                    $commercial_property = CommercialProperty::where('flag', 1)->get();
                                                    $residential_property = ResidentialProperty::where('flag', 1)->get();
                                                    $industrial_property = IndustrialProperty::where('flag', 1)->get();
                                                    $agriculture_property = AgriculturalProperty::where('flag', 1)->get();
                                                @endphp --}}
                                                <div class="veshm-list-wraps">
                                                    @if ($property->property_status == 'Sale')
                                                        <div class="veshm-type fr-sale"><span>For
                                                                {{ $property->property_status }}</span>
                                                        </div>
                                                    @elseif($property->property_status == 'Rent/Lease')
                                                        <div class="veshm-type"><span>For
                                                                {{ $property->property_status }}</span></div>
                                                    @elseif($property->property_status == 'PG/Hostel')
                                                        <div class="veshm-type fr-pg"><span>For
                                                                {{ $property->property_status }}</span>
                                                        </div>
                                                    @endif

                                                    <div class="veshm-list-thumb">

                                                        <div class="veshm-list-img-slide">
                                                            <div class="veshm-list-click">
                                                                <div>
                                                                    @if ($property->cover_image == null)
                                                                        <a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                                src="{{ asset('storage/property/no-photo.png') }}"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""
                                                                                style="width: 500px; height: 300px;"></a>
                                                                    @else
                                                                        <a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                                src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""
                                                                                style="width: 500px; height: 300px;"></a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="veshm-list-block">
                                                        <div class="veshm-list-head">
                                                            <div class="veshm-list-head-caption">
                                                                <div class="rlhc-price">
                                                                    <h4 class="rlhc-price-name theme-cl">
                                                                        ₹{{ $property->display_price }}
                                                                        <span class="monthly">Onwards /-</span>
                                                                    </h4>

                                                                    {{-- @if ($property->property_status == 'Sale')
                                                                        <span class="monthly">One Time</span>
                                                                    @elseif ($property->property_status == 'Rent/Lease')
                                                                        <span class="monthly">/Months</span>
                                                                    @elseif ($property->property_status == 'PG/Hostel')
                                                                        <span class="monthly">/Months</span>
                                                                    @endif --}}
                                                                </div>
                                                                <div class="listing-short-detail-flex">
                                                                    <h5 class="rlhc-title-name verified"><a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                                            class="prt-link-detail">{{ $property->name_of_project }}</a>
                                                                    </h5>
                                                                </div>
                                                                <div class="rlhc-prt-location"><img
                                                                        src="{{ url('/') }}/front/assets/img/pin.svg"
                                                                        width="16" class="me-1"
                                                                        alt="">{{ $property->locality }}</div>
                                                                <div class="veshm-list-icons">
                                                                    {{-- <ul>
                                                                        <li>
                                                                            <span>Locality :
                                                                                {{ $property->locality }}</span>
                                                                        </li>
                                                                    </ul> --}}
                                                                    {{-- <ul>
                                                                        @foreach ($residential_property as $residential)
                                                                            @if ($property->id == $residential->property_master_id)
                                                                                <li>
                                                                                    @if ($residential->total_bedrooms != null)
                                                                                        <i
                                                                                            class="fa-solid fa-bed"></i><span>{{ $residential->total_bedrooms }}
                                                                                            Bed</span>
                                                                                    @endif
                                                                                </li>
                                                                                <li>
                                                                                    @if ($residential->total_bathrooms != null)
                                                                                        <i
                                                                                            class="fa-solid fa-bath"></i><span>{{ $residential->total_bathrooms }}
                                                                                            Ba</span>
                                                                                    @endif
                                                                                </li>
                                                                                <li>
                                                                                    @if ($residential->carpet_area != null)
                                                                                        <i
                                                                                            class="fa-solid fa-vector-square"></i><span>{{ $residential->carpet_area }}
                                                                                            sft</span>
                                                                                    @endif
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                        @foreach ($commercial_property as $commercial)
                                                                            @if ($property->id == $commercial->property_master_id)
                                                                                <li>
                                                                                    @if ($commercial->total_floor != null)
                                                                                        <i
                                                                                            class="fa-solid fa-layer-group"></i><span>{{ $commercial->total_floor }}
                                                                                            Floor</span>
                                                                                    @endif
                                                                                </li>
                                                                                <li>
                                                                                    @if ($commercial->total_washrooms != null)
                                                                                        <i
                                                                                            class="fas fa-toilet"></i><span>{{ $commercial->total_washrooms }}
                                                                                            Washroom</span>
                                                                                    @endif
                                                                                </li>
                                                                                <li>
                                                                                    @if ($commercial->total_washrooms != null)
                                                                                        <i
                                                                                            class="fa-solid fa-vector-square"></i><span>{{ $commercial->carpet_area }}
                                                                                            sft</span>
                                                                                    @endif
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul> --}}
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
                                                                    class="btn btn-offer-send">See Details</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                {{-- </div> --}}

                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="swiper-pagination"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-7 col-md-10 text-center">
                        <div class="sec-heading center">
                            <h2>Properties on Beehive</h2>
                            {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores</p> --}}
                        </div>
                    </div>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($properties as $property)
                            @php
                                // $commercial_property = CommercialProperty::where('flag', 1)->get();
                                // $residential_property = ResidentialProperty::where('flag', 1)->get();
                                // $industrial_property = IndustrialProperty::where('flag', 1)->get();
                                // $agriculture_property = AgriculturalProperty::where('flag', 1)->get();
                                $property_category_name = App\Models\PropertyCategory::where('id', $property->property_category_id)
                                    ->pluck('property_category_name')
                                    ->first();
                            @endphp
                            <div class="swiper-slide">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="veshm-list-prty">
                                        <div class="veshm-list-prty-figure1">
                                            <div class="veshm-list-img-slide">
                                                <div class="veshm-list-click">
                                                    <div>
                                                        @if ($property->cover_image == null)
                                                            <a
                                                                href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                    src="{{ asset('storage/property/no-photo.png') }}"
                                                                    class="img-fluid mx-auto" alt=""
                                                                    style="width: 500px; height: 300px;"></a>
                                                        @else
                                                            <a
                                                                href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                    src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                                    class="img-fluid mx-auto" alt=""
                                                                    style="width: 500px; height: 300px;"></a>
                                                        @endif
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="veshm-list-prty-caption">
                                            <div class="veshm-list-kygf">
                                                <div class="veshm-list-kygf-flex">
                                                    @if ($property->property_status == 'Sale')
                                                        <div class="veshm-type fr-sale"><span>For
                                                                {{ $property->property_status }}</span>
                                                        </div>
                                                    @elseif($property->property_status == 'Rent/Lease')
                                                        <div class="veshm-type"><span>For
                                                                {{ $property->property_status }}</span></div>
                                                    @elseif($property->property_status == 'PG/Hostel')
                                                        <div class="veshm-type fr-pg"><span>For
                                                                {{ $property->property_status }}</span>
                                                        </div>
                                                    @endif
                                                    <h5 class="rlhc-title-name verified"><a
                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                {{--
                                                                src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                                --}}
                                                                class="prt-link-detail alt="">{{ $property->name_of_project }}</a>
                                                    </h5>
                                                    {{-- <div class=" vesh-aget-rates">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <span class="resy-98">322 Reviews</span>
                                                    </div> --}}
                                                    <span>{{ $property_category_name }}</span>
                                                </div>

                                                {{-- <div class="veshm-list-head-flex">
                                                    <button class="btn btn-like active" type="button"><i
                                                            class="fa-solid fa-heart-circle-check"></i></button>
                                                </div> --}}
                                            </div>
                                            <div class="rlhc-prt-location"><img
                                                    src="{{ url('/') }}/front/assets/img/pin.svg" width="16"
                                                    class="me-1" alt="">{{ $property->locality }}
                                            </div>
                                            <br>
                                            <div class="veshm-list-footers">
                                                <div class="veshm-list-ftr786">
                                                    <div class="rlhc-price">
                                                        <h4 class="rlhc-price-name theme-cl">
                                                            ₹{{ $property->display_price }}
                                                            <h6 class="monthly">Onwards/-</h6>
                                                            {{-- @if ($property->property_status == 'Sale')
                                                                <span class="monthly">One Time</span>
                                                            @elseif ($property->property_status == 'Rent/Lease')
                                                                <span class="monthly">/Months</span>
                                                            @elseif ($property->property_status == 'PG/Hostel')
                                                                <span class="monthly">/Months</span>
                                                            @endif --}}
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="veshm-list-ftr1707">
                                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#offer"
                                                        class="btn btn-md btn-primary font--medium">See Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="row justify-content gx-3 gy-4" style="margin-top: 5%">

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
                                            <div>
                                                @if ($property->cover_image == null)
                                                    <a
                                                        href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                            src="{{ asset('storage/property/no-photo.png') }}"
                                                            class="img-fluid mx-auto" alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                @else
                                                    <a
                                                        href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                            src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}"
                                                            class="img-fluid mx-auto" alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="veshm-list-block">
                                    <div class="veshm-list-head">
                                        <div class="veshm-list-head-caption">
                                            <div class="rlhc-price">
                                                <h4 class="rlhc-price-name theme-cl">
                                                    ₹@php
                                                        if (strlen($property->expected_price) > 5) {
                                                            convertCurrency($property->expected_price);
                                                        } else {
                                                            echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                        }
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
                                        
                                    </div>

                                    <div class="resi-prty-offers-box">

                                        <div class="prty-offers-btn text-center">

                                            <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                class="btn btn-offer-send">See Details</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- End Single Property -->

                </div> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{ url('/') }}/front/assets/js/filtervalidation.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            mousewheel: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            effect: 'slide',
            slidesPerView: 1,
            loop: true,
            mousewheel: true,
            // autoplay: {
            //     delay: 3000,
            //     reverseDirection: true,
            //     disableOnInteraction: false,
            // },
        })
    </script>
    <script>
        $(document).ready(function() {
            $(".js-select2").select2({
                closeOnSelect: true
            });
        });
    </script>
    <script>
        $('#property_type').on('change', function() {
            var property_type_id = $(this).val();

            $("#property_category_dropdown").html('');
            $.ajax({
                url: "{{ route('get-property-category') }}",
                type: "GET",
                data: {
                    property_type_id: property_type_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#property_category_dropdown').html(
                        '<option value="" selected disabled>-- Select Property Category --</option>'
                    );
                    $.each(result.property_category, function(key, value) {
                        $("#property_category_dropdown").append(
                            '<option value="' +
                            value
                            .id + '">' + value.property_category_name +
                            '</option>');

                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            //  $('#city').hide();
            $('#city_dropdown').on('change', function() {
                var city = this.value;
                $("#taluka_dropdown").html('');
                $.ajax({
                    url: "{{ route('get-taluka-list') }}",
                    type: "GET",
                    data: {
                        city: city,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#taluka').show();
                        $('#taluka_dropdown').html(
                            '<option value="" selected disabled>-- Select Taluka --</option>'
                        );
                        $.each(result.taluka, function(key, value) {
                            $("#taluka_dropdown").append('<option value="' +
                                value
                                .id + '">' + value.taluka +
                                '</option>');
                        });
                        // $('#sd').show();
                    }
                });
            });
        });
    </script>
    <!-- Browser Back Button CLick Site Auto Refresh Javascript-->
    <!-- Start -->
    <script type="text/javascript">
        window.onpageshow = function(event) {
            if (event.persisted) {
                document.body.style.display = "none";
                location.reload();
            }
        };
    </script>
    <!-- End -->

</body>

</html>
