/* All Property Custom Filte */

$(document).ready(function () {
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
            return false;
        } else {
            $("#property_type_error").html("");
            propertyTypeError = false;
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
            return false;
        } else {
            $("#city_error").html("");
            cityError = false;
        }
    }

    $("#btnSubmit").click(function (e) {
        e.preventDefault();

        validatePropertyType();
        validateCity();

        if (propertyTypeError == false && cityError == false) {
            document.getElementById("property_result").submit();
        } else {
            return false;
        }
    });
});

// BUY property

$(document).ready(function () {
    / Property Type Validation /;
    let propertyTypeError = false;
    $("#property_type").on("change", function () {
        validatePropertyType();
    });
    function validatePropertyType() {
        var ptype = $("#property_type").val();
        if (ptype == null) {
            $("#property_type_error").html("* Please Select Property Type");
            propertyTypeError = true;
            return false;
        } else {
            $("#property_type_error").html("");
            propertyTypeError = false;
        }
    }

    / City Validation /;
    let cityError = false;
    $("#city_dropdown").on("change", function () {
        validateCity();
    });
    function validateCity() {
        var city = $("#city_dropdown").val();
        if (city == null) {
            $("#city_error").html("* Please Select City");
            cityError = true;
            return false;
        } else {
            $("#city_error").html("");
            cityError = false;
        }
    }

    $("#buybtnSubmit").click(function (e) {
        e.preventDefault();

        validatePropertyType();
        validateCity();

        if (propertyTypeError == false && cityError == false) {
            document.getElementById("buy_property_result").submit();
        } else {
            return false;
        }
    });
});

/* Rent Property Custom Filter */

$(document).ready(function () {
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
            return false;
        } else {
            $("#property_type_error").html("");
            propertyTypeError = false;
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
            return false;
        } else {
            $("#city_error").html("");
            cityError = false;
        }
    }

    $("#rentBtnSubmit").click(function (e) {
        e.preventDefault();

        validatePropertyType();
        validateCity();

        if (propertyTypeError == false && cityError == false) {
            document.getElementById("rent_property_result").submit();
        } else {
            return false;
        }
    });
});

/* PG Property Custom Filter */

$(document).ready(function () {
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
            return false;
        } else {
            $("#property_type_error").html("");
            propertyTypeError = false;
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
            return false;
        } else {
            $("#city_error").html("");
            cityError = false;
        }
    }

    $("#pgBtnSubmit").click(function (e) {
        e.preventDefault();

        validatePropertyType();
        validateCity();

        if (propertyTypeError == false && cityError == false) {
            document.getElementById("pg_property_result").submit();
        } else {
            return false;
        }
    });
});

/* Land Property Custom Filter */

$(document).ready(function () {
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
            return false;
        } else {
            $("#property_type_error").html("");
            propertyTypeError = false;
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
            return false;
        } else {
            $("#city_error").html("");
            cityError = false;
        }
    }

    $("#landBtnSubmit").click(function (e) {
        e.preventDefault();

        validatePropertyType();
        validateCity();

        if (propertyTypeError == false && cityError == false) {
            document.getElementById("land_property_result").submit();
        } else {
            return false;
        }
    });
});
