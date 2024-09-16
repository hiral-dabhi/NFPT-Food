"use strict";

var profile = function () {
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
                    email: true
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

    var bankValidation = function () {
        $('#bank-detail-form').validate({
            rules: {
                account_number: {
                    required: true,
                },
                account_holder_name: {
                    required: true,
                },
                bank_name: {
                    required: true,
                },
                bank_address: {
                    required: true,
                },
                branch_number: {
                    required: true,
                },
                institute_number: {
                    required: true,
                },
                routing_number: {
                    required: true,
                },
                swift_bic_code: {
                    required: true,
                },
            },
            messages: {
                account_number: {
                    required: "Please enter Account Number",
                },
                account_holder_name: {
                    required: "Please enter Account Holder Name",
                },
                bank_name: {
                    required: "Please enter Bank Name",
                },
                bank_address: {
                    required: "Please enter Bank Address",
                },
                branch_number: {
                    required: "Please enter Branch Number",
                },
                institute_number: {
                    required: "Please enter Institute number",
                },
                routing_number: {
                    required: "Please enter Routing Number",
                },
                swift_bic_code: {
                    required: "Please enter Swift / BIC Code.",
                },
            }
        });
    };
    var documentValidation = function () {
        $('#document-form').validate({
            rules: {
                document_name: {
                    required: true,
                },
                document_file: {
                    required: {
                        depends: function (element) {
                            return $("#old_file").val() === "";
                        },
                    },
                },
            },
            messages: {
                document_name: {
                    required: "Please enter Account Number",
                },
                document_file: {
                    required: "Please Select File",
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
        },
        bankDetail: function () {
            bankValidation();
        },
        document: function () {
            documentValidation();
        }
    };
}();