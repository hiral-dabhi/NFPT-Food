"use strict";

$(function () {
    $(".register-form").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email:true
            },
            restaurant_email: {
                required: true,
                email:true
            },
            role_id: {
                required:true
            },
            contact:{
                required:true
            },
            country_id:{
                required:true
            },
            restaurant_name: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            address: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            city: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            zip_code: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            restaurant_contact: {
                required: {
                    depends: function (element) {
                        return $("#role_id").val() === "RestaurantUser";
                    },
                },
            },
            password: {
                required: true,
            },
            confirmed: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            name: {
                required: "Please select name",
            },
            email: {
                required: "Please select Email",
                email:"Please enter valid email"
            },
            restaurant_email: {
                required: "Please select Email",
                email:"Please enter valid email"
            },
            role_id:"Please select Role",
            password: "Please enter password",
            confirmed: {
                required: "Please confirm password",
                equalTo: "Password does not matched",
            },
        },
    });   

    $(document).on('change','#role_id',function(){
        var value = $(this).val();
        if(value == 'RestaurantUser'){
            $('.restaurant-user-div').removeClass('hidden');
        }else{
            $('.restaurant-user-div').addClass('hidden');

        }
    });
});