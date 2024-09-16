var stream;
function streamProcessor(url) {
    stream && stream.close();
    // var dTable = document.getElementById('netdevices');

    if (!!window.EventSource) {
        // stream && stream.close()
        stream = new EventSource(url);

        stream.addEventListener(
            "message",
            function (e) {
                var data = JSON.parse(e.data);
                if (data.original.wan && data.original.wan.dash_intgraph == 1) {
                    var TX = parseInt(data.original.wan.tx);
                    var RX = parseInt(data.original.wan.rx);

                    var x = new Date().getTime();
                    var shift = wan.series[0].data.length > 240;
                    wan.series[0].addPoint([x, TX], true, shift);
                    wan.series[1].addPoint([x, RX], true, shift);
                    $("#wan_traffic").html(
                        data.original.wan.txf + " / " + data.original.wan.rxf
                    );
                }
                if (data.original.lan && data.original.lan.dash_intgraph == 1) {
                    var TX = parseInt(data.original.lan.tx);
                    var RX = parseInt(data.original.lan.rx);

                    var x = new Date().getTime();
                    var shift = lan.series[0].data.length > 240;
                    lan.series[0].addPoint([x, TX], true, shift);
                    lan.series[1].addPoint([x, RX], true, shift);
                    $("#lan_traffic").html(
                        data.original.lan.txf + " / " + data.original.lan.rxf
                    );
                }
                if (data.tag == "r" && data.dash_rthealth == 1) {
                    //var oCells = oTable.rows.item(0).cells;
                    //var ip = oCells.item(1).innerHTML;
                    var oTable = document.getElementById("resources");
                    oTable.rows.item(0).cells[1].innerHTML = data.uptime;
                    oTable.rows.item(1).cells[1].innerHTML = data.cpuload + "%";
                    oTable.rows.item(2).cells[1].innerHTML = data.totalmemory;
                    oTable.rows.item(3).cells[1].innerHTML = data.freememory;
                    oTable.rows.item(4).cells[1].innerHTML = data.totalhddspace;
                    oTable.rows.item(5).cells[1].innerHTML = data.freehddspace;
                    oTable.rows.item(6).cells[1].innerHTML = data.boardname;
                    oTable.rows.item(7).cells[1].innerHTML = data.version;
                } else if (data.tag == "h" && data.dash_rthealth == 1) {
                    var oTable = document.getElementById("resources");
                    var temperature = "N/A";
                    var voltage = "N/A";

                    if (data.temperature != null) {
                        temperature = data.temperature + " C";
                    }
                    if (data.voltage != null) {
                        voltage = data.voltage + " V";
                    }
                    oTable.rows.item(8).cells[1].innerHTML = temperature;
                    oTable.rows.item(9).cells[1].innerHTML = voltage;
                } else if (data.tag == "i" && data.dash_rthealth == 1) {
                    var oTable = document.getElementById("resources");
                    var identity = "N/A";

                    if (data.identity != null) {
                        identity = data.identity;
                    }
                    oTable.rows.item(10).cells[1].innerHTML = identity;
                } else if (data.tag == "d" && data.dash_netdevices == 1) {
                    var dTable = document.getElementById("netdevices");

                    var h = data.total_device;
                    var total_d = 0;
                    var up_d = 0;
                    var down_d = 0;

                    for (var index in h) {
                        if (h[index] == "up") {
                            up_d++;
                        } else {
                            down_d++;
                        }
                        total_d++;
                    }

                    // console.log(total_d);

                    dTable.rows.item(0).cells[1].innerHTML = total_d;
                    dTable.rows.item(1).cells[1].innerHTML = up_d;
                    dTable.rows.item(2).cells[1].innerHTML = down_d;
                }
            },
            false
        );

        stream.addEventListener(
            "error",
            function (e) {
                // stream.close();
                // location.reload(true);
                // alert("Error hello");
                // console.log('Stream Error');
                if (e.readyState == EventSource.CLOSED) {
                    // alert("Error hello");
                }
            },
            false
        );
    } else {
    }
}

