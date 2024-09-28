"use strict";
var orders = function () {
    var initIndex = function () {
        $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                // "targets": [ 9, 10],
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
                { data: 'user_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'total_amount', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'payment_mode', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'payment_status', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'order_status', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'created_at', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" },
                { data: 'action', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
            ],
        });
    };

    var changeStatus = function () {
        $('.status-update-btn').on('click', function() {
            // Get the order ID and status from the button's data attributes
            var orderId = $(this).data('order-id');
            var status = $(this).data('status');
            var label = $(this).data('label');
            console.log(status);            
            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: `You are sure to change the order status to "${label}"`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set form values and submit
                    $('#order_id').val(orderId);
                    $('#status').val(status);
                    $('#orderStatusForm').submit();
                }
            });
        });
    };

    var editDishValidation = function () {
        $("#category_id").select2({
            placeholder: "---Select Category---",
            closeOnSelect: true,
            allowClear: true,
            tags: false,
            width: "100%",
            minimumResultsForSearch: 1,
        });
        $('.order-edit-form').validate({
            rules: {
                title: "required",
                category_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",
                
                category_id: {
                    required: "Please select Country"
                },
                status: "Select Status"

            }
        });
    };
    var getCountryName = function () {
        // getCountry(id);
        function getCountry(id) {
            $.ajax({
                url: getCountryname,
                type: "POST",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    console.log(response);                    
                    $('.country-name').text(response);
                    // var selectElement = $("#ipv4_static_ip");
                    
                    
                },
                error: function (error) {},
            });
        }
        $(document).on("change", "#category_id", function () {
            getCountry($(this).val());
        });
    };
    return {
        init: function () {
            initIndex();
        },
        edit: function () {
            changeStatus();
        },
    };
}();