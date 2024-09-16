"use strict";

var ipv6 = function () {
    var initIndex = function () {
        $('#ipv6-table').DataTable({
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
                { data: 'network', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'description', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'prefix_length_id', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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
    var createIpv6Validation = function () {
        $('.ipv6-create-form').validate({
            rules: {
                pool_name: {
                    required: true
                },
                network: {
                    required: true
                },
                prefix_length_id: {
                    required: true
                }
            },
            messages: {
                pool_name: "Please enter Pool name",
                network: "Please enter network",
                prefix_length_id: "Please select prefix length"
            }
        });
    };
    var editIpv6Validation = function () {
        $('.ipv6-edit-form').validate({
            rules: {
                pool_name: {
                    required: true
                },
                network: {
                    required: true
                },
                prefix_length_id: {
                    required: true
                },
                'operator_id[]': {
                    required: true
                }
            },
            messages: {
                pool_name: "Please enter Pool name",
                network: "Please enter network",
                prefix_length_id: "Please select prefix length"
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
            createIpv6Validation();
        },
        edit: function () {
            editIpv6Validation();
            initMultiSelect();
        },
    };
}();