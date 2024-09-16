"use strict";
var user = function () {
    var initIndex = function () {
        $('#user-table').DataTable({
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

    var createUserValidation = function () {
        var userRole = "{{getCurrentUserRoleName()}}";
        $('.user-create-form').validate({
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
                password: {
                    required: true,
                },
                confirmed: {
                    required: true,
                    equalTo: "#password",
                },
                status: "required",
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
                
            }
        });
    };

    var editUserValidation = function () {
        $('.user-edit-form').validate({
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
                status:"Please Select Status"
            }
        });
    };
    return {
        init: function () {
            initIndex();
        },
        create: function () {
            createUserValidation();
        },
        edit: function () {
            editUserValidation();
        },
    };
}();