$(document).ready(function () {

    /* Get Radio Button Values */
    $(".form-check-input").change(function(){
        // bind a function to the change event
        if( $(this).is(":checked") ){ // check if the radio is checked
            var selected_value = $(this).val(); // retrieve the value
            if(selected_value == 'PG/Hostel'){
                window.location.href = '/add_pg_property_details';
            }
        }
    });
    /* Property Status Validation */
    let propertyStatusError = false;
    // $("#property_type").on('change',function () {
    //     validatePropertyType();
    // });
    function validatePropertyStatus() {
        var pstatusSale = $(".propertyStatusSale:checked").val();
        var pstatusRent = $(".propertyStatusRent:checked").val();
        var pstatusPg = $(".propertyStatusPg:checked").val();
        if (
            pstatusSale == null ||
            pstatusSale == "" ||
            !$("#propertyStatusSaleRadio").is(":checked")
        ) {
            $("#property_status_error").html("");
            propertyStatusError = false;
        } else if (
            pstatusRent == null ||
            pstatusRent == "" ||
            !$("#propertyStatusRentRadio").is(":checked")
        ) {
            $("#property_status_error").html("");
            propertyStatusError = false;
        } else if (
            pstatusPg == null ||
            pstatusPg == "" ||
            !$("#propertyStatusPgRadio").is(":checked")
        ) {
            $("#property_status_error").html("");
            propertyStatusError = false;
        } else {
            $("#property_status_error").html("* Please Select One Option");
            propertyStatusError = true;
            stepper.previous();
            return false;
        }
    }

    /* Property Type Validation */
    let propertyTypeError = false;
    $("#property_type").on("change", function () {
        validatePropertyType();
    });
    function validatePropertyType() {
        var ptype = $("#property_type").val();
        if (ptype == null) {
            $("#property_type_error").html("* Please Select Property Type");
            propertyTypeError = true;
            stepper.previous();
            return false;
        } else {
            $("#property_type_error").html("");
            propertyTypeError = false;
        }
    }

    /* Property Category Validation */
    let propertyCategoryError = false;
    $("#property_category_dropdown").on("change", function () {
        validatePropertyCategory();
    });
    function validatePropertyCategory() {
        var pcat = $("#property_category_dropdown").val();
        if (pcat == null) {
            $("#property_category_error").html(
                "* Please Select Property Category"
            );
            propertyCategoryError = true;
            stepper.previous();
            return false;
        } else {
            $("#property_category_error").html("");
            propertyCategoryError = false;
        }
    }

    /* State Validation */
    let stateError = false;
    $("#state_id").on("change", function () {
        validateState();
    });
    function validateState() {
        var state = $("#state_id").val();
        if (state == null) {
            $("#state_error").html("* Please Select State");
            stateError = true;
            stepper.previous();
            return false;
        } else {
            $("#state_error").html("");
            stateError = false;
        }
    }

    /* City Validation */
    let cityError = false;
    $("#city_dropdown").on("change", function () {
        validateCity();
    });
    function validateCity() {
        var city = $("#city_dropdown").val();
        if (city == null) {
            $("#city_error").html("* Please Select City");
            cityError = true;
            stepper.previous();
            return false;
        } else {
            $("#city_error").html("");
            cityError = false;
        }
    }

    /* Taluka Validation */
    let talukaError = false;
    $("#taluka_dropdown").on("change", function () {
        validateTaluka();
    });
    function validateTaluka() {
        var taluka = $("#taluka_dropdown").val();
        if (taluka == null) {
            $("#taluka_error").html("* Please Select Taluko");
            talukaError = true;
            stepper.previous();
            return false;
        } else {
            $("#taluka_error").html("");
            talukaError = false;
        }
    }

    /* Property Locality/Area Validation */
    let propertyLocalityError = false;
    $("#locality").keyup(function () {
        validateLocality();
    });
    function validateLocality() {
        var locality = $("#locality").val();
        if (locality == null || locality == "") {
            $("#area_error").text("* Please Insert Property Locality");
            propertyLocalityError = true;
            stepper.previous();
            return false;
        } else {
            $("#area_error").text("");
            propertyLocalityError = false;
        }
    }

    /* Property Address Validation */
    let addressError = false;
    $("#address").keyup(function () {
        validateAddress();
    });
    function validateAddress() {
        var address = $("#address").val();
        if (address == null || address == "") {
            $("#address_error").html("* Please Insert Address");
            addressError = true;
            stepper.previous();
            return false;
        } else {
            $("#address_error").html("");
            addressError = false;
        }
    }

    /* Property Name/Title Validation */
    let nameError = false;
    $("#name_of_project").keyup(function () {
        validateName();
    });
    function validateName() {
        var name = $("#name_of_project").val();
        if (name == null || name == "") {
            $("#name_error").html("* Please Insert Property Title");
            nameError = true;
            return false;
        } else {
            $("#name_error").html("");
            nameError = false;
        }
    }

    /* Property Description Validation */
    let descrError = false;
    $("#descr").keyup(function () {
        validateDescription();
    });
    function validateDescription() {
        var descr = $("#descr").val();
        if (descr == null || descr == "") {
            $("#descr_error").html("* Please Insert Property Description");
            descrError = true;
            return false;
        } else {
            $("#descr_error").html("");
            descrError = false;
        }
    }
    2;

    /* Property Price Validation */
    let priceError = false;
    $("#price").keyup(function () {
        validatePrice();
    });
    function validatePrice() {
        var price = $("#price").val();
        if (price == null || price == "") {
            $("#price_error").html("* Please Insert Property Expected Price");
            priceError = true;
            return false;
        } else {
            $("#price_error").html("");
            priceError = false;
        }
    }

    /* Terms and Conditions */
    let termsError = false;

    function validateTermsAndConditions() {
        var value = $(".terms:checked").val();

        if (value == null || value == "" || !$("#terms").is(":checked")) {
            $("#terms_error").html("");
            termsError = false;
        } else {
            $("#terms_error").html("* This is a required field");
            termsError = true;
            stepper.previous();
            return false;
        }
    }

    $("#btn-submit").click(function (e) {
        e.preventDefault();

        validatePropertyType();
        validatePropertyCategory();
        validateState();
        validateCity();
        validateTaluka();
        validateLocality();
        validateAddress();
        validateName();
        validateDescription();
        validatePrice();
        validatePropertyStatus();
        validateTermsAndConditions();

        if (
            propertyStatusError == false &&
            propertyTypeError == false &&
            propertyCategoryError == false &&
            stateError == false &&
            cityError == false &&
            talukaError == false &&
            propertyLocalityError == false &&
            addressError == false &&
            nameError == false &&
            descrError == false &&
            priceError == false &&
            propertyStatusError == false &&
            termsError == false
        ) {
            insertProperty();
        } else {
            return false;
        }
    });
});

