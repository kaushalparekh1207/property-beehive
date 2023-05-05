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
    <div class="image-cover hero-header" style="background:url({{url('/')}}/front/assets/img/brand/banner-image.jpg) no-repeat;"
         data-overlay="6">
        <div class="container">

            <div class="inner-banner-text text-center">
                <h1>Discover A Beautiful<br>Place With Us</h1>
                <p class="text-light">Would you explore nature paradise in the world, let't find the best property
                    in California withus.</p>
            </div>

            <div class="full-search-2 mt-5">
                <div class="hero-search-content colored">

                    <div class="row classic-search-box m-0 gx-2">

                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="form-group briod">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Ex. villa, town etc.">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="form-group briod">
                                <div class="input-with-icon">
                                    <select class="form-control">
                                        <option value="1">Property types</option>
                                        <option value="2">Townhome</option>
                                        <option value="3">Office & Studio</option>
                                        <option value="4">Apartments</option>
                                        <option value="5">Condos</option>
                                        <option value="6">Bungalow</option>
                                        <option value="7">Farmhouse</option>
                                        <option value="8">Tiny House</option>
                                    </select>
                                    <i class="fa-solid fa-house-crack"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <select class="form-control">
                                        <option value="1">Select City</option>
                                        <option value="2">Huntingdon</option>
                                        <option value="3">Fenland</option>
                                        <option value="4">Aylesbury</option>
                                        <option value="5">Amersham</option>
                                        <option value="6">Macclesfield</option>
                                        <option value="7">Congleton</option>
                                        <option value="8">UNantwich</option>
                                    </select>
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                            <div class="fliox-search-wiop">
                                <div class="form-group me-2">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#filter"
                                       class="btn btn-filter-search"><i class="fa-solid fa-filter"></i>Filter</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary full-width">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>

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

            <div class="row justify-content-center gx-3 gy-4">

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type"><span>For rent</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-1.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-9.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">₹7,549<span
                                                class="monthly">/Months</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Agile Real Estate Group</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>2000 sft</span></li>
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
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type"><span>For rent</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-2.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-11.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$7,549<span
                                                class="monthly">/Months</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Goldfinch Real Property</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>7 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>3 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>2700 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type fr-sale"><span>For Sale</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-3.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-12.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-13.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$9,10770<span
                                                class="monthly">/USD</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Great Apex Realty Group</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>5 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>1800 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type"><span>For rent</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-4.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-14.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-15.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$7,549<span
                                                class="monthly">/Months</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Hearthstone Real Property</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>6 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>4 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>3200 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type"><span>For rent</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-5.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-9.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$7,549<span
                                                class="monthly">/Months</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">The Select Brick Builders</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>5 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>4 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>4000 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type fr-sale"><span>For Sale</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-6.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-12.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-13.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$12,50650<span
                                                class="monthly">/USD</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Dream Big Real Estate</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>3 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>2100 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type"><span>For rent</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-7.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-10.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-11.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$7,549<span
                                                class="monthly">/Months</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Knob and Key Realty Group</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>3 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>2400 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Single Property -->

                <!-- Single Property -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="veshm-list-wraps">
                        <div class="veshm-type fr-sale"><span>For Sale</span></div>

                        <div class="veshm-list-thumb">
                            <button type="button" class="compare-btn"><i
                                    class="fa-solid fa-repeat"></i>Compare</button>
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-8.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-12.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img src="{{url('/')}}/front/assets/img/prt-13.png"
                                                                               class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-block">
                            <div class="veshm-list-head">
                                <div class="veshm-list-head-caption">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">$8,70510<span
                                                class="monthly">/USD</span></h4>
                                    </div>
                                    <div class="listing-short-detail-flex">
                                        <h5 class="rlhc-title-name verified"><a href="single-property-1.html"
                                                                                class="prt-link-detail">Allen Tate Real Company</a></h5>
                                    </div>
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li><i class="fa-solid fa-bed"></i><span>4 Bed</span></li>
                                            <li><i class="fa-solid fa-bath"></i><span>2 Ba</span></li>
                                            <li><i class="fa-solid fa-vector-square"></i><span>1700 sft</span></li>
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
                                        <span class="prefix-title">USD/Month</span>
                                    </div>
                                </div>
                                <div class="prty-offers-btn">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#offer"
                                       class="btn btn-offer-send">Send Offer</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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

</body>

</html>
