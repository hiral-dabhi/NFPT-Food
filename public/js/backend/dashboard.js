"use strict";

var dashboard = (function () {
    var chart;

    var initIndex = function () {
        var timeFilter = $("#time_filter").val();
        var chartType = $("#chart_type").val();

        $.ajax({
            url: dataUsage,
            method: "get",
            data: {
                time_filter: timeFilter,
                chart_type: chartType,
            },
            success: function (jsonData) {
                var {
                    total_data,
                    down_data,
                    up_data,
                    time_filter,
                    chart_type,
                } = jsonData;

                var dataArrays = generateDataArrays(
                    chart_type,
                    total_data,
                    down_data,
                    up_data,
                    time_filter
                );

                if (chart_type == "column") {
                    var chart_type = "bar";
                }
                // Destroy existing chart if it exists
                if (chart) {
                    chart.destroy();
                }

                var options = {
                    series: dataArrays.series,
                    chart: {
                        width: "100%",
                        height: 350,
                        type: chart_type,
                        toolbar: {
                            show: false,
                        },
                    },
                    colors: ["#00B0F0", "#808080", "#008000"],
                    plotOptions: dataArrays.plotOptions,
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: true,
                        showForSingleSeries: true,
                        markers: {
                            fillColors: ["#00B0F0", "#808080", "#008000"],
                            radius: 20,
                        },
                    },
                    xaxis: {
                        categories: dataArrays.categories,
                    },
                };

                // Select the chart container element
                var chartContainer = document.querySelector("#data-usage");

                // Check if the chart container exists before rendering the chart
                if (chartContainer) {
                    chart = new ApexCharts(chartContainer, options);
                    chart.render();
                } else {
                    console.error("Chart container not found.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error fetching data:", textStatus, errorThrown);
            },
        });
    };

    var generateDataArrays = function (
        chartType,
        totalData,
        downData,
        upData,
        timeFilter
    ) {
        var series = [];
        var categories = [];
        var plotOptions = {};
        var today = new Date();

        var yesterday = new Date(today);
        yesterday.setDate(today.getDate() - 1);
        var formattedYesterday = yesterday.toISOString().slice(0, 10);

        if (chartType === "bar") {
            plotOptions = {
                bar: {
                    horizontal: false,
                    columnWidth: "50%",
                },
            };
        } else if (chartType === "column") {
            var chartType = "bar";
            plotOptions = {
                bar: {
                    horizontal: true,
                    columnWidth: "50%",
                },
            };
        }
        series = [
            { name: "Total Data", data: totalData },
            { name: "Down Data", data: downData },
            { name: "Up Data", data: upData },
        ];

        categories = timeFilter == formattedYesterday ? [timeFilter] : timeFilter;
        return {
            series: series,
            categories: categories,
            plotOptions: plotOptions,
        };
    };

    function updateDateTime() {
        var now = new Date();
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var month = months[now.getMonth()];
        var day = now.getDate();
        var year = now.getFullYear();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var datetime = day + ' ' + month + ' ' + year + ' ' + hours + ':' + minutes + ':' + seconds;
        $('#currentDateTime').text(datetime);
    }

    var initMultiSelect = function () {
        $('.multi-select').select2({
            placeholder: '---Select---',
            allowClear: true
        });
        $("#select_btn").on('click', function () {
            if ($(this).hasClass('select-all')) {
                if ($('.multi-select').find('option').length !== 0) {
                    $('.multi-select').find('option').prop('selected', true).trigger('change');
                    $(this).toggleClass("select-all unselect-all");
                    $(this).text('Unselect All');
                }
            } else {
                $('.multi-select').find('option').prop('selected', false).trigger('change');
                $(this).toggleClass("select-all unselect-all");
                $(this).text('Select All');
            }
        });
    };

    var configValidation = function () {
        $('.dashboard-config').validate({
            rules: {
                'user_type[]': {
                    required: true
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "user_type[]") {
                    error.insertAfter(".selection");
                } else {
                    error.insertAfter(element);
                }
            }
        });
    };

    var dataTrafficChart = function () {
        updateDateTime();
        setInterval(updateDateTime, 1000);
        $('.toggle-btn').click(function () {
            var target = $(this).data('target');
            $(target).toggle();
        });

        var options = {
            series: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100],
                color: '#009933' // Light green color
            }],
            chart: {
                type: 'area',
                height: 400,
                width: "100%",
                toolbar: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
            },
            yaxis: {
                title: {
                    text: 'Bandwidth Rate',
                    style: {
                        fontSize: '16px',
                        color: '#0000FF' // Blue color
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        if (isGraph == 1) {
            var trafficChart1 = new ApexCharts(document.querySelector("#data-traffic-1"), options);
            trafficChart1.render();

            var trafficChart2 = new ApexCharts(document.querySelector("#data-traffic-2"), options);
            trafficChart2.render();
        }
    };

    
    var statistic = function () {
        let columns = [
            { data: 'id', class: "p-4 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control", orderable: false },
            { data: 'username', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'account_type', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'email', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'mobile_no', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'address', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'service', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'operator', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'action', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
        ];
        if (type === 'next-15days-expire') {
            columns.splice(6, 0, { data: 'expiration_date', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" });
        }
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": 9,
                "orderable": false
            }],
            ajax: {
                url: getlist,
                type: 'POST',
                data: {
                    type:type,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: columns,
        });
    }

    var top = function () {
        let columns = [
            { data: 'id', class: "p-4 pr-8 border border-t-0 border-gray-50 dark:border-zinc-600 sorting_1 dtr-control", orderable: false },
            { data: 'username', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'account_type', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'name', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'mobile_no', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            // { data: 'data', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'service', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'operator', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
            { data: 'action', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" },
        ];
        if (type === 'top-session') {
            columns.splice(5, 0, { data: 'session', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" });
        }
        if (type === 'top-usage') {
            columns.splice(5, 0, { data: 'data', class: "p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600" });
        }
        $('#top-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [
                [0, 'desc']
            ],
           
            ajax: {
                url: getlist,
                type: 'POST',
                data: {
                    type:type,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: columns,
        });
    }
    return {
        init: function () {
            statistic();
            top();
            //initIndex();
        },
        dataTraffic: function () {
            //dataTrafficChart();
            // initMultiSelect();
            // configValidation();
        },
        subscriber: function(){
            initIndex();
        },
    };
})();
