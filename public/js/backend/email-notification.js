"use strict";

var emailNotification = function () {
    var initIndex = function () {
        $('#email-notification-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": 4,
                "orderable": false
            }],
            ajax: {
                url: getlist,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [
                { data: 'id', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'title', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'description', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'status', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
            ],
        });
    };
    var createEmailNotificationValidation = function () {
        $('.email-notification-create-form').validate({
            rules: {
                title: {
                    required: true
                },
                description: {
                    required: true
                },
            },
            messages: {
                title: "Please enter title",
                description: "Please enter description"
            }
        });
    };
    var editEmailNotificationValidation = function () {
        $('.email-notification-edit-form').validate({
            rules: {
                title: {
                    required: true
                },
                description: {
                    required: true
                }
            },
            messages: {
                title: "Please enter title",
                description: "Please enter description"
            }
        });
    };

    var settingValidation = function () {
        $('.email-notification-setting-form').validate({
            rules: {
                from_name: {
                    required: true
                },
                from_email: {
                    required: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                host: {
                    required: true
                },
                port: {
                    required: true,
                    number: true
                },
                protocol: {
                    required: true
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "protocol") {
                    error.insertAfter('.status-div');
                } else {
                    error.insertAfter(element);
                }
            },
        });
    };

    var sendTestMail = function () {
        $(document).on('click', '#send-test-mail', function () {
            $.ajax({
                url: sendTestMailUrl,
                type: 'GET',
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire({
                        title: response.status,
                        text: response.message,
                        icon: response.status
                    });
                },
                error: function (xhr, status, error) {
                    console.error(status, error);
                }
            });
        })
    }

    return {
        init: function () {
            initIndex();
        },
        create: function () {
            createEmailNotificationValidation();
        },
        edit: function () {
            editEmailNotificationValidation();
        },
        setting: function () {
            settingValidation();
            sendTestMail();
        },
    };
}();