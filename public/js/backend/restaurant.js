"use strict";
var restaurant = function () {
    var initIndex = function () {
        $('#sub-restaurant-table').DataTable({
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
                { data: 'owner_name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'email', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'contact_number', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'address', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'city', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'state', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'country', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'zip_code', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                // { data: 'created_date', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'description', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
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
                user_id: {
                    required: function() {
                        return userRole === 'SuperAdmin';
                    }
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

    var editRestaurantValidation = function () {
        $('.restaurant-edit-form').validate({
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
                user_id: {
                    required: function() {
                        return userRole === 'SuperAdmin';
                    }
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
                { data: 'id' , class: "p-4 pr-8 border border-t-0  border-gray-50 dark:border-zinc-600" },
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
        $('.restaurant-owner-create-form').validate({
            rules: {
                firstname: {
                    required: true,
                },
                lastname: {
                    required: true,
                },
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
                business_name: {
                    required: true,
                },
                business_email: {
                    required: true,
                    email: true,
                },
                business_contact: {
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
                zip_code: {
                    required: true,
                    number: true,
                    minlength: 5,
                    maxlength: 10,
                },
                status: {
                    required: true,
                },
                password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                firstname: "Please enter first name",
                lastname: "Please enter last name",
                email: {
                    required: "Please enter an email",
                    email: "Please enter a valid email",
                },
                contact_number: {
                    required: "Please enter a contact number",
                    number: "Please enter a valid number",
                    minlength: "Contact number must be 10 digits",
                    maxlength: "Contact number must be 10 digits"
                },
                business_name: "Please enter business name",
                business_email: {
                    required: "Please enter business email",
                    email: "Please enter a valid business email",
                },
                business_contact: {
                    required: "Please enter business contact number",
                    number: "Please enter a valid number",
                    minlength: "Business contact number must be 10 digits",
                    maxlength: "Business contact number must be 10 digits"
                },
                address: "Please enter address",
                city: "Please enter city",
                state: "Please enter state",
                country: "Please select a country",
                zip_code: {
                    required: "Please enter a zip code",
                    number: "Please enter a valid zip code",
                    minlength: "Zip code must be at least 5 digits",
                    maxlength: "Zip code cannot exceed 10 digits",
                },
                status: "Please select status",
                password: "Please enter a password",
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match",
                },
            }
        });
        
    };

    var editRestaurantOwnerValidation = function () {
       
        $('.restaurant-edit-form').validate({
            rules: {
                firstname: {
                    required: true,
                },
                lastname: {
                    required: true,
                },
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
                business_name: {
                    required: true,
                },
                business_email: {
                    required: true,
                    email: true,
                },
                business_contact: {
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
                zip_code: {
                    required: true,
                    number: true,
                    minlength: 5,
                    maxlength: 10,
                },
                status: {
                    required: true,
                },
                password: {
                    required: false,
                },
                confirm_password: {
                    required: false,
                    equalTo: "#password",
                },
            },
            messages: {
                firstname: "Please enter first name",
                lastname: "Please enter last name",
                email: {
                    required: "Please enter an email",
                    email: "Please enter a valid email",
                },
                contact_number: {
                    required: "Please enter a contact number",
                    number: "Please enter a valid number",
                    minlength: "Contact number must be 10 digits",
                    maxlength: "Contact number must be 10 digits"
                },
                business_name: "Please enter business name",
                business_email: {
                    required: "Please enter business email",
                    email: "Please enter a valid business email",
                },
                business_contact: {
                    required: "Please enter business contact number",
                    number: "Please enter a valid number",
                    minlength: "Business contact number must be 10 digits",
                    maxlength: "Business contact number must be 10 digits"
                },
                address: "Please enter address",
                city: "Please enter city",
                state: "Please enter state",
                country: "Please select a country",
                zip_code: {
                    required: "Please enter a zip code",
                    number: "Please enter a valid zip code",
                    minlength: "Zip code must be at least 5 digits",
                    maxlength: "Zip code cannot exceed 10 digits",
                },
                status: "Please select status",
                password: "Please enter a password",
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match",
                },
            }
        });
    };
   
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
        ownerIndex: function(){
            initOnwerIndex();
        },
        ownerCreate: function () {
            createRestaurantOwnerValidation();
        },
        ownerEdit: function () {
            editRestaurantOwnerValidation();
        },
    };
}();