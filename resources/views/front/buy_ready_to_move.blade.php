@php
    use App\Models\CommercialProperty;
    use App\Models\IndustrialProperty;
    use App\Models\ResidentialProperty;
    use App\Models\AgriculturalProperty;
@endphp
@section('buy')
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

            <div class="container"><br>

                <table id="example" class="table mt-5" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @foreach ($properties as $property)
                                    @php
                                        $commercial_property = CommercialProperty::where('flag', 1)
                                            ->where('possession_status', '=', 'Ready to Move')
                                            ->get();
                                        $residential_property = ResidentialProperty::where('flag', 1)
                                            ->where('possession_status', '=', 'Ready to Move')
                                            ->get();
                                        $industrial_property = IndustrialProperty::where('flag', 1)
                                            ->where('possession_status', '=', 'Ready to Move')
                                            ->get();
                                        $agriculture_property = AgriculturalProperty::where('flag', 1)
                                            ->where('possession_status', '=', 'Ready to Move')
                                            ->get();
                                    @endphp
                                    @foreach ($residential_property as $residential)
                                        @if ($property->id == $residential->property_master_id)
                                            <div id="cell" class="row gx-3 gy-4">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="veshm-list-prty">
                                                        <div class="veshm-list-prty-figure1">
                                                            <div class="veshm-list-img-slide">
                                                                <div class="veshm-list-click">
                                                                    {{-- <div><a
                                                                    href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                        src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}
                                                                        class="img-fluid
                                                                        mx-auto" alt=""></a>
                                                            </div> --}}
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-2.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-3.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-4.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
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
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @elseif($property->property_status == 'PG/Hostel')
                                                                        <div class="veshm-type fr-pg"><span>For
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @endif
                                                                    <h5 class="rlhc-title-name verified"><a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                                {{-- src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}" --}}
                                                                                class="prt-link-detail alt="">{{ $property->name_of_project }}</a>
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
                                                                    <button class="btn btn-like active"
                                                                        type="button"><i
                                                                            class="fa-solid fa-heart-circle-check"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-middle">
                                                                <div class="veshm-list-icons">
                                                                    <ul>

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
                                                                                <i
                                                                                    class="fa-solid fa-vector-square"></i><span>{{ $residential->carpet_area }}
                                                                                    sft</span>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-footers">
                                                                <div class="veshm-list-ftr786">
                                                                    <div class="rlhc-price">
                                                                        <h4 class="rlhc-price-name theme-cl">
                                                                            ₹@php
                                                                                echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                                            @endphp
                                                                            @if ($property->property_status == 'Sale')
                                                                                <span class="monthly">One Time</span>
                                                                            @elseif ($property->property_status == 'Rent/Lease')
                                                                                <span class="monthly">/Months</span>
                                                                            @elseif ($property->property_status == 'PG/Hostel')
                                                                                <span class="monthly">/Months</span>
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="veshm-list-ftr1707">
                                                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                                        data-bs-target="#offer"
                                                                        class="btn btn-md btn-primary font--medium">Send
                                                                        Offer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @foreach ($commercial_property as $commercial)
                                        @if ($property->id == $commercial->property_master_id)
                                            <div id="cell" class="row gx-3 gy-4">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="veshm-list-prty">
                                                        <div class="veshm-list-prty-figure1">
                                                            <div class="veshm-list-img-slide">
                                                                <div class="veshm-list-click">
                                                                    {{-- <div><a
                                                                    href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                        src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}
                                                                        class="img-fluid
                                                                        mx-auto" alt=""></a>
                                                            </div> --}}
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-2.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-3.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-4.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
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
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @elseif($property->property_status == 'PG/Hostel')
                                                                        <div class="veshm-type fr-pg"><span>For
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @endif
                                                                    <h5 class="rlhc-title-name verified"><a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                                {{-- src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}" --}}
                                                                                class="prt-link-detail alt="">{{ $property->name_of_project }}</a>
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
                                                                    <button class="btn btn-like active"
                                                                        type="button"><i
                                                                            class="fa-solid fa-heart-circle-check"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-middle">
                                                                <div class="veshm-list-icons">
                                                                    <ul>

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
                                                                                <i
                                                                                    class="fa-solid fa-vector-square"></i><span>{{ $residential->carpet_area }}
                                                                                    sft</span>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-footers">
                                                                <div class="veshm-list-ftr786">
                                                                    <div class="rlhc-price">
                                                                        <h4 class="rlhc-price-name theme-cl">
                                                                            ₹@php
                                                                                echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                                            @endphp
                                                                            @if ($property->property_status == 'Sale')
                                                                                <span class="monthly">One Time</span>
                                                                            @elseif ($property->property_status == 'Rent/Lease')
                                                                                <span class="monthly">/Months</span>
                                                                            @elseif ($property->property_status == 'PG/Hostel')
                                                                                <span class="monthly">/Months</span>
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="veshm-list-ftr1707">
                                                                    <a href="JavaScript:Void(0);"
                                                                        data-bs-toggle="modal" data-bs-target="#offer"
                                                                        class="btn btn-md btn-primary font--medium">Send
                                                                        Offer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @foreach ($industrial_property as $industrial)
                                        @if ($property->id == $industrial->property_master_id)
                                            <div id="cell" class="row gx-3 gy-4">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="veshm-list-prty">
                                                        <div class="veshm-list-prty-figure1">
                                                            <div class="veshm-list-img-slide">
                                                                <div class="veshm-list-click">
                                                                    {{-- <div><a
                                                                    href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                        src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}
                                                                        class="img-fluid
                                                                        mx-auto" alt=""></a>
                                                            </div> --}}
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-2.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-3.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-4.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
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
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @elseif($property->property_status == 'PG/Hostel')
                                                                        <div class="veshm-type fr-pg"><span>For
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @endif
                                                                    <h5 class="rlhc-title-name verified"><a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                                {{-- src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}" --}}
                                                                                class="prt-link-detail alt="">{{ $property->name_of_project }}</a>
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
                                                                    <button class="btn btn-like active"
                                                                        type="button"><i
                                                                            class="fa-solid fa-heart-circle-check"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-middle">
                                                                <div class="veshm-list-icons">
                                                                    <ul>

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
                                                                                <i
                                                                                    class="fa-solid fa-vector-square"></i><span>{{ $residential->carpet_area }}
                                                                                    sft</span>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-footers">
                                                                <div class="veshm-list-ftr786">
                                                                    <div class="rlhc-price">
                                                                        <h4 class="rlhc-price-name theme-cl">
                                                                            ₹@php
                                                                                echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                                            @endphp
                                                                            @if ($property->property_status == 'Sale')
                                                                                <span class="monthly">One Time</span>
                                                                            @elseif ($property->property_status == 'Rent/Lease')
                                                                                <span class="monthly">/Months</span>
                                                                            @elseif ($property->property_status == 'PG/Hostel')
                                                                                <span class="monthly">/Months</span>
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="veshm-list-ftr1707">
                                                                    <a href="JavaScript:Void(0);"
                                                                        data-bs-toggle="modal" data-bs-target="#offer"
                                                                        class="btn btn-md btn-primary font--medium">Send
                                                                        Offer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @foreach ($agriculture_property as $agriculture)
                                        @if ($property->id == $agriculture->property_master_id)
                                            <div id="cell" class="row gx-3 gy-4">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="veshm-list-prty">
                                                        <div class="veshm-list-prty-figure1">
                                                            <div class="veshm-list-img-slide">
                                                                <div class="veshm-list-click">
                                                                    {{-- <div><a
                                                                    href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                        src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}
                                                                        class="img-fluid
                                                                        mx-auto" alt=""></a>
                                                            </div> --}}
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-2.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-3.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div><a href="single-property-1.html"><img
                                                                                src="{{ url('/') }}/front/assets/img/prt-4.png"
                                                                                class="img-fluid mx-auto"
                                                                                alt=""></a>
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
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @elseif($property->property_status == 'PG/Hostel')
                                                                        <div class="veshm-type fr-pg"><span>For
                                                                                {{ $property->property_status }}</span>
                                                                        </div>
                                                                    @endif
                                                                    <h5 class="rlhc-title-name verified"><a
                                                                            href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"><img
                                                                                {{-- src="{{ asset('storage/property/banner_image/' . $property->cover_image) }}" --}}
                                                                                class="prt-link-detail alt="">{{ $property->name_of_project }}</a>
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
                                                                    <button class="btn btn-like active"
                                                                        type="button"><i
                                                                            class="fa-solid fa-heart-circle-check"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-middle">
                                                                <div class="veshm-list-icons">
                                                                    <ul>

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
                                                                                <i
                                                                                    class="fa-solid fa-vector-square"></i><span>{{ $residential->carpet_area }}
                                                                                    sft</span>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="veshm-list-footers">
                                                                <div class="veshm-list-ftr786">
                                                                    <div class="rlhc-price">
                                                                        <h4 class="rlhc-price-name theme-cl">
                                                                            ₹@php
                                                                                echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                                            @endphp
                                                                            @if ($property->property_status == 'Sale')
                                                                                <span class="monthly">One Time</span>
                                                                            @elseif ($property->property_status == 'Rent/Lease')
                                                                                <span class="monthly">/Months</span>
                                                                            @elseif ($property->property_status == 'PG/Hostel')
                                                                                <span class="monthly">/Months</span>
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="veshm-list-ftr1707">
                                                                    <a href="JavaScript:Void(0);"
                                                                        data-bs-toggle="modal" data-bs-target="#offer"
                                                                        class="btn btn-md btn-primary font--medium">Send
                                                                        Offer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>


                    </tbody>
                </table>

                <!-- Start All Cell View -->

                <!-- End All List View -->

                <!-- Start All Cell View -->

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
            $('#example').DataTable({
                searching: false,
                lengthChange: false,
                info: true,
                ordering: false,
            });
        });
    </script>


</body>

</html>
