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
                                                        {{-- <div class="line"></div>
                                                        <div class="step" data-target="#aminities-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="aminities-part"
                                                                id="aminities-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
                                                                <span class="bs-stepper-label">Amenities
                                                                    (Optional)</span>
                                                            </button>
                                                        </div> --}}
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#photos-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="photos-part" id="photos-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
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
                                                                </select>

                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>PG is For<sup>*</sup></label>
                                                                <select class="js-select2" name="pg_for[]"
                                                                    id="pg_for_dropdown"
                                                                    data-placeholder="Select Options" multiple>
                                                                    <option value="Boys">Boys
                                                                    </option>
                                                                    <option value="Girls">Girls
                                                                    </option>
                                                                </select>
                                                                <small id="pg_for_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Best Suitable For<sup>*</sup></label>
                                                                <select class="js-select2" name="best_suited_for[]"
                                                                    id="best_suitable_for_dropdown"
                                                                    data-placeholder="Select Options" multiple>
                                                                    <option value="">Select</option>
                                                                    <option value="Students">Students
                                                                    </option>
                                                                    <option value="Professional">Professional
                                                                    </option>
                                                                </select>
                                                                <small id="suitable_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Meals Available<sup>*</sup></label>
                                                                <select class="js-select2" name="meals_available"
                                                                    id="meals_available"
                                                                    onchange="mealOffering(this.value)">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="meal_error"></small>
                                                            </div>

                                                            {{-- Yes selected --}}
                                                            <div class="form-group col-md-6 meals_options"
                                                                style="display: none;">
                                                                <label>Meals Offering</label>
                                                                <select class="js-select2" name="meals_offering[]"
                                                                    id="meals_offering"
                                                                    data-placeholder="Select Options" multiple>
                                                                    <option value="Breckfast">Breckfast
                                                                    </option>
                                                                    <option value="Lunch">Lunch
                                                                    </option>
                                                                    <option value="Dinner">Dinner
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6 meals_options"
                                                                style="display: none;">
                                                                <label>Meals Speciallity(Optional)</label>
                                                                <select class="js-select2" name="meals_speciality[]"
                                                                    id="meals_speciality_dropdown"
                                                                    data-placeholder="Select Options" multiple>
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
                                                            </div>
                                                            {{-- End --}}

                                                            <div class="form-group col-md-4">
                                                                <label>Notice Period (Days)<sup>*</sup></label>
                                                                <input type="number" class="form-control"
                                                                    id="notice_period"
                                                                    placeholder="Enter Notice Period (in Days)"
                                                                    name="notice_period">
                                                                <small id="noticeperiod_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Lock In Period (Days)<sup>*</sup></label>
                                                                <input type="number" class="form-control"
                                                                    id="lock_in_period" name="lock_in_period"
                                                                    placeholder="Enter Lock In Period (in Days)">
                                                                <small id="lookinperiod_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Common Areas<sup>*</sup></label>
                                                                <select class="js-select2" name="common_areas[]"
                                                                    id="common_areas"
                                                                    data-placeholder="Select Options" multiple>
                                                                    <option value="">Select</option>
                                                                    <option value="Living Rooms">Living Rooms
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
                                                            <div class="form-group col-md-6">
                                                                <label>Non Veg Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="non_veg_allowed"
                                                                    id="non_veg_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="nonveg_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Opposite Sex Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="opposite_sex_allowed"
                                                                    id="opposite_sex_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="oppositesexallowed_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Any Time Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="any_time_allowed"
                                                                    id="any_time_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">Yes
                                                                    </option>
                                                                    <option value="No">No
                                                                    </option>
                                                                </select>
                                                                <small id="anytime_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Visitors Allowed
                                                                    <sup>*</sup></label>
                                                                <select class="js-select2" name="visitors_allowed"
                                                                    id="visitors_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
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
                                                                    id="guardian_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
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
                                                                    id="drinking_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
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
                                                                    id="smoking_allowed"
                                                                    data-placeholder="Select One">
                                                                    <option value="">Select</option>
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
                                                                    <input type="number" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="onetime_move_in_charges"
                                                                        id="onetime_move_in_charges">
                                                                    <label>Onetime Move in Charges (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="number" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="meal_charges_per_month"
                                                                        id="meal_charges_per_month">
                                                                    <label>Meal Charges per Month (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="number" class="form-control"
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

                                                        <button type="submit" class="btn btn-primary btn-sm"
                                                            id="btn-submit"
                                                            style="background-color: #dc3545; border: none;">Next
                                                            Step</button>
                                            </form>
                                        </div>
                                        <form class="" id="pgRoomDetailsForm" method="POST"
                                            action="{{ route('PGroomDetailsInsertAjax') }}">
                                            <input type="hidden" name="_token" id="token"
                                                value="{{ csrf_token() }}">
                                            <div id="information-part" class="content" role="tabpanel"
                                                aria-labelledby="information-part-trigger">
                                                <small>* Field is Required</small><br>
                                                <small id="common_error"></small>
                                                <h3>Private Room</h3>
                                                <input type="hidden" name="room_type" value="Private Room">

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Rent (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control" id="pr_rent"
                                                            name="pr_rent" placeholder="Enter PG Rent">
                                                        <small id="pr_rent_error"></small>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Security Deposit (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control"
                                                            id="pr_security_deposit" name="pr_security_deposit"
                                                            placeholder="Enter Security Deposit" required>
                                                        <small id="pr_security_deposit_error"></small>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Total Beds (Optional)</label>
                                                    <div id="form-field" class="form-floating mb-4">
                                                        <input type="text" class="form-control"
                                                            placeholder="Credit card number" name="pr_total_beds"
                                                            id="pr_total_beds">
                                                        <label>Total Beds in this Room
                                                            (Optional)</label>
                                                    </div>
                                                </div>

                                                <label class="card-title">Facilities
                                                    Offered<sup>*</sup></label>
                                                <div class="form-group col-md-12">
                                                    <div class="o-features mt-2">
                                                        <ul class="no-ul-list row">
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input" name="pr_facilities[]"
                                                                    type="checkbox" value="Personal Cupboard">
                                                                <label for="a-1"
                                                                    class="form-check-label">Personal Cupboard</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input" name="pr_facilities[]"
                                                                    type="checkbox" value="Table Chaire">
                                                                <label for="a-2" class="form-check-label">Table
                                                                    Chaire</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="pr_facilities[]" type="checkbox"
                                                                    value="TV in Rooms">
                                                                <label for="a-3" class="form-check-label">TV in
                                                                    Rooms</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="pr_facilities[]" type="checkbox"
                                                                    value="Attached Balcony">
                                                                <label for="a-4"
                                                                    class="form-check-label">Attached Balcony</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="pr_facilities[]" type="checkbox"
                                                                    value="Attached Bathroom">
                                                                <label for="a-5"
                                                                    class="form-check-label">Attached Bathroom</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="pr_facilities[]" type="checkbox"
                                                                    value="Meals Included">
                                                                <label for="a-6" class="form-check-label">Meals
                                                                    Included</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="prFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="pr_facilities[]" type="checkbox"
                                                                    value="AC">
                                                                <label for="a-7"
                                                                    class="form-check-label">AC</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <small id="pr_facilities_error"></small>
                                                </div>
                                                <hr>
                                                <h3>Double Sharing</h3>
                                                <input type="hidden" name="room_type" value="Double Sharing">

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Rent (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control" id="ds_rent"
                                                            name="ds_rent" placeholder="Enter PG Rent">
                                                        <small id="rent_error"></small>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Security Deposit (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control"
                                                            id="ds_security_deposit" name="ds_security_deposit"
                                                            placeholder="Enter Security Deposit">
                                                        <small id="security_deposit_error"></small>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Total Beds (Optional)</label>
                                                    <div id="form-field" class="form-floating mb-4">
                                                        <input type="text" class="form-control"
                                                            placeholder="Credit card number" name="ds_total_beds"
                                                            id="ds_total_beds">
                                                        <label>Total Beds in this Room
                                                            (Optional)</label>
                                                    </div>
                                                </div>

                                                <label class="card-title">Facilities
                                                    Offered<sup>*</sup></label>
                                                <div class="form-group col-md-12">
                                                    <div class="o-features mt-2">
                                                        <ul class="no-ul-list row">
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input" name="ds_facilities[]"
                                                                    type="checkbox" value="Personal Cupboard">
                                                                <label for="a-1"
                                                                    class="form-check-label">Personal
                                                                    Cupboard</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input" name="ds_facilities[]"
                                                                    type="checkbox" value="Table Chair">
                                                                <label for="a-2" class="form-check-label">Table
                                                                    Chair</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ds_facilities[]" type="checkbox"
                                                                    value="TV in Rooms">
                                                                <label for="a-3" class="form-check-label">TV in
                                                                    Rooms</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ds_facilities[]" type="checkbox"
                                                                    value="Attached Balcony">
                                                                <label for="a-4"
                                                                    class="form-check-label">Attached
                                                                    Balcony</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ds_facilities[]" type="checkbox"
                                                                    value="Attached Bathroom">
                                                                <label for="a-5"
                                                                    class="form-check-label">Attached
                                                                    Bathroom</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ds_facilities[]" type="checkbox"
                                                                    value="Meals Included">
                                                                <label for="a-6" class="form-check-label">Meals
                                                                    Included</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="dsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ds_facilities[]" type="checkbox"
                                                                    value="AC">
                                                                <label for="a-7"
                                                                    class="form-check-label">AC</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <small id="facilities_error"></small>
                                                </div>
                                                <hr>
                                                <h3>Triple Sharing</h3>
                                                <input type="hidden" name="room_type" value="Triple Sharing">

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Rent (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control" id="ts_rent"
                                                            name="ts_rent" placeholder="Enter PG Rent">
                                                        <small id="rent_error"></small>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Security Deposit (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control"
                                                            id="ts_security_deposit" name="ts_security_deposit"
                                                            placeholder="Enter Security Deposit">
                                                        <small id="security_deposit_error"></small>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Total Beds (Optional)</label>
                                                    <div id="form-field" class="form-floating mb-4">
                                                        <input type="text" class="form-control"
                                                            placeholder="Credit card number" name="ts_total_beds"
                                                            id="ts_total_beds">
                                                        <label>Total Beds in this Room
                                                            (Optional)</label>
                                                    </div>
                                                </div>

                                                <label class="card-title">Facilities
                                                    Offered<sup>*</sup></label>
                                                <div class="form-group col-md-12">
                                                    <div class="o-features mt-2">
                                                        <ul class="no-ul-list row">
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input" name="ts_facilities[]"
                                                                    type="checkbox" value="Personal Cupboard">
                                                                <label for="a-1"
                                                                    class="form-check-label">Personal
                                                                    Cupboard</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input" name="ts_facilities[]"
                                                                    type="checkbox" value="Table Chair">
                                                                <label for="a-2" class="form-check-label">Table
                                                                    Chair</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ts_facilities[]" type="checkbox"
                                                                    value="TV in Rooms">
                                                                <label for="a-3" class="form-check-label">TV in
                                                                    Rooms</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ts_facilities[]" type="checkbox"
                                                                    value="Attached Balcony">
                                                                <label for="a-4"
                                                                    class="form-check-label">Attached
                                                                    Balcony</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ts_facilities[]" type="checkbox"
                                                                    value="Attached Bathroom">
                                                                <label for="a-5"
                                                                    class="form-check-label">Attached
                                                                    Bathroom</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ts_facilities[]" type="checkbox"
                                                                    value="Meals Included">
                                                                <label for="a-6" class="form-check-label">Meals
                                                                    Included</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="tsFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ts_facilities[]" type="checkbox"
                                                                    value="AC">
                                                                <label for="a-7"
                                                                    class="form-check-label">AC</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <small id="facilities_error"></small>
                                                </div>
                                                <hr>
                                                <h3>3+ Sharing</h3>
                                                <input type="hidden" name="room_type" value="3+ Sharing">

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Rent (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control" id="ms_rent"
                                                            name="ms_rent" placeholder="Enter PG Rent">
                                                        <small id="rent_error"></small>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Security Deposit (INR)<sup>*</sup></label>
                                                        <input type="number" class="form-control"
                                                            id="ms_security_deposit" name="ms_security_deposit"
                                                            placeholder="Enter Security Deposit">
                                                        <small id="security_deposit_error"></small>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Total Beds (Optional)</label>
                                                    <div id="form-field" class="form-floating mb-4">
                                                        <input type="text" class="form-control"
                                                            placeholder="Credit card number" name="ms_total_beds"
                                                            id="ms_total_beds">
                                                        <label>Total Beds in this Room
                                                            (Optional)</label>
                                                    </div>
                                                </div>

                                                <label class="card-title">Facilities
                                                    Offered<sup>*</sup></label>
                                                <div class="form-group col-md-12">
                                                    <div class="o-features mt-2">
                                                        <ul class="no-ul-list row">
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input" name="ms_facilities[]"
                                                                    type="checkbox" value="Personal Cupboard">
                                                                <label for="a-1"
                                                                    class="form-check-label">Personal
                                                                    Cupboard</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input" name="ms_facilities[]"
                                                                    type="checkbox" value="Table Chair">
                                                                <label for="a-2" class="form-check-label">Table
                                                                    Chair</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ms_facilities[]" type="checkbox"
                                                                    value="TV in Rooms">
                                                                <label for="a-3" class="form-check-label">TV in
                                                                    Rooms</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ms_facilities[]" type="checkbox"
                                                                    value="Attached Balcony">
                                                                <label for="a-4"
                                                                    class="form-check-label">Attached
                                                                    Balcony</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ms_facilities[]" type="checkbox"
                                                                    value="Attached Bathroom">
                                                                <label for="a-5"
                                                                    class="form-check-label">Attached
                                                                    Bathroom</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ms_facilities[]" type="checkbox"
                                                                    value="Meals Included">
                                                                <label for="a-6" class="form-check-label">Meals
                                                                    Included</label>
                                                            </li>
                                                            <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                <input id="msFacilityCheckBox"
                                                                    class="form-check-input checked"
                                                                    name="ms_facilities[]" type="checkbox"
                                                                    value="AC">
                                                                <label for="a-7"
                                                                    class="form-check-label">AC</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <small id="facilities_error"></small>
                                                </div>


                                        </form>

                                        <button type="button" id="prev_step1" class="btn btn-primary btn-sm"
                                            onclick="stepper.previous()">Previous Step</button>
                                        <button type="button" id="submitRoomDetails" onclick="validateRoomDetails()"
                                            class="btn btn-primary btn-sm"
                                            style="background-color: #dc3545; border: none;">Next
                                            Step</button>
                                    </div>

                                    {{-- <div id="aminities-part" class="content" role="tabpanel"
                                        aria-labelledby="aminities-part-trigger">
                                        <div id="aminities-part" class="content" role="tabpanel"
                                            aria-labelledby="aminities-part-trigger">

                                            <div class="form-group col-md-12">
                                                <hr>
                                                <div class="col-md-12">
                                                    <label class="card-title">Security
                                                        Aminities<sup>*</sup></label>
                                                    <div class="form-group col-md-12">
                                                        <div class="o-features mt-2">
                                                            <ul class="no-ul-list row">
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <!-- <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="cctv" type="checkbox"
                                                                                value="CCTV">
                                                                            <label for="a-1"
                                                                                class="form-check-label"><i
                                                                                    class="fa-solid fa-camera-cctv"></i>
                                                                                CCTV</label> -->

                                                                    <input type="radio" class="btn-check"
                                                                        name="vbtn-radio" id="vbtn-radio1"
                                                                        autocomplete="off">
                                                                    <label class="btn" for="vbtn-radio1"><a
                                                                            style="color: #fff;"
                                                                            href="{{ route('front_buy') }}">Buy</a></label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input"
                                                                        name="gatted_community" type="checkbox"
                                                                        value="Gatted
                                                                                Community">
                                                                    <label for="a-2"
                                                                        class="form-check-label">Gatted
                                                                        Community</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="security"
                                                                        type="checkbox" value="Security">
                                                                    <label for="a-3"
                                                                        class="form-check-label">Security</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="biometric"
                                                                        type="checkbox" value="Biometric">
                                                                    <label for="a-4"
                                                                        class="form-check-label">Biometric</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <small id="security_aminities_error"></small>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <label class="card-title">Furnishings in Property</label>
                                                    <div class="form-group col-md-12">
                                                        <div class="o-features mt-2">
                                                            <ul class="no-ul-list row">
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusSaleRadio"
                                                                        class="form-check-input" name="fridge"
                                                                        type="checkbox" value="Fridge">
                                                                    <label for="a-1" class="form-check-label"><i
                                                                            class="fa-solid fa-camera-cctv"></i>
                                                                        Fridge</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input"
                                                                        name="washing_machine" type="checkbox"
                                                                        value="Washing
                                                                                Machine">
                                                                    <label for="a-2"
                                                                        class="form-check-label">Washing
                                                                        Machine</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="microwave"
                                                                        type="checkbox" value="Microwave">
                                                                    <label for="a-3"
                                                                        class="form-check-label">Microwave</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="water_purifier"
                                                                        type="checkbox"
                                                                        value="Waterr
                                                                                Purifier">
                                                                    <label for="a-4"
                                                                        class="form-check-label">Waterr
                                                                        Purifier</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="tt_table"
                                                                        type="checkbox"
                                                                        value="TT
                                                                                Table">
                                                                    <label for="a-5" class="form-check-label">TT
                                                                        Table</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="tv"
                                                                        type="checkbox" value="TV">
                                                                    <label for="a-6"
                                                                        class="form-check-label">TV</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="Coffee_machine"
                                                                        type="checkbox"
                                                                        value="Coffee
                                                                                Machine">
                                                                    <label for="a-7"
                                                                        class="form-check-label">Coffee
                                                                        Machine</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <small id="furnishings_in_property_error"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="card-title">Services</label>
                                                    <div class="form-group col-md-12">
                                                        <div class="o-features mt-2">
                                                            <ul class="no-ul-list row">
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusSaleRadio"
                                                                        class="form-check-input" name="laundry"
                                                                        type="checkbox" value="Laundry">
                                                                    <label for="a-1" class="form-check-label"><i
                                                                            class="fa-solid fa-camera-cctv"></i>
                                                                        Laundry</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="house_keeping"
                                                                        type="checkbox"
                                                                        value="House
                                                                                Keeping">
                                                                    <label for="a-2"
                                                                        class="form-check-label">House
                                                                        Keeping</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input"
                                                                        name="internet_connection" type="checkbox"
                                                                        value="Internet /
                                                                                Wi-Fi Connectivity">
                                                                    <label for="a-3"
                                                                        class="form-check-label">Internet /
                                                                        Wi-Fi Connectivity</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <small id="property_status_error"></small>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <label class="card-title">Top Amenities</label>
                                                    <div class="form-group col-md-12">
                                                        <div class="o-features mt-2">
                                                            <ul class="no-ul-list row">
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusSaleRadio"
                                                                        class="form-check-input" name="gym"
                                                                        type="checkbox" value="Gym">
                                                                    <label for="a-1" class="form-check-label"><i
                                                                            class="fa-solid fa-camera-cctv"></i>
                                                                        Gym</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="lift"
                                                                        type="checkbox" value="Lift">
                                                                    <label for="a-2"
                                                                        class="form-check-label">Lift</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input"
                                                                        name="daily_water_supply" type="checkbox"
                                                                        value="Daily Water
                                                                                Supply">
                                                                    <label for="a-3"
                                                                        class="form-check-label">Daily Water
                                                                        Supply</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input"
                                                                        name="reserved_parking" type="checkbox"
                                                                        value="Reserved
                                                                                Parking">
                                                                    <label for="a-4"
                                                                        class="form-check-label">Reserved
                                                                        Parking</label>
                                                                </li>
                                                                <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                    <input id="propertyStatusRentRadio"
                                                                        class="form-check-input" name="power_backup"
                                                                        type="checkbox" value="Power Backup">
                                                                    <label for="a-5"
                                                                        class="form-check-label">Power
                                                                        Backup</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <small id="top_eminities_error"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="prev_step1" class="btn btn-primary btn-sm"
                                            onclick="stepper.previous()">Previous Step</button>
                                        <button type="submit" class="btn btn-primary btn-sm" id="btn-submit"
                                            style="background-color: #dc3545; border: none;">Next
                                            Step</button>
                                    </div> --}}


                                    <div id="photos-part" class="content" role="tabpanel"
                                        aria-labelledby="photos-part-trigger">
                                        <label for="">Upload Photos<sup>*</sup></label>
                                        <form action="{{ route('uploadPGPropertyImage') }}" method="POST"
                                            id="pgImageUpload" class="dropzone dz-clickable primary-dropzone"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="dz-default dz-message">
                                                <i class="fa-solid fa-images"></i>
                                                <span>Drag & Drop Files to Upload</span>
                                            </div>
                                        </form><br>
                                        <a href="{{ url('my_pg_properties') }}" class="btn btn-primary btn-sm"
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
                closeOnSelect: true,
            });
            $(".js-select3").select2({
                closeOnSelect: true,
            });
            $(".js-select2-disablesearch").select2({
                minimumResultsForSearch: Infinity,
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
        Dropzone.options.pgImageUpload = {
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
        function mealOffering(val) {
            val == 'Yes' ? $('.meals_options').show() : $('.meals_options').hide();
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
