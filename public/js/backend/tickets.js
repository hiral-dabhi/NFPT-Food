"use strict";

var tickets = (function () {
    var initIndex = function () {
        $("#tickets-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    targets: 5,
                    orderable: false,
                },
            ],
            ajax: {
                url: getlist,
                type: "POST",
                data:{ticketStatus:ticketStatus},
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
                    data: "user_id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "subject",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "group",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "priority",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "status",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "due_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "person_called",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "actions",
                    class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600",
                },
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

    var createTicketValidation = function () {
        $.validator.addMethod(
            "dateValidation",
            function (value, element) {
                var selectedDate = value;
                var selectedDateObject = new Date(selectedDate);
                var currentDate = new Date();
                return selectedDateObject > currentDate;
            },
            "Due Date must be greater than the current date."
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
        $(".ticket-create-form").validate({
            rules: {
                subject: {
                    required: true,
                },
                message: {
                    required: true,
                },
                priority: {
                    required: true,
                },
                group_misc_id: {
                    required: true,
                },
                portal_user_name: {
                    required: true,
                },
                due_date: {
                    required: true,
                    dateValidation: true,
                },
                operator_id: {
                    required: true,
                },
                employee_id: {
                    required: true,
                },
                "file_name[]": {
                    extension: true,
                },
            },
        });
    };

    var editTicketValidation = function () {
        $.validator.addMethod(
            "dateValidation",
            function (value, element) {
                var selectedDate = value;
                var selectedDateObject = new Date(selectedDate);
                var currentDate = new Date();
                return selectedDateObject > currentDate;
            },
            "Due Date must be greater than the current date."
        );
        $(".ticket-edit-form").validate({
            rules: {
                subject: {
                    required: true,
                },
                message: {
                    required: true,
                },
                priority: {
                    required: true,
                },
                group_misc_id: {
                    required: true,
                },
                user_id: {
                    required: true,
                },
                due_date: {
                    required: true,
                    dateValidation: true,
                },
                operator_id: {
                    required: true,
                },
                employee_id: {
                    required: true,
                },
            },
        });
    };

    var initMultiSelect = function () {
        $(".multi-select").select2({
            placeholder: "---Select---",
            allowClear: true,
            tags: false,
        });
    };

    var getRealTime = function () {
        function updateElapsedTime() {
            $(".time-difference").each(function () {
                var createdTime = moment($(this).data("created-at"));
                var currentTime = moment();
                var elapsedTime = moment.duration(
                    currentTime.diff(createdTime)
                );

                if (elapsedTime.asHours() < 1) {
                    var minutesDiff = Math.floor(elapsedTime.asMinutes());
                    $(this).html(
                        "Added " +
                            minutesDiff +
                            " minute(s) ago (" +
                            createdTime.format("YYYY-MM-DD HH:mm:ss") +
                            ")"
                    );
                } else {
                    var hoursDiff = Math.floor(elapsedTime.asHours());
                    $(this).html(
                        "Added " +
                            hoursDiff +
                            " hour(s) ago (" +
                            createdTime.format("YYYY-MM-DD HH:mm:ss") +
                            ")"
                    );
                }
            });
        }

        updateElapsedTime();
        setInterval(updateElapsedTime, 60000); // Update every minute
    };

    var ticketsStatusTable = function () {
        $("#ticketss-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: getTicketStatusList,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "status",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "message",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "action_by",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
            ],
        });
    };

    var assignToMeTickesList = function () {
        $("#assigned-to-me-tickets-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    targets: 5,
                    orderable: false,
                },
            ],
            ajax: {
                url: getAssignToMeTicketList,
                type: "POST",
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
                    data: "user_id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "subject",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "group",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "priority",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "status",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "due_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "person_called",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
            ],
        });
    };

    var topEventOfTicketsList = function () {
        $("#top-event-of-tickets-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: getTopEventOfTicketList,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "status",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "message",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "ticket_id",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "action_by",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
            ],
        });
    };

    var reassignTicketValidation = function () {
        $(".ticket-re-assign-form").validate({
            rules: {
                operator_id: {
                    required: true,
                },
                employee_id: {
                    required: true,
                },
            },
        });
    };

    var addCommentTicketValidation = function () {
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
        $(".ticket-comment-create-form").validate({
            rules: {
                comment: {
                    required: true,
                },
                "file_name[]": {
                    extension: true,
                }
            },
        });
    };

    //subs ticket
    var initSubsIndex = function () {
        $("#subs-tickets-table").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[0, "desc"]],
            ajax: {
                url: getlist,
                type: "POST",
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
                    data: "subject",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "group",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "priority",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "status",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "resolved_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "closed_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_date",
                    class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600",
                },
            ],
        });
    };

    return {
        init: function () {
            initIndex();
        },
        initSubs: function () {
            initSubsIndex();
        },
        create: function () {
            createTicketValidation();
        },
        edit: function () {
            editTicketValidation();
            initMultiSelect();
            reassignTicketValidation();
            addCommentTicketValidation();
        },
        time: function () {
            getRealTime();
        },
        ticketStatus: function () {
            ticketsStatusTable();
        },
        assignToMeTickes: function () {
            assignToMeTickesList();
        },
        topEventOfTickets: function () {
            topEventOfTicketsList();
        },
    };
})();
