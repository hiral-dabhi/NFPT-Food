"use strict";
var invoice = (function () {
    var initIndex = function () {
        var table = $("#generatedInvoiceTable").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: getGeneratedInvoiceList,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "check",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
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
                    data: "plan",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "unit_price",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "quantity",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "subtotal",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "tax",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "discount",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "grandtotal",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "paid",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "unpaid",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_at",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "actions",
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
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                    className: "dt-body-center",
                    render: function (data, type, full, meta) {
                        return '<input type="checkbox" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" name="id[]" value="' + $('<div class="selecte_all"><input></div>').html() + '">';
                    },
                },
            ],
            order: [[1, "asc"]],
        });

        $("#select_all").on("click", function () {
            var rows = table.rows({ search: "applied" }).nodes();
            $('input[type="checkbox"]', rows).prop("checked", this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $("#generatedInvoiceTable tbody").on("change", 'input[type="checkbox"]', function () {
            if (!this.checked) {
                var el = $("#select_all").get(0);
                if (el && el.checked && "indeterminate" in el) {
                    el.indeterminate = true;
                }
            }
        });
    };

    var allInvoices = function () {
        var table = $("#allInvoiceTable").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: getGeneratedInvoiceList,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            },
            columns: [
                {
                    data: "check",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "id",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "status",
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
                    data: "plan",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "unit_price",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "quantity",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "subtotal",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "tax",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "discount",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "grandtotal",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "paid",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "unpaid",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "created_at",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "actions",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                    className: "dt-body-center",
                    render: function (data, type, full, meta) {
                        return '<input type="checkbox" class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500" name="id[]" value="' + $('<div class="selecte_all"><input></div>').html() + '">';
                    },
                },
            ],
            order: [[1, "asc"]],
            rowCallback: function (row, data) {
                var status = data.status;
                var rowClass = "";
                switch (status) {
                    case "Pending":
                        rowClass = "bg-pink-800";
                        break;
                    case "Generated":
                        rowClass = "bg-yellow-200";
                        break;
                    case "Paid":
                        rowClass = "bg-green-200";
                        break;
                    default:
                        break;
                }
                $(row).addClass(rowClass);
            },
        });

        $("#select_all").on("click", function () {
            var rows = table.rows({ search: "applied" }).nodes();
            $('input[type="checkbox"]', rows).prop("checked", this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $("#generatedInvoiceTable tbody").on("change", 'input[type="checkbox"]', function () {
            if (!this.checked) {
                var el = $("#select_all").get(0);
                if (el && el.checked && "indeterminate" in el) {
                    el.indeterminate = true;
                }
            }
        });
    };

    var editGeneratedInvoice = function () {
        $(document).on("change", "#is_manual", function () {
            var isManualChecked = $(this).prop("checked");
            $("#manual input")
                .prop("disabled", !isManualChecked)
                .css({
                    cursor: isManualChecked ? "auto" : "not-allowed",
                });
        });

        $(document).ready(function () {
            $("#is_manual").trigger("change");
        });
    };

    var paidModalValidation = function(){
        $("#paid_modal_form").validate({
            rules: {
                amount: {
                    required: true,
                },
                payment_mode: {
                    required: true,
                },
            },
            messages: {
                amount: {
                    required: "Please enter Amount to pay",
                },
                payment_mode: {
                    required: "Please select Payment Mode",
                },
            }
        });
        $(document).on('click','#discount',function(){
            $('.discount-label').toggleClass('hidden', !this.checked);
        });
    };

    // Public methods
    return {
        init: function () {
            initIndex();
        },
        edit: function () {
            editGeneratedInvoice();
            paidModalValidation();
        },
        allInvoice: function () {
            allInvoices();
        },
    };
})();
