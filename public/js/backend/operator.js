"use strict";

var operator = function () {
    var initIndex = function () {
        var table = $('#operator-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": 10,
                "orderable": false
            },
            {
                "targets": "_all",
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass('ml-5 p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600');
                }
            }
            ],
            ajax: {
                url: getlist,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [
                { data: 'id', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'username' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'name' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'description' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'address' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'city' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'email' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'contact' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'expiry_date' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'status' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions' , class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
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
            "createdRow": function (row, data, dataIndex) {
                $('td:eq(0)', row).addClass('p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600');
                $('td:last', row).addClass('p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600');
            }
        });
        table.buttons().container()
            .appendTo('#operator-table-buttons_wrapper .col-md-6:eq(0)');

        $(".dataTables_length select").addClass('form-select form-select-sm');
    };

    var initWalletIndex = function () {
        var walletTable = $('#operator-wallet-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            ajax: {
                url: getWalletList,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [
                { data: 'id', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'username' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'credit' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'debit' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'created_date' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'created_by' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'comment' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600", orderable: false},
                { data: 'particulars' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600", orderable: false },
                { data: 'invoice' , class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600", orderable: false },
            ],
            "createdRow": function (row, data, dataIndex) {
                $('td:eq(0)', row).addClass('p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600');
                $('td:last', row).addClass('p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600');
            }
        });
        walletTable.buttons().container()
            .appendTo('#operator-table-buttons_wrapper .col-md-6:eq(0)');

        $(".dataTables_length select").addClass('form-select form-select-sm');
    };

    var createOperatorValidation = function () {
        $.validator.addMethod("dateValidation", function (value, element) {
            var selectedDate = value;
            var selectedDateObject = new Date(selectedDate);
            var currentDate = new Date();
            return selectedDateObject > currentDate;
        }, "Expiry date must be greater than the current date.");
        $('.operator-create-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true,
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                address: "required",
                description: "required",
                password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password",
                },
                expiry_date: {
                    required:true,
                    dateValidation:true,
                },
                status: "required",
                role: {
                    required: true,
                }
            },
            messages: {
                name: "Please enter name",
                email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                contact: {
                    required: "Please enter Contact",
                    number: "Please enter valid contact",
                    minlength: "Contact requires 10 digits",
                    maxlength: "Contact requires 10 digits"
                },
                address: "Please enter address",
                description: "Please enter description",
                password: "Please enter password",
                expiry_date: {
                    required:"Please select expiry date",
                },
                status: "Please enter status",
                confirm_password: {
                    required: "Please confirm password",
                    equalTo: "Password does not matched",
                },
                role: {
                    required: "Please select role"
                },
            }
        });
    };
    var editOperatorValidation = function () {
        $.validator.addMethod("dateValidation", function (value, element) {
            var selectedDate = value;
            var selectedDateObject = new Date(selectedDate);
            var currentDate = new Date();
            return selectedDateObject > currentDate;
        }, "Expiry date must be greater than the current date.");
        
        $('#operator_form_edit').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                expiry_date: {
                    required:true,
                    // dateValidation:true,
                },
                status: "required",
                role: {
                    required: true,
                },
                password: {
                    required: {
                        depends: function (element) {
                            return $('.ckb-password').is(':checked');
                        }
                    },
                    minlength: {
                        depends: function (element) {
                            return $('.ckb-password').is(':checked');
                        },
                        param: 8,
                    }
                },
                confirm_password: {
                    required: {
                        depends: function (element) {
                            return $('.ckb-password').is(':checked');
                        }
                    },
                    equalTo: {
                        depends: function (element) {
                            return $('.ckb-password').is(':checked');
                        },
                        param: "#password",
                        message: "Passwords do not match."
                    }
                }
            },
            messages: {
                email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                contact: {
                    required: "Please enter Contact",
                    number: "Please enter valid contact",
                    minlength: "Contact requires 10 digits",
                    maxlength: "Contact requires 10 digits"
                },
                expiry_date: {
                    required:"Please select expiry date",
                },
                status: "Please enter status",
                role: {
                    required: "Please select role"
                },
            }
        });
    };
    var changePassword = function () {
        $(document).on('change', '.ckb-password', function () {
            $('.password-div').toggleClass('hidden', !$(this).prop('checked'));
        });
    };

    var initMultiSelect = function () {
        $('.multi-select-nas').select2({
            placeholder: '---Select NAS---',
            closeOnSelect: false,
            allowClear: true,
            tags: false,
            width: '100%',
            minimumResultsForSearch: -1
        });
        $("#select_btn_nas").on('click', function () {
            if ($(this).hasClass('select-all')) {
                if ($('.multi-select-nas').find('option').length !== 0) {
                    $('.multi-select-nas').find('option').prop('selected', true).trigger('change');
                    $(this).toggleClass("select-all unselect-all");
                    $(this).text('Unselect All');
                }
            } else {
                $('.multi-select-nas').find('option').prop('selected', false).trigger('change');
                $(this).toggleClass("select-all unselect-all");
                $(this).text('Select All');
            }
        });


        $('.multi-select-service').select2({
            placeholder: '---Select Services---',
            closeOnSelect: false,
            allowClear: true,
            tags: false,
            width: '100%',
            minimumResultsForSearch: -1
        });
        
        $("#select_btn_service").on('click', function () {
            if ($(this).hasClass('select-all')) {
                if ($('.multi-select-service').find('option').length !== 0) {
                    $('.multi-select-service').find('option').prop('selected', true).trigger('change');
                    $(this).toggleClass("select-all unselect-all");
                    $(this).text('Unselect All');
                }
            } else {
                $('.multi-select-service').find('option').prop('selected', false).trigger('change');
                $(this).toggleClass("select-all unselect-all");
                $(this).text('Select All');
            }
        });
    }

    var depositValidation = function () {
        $(".add-deposit").validate({
            rules: {
                amount: {
                    required: true,
                    min: 1
                },
                comment: {
                    required: false,

                },
            },
            messages: {
                amount: {
                    required: "Please enter amount",
                    min: "Please enter valid amount"
                },
                comment: {
                    required: "Please enter Comment",
                },
            }
        });
    }
    return {
        init: function () {
            initIndex();
        },
        initWallet: function () {
            initWalletIndex();
        },
        create: function () {
            createOperatorValidation();
        },
        edit: function () {
            depositValidation();
            editOperatorValidation();
            changePassword();
            initMultiSelect();
        },
    };
}();