function insertProperty() {
    var propertystatus = $(".property_status:checked").val();
    var property_type = $("#property_type").val();
    var property_category_dropdown = $("#property_category_dropdown").val();
    var state_id = $("#state_id").val();
    var city_dropdown = $("#city_dropdown").val();
    var taluka_dropdown = $("#taluka_dropdown").val();
    var locality = $("#locality").val();
    var address = $("#address").val();
    var name_of_project = $("#name_of_project").val();
    var no_of_flats = $(".no_of_flats:checked").val();

    var total_floors = $("#total_floors").val();
    var total_bedrooms = $("#total_bedrooms").val();
    var total_balconies = $("#total_balconies").val();
    var total_bathrooms = $("#total_bathrooms").val();
    var descr = $("#descr").val();
    var amenitiesArray = new Array();
    var element = $("input[type='checkbox']");
    $(element).each(function (i) {
        if ($($(element)[i]).prop("checked")) {
            amenitiesArray.push($('input[name="amenities[]"').val());
        } else {
            amenitiesArray = [];
        }
    });

    // Append Array to String
    var dataString = "amenitiesArray=" + amenitiesArray;
    var floors_allowed_for_construction = $(
        "#floors_allowed_for_construction"
    ).val();
    var no_of_open_sides = $("#no_of_open_sides").val();
    var width_of_road_facing_plot = $("#width_of_road_facing_plot").val();
    var any_construction = $("#any_construction").val();
    var boundary_wall = $("#boundary_wall").val();
    var carpet_area = $("#carpet_area").val();
    var super_area = $("#super_area").val();
    var plot_area = $("#plot_area").val();
    var plot_length = $("#plot_length").val();
    var plot_breadth = $("#plot_breadth").val();
    var price = $("#price").val();
    var booking_amount = $("#booking_amount").val();
    var furnished_status = $("#furnished_status").val();
    var possession_status = $("#possession_status").val();
    var available_from = $("#available_from").val();
    var age = $("#age").val();
    var monthly_maintenance_charge = $("#monthly_maintenance_charge").val();
    var url = $("#propertyForm").attr("action");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            propertystatus: propertystatus,
            property_type: property_type,
            property_category_dropdown: property_category_dropdown,
            state_id: state_id,
            city_dropdown: city_dropdown,
            taluka_dropdown: taluka_dropdown,
            locality: locality,
            address: address,
            name_of_project: name_of_project,
            no_of_flats: no_of_flats,
            total_floors: total_floors,
            total_bedrooms: total_bedrooms,
            total_balconies: total_balconies,
            total_bathrooms: total_bathrooms,
            descr: descr,
            amenitiesArray: amenitiesArray,
            floors_allowed_for_construction: floors_allowed_for_construction,
            no_of_open_sides: no_of_open_sides,
            width_of_road_facing_plot: width_of_road_facing_plot,
            any_construction: any_construction,
            boundary_wall: boundary_wall,
            carpet_area: carpet_area,
            super_area: super_area,
            plot_area: plot_area,
            plot_length: plot_length,
            plot_breadth: plot_breadth,
            price: price,
            booking_amount: booking_amount,
            furnished_status: furnished_status,
            possession_status: possession_status,
            available_from: available_from,
            age: age,
            monthly_maintenance_charge: monthly_maintenance_charge,
            _token: $("#token").val(),
        },
        beforeSend: function () {
            $("#btn-submit").html("Please Wait...");
            // $("#btn-submit").attr("disabled", true);
            // $("#prev_step1").attr("disabled", true);
        },
        success: function (data) {
            if ((data = "suceess")) {
                stepper.next();
                $("#prev_step2").attr("disabled", true);
            }
        },
    });
}
