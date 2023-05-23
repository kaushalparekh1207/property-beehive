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
                    <div class="hero-search-content colored">
                        <form id="property_result" action="{{ route('property_result_search') }}" method="post">
                            @csrf
                            <div class="row classic-search-box m-0 gx-2">
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group briod">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control"
                                                placeholder="Ex. villa, town etc.">
                                            <i class="fa-solid fa-magnifying-glass"></i>
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
                                            <i class="fa-solid fa-house-crack"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select class="js-select2" name="city_id" id="city_id_dropdown">
                                                <option value="">Select City</option>
                                                @foreach ($city as $cities)
                                                    <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-location-crosshairs"></i>
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
                        </form>
                    </div>
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
                                    <button type="button" class="compare-btn"><i
                                            class="fa-solid fa-repeat"></i>Compare</button>
                                    <div class="veshm-list-img-slide">
                                        <div class="veshm-list-click">
                                            <div><a href="single-property-1.html"><img
                                                        src="{{ url('/') }}/front/assets/img/prt-1.png"
                                                        class="img-fluid mx-auto" alt=""></a></div>
                                            <div><a href="single-property-1.html"><img
                                                        src="{{ url('/') }}/front/assets/img/prt-8.png"
                                                        class="img-fluid mx-auto" alt=""></a></div>
                                            <div><a href="single-property-1.html"><img
                                                        src="{{ url('/') }}/front/assets/img/prt-9.png"
                                                        class="img-fluid mx-auto" alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="veshm-list-block">
                                    <div class="veshm-list-head">
                                        <div class="veshm-list-head-caption">
                                            <div class="rlhc-price">
                                                <h4 class="rlhc-price-name theme-cl">₹{{ $property->expected_price }}
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
                                                    <li><i class="fa-solid fa-bed"></i><span>{{ $property->total_bedrooms }}
                                                            Bed</span></li>
                                                    <li><i class="fa-solid fa-bath"></i><span>{{ $property->total_bathrooms }}
                                                            Ba</span></li>
                                                    <li><i class="fa-solid fa-vector-square"></i><span>{{ $property->carpet_area }}
                                                            sft</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="veshm-list-head-flex">
                                            <button class="btn btn-like active" type="button"><i
                                                    class="fa-solid fa-heart-circle-check"></i></button>
                                        </div>
                                    </div>

                                    <div class="resi-prty-offers-box">
                                        <div class="prty-offers-input">
                                            <div class="input-form">
                                                <input type="text" class="form-control" placeholder="0">
                                                <span class="prefix-title">INR/Month</span>
                                            </div>
                                        </div>
                                        <div class="prty-offers-btn">
                                            <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                data-bs-target="#offer" class="btn btn-offer-send">Send Offer</a>
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
