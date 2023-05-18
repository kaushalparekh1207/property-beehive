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
{{--        <div class="page-title" style="background:#017efa url({{url('/')}}/front/assets/img/page-title.png) no-repeat;">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12 col-md-12">--}}

{{--                        <h2 class="ipt-title">Hi, Harshvardhan</h2>--}}
{{--                        <span class="ipn-subtitle">Manage your profile and view property</span>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
                                                                <form class="" id="propertyForm" method="POST" action="{{ route('propertyDataInsertAjax') }}">
                                                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                                <div class="bs-stepper">
                                                                    <div class="bs-stepper-header" role="tablist">
                                                                        <!-- your steps here -->
                                                                        <div class="step" data-target="#logins-part">
                                                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                                                <span class="bs-stepper-circle">1</span>
                                                                                <span class="bs-stepper-label">Basic Information</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="line"></div>
                                                                        <div class="step" data-target="#information-part">
                                                                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                                                <span class="bs-stepper-circle">2</span>
                                                                                <span class="bs-stepper-label">Property information</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="line"></div>
                                                                        <div class="step" data-target="#photos-part">
                                                                            <button type="button" class="step-trigger" role="tab" aria-controls="photos-part" id="photos-part-trigger">
                                                                                <span class="bs-stepper-circle">3</span>
                                                                                <span class="bs-stepper-label">Photos</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                        <!-- your steps content here -->
                                                                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                                            <h3>Property Details</h3>
                                                                            <div class="row">
                                                                            <div class="form-group col-md-12">
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <label>I want to <sup>*</sup></label>
                                                                                        </li>
                                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input id="propertyStatusRadio" class="form-check-input propertyStatus" name="property_status" type="radio" value="Sale">
                                                                                            <label for="a-1" class="form-check-label">Sale</label>
                                                                                        </li>
                                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input id="propertyStatusRadio" class="form-check-input propertyStatus" name="property_status" type="radio" value="Rent/Lease">
                                                                                            <label for="a-2" class="form-check-label">Rent/Lease</label>
                                                                                        </li>
                                                                                        <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                                                            <input id="propertyStatusRadio" class="form-check-input propertyStatus" name="property_status" type="radio" value="PG/Hostel">
                                                                                            <label for="a-3" class="form-check-label">PG/Hostel</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <small id="property_status_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <label>Property Type<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Type"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2" name="property_type" id="property_type">
                                                                                    <option value="" selected disabled>Select Property Type</option>
                                                                                    @foreach ($propertyTypes as $propertyType)
                                                                                        <option value="{{ $propertyType->id }}">
                                                                                            {{ $propertyType->property_type }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <small id="property_type_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <label>Property Category<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Category"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2" name="property_category" id="property_category_dropdown">
                                                                                    <option value="" selected disabled>Select Property Category</option>
                                                                                </select>
                                                                                <small id="property_category_error"></small>
                                                                            </div>

                                                                            <h3>Property Location</h3>
                                                                            <div class="form-group col-md-6">
                                                                                <label>State</label>
                                                                                <select class="js-select2" name="state_id" id="state_id">
                                                                                    <option value="" selected disabled>Select State</option>
                                                                                    @foreach ($states as $state)
                                                                                        <option value="{{$state->id}}">{{$state->state}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <small id="state_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <label>City</label>
                                                                                <select class="js-select2" name="city_id" id="city_dropdown">
                                                                                    <option value="" selected disabled>Select City</option>
                                                                                </select>
                                                                                <small id="city_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <label>Locality</label>
                                                                                <input type="text" class="form-control" placeholder="Enter Locality/Area" id="locality" name="locality">
                                                                                <small id="area_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12 landZone">
                                                                                <label>Land Zone</label>
                                                                                <select class="js-select2" name="land_zone" id="land_zone">
                                                                                    <option value="" selected disabled>Select One</option>
                                                                                    <option value="Commercial">Commercial</option>
                                                                                    <option value="Transport & Communication">Transport & Communication</option>
                                                                                    <option value="Public Utilities">Public Utilities</option>
                                                                                    <option value="Public & Semi Public Use">Public & Semi Public Use</option>
                                                                                    <option value="Open Spaces">Open Spaces</option>
                                                                                    <option value="Agricultural Zone">Agricultural Zone</option>
                                                                                    <option value="Special Economic Zone">Special Economic Zone</option>
                                                                                    <option value="Natural Conservation Zone">Natural Conservation Zone</option>
                                                                                    <option value="Government Zone">Government Zone</option>
                                                                                </select>
                                                                                <small id="land_zone_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <label>Address</label>
                                                                                <textarea class="form-control" style="height: 100px;" id="address" placeholder="Describe Here..." name="address"></textarea>
                                                                                <small id="address_error"></small>
                                                                            </div>

                                                                            </div>

                                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                                    onclick="stepper.next()">Next Step</button><br><br>

                                                                        </div>
                                                                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                                                            <h3>Property Details</h3>
                                                                            <div class="row">
                                                                            <div class="form-group col-md-12">
                                                                                <label>Property Title<a href="#" class="tip-topdata" data-tip="Property Title"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="text" class="form-control" name="name_of_project" id="name_of_project" placeholder="Enter Property Title">
                                                                                <small id="name_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12">
                                                                                <label>Description<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Description"><i class="fa-solid fa-info"></i></a></label>
                                                                                <textarea type="text" class="form-control" name="descr" id="descr" placeholder="Describe Here..."></textarea>
                                                                                <small id="descr_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-12 numberOfFlats">
                                                                                <label>Number of Flats in Your Society <sup>*</sup></label>
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                            <input id="a-1" class="form-check-input no_of_flats" name="no_of_flats" type="radio" value="<50">
                                                                                            <label for="a-1" class="form-check-label"><50</label>
                                                                                        </li>
                                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                            <input id="a-2" class="form-check-input no_of_flats" name="no_of_flats" type="radio" value="50-100">
                                                                                            <label for="a-2" class="form-check-label">50-100</label>
                                                                                        </li>
                                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                            <input id="a-3" class="form-check-input no_of_flats" name="no_of_flats" type="radio" value=">100">
                                                                                            <label for="a-3" class="form-check-label">>100</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <label>Property Price<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Price"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Property Expected Price"></input>
                                                                                <small id="price_error"></small>
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <label>Booking/Token Amount (Optional)<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Price"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="booking_amount" name="booking_amount" placeholder="Enter Property Booking Amount"></input>
                                                                            </div>


                                                                            <h3>Property Features</h3>
                                                                            <div class="form-group col-md-3 totalFloors">
                                                                                <label>Total Floors</label>
                                                                                <select class="js-select2-disablesearch" name="total_floors" id="total_floors">
                                                                                    <option value="" selected disabled>Select Total Number of Floor</option>
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
                                                                                <select class="js-select2-disablesearch" name="total_bedrooms" id="total_bedrooms">
                                                                                    <option value="" selected disabled>Select Total Number of Bedrooms</option>
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
                                                                                <select class="js-select2-disablesearch" name="total_balconies" id="total_balconies">
                                                                                    <option value="" selected disabled>Select Total Number of Balconies</option>
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
                                                                                <select class="js-select2-disablesearch" name="total_bathrooms" id="total_bathrooms">
                                                                                    <option value="" selected disabled>Select Total Number of Bathrooms</option>
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
                                                                                <select class="js-select2-disablesearch" name="total_washrooms" id="total_washrooms">
                                                                                    <option value="" selected disabled>Select Total Number of Washrooms</option>
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
                                                                                <select class="js-select2-disablesearch" name="personal_washroom" id="personal_washroom">
                                                                                    <option value="" selected disabled>Select One</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-3 pantry">
                                                                                <label>Pantry/Cafeteria ?</label>
                                                                                <select class="js-select2-disablesearch" name="cafeteria" id="cafeteria">
                                                                                    <option value="" selected disabled>Select One</option>
                                                                                    <option value="Dry">Dry</option>
                                                                                    <option value="Wet">Wet</option>
                                                                                    <option value="Not Available">Not Available</option>
                                                                                </select>
                                                                            </div>

                                                                                <div class="form-group col-md-6 cornerShowRoom">
                                                                                    <label>Corner Showroom ?</label>
                                                                                    <select class="js-select2-disablesearch" name="corner_showroom" id="corner_showroom">
                                                                                        <option value="" selected disabled>Select One</option>
                                                                                        <option value="Yes">Yes</option>
                                                                                        <option value="No">No</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group col-md-6 isMainRoadFacing">
                                                                                    <label>Is Main Road Facing ?</label>
                                                                                    <select class="js-select2-disablesearch" name="is_main_road_facing" id="is_main_road_facing">
                                                                                        <option value="" selected disabled>Select One</option>
                                                                                        <option value="Yes">Yes</option>
                                                                                        <option value="No">No</option>
                                                                                    </select>
                                                                                </div>

                                                                            <div class="form-group col-md-12">
                                                                                <strong>Facilities (Amenities)</strong>
                                                                                <div class="o-features mt-2">
                                                                                    <ul class="no-ul-list row">
                                                                                        @foreach($amenities as $amenity)
                                                                                        <li class="col-xl-4 col-lg-4 col-md-6 col-6">
                                                                                            <input id="a-1" class="form-check-input amenities" name="amenities[]" value="{{$amenity->id}}" type="checkbox">
                                                                                            <label for="a-1" class="form-check-label">{{$amenity->amenities}}</label>
                                                                                        </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-12 floorAllowedForConstruction">
                                                                                <label>Floor Allowed for Construction<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Description"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="floors_allowed_for_construction" id="floors_allowed_for_construction">
                                                                                    <option value="" selected disabled>Select Total Number of Bathrooms</option>
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
                                                                                <label>No. of Open Sides<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Description"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="no_of_open_sides" id="no_of_open_sides">
                                                                                    <option value="" selected disabled>Select Total Number of Open Sides</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-12 widthOfRoadFacing">
                                                                                <label>Width of road Facing Plot<a href="javascript:void(0)" class="tip-topdata" data-tip="(in meters)"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="text" class="form-control" name="width_of_road_facing_plot" id="width_of_road_facing_plot" placeholder="Enter Width of Road Facing Plot">
                                                                            </div>

                                                                            <div class="form-group col-md-12 anyConstructionMade">
                                                                                <label>Any Construction Made ?<a href="javascript:void(0)" class="tip-topdata" data-tip="Any Construction Made ?"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="any_construction" id="any_construction">
                                                                                    <option value="" selected disabled>Select One</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-12 boundaryWallMade">
                                                                                <label>Boundary Wall Made ?<a href="javascript:void(0)" class="tip-topdata" data-tip="Boundary Made ?"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="boundary_wall" id="boundary_wall">
                                                                                    <option value="" selected disabled>Select One</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                                                                </select>
                                                                            </div>


                                                                            <h3>Area</h3>
                                                                            <div class="form-group col-md-6 carpetArea">
                                                                                <label>Carpet Area<a href="javascript:void(0)" class="tip-topdata" data-tip="Enter Carpet Area"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="carpet_area" name="carpet_area" placeholder="Enter Carpet Area"></input>
                                                                            </div>

                                                                            <div class="form-group col-md-6 superArea">
                                                                                <label>Super Area<a href="javascript:void(0)" class="tip-topdata" data-tip="Enter Super Area"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="super_area" name="super_area" placeholder="Enter Super Area"></input>
                                                                            </div>

                                                                            <div class="form-group col-md-12 widthOfEntrance">
                                                                                <label>Width of Entrance<a href="javascript:void(0)" class="tip-topdata" data-tip="Enter Super Area"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="text" class="form-control" id="width_of_entrance" name="width_of_entrance" placeholder="Enter Width of Entrance"></input>
                                                                            </div>

                                                                            <div class="form-group col-md-4 plotArea">
                                                                                <label>Plot Area<a href="javascript:void(0)" class="tip-topdata" data-tip="Enter Plot Area"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="plot_area" name="plot_area" placeholder="Enter Plot Area"></input>
                                                                            </div>

                                                                            <div class="form-group col-md-4 plotLength">
                                                                                <label>Plot Length<a href="javascript:void(0)" class="tip-topdata" data-tip="Enter Plot Length"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="plot_length" name="plot_length" placeholder="Enter Plot Length"></input>
                                                                            </div>

                                                                            <div class="form-group col-md-4 plotBreadth">
                                                                                <label>Plot Breadth<a href="javascript:void(0)" class="tip-topdata" data-tip="Enter Plot Breadth"><i class="fa-solid fa-info"></i></a></label>
                                                                                <input type="number" class="form-control" id="plot_breadth" name="plot_breadth" placeholder="Enter Plot Breadth"></input>
                                                                            </div>

                                                                            <div class="form-group col-md-12 furnishedStatus">
                                                                                <label for="">Furnished Status<a href="javascript:void(0)" class="tip-topdata" data-tip="Select Furnished Status"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="furnished_status"
                                                                                        id="furnished_status" style="width: 100%;">
                                                                                    <option value="" selected disabled>Select
                                                                                        One
                                                                                    </option>
                                                                                    <option value="Fully Furnished">Fully Furnished</option>
                                                                                    <option value="Unfurnished">Unfurnished</option>
                                                                                    <option value="Semi Furnished">Semi Furnished</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-12 possessionStatus">
                                                                                <label for="">Possession Status<a href="javascript:void(0)" class="tip-topdata" data-tip="Select Possession Status"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="possession_status"
                                                                                        id="possession_status" style="width: 100%;">
                                                                                    <option value="" selected disabled>Select
                                                                                        One
                                                                                    </option>
                                                                                    <option value="Under Construction">Under Construction</option>
                                                                                    <option value="Ready to Move">Ready to Move</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-12 time_duration" style="display: none;">
                                                                                <label for="">Available From</label>
                                                                                <input type="text" id="available_from" name="available_from" class="form-control" placeholder="Select Date">
                                                                            </div>

                                                                            <div class="form-group col-md-12 property_age" style="display: none;">
                                                                                <label for="">Age<a href="javascript:void(0)" class="tip-topdata" data-tip="Property Age"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="age"
                                                                                        id="age" style="width: 100%;">
                                                                                    <option value="" selected disabled>Select
                                                                                        One
                                                                                    </option>
                                                                                    <option value="New Construction">New Construction</option>
                                                                                    <option value="Less than 5 Years">Less than 5 Years</option>
                                                                                    <option value="5 to 10 Years">5 to 10 Years</option>
                                                                                    <option value="10 to 15 Years">10 to 15 Years</option>
                                                                                    <option value="15 to 20 Years">15 to 20 Years</option>
                                                                                    <option value="Above 20 Years">Above 20 Years</option>
                                                                                </select>
                                                                            </div>

                                                                            <h3 class="rent_lease_details">Rent/ Lease Details</h3>
                                                                            <div class="form-group col-md-12 currentlyLeasedOut">
                                                                                <label for="">Currently Leased Out ?<a href="javascript:void(0)" class="tip-topdata" data-tip="is Property Currently Leased Out"><i class="fa-solid fa-info"></i></a></label>
                                                                                <select class="js-select2-disablesearch" name="currently_leased_out"
                                                                                        id="currently_leased_out" style="width: 100%;">
                                                                                    <option value="" selected disabled>Select
                                                                                        One
                                                                                    </option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group col-md-6 leasedTo">
                                                                                <label for="">Please Specify whether your Property has been leased to Company or an Individual</label>
                                                                                <input type="text" class="form-control" id="leased_to" placeholder="Describe here.." name="leased_to">
                                                                            </div>

                                                                            <div class="form-group col-md-6 monthlyRent">
                                                                                <label for="">Monthly Rent</label>
                                                                                <input type="text" class="form-control" id="monthly_rent" placeholder="Enter Monthly Rent" name="monthly_rent">
                                                                            </div>

                                                                            <div class="form-group col-md-6 securityAmount">
                                                                                <label for="">Security Amount (Optional)</label>
                                                                                <input type="text" class="form-control" id="security_amount" placeholder="Enter Security Amount" name="security_amount">
                                                                            </div>

                                                                            <div class="form-group col-md-6 maintenanceCharges">
                                                                                <label for="">Maintenance Charges</label>
                                                                                <input type="text" class="form-control" id="maintenance_charges" placeholder="Enter Maintenance Charges" name="maintenance_charges">
                                                                            </div>

                                                                            <div class="form-group col-md-6 perCharges">
                                                                                <label for="">Charges Per</label>
                                                                                <select class="js-select2-disablesearch" name="per_charges"
                                                                                        id="per_charges" style="width: 100%;">
                                                                                    <option value="" selected disabled>Select
                                                                                        One
                                                                                    </option>
                                                                                    <option value="Monthly">Monthly</option>
                                                                                    <option value="Quarterly">Quarterly</option>
                                                                                    <option value="Yearly">Yearly</option>
                                                                                    <option value="One-Time">One-Time</option>
                                                                                    <option value="Per sq. Unit Monthly">Per sq. Unit Monthly</option>
                                                                                </select>
                                                                            </div>

                                                                            </div>
                                                                            <br>

                                                                            <button type="button" id="prev_step1" class="btn btn-primary btn-sm"
                                                                                    onclick="stepper.previous()">Previous Step</button>
                                                                            <button type="submit" class="btn btn-primary btn-sm" id="btn-submit" style="background-color: #dc3545; border: none;">Next Step</button>
                                                                        </div>
                                                                    </form>

                                                                        <div id="photos-part" class="content" role="tabpanel" aria-labelledby="photos-part-trigger">
                                                                            <label for="">Banner/Cover Image<sup>*</sup></label>
                                                                            <form action="{{route('uploadPropertyBannerImage')}}" method="post" id="bannerImageUpload" class="dropzone dz-clickable primary-dropzone" enctype="multipart/form-data">
                                                                                @csrf
                                                                            <div class="dz-default dz-message">
                                                                                <i class="fa-solid fa-images"></i>
                                                                                <span>Drag & Drop Files to Upload</span>
                                                                            </div>
                                                                            </form><br>

                                                                            <label for="">Master Plan Image<sup>*</sup></label>
                                                                            <form action="{{route('uploadPropertyMasterPlanImage')}}" method="post" id="masterImageUpload" class="dropzone dz-clickable primary-dropzone" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="dz-default dz-message">
                                                                                    <i class="fa-solid fa-images"></i>
                                                                                    <span>Drag & Drop Files to Upload</span>
                                                                                </div>
                                                                            </form>
                                                                            <br>

                                                                            <label for="">Site View Image<sup>*</sup></label>
                                                                            <form action="{{route('uploadPropertySiteViewImage')}}" method="post" id="siteViewImageUpload" class="dropzone dz-clickable primary-dropzone" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="dz-default dz-message">
                                                                                    <i class="fa-solid fa-images"></i>
                                                                                    <span>Drag & Drop Files to Upload</span>
                                                                                </div>
                                                                            </form><br>

                                                                            <label for="">Floor Plan Image<sup>*</sup></label>
                                                                            <form action="{{route('uploadPropertyFloorPlanImage')}}" method="post" id="floorPlanImageUpload" class="dropzone dz-clickable primary-dropzone" enctype="multipart/form-data">
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

{{--                                                                            <button type="button" id="prev_step" class="btn btn-primary btn-sm"--}}
{{--                                                                                    onclick="stepper.previous()">Previous Step</button>--}}
                                                                            <button type="submit" class="btn btn-primary btn-sm" style="background-color: #dc3545; border: none;">Submit</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{url('/')}}/front/assets/js/property_category_fields.js"></script>
    <script src="{{url('/')}}/front/assets/js/post_property.js"></script>
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
        Dropzone.options.bannerImageUpload={
            maxFilesize:2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
        }

        Dropzone.options.masterImageUpload={
            maxFilesize:2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.siteViewImageUpload={
            maxFilesize:2,
            acceptedFiles: '.jpg,.jpeg,.png,.webp',
            addRemoveLinks: true,
        }

        Dropzone.options.floorPlanImageUpload={
            maxFilesize:2,
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
        $( function() {
            $( "#available_from" ).datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: 0,
                dateFormat: 'dd-mm-yy',
            });
        } );
    </script>

    </body>

    </html>
