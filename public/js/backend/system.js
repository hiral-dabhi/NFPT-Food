"use strict";

var system = (function () {
    var systemAlertList = function () {
        $("#system-alert-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    targets: 4,
                    orderable: false,
                },
            ],
            ajax: {
                url: ststemAlertList,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "type",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "priority",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "datetime",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "subject",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "actions",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
            ],
        });
    };

    var logManagementValidation = function () {
        $(".log-management-form").validate({
            rules: {
                aaa_auth_log: {
                    required: true,
                },
                app_auth_log: {
                    required: true,
                },
                app_event_log: {
                    required: true,
                },
                cts_nat_event_log: {
                    required: true,
                },
            },
            messages: {
                aaa_auth_log: {
                    required: "Please Select AAA Auth Log.",
                },
                app_auth_log: {
                    required: "Please Select APP Auth Log",
                },
                app_event_log: {
                    required: "Please Select APP Event Log",
                },
                cts_nat_event_log: {
                    required: "Please Select CTS/NAT Event Log",
                },
            },
        });
    };

    var googleConfigValidation = function () {
        $(".google-configuration-form").validate({
            rules: {
                enable_billing_drive: {
                    required: true,
                },
                client_id_drive: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                client_secret_drive: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                refresh_token_drive: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                redirect_url_drive: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                autobackup_interval_drive: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                }
            },
            messages: {
                enable_billing_drive: {
                    required: "This field is required",
                },
                client_id_drive: {
                    required: "This field is required",
                },
                client_secret_drive: {
                    required: "This field is required",
                },
                refresh_token_drive: {
                    required: "This field is required",
                },
                redirect_url_drive: {
                    required: "This field is required",
                },
                autobackup_interval_drive: {
                    required: "Please select Auto backup time",
                }
            },
        });
        $(document).on('change','#enable_billing_drive',function() {
            $('#additionalDivsDrive').toggle(this.checked);
        });
    };

    var dropboxConfigValidation = function () {
        $(document).on('change','#enable_billing_dropbox',function() {
            $('#additionalDivsDropbox').toggle(this.checked);
        });
        $(".dropbox-configuration-form").validate({
            rules: {
                enable_billing_dropbox: {
                    required: true,
                },
                app_key_dropbox: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                app_secret_dropbox: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                access_token_dropbox: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                autobackup_interval_dropbox: {
                    required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                }
            },
            messages: {
                enable_billing_dropbox: {
                    required: "This field is required",
                },
                app_key_dropbox: {
                    required: "This field is required",
                },
                app_secret_dropbox: {
                    required: "This field is required",
                },
                access_token_dropbox: {
                    required: "This field is required",
                },
                autobackup_interval_dropbox: {
                    required: "Please select Auto backup time",
                }
            },
        });
    };
    function validate() {
        var status = $('.status:checked').val();
        updateValidationMessage(status);        
        function updateValidationMessage(status) {
            if (status === '0') {
                $('.validated').text('');
            } else {
                $('.validated').text('*');
            }
        }        
        $(document).on('click', '.status', function() {
            updateValidationMessage($(this).val());
        });
    }
    var ftpConfigValidation = function () {
        $(".ftp-configuration-form").validate({
            rules: {
                enable_billing_ftp: {
                    required: true,
                },
                host_ftp: {
                     required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                user_name_ftp: {
                     required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                password_ftp: {
                     required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                },
                autobackup_interval_ftp: {
                     required: {
                        depends: function (element) {
                            return $("#status1").is(":checked")
                        },
                    },
                }
            },
            messages: {
                enable_billing_ftp: {
                    required: "This field is required",
                },
                host_ftp: {
                    required: "This field is required",
                },
                user_name_ftp: {
                    required: "This field is required",
                },
                password_ftp: {
                    required: "This field is required",
                },
                autobackup_interval_ftp: {
                    required: "Please select Auto backup time",
                }
            },
        });
    };

    return {
        systemAlertList: function () {
            systemAlertList();
        },
        logManagementValidation: function () {
            logManagementValidation();
        },
        drive:function(){
            validate();
            googleConfigValidation();
        },
        dropbox:function(){
            validate();
            dropboxConfigValidation();
        },
        ftp:function(){
            validate();
            ftpConfigValidation();
        },
    };
})();
