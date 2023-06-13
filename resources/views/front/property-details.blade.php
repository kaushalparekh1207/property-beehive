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



        <!-- ============================ Hero Banner  Start================================== -->
        <div class="featured_slick_gallery gray">
            <div class="featured_slick_gallery-slide">
                <div class="featured_slick_padd"><a href="{{ url('/') }}/front/assets/img/gallery-1.jpg"
                        class="mfp-gallery"><img src="{{ url('/') }}/front/assets/img/gallery-1.jpg"
                            class="img-fluid mx-auto" alt=""></a></div>
                <div class="featured_slick_padd"><a href="{{ url('/') }}/front/assets/img/gallery-2.jpg"
                        class="mfp-gallery"><img src="{{ url('/') }}/front/assets/img/gallery-2.jpg"
                            class="img-fluid mx-auto" alt=""></a></div>
                <div class="featured_slick_padd"><a href="{{ url('/') }}/front/assets/img/gallery-3.jpg"
                        class="mfp-gallery"><img src="{{ url('/') }}/front/assets/img/gallery-3.jpg"
                            class="img-fluid mx-auto" alt=""></a></div>
                <div class="featured_slick_padd"><a href="{{ url('/') }}/front/assets/img/gallery-4.jpg"
                        class="mfp-gallery"><img src="{{ url('/') }}/front/assets/img/gallery-4.jpg"
                            class="img-fluid mx-auto" alt=""></a></div>
                <div class="featured_slick_padd"><a href="{{ url('/') }}/front/assets/img/gallery-5.jpg"
                        class="mfp-gallery"><img src="{{ url('/') }}/front/assets/img/gallery-5.jpg"
                            class="img-fluid mx-auto" alt=""></a></div>
                <div class="featured_slick_padd"><a href="{{ url('/') }}/front/assets/img/gallery-6.jpg"
                        class="mfp-gallery"><img src="{{ url('/') }}/front/assets/img/gallery-6.jpg"
                            class="img-fluid mx-auto" alt=""></a></div>
            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->

        <!-- ============================ Property Detail Start ================================== -->
        <section class="gray-simple">
            <div class="container">
                <div class="row">

                    <!-- property main detail -->
                    <div class="col-lg-8 col-md-12 col-sm-12">

                        <!-- Main Info Detail -->
                        <div class="vesh-detail-bloc">
                            <div class="vesh-detail-headup">
                                <div class="vesh-detail-headup-first">
                                    <div class="prt-detail-title-desc">
                                        @if ($propertis_details->property_status == 'Sale')
                                            <span class="label label-danger">For
                                                {{ $propertis_details->property_status }}</span>
                                        @elseif($propertis_details->property_status == 'Rent/Lease')
                                            <span class="label label-purple">For
                                                {{ $propertis_details->property_status }}</span>
                                        @elseif($propertis_details->property_status == 'PG/Hostel')
                                            <span class="label label-success">For
                                                {{ $propertis_details->property_status }}</span>
                                        @endif
                                        <h4>{{ $propertis_details->name_of_project }}</h4>
                                        <span class="text-mid"><i
                                                class="fa-solid fa-location-dot me-2"></i>{{ $propertis_details->address }},{{ $propertis_details->locality }}</span>
                                        <div class="list-fx-features mt-2">
                                            <div class="list-fx-fisrt">
                                                @if ($allDetails->total_bedrooms != null)
                                                    <span
                                                        class="label font--medium label-light-success me-2">{{ $allDetails->total_bedrooms }}
                                                        Beds</span>
                                                @endif

                                                @if ($allDetails->total_bathrooms != null)
                                                    <span
                                                        class="label font--medium label-light-info me-2">{{ $allDetails->total_bathrooms }}
                                                        Bath</span>
                                                @endif

                                                @if ($allDetails->carpet_area != null)
                                                    <span
                                                        class=" label font--medium label-light-danger">{{ $allDetails->carpet_area }}
                                                        Sqft</span>
                                                @endif

                                            </div>
                                            <div class="list-fx-last">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vesh-detail-headup-last">
                                    <h3 class="prt-price-fix theme-cl">
                                        ₹@php
                                            echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $propertis_details->expected_price);
                                        @endphp
                                        {{-- @php
                                            $number = $propertis_details->expected_price;
                                            function convertCurrency($number)
                                            {
                                                // Convert Price to Crores or Lakhs or Thousands
                                                $length = strlen($number);
                                                $currency = '';

                                                if ($length == 4 || $length == 5) {
                                                    // Thousand
                                                    $number = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $number);
                                                    $currency = $number;
                                                } elseif ($length == 6 || $length == 7) {
                                                    // Lakhs
                                                    $number = $number / 100000;
                                                    $number = round($number, 2);
                                                    $ext = 'Lac';
                                                    $currency = $number . ' ' . $ext;
                                                } elseif ($length == 8 || $length == 9) {
                                                    // Crores
                                                    $number = $number / 10000000;
                                                    $number = round($number, 2);
                                                    $ext = 'Cr';
                                                    $currency = $number . ' ' . $ext;
                                                }

                                                return $currency;
                                            }
                                            echo '₹' . convertCurrency($number);
                                        @endphp --}}
                                    </h3>
                                    @if ($propertis_details->property_status == 'Sale')
                                        <h3 class="prt-price-fix theme-cl"><span>One Time</span></h3>
                                    @elseif ($propertis_details->property_status == 'Rent/Lease')
                                        <h3 class="prt-price-fix theme-cl"><span>/Months</span></h3>
                                    @elseif ($propertis_details->property_status == 'PG/Hostel')
                                        <h3 class="prt-price-fix theme-cl"><span>/Months</span></h3>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- About Property Detail -->
                        <div class="vesh-detail-bloc">
                            <div class="vesh-detail-bloc_header">
                                <h4 class="property_block_title no-arrow">About Property</h4>
                            </div>
                            <div class="vesh-detail-bloc-body">
                                <div class="row g-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <p>{{ $allDetails->descr }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Detail -->
                        <div class="vesh-detail-bloc">
                            <div class="vesh-detail-bloc_header">
                                <a data-bs-toggle="collapse" data-parent="#basicinfo" data-bs-target="#basicinfo"
                                    aria-controls="basicinfo" href="javascript:void(0);" aria-expanded="false">
                                    <h4 class="property_block_title">Basic Detail</h4>
                                </a>
                            </div>
                            <div id="basicinfo" class="panel-collapse collapse show" aria-labelledby="basicinfo">
                                <div class="vesh-detail-bloc-body">
                                    <div class="row g-3">
                                        @if ($allDetails->total_bedrooms != null)
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                                <div class="ilio-icon-wrap">
                                                    <div class="ilio-icon"><i class="fa-solid fa-bed"></i></div>
                                                    <div class="ilio-text">{{ $allDetails->total_bedrooms }}
                                                        Bedrooms</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($allDetails->total_bathrooms != null)
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                                <div class="ilio-icon-wrap">
                                                    <div class="ilio-icon"><i class="fa-solid fa-bath"></i></div>
                                                    <div class="ilio-text">
                                                        {{ $allDetails->total_bathrooms }} Bathrooms</div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($allDetails->carpet_area != null)
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                                <div class="ilio-icon-wrap">
                                                    <div class="ilio-icon"><i class="fa-solid fa-layer-group"></i>
                                                    </div>
                                                    <div class="ilio-text">{{ $allDetails->carpet_area }}
                                                        sq ft</div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6"><div class="ilio-icon-wrap"><div class="ilio-icon"><i class="fa-solid fa-warehouse"></i></div><div class="ilio-text">1 Garage</div></div></div>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6"><div class="ilio-icon-wrap"><div class="ilio-icon"><i class="fa-regular fa-building"></i></div><div class="ilio-text">Apartment</div></div></div> --}}
                                        @if ($allDetails->age != null)
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                                <div class="ilio-icon-wrap">
                                                    <div class="ilio-icon"><i class="fa-solid fa-building-wheat"></i>
                                                    </div>
                                                    <div class="ilio-text">{{ $allDetails->age }} Age</div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                            <div class="ilio-icon-wrap">
                                                <div class="ilio-icon"><i
                                                        class="fa-solid fa-building-circle-check"></i></div>
                                                <div class="ilio-text">Active</div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6"><div class="ilio-icon-wrap"><div class="ilio-icon"><i class="fa-solid fa-fan"></i></div><div class="ilio-text">Central A/C</div></div></div>
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6"><div class="ilio-icon-wrap"><div class="ilio-icon"><i class="fa-regular fa-snowflake"></i></div><div class="ilio-text">Forced Air</div></div></div> --}}
                                        {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6"><div class="ilio-icon-wrap"><div class="ilio-icon"><i class="fa-solid fa-bowl-food"></i></div><div class="ilio-text">Kitchen Facilities</div></div></div> --}}
                                        {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6"><div class="ilio-icon-wrap"><div class="ilio-icon"><i class="fa-solid fa-martini-glass-citrus"></i></div><div class="ilio-text">Bar & Drinks</div></div></div> --}}
                                        @if ($allDetails->total_floor != null)
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                                                <div class="ilio-icon-wrap">
                                                    <div class="ilio-icon"><i class="fa-regular fa-building"></i>
                                                    </div>
                                                    <div class="ilio-text">{{ $allDetails->total_floor }}
                                                        Floor</div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Amenties Detail -->
                        @if (session()->has('user'))
                            <div class="vesh-detail-bloc">
                                <div class="vesh-detail-bloc_header">
                                    <a data-bs-toggle="collapse" data-parent="#amenitiesinfo"
                                        data-bs-target="#amenitiesinfo" aria-controls="amenitiesinfo"
                                        href="javascript:void(0);" aria-expanded="false">
                                        <h4 class="property_block_title">Amenties</h4>
                                    </a>
                                </div>
                                <div id="amenitiesinfo" class="panel-collapse collapse show"
                                    aria-labelledby="amenitiesinfo">
                                    <div class="vesh-detail-bloc-body">
                                        <ul class="avl-features third color">

                                            @foreach ($amenities as $amenitie)
                                                @if ($amenitie->amenitie != null)
                                                    <li>{{ $amenitie->amenitie }}</li>
                                                @endif
                                            @endforeach

                                            {{-- <li>Swimming Pool</li>
                                                <li>Central Heating</li>
                                                <li>Laundry Room</li>
                                                <li>Gym</li>
                                                <li>Alarm</li>
                                                <li>Window Covering</li>
                                                <li>Internet</li>
                                                <li>Pets Allow</li>
                                                <li>Free WiFi</li>
                                                <li>Car Parking</li>
                                                <li>Spa & Massage</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- All features Detail -->
                        {{-- <div class="vesh-detail-bloc">
								<div class="vesh-detail-bloc_header">
									<a data-bs-toggle="collapse" data-parent="#featuresinfo" data-bs-target="#featuresinfo" aria-controls="featuresinfo" href="javascript:void(0);" aria-expanded="false"><h4 class="property_block_title">Features</h4></a>
								</div>
								<div id="featuresinfo" class="panel-collapse collapse show" aria-labelledby="featuresinfo">
									<div class="vesh-detail-bloc-body">
										<div class="lvs-detail mb-4">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12"><h6>Interior Details</h6></div>
											</div>
											<div class="row gy-3">
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-utensils"></i>Equipped Kitchen</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-dumbbell"></i>Gym</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-jug-detergent"></i>Laundry</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-brands fa-chromecast"></i>Media Room</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-tv"></i>TV Set</div></div>
											</div>
										</div>
										<div class="lvs-detail mb-4">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12"><h6>Outdoor Details</h6></div>
											</div>
											<div class="row gy-3">
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-brands fa-canadian-maple-leaf"></i>Back yard</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-basketball"></i>Basketball court</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-seedling"></i>Front yard</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-square-parking"></i>Garage Attached</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-shower"></i>Hot Bath</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-water-ladder"></i>Pool</div></div>
											</div>
										</div>
										<div class="lvs-detail mb-4">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12"><h6>Utilities</h6></div>
											</div>
											<div class="row gy-3">
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-fan"></i>Central Air</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-plug"></i>Electricity</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-fire"></i>Heating</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-fire-flame-simple"></i>Natural Gas</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-snowflake"></i>Ventilation</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-droplet"></i>Water</div></div>
											</div>
										</div>
										<div class="lvs-detail">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-md-12"><h6>Other Features</h6></div>
											</div>
											<div class="row gy-3">
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-wheelchair"></i>Chair Accessible</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-elevator"></i>Elevator</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-fire-extinguisher"></i>Fireplace</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-smoking"></i>Smoke detectors</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-bacon"></i>Washer and dryer</div></div>
												<div class="col-xl-4 col-lg-4 col-md-4 col-12"><div class="lvs-caption"><i class="fa-solid fa-wifi"></i>WiFi</div></div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}

                        <!-- Floor Plan -->
                        @if (session()->has('user'))
                            <div class="vesh-detail-bloc">
                                <div class="vesh-detail-bloc_header">
                                    <a data-bs-toggle="collapse" data-parent="#floorinfo" data-bs-target="#floorinfo"
                                        aria-controls="floorinfo" href="javascript:void(0);" aria-expanded="false">
                                        <h4 class="property_block_title">Floor Plan</h4>
                                    </a>
                                </div>
                                <div id="floorinfo" class="panel-collapse collapse show" aria-labelledby="floorinfo">
                                    <div class="vesh-detail-bloc-body">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-2d-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-2d" type="button"
                                                    role="tab" aria-controls="pills-2d" aria-selected="true">2D
                                                    Plans</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-3d-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-3d" type="button" role="tab"
                                                    aria-controls="pills-3d" aria-selected="false">3D Plans</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-elevation-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-elevation"
                                                    type="button" role="tab" aria-controls="pills-elevation"
                                                    aria-selected="false">Elevations</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-2d" role="tabpanel"
                                                aria-labelledby="pills-2d-tab" tabindex="0">
                                                <div class="row gx-3 gy-4">
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-1.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-2.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-1.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-3d" role="tabpanel"
                                                aria-labelledby="pills-3d-tab" tabindex="0">
                                                <div class="row gx-3 gy-4">
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-3.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-4.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-3.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-elevation" role="tabpanel"
                                                aria-labelledby="pills-elevation-tab" tabindex="0">
                                                <div class="row gx-3 gy-4">
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-5.webp"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-6.jpg"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="floor-thumb"><img
                                                                src="{{ url('/') }}/front/assets/img/fl-5.webp"
                                                                class="img-fluid" alt=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Property History -->
                        {{-- <div class="vesh-detail-bloc">
								<div class="vesh-detail-bloc_header">
									<a data-bs-toggle="collapse" data-parent="#historyinfo" data-bs-target="#historyinfo" aria-controls="historyinfo" href="javascript:void(0);" aria-expanded="false"><h4 class="property_block_title">Property History</h4></a>
								</div>
								<div id="historyinfo" class="panel-collapse collapse show" aria-labelledby="historyinfo">
									<div class="vesh-detail-bloc-body">
										<ul class="nav nav-pills mb-3" id="pills-tab1" role="tablist">
											<li class="nav-item" role="presentation">
											<button class="nav-link active" id="pills-price-tab" data-bs-toggle="pill" data-bs-target="#pills-price" type="button" role="tab" aria-controls="pills-price" aria-selected="true">Price history</button>
											</li>
											<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-tax-tab" data-bs-toggle="pill" data-bs-target="#pills-tax" type="button" role="tab" aria-controls="pills-tax" aria-selected="false">Tax History</button>
											</li>
										</ul>
										<div class="tab-content" id="pills-tabContent1">
											<div class="tab-pane fade show active" id="pills-price" role="tabpanel" aria-labelledby="pills-price-tab" tabindex="0">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">Date</th>
																<th scope="col">Event</th>
																<th scope="col">Price</th>
																<th scope="col">Change</th>
																<th scope="col">Sq Ft Price</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>10 Jan 2020</td>
																<td>For Sale</td>
																<td>$40700</td>
																<td>Nill</td>
																<td>$910/Sqft</td>
															</tr>
															<tr>
																<td>07 Feb 2020</td>
																<td>For Sale</td>
																<td>$65000</td>
																<td>Nill</td>
																<td>$1650/Sqft</td>
															</tr>
															<tr>
																<td>10 Apr 2020</td>
																<td>For Rent</td>
																<td>$55200</td>
																<td>Nill</td>
																<td>$780/Sqft</td>
															</tr>
															<tr>
																<td>17 Jan 2021</td>
																<td>For Sale</td>
																<td>$70800</td>
																<td>Nill</td>
																<td>$1050/Sqft</td>
															</tr>
															<tr>
																<td>20 Aug 2022</td>
																<td>For Sale</td>
																<td>$80500</td>
																<td>Nill</td>
																<td>$890/Sqft</td>
															</tr>
															<tr>
																<td>15 Dec 2022</td>
																<td>For Rent</td>
																<td>$58000</td>
																<td>Nill</td>
																<td>$850/Sqft</td>
															</tr>
															<tr>
																<td colspan="5"><span class="font--medium text-success">Source: My State MLS</span></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-tax" role="tabpanel" aria-labelledby="pills-tax-tab" tabindex="0">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">Year</th>
																<th scope="col">Tax Paid</th>
																<th scope="col">Tax Assessment</th>
																<th scope="col">Land</th>
																<th scope="col">Improvement</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>2017</td>
																<td>$1700</td>
																<td>$40700</td>
																<td>$76,400</td>
																<td>$0</td>
															</tr>
															<tr>
																<td>2018</td>
																<td>$1250</td>
																<td>$65000</td>
																<td>$75,600</td>
																<td>$0</td>
															</tr>
															<tr>
																<td>2019</td>
																<td>$1360</td>
																<td>$55200</td>
																<td>$58,700</td>
																<td>$0</td>
															</tr>
															<tr>
																<td>2020</td>
																<td>$1890</td>
																<td>$70800</td>
																<td>$80600</td>
																<td>$0</td>
															</tr>
															<tr>
																<td>2021</td>
																<td>$1620</td>
																<td>$80500</td>
																<td>$70,500</td>
																<td>$0</td>
															</tr>
															<tr>
																<td>2022</td>
																<td>$1460</td>
																<td>$58000</td>
																<td>$86,800</td>
																<td>$0</td>
															</tr>
															<tr>
																<td colspan="5"><span class="font--medium text-success">Source: My State MLS</span></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}


                        <!-- All over Review -->
                        <div class="veshm-fl-rate-box">
                            <div class="fl-rate-box-head theme-bg">
                                <div class="flt-yuo10">
                                    <h4>5.0</h4>
                                    <p>Excellent</p>
                                </div>
                                <div class="flt-yuo12">
                                    <span>Out of 5</span>
                                </div>
                            </div>
                            <div class="fl-rate-box-caption">
                                <div class="fls-by1">
                                    <div class="fls-by2">
                                        <div class="fls-bystar">
                                            <span class="fas fa-star fill"></span>
                                            <span class="fas fa-star fill"></span>
                                            <span class="fas fa-star fill"></span>
                                            <span class="fas fa-star fill"></span>
                                            <span class="fas fa-star fill"></span>
                                        </div>
                                        <div class="fls-byheadline">
                                            <h5>Wonderful Score</h5>
                                        </div>
                                        <div class="fls-bycaps">
                                            <p>112 Total Reviews</p>
                                        </div>
                                    </div>
                                    <div class="fls-by3">
                                        {{-- <button type="button" class="btn btn-success font--medium">Submit
                                            Review</button> --}}
                                        <div class="single-button">
                                            <a class="btn btn-success font--medium" data-bs-toggle="modal"
                                                data-bs-target="#review"
                                                class="btn font--medium btn-theme full-width">Submit
                                                Review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- All over Review -->

                        <!-- Property Reviews Detail -->
                        <div class="vesh-detail-bloc">
                            <div class="vesh-detail-bloc_header">
                                <h4 class="property_block_title no-arrow">Property Reviews</h4>
                            </div>
                            <div class="panels">
                                <div class="vesh-detail-bloc-body">
                                    <div class="prt-reviews-groups">

                                        <div class="prt-reviews-single">
                                            <div class="prt-reviews-single-thumb">
                                                <div class="prt-rvs-head">
                                                    <div class="prt-rvs-head-img">
                                                        <img src="assets/img/team-1.jpg" class="img-fluid circle"
                                                            alt="">
                                                    </div>
                                                    <div class="prt-rvs-head-caption">
                                                        <div class="prt-ves-ratting">
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-regular fa-star"></span>
                                                        </div>
                                                        <div class="prt-ves-reviewer">
                                                            <h4>By: Shuryabhan Singh</h4>
                                                        </div>
                                                        <div class="prt-ves-ratting-title">
                                                            <h5 class="text-success">Superb</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prt-reviews-single-content">
                                                <div class="prt-ves-paragraph">
                                                    <p>Overall a wonderful building. The apartments are great. The
                                                        reviews are second to none. I find the staff largely very
                                                        friendly and helpful. The amenity space is clean and well
                                                        appointed. The gym is convenient. The neighborhood is hard to
                                                        be. Very pet friendly. I’ve been here for 2 1/2 years and really
                                                        have had zero complaints.</p>
                                                </div>
                                                <div class="prt-post-date"><span>Posted on 10 Jan 2023</span></div>
                                            </div>
                                        </div>

                                        <div class="prt-reviews-single">
                                            <div class="prt-reviews-single-thumb">
                                                <div class="prt-rvs-head">
                                                    <div class="prt-rvs-head-img">
                                                        <img src="assets/img/team-2.jpg" class="img-fluid circle"
                                                            alt="">
                                                    </div>
                                                    <div class="prt-rvs-head-caption">
                                                        <div class="prt-ves-ratting">
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-regular fa-star"></span>
                                                        </div>
                                                        <div class="prt-ves-reviewer">
                                                            <h4>By: Maithali Gupta</h4>
                                                        </div>
                                                        <div class="prt-ves-ratting-title">
                                                            <h5 class="text-warning">Middle</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prt-reviews-single-content">
                                                <div class="prt-ves-paragraph">
                                                    <p>Overall a wonderful building. The apartments are great. The
                                                        reviews are second to none. I find the staff largely very
                                                        friendly and helpful. The amenity space is clean and well
                                                        appointed. The gym is convenient. The neighborhood is hard to
                                                        be. Very pet friendly. I’ve been here for 2 1/2 years and really
                                                        have had zero complaints.</p>
                                                </div>
                                                <div class="prt-post-date"><span>Posted on 18 Jan 2023</span></div>
                                            </div>
                                        </div>

                                        <div class="prt-reviews-single">
                                            <div class="prt-reviews-single-thumb">
                                                <div class="prt-rvs-head">
                                                    <div class="prt-rvs-head-img">
                                                        <img src="assets/img/team-3.jpg" class="img-fluid circle"
                                                            alt="">
                                                    </div>
                                                    <div class="prt-rvs-head-caption">
                                                        <div class="prt-ves-ratting">
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-solid fa-star"></span>
                                                            <span class="fa-regular fa-star"></span>
                                                        </div>
                                                        <div class="prt-ves-reviewer">
                                                            <h4>By: Rajvanshi Patel</h4>
                                                        </div>
                                                        <div class="prt-ves-ratting-title">
                                                            <h5 class="text-success">Superb</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prt-reviews-single-content">
                                                <div class="prt-ves-paragraph">
                                                    <p>Overall a wonderful building. The apartments are great. The
                                                        reviews are second to none. I find the staff largely very
                                                        friendly and helpful. The amenity space is clean and well
                                                        appointed. The gym is convenient. The neighborhood is hard to
                                                        be. Very pet friendly. I’ve been here for 2 1/2 years and really
                                                        have had zero complaints.</p>
                                                </div>
                                                <div class="prt-post-date"><span>Posted on 20 Jan 2023</span></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="alert alert-info mt-3" role="alert">
                                        <span class="font--medium small">You need to login in order to post a
                                            review</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nearby School -->
                        {{-- <div class="vesh-detail-bloc">
								<div class="vesh-detail-bloc_header">
									<a data-bs-toggle="collapse" data-parent="#schoolsinfo" data-bs-target="#schoolsinfo" aria-controls="schoolsinfo" href="javascript:void(0);" aria-expanded="false"><h4 class="property_block_title">Nearby Grat Schools</h4></a>
								</div>
								<div id="schoolsinfo" class="panel-collapse collapse show" aria-labelledby="schoolsinfo">
									<div class="vesh-detail-bloc-body">
										<div class="nerb-lists-groups">

											<div class="nerb-lists-single">
												<div class="nerb-lists-sgl-first">
													<div class="nerb-lists-sgl-head"><h5>9/10</h5></div>
													<div class="nerb-lists-sgl-caption">
														<div class="nerb-school-name">Myakka River Elementary School</div>
														<div class="nerb-school-subtext"><span>Public</span>, <span>PreK-5</span>, <span>Serves this home</span></div>
													</div>
												</div>
												<div class="nerb-lists-sgl-last">
													<div class="nerb-lists-sgl-01">
														<div class="nerb-section-number">540</div>
														<div class="nerb-section-title"><span>Students</span></div>
													</div>
													<div class="nerb-lists-sgl-02">
														<div class="nerb-section-number">2.7 mi</div>
														<div class="nerb-section-title"><span>Distance</span></div>
													</div>
													<div class="nerb-lists-sgl-03">
														<div class="nerb-section-number">
															<div class="prt-ves-ratting">
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-regular fa-star"></span>
															</div>
														</div>
														<div class="nerb-section-title"><span>24 Reviews</span></div>
													</div>
												</div>
											</div>

											<div class="nerb-lists-single">
												<div class="nerb-lists-sgl-first">
													<div class="nerb-lists-sgl-head"><h5>7/10</h5></div>
													<div class="nerb-lists-sgl-caption">
														<div class="nerb-school-name">Rose Wood Inter Collage</div>
														<div class="nerb-school-subtext"><span>Public</span>, <span>PreK-5</span>, <span>Serves this home</span></div>
													</div>
												</div>
												<div class="nerb-lists-sgl-last">
													<div class="nerb-lists-sgl-01">
														<div class="nerb-section-number">890</div>
														<div class="nerb-section-title"><span>Students</span></div>
													</div>
													<div class="nerb-lists-sgl-02">
														<div class="nerb-section-number">2.9 mi</div>
														<div class="nerb-section-title"><span>Distance</span></div>
													</div>
													<div class="nerb-lists-sgl-03">
														<div class="nerb-section-number">
															<div class="prt-ves-ratting">
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-regular fa-star"></span>
															</div>
														</div>
														<div class="nerb-section-title"><span>32 Reviews</span></div>
													</div>
												</div>
											</div>

											<div class="nerb-lists-single">
												<div class="nerb-lists-sgl-first">
													<div class="nerb-lists-sgl-head"><h5>8/10</h5></div>
													<div class="nerb-lists-sgl-caption">
														<div class="nerb-school-name">Bharat Green Velly School</div>
														<div class="nerb-school-subtext"><span>Public</span>, <span>PreK-5</span>, <span>Serves this home</span></div>
													</div>
												</div>
												<div class="nerb-lists-sgl-last">
													<div class="nerb-lists-sgl-01">
														<div class="nerb-section-number">670</div>
														<div class="nerb-section-title"><span>Students</span></div>
													</div>
													<div class="nerb-lists-sgl-02">
														<div class="nerb-section-number">3.2 mi</div>
														<div class="nerb-section-title"><span>Distance</span></div>
													</div>
													<div class="nerb-lists-sgl-03">
														<div class="nerb-section-number">
															<div class="prt-ves-ratting">
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-solid fa-star"></span>
																<span class="fa-regular fa-star"></span>
															</div>
														</div>
														<div class="nerb-section-title"><span>24 Reviews</span></div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div> --}}

                        <!-- Property Graph Detail -->
                        {{-- <div class="vesh-detail-bloc">
								<div class="vesh-detail-bloc_header">
									<h4 class="property_block_title no-arrow">View property Graph</h4>
								</div>
								<div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
									<div class="vesh-detail-bloc-body">
										<ul class="list-inline text-center m-t-40">
											<li>
												<h5><i class="fa fa-circle me-1 text-warning"></i>Total Revenue</h5>
											</li>
											<li>
												<h5><i class="fa fa-circle me-1 text-danger"></i>Total Property</h5>
											</li>
											<li>
												<h5><i class="fa fa-circle me-1 text-success"></i>Total income</h5>
											</li>
										</ul>
										<div class="chart" id="line-chart" style="height:300px;"></div>
									</div>
								</div>
							</div> --}}


                        <!-- Repayments Mortgage Calculator -->
                        {{-- <div class="vesh-detail-bloc">
								<div class="vesh-detail-bloc_header">
									<h4 class="property_block_title no-arrow">Repayments Mortgage Calculator</h4>
								</div>
								<div class="panel">
									<div class="vesh-detail-bloc-body">

										<div class="row align-items-end">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Property value</label>
												 <div class="input-group mb-3">
												  <span class="input-group-text">$</span>
												  <input type="text" class="form-control" placeholder="$10000" value="250,000">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Your Deposit</label>
												 <div class="input-group mb-3">
												  <span class="input-group-text">@</span>
												  <input type="text" class="form-control" placeholder="$10000" value="$45,000">
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												<div class="alert alert-warning small mb-3" role="alert">
												  Your Loan to value would be <strong>87%</strong> with a Deposit of <strong>$47,0000</strong>
												</div>
											</div>
										</div>

										<div class="row align-items-bottom">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Mortgage Terms Length</label>
												 <div class="input-group mb-3">
												  <input type="text" class="form-control" placeholder="20" value="20">
												  <span class="input-group-text">Yers</span>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Fixed Term Length</label>
												 <div class="input-group mb-3">
												  <input type="text" class="form-control" placeholder="7" value="5">
												  <span class="input-group-text">Yers</span>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Mortgage Fees</label>
												 <div class="input-group mb-3">
												  <span class="input-group-text">@</span>
												  <input type="text" class="form-control" placeholder="1000" value="1,250">
												</div>
											</div>
										</div>

										<div class="row align-items-end">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Standard Variable Rate</label>
												 <div class="input-group mb-3">
												  <input type="text" class="form-control" placeholder="1" value="1.7">
												  <span class="input-group-text">%</span>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												 <label class="form-label font--medium small">Fixed Terms Intrest Rate</label>
												 <div class="input-group mb-3">
												  <input type="text" class="form-control" placeholder="5" value="4.2">
												  <span class="input-group-text">%</span>
												</div>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												<label class="form-label font--medium small">Add fee To Mortgage</label>
												<div class="input-group mb-3">
													<select class="form-control">
														<option value="1">Yes</option>
														<option value="2">No</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row align-items-end">
											<div class="col-xl-12 col-lg-12 col-12 mb-4">
												<p class="m-0 p-0 font--medium small">Borrowing <strong>$250,6800</strong> and repaying over 25 yers with a <strong>10 yesr fixed rates</strong>.</p>
											</div>
										</div>

										<div class="row align-items-bottom">
											<div class="col-xl-12 col-lg-12 col-12">
												<div class="mortgage-wrp-bloc">
													<div class="mortgage-wrp-bloc-single">
														<div class="mrtg-wrp-title">63 months of</div>
														<div class="mrtg-wrp-subtitle">$799.70</div>
													</div>
													<div class="mortgage-wrp-bloc-single">
														<div class="mrtg-wrp-title">235 months of</div>
														<div class="mrtg-wrp-subtitle">$12,56.40</div>
													</div>
													<div class="mortgage-wrp-bloc-single">
														<div class="mrtg-wrp-title">APRC</div>
														<div class="mrtg-wrp-subtitle">4.2%</div>
													</div>
													<div class="mortgage-wrp-bloc-single">
														<div class="mrtg-wrp-title">Initial term cost</div>
														<div class="mrtg-wrp-subtitle">$72,890</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div> --}}


                        <!-- Nearby Other Places -->
                        {{-- <div class="vesh-detail-bloc">
								<div class="vesh-detail-bloc_header">
									<a data-bs-toggle="collapse" data-parent="#otherplaces" data-bs-target="#otherplaces" aria-controls="otherplaces" href="javascript:void(0);" aria-expanded="false" class="clps"><h4 class="property_block_title">Nearby Others Places</h4></a>
								</div>
								<div id="otherplaces" class="panel-collapse collapse" aria-labelledby="otherplaces">
									<div class="vesh-detail-bloc-body">

										<ul class="nav nav-pills mb-3 small spacing lights" id="pills-list" role="tablist">
											<li class="nav-item" role="presentation">
												<button class="nav-link active" id="pills-highlights-tab" data-bs-toggle="pill" data-bs-target="#pills-highlights" type="button" role="tab" aria-controls="pills-highlights" aria-selected="true">Highlights</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-grocery-tab" data-bs-toggle="pill" data-bs-target="#pills-grocery" type="button" role="tab" aria-controls="pills-grocery" aria-selected="false">Grocery</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-food-tab" data-bs-toggle="pill" data-bs-target="#pills-food" type="button" role="tab" aria-controls="pills-food" aria-selected="false">Food & drink</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-park-tab" data-bs-toggle="pill" data-bs-target="#pills-park" type="button" role="tab" aria-controls="pills-park" aria-selected="false">Parks</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-fuel-tab" data-bs-toggle="pill" data-bs-target="#pills-fuel" type="button" role="tab" aria-controls="pills-fuel" aria-selected="false">Fuel Pump</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-hospital-tab" data-bs-toggle="pill" data-bs-target="#pills-hospital" type="button" role="tab" aria-controls="pills-hospital" aria-selected="false">Hospitals</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#pills-services" type="button" role="tab" aria-controls="pills-services" aria-selected="false">Services</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-shopping-tab" data-bs-toggle="pill" data-bs-target="#pills-shopping" type="button" role="tab" aria-controls="pills-shopping" aria-selected="false">Shoppings</button>
											</li>
										</ul>

										<div class="tab-content" id="pills-listContent">
											<div class="tab-pane fade show active" id="pills-highlights" role="tabpanel" aria-labelledby="pills-highlights-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-martini-glass"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Green Wood Fast Food</h5></div>
																<div class="othr-place-list-subtitle"><span>3.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-basket-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Zigar Smart Bazaar</h5></div>
																<div class="othr-place-list-subtitle"><span>1.50 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-cart-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Relience Smart Bazar</h5></div>
																<div class="othr-place-list-subtitle"><span>2.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-bowl-food"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Smart Pizza Hub</h5></div>
																<div class="othr-place-list-subtitle"><span>3.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-square-parking"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Gandhi Park Smarak</h5></div>
																<div class="othr-place-list-subtitle"><span>3.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-suitcase-medical"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>D. P. Rao Hospital</h5></div>
																<div class="othr-place-list-subtitle"><span>2.47 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-grocery" role="tabpanel" aria-labelledby="pills-grocery-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-cart-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Vijay Smart Bazar</h5></div>
																<div class="othr-place-list-subtitle"><span>7.70 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-cart-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Relience Smart Bazar</h5></div>
																<div class="othr-place-list-subtitle"><span>2.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-cart-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Qube Smart Mall</h5></div>
																<div class="othr-place-list-subtitle"><span>3.10 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-cart-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Raja International Mall</h5></div>
																<div class="othr-place-list-subtitle"><span>2.10 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-food" role="tabpanel" aria-labelledby="pills-food-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-bowl-food"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Smart Pizza Hub</h5></div>
																<div class="othr-place-list-subtitle"><span>3.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-bowl-food"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Goli Burger Hutt</h5></div>
																<div class="othr-place-list-subtitle"><span>3.00 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-bowl-food"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Shukoon Fast Foods</h5></div>
																<div class="othr-place-list-subtitle"><span>4.20 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-bowl-food"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Ritika Fast Serve</h5></div>
																<div class="othr-place-list-subtitle"><span>3.47 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-park" role="tabpanel" aria-labelledby="pills-park-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-square-parking"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Gandhi Park Smarak</h5></div>
																<div class="othr-place-list-subtitle"><span>3.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-square-parking"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Kritika International Park</h5></div>
																<div class="othr-place-list-subtitle"><span>2.20 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-square-parking"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Gyan Gayatri Park</h5></div>
																<div class="othr-place-list-subtitle"><span>4.50 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-square-parking"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Huze Chidiya Ghar</h5></div>
																<div class="othr-place-list-subtitle"><span>1.47 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-fuel" role="tabpanel" aria-labelledby="pills-fuel-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-gas-pump"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Indian Musterd Oil</h5></div>
																<div class="othr-place-list-subtitle"><span>4.40 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-gas-pump"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Hindustan Petrolium</h5></div>
																<div class="othr-place-list-subtitle"><span>2.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-gas-pump"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Hamara Petrol Pumb</h5></div>
																<div class="othr-place-list-subtitle"><span>5.00 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-hospital" role="tabpanel" aria-labelledby="pills-hospital-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-suitcase-medical"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Shanti Om Hospital</h5></div>
																<div class="othr-place-list-subtitle"><span>1.17 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-suitcase-medical"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>D. P. Rao Hospital</h5></div>
																<div class="othr-place-list-subtitle"><span>2.47 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-suitcase-medical"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>R. D. Verman Hospital</h5></div>
																<div class="othr-place-list-subtitle"><span>2.30 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-scissors"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>High hair Cutting Salon</h5></div>
																<div class="othr-place-list-subtitle"><span>2.10 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane fade" id="pills-shopping" role="tabpanel" aria-labelledby="pills-shopping-tab" tabindex="0">
												<div class="row g-4">
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-basket-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Green Hubble Mall</h5></div>
																<div class="othr-place-list-subtitle"><span>2.50 Miles</span></div>
															</div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-12">
														<div class="othr-place-list">
															<div class="othr-place-list-icon"><i class="fa-solid fa-basket-shopping"></i></div>
															<div class="othr-place-list-caption">
																<div class="othr-place-list-title"><h5>Zigar Smart Bazaar</h5></div>
																<div class="othr-place-list-subtitle"><span>1.50 Miles</span></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div> --}}


                        <!-- Submit Reviews -->
                        {{-- <div class="vesh-detail-bloc">
                            <div class="vesh-detail-bloc_header">
                                <h4 class="property_block_title no-arrow">Submit Review</h4>
                            </div>
                            <div class="panels">
                                <div class="vesh-detail-bloc-body">
                                    <form class="simple-form">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Your eMail">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Phone No.</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Contact">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Ratting</label>
                                                    <select class="form-control">
                                                        <option value="1">1 : Very Poor</option>
                                                        <option value="2">2 : Poor</option>
                                                        <option value="3">3 : Good</option>
                                                        <option value="4">4 : Very Good</option>
                                                        <option value="5">5 : Superb</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Your Message</label>
                                                    <textarea class="form-control ht-80" placeholder="Messages"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button class="btn btn-theme" type="submit">Submit
                                                        Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  --}}
                        <!-- End Reviews -->


                    </div>
                    <!-- property main detail -->


                    <!-- Property Sidebar -->
                    <div class="col-lg-4 col-md-12 col-sm-12">

                        <!-- Like And Share -->
                        <div class="vesh-detail-bloc">
                            <ul class="like_share_list">
                                <li><a href="https://wa.me/?text={{ url()->current() }}"
                                        class="btn btn-light-success" data-toggle="tooltip" target="_blank"
                                        data-original-title="Share" data-action="share/whatsapp/share"><i
                                            class="fa-brands fa-whatsapp me-2"></i>Share</a></li>
                                <li><a href="JavaScript:Void(0);" class="btn btn-light-danger" data-toggle="tooltip"
                                        data-original-title="Save"><i
                                            class="fa-solid fa-heart-circle-check me-2"></i>Save</a></li>
                                <li><button id="copyBtn" data-text="{{ url()->current() }}"
                                        class="btn btn-light-primary" data-toggle="tooltip"
                                        data-original-title="Save"><i class="fa-solid fa-copy me-2"></i>Copy
                                        Link</button>
                                    <span id="custom-tooltip">copied!</sapn>
                                </li>
                            </ul>
                        </div>

                        <div class="pg-side-groups">
                            <div class="pg-side-block">
                                <div class="pg-side-block-head">
                                    <div class="pg-side-left">
                                        <div class="pg-side-thumb"><img
                                                src="{{ url('/') }}/front/assets/img/team-1.jpg"
                                                class="img-fluid circle" alt=""></div>
                                    </div>
                                    <div class="pg-side-right">
                                        <div class="pg-side-right-caption">
                                            <h4>@php
                                                $name = $client_data->name;
                                                echo substr_replace($name, '******', 2, strlen($name) - 14);
                                            @endphp</h4>
                                            @if (($client_data->city != null) & ($client_data->state != null))
                                                <span><i
                                                        class="fa-solid fa-location-dot me-2"></i>{{ $client_data->city }},
                                                    {{ $client_data->state }}</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                {{-- @if (session()->has('user')) --}}
                                <div class="pg-side-block-body">
                                    <div class="pg-side-block-info">
                                        <div class="vl-elfo-group">
                                            <div class="vl-elfo-icon"><i class="fa-solid fa-phone-volume"></i>
                                            </div>
                                            @if ($client_data->contact != null)
                                                <div class="vl-elfo-caption">
                                                    <h6>Call Us</h6>
                                                    <p>+91
                                                        @php
                                                            echo preg_replace("/(^.|.$)(*SKIP)(*F)|(.)/", '*', $client_data->contact);
                                                        @endphp
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                        @if ($client_data->email != null)
                                            <div class="vl-elfo-group">
                                                <div class="vl-elfo-icon"><i class="fa-regular fa-envelope"></i>
                                                </div>
                                                <div class="vl-elfo-caption">
                                                    <h6>Drop A Mail</h6>
                                                    <p>
                                                        @php
                                                            echo substr($client_data->email, 2, 4) . '****' . substr($client_data->email, strpos($client_data->email, '@'));
                                                            // echo preg_replace('/\B[^@.]/', '*', $email)
                                                        @endphp
                                                    </p>
                                                </div>

                                            </div>
                                        @endif
                                        {{-- <div class="vl-elfo-group">
                                                    <div class="vl-elfo-icon"><i class="fa-solid fa-globe"></i></div>
                                                    <div class="vl-elfo-caption">
                                                        <h6>Website</h6>
                                                        <p>Https://themezhub.com</p>
                                                    </div>
                                                </div> --}}
                                    </div>
                                    {{-- @endif --}}
                                    <div class="pg-side-block-buttons">
                                        {{-- <div class="single-button"><a href="JavaScript:Void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#offer"
                                                        class="btn font--medium btn-light-success full-width"><i
                                                            class="fa-solid fa-paper-plane me-2"></i>Send An offer</a>
                                                </div> --}}
                                        @if (session()->has('user'))
                                            <div class="single-button"><a data-bs-toggle="modal"
                                                    data-bs-target="#inquiry"
                                                    class="btn font--medium btn-theme full-width"><i
                                                        class="fa-solid fa-comments me-2"></i>Send A Message</a></div>
                                        @else
                                            <div class="single-button"><a data-bs-toggle="modal"
                                                    data-bs-target="#login"
                                                    class="btn font--medium btn-theme full-width"><i
                                                        class="fa-solid fa-comments me-2"></i>Send A Message</a></div>
                                        @endif
                                    </div>
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
        const copyBtn = document.querySelector('#copyBtn');
        copyBtn.addEventListener('click', e => {
            const input = document.createElement('input');
            input.value = copyBtn.dataset.text;
            document.body.appendChild(input);
            input.select();
            if (document.execCommand('copy')) {
                document.body.removeChild(input);
                document.getElementById("custom-tooltip").style.display = "inline";
                setTimeout(function() {
                    document.getElementById("custom-tooltip").style.display = "none";
                }, 1000);
            }
        });
    </script>

</body>

</html>


<!--
|--------------------------------------------------------------------------
| Inquiry Modal Starts
|--------------------------------------------------------------------------
-->
<div class="modal fade" id="inquiry" tabindex="-1" role="dialog" aria-labelledby="inquirymodal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered inquiry-pop-form" role="document">
        <div class="modal-content" id="inquirymodal">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
            <div class="modal-header">
                <div class="mdl-thumb"><img
                        src="{{ url('/') }}/front/assets/img/brand/PROPERTY_BEEHIVE_LOGO.png" class="img-fluid"
                        width="200" alt=""></div>
                <div class="sec-heading center">
                    <h3>Inquiry Form</h3>
                    {{-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores</p> --}}
                </div>
            </div>
            <div class="modal-body">
                <div class="modal-inquiry-form">
                    <form id="inquiryForm" method="post" action="{{ route('inquiryDetails') }}">
                        @csrf
                        <input type="hidden" name="property_master_id" value="{{ $propertis_details->id }}">
                        <input type="hidden" name="client_master_id" value="{{ $client_data->id }}">

                        <div class="form-floating mb-4">
                            @if (session()->has('user'))
                                <input type="text" class="form-control" placeholder="Name" name="name"
                                    id="inquiry_name" value="{{ session('user')['name'] }}" required>
                                <label>Name</label>
                            @else
                                <input type="text" class="form-control" placeholder="Name" name="name"
                                    id="inquiry_name" value="" required>
                                <label>Name</label>
                            @endif
                        </div>
                        <div class="form-floating mb-4">
                            @if (session()->has('user'))
                                <input type="number" class="form-control" placeholder="Contact Number"
                                    name="contact_no" id="inquiry_contact"
                                    value="{{ session('user')['contact_no'] }}" required>
                                <label>Contact Number</label>
                            @else
                                <input type="number" class="form-control" placeholder="Contact Number"
                                    name="contact_no" id="inquiry_contact" value="" required>
                                <label>Contact Number</label>
                            @endif
                        </div>

                        <div class="form-floating mb-4">
                            @if (session()->has('user'))
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    id="inquiry_email" value="{{ session('user')['email'] }}" required>
                                <label>Email Id</label>
                            @else
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    id="inquiry_email" value="" required>
                                <label>Email Id</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-primary full-width font--bold btn-lg">Submit</button>
                        </div>

                        {{-- <div class="modal-flex-item mb-3">
                            <div class="modal-flex-first">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                        id="remember" @if (Cookie::has('saved_name')) checked @endif>
                                    <label class="form-check-label" for="remember">Save Password</label>
                                </div>
                            </div>
                            <div class="modal-flex-last">
                                <a href="JavaScript:Void(0);">Forget Password?</a>
                            </div>
                        </div> --}}
                    </form>
                </div>
                {{-- <div class="social-login">
                    <ul>
                        <li><a href="JavaScript:Void(0);" class="btn connect-fb"><i
                                    class="fa-brands fa-facebook"></i>Facebook</a></li>
                        <li><a href="JavaScript:Void(0);" class="btn connect-google"><i
                                    class="fa-brands fa-google"></i>Google+</a></li>
                    </ul>
                </div> --}}
            </div>
            {{-- <div class="modal-footer">
                <p>Don't have an account yet?<a href="{{ route('sign_up') }}" class="theme-cl font--bold ms-1">Sign
                        Up</a>
                </p>
            </div> --}}
        </div>
    </div>
</div>
<!--
|--------------------------------------------------------------------------
| Inquiry Modal Ends
|--------------------------------------------------------------------------
-->


<!--
|--------------------------------------------------------------------------
| Review Modal Starts
|--------------------------------------------------------------------------
-->
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="reviewmodal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered review-pop-form" role="document">
        <div class="modal-content" id="reviewmodal">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
            <!-- Submit Reviews -->
            <div class="vesh-detail-bloc">
                <div class="vesh-detail-bloc_header">
                    <h4 class="property_block_title no-arrow">Submit Review</h4>
                </div>
                <div class="panels">
                    <div class="vesh-detail-bloc-body">
                        <form class="simple-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Your eMail">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input type="text" class="form-control" placeholder="Your Contact">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Ratting</label>
                                        <select class="form-control">
                                            <option value="1">1 : Very Poor</option>
                                            <option value="2">2 : Poor</option>
                                            <option value="3">3 : Good</option>
                                            <option value="4">4 : Very Good</option>
                                            <option value="5">5 : Superb</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea class="form-control ht-80" placeholder="Messages"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-theme" type="submit">Submit
                                            Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
|--------------------------------------------------------------------------
| Review Modal Ends
|--------------------------------------------------------------------------
-->
