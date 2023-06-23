@php
    use App\Models\CommercialProperty;
    use App\Models\IndustrialProperty;
    use App\Models\ResidentialProperty;
    use App\Models\AgriculturalProperty;
    use App\Models\PropertyMasterPlanImage;
    use App\Models\PropertySiteViewImage;
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
                                    <br>
                                    @php
                                        $commercial_property = CommercialProperty::where('flag', 1)->get();
                                        $residential_property = ResidentialProperty::where('flag', 1)->get();
                                        $industrial_property = IndustrialProperty::where('flag', 1)->get();
                                        $agriculture_property = AgriculturalProperty::where('flag', 1)->get();
                                    @endphp
                                    @foreach ($residential_property as $residential)
                                        @if ($property->id == $residential->property_master_id)
                                            <div id="cell" class="row gx-3 gy-4">
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
                                                                    <h5 class="rlhc-title-name verified">
                                                                        <a
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
                                                            {{-- <div class="veshm-list-middle">
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
                                                            </div> --}}
                                                            <div class="mb-srp__card__summary-commercial__list">
                                                                @if ($residential->super_area != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class='fas fa-ruler-combined'
                                                                                style="color: #fa962a;"></i>
                                                                            Super Area</div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $residential->super_area }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($residential->possession_status != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-building"
                                                                                style="color: #fa962a;"></i>
                                                                            Status
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $residential->possession_status }}</div>
                                                                    </div>
                                                                @endif
                                                                @if ($residential->furnished_status != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-couch"
                                                                                style="color: #fa962a;"></i>
                                                                            Furnishing </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $residential->furnished_status }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($residential->time_duration != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-trowel-bricks"
                                                                                style="color: #fa962a;"></i>
                                                                            Under Constuction
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            Poss. by {{ $residential->time_duration }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="veshm-list-footers" style="margin-top: 2%">
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
                                                                    <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                                        class="btn btn-md btn-primary font--medium">View
                                                                        Details</a>
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
                                                            {{-- <div class="veshm-list-middle">
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
                                                            </div> --}}
                                                            <div class="mb-srp__card__summary-commercial__list">
                                                                @if ($commercial->carpet_area != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-rug"
                                                                                style="color: #fa962a;"></i>
                                                                            Carpet Area</div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $commercial->carpet_area }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($commercial->possession_status != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-building"
                                                                                style="color: #fa962a;"></i>
                                                                            Status
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $commercial->possession_status }}</div>
                                                                    </div>
                                                                @endif
                                                                @if ($commercial->furnished_status != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-couch"
                                                                                style="color: #fa962a;"></i>
                                                                            Furnishing </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $commercial->furnished_status }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($commercial->cafeteria != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label">
                                                                            Pantry
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $commercial->cafeteria }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="veshm-list-footers" style="margin-top: 2%">
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
                                                                    <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                                        class="btn btn-md btn-primary font--medium">View
                                                                        Details</a>
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
                                                            {{-- <div class="veshm-list-middle">
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
                                                            </div> --}}
                                                            <div class="mb-srp__card__summary-commercial__list">
                                                                @if ($industrial->super_area != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-draw-square"
                                                                                style="color: #fa962a;"></i>
                                                                            Super Area</div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $industrial->super_area }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($industrial->possession_status != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-building"
                                                                                style="color: #fa962a;"></i>
                                                                            Status
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $industrial->possession_status }}</div>
                                                                    </div>
                                                                @endif
                                                                @if ($industrial->age != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-building-shield"
                                                                                style="color: #fa962a;"></i>
                                                                            Property Age </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $industrial->age }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($industrial->boundary_wall_made != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-bars fa-rotate-90"
                                                                                style="color: #fa962a;"></i>
                                                                            Boundary Wall Made
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $industrial->boundary_wall_made }}
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                            <div class="veshm-list-footers" style="margin-top: 2%">
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
                                                                    <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                                        class="btn btn-md btn-primary font--medium">View
                                                                        Details</a>
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
                                                            {{-- <div class="veshm-list-middle">
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
                                                            </div> --}}
                                                            <div class="mb-srp__card__summary-commercial__list">
                                                                @if ($agriculture->plot_area != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class='fas fa-ruler-combined'
                                                                                style="color: #fa962a;"></i>
                                                                            Plot
                                                                            Area</div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $agriculture->plot_area }} sqyrd
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($agriculture->total_open_side != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class='fas fa-arrows-alt'
                                                                                style="color: #fa962a;"></i>
                                                                            Open Sides
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $agriculture->total_open_side }}</div>
                                                                    </div>
                                                                @endif
                                                                @if ($agriculture->boundary_wall_made != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-bars fa-rotate-90"
                                                                                style="color: #fa962a;"></i>
                                                                            Boundary </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $agriculture->boundary_wall_made }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @if ($agriculture->width_of_road_facing_plot != null)
                                                                    <div class="mb-srp__card__summary-commercial__list--item"
                                                                        data-summary="status">
                                                                        <div class="mb-srp__card__summary--label"><i
                                                                                class="fa-solid fa-road"
                                                                                style="color: #fa962a;"></i>
                                                                            Width of road facing the plot
                                                                        </div>
                                                                        <div class="mb-srp__card__summary--value">
                                                                            {{ $agriculture->width_of_road_facing_plot }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="veshm-list-footers" style="margin-top: 2%">
                                                                <div class="veshm-list-ftr786">
                                                                    <div class="rlhc-price">
                                                                        <h4 class="rlhc-price-name theme-cl">
                                                                            ₹@php
                                                                                echo preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $property->expected_price);
                                                                            @endphp
                                                                            @if ($property->property_status == 'Sale')
                                                                                <span class="monthly">One
                                                                                    Time</span>
                                                                            @elseif($property->property_status == 'Rent/Lease')
                                                                                <span class="monthly">/Months</span>
                                                                            @elseif($property->property_status == 'PG/Hostel')
                                                                                <span class="monthly">/Months</span>
                                                                            @endif
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="veshm-list-ftr1707">
                                                                    <a href="{{ route('propertydetails', [$property->id, $property->property_type_id, $property->name_of_project, $property->client_master_id]) }}"
                                                                        class="btn btn-md btn-primary font--medium">View
                                                                        Details</a>
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
            var table = $('#example').DataTable({
                searching: false,
                lengthChange: false,
                info: true,
                ordering: false,
            });
        });
    </script>


</body>

</html>
