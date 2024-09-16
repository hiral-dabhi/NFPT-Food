"use strict";
var invoice = (function () {
    var initIndex = function () {
        flatpickr('#paid_date, #invoice_date, #created_date', {
            mode: "range",
            dateFormat: "Y-m-d",
        });
        $('#reservation').on('apply.daterangepicker', function (ev, picker) {
            reloadDataTable();
        });
        var findInvoiceDataTable = null;
        findInvoiceTable();

        function findInvoiceTable() {
            if (findInvoiceDataTable !== null) {
                findInvoiceDataTable.destroy();
            }
            let invoice_no = $('[name="invoice_no"]').val();
            let username = $('[name="username"]').val();
            let fullname = $('[name="fullname"]').val();
            let address = $('[name="address"]').val();
            let plan = $('[name="plan"]').val();
            let pay_mode = $('[name="pay_mode"]').val();
            let tax_no = $('[name="tax_no"]').val();
            let comment = $('[name="comment"]').val();
            let created_date = $('[name="created_date"]').val();
            let invoice_date = $('[name="invoice_date"]').val();
            let paid_date = $('[name="paid_date"]').val();
            let status = $('[name="status"]').val();

            findInvoiceDataTable = $('#find-invoice-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: getInvoiceList,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        invoice_no: invoice_no,
                        username: username,
                        fullname: fullname,
                        address: address,
                        plan: plan,
                        pay_mode: pay_mode,
                        tax_no: tax_no,
                        comment: comment,
                        created_date: created_date,
                        invoice_date: invoice_date,
                        paid_date: paid_date,
                        status: status
                    },
                },
                columns: [
                    {
                        data: "id",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "user_name",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "full_name",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "address",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "plan",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "payment_mode",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "tax_no",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "comment",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "created_date",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "invoice_date",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "paid_date",
                        class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                    },
                    {
                        data: "status",
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
                ],
            });
        }

        $(document).on('change', '#pay_mode, #status, #paid_date, #invoice_date, #created_date', function () {
            findInvoiceTable();
        });

        $(document).on('keyup', '#invoice_no, #username, #fullname, #address, #plan, #tax_no, #comment', function () {
            findInvoiceTable();
        });
    };


    // Public methods
    return {
        find: function () {
            initIndex();
        }
    };
})();
