$(document).ready(function () {

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
            noticeperiodError == false &&
            lookinperiodError == false &&
            commonareasError == false &&
            nonvegallowedError == false &&
            oppositesexallowedError == false &&
            anytimeallowedError == false &&
            visitorsallowedError == false &&
            guardianallowedError == false &&
            drinkingallowedError == false &&
            smokingallowedError == false
        ) {
            insertProperty();
        } else {
            return false;
        }
    });
});

function insertProperty() {

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

    var url = $("#pgpropertyForm").attr("action");

    $.ajax({
        type: "POST",
        url: url,
        data: {
            state_id: state_id,
            city_id: city_dropdown,
            taluka_id: taluka_dropdown,
            locality: locality,
            address: address,
            pg_name: pg_name,
            total_beds: total_beds,
            pg_for: pg_for,
            best_suited_for: suitable_for,
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
            _token: $("#token").val(),
        },
        beforeSend: function () {
            $("#btn-submit").html("Please Wait...");
        },
        success: function (data) {
            if ((data = "suceess")) {
                stepper.next();
            }
        },
    });
}



/* Room Details Validation */

// $("#submitRoomDetails").on("click", function () {
//     var pr_rent = $('#pr_rent').val();
//     var ps_security_deposit = document.getElementById("ps_security_deposit").value;
//     var ps_facilities = document.querySelector('#prFacilityCheckBox:checked');
//     alert(pr_rent);
//     return false;
// });
    

    function validateRoomDetails()
    {
        /* Private Room Validation */
        var pr_rent = document.getElementById("pr_rent").value;
        var pr_security_deposit = document.getElementById("pr_security_deposit").value;
        var pr_facilities = document.querySelector('#prFacilityCheckBox:checked');
        var pr_total_beds = document.getElementById("pr_total_beds").value;

        /* Double Sharing Validation */
        var ds_rent = document.getElementById("ds_rent").value;
        var ds_security_deposit = document.getElementById("ds_security_deposit").value;
        var ds_total_beds = document.getElementById("ds_total_beds").value;
        var ds_facilities = document.querySelector('#dsFacilityCheckBox:checked');

        /* Triple Sharing Validation */
        var ts_rent = document.getElementById("ts_rent").value;
        var ts_security_deposit = document.getElementById("ts_security_deposit").value;
        var ts_facilities = document.querySelector('#tsFacilityCheckBox:checked');
        var ts_total_beds = document.getElementById("ts_total_beds").value;

        /* 3+ Sharing Validation */
        var ms_rent = document.getElementById("ms_rent").value;
        var ms_security_deposit = document.getElementById("ms_security_deposit").value;
        var ms_facilities = document.querySelector('#msFacilityCheckBox:checked');
        var ms_total_beds = document.getElementById("ms_total_beds").value;

        if ((pr_rent!== '' || pr_security_deposit!== '' || pr_facilities!== null) || (ds_rent!== '' || ds_security_deposit!== '' || ds_facilities!==null) || (ts_rent!== '' || ts_security_deposit!== '' || ts_facilities!== null) || (ms_rent!== '' || ms_security_deposit!== '' || ms_facilities!== null))
        {
            document.getElementById('common_error').innerHTML = '';
            var pg_url = $("#pgRoomDetailsForm").attr("action");
            var pr_facilities_arr = new Array();
            $.each($("input[name='pr_facilities[]']:checked"), function(){
                pr_facilities_arr.push($(this).val());
            });
            var ds_facilities_arr = new Array();
            $.each($("input[name='ds_facilities[]']:checked"), function(){
                ds_facilities_arr.push($(this).val());
            });
            var ts_facilities_arr = new Array();
            $.each($("input[name='ts_facilities[]']:checked"), function(){
                ts_facilities_arr.push($(this).val());
            });
            var ms_facilities_arr = new Array();
            $.each($("input[name='ms_facilities[]']:checked"), function(){
                ms_facilities_arr.push($(this).val());
            });
            $.ajax({
                type: "POST",
                url: pg_url,
                data: {
                    pr_rent: pr_rent,
                    pr_security_deposit: pr_security_deposit,
                    pr_facilities_arr: pr_facilities_arr,
                    pr_total_beds: pr_total_beds,
                    ds_rent: ds_rent,
                    ds_security_deposit: ds_security_deposit,
                    ds_total_beds: ds_total_beds,
                    ds_facilities_arr: ds_facilities_arr,
                    ts_rent: ts_rent,
                    ts_security_deposit: ts_security_deposit,
                    ts_total_beds: ts_total_beds,
                    ts_facilities_arr: ts_facilities_arr,
                    ms_rent: ms_rent,
                    ms_security_deposit: ms_security_deposit,
                    ms_total_beds: ms_total_beds,
                    ms_facilities_arr: ms_facilities_arr,
                    _token: $("#token").val(),
                },
                beforeSend: function () {
                    $("#submitRoomDetails").html("Please Wait...");
                },
                success: function (data) {
                    if ((data = "success")) {
                        stepper.next();
                        $("#prev_step2").attr("disabled", true);
                    }
                },
            });
            // document.getElementById("pgRoomDetailsForm").submit();
            // if(pr_rent !== '' && pr_security_deposit !== '' && pr_facilities !== null){
            //     if(pr_rent === ''){
            //         document.getElementById('pr_rent_error').innerHTML = '';
            //     }else if (pr_security_deposit === ''){
            //         document.getElementById('pr_security_deposit_error').innerHTML = '';
            //     }else if (pr_facilities === null){
            //         document.getElementById('pr_facilities_error').innerHTML = '';
            //     }else{
                    
            //     }
            // }
            
        }
        else{
            var msg = '* At Least One Room Detail is Required!';
            document.getElementById('common_error').innerHTML = msg;
        }
        
        // if(pr_rent == '' || pr_security_deposit == '' || !pr_facilities) 
        // {
        //     var msg = '* At Least One Room Detail is Required!';
        //     document.getElementById('common_error').innerHTML = msg;
        //     return false;
        // } else if(ds_rent || ds_security_deposit || ds_facilities) {
        //     document.getElementById('common_error').innerHTML = '';
        //     return false;
        // } else if(ts_rent || ts_security_deposit || ts_facilities) {
        //     document.getElementById('common_error').innerHTML = '';
        //     return false;
        // } else if(ms_rent || ms_security_deposit || ms_facilities) {
        //     document.getElementById('common_error').innerHTML = '';
        //     return false;
        // }
        // else {
        //     alert('Form Validation Successfully');
        // }
    }
    

    


