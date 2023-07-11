/* Room Details Validation */

$(document).ready(function () {

    /* Room Type Validation */
    let roomTypeError = false;

    function validateRoomType() {
        var privateRoom = $(".privateRoom:checked").val();
        var doubleSharing = $(".doubleSharing:checked").val();
        var tripleSharing = $(".tripleSharing:checked").val();
        var threePlusSharing = $(".threePlusSharing:checked").val();
        if (
            privateRoom == null ||
            privateRoom == "" ||
            !$("#privateRoom").is(":checked")
        ) {
            $("#room_type_error").html("");
            roomTypeError = false;
        } else if (
            doubleSharing == null ||
            doubleSharing == "" ||
            !$("#doubleSharing").is(":checked")
        ) {
            $("#room_type_error").html("");
            roomTypeError = false;
        } else if (
            tripleSharing == null ||
            tripleSharing == "" ||
            !$("#tripleSharing").is(":checked")
        ) {
            $("#room_type_error").html("");
            roomTypeError = false;
        } else if (
            threePlusSharing == null ||
            threePlusSharing == "" ||
            !$("#threePlusSharing").is(":checked")
        ) {
            $("#room_type_error").html("");
            roomTypeError = false;
        } else {
            $("#room_type_error").html("* Please Select One Option");
            roomTypeError = true;
            // stepper.previous();
            return false;
        }
    }

    /* City Validation */
    // let cityError = false;
    // $("#city_dropdown").on("change", function () {
    //     validateCity();
    // });
    // function validateCity() {
    //     var city = $("#city_dropdown").val();
    //     if (city == null) {
    //         $("#city_error").html("* Please Select City");
    //         cityError = true;
    //         stepper.previous();
    //         return false;
    //     } else {
    //         $("#city_error").html("");
    //         cityError = false;
    //     }
    // }

    /* Taluka Validation */
    // let talukaError = false;
    // $("#taluka_dropdown").on("change", function () {
    //     validateTaluka();
    // });
    // function validateTaluka() {
    //     var taluka = $("#taluka_dropdown").val();
    //     if (taluka == null) {
    //         $("#taluka_error").html("* Please Select Taluko");
    //         talukaError = true;
    //         stepper.previous();
    //         return false;
    //     } else {
    //         $("#taluka_error").html("");
    //         talukaError = false;
    //     }
    // }


    
    
    

    // PG meals_available 
    // let mealsavailableError = false;
    // $("#meals_available").on("change", function () {
    //     validateAvailableMeal();
    // });
    // function validateAvailableMeal() {
    //     var available = $("#meals_available").val();
    //     if (available == null) {
    //         $("#meal_error").html("* Please Select PG Meals Available ");
    //         mealsavailableError = true;
    //         stepper.previous();
    //         return false;
    //     } else {
    //         $("#meal_error").html("");
    //         mealsavailableError = false;
    //     }
    // }


    $("#addNewRoomType").click(function (e) {
        e.preventDefault();


        validateRoomType();


        if (

            roomTypeError == false
        ) {
            insertRoomDetails();
        } else {
            return false;
        }
    });
});

function insertRoomDetails() {

    alert('Hola');
    return false;

    // var state_id = $("#state_id").val();
    // var city_dropdown = $("#city_dropdown").val();
    // var taluka_dropdown = $("#taluka_dropdown").val();
    // var locality = $("#locality").val();
    // var address = $("#address").val();
    // var pg_name = $("#pg_name").val();
    // var total_beds = $("#total_beds:selected").val();
    // var pg_for = $("#pg_for_dropdown").val();
    // var suitable_for = $("#best_suitable_for_dropdown").val();
    // var meals_available = $("#meals_available").val();
    // var meals_offering = $("#meals_offering").val();
    // var meals_speciality = $("#meals_speciality_dropdown").val();
    // var notice_period = $("#notice_period").val();
    // var lock_in_period = $("#lock_in_period").val();
    // var common_areas = $("#common_areas").val();
    // var non_veg_allowed = $("#non_veg_allowed").val();
    // var opposite_sex_allowed = $("#opposite_sex_allowed").val();
    // var any_time_allowed = $("#any_time_allowed").val();
    // var visitors_allowed = $("#visitors_allowed").val();
    // var guardian_allowed = $("#guardian_allowed").val();
    // var drinking_allowed = $("#drinking_allowed").val();
    // var smoking_allowed = $("#smoking_allowed").val();
    // var onetime_move_in_charges = $("#onetime_move_in_charges").val();
    // var meal_charges_per_month = $("#meal_charges_per_month").val();
    // var electricity_charges_per_month = $("#electricity_charges_per_month").val();
    // var additional_information = $("#additional_information").val();

    // var url = $("#pgpropertyForm").attr("action");

    // $.ajax({
    //     type: "POST",
    //     url: url,
    //     data: {
    //         state_id: state_id,
    //         city_id: city_dropdown,
    //         taluka_id: taluka_dropdown,
    //         locality: locality,
    //         address: address,
    //         pg_name: pg_name,
    //         total_beds: total_beds,
    //         pg_for: pg_for,
    //         best_suited_for: suitable_for,
    //         meals_available: meals_available,
    //         meals_offering: meals_offering,
    //         meals_speciality: meals_speciality,
    //         notice_period: notice_period,
    //         lock_in_period: lock_in_period,
    //         common_areas: common_areas,
    //         non_veg_allowed: non_veg_allowed,
    //         opposite_sex_allowed: opposite_sex_allowed,
    //         any_time_allowed: any_time_allowed,
    //         visitors_allowed: visitors_allowed,
    //         guardian_allowed: guardian_allowed,
    //         drinking_allowed: drinking_allowed,
    //         smoking_allowed: smoking_allowed,
    //         onetime_move_in_charges: onetime_move_in_charges,
    //         meal_charges_per_month: meal_charges_per_month,
    //         electricity_charges_per_month: electricity_charges_per_month,
    //         additional_information: additional_information,
    //         _token: $("#token").val(),
    //     },
    //     beforeSend: function () {
    //         $("#btn-submit").html("Please Wait...");
    //     },
    //     success: function (data) {
    //         if ((data = "suceess")) {
    //             stepper.next();
    //         }
    //     },
    // });
}