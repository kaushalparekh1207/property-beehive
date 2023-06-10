@section('rent')
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

        <!-- ============================ Hero Banner End ================================== -->


        <div class="page-title"
            style="background:#017efa url({{ url('/') }}/front/assets/img/page-title.png) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">


                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Page Title End ================================== -->

         <!-- ============================ All Property ================================== -->
         <section class="over-top micler gray-simple">

            <div class="container">

                <!-- Start All Cell View -->
                <div id="cell" class="row gx-3 gy-4">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="veshm-list-prty">
                        <div class="veshm-list-prty-figure1">
                            <div class="veshm-list-img-slide">
                                <div class="veshm-list-click">
                                    <div><a href="single-property-1.html"><img
                                                src="{{ url('/') }}/front/assets/img/prt-11.png"
                                                class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img
                                                src="{{ url('/') }}/front/assets/img/prt-2.png"
                                                class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img
                                                src="{{ url('/') }}/front/assets/img/prt-3.png"
                                                class="img-fluid mx-auto" alt=""></a></div>
                                    <div><a href="single-property-1.html"><img
                                                src="{{ url('/') }}/front/assets/img/prt-4.png"
                                                class="img-fluid mx-auto" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="veshm-list-prty-caption">
                            <div class="veshm-list-kygf">
                                <div class="veshm-list-kygf-flex">
                                    {{-- @if ($result->property_status == 'Sale')
                                        <div class="veshm-type fr-sale"><span>For
                                                {{ $result->property_status }}</span>
                                        </div>
                                    @elseif($result->property_status == 'Rent/Lease')
                                        <div class="veshm-type"><span>For
                                                {{ $result->property_status }}</span></div>
                                    @elseif($result->property_status == 'PG/Hostel')
                                        <div class="veshm-type fr-pg"><span>For
                                                {{ $result->property_status }}</span></div>
                                    @endif --}}
                                    <div class="veshm-type fr-pg"><span>For
                                        Sell</span></div>
                                    {{-- <span>For {{ $result->property_status }}</span> --}}
                                    {{-- </div> --}}
                                    <h5 class="rlhc-title-name verified"><a
                                            href="#"
                                            class="prt-link-detail">Ganesh</a>
                                    </h5>
                                    <div class="vesh-aget-rates">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <span class="resy-98">322 Reviews</span>
                                    </div>
                                </div>
                                <div class="veshm-list-head-flex">
                                    <button class="btn btn-like active" type="button"><i
                                            class="fa-solid fa-heart-circle-check"></i></button>
                                </div>
                            </div>
                            <div class="veshm-list-middle">
                                <div class="veshm-list-icons">
                                    <ul>
                                        {{-- @if ($result->total_bedrooms != null)
                                            <li><i class="fa-solid fa-bed"></i><span>{{ $result->total_bedrooms }}
                                                    Bed</span></li>
                                        @endif
                                        @if ($result->total_bathrooms != null)
                                            <li><i class="fa-solid fa-bath"></i><span>{{ $result->total_bathrooms }}
                                                    Bath</span></li>
                                        @endif
                                        @if ($result->carpet_area != null)
                                            <li><i class="fa-solid fa-vector-square"></i><span>{{ $result->carpet_area }}
                                                    Sqft</span>
                                        @endif --}}
                                        <li><i class="fa-solid fa-bed"></i><span>2
                                            Bed</span></li>
                                        </li>
                                        <li><i class="fa-solid fa-calendar-days"></i><span>Built
                                                2017</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="veshm-list-footers">
                                <div class="veshm-list-ftr786">
                                    <div class="rlhc-price">
                                        <h4 class="rlhc-price-name theme-cl">
                                            ₹900000
                                            {{-- @if ($result->property_status == 'Sale')
                                                <span class="monthly">One Time</span>
                                            @elseif ($result->property_status == 'Rent/Lease')
                                                <span class="monthly">/Months</span>
                                            @elseif ($result->property_status == 'PG/Hostel')
                                                <span class="monthly">/Months</span>
                                            @endif --}}
                                            <span class="monthly">One Time</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="veshm-list-ftr1707">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                        data-bs-target="#offer"
                                        class="btn btn-md btn-primary font--medium">Send Offer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End All List View -->

                <!-- Start All Cell View -->
                <div id="cell" class="row gx-3 gy-4">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       <div class="veshm-list-prty">
                           <div class="veshm-list-prty-figure1">
                               <div class="veshm-list-img-slide">
                                   <div class="veshm-list-click">
                                       <div><a href="single-property-1.html"><img
                                                   src="{{ url('/') }}/front/assets/img/prt-11.png"
                                                   class="img-fluid mx-auto" alt=""></a></div>
                                       <div><a href="single-property-1.html"><img
                                                   src="{{ url('/') }}/front/assets/img/prt-2.png"
                                                   class="img-fluid mx-auto" alt=""></a></div>
                                       <div><a href="single-property-1.html"><img
                                                   src="{{ url('/') }}/front/assets/img/prt-3.png"
                                                   class="img-fluid mx-auto" alt=""></a></div>
                                       <div><a href="single-property-1.html"><img
                                                   src="{{ url('/') }}/front/assets/img/prt-4.png"
                                                   class="img-fluid mx-auto" alt=""></a></div>
                                   </div>
                               </div>
                           </div>
                           <div class="veshm-list-prty-caption">
                               <div class="veshm-list-kygf">
                                   <div class="veshm-list-kygf-flex">
                                       {{-- @if ($result->property_status == 'Sale')
                                           <div class="veshm-type fr-sale"><span>For
                                                   {{ $result->property_status }}</span>
                                           </div>
                                       @elseif($result->property_status == 'Rent/Lease')
                                           <div class="veshm-type"><span>For
                                                   {{ $result->property_status }}</span></div>
                                       @elseif($result->property_status == 'PG/Hostel')
                                           <div class="veshm-type fr-pg"><span>For
                                                   {{ $result->property_status }}</span></div>
                                       @endif --}}
                                       <div class="veshm-type"><span>For
                                        Rent</span></div>
                                       {{-- <span>For {{ $result->property_status }}</span> --}}
                                       {{-- </div> --}}
                                       <h5 class="rlhc-title-name verified"><a
                                               href="#"
                                               class="prt-link-detail">2BHK Laxmi Bhavan</a>
                                       </h5>
                                       <div class="vesh-aget-rates">
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <span class="resy-98">322 Reviews</span>
                                       </div>
                                   </div>
                                   <div class="veshm-list-head-flex">
                                       <button class="btn btn-like active" type="button"><i
                                               class="fa-solid fa-heart-circle-check"></i></button>
                                   </div>
                               </div>
                               <div class="veshm-list-middle">
                                   <div class="veshm-list-icons">
                                       <ul>
                                           {{-- @if ($result->total_bedrooms != null)
                                               <li><i class="fa-solid fa-bed"></i><span>{{ $result->total_bedrooms }}
                                                       Bed</span></li>
                                           @endif
                                           @if ($result->total_bathrooms != null)
                                               <li><i class="fa-solid fa-bath"></i><span>{{ $result->total_bathrooms }}
                                                       Bath</span></li>
                                           @endif
                                           @if ($result->carpet_area != null)
                                               <li><i class="fa-solid fa-vector-square"></i><span>{{ $result->carpet_area }}
                                                       Sqft</span>
                                           @endif --}}
                                           <li><i class="fa-solid fa-bed"></i><span>2
                                               Bed</span></li>
                                           </li>
                                           <li><i class="fa-solid fa-calendar-days"></i><span>Built
                                                   2017</span>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                               <div class="veshm-list-footers">
                                   <div class="veshm-list-ftr786">
                                       <div class="rlhc-price">
                                           <h4 class="rlhc-price-name theme-cl">
                                               ₹19000
                                               {{-- @if ($result->property_status == 'Sale')
                                                   <span class="monthly">One Time</span>
                                               @elseif ($result->property_status == 'Rent/Lease')
                                                   <span class="monthly">/Months</span>
                                               @elseif ($result->property_status == 'PG/Hostel')
                                                   <span class="monthly">/Months</span>
                                               @endif --}}
                                               <span class="monthly">/Months</span>
                                           </h4>
                                       </div>
                                   </div>
                                   <div class="veshm-list-ftr1707">
                                       <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                           data-bs-target="#offer"
                                           class="btn btn-md btn-primary font--medium">Send Offer</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- End All List View -->



                <!-- Start Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">5</a></li>
                                <li class="page-item"><a class="page-link" href="JavaScript:Void(0);">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="JavaScript:Void(0);" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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

    </body>

    </html>
