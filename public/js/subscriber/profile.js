"use strict";

var profile = function () {
    var MACValidation = function () {
        $.validator.addMethod("macAddress", function (value, element) {
            var macAddressRegex = /^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/;
            return macAddressRegex.test(value);
        }, "Please enter a valid MAC address, Ex. XX:XX:XX:XX:XX:XX");
        $('.change-mac').validate({
            rules: {
                old_mac: {
                    required: true,
                    macAddress: true,
                },
                new_mac: {
                    required: true,
                    macAddress: true,
                },
            },
            messages: {
                old_mac: {
                    required: "Please enter Old MAC Address",
                },
                new_mac: {
                    required: "Please enter New MAC Address",
                },
            }
        });
    };
    var passwordValidation = function () {
        $('.change-password').validate({
            rules: {
                old_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#new_password",
                },
            },
            messages: {
                old_password: {
                    required: "Please enter Old Password",
                },
                new_password: {
                    required: "Please enter New Password",
                },
                confirm_password: {
                    required: "Please confirm password",
                    equalTo: "Password does not matched",
                },
            }
        });
    };
    var profileValidation = function () {
        if (isUpdate) {
            var form = document.getElementById("user_profile");
            var elements = form.elements;

            for (var i = 0; i < elements.length; i++) {
                elements[i].disabled = false;
                elements[i].classList.remove("bg-gray-50/30");
            }
        }
        console.log(isUpdate);
        $('#user_profile').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                zip_code: {
                    required: true,
                },
                state: {
                    required: true,
                },
                country: {
                    required: true,
                },
                contact_number: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter Name",
                },
                email: {
                    required: "Please enter Email",
                    email: "Please enter valid Email",
                },
                address: {
                    required: "Please enter Address",
                },
                city: {
                    required: "Please center City",
                },
                zip_code: {
                    required: "Please enter Zip Code",
                },
                state: {
                    required: "Please enter State",
                },
                country: {
                    required: "Please enter Country",
                },
                mobile_no: {
                    required: "Please enter Mobile No.",
                },
            }
        });
    };
    return {
        mac: function () {
            MACValidation();
        },
        password: function () {
            passwordValidation();
        },
        profile: function () {
            profileValidation();
        }
    };
}();