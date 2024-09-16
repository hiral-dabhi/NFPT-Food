var traffic;

function bytes(bytes, label) {
    if (bytes == 0) return '';
    var s = ['B/s', 'Kb/s', 'Mb/s', 'Gb/s', 'Tb/s', 'Pb/s'];
    var e = Math.floor(Math.log(bytes) / Math.log(1024));
    var value = ((bytes / Math.pow(1024, Math.floor(e))).toFixed(0));
    e = (e < 0) ? (-e) : e;
    if (label) value += ' ' + s[e];
    return value;
}

function streamProcessor(url) {
    if (!!window.EventSource) {
        var stream = new EventSource(url);
        stream.addEventListener('message', function (e) {
            var data = JSON.parse(e.data);
            var TX = parseInt(data.tx);
            var RX = parseInt(data.rx);
            var x = (new Date()).getTime();
            var shift = traffic.series[0].data.length > 120;

            traffic.series[0].addPoint([x, TX], true, shift);
            traffic.series[1].addPoint([x, RX], true, shift);
            $("#traffic_bytes").html(data.txf + " / " + data.rxf);
        }, false);

        stream.addEventListener("error", function(e) {
            console.error('Stream Error:', e);
            if (e.readyState == EventSource.CLOSED) {
                console.error('Stream closed');
            }
        }, false);
    } else {
        console.error('EventSource not supported in this browser');
    }
}

$(document).ready(function() {
    Highcharts.setOptions({
        global: { useUTC: false },
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
    });

    traffic = new Highcharts.Chart({
        chart: {
            zoomType: 'x',
            alignTicks: true,
            animation: false,
            backgroundColor: "#f7f7f7",
            events: { load: function () { streamProcessor(userTrafficUrl + userId) } },
            height: 250,
            renderTo: 'traffic',
            type: 'areaspline'
        },
        title: { text: 'Traffic (Tx/Rx)' },
        credits: { enabled: false },
        xAxis: { type: 'datetime', minorTickInterval: 'auto' },
        yAxis: {
            labels: { formatter: function() { return bytes(this.value, true); } },
            title: { text: 'Bandwidth Rate' },
            floor: 0,
            allowDecimals: true,
            min: 0,
            minorTickInterval: 'auto'
        },
        tooltip: { enabled: true, formatter: function() { return bytes(this.y, true); } },
        legend: { enabled: false },
        plotOptions: {
            areaspline: {
                animation: false,
                marker: { enabled: true, radius: 1 },
                lineWidth: 1,
                states: { hover: { lineWidth: 3 } }
            }
        },
        series: [
            { type: 'areaspline', name: 'TX', color: '#346870', data: (function () {
                var data = [], time = (new Date()).getTime(), i;
                for (i = -20; i <= 0; i += 1) {
                    data.push({ x: time + i * 1000, y: 0 });
                }
                return data;
            }()) },
            { type: 'areaspline', name: 'RX', color: '#0b6b24', data: (function () {
                var data = [], time = (new Date()).getTime(), i;
                for (i = -20; i <= 0; i += 1) {
                    data.push({ x: time + i * 1000, y: 0 });
                }
                return data;
            }()) }
        ]
    });

    // streamProcessor(userTrafficUrl + userId);
});