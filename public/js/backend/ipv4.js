"use strict";

var ipv4 = function () {
    var initIndex = function () {
        $('#ipv4-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": [6, 7, 8, 9, 10],
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
                { data: 'pool_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'description', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'first_ip', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'last_ip', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'total', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'used', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'free', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'progress', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'status', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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

    var usedIpv4List = function () {
        $('#used-ips-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            ajax: {
                url: getlist,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    // Add the data-id to the request data
                    d.ipv4Id = $('#used-ips-table').data('id');
                }
            },
            columns: [
                { data: 'pool_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'used_ipv4s', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'username', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'user_type', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'assign_on', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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

    var IpcheckerVal = function () {
        $.validator.addMethod("minValue", function (value, element, param) {
            var firstIp = $(param).val().split('.');
            var lastIp = value.split('.');
    
            for (var i = 0; i < 4; i++) {
                if (parseInt(firstIp[i]) < parseInt(lastIp[i])) {
                    return true;
                } else if (parseInt(firstIp[i]) > parseInt(lastIp[i])) {
                    return false;
                }
            }
            return false;
        }, "Last IP must be greater than or equal to the first IP");
    }

    var addMethod = function(){
        $.validator.addMethod("sameIp", function(value, element) {
            var startIp = $('#first_ip').val();
            var endIp = $('#last_ip').val();
            console.log(startIp);
            var startParts = startIp.split('.');
            var endParts = endIp.split('.');
      
            return startParts[0] === endParts[0] && startParts[1] === endParts[1] && startParts[2] === endParts[2];
          }, "A, B, and C parts must be the same.");
    }

    var createIpV4Validation = function () {
        $('.ipv4-create-form').validate({
            rules: {
                pool_name: {
                    required: true
                },
                first_ip: {
                    required: true,
                    IP4Checker: true,
                    sameIp: true,
                },
                last_ip: {
                    required: true,
                    IP4Checker: true,
                    minValue: "#first_ip",
                    sameIp: true,
                }
            },
            messages: {
                pool_name: {
                    required: "Please enter pool name",
                },
                first_ip: {
                    required: "Please enter first ip",
                },
                last_ip: {
                    required: "Please enter last ip",
                }
            }
        });
    };
    var IpValidation = function () {
        $.validator.addMethod('IP4Checker', function (value) {
            return value.match(/^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/);
        }, 'Invalid IP address');
    }
    var editIpV4Validation = function () {
        $('.ipv4-edit-form').validate({
            rules: {
                pool_name: {
                    required: true
                },
                first_ip: {
                    required: true,
                    IP4Checker: true,
                    sameIp: true,
                },
                last_ip: {
                    required: true,
                    IP4Checker: true,
                    minValue: "#first_ip",
                    sameIp: true,
                },
                'operator_id[]': {
                    required: true
                }
            },
            messages: {
                pool_name: {
                    required: "Please enter pool name",
                },
                first_ip: {
                    required: "Please enter first ip",
                },
                last_ip: {
                    required: "Please enter last ip",
                }
            }
        });
    };
    var initMultiSelect = function () {
        $('.multi-select').select2({
            placeholder: '---Select---',
            allowClear: true
        });
        $("#select_btn").on('click', function () {
            if ($(this).hasClass('select-all')) {
                if($('.multi-select').find('option').length !== 0){
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
            IpcheckerVal();
            IpValidation();
            addMethod();
            createIpV4Validation();
        },
        edit: function () {
            IpcheckerVal();
            addMethod();
            IpValidation();
            editIpV4Validation();
            initMultiSelect();
        },
        usedIpv4s: function () {
            usedIpv4List();
        },
    };
}();