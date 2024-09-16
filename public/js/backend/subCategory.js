"use strict";
var subCategory = function () {
    var initIndex = function () {
        $('#subCategory-table').DataTable({
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
                { data: 'category_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'title', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'status', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
            ],
        });
    };

    var createDishValidation = function () {
        $("#category_id").select2({
            placeholder: "---Select Category---",
            closeOnSelect: true,
            allowClear: true,
            tags: false,
            width: "100%",
            minimumResultsForSearch: 1,
        });

        $('.subCategory-create-form').validate({
            rules: {
                title: "required",               
                category_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",              
                type: "required",
                category_id: {
                    required: "Please select Category"
                },
                status: "Select Status"
            }
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
        $('.subCategory-edit-form').validate({
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
        create: function () {
            getCountryName();
            createDishValidation();
        },
        edit: function () {
            getCountryName();
            editDishValidation();
        },
    };
}();