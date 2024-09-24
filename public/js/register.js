"use strict";

$(function () {
    $('.register-form').submit(function (e) {
        if (grecaptcha.getResponse() === "") {
            e.preventDefault(); // Prevent form submission
            $('#captcha-error').show(); // Show the error message
        } else {
            $('#captcha-error').hide(); // Hide the error message
        }
    });
    $(".register-form").validate({
        rules: {
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            restaurant_email: {
                required: true,
                email: true
            },
            role_id: {
                required: true
            },
            contact: {
                required: true
            },
            country_id: {
                required: true
            },
            restaurant_name: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            address: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            city: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            zip_code: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            restaurant_contact: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            password: {
                required: true,
                minlength: 8,
                pwcheck: true
            },
            confirmed: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            firstname: {
                required: "Please enter First Name",
            },
            lastname: {
                required: "Please enter Last Name",
            },
         
            email: {
                required: "Please select Email",
                email: "Please enter valid email"
            },
            restaurant_email: {
                required: "Please select Email",
                email: "Please enter valid email"
            },
            role_id: "Please select Role",
            password: {
                required: "Please enter a password.",
                minlength: "Your password must be at least 8 characters long.",
                pwcheck: "Your password must contain at least one uppercase letter, one lowercase letter, one number, and one special character."
            },
            confirmed: {
                required: "Please confirm password",
                equalTo: "Password does not matched",
            },
        },
    });

    $(document).on('change', '#role_id', function () {
        var value = $(this).val();
        if (value == 'RestaurantUser') {
            $('.restaurant-user-div').removeClass('hidden');
        } else {
            $('.restaurant-user-div').addClass('hidden');

        }
    });
    $.validator.addMethod("pwcheck", function (value, element) {
        return this.optional(element) ||
            /[A-Z]/.test(value) &&
            /[a-z]/.test(value) &&
            /\d/.test(value) &&
            /[\W]/.test(value);
    });
});