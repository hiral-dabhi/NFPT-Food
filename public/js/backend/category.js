"use strict";
var category = function () {
    var initIndex = function () {
        $('#category-table').DataTable({
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
                { data: 'country_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'title', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'status', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
            ],
        });
    };

    var createCategoryValidation = function () {
        $('.category-create-form').validate({
            rules: {
                title: "required",
               
                country_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",
              
                country_id: {
                    required: "Please select Country"
                },
                status: "Select Status"

            }
        });
    };

    var editCategoryValidation = function () {
        $('.category-edit-form').validate({
            rules: {
                title: "required",
                
                country_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",
                
                country_id: {
                    required: "Please select Country"
                },
                status: "Select Status"

            }
        });
    };
    return {
        init: function () {
            initIndex();
        },
        create: function () {
            createCategoryValidation();
        },
        edit: function () {
            editCategoryValidation();
        },
    };
}();