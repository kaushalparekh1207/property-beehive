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
        .field .form-cont.room-cont {
            padding-bottom: 24px;
        }

        .room-card {
            background: #acacac;
            color: white;
            font-weight: 800;
            "

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
                    <div class="col-xl-2 col-lg-12 col-md-12"></div>
                    <div class="col-xl-8 col-lg-12 col-md-12">
                        <div class="dashboard-body">

                            <div class="dashboard-wraper">
                                <div class="row">

                                    <!-- Submit Form -->
                                    <div class="col-lg-12 col-md-12">

                                        <div class="submit-page">
                                            <form class="" id="pgpropertyForm" method="POST"
                                                action="{{ route('PGpropertyDataInsertAjax') }}">
                                                <input type="hidden" name="_token" id="token"
                                                    value="{{ csrf_token() }}">
                                                <div class="bs-stepper">
                                                    <div class="bs-stepper-header" role="tablist">
                                                        <!-- your steps here -->
                                                        <div class="step" data-target="#logins-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="logins-part" id="logins-part-trigger">
                                                                <span class="bs-stepper-circle">1</span>
                                                                <span class="bs-stepper-label">Property
                                                                    Details</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#information-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="information-part"
                                                                id="information-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                                <span class="bs-stepper-label">Room Details</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#aminities-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="aminities-part"
                                                                id="aminities-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
                                                                <span class="bs-stepper-label">Amenities
                                                                    (Optional)</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#photos-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="photos-part" id="photos-part-trigger">
                                                                <span class="bs-stepper-circle">4</span>
                                                                <span class="bs-stepper-label">Photos</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- your steps content here -->
                                                    <div id="logins-part" class="content" role="tabpanel"
                                                        aria-labelledby="logins-part-trigger">
                                                        <div class="row">
                                                            <h3>Property Location</h3>
                                                            <div class="form-group col-md-4">
                                                                <label>State</label>
                                                                <select class="js-select2" name="state_id"
                                                                    id="state_id">
                                                                    <option value="" selected disabled>Select
                                                                        State
                                                                    </option>
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state->id }}">
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
                                                                    <option value="" selected disabled>Select
                                                                        City
                                                                    </option>
                                                                </select>
                                                                <small id="city_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Taluka</label>
                                                                <select class="js-select2" name="taluka_id"
                                                                    id="taluka_dropdown">
                                                                    <option value="" selected disabled>Select
                                                                        Taluka
                                                                    </option>
                                                                </select>
                                                                <small id="taluka_error"></small>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Locality</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Locality/Area" id="locality"
                                                                    name="locality">
                                                                <small id="area_error"></small>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Address</label>
                                                                <textarea class="form-control" style="height: 100px;" id="address" placeholder="Describe Here..." name="address"></textarea>
                                                                <small id="address_error"></small>
                                                            </div>
                                                            <h3>PG Details</h3>
                                                            <div class="form-group col-md-12">
                                                                <label>PG Name<sup>*</sup></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter PG Name" id="pg_name"
                                                                    name="pg_name">
                                                                <small id="pg_name_error"></small>
                                                            </div>


                                                            <div class="form-group col-md-12">
                                                                <label>Total Beds</label>
                                                                <select class="js-select2" name="total_beds"
                                                                    id="total_beds_dropdown">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    @foreach (range(1, 50) as $y)
                                                                        <option value={{ $y }}>
                                                                            {{ $y }}</option>
                                                                    @endforeach

                                                                    {{-- <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option> --}}
                                                                </select>

                                                            </div>

                                                            {{-- <h3>PG Information</h3> --}}
                                                            <div class="form-group col-md-4">
                                                                <label>PG is For<sup>*</sup></label>
                                                                <select class="js-select2" name="pg_for"
                                                                    id="pg_for_dropdown" multiple>
                                                                    <option value="Boys">Boys
                                                                    </option>
                                                                    <option value="Girls">Girls
                                                                    </option>
                                                                </select>
                                                                <small id="pg_for_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Best Suitable For<sup>*</sup></label>
                                                                <select class="js-select2" name="best_suited_for"
                                                                    id="best_suitable_for_dropdown">

                                                                    <option value="Students">Students
                                                                    </option>
                                                                    <option value="Professional">Professional
                                                                    </option>
                                                                </select>
                                                                <small id="suitable_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Meals Available<sup>*</sup></label>
                                                                {{-- <input type="checkbox" name="yes"
                                                                    id="meal_available_yes">
                                                                <input type="checkbox" name="no"
                                                                    id="meal_available_no"> --}}
                                                                <select class="js-select2" name="meals_available"
                                                                    id="meals_available">
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="meal_error"></small>
                                                            </div>

                                                            {{-- Yes selected --}}
                                                            <div class="form-group col-md-6">
                                                                <label>Meals Offrering<sup>*</sup></label>
                                                                <select class="js-select2" name="meals_offering"
                                                                    id="meals_offering" multiple>
                                                                    <option value="Breckfast">Breckfast
                                                                    </option>
                                                                    <option value="Lunch">Lunch
                                                                    </option>
                                                                    <option value="Dinner">Dinner
                                                                    </option>
                                                                </select>
                                                                <small id="mealoffrering_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Meals Speciallity(Optional)</label>
                                                                <select class="js-select2" name="meal_speciality"
                                                                    id="meals_speciality_dropdown" multiple>
                                                                    <option value="Punjabi">Punjabi
                                                                    </option>
                                                                    <option value="South Indian">South Indian
                                                                    </option>
                                                                    <option value="Andhra">Andhra
                                                                    </option>
                                                                    <option value="North Indian">North Indian
                                                                    </option>
                                                                    <option value="Others">Others
                                                                    </option>
                                                                </select>
                                                                {{-- <small id="meals_speciality_error"></small> --}}
                                                            </div>
                                                            {{-- End --}}

                                                            <div class="form-group col-md-4">
                                                                <label>Notice Period(Days)<sup>*</sup></label>
                                                                <input type="number" class="form-control"
                                                                    id="notice_period" name="notice_period">
                                                                <small id="noticeperiod_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Lock In Period(Days)<sup>*</sup></label>
                                                                <input type="number" class="form-control"
                                                                    id="lock_in_period" name="lock_in_period">
                                                                <small id="lookinperiod_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Common Areas<sup>*</sup></label>
                                                                <select class="js-select2" name="common_areas"
                                                                    id="common_areas" multiple>
                                                                    <option value=">Living Rooms">Living Rooms
                                                                    </option>
                                                                    <option value="Kitchen">Kitchen
                                                                    </option>
                                                                    <option value="Dining Hall">Dining Hall
                                                                    </option>
                                                                    <option value="Study Rooms/Library">Study Rooms/
                                                                        Library
                                                                    </option>
                                                                    <option value="Breack Out">Breack Out
                                                                    </option>
                                                                </select>
                                                                <small id="commonareas_error"></small>
                                                            </div>

                                                            <h3>Rules</h3>
                                                            <div class="form-group col-md-3">
                                                                <label>Non Veg Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="non_veg_allowed"
                                                                    id="non_veg_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="nonveg_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Opposite Sex Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="opposite_sex_allowed"
                                                                    id="opposite_sex_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="oppositesexallowed_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Any Time Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="any_time_allowed"
                                                                    id="any_time_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="anytime_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Visitors Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="visitors_allowed"
                                                                    id="visitors_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="visitorsallowed_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Gardian Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="guardian_allowed"
                                                                    id="guardian_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="Gardiansallowed_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Drinking Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="drinking_allowed"
                                                                    id="drinking_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="drinkingallowed_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Smoking Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="smoking_allowed"
                                                                    id="smoking_allowed">
                                                                    <option selected disabled>select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="smokingallowed_error"></small>
                                                            </div>

                                                            <h3>Other PG Details</h3>
                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="onetime_move_in_charges"
                                                                        id="onetime_move_in_charges">
                                                                    <label>Onetime Move in Charges (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="meal_charges_per_month"
                                                                        id="meal_charges_per_month">
                                                                    <label>Meal Charges per Month (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="electricity_charges_per_month"
                                                                        id="electricity_charges_per_month">
                                                                    <label>Electric Charges per Month (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="additional_information"
                                                                        id="additional_information">
                                                                    <label>Add Additional Information (Optional)</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <button type="button" id="firstBtn"
                                                            class="btn btn-primary btn-sm"
                                                            onclick="stepper.next()">Next
                                                            Step</button><br><br>
                                                        <button type="submit" class="btn btn-primary btn-sm"
                                                            id="btn-submit"
                                                            style="background-color: #dc3545; border: none;">Next
                                                            Step</button>

                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel"
                                                        aria-labelledby="information-part-trigger">

                                                        <h3>Room Details</h3>
                                                        <div class="form-group col-md-12">
                                                            <div class="card">
                                                                <div class="card-header room-card d-flex">
                                                                    <h5>Room Option 1</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <label class="card-title">Room
                                                                        Type<sup>*</sup></label>
                                                                    <div class="form-group col-md-12">
                                                                        <div class="o-features mt-2">
                                                                            <ul class="no-ul-list row">
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusSaleRadio"
                                                                                        class="form-check-input"
                                                                                        name="property_status"
                                                                                        type="radio" value="">
                                                                                    <label for="a-1"
                                                                                        class="form-check-label">Private
                                                                                        Room</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusRentRadio"
                                                                                        class="form-check-input"
                                                                                        name="property_status"
                                                                                        type="radio" value="">
                                                                                    <label for="a-2"
                                                                                        class="form-check-label">Double
                                                                                        Sharing</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="radio" value="">
                                                                                    <label for="a-3"
                                                                                        class="form-check-label">Tripal
                                                                                        Sharing</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="radio" value="">
                                                                                    <label for="a-4"
                                                                                        class="form-check-label">3+
                                                                                        Sharing</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <small id="property_status_error"></small>
                                                                    </div>

                                                                    <div class="form-group col-md-12">
                                                                        <div id="form-field"
                                                                            class="form-floating mb-4">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Credit card number"
                                                                                name="additional_information"
                                                                                id="additional_information">
                                                                            <label>Total Beds in this Room
                                                                                (Optional)</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>Rent<sup>*</sup></label>
                                                                            <input type="number" class="form-control"
                                                                                id="rent_room" name="rent_room"
                                                                                value="1,00,000">
                                                                            <small id="rent_room_error"></small>
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label>Security Deposite<sup>*</sup></label>
                                                                            <input type="number" class="form-control"
                                                                                id="rent_room" name="rent_room"
                                                                                value="10,000">
                                                                            <small id="rent_room_error"></small>
                                                                        </div>
                                                                    </div>

                                                                    <label class="card-title">Facilities
                                                                        Offerd<sup>*</sup></label>
                                                                    <div class="form-group col-md-12">
                                                                        <div class="o-features mt-2">
                                                                            <ul class="no-ul-list row">
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusSaleRadio"
                                                                                        class="form-check-input"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-1"
                                                                                        class="form-check-label">Personal
                                                                                        Cupboard</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusRentRadio"
                                                                                        class="form-check-input"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-2"
                                                                                        class="form-check-label">Table
                                                                                        Chaire</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-3"
                                                                                        class="form-check-label">TV in
                                                                                        Rooms</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-4"
                                                                                        class="form-check-label">Attached
                                                                                        Balcony</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-5"
                                                                                        class="form-check-label">Attached
                                                                                        Bathroom</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-6"
                                                                                        class="form-check-label">Meals
                                                                                        Included</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusPgRadio"
                                                                                        class="form-check-input checked"
                                                                                        name="property_status"
                                                                                        type="checkbox"
                                                                                        value="">
                                                                                    <label for="a-7"
                                                                                        class="form-check-label">AC</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <small id="property_status_error"></small>
                                                                    </div>

                                                                    <label class="card-title">Bathroom
                                                                        Style<sup>*</sup></label>
                                                                    <div class="form-group col-md-12">
                                                                        <div class="o-features mt-2">
                                                                            <ul class="no-ul-list row">
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusSaleRadio"
                                                                                        class="form-check-input"
                                                                                        name="property_status"
                                                                                        type="radio" value="">
                                                                                    <label for="a-1"
                                                                                        class="form-check-label">Western</label>
                                                                                </li>
                                                                                <li
                                                                                    class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                    <input id="propertyStatusRentRadio"
                                                                                        class="form-check-input"
                                                                                        name="property_status"
                                                                                        type="radio" value="">
                                                                                    <label for="a-2"
                                                                                        class="form-check-label">Indian</label>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <small id="property_status_error"></small>
                                                                    </div>

                                                                </div>
                                                                <small id="smoking_allowed_error"></small>

                                                                <button class="btn btn-primary" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseExample"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseExample">
                                                                    +Add New Room Type
                                                                </button>
                                                            </div>

                                                        </div>

                                                        <div class="collapse" id="collapseExample">
                                                            <div class="card card-body">
                                                                <div class="form-group col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-header room-card d-flex">
                                                                            <h5>Room Option 2</h5>
                                                                            <a style="float: right;"
                                                                                data-bs-toggle="collapse"
                                                                                data-bs-target="#collapseExample"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseExample">
                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <label class="card-title">Room
                                                                                Type<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Private
                                                                                                Room</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Double
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-3"
                                                                                                class="form-check-label">Tripal
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-4"
                                                                                                class="form-check-label">3+
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <div id="form-field"
                                                                                    class="form-floating mb-4">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Credit card number"
                                                                                        name="additional_information"
                                                                                        id="additional_information">
                                                                                    <label>Total Beds in this Room
                                                                                        (Optional)</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label>Rent<sup>*</sup></label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="rent_room"
                                                                                        name="rent_room"
                                                                                        value="1,00,000">
                                                                                    <small
                                                                                        id="rent_room_error"></small>
                                                                                </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label>Security
                                                                                        Deposite<sup>*</sup></label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="rent_room"
                                                                                        name="rent_room"
                                                                                        value="10,000">
                                                                                    <small
                                                                                        id="rent_room_error"></small>
                                                                                </div>
                                                                            </div>

                                                                            <label class="card-title">Facilities
                                                                                Offerd<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Personal
                                                                                                Cupboard</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Table
                                                                                                Chaire</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-3"
                                                                                                class="form-check-label">TV
                                                                                                in
                                                                                                Rooms</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-4"
                                                                                                class="form-check-label">Attached
                                                                                                Balcony</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-5"
                                                                                                class="form-check-label">Attached
                                                                                                Bathroom</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-6"
                                                                                                class="form-check-label">Meals
                                                                                                Included</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-7"
                                                                                                class="form-check-label">AC</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                            <label class="card-title">Bathroom
                                                                                Style<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Western</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Indian</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                        </div>
                                                                        <small id="smoking_allowed_error"></small>

                                                                        <button class="btn btn-primary" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseExample1"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseExample1">
                                                                            +Add New Room Type
                                                                        </button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="collapse" id="collapseExample1">
                                                            <div class="card card-body">
                                                                <div class="form-group col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-header room-card d-flex">
                                                                            <h5>Room Option 3</h5>
                                                                            <a style="float: right;"
                                                                                data-bs-toggle="collapse"
                                                                                data-bs-target="#collapseExample1"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseExample1">
                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <label class="card-title">Room
                                                                                Type<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Private
                                                                                                Room</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Double
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-3"
                                                                                                class="form-check-label">Tripal
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-4"
                                                                                                class="form-check-label">3+
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <div id="form-field"
                                                                                    class="form-floating mb-4">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Credit card number"
                                                                                        name="additional_information"
                                                                                        id="additional_information">
                                                                                    <label>Total Beds in this Room
                                                                                        (Optional)</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label>Rent<sup>*</sup></label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="rent_room"
                                                                                        name="rent_room"
                                                                                        value="1,00,000">
                                                                                    <small
                                                                                        id="rent_room_error"></small>
                                                                                </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label>Security
                                                                                        Deposite<sup>*</sup></label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="rent_room"
                                                                                        name="rent_room"
                                                                                        value="10,000">
                                                                                    <small
                                                                                        id="rent_room_error"></small>
                                                                                </div>
                                                                            </div>

                                                                            <label class="card-title">Facilities
                                                                                Offerd<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Personal
                                                                                                Cupboard</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Table
                                                                                                Chaire</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-3"
                                                                                                class="form-check-label">TV
                                                                                                in
                                                                                                Rooms</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-4"
                                                                                                class="form-check-label">Attached
                                                                                                Balcony</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-5"
                                                                                                class="form-check-label">Attached
                                                                                                Bathroom</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-6"
                                                                                                class="form-check-label">Meals
                                                                                                Included</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-7"
                                                                                                class="form-check-label">AC</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                            <label class="card-title">Bathroom
                                                                                Style<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Western</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Indian</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                        </div>
                                                                        <small id="smoking_allowed_error"></small>

                                                                        <button class="btn btn-primary" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseExample2"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseExample2">
                                                                            +Add New Room Type
                                                                        </button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="collapse" id="collapseExample2">
                                                            <div class="card card-body">
                                                                <div class="form-group col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-header room-card d-flex">
                                                                            <h5>Room Option 4</h5>
                                                                            <a style="float: right;"
                                                                                data-bs-toggle="collapse"
                                                                                data-bs-target="#collapseExample2"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseExample2">
                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <label class="card-title">Room
                                                                                Type<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Private
                                                                                                Room</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Double
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-3"
                                                                                                class="form-check-label">Tripal
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-4"
                                                                                                class="form-check-label">3+
                                                                                                Sharing</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <div id="form-field"
                                                                                    class="form-floating mb-4">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Credit card number"
                                                                                        name="additional_information"
                                                                                        id="additional_information">
                                                                                    <label>Total Beds in this Room
                                                                                        (Optional)</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label>Rent<sup>*</sup></label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="rent_room"
                                                                                        name="rent_room"
                                                                                        value="1,00,000">
                                                                                    <small
                                                                                        id="rent_room_error"></small>
                                                                                </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label>Security
                                                                                        Deposite<sup>*</sup></label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="rent_room"
                                                                                        name="rent_room"
                                                                                        value="10,000">
                                                                                    <small
                                                                                        id="rent_room_error"></small>
                                                                                </div>
                                                                            </div>

                                                                            <label class="card-title">Facilities
                                                                                Offerd<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Personal
                                                                                                Cupboard</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Table
                                                                                                Chaire</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-3"
                                                                                                class="form-check-label">TV
                                                                                                in
                                                                                                Rooms</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-4"
                                                                                                class="form-check-label">Attached
                                                                                                Balcony</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-5"
                                                                                                class="form-check-label">Attached
                                                                                                Bathroom</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-6"
                                                                                                class="form-check-label">Meals
                                                                                                Included</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusPgRadio"
                                                                                                class="form-check-input checked"
                                                                                                name="property_status"
                                                                                                type="checkbox"
                                                                                                value="">
                                                                                            <label for="a-7"
                                                                                                class="form-check-label">AC</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                            <label class="card-title">Bathroom
                                                                                Style<sup>*</sup></label>
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusSaleRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-1"
                                                                                                class="form-check-label">Western</label>
                                                                                        </li>
                                                                                        <li
                                                                                            class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input
                                                                                                id="propertyStatusRentRadio"
                                                                                                class="form-check-input"
                                                                                                name="property_status"
                                                                                                type="radio"
                                                                                                value="">
                                                                                            <label for="a-2"
                                                                                                class="form-check-label">Indian</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small
                                                                                    id="property_status_error"></small>
                                                                            </div>

                                                                        </div>
                                                                        <small id="smoking_allowed_error"></small>

                                                                        {{-- <button class="btn btn-primary" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseExample1"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseExample1">
                                                                            +Add New Room Type
                                                                        </button> --}}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" id="prev_step1"
                                                            class="btn btn-primary btn-sm"
                                                            onclick="stepper.previous()">Previous Step</button>
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            {{-- id="btn-submit" --}} id="secondbtn"
                                                            onclick="stepper.next()"
                                                            style="background-color: #dc3545; border: none;">Next
                                                            Step</button>
                                                    </div>

                                                    <div id="aminities-part" class="content" role="tabpanel"
                                                        aria-labelledby="aminities-part-trigger">
                                                        <h1>Hola</h1>
                                                        <button type="button" id="prev_step1"
                                                            class="btn btn-primary btn-sm"
                                                            onclick="stepper.previous()">Previous Step</button>
                                                        <button type="submit" class="btn btn-primary btn-sm"
                                                            id="btn-submit"
                                                            style="background-color: #dc3545; border: none;">Next
                                                            Step</button>
                                                    </div>
                                            </form>

                                            <div id="photos-part" class="content" role="tabpanel"
                                                aria-labelledby="photos-part-trigger">
                                                <label for="">Banner/Cover Image<sup>*</sup></label>
                                                <form action="{{ route('uploadPropertyBannerImage') }}" method="post"
                                                    id="bannerImageUpload"
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
                                                <a href="{{ route('myProperties') }}"
                                                    class="btn btn-primary btn-sm"
                                                    style="background-color: #dc3545; border: none;">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-xl-2 col-lg-12 col-md-12"></div>
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
    <script src="{{ url('/') }}/front/assets/js/post_pg_property.js"></script>
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
            $('#city').hide();
            $('#state_id').on('change', function() {
                var state = this.value;
                $("#city_dropdown").html('');
                $.ajax({
                    url: "{{ route('get-city-list') }}",
                    type: "GET",
                    data: {
                        state: state,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city').show();
                        $('#city_dropdown').html(
                            '<option value="" selected disabled>-- Select City --</option>'
                        );
                        $.each(result.city, function(key, value) {
                            $("#city_dropdown").append('<option value="' +
                                value
                                .id + '">' + value.city +
                                '</option>');
                        });
                        // $('#sd').show();
                    }
                });
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

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
        window.onload = function() {
            var latlng = new google.maps.LatLng(51.4975941, -0.0803232);
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: 'Set lat/lon values for this property',
                draggable: true
            });
            google.maps.event.addListener(marker, 'dragend', function(a) {
                console.log(a);
                var div = document.createElement('div');
                div.innerHTML = a.latLng.lat().toFixed(4) + ', ' + a.latLng.lng().toFixed(4);
                document.getElementsByTagName('body')[0].appendChild(div);
            });
        };
    </script> --}}

</body>

</html>
