"use strict";
var invoice = (function () {
    var initIndex = function () {
        var table = $("#pendingInvoiceTable").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: getPendingInvoiceList,
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
                    data: "tax_per",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "tax",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "discount_per",
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
                    data: "tax_number",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "credit_date",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "address",
                    class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600",
                },
                {
                    data: "comment",
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
        $("#pendingInvoiceTable tbody").on("change", 'input[type="checkbox"]', function () {
            if (!this.checked) {
                var el = $("#select_all").get(0);
                if (el && el.checked && "indeterminate" in el) {
                    el.indeterminate = true;
                }
            }
        });
    };

    var editPendingInvoice = function () {
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

    var fromCredit = function () {
        $(document).on('change', '#is_manual', function () {
            if (!$(this).prop("checked")) {
                resetValues();
            }
        });

        $(document).on('keyup', '#discount_percentage', function () {
            countDiscount($(this).val());
        });

        $(document).on('keyup', '#cgst_pr', function () {
            updateGstAmount('cgst_amount', $(this).val());
        });

        $(document).on('keyup', '#ggst_pr', function () {
            updateGstAmount('ggst_amount', $(this).val());
        });

        $(document).on('keyup', '#other_charges', function () {
            calculateGrandTotal();
        });


        function resetValues() {
            $('#discount_percentage, #discount, #other_charges').val('0');
            $('#cgst_pr').val(cgst);
            $('#ggst_pr').val(ggst);
            $('#cgst_amount').val(getGstValue(cgst));
            $('#ggst_amount').val(getGstValue(ggst));

            $("#grand_total").val(grandTotal);
        }

        function countDiscount(percentage) {
            var discountPercentage = parseFloat(percentage);
            if (isNaN(discountPercentage)) {
                $('#discount').val('0');
            } else {
                var discountValue = (subTotal * discountPercentage / 100);
                $('#discount').val(discountValue);
                calculateGrandTotal();
            }
        }

        function updateGstAmount(elementId, tax) {
            var amount = getGstValue(tax);
            $("#" + elementId).val(amount);
            calculateGrandTotal();
        }

        function calculateGrandTotal() {
            var cgst = parseFloat($('#cgst_amount').val());
            var ggst = parseFloat($('#ggst_amount').val());
            var discountValue = parseFloat($('#discount').val());
            var otherCharge = parseFloat($('#other_charges').val());

            if (!isNaN(cgst) && !isNaN(ggst) && !isNaN(discountValue) && !isNaN(otherCharge)) {
                var grandTotal = subTotal + cgst + ggst + otherCharge - discountValue;
                $("#grand_total").val(grandTotal);
            }
        }

        function getGstValue(tax) {
            var gstPercentage = parseFloat(tax);
            if (!isNaN(subTotal) && !isNaN(gstPercentage)) {
                var gstRate = gstPercentage / 100;
                var gstValue = subTotal * gstRate;
                return parseFloat(gstValue.toFixed(2));
            }
            return 0;
        }
    }

    return {
        init: function () {
            initIndex();
        },
        edit: function () {
            editPendingInvoice();
            fromCredit();
        },
    };
})();
