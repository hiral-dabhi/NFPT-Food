"use strict";

var reports = (function () {
    var statementIndex = function () {
        flatpickr("#register_date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $("#reservation").on("apply.daterangepicker", function (ev, picker) {
            reloadDataTable();
        });
        var statementDataTable = null;
        statementTable();

        function statementTable() {
            if (statementDataTable !== null) {
                statementDataTable.destroy();
            }
            let comment = $('[name="comment"]').val();
            let perticulars = $('[name="perticulars"]').val();
            let operator = $('[name="operator_id"]').val();
            let statement_type = $('[name="statement_type"]').val();
            var dateRange = $("#register_date").val();

            statementDataTable = $("#reports-statement-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[0, "desc"]],
                ajax: {
                    url: getStatementList,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        comment: comment,
                        perticulars: perticulars,
                        operator: operator,
                        registerDate: dateRange,
                        statement_type: statement_type,
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
                        data: "payment_mode",
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
                        data: "txn_id",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        orderable: false,
                    },
                    {
                        data: "invoice",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        orderable: false,
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on(
            "change",
            "#statement_type, #operator_id, #register_date",
            function () {
                statementTable();
            }
        );

        $(document).on("keyup", "#perticulars, #comment", function () {
            statementTable();
        });
    };

    var transactionsIndex = function () {
        flatpickr("#register_date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $("#reservation").on("apply.daterangepicker", function (ev, picker) {
            reloadDataTable();
        });
        var transactionsDataTable = null;
        transactionsTable();

        function transactionsTable() {
            if (transactionsDataTable !== null) {
                transactionsDataTable.destroy();
            }
            let comment = $('[name="comment"]').val();
            let perticulars = $('[name="perticulars"]').val();
            let operator = $('[name="operator_id"]').val();
            let statement_type = $('[name="statement_type"]').val();
            var dateRange = $("#register_date").val();

            transactionsDataTable = $("#reports-transactions-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[0, "desc"]],
                ajax: {
                    url: getTransactionList,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        comment: comment,
                        perticulars: perticulars,
                        operator: operator,
                        statement_type: statement_type,
                        registerDate: dateRange,
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
                        orderable: false,
                    },
                    {
                        data: "bank_name",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        orderable: false,
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
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on(
            "change",
            "#operator_id, #statement_type, #register_date",
            function () {
                transactionsTable();
            }
        );

        $(document).on("keyup", "#perticulars, #comment", function () {
            transactionsTable();
        });
    };

    var colletionsIndex = function () {
        flatpickr("#register_date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $("#reservation").on("apply.daterangepicker", function (ev, picker) {
            reloadDataTable();
        });
        var collectionDataTable = null;
        collectionTable();

        function collectionTable() {
            if (collectionDataTable !== null) {
                collectionDataTable.destroy();
            }
            let comment = $('[name="comment"]').val();
            let operator = $('[name="operator_id"]').val();
            var dateRange = $("#register_date").val();

            collectionDataTable = $("#reports-collections-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[0, "desc"]],
                ajax: {
                    url: getCollectionsList,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        comment: comment,
                        operator: operator,
                        registerDate: dateRange,
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
                        data: "payment_mode",
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
                        data: "txn_id",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        orderable: false,
                    },
                    {
                        data: "invoice",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        orderable: false,
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on("change", "#operator_id,#register_date", function () {
            collectionTable();
        });

        $(document).on("keyup", "#comment", function () {
            collectionTable();
        });
    };

    var newSubscription = function () {
        flatpickr("#register_date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        var newSubscriberDataTable = null;
        newSubscriberTable();

        function newSubscriberTable() {
            if (newSubscriberDataTable !== null) {
                newSubscriberDataTable.destroy();
            }
            var nas = $('[name="nas_id"]').val();
            var service = $('[name="service_id"]').val();
            var operator = $('[name="operator_id"]').val();
            var dateRange = $("#register_date").val();

            newSubscriberDataTable = $(
                "#reports-new-subscription-table"
            ).DataTable({
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
                    data: {
                        nasId: nas,
                        serviceId: service,
                        operatorId: operator,
                        registerDate: dateRange,
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
                        data: "account_type",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "name",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "email",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "mobile_no",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "created_date",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "expiration_date",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "service",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "user_group",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "operator",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on(
            "change",
            "#nas_id,#service_id,#operator_id,#register_date",
            function () {
                newSubscriberTable();
            }
        );
    };

    var renewalExpired = function () {
        flatpickr("#expired_date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        var renewalExpiredTable = null;
        newSubscriberTable();

        function newSubscriberTable() {
            if (renewalExpiredTable !== null) {
                renewalExpiredTable.destroy();
            }
            var nas = $('[name="nas_id"]').val();
            var service = $('[name="service_id"]').val();
            var operator = $('[name="operator_id"]').val();
            var dateRange = $("#expired_date").val();

            renewalExpiredTable = $("#reports-renewal-expired-table").DataTable(
                {
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
                        data: {
                            nasId: nas,
                            serviceId: service,
                            operatorId: operator,
                            expiredDate: dateRange,
                        },
                    },
                    columns: [
                        {
                            data: "id",
                            class: "p-4 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control",
                            orderable: false,
                        },
                        {
                            data: "username",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "account_type",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "name",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "email",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "mobile_no",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "created_date",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "expiration_date",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "service",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        {
                            data: "user_group",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                        // { data: 'user_type', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                        {
                            data: "operator",
                            class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                        },
                    ],
                    dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                    buttons: [
                        {
                            extend: "copy",
                            className: "bg-violet-500 text-white",
                            title: "NFPT",
                        },
                        {
                            extend: "excel",
                            className: "bg-violet-500 text-white",
                            title: "NFPT",
                        },
                        {
                            extend: "print",
                            className: "bg-violet-500 text-white",
                            title: "NFPT",
                        },
                    ],
                }
            );
        }

        $(document).on(
            "change",
            "#nas_id,#service_id,#operator_id,#register_date",
            function () {
                newSubscriberTable();
            }
        );
    };
    var bulkRenew = function () {
        $(document).on("click", ".btn-renewal", function () {
            var selectedIds = [];
            $('input[name="renewal"]:checked').each(function () {
                var id = $(this).data("id");
                selectedIds.push(id);
            });
            if (selectedIds.length < 1) {
                return false;
            }
            $("#renewal_ids").val(selectedIds);
        });
    };

    var sales = function () {
        flatpickr("#date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        var salesDataTable = null;
        salesTable();

        function salesTable() {
            if (salesDataTable !== null) {
                salesDataTable.destroy();
            }
            var nas = $('[name="nas_id"]').val();
            var service = $('[name="service_id"]').val();
            var operator = $('[name="operator_id"]').val();
            var dateRange = $("#date").val();

            salesDataTable = $("#reports-sales-table").DataTable({
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
                                "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"
                            );
                        },
                    },
                    { width: "500px", targets: 4 },
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
                        serviceId: service,
                        operatorId: operator,
                        date: dateRange,
                    },
                },
                columns: [
                    {
                        data: "id",
                        class: "p-10 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control",
                    },
                    {
                        data: "username",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "user_group",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "status",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "invoice_no",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "name",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "created_date",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "service",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "unit_price",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "quantity",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "sub_total",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "discount",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "tax",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "other_charge",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "grand_total",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "paid_amount",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "unpaid_amount",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on("change", "#service_id,#operator_id,#date", function () {
            salesTable();
        });
    };

    var onlineUser = function () {
        flatpickr("#register_date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        var onlineUserTable = null;
        getOnlineUserTable();

        function getOnlineUserTable() {
            if (onlineUserTable !== null) {
                onlineUserTable.destroy();
            }
            onlineUserTable = $("#online-user-table").DataTable({
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
                        class: "4 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control",
                    },
                    {
                        data: "status",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "username",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "type",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "up_rate_bs",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "down_rate_bs",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "service",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "start_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "up_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "upload",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "download",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "data",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "mac",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "framed_ip",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "nas",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "up_rate",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "down_rate",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "action",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on(
            "change",
            "#nas_id,#service_id,#operator_id,#register_date",
            function () {
                newSubscriberTable();
            }
        );
    };

    var usageSession = function () {
        flatpickr("#date", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        var usageSessionTable = null;
        getusageSessionTable();

        function getusageSessionTable() {
            if (usageSessionTable !== null) {
                usageSessionTable.destroy();
            }

            let username = $('[name="username"]').val();
            let ipAddress = $('[name="ip_address"]').val();
            let macAddress = $('[name="mac_address"]').val();
            let nasId = $('[name="nas_id"]').val();
            let terminateCause = $('[name="terminate_cause"]').val();
            let nasIpAddress = $('[name="nas_ip_address"]').val();
            var dateRange = $("#date").val();

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
                        username: username,
                        ipAddress: ipAddress,
                        macAddress: macAddress,
                        nasId: nasId,
                        terminateCause: terminateCause,
                        nasIpAddress: nasIpAddress,
                        dateRange: dateRange,
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
                        data: "start_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "last_update",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "end_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "up_time",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "upload",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "download",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "data",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "mac",
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
                        data: "nas",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "protocol",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "terminate_cause",
                        class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600",
                    },
                ],
                dom: '<"top"lfB>rt<"bottom"ip><"clear">',
                buttons: [
                    {
                        extend: "copy",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "excel",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                    {
                        extend: "print",
                        className: "bg-violet-500 text-white",
                        title: "NFPT",
                    },
                ],
            });
        }

        $(document).on(
            "change keyup",
            "#username, #ipAddress, #mac_address, #protocol, #nas_ip_address, #terminate_cause, #nasId",
            function () {
                getusageSessionTable();
                getTotalData($(this).val());
            }
        );
        getTotalData();
        function getTotalData(value=null) {
            $.ajax({
                type: "POST",
                url: getTotalDataCount,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    username: value,
                    ipAddress: value,
                    macAddress: value,
                    nasId: value,
                    terminateCause: value,
                    nasIpAddress: value,
                    dateRange: value,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                dataType: "json",
                success: function (response) {
                    $(".total-session").html(response.total_session);
                    $(".total-uptime").html(response.total_uptime);
                    $(".total-data").html(response.total_upload);
                    $(".total-upload").html(response.total_download);
                    $(".total-download").html(response.total_data);
                },
            });
        }
    };

    return {
        newSubscription: function () {
            newSubscription();
        },
        statements: function () {
            statementIndex();
        },
        transactions: function () {
            transactionsIndex();
        },
        collections: function () {
            colletionsIndex();
        },
        renewalExpired: function () {
            renewalExpired();
            bulkRenew();
        },
        sales: function () {
            sales();
        },
        onlineUser: function () {
            onlineUser();
        },
        usageSession: function () {
            usageSession();
        },
    };
})();