$(document).ready(function () {
    Highcharts.setOptions({
        global: {
            useUTC: false,
        },
        colors: [
            "#058DC7",
            "#50B432",
            "#ED561B",
            "#DDDF00",
            "#24CBE5",
            "#64E572",
            "#FF9655",
            "#FFF263",
            "#6AF9C4",
        ],
    });

    wan = new Highcharts.Chart({
        chart: {
            zoomType: "x",
            alignTicks: true,
            animation: false,
            backgroundColor: "#f7f7f7",
            borderColor: "red",
            borderRadius: 0,
            borderWidth: 0,
            colorCount: 10,
            defaultSeriesType: "areaspline",
            events: {
                load: streamProcessor,
            },
            height: null,
            ignoreHiddenSeries: true,
            inverted: false,
            panning: true,
            pinchType: null,
            plotBorderColor: "#cccccc",
            plotBorderWidth: 0,
            plotShadow: true,
            polar: true,
            reflow: true,
            renderTo: "wan",
            // selectionMarkerFill: "rgba(51,92,173,0.25)",
            shadow: true,
            showAxes: true,
            spacing: [10, 10, 15, 10],
            spacingBottom: 15,
            spacingLeft: 10,
            spacingRight: 10,
            spacingTop: 10,
            style: {
                fontFamily:
                    '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif',
                fontSize: "12px",
            },
            type: "areaspline",
            height: 200,
        },
        title: {
            text: "Interface-1 (Tx/Rx)",
        },
        credits: {
            enabled: false,
        },

        xAxis: {
            type: "datetime",
            minorTickInterval: "auto",
        },
        yAxis: {
            enabled: true,
            labels: {
                formatter: function () {
                    return bytes(this.value, true);
                },
            },
            title: {
                text: "Bandwidth Rate",
            },
            floor: 0,
            allowDecimals: true,
            min: 0,
            minorTickInterval: "auto",
        },
        tooltip: {
            enabled: true,
            formatter: function () {
                return bytes(this.y, true);
            },
        },
        legend: {
            enabled: false,
        },
        plotOptions: {
            areaspline: {
                animation: false,
                fillOpacity: 0.6,
                marker: {
                    enabled: true,
                    radius: 1,
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 3,
                    },
                },
            },
        },

        series: [
            {
                threshold: 100,
                type: "areaspline",
                name: "TX",
                color: "#346870",
                data: (function () {
                    var data = [],
                        time = new Date().getTime(),
                        i;

                    for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0,
                        });
                    }
                    return data;
                })(),
            },
            {
                threshold: 100,
                type: "areaspline",
                name: "RX",
                color: "#0b6b24",
                data: (function () {
                    var data = [],
                        time = new Date().getTime(),
                        i;

                    for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0,
                        });
                    }
                    return data;
                })(),
            },
        ],
    });

    lan = new Highcharts.Chart({
        chart: {
            zoomType: "x",
            alignTicks: true,
            animation: false,
            backgroundColor: "#f7f7f7",
            borderColor: "red",
            borderRadius: 0,
            borderWidth: 0,
            colorCount: 10,
            defaultSeriesType: "areaspline",
            events: {
                load: streamProcessor,
            },
            height: null,
            ignoreHiddenSeries: true,
            inverted: false,
            panning: true,
            pinchType: null,
            plotBorderColor: "#cccccc",
            plotBorderWidth: 0,
            plotShadow: true,
            polar: true,
            reflow: true,
            renderTo: "lan",
            // selectionMarkerFill: "rgba(51,92,173,0.25)",
            shadow: true,
            showAxes: true,
            spacing: [10, 10, 15, 10],
            spacingBottom: 15,
            spacingLeft: 10,
            spacingRight: 10,
            spacingTop: 10,
            style: {
                fontFamily:
                    '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif',
                fontSize: "12px",
            },
            type: "areaspline",
            height: 200,
        },
        title: {
            text: "Interface-2 (Tx/Rx)",
        },
        credits: {
            enabled: false,
        },

        xAxis: {
            type: "datetime",
            minorTickInterval: "auto",
        },
        yAxis: {
            enabled: true,
            labels: {
                formatter: function () {
                    return bytes(this.value, true);
                },
            },
            title: {
                text: "Bandwidth Rate",
            },
            floor: 0,
            allowDecimals: true,
            min: 0,
            minorTickInterval: "auto",
        },
        tooltip: {
            enabled: true,
            formatter: function () {
                return bytes(this.y, true);
            },
        },
        legend: {
            enabled: false,
        },
        plotOptions: {
            areaspline: {
                animation: false,
                fillOpacity: 0.6,
                marker: {
                    enabled: true,
                    radius: 1,
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 3,
                    },
                },
            },
        },

        series: [
            {
                threshold: 100,
                type: "areaspline",
                name: "TX",
                color: "#0b6b24",
                data: (function () {
                    var data = [],
                        time = new Date().getTime(),
                        i;

                    for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0,
                        });
                    }
                    return data;
                })(),
            },
            {
                threshold: 100,
                type: "areaspline",
                name: "RX",
                color: "#346870",
                data: (function () {
                    var data = [],
                        time = new Date().getTime(),
                        i;

                    for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0,
                        });
                    }
                    return data;
                })(),
            },
        ],
    });
});

