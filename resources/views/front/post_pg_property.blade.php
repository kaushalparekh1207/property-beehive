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
    {{-- <style>
        body {
            padding: 20px;
            background: #f3f1ee;
        }

        .wrapper {
            margin: 30px auto;
            background: #fff;
            border: 1px solid #dad0ca;
            border-radius: 3px;
        }

        @media (min-width: 48em) {
            .wrapper {
                max-width: 1500px;
            }
        }

        .stepper {
            padding: 10px;
            font-size: 13px;
        }

        @media (min-width: 48em) {
            .stepper {
                padding: 20px;
            }
        }

        .stepper__list {
            width: 100%;
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        @media (min-width: 48em) {
            .stepper__list {
                display: flex;
                justify-content: space-between;
            }
        }

        .stepper__list__item {
            padding: 3px 5px;
            text-align: center;
            position: relative;
            display: flex;
            align-items: center;
        }

        @media (min-width: 48em) {
            .stepper__list__item {
                padding: 10px;
                flex-direction: column;
                flex: 1;
            }
        }

        .stepper__list__item:after {
            content: "";
            display: block;
            position: absolute;
            z-index: 2;
        }

        @media (min-width: 48em) {
            .stepper__list__item:after {
                width: calc(100% - 100px);
                top: 28%;
                left: calc(50% + 50px);
                border-top: 2px dotted #e2dfda;
            }
        }

        .stepper__list__item--done {
            color: #178a00;
            transition: all 0.1s;
        }

        @media (min-width: 48em) {
            .stepper__list__item--done:after {
                border-top-style: solid;
                border-top-width: 1px;
            }
        }

        .stepper__list__item--done:hover,
        .stepper__list__item--done:focus {
            text-decoration: underline;
            cursor: pointer;
        }

        .stepper__list__item--current {
            color: #006dff;
        }

        .stepper__list__item--current:last-of-type:after,
        .stepper__list__item--current:only-of-type:after {
            height: 30%;
        }

        .stepper__list__item:last-of-type:after {
            display: none;
        }

        .stepper__list__item--pending {
            color: #807370;
        }

        .stepper__list__item--pending:after {
            height: 30%;
        }

        .stepper__list__title {
            margin: 1px 0 0;
        }

        @media (min-width: 48em) {
            .stepper__list__title {
                margin: 0;
            }
        }

        .stepper__list__icon {
            margin: 0 10px 0 0;
            height: 2em;
            width: 2em;
        }

        @media (min-width: 48em) {
            .stepper__list__icon {
                margin: 0 0 15px;
            }
        }

        .stepper__list__icon path {
            fill: currentColor;
        }

        .stepper__list__icon ellipse,
        .stepper__list__icon circle {
            stroke: currentColor;
        }
    </style> --}}
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
                                            <form class="" id="propertyForm" method="POST"
                                                action="{{ route('propertyDataInsertAjax') }}">
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
                                                        {{-- <div class="line"></div>
                                                        <div class="step" data-target="#information-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="information-part"
                                                                id="information-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                                <span class="bs-stepper-label">Property
                                                                    Details</span>
                                                            </button>
                                                        </div> --}}
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
                                                        <div class="step" data-target="#information-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="information-part"
                                                                id="information-part-trigger">
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
                                                        <h3>PG Details</h3>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>I want to <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="property_status" type="radio"
                                                                                value="Sale" disabled>
                                                                            <label for="a-1"
                                                                                class="form-check-label">Sale</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="property_status" type="radio"
                                                                                value="Rent/Lease" disabled>
                                                                            <label for="a-2"
                                                                                class="form-check-label">Rent/Lease</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input checked"
                                                                                name="property_status" type="radio"
                                                                                value="PG/Hostel" checked>
                                                                            <label for="a-3"
                                                                                class="form-check-label">PG/Hostel</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>PG Name (Optional)<sup>*</sup></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter PG Name" id="pg_name"
                                                                    name="pg_name">
                                                                <small id="pg_name_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Total Beds<sup>*</sup></label>
                                                                <select class="js-select2" name="total_beds"
                                                                    id="total_beds_dropdown">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                </select>
                                                                <small id="total_beds_error"></small>
                                                            </div>

                                                            {{-- <h3>PG Information</h3> --}}
                                                            <div class="form-group col-md-4">
                                                                <label>PG is For<sup>*</sup></label>
                                                                <select class="js-select2" name="pg_for"
                                                                    id="pg_for_dropdown" multiple>
                                                                    <option value="">Boys
                                                                    </option>
                                                                    <option value="">Girls
                                                                    </option>
                                                                </select>
                                                                <small id="pg_for_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Best Suitable For<sup>*</sup></label>
                                                                <select class="js-select2" name="best_suited_for"
                                                                    id="best_suitable_for_dropdown">
                                                                    <option value="">Students
                                                                    </option>
                                                                    <option value="">Professional
                                                                    </option>
                                                                </select>
                                                                <small id="best_suitable_for_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Meals Available<sup>*</sup></label>
                                                                {{-- <input type="checkbox" name="yes"
                                                                    id="meal_available_yes">
                                                                <input type="checkbox" name="no"
                                                                    id="meal_available_no"> --}}
                                                                <select class="js-select2" name="meals_available"
                                                                    id="meals_available_dropdown">
                                                                    <option value="">Yes
                                                                    </option>
                                                                    <option value="">No
                                                                    </option>
                                                                </select>
                                                                <small id="meals_available_error"></small>
                                                            </div>

                                                            {{-- Yes selected --}}
                                                            <div class="form-group col-md-6">
                                                                <label>Meals Offrering<sup>*</sup></label>
                                                                <select class="js-select2" name="meals_offering"
                                                                    id="meals_offering_dropdown" multiple>
                                                                    <option value="">Breckfast
                                                                    </option>
                                                                    <option value="">Lunch
                                                                    </option>
                                                                    <option value="">Dinner
                                                                    </option>
                                                                </select>
                                                                <small id="meals_offering_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Meals Speciallity(Optional)</label>
                                                                <select class="js-select2" name="meal_speciality"
                                                                    id="meals_speciality_dropdown" multiple>
                                                                    <option value="">Punjabi
                                                                    </option>
                                                                    <option value="">South Indian
                                                                    </option>
                                                                    <option value="">Andhra
                                                                    </option>
                                                                    <option value="">North Indian
                                                                    </option>
                                                                    <option value="">Others
                                                                    </option>
                                                                </select>
                                                                {{-- <small id="meals_speciality_error"></small> --}}
                                                            </div>
                                                            {{-- End --}}

                                                            <div class="form-group col-md-4">
                                                                <label>Notice Period(Days)<sup>*</sup></label>
                                                                <input type="number" class="form-control"
                                                                    id="notice_period" name="notice_period"
                                                                    value="30">
                                                                <small id="notice_period_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Lock In Period(Days)<sup>*</sup></label>
                                                                <input type="number" class="form-control"
                                                                    id="lock_in_period" name="lock_in_period"
                                                                    value="30">
                                                                <small id="lock_in_period_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Common Areas<sup>*</sup></label>
                                                                <select class="js-select2" name="common_areas"
                                                                    id="meals_speciality_dropdown" multiple>
                                                                    <option value="">Living Rooms
                                                                    </option>
                                                                    <option value="">Kitchen
                                                                    </option>
                                                                    <option value="">Dining Hall
                                                                    </option>
                                                                    <option value="">Study Rooms/ Library
                                                                    </option>
                                                                    <option value="">Breack Out
                                                                    </option>
                                                                </select>
                                                                <small id="meals_speciality_error"></small>
                                                            </div>

                                                            <h3>Owner / Caretaker Details</h3>
                                                            <div class="form-group col-md-12">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Property Managed By
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Land
                                                                                Lord</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">Charetaker</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input checked"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-3"
                                                                                class="form-check-label">Dedicated
                                                                                Professional</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Property Manager stays at Property
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                        {{-- <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input checked"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-3"
                                                                                class="form-check-label">Dedicated
                                                                                Professional</label>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Non Veg Allowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="non_veg_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="non_veg_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Opposite Sex Allowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="opposite_sex_allowed"
                                                                                type="radio" value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="opposite_sex_allowed"
                                                                                type="radio" value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                        {{-- <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input checked"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-3"
                                                                                class="form-check-label">Dedicated
                                                                                Professional</label>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Any Time Aloowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="any_time_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="any_time_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Visitors Allowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="visitors_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="visitors_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                        {{-- <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input checked"
                                                                                name="property_status" type="radio"
                                                                                value="">
                                                                            <label for="a-3"
                                                                                class="form-check-label">Dedicated
                                                                                Professional</label>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Gardian Allowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="guardian_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="guardian_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="guardian_allowed_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Drinking Allowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="drinking_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="drinking_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                        {{-- <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusPgRadio"
                                                                                class="form-check-input checked"
                                                                                name="drinking_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-3"
                                                                                class="form-check-label">Dedicated
                                                                                Professional</label>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                                <small id="property_status_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <label>Smoking Allowed
                                                                                <sup>*</sup></label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusSaleRadio"
                                                                                class="form-check-input"
                                                                                name="smoking_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-1"
                                                                                class="form-check-label">Yes</label>
                                                                        </li>
                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                            <input id="propertyStatusRentRadio"
                                                                                class="form-check-input"
                                                                                name="smoking_allowed" type="radio"
                                                                                value="">
                                                                            <label for="a-2"
                                                                                class="form-check-label">No</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <small id="smoking_allowed_error"></small>
                                                            </div>

                                                            <h3>Other PG Details</h3>
                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="onetime_move_in_charges"
                                                                        id="onetime_move_in_charges" required>
                                                                    <label>Onetime Move in Charges (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="meal_charges_per_month"
                                                                        id="meal_charges_per_month" required>
                                                                    <label>Meal Charges per Month (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="electricity_charges_per_month"
                                                                        id="electricity_charges_per_month" required>
                                                                    <label>Electric Charges per Month (Optional)</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <div id="form-field" class="form-floating mb-4">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Credit card number"
                                                                        name="additional_information"
                                                                        id="additional_information" required>
                                                                    <label>Add Additional Information (Optional)</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <button type="button" id="firstBtn"
                                                            class="btn btn-primary btn-sm"
                                                            onclick="stepper.next()">Next
                                                            Step</button><br><br>

                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel"
                                                        aria-labelledby="information-part-trigger">

                                                        <h3>Property Details</h3>

                                                        <div class="form-group col-md-12">
                                                            <div class="o-features mt-2">
                                                                <ul class="no-ul-list row">
                                                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                        <label>Property Managed By <sup>*</sup></label>
                                                                    </li>
                                                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                        <input id="propertyStatusSaleRadio"
                                                                            class="form-check-input"
                                                                            name="property_status" type="checkbox"
                                                                            value="">
                                                                        <label for="a-1"
                                                                            class="form-check-label">Land Lord</label>
                                                                    </li>
                                                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                        <input id="propertyStatusRentRadio"
                                                                            class="form-check-input"
                                                                            name="property_status" type="checkbox"
                                                                            value="Rent/Lease">
                                                                        <label for="a-2"
                                                                            class="form-check-label">Charetaker</label>
                                                                    </li>
                                                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                        <input id="propertyStatusPgRadio"
                                                                            class="form-check-input checked"
                                                                            name="property_status" type="radio"
                                                                            value="PG/Hostel">
                                                                        <label for="a-3"
                                                                            class="form-check-label">Dedicated
                                                                            Professional</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <small id="property_status_error"></small>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label>Property Title<a href="#"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Title"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="text" class="form-control"
                                                                    name="name_of_project" id="name_of_project"
                                                                    placeholder="Enter Property Title">
                                                                <small id="name_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Description<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Description"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <textarea type="text" class="form-control" name="descr" id="descr" placeholder="Describe Here..."></textarea>
                                                                <small id="descr_error"></small>
                                                            </div>

                                                            {{-- <div class="form-group col-md-6">
                                                                <label>Property Location<a href="#"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Location"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <div id="map"></div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <div class="form-group col-sm-6">
                                                                    <label>Latitude<a href="#"
                                                                            class="tip-topdata"
                                                                            data-tip="Property latitude"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <input type="text" class="form-control"
                                                                        name="latitude" id="latitude" disabled>
                                                                    <small id="latitude_error"></small>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label>Longitude<a href="#"
                                                                            class="tip-topdata"
                                                                            data-tip="Property longitude"><i
                                                                                class="fa-solid fa-info"></i></a></label>
                                                                    <input type="text" class="form-control"
                                                                        name="longitude" id="longitude" disabled>
                                                                    <small id="longitude_error"></small>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3">

                                                            </div> --}}

                                                            <div class="form-group col-md-12 numberOfFlats">
                                                                <label>Number of Flats in Your Society
                                                                    <sup>*</sup></label>
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                            <input id="a-1"
                                                                                class="form-check-input no_of_flats"
                                                                                name="no_of_flats" type="radio"
                                                                                value="<50">
                                                                            <label for="a-1"
                                                                                class="form-check-label">
                                                                                <50< /label>
                                                                        </li>
                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                            <input id="a-2"
                                                                                class="form-check-input no_of_flats"
                                                                                name="no_of_flats" type="radio"
                                                                                value="50-100">
                                                                            <label for="a-2"
                                                                                class="form-check-label">50-100</label>
                                                                        </li>
                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                            <input id="a-3"
                                                                                class="form-check-input no_of_flats"
                                                                                name="no_of_flats" type="radio"
                                                                                value=">100">
                                                                            <label for="a-3"
                                                                                class="form-check-label">>100</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <h3>Price Details</h3>
                                                            <div class="form-group col-md-6">
                                                                <label>Property Price<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Price"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="price" name="price"
                                                                    placeholder="Enter Property Expected Price"></input>
                                                                <small id="price_error"></small>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Booking/Token Amount (Optional)<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="Property Price"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="booking_amount" name="booking_amount"
                                                                    placeholder="Enter Property Booking Amount"></input>
                                                            </div>

                                                            <h3>Property Features</h3>
                                                            <div class="form-group col-md-3 totalFloors">
                                                                <label>Total Floors</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="total_floors" id="total_floors">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Floor</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3 totalBedrooms">
                                                                <label>Total Bedrooms</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="total_bedrooms" id="total_bedrooms">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Bedrooms</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3 totalBalconies">
                                                                <label>Total Balconies</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="total_balconies" id="total_balconies">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Balconies</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3 totalBathrooms">
                                                                <label>Total Bathrooms</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="total_bathrooms" id="total_bathrooms">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Bathrooms</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3 totalWashrooms">
                                                                <label>Total Washrooms</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="total_washrooms" id="total_washrooms">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Washrooms</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3 personalWashroom">
                                                                <label>Personal Washroom ?</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="personal_washroom" id="personal_washroom">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3 pantry">
                                                                <label>Pantry/Cafeteria ?</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="cafeteria" id="cafeteria">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    <option value="Dry">Dry</option>
                                                                    <option value="Wet">Wet</option>
                                                                    <option value="Not Available">Not Available
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6 cornerShowRoom">
                                                                <label>Corner Showroom ?</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="corner_showroom" id="corner_showroom">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6 isMainRoadFacing">
                                                                <label>Is Main Road Facing ?</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="is_main_road_facing"
                                                                    id="is_main_road_facing">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>



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
                                                                    placeholder="Enter Rera Registration Number"></input>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <strong>Facilities (Amenities)</strong>
                                                                <div class="o-features mt-2">
                                                                    <ul class="no-ul-list row">
                                                                        @foreach ($amenities as $amenity)
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

                                                            <div
                                                                class="form-group col-md-12 floorAllowedForConstruction">
                                                                <label>Floor Allowed for Construction<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="Property Description"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="floors_allowed_for_construction"
                                                                    id="floors_allowed_for_construction">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Bathrooms</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-12 noOfOpenSides">
                                                                <label>No. of Open Sides<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Property Description"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="no_of_open_sides" id="no_of_open_sides">
                                                                    <option value="" selected disabled>Select
                                                                        Total
                                                                        Number of Open Sides</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-12 widthOfRoadFacing">
                                                                <label>Width of road Facing Plot<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="(in meters)"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="text" class="form-control"
                                                                    name="width_of_road_facing_plot"
                                                                    id="width_of_road_facing_plot"
                                                                    placeholder="Enter Width of Road Facing Plot">
                                                            </div>

                                                            <div class="form-group col-md-12 anyConstructionMade">
                                                                <label>Any Construction Made ?<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="Any Construction Made ?"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="any_construction" id="any_construction">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-12 boundaryWallMade">
                                                                <label>Boundary Wall Made ?<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Boundary Made ?"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="boundary_wall" id="boundary_wall">
                                                                    <option value="" selected disabled>Select One
                                                                    </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-12 furnishedStatus">
                                                                <label for="">Furnished Status<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="Select Furnished Status"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="furnished_status" id="furnished_status"
                                                                    style="width: 100%;">
                                                                    <option value="" selected disabled>Select
                                                                        One
                                                                    </option>
                                                                    <option value="Fully Furnished">Fully Furnished
                                                                    </option>
                                                                    <option value="Unfurnished">Unfurnished</option>
                                                                    <option value="Semi Furnished">Semi Furnished
                                                                    </option>
                                                                </select>
                                                            </div>


                                                            <h3 class="area">Area</h3>
                                                            <div class="form-group col-md-6 carpetArea">
                                                                <label>Carpet Area<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Enter Carpet Area"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="carpet_area" name="carpet_area"
                                                                    placeholder="Enter Carpet Area"></input>
                                                            </div>

                                                            <div class="form-group col-md-6 superArea">
                                                                <label>Super Area<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Enter Super Area"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="super_area" name="super_area"
                                                                    placeholder="Enter Super Area"></input>
                                                            </div>

                                                            <div class="form-group col-md-12 widthOfEntrance">
                                                                <label>Width of Entrance<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Enter Super Area"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="text" class="form-control"
                                                                    id="width_of_entrance" name="width_of_entrance"
                                                                    placeholder="Enter Width of Entrance"></input>
                                                            </div>

                                                            <div class="form-group col-md-4 plotArea">
                                                                <label>Plot Area<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Enter Plot Area"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="plot_area" name="plot_area"
                                                                    placeholder="Enter Plot Area"></input>
                                                            </div>

                                                            <div class="form-group col-md-4 plotLength">
                                                                <label>Plot Length<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Enter Plot Length"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="plot_length" name="plot_length"
                                                                    placeholder="Enter Plot Length"></input>
                                                            </div>

                                                            <div class="form-group col-md-4 plotBreadth">
                                                                <label>Plot Breadth<a href="javascript:void(0)"
                                                                        class="tip-topdata"
                                                                        data-tip="Enter Plot Breadth"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <input type="number" class="form-control"
                                                                    id="plot_breadth" name="plot_breadth"
                                                                    placeholder="Enter Plot Breadth"></input>
                                                            </div>

                                                            <h3 class="transaction_type">Transaction Type, Property
                                                                Availability</h3>
                                                            <div class="form-group col-md-12 possessionStatus">
                                                                <label for="">Possession Status<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="Select Possession Status"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="possession_status" id="possession_status"
                                                                    style="width: 100%;">
                                                                    <option value="" selected disabled>Select
                                                                        One
                                                                    </option>
                                                                    <option value="Under Construction">Under
                                                                        Construction</option>
                                                                    <option value="Ready to Move">Ready to Move
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-12 time_duration"
                                                                style="display: none;">
                                                                <label for="">Available From</label>
                                                                <input type="text" id="available_from"
                                                                    name="available_from" class="form-control"
                                                                    placeholder="Select Date">
                                                            </div>

                                                            <div class="form-group col-md-12 property_age"
                                                                style="display: none;">
                                                                <label for="">Age<a href="javascript:void(0)"
                                                                        class="tip-topdata" data-tip="Property Age"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="age" id="age"
                                                                    style="width: 100%;">
                                                                    <option value="" selected disabled>Select
                                                                        One
                                                                    </option>
                                                                    <option value="New Construction">New Construction
                                                                    </option>
                                                                    <option value="Less than 5 Years">Less than 5 Years
                                                                    </option>
                                                                    <option value="5 to 10 Years">5 to 10 Years
                                                                    </option>
                                                                    <option value="10 to 15 Years">10 to 15 Years
                                                                    </option>
                                                                    <option value="15 to 20 Years">15 to 20 Years
                                                                    </option>
                                                                    <option value="Above 20 Years">Above 20 Years
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <h3 class="rent_lease_details">Rent/ Lease Details</h3>
                                                            <div class="form-group col-md-12 currentlyLeasedOut">
                                                                <label for="">Currently Leased Out ?<a
                                                                        href="javascript:void(0)" class="tip-topdata"
                                                                        data-tip="is Property Currently Leased Out"><i
                                                                            class="fa-solid fa-info"></i></a></label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="currently_leased_out"
                                                                    id="currently_leased_out"
                                                                    onchange="currentlyLeasedOut(this.value)"
                                                                    style="width: 100%;">
                                                                    <option value="" selected disabled>Select
                                                                        One
                                                                    </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6 leasedTo">
                                                                <label for="">Please Specify whether your
                                                                    Property has
                                                                    been leased to Company or an Individual</label>
                                                                <input type="text" class="form-control"
                                                                    id="leased_to" placeholder="Describe here.."
                                                                    name="leased_to">
                                                            </div>

                                                            <div class="form-group col-md-6 monthlyRent">
                                                                <label for="">Monthly Rent</label>
                                                                <input type="text" class="form-control"
                                                                    id="monthly_rent" placeholder="Enter Monthly Rent"
                                                                    name="monthly_rent">
                                                            </div>

                                                            <div class="form-group col-md-6 securityAmount">
                                                                <label for="">Security Amount
                                                                    (Optional)</label>
                                                                <input type="text" class="form-control"
                                                                    id="security_amount"
                                                                    placeholder="Enter Security Amount"
                                                                    name="security_amount">
                                                            </div>

                                                            <div class="form-group col-md-6 maintenanceCharges">
                                                                <label for="">Maintenance Charges</label>
                                                                <input type="text" class="form-control"
                                                                    id="maintenance_charges"
                                                                    placeholder="Enter Maintenance Charges"
                                                                    name="maintenance_charges">
                                                            </div>

                                                            <div class="form-group col-md-6 perCharges">
                                                                <label for="">Charges Per</label>
                                                                <select class="js-select2-disablesearch"
                                                                    name="per_charges" id="per_charges"
                                                                    style="width: 100%;">
                                                                    <option value="" selected disabled>Select
                                                                        One
                                                                    </option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="Quarterly">Quarterly</option>
                                                                    <option value="Yearly">Yearly</option>
                                                                    <option value="One-Time">One-Time</option>
                                                                    <option value="Per sq. Unit Monthly">Per sq. Unit
                                                                        Monthly</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <input id="agree" class="form-check-input terms"
                                                            name="agree" value="agree" type="checkbox">
                                                        <label for="a-1" class="form-check-label">I Agree to
                                                            Terms & Condition<a href="javascript:void(0)"
                                                                class="tip-topdata" data-tip="Not Available"><i
                                                                    class="fa-solid fa-info"></i></a></label>
                                                        <small id="terms_error"></small>
                                                        <br><br>

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
    <script src="{{ url('/') }}/front/assets/js/property_category_fields.js"></script>
    <script src="{{ url('/') }}/front/assets/js/post_property.js"></script>
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
