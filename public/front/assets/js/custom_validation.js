$('#create_an_account').click(function (){
    $('#myForm').validate({
        rules: {
            regsiter_as: {
                required: true,
            },
            contact_no: {
                required: true,
                maxlength: 10,
            },
            password: {
                required: true,
                minlength: 8
            },
            confirmed_password: {
                required: true,
                equalTo:"#password"
            },
        },
        messages: {
            register_as: {
                required: "Please Select one Option"
            },
            contact_no: {
                required: "Please enter a Contact Number",
                minlength: "Please Enter a Valid 10 Digit Mobile Number"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            confirmed_password: {
                required: "Confirm Password Required",
                equalTo: "Password Is Not Matched",
            }
            // confirmed_password: "Please accept our terms"
        },
        // errorClass: "text-danger",
        errorElement: 'small',
        errorPlacement: function (error, element) {
            var element_name = $(element).attr("name");
            error.appendTo($("#" + element_name + "_error"));
        },
        // errorElement: 'span',
        // errorPlacement: function (error, element) {
        //     // error.addClass('invalid-feedback');
        //     element.closest('#contact_check').append(error);
        //     // $('#contact_check').append(error);
        // },
    });
});
