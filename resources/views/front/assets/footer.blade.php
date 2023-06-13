@php
    $allDetails = footer();
@endphp
<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <img src="{{ url('/') }}/front/assets/img/brand/pROPERTY_bEEHIVE_white.png"
                            class="img-footer" alt="">
                        <div class="footer-add">
                            <p>Collins Street West, Victoria 8007, Australia.</p>
                            <p><span class="ftp-info"><i class="fa fa-phone" aria-hidden="true"></i>+1
                                    246-345-0695</span></p>
                            <p><span class="ftp-info"><i class="fa fa-envelope"
                                        aria-hidden="true"></i>info@example.com</span></p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">Navigations</h4>
                        <ul class="footer-menu">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="faq.html">FAQs Page</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="blog.html">Blog</a></li>
                        </ul>
                    </div>
                </div>

                {{-- <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">The Highlights</h4>
                        <ul class="footer-menu">
                            <li><a href="JavaScript:Void(0);">Apartment</a></li>
                            <li><a href="JavaScript:Void(0);">My Houses</a></li>
                            <li><a href="JavaScript:Void(0);">Restaurant</a></li>
                            <li><a href="JavaScript:Void(0);">Nightlife</a></li>
                            <li><a href="JavaScript:Void(0);">Villas</a></li>
                        </ul>
                    </div>
                </div> --}}

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="footer-menu">
                            <li><a href="JavaScript:Void(0);">My Profile</a></li>
                            <li><a href="JavaScript:Void(0);">My account</a></li>
                            <li><a href="{{ route('myProperties') }}">My Property</a></li>
                            <li><a href="JavaScript:Void(0);">Favorites</a></li>
                            <li><a href="JavaScript:Void(0);">Cart</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">Latest Listings</h4>
                        <ul class="footer-menu">
                            <li>
                                @foreach ($allDetails as $details)
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-4">
                                                    <a
                                                        href="{{ route('propertydetails', [$details->id, $details->property_type_id, $details->name_of_project, $details->client_master_id]) }}"><img
                                                            src="{{ url('/') }}/front/assets/img/prt-11.png"
                                                            class="img-fluid1" alt=""></a>
                                                </div>
                                                <div class="col-6">
                                                    <a
                                                        href="{{ route('propertydetails', [$details->id, $details->property_type_id, $details->name_of_project, $details->client_master_id]) }}">
                                                        <h5 style="color: #FA962A" class="mx-1">
                                                            {{ Str::limit($details->name_of_project, 10) }}</h5>
                                                    </a>
                                                    <h6 class="mx-1" style="color: white">
                                                        ₹@php
                                                            echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $details->expected_price);
                                                        @endphp
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                            {{-- <li><a href="JavaScript:Void(0);">My Houses</a></li>
                            <li><a href="JavaScript:Void(0);">Restaurant</a></li>
                            <li><a href="JavaScript:Void(0);">Nightlife</a></li>
                            <li><a href="JavaScript:Void(0);">Villas</a></li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Download Apps</h4>
                        <div class="app-wrap">
                            <p><a href="JavaScript:Void(0);"><img
                                        src="{{ url('/') }}/front/assets/img/Google-Play-Badge.svg"
                                        class="img-fluid1" alt=""></a></p>
                            <p><a href="JavaScript:Void(0);"><img
                                        src="{{ url('/') }}/front/assets/img/App-Store-Badge.svg"
                                        class="img-fluid1" alt=""></a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12">
                    <p class="mb-0">© 2023 Veshm. Designd By <a href="https://www.hackberrysoftech.com/">hackberry
                            softech pvt. ltd</a> All Rights Reserved</p>
                </div>

            </div>
        </div>
    </div>
</footer>