function reset_msg()
{
    document.getElementById('room_type_error').innerHTML = '';
}

$("#rent").on("keyup", function () {
    $('#rent_error').html('');
});

$("#security_deposit").on("keyup", function () {
    $('#security_deposit_error').html('');
});

$("#facilityCheckBox").on("change", function () {
    $('#facilities_error').html('');
});

// $(document).ready(function () {

//     /* Room Type Validation */
//     let roomTypeError = false;

//     // function validateRoomType() {
//     //     var privateRoom = $("#privateRoom:checked").val();
//     //     var doubleSharing = $(".doubleSharing:checked").val();
//     //     var tripleSharing = $(".tripleSharing:checked").val();
//     //     var threePlusSharing = $(".threePlusSharing:checked").val();
//     //     if (
//     //         privateRoom == null ||
//     //         privateRoom == "" ||
//     //         !$("#privateRoom").is(":checked")
//     //     ) {
//     //         $("#room_type_error").html("");
//     //         roomTypeError = false;
//     //     } else if (
//     //         doubleSharing == null ||
//     //         doubleSharing == "" ||
//     //         !$("#doubleSharing").is(":checked")
//     //     ) {
//     //         $("#room_type_error").html("");
//     //         roomTypeError = false;
//     //     } else if (
//     //         tripleSharing == null ||
//     //         tripleSharing == "" ||
//     //         !$("#tripleSharing").is(":checked")
//     //     ) {
//     //         $("#room_type_error").html("");
//     //         roomTypeError = false;
//     //     } else if (
//     //         threePlusSharing == null ||
//     //         threePlusSharing == "" ||
//     //         !$("#threePlusSharing").is(":checked")
//     //     ) {
//     //         $("#room_type_error").html("");
//     //         roomTypeError = false;
//     //     } else {
//     //         $("#room_type_error").html("* Please Select One Option");
//     //         roomTypeError = true;
//     //         // stepper.previous();
//     //         return false;
//     //     }
//     // }

//     /* Rent Validation */
//     let rentError = false;
//     $("#rent").on("keyup", function () {
//         validateRent();
//     });
//     function validateRent() {
//         var rent = $("#rent").val();
//         if (rent == null) {
//             $("#rent_error").html("* This Field is required");
//             rentError = true;
//             // stepper.previous();
//             return false;
//         } else {
//             $("#rent_error").html("");
//             rentError = false;
//         }
//     }

