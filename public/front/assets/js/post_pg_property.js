$(document).ready(function () {

    /* Get Radio Button Values */
    // $(".form-check-input").change(function(){
    //     // bind a function to the change event
    //     if( $(this).is(":checked") ){ // check if the radio is checked
    //         var selected_value = $(this).val(); // retrieve the value
    //         if(selected_value == 'PG/Hostel'){
    //             window.location.href = '/add_pg_property_details';
    //         }
    //     }
    // });
    /* Property Status Validation */
    let propertyStatusError = false;
    // $("#property_type").on('change',function () {
    //     validatePropertyType();
    // });
    // function validatePropertyStatus() {
    //     var pstatusSale = $(".propertyStatusSale:checked").val();
    //     var pstatusRent = $(".propertyStatusRent:checked").val();
    //     var pstatusPg = $(".propertyStatusPg:checked").val();
    //     if (
    //         pstatusSale == null ||
    //         pstatusSale == "" ||
    //         !$("#propertyStatusSaleRadio").is(":checked")
    //     ) {
    //         $("#property_status_error").html("");
    //         propertyStatusError = false;
    //     } else if (
    //         pstatusRent == null ||
    //         pstatusRent == "" ||
    //         !$("#propertyStatusRentRadio").is(":checked")
    //     ) {
    //         $("#property_status_error").html("");
    //         propertyStatusError = false;
    //     } else if (
    //         pstatusPg == null ||
    //         pstatusPg == "" ||
    //         !$("#propertyStatusPgRadio").is(":checked")
    //     ) {
    //         $("#property_status_error").html("");
    //         propertyStatusError = false;
    //     } else {
    //         $("#property_status_error").html("* Please Select One Option");
    //         propertyStatusError = true;
    //         stepper.previous();
    //         return false;
    //     }
    // }

    /* Property Type Validation */
    // let propertyTypeError = false;
    // $("#property_type").on("change", function () {
    //     validatePropertyType();
    // });
    // function validatePropertyType() {
    //     var ptype = $("#property_type").val();
    //     if (ptype == null) {
    //         $("#property_type_error").html("* Please Select Property Type");
    //         propertyTypeError = true;
    //         stepper.previous();
    //         return false;
    //     } else {
    //         $("#property_type_error").html("");
    //         propertyTypeError = false;
    //     }
    // }

    /* Property Category Validation */
    // let propertyCategoryError = false;
    // $("#property_category_dropdown").on("change", function () {
    //     validatePropertyCategory();
    // });
    // function validatePropertyCategory() {
    //     var pcat = $("#property_category_dropdown").val();
    //     if (pcat == null) {
    //         $("#property_category_error").html(
    //             "* Please Select Property Category"
    //         );
    //         propertyCategoryError = true;
    //         stepper.previous();
    //         return false;
    //     } else {
    //         $("#property_category_error").html("");
    //         propertyCategoryError = false;
    //     }
    // }

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

    /* PG Property Name/Title Validation */
    let nameError = false;
    $("#pg_name").keyup(function () {
        validateName();
    });
    function validateName() {
        var name = $("#pg_name").val();
        if (name == null || name == "") {
            $("#pg_name_error").html("* Please Insert PG Name");
            nameError = true;
            return false;
        } else {
            $("#pg_name_error").html("");
            nameError = false;
        }
    }
    // PG for 
    let pgforError = false;
    $("#pg_for_dropdown").on("change", function () {
        validatePgfor();
    });
    function validatePgfor() {
        var pgfor = $("#pg_for_dropdown").val();
        if (pgfor == null) {
            $("#pg_for_error").html("* Please Select PG for");
            pgforError = true;
            stepper.previous();
            return false;
        } else {
            $("#pg_for_error").html("");
            pgforError = false;
        }
    }
    // PG Suitable for  
    let suitableError = false;
    $("#best_suitable_for_dropdown").on("change", function () {
        validateSuitable();
    });
    function validateSuitable() {
        var Suitable = $("#best_suitable_for_dropdown").val();
        if (Suitable == null) {
            $("#suitable_error").html("* Please Select PG Suitable");
            suitableError = true;
            stepper.previous();
            return false;
        } else {
            $("#suitable_error").html("");
            suitableError = false;
        }
    }

    // PG meals_available 
    let mealsavailableError = false;
    $("#meals_available").on("change", function () {
        validateAvailableMeal();
    });
    function validateAvailableMeal() {
        var available = $("#meals_available").val();
        if (available == null) {
            $("#meal_error").html("* Please Select PG Meals Available ");
            mealsavailableError = true;
            stepper.previous();
            return false;
        } else {
            $("#meal_error").html("");
            mealsavailableError = false;
        }
    }

    // PG Meals Offrering
    let mealsofferingError = false;
    $("#meals_offering").on("change", function () {
        validateMealOffering();
    });
    function validateMealOffering() {
        var Offrering = $("#meals_offering").val();
        if (Offrering == null) {
            $("#mealoffrering_error").html("* Please Select PG Meals Offrering ");
            mealsofferingError = true;
            stepper.previous();
            return false;
        } else {
            $("#mealoffrering_error").html("");
            mealsofferingError = false;
        }
    }

    // PG Notice Period
    let noticeperiodError = false;
    $("#notice_period").keyup(function () {
        validateNoticeperiod();
    });
    function validateNoticeperiod() {
        var Notice = $("#notice_period").val();
        if (Notice == null || Notice == "") {
            $("#noticeperiod_error").html("* Please Insert PG Notice Period");
            noticeperiodError = true;
            return false;
        } else {
            $("#noticeperiod_error").html("");
            noticeperiodError = false;
        }
    }


    // PG look in Period
    let lookinperiodError = false;
    $("#lock_in_period").keyup(function () {
        validateLookineperiod();
    });
    function validateLookineperiod() {
        var Look = $("#lock_in_period").val();
        if (Look == null || Look == "") {
            $("#lookinperiod_error").html("* Please Insert PG Look In Period");
            lookinperiodError = true;
            return false;
        } else {
            $("#lookinperiod_error").html("");
            lookinperiodError = false;
        }
    }

    // PG Common Areas
    let commonareasError = false;
    $("#common_areas").on("change", function () {
        validateCommonareas();
    });
    function validateCommonareas() {
        var Common = $("#common_areas").val();
        if (Common == null) {
            $("#commonareas_error").html("* Please Select PG Common Areas ");
            commonareasError = true;
            stepper.previous();
            return false;
        } else {
            $("#commonareas_error").html("");
            commonareasError = false;
        }
    }


    //Rules
    //non veg allowed
    let nonvegallowedError = false;
    $("#non_veg_allowed").on("change", function () {
        validateNonveg();
    });
    function validateNonveg() {
        var Nonveg = $("#non_veg_allowed").val();
        if (Nonveg == null) {
            $("#nonveg_error").html("* Please Select PG Non Veg Allowed ");
            nonvegallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#nonveg_error").html("");
            nonvegallowedError = false;
        }
    }
    //opposite sex allowed
    let oppositesexallowedError = false;
    $("#opposite_sex_allowed").on("change", function () {
        validateoppositesexallowed();
    });
    function validateoppositesexallowed() {
        var Opposite = $("#opposite_sex_allowed").val();
        if (Opposite == null) {
            $("#oppositesexallowed_error").html("* Please Select PG Opposite Sex Allowed ");
            oppositesexallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#oppositesexallowed_error").html("");
            oppositesexallowedError = false;
        }
    }
    //Any Time Allowed
    let anytimeallowedError = false;
    $("#any_time_allowed").on("change", function () {
        validateanytimeallowed();
    });
    function validateanytimeallowed() {
        var anytime = $("#any_time_allowed").val();
        if (anytime == null) {
            $("#anytime_error").html("* Please Select PG Any Time Allowed ");
            anytimeallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#anytime_error").html("");
            anytimeallowedError = false;
        }
    }
    //Visitors Allowed 
    let visitorsallowedError = false;
    $("#visitors_allowed").on("change", function () {
        validatevisitorsallowed();
    });
    function validatevisitorsallowed() {
        var Visitors = $("#visitors_allowed").val();
        if (Visitors == null) {
            $("#visitorsallowed_error").html("* Please Select PG Visitors Allowed ");
            visitorsallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#visitorsallowed_error").html("");
            visitorsallowedError = false;
        }
    }
    //Gardian Allowed
    let guardianallowedError = false;
    $("#guardian_allowed").on("change", function () {
        validateguardianallowed();
    });
    function validateguardianallowed() {
        var Gardian = $("#guardian_allowed").val();
        if (Gardian == null) {
            $("#Gardiansallowed_error").html("* Please Select Gardian Allowed ");
            guardianallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#Gardiansallowed_error").html("");
            guardianallowedError = false;
        }
    }
    //Drinking Allowed
    let drinkingallowedError = false;
    $("#drinking_allowed").on("change", function () {
        validatedrinkingallowed();
    });
    function validatedrinkingallowed() {
        var Drinking = $("#drinking_allowed").val();
        if (Drinking == null) {
            $("#drinkingallowed_error").html("* Please Select Drinking Allowed ");
            drinkingallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#drinkingallowed_error").html("");
            drinkingallowedError = false;
        }
    }
    //Smoking Allowed
    let smokingallowedError = false;
    $("#smoking_allowed").on("change", function () {
        validatesmokingallowed();
    });
    function validatesmokingallowed() {
        var Smoking = $("#smoking_allowed").val();
        if (Smoking == null) {
            $("#smokingallowed_error").html("* Please Select Smoking Allowed ");
            smokingallowedError = true;
            stepper.previous();
            return false;
        } else {
            $("#smokingallowed_error").html("");
            smokingallowedError = false;
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


        validateState();
        validateCity();
        validateTaluka();
        validateLocality();
        validateAddress();
        validateName();
        validatePgfor();
        validateSuitable();
        validateAvailableMeal();
        validateMealOffering();
        validateNoticeperiod();
        validateLookineperiod();
        validateCommonareas();
        validateNonveg();
        validateoppositesexallowed();
        validateanytimeallowed();
        validatevisitorsallowed();
        validateguardianallowed();
        validatedrinkingallowed();
        validatesmokingallowed();
        validateDescription();
        validatePrice();
        validatePropertyStatus();
        validateTermsAndConditions();

        if (

            stateError == false &&
            cityError == false &&
            talukaError == false &&
            propertyLocalityError == false &&
            addressError == false &&
            pgforError == false &&
            suitableError == false &&
            nameError == false &&
            mealsavailableError == false &&
            mealsofferingError == false &&
            noticeperiodError == false &&
            lookinperiodError == false &&
            commonareasError == false &&
            nonvegallowedError == false &&
            oppositesexallowedError == false &&
            anytimeallowedError == false &&
            visitorsallowedError == false &&
            guardianallowedError == false &&
            drinkingallowedError == false &&
            smokingallowedError == false &&
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
    //  var propertystatus = $(".property_status:checked").val();

    var state_id = $("#state_id").val();
    var city_dropdown = $("#city_dropdown").val();
    var taluka_dropdown = $("#taluka_dropdown").val();
    var locality = $("#locality").val();
    var address = $("#address").val();
    var pg_name = $("#pg_name").val();
    var total_beds = $("#total_beds:selected").val();
    var pg_for = $("#pg_for_dropdown").val();
    var suitable_for = $("#best_suitable_for_dropdown").val();
    var meals_available = $("#meals_available").val();
    var meals_offering = $("#meals_offering").val();
    var meals_speciality = $("#meals_speciality_dropdown").val();
    var notice_period = $("#notice_period").val();
    var lock_in_period = $("#lock_in_period").val();
    var common_areas = $("#common_areas").val();
    var non_veg_allowed = $("#non_veg_allowed").val();
    var opposite_sex_allowed = $("#opposite_sex_allowed").val();
    var any_time_allowed = $("#any_time_allowed").val();
    var visitors_allowed = $("#visitors_allowed").val();
    var guardian_allowed = $("#guardian_allowed").val();
    var drinking_allowed = $("#drinking_allowed").val();
    var smoking_allowed = $("#smoking_allowed").val();
    var onetime_move_in_charges = $("#onetime_move_in_charges").val();
    var meal_charges_per_month = $("#meal_charges_per_month").val();
    var electricity_charges_per_month = $("#electricity_charges_per_month").val();
    var additional_information = $("#additional_information").val();









    // var name_of_project = $("#name_of_project").val();
    // var no_of_flats = $(".no_of_flats:checked").val();
    // var total_floors = $("#total_floors").val();
    // var total_bedrooms = $("#total_bedrooms").val();
    // var total_balconies = $("#total_balconies").val();
    // var total_bathrooms = $("#total_bathrooms").val();
    // var descr = $("#descr").val();
    // var amenitiesArray = new Array();
    // var element = $("input[type='checkbox']");
    // $(element).each(function (i) {
    //     if ($($(element)[i]).prop("checked")) {
    //         amenitiesArray.push($('input[name="amenities[]"').val());
    //     } else {
    //         amenitiesArray = [];
    //     }
    // });

    // // Append Array to String
    // var dataString = "amenitiesArray=" + amenitiesArray;
    // var floors_allowed_for_construction = $(
    //     "#floors_allowed_for_construction"
    // ).val();
    // var no_of_open_sides = $("#no_of_open_sides").val();
    // var width_of_road_facing_plot = $("#width_of_road_facing_plot").val();
    // var any_construction = $("#any_construction").val();
    // var boundary_wall = $("#boundary_wall").val();
    // var carpet_area = $("#carpet_area").val();
    // var super_area = $("#super_area").val();
    // var plot_area = $("#plot_area").val();
    // var plot_length = $("#plot_length").val();
    // var plot_breadth = $("#plot_breadth").val();
    // var price = $("#price").val();
    // var booking_amount = $("#booking_amount").val();
    // var furnished_status = $("#furnished_status").val();
    // var possession_status = $("#possession_status").val();
    // var available_from = $("#available_from").val();
    // var age = $("#age").val();
    // var monthly_maintenance_charge = $("#monthly_maintenance_charge").val();

    var url = $("#pgpropertyForm").attr("action");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            propertystatus: propertystatus,

            state_id: state_id,
            city_dropdown: city_dropdown,
            taluka_dropdown: taluka_dropdown,
            locality: locality,
            address: address,
            pg_name: pg_name,
            total_beds: total_beds,
            pg_for: pg_for,
            suitable_for: suitable_for,
            meals_available: meals_available,
            meals_offering: meals_offering,
            meals_speciality: meals_speciality,
            notice_period: notice_period,
            lock_in_period: lock_in_period,
            common_areas: common_areas,
            non_veg_allowed: non_veg_allowed,
            opposite_sex_allowed: opposite_sex_allowed,
            any_time_allowed: any_time_allowed,
            visitors_allowed: visitors_allowed,
            guardian_allowed: guardian_allowed,
            drinking_allowed: drinking_allowed,
            smoking_allowed: smoking_allowed,
            onetime_move_in_charges: onetime_move_in_charges,
            meal_charges_per_month: meal_charges_per_month,
            electricity_charges_per_month: electricity_charges_per_month,
            additional_information: additional_information,


            // name_of_project: name_of_project,
            // no_of_flats: no_of_flats,
            // total_floors: total_floors,
            // total_bedrooms: total_bedrooms,
            // total_balconies: total_balconies,
            // total_bathrooms: total_bathrooms,
            // descr: descr,
            // amenitiesArray: amenitiesArray,
            // floors_allowed_for_construction: floors_allowed_for_construction,
            // no_of_open_sides: no_of_open_sides,
            // width_of_road_facing_plot: width_of_road_facing_plot,
            // any_construction: any_construction,
            // boundary_wall: boundary_wall,
            // carpet_area: carpet_area,
            // super_area: super_area,
            // plot_area: plot_area,
            // plot_length: plot_length,
            // plot_breadth: plot_breadth,
            // price: price,
            // booking_amount: booking_amount,
            // furnished_status: furnished_status,
            // possession_status: possession_status,
            // available_from: available_from,
            // age: age,
            // monthly_maintenance_charge: monthly_maintenance_charge,
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
