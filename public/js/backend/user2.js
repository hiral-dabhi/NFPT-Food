"use strict";
var user = (function () {
    var scheduleInit = function () {
        $(".schedule-status").on("click", function () {
            var status = $(this).data("status");
            $(".schedule-status").removeClass("active");
            $(this).addClass("active");
            userScheduleTable(status);
        });
        var scheduleTable = null;
        userScheduleTable("0");

        function userScheduleTable(status) {
            if ($.fn.DataTable.isDataTable("#user-schedule-table")) {
                $("#user-schedule-table").DataTable().destroy();
            }
            var scheduleTable = $("#user-schedule-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[0, "desc"]],
                columnDefs: [
                    {
                        targets: "_all",
                        createdCell: function (
                            td,
                            cellData,
                            rowData,
                            row,
                            col
                        ) {
                            $(td).addClass(
                                "ml-5 p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600"
                            );
                        },
                    },
                ],
                ajax: {
                    url: getSchedulelist,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        user_id: userId,
                        status: status,
                    },
                },
                columns: [
                    { data: "id" },
                    { data: "service" },
                    { data: "schedule_date" },
                    { data: "discount" },
                    { data: "other_charges" },
                    { data: "paid" },
                    { data: "comment" },
                    { data: "created_date" },
                    { data: "actions" },
                ],
                createdRow: function (row, data, dataIndex) {
                    $("td:eq(0)", row).addClass(
                        "p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600"
                    );
                    $("td:last", row).addClass(
                        "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600"
                    );
                },
            });
        }
    };
    var addMethod = function () {
        jQuery.validator.addMethod(
            "noSpace",
            function (value, element) {
                return value.indexOf(" ") < 0 && value != "";
            },
            "Please enter valid username. Space not allowed"
        );

        $.validator.addMethod(
            "extension",
            function (value, element) {
                return (
                    this.optional(element) ||
                    /\.(jpg|jpeg|png|pdf)$/i.test(value)
                );
            },
            "Please upload a valid file with jpg, jpeg, png or pdf extension"
        );
        $.validator.addMethod(
            "macAddress",
            function (value, element) {
                var macAddressRegex =
                    /^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/;
                return macAddressRegex.test(value);
            },
            "Please enter a valid MAC address, Ex. XX:XX:XX:XX:XX:XX"
        );

        $.validator.addMethod(
            "editExtension",
            function (value, element) {
                return /\.(jpg|jpeg|png|pdf)$/i.test(value);
            },
            "Please upload a valid file with jpg, jpeg, png, or pdf extension"
        );

        $.validator.addMethod(
            "dateValidation",
            function (value, element) {
                var selectedDate = value;
                var selectedDateObject = new Date(selectedDate);
                var currentDate = new Date();
                return selectedDateObject > currentDate;
            },
            "Selected date must be greater than the current date."
        );
    };
    var createUserValidation = function () {
        requiredDocs = JSON.parse(requiredDocs);
        extDocs = JSON.parse(extDocs);

        var validationRules = {
            name: {
                required: true,
            },
            mobile_no: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 10,
            },
            phone_no: {
                number: true,
                minlength: 10,
                maxlength: 10,
            },
            email: {
                email: true,
            },

            portal_login: {
                noSpace: true,
                required: {
                    depends: function (element) {
                        return !$(".same-as-above").is(":checked");
                    },
                },
            },
            portal_password: {
                required: {
                    depends: function (element) {
                        return !$(".same-as-above").is(":checked");
                    },
                },
            },
            username: {
                noSpace: true,
                required: true,
            },
            password: {
                noSpace: true,
                required: true,
            },
            operator: {
                required: true,
            },
            mac_address: {
                macAddress: {
                    depends: function (element) {
                        // Check if the mac_address field has a value
                        return $(element).val().trim() !== "";
                    },
                },
            },
            status: {
                required: true,
            },
        };
        extDocs.forEach(function (field, index) {
            var validationRule = {};
            if (requiredDocs.includes(field)) {
                validationRule = {
                    required: true,
                    extension: true,
                };
            } else {
                validationRule = {
                    extension: true,
                };
            }
            validationRules[field] = validationRule;
        });

        $(".user-create-form").validate({
            rules: validationRules,
            messages: {
                name: {
                    required: "Please enter name",
                },
                mobile_no: {
                    required: "Please enter mobile no",
                    number: "Please enter valid mobile no",
                    minlength: "Mobile no requires 10 digits",
                    maxlength: "Mobile no requires 10 digits",
                },
                phone_no: {
                    number: "Please enter valid phone no",
                    minlength: "Phone no requires 10 digits",
                    maxlength: "Phone no requires 10 digits",
                },
                email: {
                    email: "Please enter valid email",
                },

                user_type: {
                    required: "Please select user type",
                },
                portal_login: {
                    required: "Please enter portal login",
                },
                portal_password: {
                    required: "Please enter portal password",
                },
                password: {
                    required: "Please enter password",
                },
                operator: {
                    required: "Please select operator",
                },
                status: {
                    required: "Please select status",
                },
                id_proof: {
                    required: "Please select file ID Proof",
                },
                address_proof: {
                    required: "Please select file Address Proof",
                },
                passport_photo: {
                    required: "Please select file Passport Photo",
                },
                username: {
                    required: "Please enter User name",
                },
                mac_address: {
                    required: "Please enter MAC Address",
                },
            },
        });
    };

    var editUserValidation = function () {
        $(".user-edit-form").validate({
            rules: {
                name: {
                    required: true,
                },
                mobile_no: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                phone_no: {
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                email: {
                    email: true,
                },

                operator: {
                    required: true,
                },

                status: {
                    required: true,
                },
                // password: {
                //     required: {
                //         depends: function (element) {
                //             return $(".ckb-password").is(":checked");
                //         },
                //     },
                // },
                portal_password: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-portal-password").is(":checked");
                        },
                    },
                },
            },
            messages: {
                name: {
                    required: "Please enter name",
                },
                mobile_no: {
                    required: "Please enter mobile no",
                    number: "Please enter valid mobile no",
                    minlength: "Mobile no requires 10 digits",
                    maxlength: "Mobile no requires 10 digits",
                },
                phone_no: {
                    number: "Please enter valid phone no",
                    minlength: "Phone no requires 10 digits",
                    maxlength: "Phone no requires 10 digits",
                },
                email: {
                    email: "Please enter valid email",
                },
                operator: {
                    required: "Please select operator",
                },
                status: {
                    required: "Please select status",
                },
                password: {
                    required: "Please enter password",
                },
                portal_password: {
                    required: "Please enter portal password",
                },
            },
        });
    };

    var changePassword = function () {
        $(document).on("change", ".ckb-password", function () {
            if ($(this).prop("checked")) {
                $("#password").prop("disabled", false).removeClass("disabled");
            } else {
                $("#password").val("");
                $("#password").prop("disabled", true).addClass("disabled");
            }
        });
        $(document).on("change", ".ckb-portal-password", function () {
            if ($(this).prop("checked")) {
                $("#portal_password")
                    .prop("disabled", false)
                    .removeClass("disabled");
            } else {
                $("#portal_password").val("");
                $("#portal_password")
                    .prop("disabled", true)
                    .addClass("disabled");
            }
        });
    };

    var documentValidation = function () {
        $(".upload-doc").on("click", function () {
            var formClass = $(this).attr("data-class");
            var select_type = $(this).attr("data-name");
            var $form = $(".doc-" + formClass);
            $form.validate({
                rules: {
                    document_file: {
                        required: true,
                        editExtension: true,
                    },
                    [select_type]: {
                        required: true,
                    },
                },
                messages: {
                    document_file: {
                        required: "Please select a file",
                        editExtension:
                            "Please upload a valid file (png, jpg, jpeg, pdf)",
                    },
                },
            });
            if ($form.valid()) {
                $(".doc-" + formClass).submit();
            }
        });
    };

    var settingValidation = function () {
        $(".user-setting").validate({
            rules: {
                billing_type: {
                    required: true,
                },
                service_group: {
                    required: true,
                },
            },
            messages: {
                billing_type: {
                    required: "Please select Billing type",
                },
                service_group: {
                    required: "Please select User group",
                },
            },
        });
    };
    var serviceValidation = function () {
        $(".user-service").validate({
            rules: {
                service_id: {
                    required: true,
                },
                "nas_id[]": {
                    required: true,
                },
                concurrent_user: {
                    required: true,
                },
                ipv4_mode: {
                    required: true,
                },
                cpe_mac_address: {
                    macAddress: true,
                },
                ipv6_pool: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                },
                ipv6_prefix: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                },
                ipv6_pool_delegation: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                },
                ipv6_prefix_delegation: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                },
                ipv6_expirydate: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    dateValidation: true,
                },
                ipv6_expirydate_delegation: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    dateValidation: true,
                },
                ipv4_static_pool: {
                    required: {
                        depends: function (element) {
                            return $("#ipv4_mode").val() === "1";
                        },
                    },
                },
                ipv4_static_ip: {
                    required: {
                        depends: function (element) {
                            return $("#ipv4_mode").val() === "1";
                        },
                    },
                },
                ipv4_expirydate: {
                    required: {
                        depends: function (element) {
                            return $("#ipv4_mode").val() === "1";
                        },
                    },
                    dateValidation: true,
                },
                ipv4_dhcp_pool: {
                    required: {
                        depends: function (element) {
                            return $("#ipv4_mode").val() === "2";
                        },
                    },
                },
                data_limit: {
                    required: {
                        depends: function (element) {
                            return !$("#enable_billing").is(":checked");
                        },
                    },
                },
                expiration_date: {
                    required: {
                        depends: function (element) {
                            return !$("#enable_billing").is(":checked");
                        },
                    },
                    dateValidation: true,
                },
            },
            messages: {
                service_id: {
                    required: "Please select Service",
                },
                "nas_id[]": {
                    required: "Please select NAS",
                },
                concurrent_user: {
                    required: "Please enter Concurrent User",
                },
                ipv4_mode: {
                    required: "Please select IPv4 Mode",
                },
                ipv6_pool: {
                    required: "Please select IPv6 Pool",
                },
                ipv6_prefix: {
                    required: "Please select IPv6 prefix",
                },
                ipv6_pool_delegation: {
                    required: "Please select IPv6 Pool Delegation",
                },
                ipv6_prefix_delegation: {
                    required: "Please select IPv6 Prefix Delegation",
                },
                ipv6_expirydate: {
                    required: "Please select IPv6 Expiry Date",
                },
                ipv6_expirydate_delegation: {
                    required: "Please select IPv6 Expiry Date Delegation",
                },
                ipv4_static_pool: {
                    required: "Please select IPv4 Static pool",
                },
                ipv4_static_ip: {
                    required: "Please select IPv4 Static IP Address",
                },
                ipv4_expirydate: {
                    required: "Please select IPv4 Expiry Date",
                },
                ipv4_dhcp_pool: {
                    required: "Please select IPv4 DHCP pool",
                },
                data_limit: {
                    required: "Please enter Data Limit",
                },
                expiration_date: {
                    required: "Please select Expiration Date",
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("id") == "nas_id") {
                    error.appendTo(".nas-error-div");
                } else if (element.attr("name") == "cpe_mac_address") {
                    error.appendTo(".mac-address-error");
                } else {
                    error.insertAfter(element);
                }
            },
        });
    };

    var initMultiSelect = function () {
        $(".multi-select").select2({
            placeholder: "---Select NAS---",
            closeOnSelect: false,
            allowClear: true,
            tags: false,
            width: "100%",
            minimumResultsForSearch: -1,
        });
        $("#select_btn").on("click", function () {
            if ($(this).hasClass("select-all")) {
                if ($(".multi-select").find("option").length !== 0) {
                    $(".multi-select")
                        .find("option")
                        .prop("selected", true)
                        .trigger("change");
                    $(this).toggleClass("select-all unselect-all");
                    $(this).text("Unselect All");
                }
            } else {
                $(".multi-select")
                    .find("option")
                    .prop("selected", false)
                    .trigger("change");
                $(this).toggleClass("select-all unselect-all");
                $(this).text("Select All");
            }
        });
    };
    var userType = function () {
        $(document).on("change", ".same-as-above", function () {
            if ($(this).prop("checked")) {
                $(".portal-div").addClass("hidden");
            } else {
                $(".portal-div").removeClass("hidden");
            }
        });
    };
    var enableIP = function () {
        $(document).on("change", ".ckb-prefix-enable", function () {
            if ($(this).is(":checked")) {
                $(".ipv6-prefix-div").removeClass("hidden");
            } else {
                $(".ipv6-prefix-div").addClass("hidden");
            }
        });
        $(document).on("change", ".ckb-prefix-delegation-enable", function () {
            if ($(this).is(":checked")) {
                $(".ipv6-prefix-delegation-div").removeClass("hidden");
            } else {
                $(".ipv6-prefix-delegation-div").addClass("hidden");
            }
        });
        $('[name="ipv4_mode"]').on("click", function () {
            var clickedValue = $(this).val();
            if (clickedValue == "1") {
                $(".ipv4-static-div").removeClass("hidden");
                $(".ipv4-dhcp-div").addClass("hidden");
            } else if (clickedValue == "2") {
                $(".ipv4-static-div").addClass("hidden");
                $(".ipv4-dhcp-div").removeClass("hidden");
            } else {
                $(".ipv4-static-div, .ipv4-dhcp-div").addClass("hidden");
            }
        });
        $('[name="enable_billing"]').on("click", function () {
            if ($(this).is(":checked")) {
                $(".billing-enable-div").addClass("hidden");
            } else {
                $(".billing-enable-div").removeClass("hidden");
            }
        });
    };
    var burstModeEnable = function () {
        $(document).on("change", ".ckb-burst-enable", function () {
            if ($(this).is(":checked")) {
                $(".burst-fields-div").removeClass("hidden");
            } else {
                $(".burst-fields-div").addClass("hidden");
            }
        });
    };
    var serviceBandwidthValidation = function () {
        $(".form-override-bandwidth").validate({
            rules: {
                down_rate: {
                    required: true,
                    min: 1,
                },
                up_rate: {
                    required: true,
                    min: 1,
                },
                burst_limit: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    min: 1,
                },
                from_burst_limit: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    min: 1,
                },
                threshold_limit: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    min: 1,
                },
                from_threshold_limit: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    min: 1,
                },
                burst_time: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    min: 1,
                },
                from_burst_time: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                    min: 1,
                },
                priority: {
                    required: {
                        depends: function (element) {
                            return $(".ckb-burst-enable").is(":checked");
                        },
                    },
                },
            },
            messages: {
                down_rate: {
                    min: "Please enter Down Data Rate",
                    required: "Please enter Down Data Rate",
                },
                up_rate: {
                    min: "Please enter Up Data Rate",
                    required: "Please enter Up data rate",
                },
                burst_limit: {
                    required: "Please enter Down burst Limit",
                    min: "Please enter Down burst Limit",
                },
                from_burst_limit: {
                    required: "Please enter Up burst Limit",
                    min: "Please enter Up burst Limit",
                },
                threshold_limit: {
                    required: "Please enter Down threshold limit",
                    min: "Please enter Down threshold limit",
                },
                from_threshold_limit: {
                    required: "Please enter Up threshold limit",
                    min: "Please enter Up threshold limit",
                },
                burst_time: {
                    required: "Please enter Down burst time",
                    min: "Please enter Down burst time",
                },
                from_burst_time: {
                    required: "Please enter Up burst time",
                    min: "Please enter Up burst time",
                },
                priority: {
                    required: "Please enter priority",
                },
            },
        });
    };
    var addScheduleValidation = function () {
        $(".add-schedule").validate({
            rules: {
                service_id: {
                    required: true,
                },
                schedule_date: {
                    required: true,
                    date: true,
                    dateValidation: true,
                },
            },
            messages: {
                service_id: {
                    required: "Please select service",
                },
                schedule_date: {
                    required: "Please enter Schedule date",
                    date: "Please enter valid date",
                },
            },
        });
    };
    var depositValidation = function () {
        $(".add-deposit").validate({
            rules: {
                amount: {
                    required: true,
                    min: 1,
                },
                comment: {
                    required: false,
                },
            },
            messages: {
                amount: {
                    required: "Please enter amount",
                    min: "Please enter valid amount",
                },
                comment: {
                    required: "Please enter Comment",
                },
            },
        });
    };
    var creditValidation = function () {
        $(document).on("change", 'input[name="is_paid"]', function () {
            if ($(this).val() === "1") {
                $(".payment_mode").removeClass("hidden");
            } else {
                $(".payment_mode").addClass("hidden");
            }
        });

        $(".add-credit").validate({
            rules: {
                manual_unit_price: {
                    min: {
                        depends: function (element) {
                            return $(".ckb-manual_unit_enable").is(":checked");
                        },
                    },
                },
                quantity: {
                    required: false,
                    min: 1,
                },
                payment_mode: {
                    required: {
                        depends: function (element) {
                            return (
                                $('input[name="is_paid"]:checked').val() === "1"
                            );
                        },
                    },
                },
            },
            messages: {
                manual_unit_price: {
                    required: "Please enter amount",
                    min: "Please enter valid Price",
                },
                quantity: {
                    required: "Please enter Comment",
                    min: "Please enter valid Quantity",
                },
                payment_mode: {
                    required: "Please select Payment Mode",
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("id") == "manual_unit_price") {
                    error.appendTo(".manual_unit_price_error");
                } else if (element.attr("name") == "quantity") {
                    error.appendTo(".quantity_error");
                } else {
                    error.insertAfter(element);
                }
            },
        });

        $(document).on("change", ".ckb-manual_unit_enable", function () {
            var $manualUnitPrice = $("#manual_unit_price");
            if ($(this).prop("checked")) {
                $manualUnitPrice
                    .prop("disabled", false)
                    .removeClass("disabled");
            } else {
                $manualUnitPrice
                    .val("0")
                    .prop("disabled", true)
                    .addClass("disabled");
                var quantity = $("#quantity").val();
                if (quantity != "0") {
                    var sub_total = servicePrice * quantity;
                    $("#sub_total").val(sub_total);
                } else {
                    $("#sub_total").val(servicePrice);
                }
                getGrandTotalGST();
            }
        });
        $(document).on("keyup", "#manual_unit_price,#quantity", function () {
            if ($(this).attr("id") == "manual_unit_price") {
                var quantity = $("#quantity").val();
                if (quantity != "0") {
                    var sub_total = $(this).val() * quantity;
                    $("#sub_total").val(sub_total);
                }
            } else {
                var manual_unit_price = $("#manual_unit_price").val();
                if (manual_unit_price != 0) {
                    var sub_total = $(this).val() * manual_unit_price;
                    $("#sub_total").val(sub_total);
                } else {
                    var sub_total = servicePrice * $(this).val();
                    $("#sub_total").val(sub_total);
                }
            }
            getGrandTotalGST();
        });
        getGrandTotalGST();
        function getGrandTotalGST() {
            var subAmount = parseFloat($("#sub_total").val());
            var gstPercentage = parseFloat(totalTax);
            if (isNaN(subAmount) || isNaN(gstPercentage)) {
                return;
            }
            var gstRate = gstPercentage / 100;
            var gstAmount = subAmount * gstRate;
            var finalTotal = subAmount + gstAmount;
            $("#grand_total").val(finalTotal.toFixed(2));
        }
    };
    var getIPv4Addresses = function () {
        getIp(ipv4PoolId);
        function getIp(id) {
            $.ajax({
                url: getIp4s,
                type: "POST",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: id,
                    userId: userId,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    var selectElement = $("#ipv4_static_ip");
                    selectElement.empty();
                    selectElement.append(
                        '<option value="">Select Static IP</option>'
                    );
                    $.each(response["result"], function (index, value) {
                        var option = $("<option>", {
                            value: index,
                            text: value,
                        });
                        if (index == ipv4staticIp) {
                            option.prop("selected", true);
                        }
                        selectElement.append(option);
                    });
                },
                error: function (error) {},
            });
        }
        $(document).on("change", "#ipv4_static_pool", function () {
            getIp($(this).val());
        });
    };
    var scheduleEditValidation = function () {
        $(".update-schedule").validate({
            rules: {
                service_id: {
                    required: true,
                },
                schedule_date: {
                    required: true,
                    date: true,
                    dateValidation: true,
                },
            },
            messages: {
                service_id: {
                    required: "Please select service",
                },
                schedule_date: {
                    required: "Please enter Schedule date",
                    date: "Please enter valid date",
                },
            },
        });
    };

    var statementIndex = function () {
        var walletTable = $("#user-statement-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            ajax: {
                url: getStatementList,
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "username",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "credit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "debit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "sub_total",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_by",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "particulars",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "invoice",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
            ],
            createdRow: function (row, data, dataIndex) {
                $("td:eq(0)", row).addClass(
                    "p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600"
                );
                $("td:last", row).addClass(
                    "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600"
                );
            },
        });
        walletTable
            .buttons()
            .container()
            .appendTo("#operator-table-buttons_wrapper .col-md-6:eq(0)");

        $(".dataTables_length select").addClass("form-select form-select-sm");
    };

    var walletIndex = function () {
        var walletTable = $("#user-wallet-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            ajax: {
                url: getWalletList,
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "username",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "amount",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "debit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_by",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "particulars",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "invoice",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
            ],
            createdRow: function (row, data, dataIndex) {
                $("td:eq(0)", row).addClass(
                    "p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600"
                );
                $("td:last", row).addClass(
                    "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600"
                );
            },
        });
        walletTable
            .buttons()
            .container()
            .appendTo("#operator-table-buttons_wrapper .col-md-6:eq(0)");

        $(".dataTables_length select").addClass("form-select form-select-sm");
    };

    var statementSubsIndex = function () {
        var walletTable = $("#subs-statement-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            ajax: {
                url: getStatementList,
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "username",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "credit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "debit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_by",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "particulars",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "invoice",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
            ],
            createdRow: function (row, data, dataIndex) {
                $("td:eq(0)", row).addClass(
                    "p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600"
                );
                $("td:last", row).addClass(
                    "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600"
                );
            },
        });
        walletTable
            .buttons()
            .container()
            .appendTo("#operator-table-buttons_wrapper .col-md-6:eq(0)");

        $(".dataTables_length select").addClass("form-select form-select-sm");
    };

    var transactionSubsIndex = function () {
        var walletTable = $("#subs-transaction-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            ajax: {
                url: getTransList,
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "username",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "credit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "debit",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "status",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "txn_id",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "ord_id",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "pg_name",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "bank_name",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    orderable: false,
                },
            ],
            createdRow: function (row, data, dataIndex) {
                $("td:eq(0)", row).addClass(
                    "p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600"
                );
                $("td:last", row).addClass(
                    "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600"
                );
            },
        });
        walletTable
            .buttons()
            .container()
            .appendTo("#operator-table-buttons_wrapper .col-md-6:eq(0)");

        $(".dataTables_length select").addClass("form-select form-select-sm");
    };
    var usageSession = function () {
        var usageSessionTable = null;
        getusageSessionTable();

        function getusageSessionTable() {
            if (usageSessionTable !== null) {
                usageSessionTable.destroy();
            }

            usageSessionTable = $("#usage-session-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[0, "desc"]],
                columnDefs: [
                    {
                        targets: 0,
                        visible: false,
                    },
                ],
                ajax: {
                    url: getlist,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        userId: userId,
                    },
                },
                columns: [
                    {
                        data: "id",
                        class: "4 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control",
                    },
                    {
                        data: "username",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "download",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "upload",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "total",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "up_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "start_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "framed_ipv4",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "framed_ipv6",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "delegated_ipv6",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "mac",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },

                    {
                        data: "nas",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "protocol",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "action",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
            });
        }

        $(document).on(
            "change keyup",
            "#username, #ipAddress, #mac_address, #protocol, #nas_ip_address, #terminate_cause, #nasId",
            function () {
                getusageSessionTable();
            }
        );
    };
    var dailyUsage = function(){
        $("#daily-usage-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    targets: 0,
                    visible: false,
                },
            ],
            ajax: {
                url: getDailyUsage,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    userId: userId,
                },
            },
            columns: [
                {
                    data: "id",
                    class: "4 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control",
                },
                {
                    data: "date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "session",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "up_time",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "download",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "upload",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "total",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
            ],
            dom: '<"top"lfB>rt<"bottom"ip><"clear">',
        });

    }
    var userAuthlog = function () {
        $("#userauth-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    targets: 0,
                    visible: false,
                },
            ],
            ajax: {
                url: getUserAuthLog,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: { username: username },
            },
            columns: [
                {
                    data: "id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "username",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "reply",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "message",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "date",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
            ],
        });
    };

    return {
        create: function () {
            addMethod();
            createUserValidation();
            userType();
        },
        edit: function () {
            addMethod();
            editUserValidation();
            changePassword();
            userType();
        },
        statement: function () {
            statementIndex();
        },
        wallet: function () {
            walletIndex();
        },
        docs: function () {
            addMethod();
            documentValidation();
        },
        setting: function () {
            addMethod();
            settingValidation();
        },
        services: function () {
            getIPv4Addresses();
            addMethod();
            serviceValidation();
            initMultiSelect();
            enableIP();
            serviceBandwidthValidation();
            burstModeEnable();
            addScheduleValidation();
            depositValidation();
            creditValidation();
        },
        schedule: function () {
            scheduleInit();
        },
        scheduleEdit: function () {
            addMethod();
            scheduleEditValidation();
        },
        subsStatement: function () {
            statementSubsIndex();
        },
        subsTransaction: function () {
            transactionSubsIndex();
        },
        statistics: function () {
            usageSession();
            userAuthlog();
            dailyUsage();
        },
    };
})();