//     /* Taluka Validation */
//     // let talukaError = false;
//     // $("#taluka_dropdown").on("change", function () {
//     //     validateTaluka();
//     // });
//     // function validateTaluka() {
//     //     var taluka = $("#taluka_dropdown").val();
//     //     if (taluka == null) {
//     //         $("#taluka_error").html("* Please Select Taluko");
//     //         talukaError = true;
//     //         stepper.previous();
//     //         return false;
//     //     } else {
//     //         $("#taluka_error").html("");
//     //         talukaError = false;
//     //     }
//     // }


    
    
    

//     // PG meals_available 
//     // let mealsavailableError = false;
//     // $("#meals_available").on("change", function () {
//     //     validateAvailableMeal();
//     // });
//     // function validateAvailableMeal() {
//     //     var available = $("#meals_available").val();
//     //     if (available == null) {
//     //         $("#meal_error").html("* Please Select PG Meals Available ");
//     //         mealsavailableError = true;
//     //         stepper.previous();
//     //         return false;
//     //     } else {
//     //         $("#meal_error").html("");
//     //         mealsavailableError = false;
//     //     }
//     // }


//     $("#addNewRoomType").click(function (e) {
//         e.preventDefault();

//         validateRent();


//         if (

//             rentError == false
//         ) {
//             insertRoomDetails();
//         } else {
//             return false;
//         }
//     });
// });

// function insertRoomDetails() {

//     alert('Validating Success');
//     return false;

//     // var state_id = $("#state_id").val();
//     // var city_dropdown = $("#city_dropdown").val();
//     // var taluka_dropdown = $("#taluka_dropdown").val();
//     // var locality = $("#locality").val();
//     // var address = $("#address").val();
//     // var pg_name = $("#pg_name").val();
//     // var total_beds = $("#total_beds:selected").val();
//     // var pg_for = $("#pg_for_dropdown").val();
//     // var suitable_for = $("#best_suitable_for_dropdown").val();
//     // var meals_available = $("#meals_available").val();
//     // var meals_offering = $("#meals_offering").val();
//     // var meals_speciality = $("#meals_speciality_dropdown").val();
//     // var notice_period = $("#notice_period").val();
//     // var lock_in_period = $("#lock_in_period").val();
//     // var common_areas = $("#common_areas").val();
//     // var non_veg_allowed = $("#non_veg_allowed").val();
//     // var opposite_sex_allowed = $("#opposite_sex_allowed").val();
//     // var any_time_allowed = $("#any_time_allowed").val();
//     // var visitors_allowed = $("#visitors_allowed").val();
//     // var guardian_allowed = $("#guardian_allowed").val();
//     // var drinking_allowed = $("#drinking_allowed").val();
//     // var smoking_allowed = $("#smoking_allowed").val();
//     // var onetime_move_in_charges = $("#onetime_move_in_charges").val();
//     // var meal_charges_per_month = $("#meal_charges_per_month").val();
//     // var electricity_charges_per_month = $("#electricity_charges_per_month").val();
//     // var additional_information = $("#additional_information").val();

//     // var url = $("#pgpropertyForm").attr("action");

//     // $.ajax({
//     //     type: "POST",
//     //     url: url,
//     //     data: {
//     //         state_id: state_id,
//     //         city_id: city_dropdown,
//     //         taluka_id: taluka_dropdown,
//     //         locality: locality,
//     //         address: address,
//     //         pg_name: pg_name,
//     //         total_beds: total_beds,
//     //         pg_for: pg_for,
//     //         best_suited_for: suitable_for,
//     //         meals_available: meals_available,
//     //         meals_offering: meals_offering,
//     //         meals_speciality: meals_speciality,
//     //         notice_period: notice_period,
//     //         lock_in_period: lock_in_period,
//     //         common_areas: common_areas,
//     //         non_veg_allowed: non_veg_allowed,
//     //         opposite_sex_allowed: opposite_sex_allowed,
//     //         any_time_allowed: any_time_allowed,
//     //         visitors_allowed: visitors_allowed,
//     //         guardian_allowed: guardian_allowed,
//     //         drinking_allowed: drinking_allowed,
//     //         smoking_allowed: smoking_allowed,
//     //         onetime_move_in_charges: onetime_move_in_charges,
//     //         meal_charges_per_month: meal_charges_per_month,
//     //         electricity_charges_per_month: electricity_charges_per_month,
//     //         additional_information: additional_information,
//     //         _token: $("#token").val(),
//     //     },
//     //     beforeSend: function () {
//     //         $("#btn-submit").html("Please Wait...");
//     //     },
//     //     success: function (data) {
//     //         if ((data = "suceess")) {
//     //             stepper.next();
//     //         }
//     //     },
//     // });
// }