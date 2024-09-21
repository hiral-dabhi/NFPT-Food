"use strict";
var restaurant = function () {
    var initIndex = function () {
        $('#staff-restaurant-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                // "targets": [ 9, 10],
                // "orderable": false
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
                { data: 'restaurant_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'email', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'contact_number', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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

    var createRestaurantValidation = function () {
        var userRole = "{{getCurrentUserRoleName()}}";
        $('.restaurant-staff-create-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true,
                },
                contact_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                status: "required",
                password: {
                    required: true,
                },
                confirmed: {
                    required: true,
                    equalTo: "#password",
                },
                restaurant_id: {
                    required: true,
                }
            },
            messages: {
                name: "Please enter name",
                email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                contact_number: {
                    required: "Please enter Contact Number",
                    number: "Please enter valid contact",
                    minlength: "Contact requires 10 digits",
                    maxlength: "Contact requires 10 digits"
                },
                status: "Please enter status",
            }
        });
    };

    var editRestaurantValidation = function () {
        $('.restaurant-staff-edit-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true,
                },
                contact_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                status: "required",
                password: {
                    required: false,
                },
                confirmed: {
                    required: false,
                    equalTo: "#password",
                },
                restaurant_id: {
                    required: true,
                }
            },
            messages: {
                name: "Please enter name",
                email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                contact_number: {
                    required: "Please enter Contact Number",
                    number: "Please enter valid contact",
                    minlength: "Contact requires 10 digits",
                    maxlength: "Contact requires 10 digits"
                },
                address: "Please enter address",
                status: "Please enter status",
                city: {
                    required: "Please select city",
                },
                state: {
                    required: "Please select state",
                },
                country: {
                    required: "Please select state",
                }
            }
        });
    };

    var initOnwerIndex = function () {
        $('#restaurant-owner-table').DataTable({
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
                { data: 'name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'email', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'contact_number', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'address', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'city', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'state', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'country', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'zip_code', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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

    var createRestaurantOwnerValidation = function () {
        var userRole = "{{getCurrentUserRoleName()}}";
        $('.restaurant-create-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true,
                },
                contact_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                country: {
                    required: true,
                },
                status: "required",
                password: {
                    required: true,
                },
                confirmed: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                name: "Please enter name",
                email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                contact_number: {
                    required: "Please enter Contact Number",
                    number: "Please enter valid contact",
                    minlength: "Contact requires 10 digits",
                    maxlength: "Contact requires 10 digits"
                },
                address: "Please enter address",
                status: "Please enter status",
                city: {
                    required: "Please select city",
                },
                state: {
                    required: "Please select state",
                },
                country: {
                    required: "Please select state",
                }
            }
        });
    };

    var editRestaurantOwnerValidation = function () {
        $('.restaurant-edit-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true,
                },
                business_email: {
                    required: true,
                    email: true,
                },
                business_name: {
                    required: true,
                },
                business_contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                // description: "required",

                status: "required",
                password: {
                    required: true,
                },
                confirmed: {
                    required: true,
                    equalTo: "#password",
                },
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
                // description: "Please enter description",

                status: "Please enter status",

            }
        });
    };

    var businessDetailValidaiton = function () {
        $("#business-detail_form_edit").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                description: {
                    maxlength: 255
                },
                open_at: {
                    required: true
                },
                close_at: {
                    required: true
                },
                is_closed: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter the business name.",
                    minlength: "The name must be at least 3 characters long."
                },
                description: {
                    maxlength: "The description cannot exceed 255 characters."
                },
                open_at: {
                    required: "Please specify the opening time."
                },
                close_at: {
                    required: "Please specify the closing time."
                },
                is_closed: {
                    required: "Please indicate if the business is temporarily closed."
                }
            },
            errorElement: 'p',
            errorPlacement: function (error, element) {
                error.addClass('text-sm text-red-600');
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('border-red-500');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('border-red-500');
            }
        });
    };

    var businessAddressValidation = function(){
        $("#business-address_form_edit").validate({
            rules: {
                address: {
                    required: true,
                    minlength: 5
                },
                latitude: {
                    required: true,
                    number: true,
                    min: -90,
                    max: 90
                },
                longitude: {
                    required: true,
                    number: true,
                    min: -180,
                    max: 180
                },
                city: {
                    required: true,
                    minlength: 2
                },
                state: {
                    required: true,
                    minlength: 2
                },
                country: {
                    required: true
                },
                zip_code: {
                    required: true,
                    digits: true,
                    minlength: 5,
                    maxlength: 10
                }
            },
            messages: {
                address: {
                    required: "Please enter the address.",
                    minlength: "The address must be at least 5 characters long."
                },
                latitude: {
                    required: "Please enter the latitude.",
                    number: "Please enter a valid latitude between -90 and 90.",
                    min: "The latitude cannot be less than -90.",
                    max: "The latitude cannot be greater than 90."
                },
                longitude: {
                    required: "Please enter the longitude.",
                    number: "Please enter a valid longitude between -180 and 180.",
                    min: "The longitude cannot be less than -180.",
                    max: "The longitude cannot be greater than 180."
                },
                city: {
                    required: "Please enter the city.",
                    minlength: "The city name must be at least 2 characters long."
                },
                state: {
                    required: "Please enter the state.",
                    minlength: "The state name must be at least 2 characters long."
                },
                country: {
                    required: "Please select the country."
                },
                zip_code: {
                    required: "Please enter the zip code.",
                    digits: "The zip code must contain only digits.",
                    minlength: "The zip code must be at least 5 characters long.",
                    maxlength: "The zip code cannot be longer than 10 characters."
                }
            },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                error.addClass('text-sm text-red-600');
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('border-red-500');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('border-red-500');
            }
        });
    }

return {
    init: function () {
        initIndex();
    },
    create: function () {
        createRestaurantValidation();
    },
    edit: function () {
        editRestaurantValidation();
    },
    businessDetail:function(){
        businessDetailValidaiton();
    },
    businessAddress:function(){
        businessAddressValidation();
    }
};
}();