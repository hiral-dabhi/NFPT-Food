"use strict";

$(function () {
    $('#autocomplete-input').on('keypress', function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            return false;
        }
    });
    $(document).on('keyup', '#autocomplete-input', function (event) {
        var searchTerm = $(this).val();
        var searchType = $('#topbar_select').val();
        if (searchTerm.length == 0) {
            $('#autocomplete-results').addClass('hidden');
            return false;
        }
        $.ajax({
            url: autoSearchRoute,
            type: 'GET',
            data: {
                term: searchTerm,
                type: searchType
            },
            dataType: 'json',
            success: function (response) {
                $('#autocomplete-results').empty();

                if (response.length > 0) {
                    $.each(response, function (key, value) {
                        var resultText = value.username ? value.username : value
                            .s_name;
                        var resultLink = value.id;
                        // var href = (searchType == 0) ? "user/" + resultLink +
                        //     "/edit" : "service/" + resultLink + "/edit";
                        var href = (searchType == 0) ? userEditRoute.replace(':user', resultLink) : servicesEditRoute.replace(':service', resultLink);
                        var listItem = $('<li>').addClass(
                            'px-4 py-2 cursor-pointer hover:bg-gray-200 text-blue-500 underline search-bar-li'
                        );
                        var anchor = $('<a>').attr('href', href).text(
                            resultText);
                        listItem.append(anchor);
                        $('#autocomplete-results').append(listItem);
                    });
                    $('#autocomplete-results').removeClass('hidden');
                } else {
                    var listItem = $('<p>').addClass(
                        'px-4 py-2 cursor-pointer hover:bg-gray-200 color:blue')
                        .text('No Result Found');
                    $('#autocomplete-results').append(listItem);
                    $('#autocomplete-results').removeClass('hidden');
                }
            }
        });
    });

    $(document).on('click', '.search-bar-li', function () {
        $('#autocomplete-input').val($(this).text());
        $('#autocomplete-results').addClass('hidden');
        window.history.pushState("", "", searchUrl);
    });

    setTimeout(function () {
        $('#closeAlertButton').click();
    }, 4000);
    
    if (is_admin === 'SuperAdmin') {
        getNotification();
        setInterval(getNotification, 10000);
    }
    if(auth && (sessionDurationNum != 0) && (sessionDurationStr != 0)){
        sessionTimeout(sessionDurationNum,sessionDurationStr);
    }

    function getNotification() {
        $.ajax({
            type: 'POST',
            url: getNotifications,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (response) {
                if (response.total_tickets > 0) {
                    $('.total').text(response.total_tickets);
                    $('.total-tickets').text('Unread (' + response.total_tickets + ')');
                    $('.ticket-notification-container').html(response.result);
                }else{
                    $('.ticket-notification-container').html('<div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"><h5 class="mb-2 text-gray-700 dark:text-gray-100">No recent tickets</h5></div>');
                }
            }
        });
    }
   
    function sessionTimeout(sessionDurationNum,sessionDurationStr) {
        var idleTime = 0;
        var maxIdleTime = sessionDurationNum * sessionDurationStr;
        var idleInterval = setInterval(timerIncrement, 1000);

        $(document).on('mousemove keydown', function (e) {
            idleTime = 0;
        });

        function timerIncrement() {
            idleTime++;
            if (idleTime > maxIdleTime) {
                logoutUser();
            }
        }

        function logoutUser() {
            $("#logout-form").submit();
        }
    }
});