function bytes(bytes, label) {
    if (bytes == 0) return "";
    var s = ["B/s", "Kb/s", "Mb/s", "Gb/s", "Tb/s", "Pb/s"];
    var e = Math.floor(Math.log(bytes) / Math.log(1024));
    var value = (bytes / Math.pow(1024, Math.floor(e))).toFixed(0);
    e = e < 0 ? -e : e;
    if (label) value += " " + s[e];
    return value;
}

$(function () {
    wan = new Highcharts.Chart({
        chart: {
            zoomType: "x",
            alignTicks: true,
            animation: false,
            backgroundColor: "#f7f7f7",
            borderColor: "red",
            borderRadius: 0,
            borderWidth: 0,
            colorCount: 10,
            defaultSeriesType: "areaspline",
            events: {
                load: streamProcessor,
            },
            height: null,
            ignoreHiddenSeries: true,
            inverted: false,
            panning: true,
            pinchType: null,
            plotBorderColor: "#cccccc",
            plotBorderWidth: 0,
            plotShadow: true,
            polar: true,
            reflow: true,
            renderTo: "wan",
            // selectionMarkerFill: "rgba(51,92,173,0.25)",
            shadow: true,
            showAxes: true,
            spacing: [10, 10, 15, 10],
            spacingBottom: 15,
            spacingLeft: 10,
            spacingRight: 10,
            spacingTop: 10,
            style: {
                fontFamily:
                    '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif',
                fontSize: "12px",
            },
            type: "areaspline",
            height: 200,
        },
        title: {
            text: "Interface-1 (Tx/Rx)",
        },
        credits: {
            enabled: false,
        },

        xAxis: {
            type: "datetime",
            minorTickInterval: "auto",
        },
        yAxis: {
            enabled: true,
            labels: {
                formatter: function () {
                    return bytes(this.value, true);
                },
            },
            title: {
                text: "Bandwidth Rate",
            },
            floor: 0,
            allowDecimals: true,
            min: 0,
            minorTickInterval: "auto",
        },
        tooltip: {
            enabled: true,
            formatter: function () {
                return bytes(this.y, true);
            },
        },
        legend: {
            enabled: false,
        },
        plotOptions: {
            areaspline: {
                animation: false,
                fillOpacity: 0.6,
                marker: {
                    enabled: true,
                    radius: 1,
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 3,
                    },
                },
            },
        },

        series: [
            {
                threshold: 100,
                type: "areaspline",
                name: "TX",
                color: "#346870",
                data: (function () {
                    var data = [],
                        time = new Date().getTime(),
                        i;

                    for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0,
                        });
                    }
                    return data;
                })(),
            },
            {
                threshold: 100,
                type: "areaspline",
                name: "RX",
                color: "#0b6b24",
                data: (function () {
                    var data = [],
                        time = new Date().getTime(),
                        i;

                    for (i = -20; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0,
                        });
                    }
                    return data;
                })(),
            },
        ],
    });
    var nas_id = $("#time_filter :selected").val();

    if (nas_id != "") {
        var url = streamProcessorUrl + nas_id;
        //streamProcessor(url);
        var if_names = get_interface_name_by_nas(nas_id);

        wan.setTitle({ text: if_names.interfaces.wan_interface + " (Tx/Rx)" });
        lan.setTitle({ text: if_names.interfaces.lan_interface + " (Tx/Rx)" });
    }
});

$("#time_filter").on("change", function () {
    var nas_id = this.value;

    var url = streamProcessorUrl + nas_id;

    streamProcessor(url);

    var if_names = get_interface_name_by_nas(nas_id);

    wan.setTitle({ text: if_names.wan_interface + " (Tx/Rx)" });
    lan.setTitle({ text: if_names.lan_interface + " (Tx/Rx)" });
});

function get_interface_name_by_nas(nas_id) {
    var response;
    $.ajax({
        async: false,
        url: interfacesUrl + nas_id,
        type: "get",
        dataType: "html",
        success: function (data) {
            response = JSON.parse(data);
        },
    });
    return response;
}
