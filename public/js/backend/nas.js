"use strict";

var nas = function () {

    var initIndex = function () {
        $('#nas-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": 12,
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
                { data: 'nasname', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'shortname', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'secret', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'nas_type', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'coaport', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'api_username', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'api_password', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'wan_interface', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'lan_interface', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'lan_ippool', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'created_date', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'created_by', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" }
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

    function generateRandomInteger(length) {
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var result = "";
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * charset.length);
            result += charset.charAt(randomIndex);
        }
        return result;

        // return only integer
        // var min = Math.pow(10, length - 1);
        // var max = Math.pow(10, length) - 1;
        // return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    var ipValidation = function () {
        $.validator.addMethod('IP4Checker', function (value) {
            return value.match(/^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/);
        }, 'Invalid IP address');
        $.validator.addMethod("lanIpPool", function (value, element) {
            return this.optional(element) || /^([0-9]{1,3}\.){3}[0-9]{1,3}\/[0-9]{1,2}$/.test(value);
        }, "Enter a valid Lan Ip Pool address in the format 0.0.0.0/0");
    };

    var createNASValidation = function () {
        $("#nas_create_form").validate({
            rules: {
                short_name: {
                    required: true,
                },
                nas_type: {
                    required: true
                },
                ip_address: {
                    required: true,
                    IP4Checker: true,
                },
                secret: {
                    required: true,
                    maxlength: 8
                },
                coa_port: {
                    required: true,
                    digits: true
                },
                api_port: {
                    required: true,
                    digits: true
                },
                interim_time: {
                    required: true,
                    digits: true
                },
                log_server: {
                    required: true
                },
                lan_ip_pool: {
                    lanIpPool: true
                },
                default_service_id: {
                    required: {
                        depends: function (element) {
                            return $('.ckb-username').is(':checked');
                        }
                    },

                },
            },
            messages: {
                short_name: {
                    required: "Please enter a short name",
                },
                nas_type: {
                    required: "Please select a NAS type"
                },
                ip_address: {
                    required: "Please enter an IP address",
                },
                secret: {
                    required: "Please enter a secret",
                    maxlength: "Secret must be of 8 characters"
                },
                coa_port: {
                    required: "Please enter COA Port",
                    digits: "COA Port must be a numeric value"
                },
                api_port: {
                    required: "Please enter API Port",
                    digits: "API Port must be a numeric value"
                },
                interim_time: {
                    required: "Please enter Interim Time",
                    digits: "Interim Time must be a numeric value"
                },
                log_server: {
                    required: "Please select a Log Server"
                },
                default_service_id: {
                    required:"Please select Service",
                },
            },

        });
        $('.catch-username').hide();
        $(document).on('change','.ckb-username',function(){
            $('.catch-username').toggle($(this).is(':checked'));
        });
    };

    var editNASValidation = function () {
        $('.nas-edit-form').validate({
            rules: {
                short_name: {
                    required: true,
                },
                nas_type: {
                    required: true
                },
                ip_address: {
                    required: true,
                    IP4Checker: true,
                },
                secret: {
                    required: true,
                    maxlength: 8
                },
                coa_port: {
                    required: true,
                    digits: true
                },
                api_port: {
                    required: true,
                    digits: true
                },
                interim_time: {
                    required: true,
                    digits: true
                },
                log_server: {
                    required: true
                },
                lan_ip_pool: {
                    lanIpPool: true
                }
            },
            messages: {
                short_name: {
                    required: "Please enter a short name",
                },
                nas_type: {
                    required: "Please select a NAS type"
                },
                ip_address: {
                    required: "Please enter an IP address",
                },
                secret: {
                    required: "Please enter a secret",
                    maxlength: "Secret must be of 8 characters"
                },
                coa_port: {
                    required: "Please enter COA Port",
                    digits: "COA Port must be a numeric value"
                },
                api_port: {
                    required: "Please enter API Port",
                    digits: "API Port must be a numeric value"
                },
                interim_time: {
                    required: "Please enter Interim Time",
                    digits: "Interim Time must be a numeric value"
                },
                log_server: {
                    required: "Please select a Log Server"
                },
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            }
        });
        $('.catch-username').toggle($('.ckb-username').is(':checked'));       

        $(document).on('change','.ckb-username',function(){
            $('.catch-username').toggle($(this).is(':checked'));

        });
    };

    var initGenerateSecret = function () {
        $(".generate_secret").on("click", function () {
            var length = 8;
            var secretNumber = generateRandomInteger(length);
            $('#secret').val(secretNumber);
        });
    };
    var initMultiSelect = function () {
        $('.multi-select').select2({
            placeholder: '---Select Operator---',
            closeOnSelect: false,
            allowClear: true,
            tags: false,
            width: '100%',
            minimumResultsForSearch: -1
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
            ipValidation();
            createNASValidation();
            initGenerateSecret();
        },
        edit: function () {
            ipValidation();
            editNASValidation();
            initGenerateSecret();
            initMultiSelect();
        },
    };
}();