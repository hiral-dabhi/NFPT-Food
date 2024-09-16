"use strict";
var config = function () {

    var editProfile = function () {
        $('.config-profile-form').validate({
            rules: {
                first_name: "required",
                company_name: "required",
                address: "required",
                city: "required",
                email: {
                    required: true,
                    email: true,
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                domain_name: "required",
                language: "required",
                currency: "required",
                session_timeout: "required",
                mandatory_kyc_documents: "required",
                language_code: "required",
                currency_code: "required",
                session_timeout_misc_id: "required",
                'kyc_verification_docs_misc_id[]': "required",
                is_user_with_kyc_docs: "required",
                is_kyc_alert: "required",
            },
            messages: {
                first_name: "Please enter First Name",
                company_name: "Please enter Company Name",
                description: "Please enter Description",
                address: "Please enter Address",
                city: "Please enter City",
                email: {
                    required: "Please enter Email",
                    email: "Please enter a valid Email",
                },
                contact: {
                    required: "Please enter Contact",
                    number: "Please enter a valid Contact",
                    minlength: "Contact requires 10 digits",
                    maxlength: "Contact requires 10 digits",
                },
                domain_name: "Please enter Domain Name",
                language: "Please select Language",
                currency: "Please select Currency",
                session_timeout: "Please select Session Timeout",
                mandatory_kyc_documents: "Please select at least one KYC Document",
                language_code: "Please select at least one Language",
                currency_code: "Please select at least one Option",
                session_timeout_misc_id: "Please select at least one Option",
                'kyc_verification_docs_misc_id[]': "Please select at least one KYC Document",
                is_user_with_kyc_docs: "Please select at least one Option",
                is_kyc_alert: "Please select at least one Option",

            }
        });
    };

    var editInvoice = function () {
        $('.edit-invoice-form').validate({
            rules: {
                tax1_config_status: "required",
                tax1_name: "required",
                tax1_per: {
                    required: true,
                    number: true,
                },
                tax2_config_status: "required",
                tax2_name: "required",
                tax2_per: {
                    required: true,
                    number: true,
                },
                tax_no_label: {
                    required: true,
                },
                rollback_hour: {
                    required: true,
                    number: true,
                },
                due_days: {
                    required: true,
                    number: true,
                },
                tax_invoice_prefix: "required",
                no_tax_invoice_prefix: "required",
                invoice_size: "required",
                invoice_color: "required",
            }
        });
    };

    var initMultiSelect = function () {
        $('.multi-select').select2({
            placeholder: '---Select---',
            allowClear: true,
            tags: false,
        });
    };

    var paymentGateway = function () {

        var val = $('#payment_gateway_type').val();
        $('#payment_gateway_type').val(val);
        setTimeout(function() {
            $('#payment_gateway_type').trigger('change');
        }, 1);

        $(document).on('change', '#payment_gateway_type', function() {
            const value = $(this).val();
        
            const elements = ['#payuMoney', '#ccAvenue', '#paytm', '#instaMojo', '#razorPay'];
            elements.forEach(element => {
                $(element).attr('hidden', true);
            });
        
            if (value == 'payumoney') {
                $('#payuMoney').removeAttr('hidden');
            } else if (value == 'ccavenue') {
                $('#ccAvenue').removeAttr('hidden');
            } else if (value == 'paytm') {
                $('#paytm').removeAttr('hidden');
            } else if (value == 'instamojo') {
                $('#instaMojo').removeAttr('hidden');
            } else if (value == 'razorpay') {
                $('#razorPay').removeAttr('hidden');
            }
        });

    };
    var editPaymentGateway = function () {
        $('#config-paymentGateway-edit').validate({
            rules: {
                payment_gateway_type: "required",
                status_payuMoney: "required",
                status_ccavenue: "required",
                status_paytm: "required",
                status_instamojo: "required",
                status_razorpay: "required",
                key_id: "required",
                key_secret: "required",
                payment_gateway_currency: "required",
                base_url_payuMoney: "required",
                merchant_key_payumoney: "required",
                salt_payumoney: "required",
                service_provider_payuMoney: "required",
                base_url_ccavenue: "required",
                merchant_id_ccavenue: "required",
                working_key_ccavenue: "required",
                access_code_ccavenue: "required",
                ccavenue_currency: "required",
                base_url_paytm: "required",
                status_url_paytm: "required",
                merchant_id_paytm: "required",
                merchant_key_paytm: "required",
                merchant_web_paytm: "required",
                industry_paytm: "required",
                base_url_instamojo: "required",
                api_key_instamojo: "required",
                auth_token_instamojo: "required",
                salt_instamojo: "required",
                key_id_razorpay: "required",
                key_secret_razorpay: "required",
                razorpay_currency: "required",
            },
            messages: {
                payment_gateway_type: "Please select Payment Getway type",
            },
        })
    };

    $('#logo').on('change', function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#logo_preview img")
                    .attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $('#home_image').on('change', function () {
        const fileForHomeLogo = this.files[0];
         if (1) {
             let renderHomeLogo = new FileReader();
             renderHomeLogo.onload = function (event) {
                 $("#home_image_preview img")
                     .attr("src", event.target.result);
             };
             renderHomeLogo.readAsDataURL(fileForHomeLogo);
         }
     });

    var editWebsite = function () {
        $('.config-website-form').validate({
            rules: {
                about_us: "required",
                terms_condition: "required",
                logo: {
                    required: function (element) {
                        var logoValue = document.getElementById("current_logo");
                        return !(logoValue && logoValue.getAttribute("src"));
                    },
                },
                home_image: {
                    required: function (element) {
                        var logoVa = document.getElementById("current_home_logo");
                        return !(logoVa && logoVa.getAttribute("src"));
                    },
                },
                android_app_link: "required",
                iphone_app_link: "required",
            },
            messages: {
                about_us: "Please enter your about us information.",
                terms_condition: "Please provide the terms and conditions.",
                logo: {
                    required: "Please upload your logo.",
                },
                home_image: {
                    required: "Please upload the home image.",
                },
                android_app_link: "Please enter the Android app link.",
                iphone_app_link: "Please enter the iPhone app link.",
            }
        });
    };

    return {
        profile: function () {
            editProfile();
            initMultiSelect();
        },
        invoice: function () {
            editInvoice();
        },
        paymentGateway: function () {
            editPaymentGateway();
            paymentGateway();
        },
        website: function () {
            editWebsite();
        },
    };
}();