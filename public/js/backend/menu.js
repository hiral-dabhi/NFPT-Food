"use strict";
var menu = function () {
    var initIndex = function () {
        $('#menu-table').DataTable({
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
                },
                data: {
                    businessId: businessId
                }
            },
            columns: [
                { data: 'id', class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
                { data: 'category_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'sub_category', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'title', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'price', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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

    var createMenuValidation = function () {
        $("#category_id").select2({
            placeholder: "---Select Category---",
            closeOnSelect: true,
            allowClear: true,
            tags: false,
            width: "100%",
            minimumResultsForSearch: 1,
        });
        $(document).on('change', '#category_id', function () {
            $.ajax({
                url: getSubCategory,
                type: "POST",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    var selectElement = $("#sub_category_id");
                    selectElement.empty();
                    selectElement.append(
                        '<option value="">Select Sub Category</option>'
                    );

                    $.each(response, function (index, value) {
                        var option = $("<option>", {
                            value: index,
                            text: value,
                        });
                        // if (index == ipv4staticIp) {
                        //     option.prop("selected", true);
                        // }
                        selectElement.append(option);
                    });
                },
                error: function (error) { },
            });
        });
        $.validator.addMethod('acceptImage', function (value, element, param) {
            if (element.files.length === 0) return false; // No file selected
            const file = element.files[0];
            const validTypes = ['image/jpeg', 'image/png'];
            return validTypes.includes(file.type);
        }, 'Please upload a JPG, JPEG, or PNG image.');
        $('.menu-create-form').validate({
            rules: {
                title: {
                    required: false
                },
                category_id: {
                    required: true
                },
                sub_category_id: {
                    required: true
                },
                image: {
                    required: true,
                    acceptImage: true
                },
                price: {
                    number: true,
                    required: true
                },
                status: "required",
                in_stock: "required",
            },
            messages: {
                title: "Please enter title",
                image: {
                    required: "Select Image",
                    image: {
                        acceptImage: 'Only JPG, JPEG, and PNG formats are supported.'
                    }
                },
                price: {
                    number: "Please enter price",
                    required: "Please enter price"
                },
                category_id: {
                    required: "Please select Category"
                },
                sub_category_id: {
                    required: "Please select Sub Category"
                },
                type: "Select Type",
                in_stock: "Please select stock",
                status: "Select Status"
            }
        });
    };

    var getSubCategoryFunction = function () {
        getSubCategory(categoryId);
        function getSubCategory(id) {
            console.log('hereeeeee');

            $.ajax({
                url: getSubCategoryUrl,
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
                    var selectElement = $("#sub_category_id");
                    selectElement.empty();
                    selectElement.append(
                        '<option value="">Select Dish</option>'
                    );

                    $.each(response, function (index, value) {
                        // console.log(index);                        
                        var option = $("<option>", {
                            value: index,
                            text: value,
                        });
                        if (index == dishId) {
                            option.prop("selected", true);
                        }
                        selectElement.append(option);
                    });
                },
                error: function (error) { },
            });
        }
        $(document).on("change", "#category_id", function () {
            getSubCategory($(this).val());
        });
    };

    var editMenuValidation = function () {
        $("#category_id").select2({
            placeholder: "---Select Category---",
            closeOnSelect: true,
            allowClear: true,
            tags: false,
            width: "100%",
            minimumResultsForSearch: 1,
        });
        $.validator.addMethod('acceptImage', function (value, element, param) {
            if (element.files.length === 0) return false; // No file selected
            const file = element.files[0];
            const validTypes = ['image/jpeg', 'image/png'];
            return validTypes.includes(file.type);
        }, 'Please upload a JPG, JPEG, or PNG image.');
        $('.menu-edit-form').validate({
            rules: {
                title: "required",
                price: "required",
                category_id: {
                    required: true
                },
                image: {
                    required: true,
                    acceptImage: true
                },
                sub_category_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",
                sub_category_id: {
                    required: "Please select Sub Category"
                },
                category_id: {
                    required: "Please select Country"
                },
                image: {
                    required: "Select Image",
                    image: {
                        acceptImage: 'Only JPG, JPEG, and PNG formats are supported.'
                    }
                },
                price: "Please enter price",
                status: "Select Status"

            }
        });
    };
    return {
        init: function () {
            initIndex();
        },
        create: function () {
            createMenuValidation();
        },
        edit: function () {
            getSubCategoryFunction();
            editMenuValidation();
        },
    };
}();