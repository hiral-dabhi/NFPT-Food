"use strict";
var logs = (function () {
    var EventIndex = function () {
        flatpickr('#date', {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $('#reservation').on('apply.daterangepicker', function (ev, picker) {
            reloadDataTable();
        });
        var eventLogTable = null;
        findEventLogTable();

        function findEventLogTable() {
            if (eventLogTable !== null) {
                eventLogTable.destroy();
            }

            let date = $('[name="date"]').val();
            let ipaddress = $('[name="ipaddress"]').val();
            let status = $('[name="status"]').val();
            let type = $('[name="type"]').val();
            let message = $('[name="message"]').val();
            let action_by = $('[name="action_by"]').val();

            eventLogTable = $('#event-log-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: getEventLogList,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        date: date,
                        ipaddress: ipaddress,
                        status: status,
                        type: type,
                        message: message,
                        action_by: action_by,
                    },
                },
                columns: [
                    {
                        data: "id",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "status",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "message",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "perticulars",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "type",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "remote_ip",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "action_by",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "created_date",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                ],
            });
        }

        $(document).on(
            "change keyup",
            "#date,#type,#ipaddress,#status,#message,#action_by",
            function () {
                findEventLogTable();
            }
        );
    };
    var AuthIndex = function () {
        flatpickr('#date', {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $('#reservation').on('apply.daterangepicker', function (ev, picker) {
            reloadDataTable();
        });
        var authLogTable = null;
        findAuthLogTable();

        function findAuthLogTable() {
            if (authLogTable !== null) {
                authLogTable.destroy();
            }

            let date = $('[name="date"]').val();
            let ipaddress = $('[name="ipaddress"]').val();
            let status = $('[name="status"]').val();
            let type = $('[name="type"]').val();
            let message = $('[name="message"]').val();
            let action_by = $('[name="action_by"]').val();

            authLogTable = $('#auth-log-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: getAuthLogList,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        date: date,
                        ipaddress: ipaddress,
                        status: status,
                        type: type,
                        message: message,
                        action_by: action_by,
                    },
                },
                columns: [
                    {
                        data: "id",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "email",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "status",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "message",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },

                    {
                        data: "remote_ip",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "created_date",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
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
        }

        $(document).on(
            "change keyup",
            "#date,#type,#ipaddress,#status,#message,#action_by",
            function () {
                findAuthLogTable();
            }
        );
    };

    var userAuthIndex = function () {
        flatpickr('#date', {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $('#reservation').on('apply.daterangepicker', function (ev, picker) {
            reloadDataTable();
        });
        var authLogTable = null;
        findUserAuthLogTable();

        function findUserAuthLogTable() {
            if (authLogTable !== null) {
                authLogTable.destroy();
            }

            let date = $('[name="date"]').val();
            let ipaddress = $('[name="ipaddress"]').val();
            let status = $('[name="status"]').val();
            let macaddress = $('[name="macaddress"]').val();
            let message = $('[name="message"]').val();
            let username = $('[name="username"]').val();
            let nas_id = $('[name="nas_id"]').val();

            authLogTable = $('#user-auth-log-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: getAuthLogList,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        date: date,
                        ipaddress: ipaddress,
                        status: status,
                        macaddress: macaddress,
                        message: message,
                        username: username,
                        nas_id: nas_id,
                    },
                },
                columns: [
                    {
                        data: "username",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "password",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "status",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "cause",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "remote_ip",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "mac_address",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "nas_name",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "created_date",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
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
        }

        $(document).on(
            "change keyup",
            "#date,#macaddress,#ipaddress,#status,#message,#username,#nas_id",
            function () {
                findUserAuthLogTable();
            }
        );
    };

    // Public methods
    return {
        eventlog: function () {
            EventIndex();
        },
        authlog: function () {
            AuthIndex();
        },
        userAuthlog: function () {
            userAuthIndex();
        }
    };
})();
