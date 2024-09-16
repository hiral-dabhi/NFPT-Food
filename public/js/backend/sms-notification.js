"use strict";

var smsNotification = function () {
    var initIndex = function () {
        $('#sms-notification-table').DataTable({
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
        $('.sms-notification-create-form').validate({
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
        $('.sms-notification-edit-form').validate({
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
        $('.sms-notification-setting-form').validate({
            rules: {
                sms_api: {
                    required: true
                },
            }
        });
    };

    var sendTestSMS = function () {
        $(document).on('click', '#send-test-sms', function () {
            // var urlAPI = $('#sms_api').val();
            var urlAPI = 'abc';
            console.log(urlAPI);
            $.ajax({
                url: sendTestSMSUrl,
                type: 'POST',
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    API: urlAPI,
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
            sendTestSMS();
        },
    };
}();