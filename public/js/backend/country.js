"use strict";
var country = function () {
    var initIndex = function () {
        $('#country-table').DataTable({
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
                { data: 'id' , class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
            ],
        });
    };

    var createCountryValidation = function () {
        $('.country-create-form').validate({
            rules: {
            name: "required",
                status: "required",
            },
            messages: {
                name: "Please enter name",
                status:"Select Status"
                
            }
        });
    };

    var editCountryValidation = function () {
        $('.country-edit-form').validate({
            rules: {
                name: "required",       
                status: "required",

            },
            messages: {
                name: "Please enter name",
                status:"Please Select Status"
            }
        });
    };
    return {
        init: function () {
            initIndex();
        },
        create: function () {
            createCountryValidation();
        },
        edit: function () {
            editCountryValidation();
        },
    };
}();