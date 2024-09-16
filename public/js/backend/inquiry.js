"use strict";
var inquiry = function () {
    var initIndex = function () {
        $('#inquiry-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: getInquiryList,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [
                { data: 'id', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'name', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'email', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'contact', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'message', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'remote_ip', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'created_at', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
            ],
            dom: '<"top"lfB>rt<"bottom"ip><"clear">',
            buttons: [
                {
                    extend: 'copy',
                    className: 'bg-violet-500 text-white',
                    title: 'NFPT'
                },
                {
                    extend: 'excel',
                    className: 'bg-violet-500 text-white',
                    title: 'NFPT'
                },
                {
                    extend: 'print',
                    className: 'bg-violet-500 text-white',
                    title: 'NFPT'
                }
            ]
        });
    };

    var validateContactUs = function () {
        $('#contact-us-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 35,

                },
                email: {
                    required: true,
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    maxlength: "Please enter valid Name"
                },
            },
        });
    };

    return {
        init: function () {
            initIndex();
        },
        create: function () {
            validateContactUs();
        },
    };
}();