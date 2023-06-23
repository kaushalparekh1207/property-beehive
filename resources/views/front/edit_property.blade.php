@section('home_page')
    active
@endsection
@section('post_property')
    active
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Beehive</title>
    @include('front.assets.links')
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 400px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;
        }

        .gmap_iframe {
            height: 400px !important;
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


        <!-- ============================ Top Banner Start================================== -->
        {{-- <div class="page-title"
            style="background:#017efa url({{url('/')}}/front/assets/img/page-title.png) no-repeat;"> --}}
        {{-- <div class="container"> --}}
        {{-- <div class="row"> --}}
        {{-- <div class="col-lg-12 col-md-12"> --}}

        {{-- <h2 class="ipt-title">Hi, Harshvardhan</h2> --}}
        {{-- <span class="ipn-subtitle">Manage your profile and view property</span> --}}

        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <!-- ============================ Top Banner End ================================== -->

        <!-- ============================= Explore Dashboard =============================== -->
        <section class="gray-simple pt-5 pb-5">
            <div class="container-fluid">

                <div class="row">

                    @include('front.assets.sidepanel')

                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="dashboard-body">

                            <div class="dashboard-wraper">
                                <div class="row">

                                    <!-- Submit Form -->
                                    <div class="col-lg-12 col-md-12">

                                        <div class="submit-page">
                                            <form class="" id="editPropertyForm" method="POST"
                                                action="{{ route('editPropertyData') }}">
                                                <input type="hidden" name="_token" id="token"
                                                    value="{{ csrf_token() }}">
                                                <input type="hidden" name="property_type_id" id="property_type_id"
                                                    value="{{ $property_type_id }}">
                                                <input type="hidden" name="property_id" id="property_id"
                                                    value="{{ $propertyData->id }}">
                                                <input type="hidden" name="property_master_id" id="property_master_id"
                                                    value="{{ $id }}">
                                                <div class="bs-stepper">
                                                    <div class="bs-stepper-header" role="tablist">
                                                        <!-- your steps here -->
                                                        <div class="step" data-target="#logins-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="logins-part" id="logins-part-trigger">
                                                                <span class="bs-stepper-circle">1</span>
                                                                <span class="bs-stepper-label">Basic Information</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#information-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="information-part"
                                                                id="information-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                                <span class="bs-stepper-label">Property
                                                                    information</span>
                                                            </button>
                                                        </div>
                                                        {{-- <div class="line"></div>
                                                        <div class="step" data-target="#photos-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="photos-part" id="photos-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
                                                                <span class="bs-stepper-label">Photos</span>
                                                            </button>
                                                        </div> --}}
                                                    </div>
                                                    <!-- your steps content here -->
                                                    <div id="logins-part" class="content" role="tabpanel"
                                                        aria-labelledby="logins-part-trigger">
                                                        <h3>Property Details</h3>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>I want to <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input property_status propertyStatusSale"
                                                                                name="property_status" type="radio"
                                                                                value="Sale"
                                                                                @if ($propertyMasterData->property_status == 'Sale') checked @endif>
                                                                            <label for="a-1"
                                                                                class="form-check-label">Sale</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input property_status propertyStatusRent"
                                                                                name="property_status" type="radio"
                                                                                value="Rent/Lease"
                                                                                @if ($propertyMasterData->property_status == 'Rent/Lease') checked @endif>
                                                                            <label for="a-2"
                                                                                class="form-check-label">Rent/Lease</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input property_status propertyStatusPg"
                                                                                name="property_status" type="radio"
                                                                                value="PG/Hostel"
                                                                                @if ($propertyMasterData->property_status == 'PG/Hostel') checked @endif>
                                                                            <label for="a-3"
                                                                                class="form-check-label">PG/Hostel</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Property Type<a href="javascript:void(0)"
                                                                        class="tip-topdata" data-tip="Property Type"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2" name="property_type"
                                                                    id="property_type">
                                                                    <option
                                                                        value="{{ $propertyMasterData->property_type_id }}"
                                                                        selected disabled>
                                                                        {{ $propertyType }}</option>
                                                                </select>
                                                                <small id="property_type_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Property Category<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Category"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2" name="property_category"
                                                                    id="property_category_dropdown">
                                                                    <option value="" selected disabled>
                                                                        {{ $propertyCategory }}</option>
                                                                </select>
                                                                <small id="property_category_error"></small>
                                                            </div>

                                                            <h3>Property Location</h3>
                                                            <div class="form-group col-md-4">
                                                                <label>State</label>
                                                                <select class="js-select2" name="state_id"
                                                                    id="state_id">
                                                                    <option value="" selected disabled>Select
                                                                        State
                                                                    </option>
                                                                    @foreach ($states as $state)
                                                                        @if ($state->id == $propertyMasterData->state_id)
                                                                            @php $selected = 'selected'; @endphp
                                                                        @else
                                                                            @php $selected = ''; @endphp
                                                                        @endif
                                                                        <option value="{{ $state->id }}"
                                                                            {{ $selected }}>
                                                                            {{ $state->state }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <small id="state_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>City</label>
                                                                <select class="js-select2" name="city_id"
                                                                    id="city_dropdown">
                                                                    @php
                                                                        $cityData = App\Models\City::where('state_id', $propertyMasterData->state_id)->get();
                                                                    @endphp
                                                                    @foreach ($cityData as $city)
                                                                        @if ($city->id == $propertyMasterData->city_id)
                                                                            @php $selected = 'selected'; @endphp
                                                                        @else
                                                                            @php $selected = ''; @endphp
                                                                        @endif
                                                                        <option value="{{ $city->id }}"
                                                                            {{ $selected }}>{{ $city->city }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Taluka</label>
                                                                <select class="js-select2" name="taluka_id"
                                                                    id="taluka_dropdown">
                                                                    @php
                                                                        $talukaData = App\Models\Taluka::where('city_id', $propertyMasterData->city_id)->get();
                                                                    @endphp
                                                                    @foreach ($talukaData as $taluka)
                                                                        @if ($taluka->id == $propertyMasterData->taluka_id)
                                                                            @php $selected = 'selected'; @endphp
                                                                        @else
                                                                            @php $selected = ''; @endphp
                                                                        @endif
                                                                        <option value="{{ $city->id }}"
                                                                            {{ $selected }}>
                                                                            {{ $taluka->taluka }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <small id="taluka_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Locality</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Locality/Area" id="locality"
                                                                    name="locality"
                                                                    value="{{ $propertyMasterData->locality }}">
                                                            </div>

                                                            @if ($propertyData->land_zone != null)
                                                                <div class="form-group col-md-12 landZone">
                                                                    <label>Land Zone</label>
                                                                    <select class="js-select2" name="land_zone"
                                                                        id="land_zone">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Commercial"
                                                                            @if ($propertyData->land_zone == 'Commercial') selected @endif>
                                                                            Commercial</option>
                                                                        <option value="Transport & Communication"
                                                                            @if ($propertyData->land_zone == 'Transport & Communication') selected @endif>
                                                                            Transport
                                                                            & Communication</option>
                                                                        <option value="Public Utilities"
                                                                            @if ($propertyData->land_zone == 'Public Utilities') selected @endif>
                                                                            Public Utilities
                                                                        </option>
                                                                        <option value="Public & Semi Public Use"
                                                                            @if ($propertyData->land_zone == 'Public & Semi Public Use') selected @endif>
                                                                            Public &
                                                                            Semi Public Use</option>
                                                                        <option value="Open Spaces"
                                                                            @if ($propertyData->land_zone == 'Open Spaces') selected @endif>
                                                                            Open Spaces</option>
                                                                        <option value="Agricultural Zone"
                                                                            @if ($propertyData->land_zone == 'Agricultural Zone') selected @endif>
                                                                            Agricultural Zone
                                                                        </option>
                                                                        <option value="Special Economic Zone"
                                                                            @if ($propertyData->land_zone == 'Special Economic Zone') selected @endif>
                                                                            Special
                                                                            Economic Zone</option>
                                                                        <option value="Natural Conservation Zone"
                                                                            @if ($propertyData->land_zone == 'Natural Conservation Zone') selected @endif>
                                                                            Natural
                                                                            Conservation Zone</option>
                                                                        <option value="Government Zone"
                                                                            @if ($propertyData->land_zone == 'Government Zone') selected @endif>
                                                                            Government Zone
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            <div class="form-group col-md-12">
                                                                <label>Address</label>
                                                                <textarea class="form-control" style="height: 100px;" id="address" placeholder="Describe Here..." name="address">{{ $propertyMasterData->address }}</textarea>
                                                                <small id="address_error"></small>
                                                            </div>

                                                            {{-- <div class="form-group col-md-6">
                                                                <label>Latitude<a href="#" class="tip-topdata"
                                                                        data-tip="Property latitude"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="text" class="form-control"
                                                                    name="latitude" id="latitude">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Longitude<a href="#" class="tip-topdata"
                                                                        data-tip="Property longitude"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="text" class="form-control"
                                                                    name="longitude" id="longitude">
                                                            </div>

                                                            <div class="form-group col-md-12 showonmap"
                                                                style="display: none;">
                                                                <div class="mapouter">
                                                                    <div class="gmap_canvas">
                                                                        @php
                                                                            $latitude = '<div id="latitude"></div>';
                                                                            $longtitude = '<div id="longtitude"></div>';
                                                                            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.722811674589!2d' . $latitude . '!3d' . $longtitude . '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e856e56cf14e7%3A0x21bdff46a6c9d56d!2sHackberry%20Softech!5e0!3m2!1sen!2sin!4v1687157794076!5m2!1sen!2sin" width="1350" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                                                        @endphp
                                                                        {{-- <iframe class="responsive-iframe"
                                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.722811674598!2d"'$abc.'"!3d23.03394761590243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e856e56cf14e7%3A0x21bdff46a6c9d56d!2sHackberry%20Softech!5e0!3m2!1sen!2sin!4v1687505355787!5m2!1sen!2sin"
                                                                            width="1350" height="400"
                                                                            style="border:0;" allowfullscreen=""
                                                                            loading="lazy"
                                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    </div>
                                                                </div>
                                                            </div> --}}

                                                        </div>

                                                        <button type="button" id="firstBtn"
                                                            class="btn btn-primary btn-sm"
                                                            onclick="stepper.next()">Next
                                                            Step</button><br><br>

                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel"
                                                        aria-labelledby="information-part-trigger">

                                                        <h3>Property Details</h3>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Property Title<a href="#"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Title"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="text" class="form-control"
                                                                    name="name_of_project" id="name_of_project"
                                                                    placeholder="Enter Property Title"
                                                                    value="{{ $propertyMasterData->name_of_project }}">
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Description<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Description"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <textarea type="text" class="form-control" name="descr" id="descr" placeholder="Describe Here...">{{ $propertyData->descr }}</textarea>
                                                                <small id="descr_error"></small>
                                                            </div>

                                                            @if ($propertyData->no_of_flats != null)
                                                                <div class="form-group col-md-12 numberOfFlats">
                                                                    <label>Number of Flats in Your Society
                                                                        <sup>*</sup></label>
                                                                    <div class="o-features mt-2">
                                                                        <ul class="no-ul-list row">
                                                                            <li
                                                                                class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                <input id="a-1"
                                                                                    class="form-check-input no_of_flats"
                                                                                    name="no_of_flats" type="radio"
                                                                                    value="<50"
                                                                                    {{ $propertyData->no_of_flats == '<50' ? 'checked' : '' }}>
                                                                                <label for="a-1"
                                                                                    class="form-check-label">
                                                                                    <50< /label>
                                                                            </li>
                                                                            <li
                                                                                class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                <input id="a-2"
                                                                                    class="form-check-input no_of_flats"
                                                                                    name="no_of_flats" type="radio"
                                                                                    value="50-100"
                                                                                    {{ $propertyData->no_of_flats == '50-100' ? 'checked' : '' }}>
                                                                                <label for="a-2"
                                                                                    class="form-check-label">50-100</label>
                                                                            </li>
                                                                            <li
                                                                                class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                <input id="a-3"
                                                                                    class="form-check-input no_of_flats"
                                                                                    name="no_of_flats" type="radio"
                                                                                    value=">100"
                                                                                    {{ $propertyData->no_of_flats == '>100' ? 'checked' : '' }}>
                                                                                <label for="a-3"
                                                                                    class="form-check-label">>100</label>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <h3>Price Details</h3>
                                                            <div class="form-group col-md-6">
                                                                <label>Property Price<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Price"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="price" name="price"
                                                                    placeholder="Enter Property Expected Price"
                                                                    value="{{ $propertyMasterData->expected_price }}"></input>
                                                                <small id="price_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Booking/Token Amount (Optional)<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="Property Price"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="booking_amount" name="booking_amount"
                                                                    placeholder="Enter Property Booking Amount"
                                                                    value="{{ $propertyMasterData->booking_amount }}"></input>
                                                            </div>

                                                            @if ($propertyData->total_floor != null)
                                                                <h3>Property Features</h3>
                                                                <div class="form-group col-md-3 totalFloors">
                                                                    <label>Total Floors</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="total_floors" id="total_floors">
                                                                        <option value="" selected disabled>Select
                                                                            Total
                                                                            Number of Floor</option>
                                                                        @for ($i = 1; $i <= 20; $i++)
                                                                            @if ($propertyData->total_floor == $i)
                                                                                @php $selected = 'selected'; @endphp
                                                                            @else
                                                                                @php $selected = ''; @endphp
                                                                            @endif
                                                                            <option value="{{ $i }}"
                                                                                {{ $selected }}>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->total_floor != null)
                                                                <div class="form-group col-md-3 totalBedrooms">
                                                                    <label>Total Bedrooms</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="total_bedrooms" id="total_bedrooms">
                                                                        <option value="" selected disabled>Select
                                                                            Total
                                                                            Number of Bedrooms</option>
                                                                        @for ($i = 1; $i <= 9; $i++)
                                                                            @php $propertyData->total_bedrooms == $i ? $selected = 'selected' : $selected = '';  @endphp
                                                                            <option value="{{ $i }}"
                                                                                {{ $selected }}>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->total_balconies != null)
                                                                <div class="form-group col-md-3 totalBalconies">
                                                                    <label>Total Balconies</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="total_balconies" id="total_balconies">
                                                                        <option value="" selected disabled>Select
                                                                            Total
                                                                            Number of Balconies</option>
                                                                        @for ($i = 1; $i <= 6; $i++)
                                                                            @php $propertyData->total_balconies == $i ? $selected = 'selected' : $selected = '';  @endphp
                                                                            <option value="{{ $i }}"
                                                                                {{ $selected }}>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->total_bathrooms != null)
                                                                <div class="form-group col-md-3 totalBathrooms">
                                                                    <label>Total Bathrooms</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="total_bathrooms" id="total_bathrooms">
                                                                        <option value="" selected disabled>Select
                                                                            Total
                                                                            Number of Bathrooms</option>
                                                                        @for ($i = 1; $i <= 6; $i++)
                                                                            @php $propertyData->total_bathrooms == $i ? $selected = 'selected' : $selected = '';  @endphp
                                                                            <option value="{{ $i }}"
                                                                                {{ $selected }}>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->total_washrooms != null)
                                                                <div class="form-group col-md-3 totalWashrooms">
                                                                    <label>Total Washrooms</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="total_washrooms" id="total_washrooms">
                                                                        <option value="" selected disabled>Select
                                                                            Total
                                                                            Number of Washrooms</option>
                                                                        @for ($i = 1; $i <= 6; $i++)
                                                                            <option value="{{ $i }}">
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->personal_washrooms != null)
                                                                <div class="form-group col-md-3 personalWashroom">
                                                                    <label>Personal Washroom ?</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="personal_washroom"
                                                                        id="personal_washroom">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Yes"
                                                                            @if ($propertyData->personal_washrooms == 'Yes') selected @endif>
                                                                            Yes</option>
                                                                        <option value="No"
                                                                            @if ($propertyData->personal_washrooms == 'No') selected @endif>
                                                                            No</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->cafeteria != null)
                                                                <div class="form-group col-md-3 pantry">
                                                                    <label>Pantry/Cafeteria ?</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="cafeteria" id="cafeteria">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Dry"
                                                                            @if ($propertyData->cafeteria == 'Dry') selected @endif>
                                                                            Dry</option>
                                                                        <option value="Wet"
                                                                            @if ($propertyData->cafeteria == 'Wet') selected @endif>
                                                                            Wet</option>
                                                                        <option value="Not Available"
                                                                            @if ($propertyData->cafeteria == 'Not Available') selected @endif>
                                                                            Not Available
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->corner != null)
                                                                <div class="form-group col-md-6 cornerShowRoom">
                                                                    <label>Corner Showroom ?</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="corner_showroom" id="corner_showroom">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Yes"
                                                                            @if ($propertyData->corner == 'Yes') selected @endif>
                                                                            Yes</option>
                                                                        <option value="No"
                                                                            @if ($propertyData->corner == 'No') selected @endif>
                                                                            No</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->is_main_road_facing != null)
                                                                <div class="form-group col-md-6 isMainRoadFacing">
                                                                    <label>Is Main Road Facing ?</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="is_main_road_facing"
                                                                        id="is_main_road_facing">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyMasterData->rera_registration_number != null)
                                                                <div class="form-group col-md-12">
                                                                    <label>Is Rera Registered ?</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="is_rera" id="is_rera"
                                                                        onchange="reraFunction(this.value)">
                                                                        <option value="" selected disabled>Select
                                                                            One</option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-12 rera_reg_number"
                                                                    style="display: none;">
                                                                    <label>Is Rera Registration Number ?</label>
                                                                    <input type="text" class="form-control"
                                                                        id="rera_number" name="rera_number"
                                                                        placeholder="Enter Rera Registration Number"
                                                                        value="{{ $propertyMasterData->rera_registration_number }}"></input>
                                                                </div>
                                                            @endif

                                                            {{-- @if (count($propertyAmenities) > 0)
                                                                <div class="form-group col-md-12">
                                                                    <strong>Facilities (Amenities)</strong>
                                                                    <div class="o-features mt-2">
                                                                        <ul class="no-ul-list row">
                                                                            @foreach ($amenities as $amenity)
                                                                            @php

                                                                                <li
                                                                                    class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                    <input id="a-1"
                                                                                        class="form-check-input amenities"
                                                                                        name="amenities[]"
                                                                                        value="{{ $amenity->id }}"
                                                                                        type="checkbox">
                                                                                    <label for="a-1"
                                                                                        class="form-check-label">{{ $amenity->amenities }}</label>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endif --}}

                                                            @if ($propertyData->floors_allowed_for_construction != null)
                                                                <div
                                                                    class="form-group col-md-12 floorAllowedForConstruction">
                                                                    <label>Floor Allowed for Construction<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Property Description"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="floors_allowed_for_construction"
                                                                        id="floors_allowed_for_construction">
                                                                        <option value="" selected disabled>
                                                                            Select
                                                                            One</option>
                                                                        @for ($i = 1; $i <= 12; $i++)
                                                                            <option value="{{ $i }}">
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->total_open_side != null)
                                                                <div class="form-group col-md-12 noOfOpenSides">
                                                                    <label>No. of Open Sides<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Property Description"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="no_of_open_sides" id="no_of_open_sides">
                                                                        <option value="" selected disabled>Select
                                                                            Total
                                                                            Number of Open Sides</option>
                                                                        @for ($i = 1; $i <= 4; $i++)
                                                                            <option value="{{ $i }}">
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->width_of_road_facing_plot != null)
                                                                <div class="form-group col-md-12 widthOfRoadFacing">
                                                                    <label>Width of road Facing Plot<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="(in meters)"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <input type="text" class="form-control"
                                                                        name="width_of_road_facing_plot"
                                                                        id="width_of_road_facing_plot"
                                                                        placeholder="Enter Width of Road Facing Plot"
                                                                        value="{{ $propertyData->width_of_road_facing_plot }}">
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->any_construction != null)
                                                                <div class="form-group col-md-12 anyConstructionMade">
                                                                    <label>Any Construction Made ?<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Any Construction Made ?"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="any_construction" id="any_construction">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Yes"
                                                                            @if ($propertyData->any_construction == 'Yes') selected @endif>
                                                                            Yes</option>
                                                                        <option value="No"
                                                                            @if ($propertyData->any_construction == 'No') selected @endif>
                                                                            No</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->boundary_wall_made != null)
                                                                <div class="form-group col-md-12 boundaryWallMade">
                                                                    <label>Boundary Wall Made ?<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Boundary Made ?"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="boundary_wall" id="boundary_wall">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Yes"
                                                                            @if ($propertyData->boundary_wall_made == 'Yes') selected @endif>
                                                                            Yes</option>
                                                                        <option value="No"
                                                                            @if ($propertyData->boundary_wall_made == 'No') selected @endif>
                                                                            No</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->furnished_status != null)
                                                                <div class="form-group col-md-12 furnishedStatus">
                                                                    <label for="">Furnished Status<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Select Furnished Status"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="furnished_status" id="furnished_status"
                                                                        style="width: 100%;">
                                                                        <option value="" selected disabled>Select
                                                                            One
                                                                        </option>
                                                                        <option value="Fully Furnished"
                                                                            @if ($propertyData->furnished_status == 'Fully Furnished') selected @endif>
                                                                            Fully Furnished
                                                                        </option>
                                                                        <option value="Unfurnished"
                                                                            @if ($propertyData->furnished_status == 'Unfurnished') selected @endif>
                                                                            Unfurnished
                                                                        </option>
                                                                        <option value="Semi Furnished"
                                                                            @if ($propertyData->furnished_status == 'Semi Furnished') selected @endif>
                                                                            Semi Furnished
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if (
                                                                $propertyData->carpet_area != null ||
                                                                    $propertyData->super_area != null ||
                                                                    $propertyData->plot_area != null ||
                                                                    $propertyData->plot_length != null ||
                                                                    $propertyData->plot_breadth != null)
                                                                <h3 class="area">Area</h3>
                                                                @if ($propertyData->carpet_area != null)
                                                                    <div class="form-group col-md-6 carpetArea">
                                                                        <label>Carpet Area<a href="javascript:void(0)"
                                                                                class="tip-topdata"
                                                                                data-tip="Enter Carpet Area"><i
                                                                                    class="fa-solid fa-info"></i></a></label>
                                                                        <input type="number" class="form-control"
                                                                            id="carpet_area" name="carpet_area"
                                                                            placeholder="Enter Carpet Area"
                                                                            value="{{ $propertyData->carpet_area }}"></input>
                                                                    </div>
                                                                @endif
                                                                @if ($propertyData->super_area != null)
                                                                    <div class="form-group col-md-6 superArea">
                                                                        <label>Super Area<a href="javascript:void(0)"
                                                                                class="tip-topdata"
                                                                                data-tip="Enter Super Area"><i
                                                                                    class="fa-solid fa-info"></i></a></label>
                                                                        <input type="number" class="form-control"
                                                                            id="super_area" name="super_area"
                                                                            placeholder="Enter Super Area"
                                                                            value="{{ $propertyData->super_area }}"></input>
                                                                    </div>
                                                                @endif

                                                                @if ($propertyData->width_of_entrance != null)
                                                                    <div class="form-group col-md-12 widthOfEntrance">
                                                                        <label>Width of Entrance<a
                                                                                href="javascript:void(0)"
                                                                                class="tip-topdata"
                                                                                data-tip="Enter Super Area"><i
                                                                                    class="fa-solid fa-info"></i></a></label>
                                                                        <input type="text" class="form-control"
                                                                            id="width_of_entrance"
                                                                            name="width_of_entrance"
                                                                            placeholder="Enter Width of Entrance"
                                                                            value="{{ $propertyData->width_of_entrance }}"></input>
                                                                    </div>
                                                                @endif

                                                                @if ($propertyData->plot_area != null)
                                                                    <div class="form-group col-md-4 plotArea">
                                                                        <label>Plot Area<a href="javascript:void(0)"
                                                                                class="tip-topdata"
                                                                                data-tip="Enter Plot Area"><i
                                                                                    class="fa-solid fa-info"></i></a></label>
                                                                        <input type="number" class="form-control"
                                                                            id="plot_area" name="plot_area"
                                                                            placeholder="Enter Plot Area"
                                                                            value="{{ $propertyData->plot_area }}"></input>
                                                                    </div>
                                                                @endif

                                                                @if ($propertyData->plot_length != null)
                                                                    <div class="form-group col-md-4 plotLength">
                                                                        <label>Plot Length<a href="javascript:void(0)"
                                                                                class="tip-topdata"
                                                                                data-tip="Enter Plot Length"><i
                                                                                    class="fa-solid fa-info"></i></a></label>
                                                                        <input type="number" class="form-control"
                                                                            id="plot_length" name="plot_length"
                                                                            placeholder="Enter Plot Length"
                                                                            value="{{ $propertyData->plot_length }}"></input>
                                                                    </div>
                                                                @endif

                                                                @if ($propertyData->plot_breadth != null)
                                                                    <div class="form-group col-md-4 plotBreadth">
                                                                        <label>Plot Breadth<a href="javascript:void(0)"
                                                                                class="tip-topdata"
                                                                                data-tip="Enter Plot Breadth"><i
                                                                                    class="fa-solid fa-info"></i></a></label>
                                                                        <input type="number" class="form-control"
                                                                            id="plot_breadth" name="plot_breadth"
                                                                            placeholder="Enter Plot Breadth"
                                                                            value="{{ $propertyData->plot_breadth }}"></input>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                            @if ($propertyData->possession_status != null)
                                                                <h3 class="transaction_type">Transaction Type,
                                                                    Property
                                                                    Availability</h3>
                                                                <div class="form-group col-md-12 possessionStatus">
                                                                    <label for="">Possession Status<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Select Possession Status"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="possession_status"
                                                                        id="possession_status" style="width: 100%;">
                                                                        <option value="" selected disabled>
                                                                            Select
                                                                            One
                                                                        </option>
                                                                        <option value="Under Construction"
                                                                            @if ($propertyData->possession_status == 'Under Construction') selected @endif>
                                                                            Under Construction</option>
                                                                        <option value="Ready to Move"
                                                                            @if ($propertyData->possession_status == 'Ready to Move') selected @endif>
                                                                            Ready to Move
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->time_duration != null)
                                                                <div class="form-group col-md-12 time_duration">
                                                                    <label for="">Available From</label>
                                                                    <input type="text" id="available_from"
                                                                        name="available_from" class="form-control"
                                                                        placeholder="Select Date">
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->age != null)
                                                                <div class="form-group col-md-12 property_age">
                                                                    <label for="">Age<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="Property Age"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="age" id="age"
                                                                        style="width: 100%;">
                                                                        <option value="" selected disabled>
                                                                            Select
                                                                            One
                                                                        </option>
                                                                        <option value="New Construction"
                                                                            @if ($propertyData->age == 'New Construction') selected @endif>
                                                                            New
                                                                            Construction
                                                                        </option>
                                                                        <option value="Less than 5 Years"
                                                                            @if ($propertyData->age == 'Less than 5 Years') selected @endif>
                                                                            Less than
                                                                            5
                                                                            Years
                                                                        </option>
                                                                        <option value="5 to 10 Years"
                                                                            @if ($propertyData->age == '5 to 10 Years') selected @endif>
                                                                            5 to 10 Years
                                                                        </option>
                                                                        <option value="10 to 15 Years"
                                                                            @if ($propertyData->age == '10 to 15 Years') selected @endif>
                                                                            10 to 15
                                                                            Years
                                                                        </option>
                                                                        <option value="15 to 20 Years"
                                                                            @if ($propertyData->age == '15 to 20 Years') selected @endif>
                                                                            15 to 20
                                                                            Years
                                                                        </option>
                                                                        <option value="Above 20 Years"
                                                                            @if ($propertyData->age == 'Above 20 Years') selected @endif>
                                                                            Above 20
                                                                            Years
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->currently_leased_out != null)
                                                                <h3 class="rent_lease_details">Rent/ Lease Details
                                                                </h3>
                                                                <div class="form-group col-md-12 currentlyLeasedOut">
                                                                    <label for="">Currently Leased Out ?<a
                                                                            href="javascript:void(0)"
                                                                            class="tip-topdata"
                                                                            data-tip="is Property Currently Leased Out"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="currently_leased_out"
                                                                        id="currently_leased_out"
                                                                        onchange="currentlyLeasedOut(this.value)"
                                                                        style="width: 100%;">
                                                                        <option value="" selected disabled>
                                                                            Select
                                                                            One
                                                                        </option>
                                                                        <option value="Yes"
                                                                            @if ($propertyData->currently_leased_out == 'Yes') selected @endif>
                                                                            Yes</option>
                                                                        <option value="No"
                                                                            @if ($propertyData->currently_leased_out == 'No') selected @endif>
                                                                            No</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->leased_to != null)
                                                                <div class="form-group col-md-6 leasedTo">
                                                                    <label for="">Please Specify whether
                                                                        your
                                                                        Property has
                                                                        been leased to Company or an
                                                                        Individual</label>
                                                                    <input type="text" class="form-control"
                                                                        id="leased_to" placeholder="Describe here.."
                                                                        name="leased_to"
                                                                        value="{{ $propertyData->leased_to }}">
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->leased_to != null)
                                                                <div class="form-group col-md-6 monthlyRent">
                                                                    <label for="">Monthly Rent</label>
                                                                    <input type="text" class="form-control"
                                                                        id="monthly_rent"
                                                                        placeholder="Enter Monthly Rent"
                                                                        name="monthly_rent">
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->security_amount != null)
                                                                <div class="form-group col-md-6 securityAmount">
                                                                    <label for="">Security Amount
                                                                        (Optional)</label>
                                                                    <input type="text" class="form-control"
                                                                        id="security_amount"
                                                                        placeholder="Enter Security Amount"
                                                                        name="security_amount">
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->maintenance_charges != null)
                                                                <div class="form-group col-md-6 maintenanceCharges">
                                                                    <label for="">Maintenance
                                                                        Charges</label>
                                                                    <input type="text" class="form-control"
                                                                        id="maintenance_charges"
                                                                        placeholder="Enter Maintenance Charges"
                                                                        name="maintenance_charges">
                                                                </div>
                                                            @endif

                                                            @if ($propertyData->per_charges != null)
                                                                <div class="form-group col-md-6 perCharges">
                                                                    <label for="">Charges Per</label>
                                                                    <select class="js-select2-disablesearch"
                                                                        name="per_charges" id="per_charges"
                                                                        style="width: 100%;">
                                                                        <option value="" selected disabled>
                                                                            Select
                                                                            One
                                                                        </option>
                                                                        <option value="Monthly"
                                                                            @if ($propertyData->per_charges == 'Monthly') selected @endif>
                                                                            Monthly</option>
                                                                        <option value="Quarterly"
                                                                            @if ($propertyData->per_charges == 'Quarterly') selected @endif>
                                                                            Quarterly
                                                                        </option>
                                                                        <option value="Yearly"
                                                                            @if ($propertyData->per_charges == 'Yearly') selected @endif>
                                                                            Yearly</option>
                                                                        <option value="One-Time"
                                                                            @if ($propertyData->per_charges == 'One-Time') selected @endif>
                                                                            One-Time</option>
                                                                        <option value="Per sq. Unit Monthly"
                                                                            @if ($propertyData->per_charges == 'Per sq. Unit Monthly') selected @endif>
                                                                            Per
                                                                            sq.
                                                                            Unit
                                                                            Monthly</option>
                                                                    </select>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <br><br>

                                                        <button type="button" id="prev_step1"
                                                            class="btn btn-primary btn-sm"
                                                            onclick="stepper.previous()">Previous Step</button>
                                                        <button type="submit" class="btn btn-primary btn-sm"
                                                            id="btn-submit"
                                                            style="background-color: #dc3545; border: none;">Save
                                                            Changes</button>
                                                    </div>
                                            </form>

                                            <div id="photos-part" class="content" role="tabpanel"
                                                aria-labelledby="photos-part-trigger">
                                                <label for="">Banner/Cover Image<sup>*</sup></label>
                                                <form action="{{ route('uploadPropertyBannerImage') }}"
                                                    method="post" id="bannerImageUpload"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Master Plan Image<sup>*</sup></label>
                                                <form action="{{ route('uploadPropertyMasterPlanImage') }}"
                                                    method="post" id="masterImageUpload"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form>
                                                <br>

                                                <label for="">Site View Image<sup>*</sup></label>
                                                <form action="{{ route('uploadPropertySiteViewImage') }}"
                                                    method="post" id="siteViewImageUpload"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Floor Plan Image<sup>*</sup></label>
                                                <form action="{{ route('uploadPropertyFloorPlanImage') }}"
                                                    method="post" id="floorPlanImageUpload"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Exterior View Image<sup>*</sup></label>
                                                <form action="{{ route('uploadExteriorViewImage') }}" method="post"
                                                    id="exteriorViewImage"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Living Room Image<sup>*</sup></label>
                                                <form action="{{ route('uploadLivingRoomImage') }}" method="post"
                                                    id="livingRoomImage"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Bedroom Image<sup>*</sup></label>
                                                <form action="{{ route('uploadBedRoomImage') }}" method="POST"
                                                    id="bedRoomImage" class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Kitchen Image<sup>*</sup></label>
                                                <form action="{{ route('uploadKitchenImage') }}" method="post"
                                                    id="kitchenImage" class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Bathroom Image<sup>*</sup></label>
                                                <form action="{{ route('uploadBathroomImage') }}" method="post"
                                                    id="bathroomImage" class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Location Map Image<sup>*</sup></label>
                                                <form action="{{ route('uploadLocationMapImage') }}" method="post"
                                                    id="locationMapImage"
                                                    class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                <label for="">Other Image<sup>*</sup></label>
                                                <form action="{{ route('uploadOtherImage') }}" method="post"
                                                    id="otherImage" class="dropzone dz-clickable primary-dropzone"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="dz-default dz-message">
                                                        <i class="fa-solid fa-images"></i>
                                                        <span>Drag & Drop Files to Upload</span>
                                                    </div>
                                                </form><br>

                                                {{-- <button type="button" id="prev_step" class="btn btn-primary btn-sm"
                                                    --}} {{-- onclick="stepper.previous()">Previous Step</button> --}}
                                                <a href="{{ route('myProperties') }}" class="btn btn-primary btn-sm"
                                                    style="background-color: #dc3545; border: none;">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- row -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ url('/') }}/front/assets/js/property_category_fields.js"></script>
    <script src="{{ url('/') }}/front/assets/js/post_property.js"></script> --}}
    <script>
        $(document).ready(function() {
            $(".js-select2").select2({
                closeOnSelect: true
            });
            $(".js-select2-disablesearch").select2({
                minimumResultsForSearch: Infinity
            });

            $('#possession_status').on('change', function() {
                var possession_status = $(this).val();
                if (possession_status == 'Under Construction') {
                    $('.time_duration').show();
                    $('.property_age').hide();
                } else {
                    $('.time_duration').hide();
                    $('.property_age').show();
                }
            });
        });
    </script>
    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    <script>
        // Initialize Summernote
        $('#summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    </script>
    <script>
        Dropzone.options.bannerImageUpload = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
        }

        Dropzone.options.masterImageUpload = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.siteViewImageUpload = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.floorPlanImageUpload = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.exteriorViewImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.livingRoomImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.bedRoomImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.kitchenImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.bathroomImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.locationMapImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.otherImage = {
            maxFilesize: 2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }
    </script>
    <script>
        $(function() {
            $("#available_from").datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: 0,
                dateFormat: 'dd-mm-yy',
            });
        });
    </script>
    <script>
        function reraFunction(val) {
            val == 'Yes' ? $('.rera_reg_number').show() : $('.rera_reg_number').hide();
        }
    </script>
    {{-- <script>
        // $(document).ready(function() {
        $("#firstBtn").on("click", function() {
            var latitude = $("#latitude").val();
            alert(latitude);
            if(latitude)
        });
        // });
    </script> --}}

</body>

</html>
