"use strict";
var currency = function () {
    var initIndex = function () {
        $('#currency-table').DataTable({
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
                { data: 'sign', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
                { data: 'actions', class: "p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600" }
            ],
        });
    };

    var createCurrencyValidation = function () {
        $('.currency-create-form').validate({
            rules: {
                title: "required",
                sign: {
                    required: true
                },
                country_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",
                sign: {
                    required: "Please enter Sign"
                },
                country_id: {
                    required: "Please select Country"
                },
                status: "Select Status"

            }
        });
    };

    var editCurrencyValidation = function () {
        $('.currency-edit-form').validate({
            rules: {
                title: "required",
                sign: {
                    required: true
                },
                country_id: {
                    required: true
                },
                status: "required",
            },
            messages: {
                name: "Please enter name",
                sign: {
                    required: "Please enter Sign"
                },
                country_id: {
                    required: "Please select Country"
                },
                status: "Select Status"

            }
        });
    };
    var imagePreview = function(){
        document.getElementById('sign_image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file ) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const previewImg = document.getElementById('image_preview');
                    if (!previewImg) {
                        // Create a new image element for preview if it doesn't exist
                        const img = document.createElement('img');
                        img.id = 'image_preview';
                        img.style.maxWidth = '200px'; // Set max width for preview
                        img.style.maxHeight = '200px'; // Set max height for preview
                        img.classList.add('mt-2');
                        document.querySelector('div.mb-4').appendChild(img);
                    }
                    document.getElementById('image_preview').src = e.target.result;
                };
                
                reader.readAsDataURL(file);
            } else {
                alert('Please select a PNG image.');
            }
        });
    }
    return {
        init: function () {
            initIndex();
        },
        create: function () {
            createCurrencyValidation();
        },
        edit: function () {
            imagePreview();
            editCurrencyValidation();
        },
    };
}();