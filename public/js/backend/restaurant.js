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