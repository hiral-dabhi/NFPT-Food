"use strict";

var card = function () {
    var initIndex = function () {
        $('#card-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": 8,
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
                { data: 'series', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'price', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'total', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'service_id', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'valid_till', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'data', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'up_time', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'expiration', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'created_date', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'created_by', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'operator_id', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
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

    var prefixCharacter = function () {
        $('#prefix').on('input', function () {
            var inputValue = $(this).val();
            var sanitizedValue = sanitizeInput(inputValue);
            $(this).val(sanitizedValue);
        });

        function sanitizeInput(inputValue) {
            var sanitizedValue = inputValue.replace(/[^a-zA-Z]/g, '');
            sanitizedValue = sanitizedValue.slice(0, 2);
            return sanitizedValue;
        }
    }

    var createCardValidation = function () {
        $('.card-create-form').validate({
            rules: {
                quantity: {
                    required: true,
                    number: true,
                    min: 0,
                    max: 500
                },
                valid_till: {
                    required: true
                },
                verification: {
                    required: true
                },
                service_id: {
                    required: true
                },
                concurrent_user: {
                    required: true
                },
                'nas_id[]': {
                    required: true
                },
                operator_id: {
                    required: true
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "nas_id[]") {
                    error.insertAfter(".nas-error-div"); // Place error message after the nas-error-div
                } else {
                    error.insertAfter(element); // Default placement for other fields
                }
            }
        });
    };
    var editCardValidation = function () {
        $('.card-edit-form').validate({
            rules: {
                quantity: {
                    required: true,
                    number: true,
                    min: 0
                },
                valid_till: {
                    required: true
                },
                verification: {
                    required: true
                },
                service_id: {
                    required: true
                },
                concurrent_user: {
                    required: true
                },
                'nas_id[]': {
                    required: true
                },
                operator_id: {
                    required: true
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "nas_id[]") {
                    error.insertAfter(".nas-error-div"); // Place error message after the nas-error-div
                } else {
                    error.insertAfter(element); // Default placement for other fields
                }
            }
        });
    };


    var deleteCardLink = function () {
        $('.delete-link').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('<form>', {
                        'method': 'POST',
                        'action': url
                    });
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var tokenInput = $('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': token
                    });
                    form.append(tokenInput);
                    var methodInput = $('<input>', {
                        'type': 'hidden',
                        'name': '_method',
                        'value': 'DELETE'
                    });
                    form.append(methodInput);
                    form.appendTo('body').submit();
                }
            });
        });
    };

    var initMultiSelect = function () {
        $('.multi-select').select2({
            placeholder: '---Select---',
            allowClear: true
        });
        $("#select_btn").on('click', function () {
            if ($(this).hasClass('select-all')) {
                if ($('.multi-select').find('option').length !== 0) {
                    $('.multi-select').find('option').prop('selected', true).trigger('change');
                    $(this).toggleClass("select-all unselect-all");
                    $(this).text('Unselect All');
                }
            } else {
                $('.multi-select').find('option').prop('selected', false).trigger('change');
                $(this).toggleClass("select-all unselect-all");
                $(this).text('Select All');
            }
        });
    };

    return {
        init: function () {
            initIndex();
        },
        create: function () {
            prefixCharacter();
            createCardValidation();
            initMultiSelect();
        },
        edit: function () {
            prefixCharacter()
            editCardValidation();
            initMultiSelect();
            deleteCardLink();
        },
    };
}();