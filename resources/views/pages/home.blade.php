@extends('layouts.dashboard')

@section('section')
    <div class="conter-wrapper home-container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Upload CSV</h3>
                    </div>
                    <div class="panel-body">
                        <div class="dropzone" id="dropzoneFileUpload"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                @include('widgets.stats',array('icon'=>'cloud-upload','value'=>'88','bgclass'=>'info', 'link'=>'c3chart', 'progress-value'=>'88','text'=> Lang::get(\Session::get('lang').'.stat1')))
            </div>
            <div class="col-md-2">
                @include('widgets.stats',array('icon'=>'heartbeat','value'=>'94','bgclass'=>'success', 'link'=>'c3chart', 'progress-value'=>'88','text'=>Lang::get(\Session::get('lang').'.stat2')))
            </div>
            <div class="col-md-3">
                @include('widgets.stats',array('icon'=>'flag','value'=>'88','bgclass'=>'danger', 'link'=>'inbox', 'progress-value'=>'94','text'=>Lang::get(\Session::get('lang').'.stat3')))
            </div>
        </div>

        <div class="row home-row">
            <div class="col-lg-12">
                <div class="home-charts-middle">
                    <div id="chartVoltage">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    @parent
    {{--<script src="{{ asset("js/highcharts.js")}}"></script>--}}
    <script src="{{ asset("js/highstock/highstock.js")}}"></script>
    <script src="{{ asset("js/highstock/plugins/beyond-extremes.js")}}"></script>

    <script>

        // How much data to fetch (start) at loading of page
        var loadStartData = '-24hours';
        // How much data to fetch (end) at loading of page
        var loadEndDate = '';
        // minRange for graphs. 24*3600*1000 = 1 day
        var minRange = 2 * 3600 * 1000;

        if (!graphHeight) var graphHeight = 800;

        /**
         * Updateinterval in seconds
         * @type {number}
         */
        var updateInterval = 420;

        /** object to store timers in **/
        var timers = [];

        // Start the refresh-timers
        $(document).ready(function () {
            setTimers();
        });


        /** Start timers for all charts
         * Stores them in the timers array
         */
        function setTimers() {
//            timers.push(setInterval('updateData("chartVoltage")', 60000));
        }
        /**
         * Stop all timers
         */
        function stopTimers() {
            for (var i = 0; i < timers.length; i++) {
                clearInterval(timers[i]);
            }
        }

        /**
         * Fetches new data for graph and add to graph ending
         */
        function updateData(chartName) {
            return true;

            var chart = $("#" + chartName).highcharts();

            // Fetch data until last point of the graph
            var lastPoint = chart.series[0].xAxis.dataMax;

            $.get('/graph/jsonData/' + chartName + '/' + lastPoint, function (data) {
                console.log("data", data);

                // Add all series to the chart
                for (var i = 0; i < data.series.length; i++) {

                    if (data.series[i].data) {
                        // Add new data to chart
                        for (var j = 0; j < data.series[i].data.length; j++) {
                            // add point to chart serie
                            chart.series[i].addPoint(data.series[i].data[j], false, true);
                        }
                    }

                }
                // Redraw
                chart.redraw();

                // Set a new timestamp
                $("#" + chartName).prev("p.time").html(moment().format('H:mm'));
            }, 'json');
        }

        function setExtremes(e) {
//            console.log("setExtremes", e);
            // Only get more on rangeSelector
            if (e.trigger === "rangeSelectorInput") {
                var start = Math.round(e.min) / 1000;
                var end = Math.round(e.max) / 1000;
                getNewData(start, end);
            }
        }

        function afterSetExtremes(e) {

            var chart = $('#chartVoltage').highcharts();
//            console.log(e);
            // Get current extremes
            var current = chart.axes[0].getExtremes();
            if (e.max > current.max || e.min < current.min) {
                var start = Math.round(e.min) / 1000;
                var end = Math.round(e.max) / 1000;
                getNewData(start, end);
            } else {
                console.log("data remains the same");

            }


        }

        function getNewData(start, end) {
            console.log("getNewData");
            var chart = $('#chartVoltage').highcharts();

            start = Math.round(start) / 1000;
            end = Math.round(end) / 1000;
            $.getJSON('/graph/jsonData/chartVoltage/' + start + '/' + end, function (data) {
                console.log("data", data);

                // Add all series to the chart
                for (var i = 0; i < data.series.length; i++) {

                    if (data.series[i].data) {
                        // Add new data to chart
                        for (var j = 0; j < data.series[i].data.length; j++) {
                            // add point to chart serie
//                                chart.series[i].addPoint(data.series[i].data[j], false, true);
//                            chart.series[0].setData(data);
                            chart.series[i].setData(data.series[i].data[j]);
//                            chart.hideLoading();
                        }
                    }

                }
                // Redraw
//                chart.redraw();
            });
        }

        /** Load the graph **/
        $.getJSON('/graph/jsonData', function (data) {
//            console.log('loading', data.series);
            $('#chartVoltage').highcharts('StockChart', {
                chart: {
                    zoomType: 'x',
                    height: graphHeight
                },
                navigator: {
                    adaptToUpdatedData: false,
                },
                scrollbar: {
                    liveRedraw: false
                },
                rangeSelector: {
                    // With plugin beyondExtremes
//                    beyondExtremes: true,

                    buttons: [
                        {
                            type: 'second',
                            count: 60,
                            text: '1 sec'
                        },
                        {
                            type: 'minute',
                            count: 30,
                            text: '30min'
                        },
                        {
                            type: 'day',
                            count: 1,
                            text: '1d'
                        },
                        {
                            type: 'week',
                            count: 1,
                            text: '1w'
                        }, {
                            type: 'month',
                            count: 1,
                            text: '1m'
                        }, {
                            type: 'month',
                            count: 6,
                            text: '6m'
                        }, {
                            type: 'year',
                            count: 1,
                            text: '1y'
                        }, {
                            type: 'all',
                            text: 'All'
                        }],
                    selected: 0
                },

                xAxis: {
//                    minRange: 6 * 3600 * 1000,  // number of hours
                    ordinal: false,
                    events: {
                        afterSetExtremes: function (e) {
                            console.log("afterSetExtremes", e);
                            /*Could fetch new data for the new extremes here*/

                            console.log("E", 'min: ' + Highcharts.dateFormat(null, e.min) +
                                    ' | max: ' + Highcharts.dateFormat(null, e.max) + ' | e.trigger: ' + e.trigger);

                            // check if new data is needed
                            var chart = $('#chartVoltage').highcharts();
                            var current = chart.axes[0].getExtremes();
                            console.log("C", "min: " + Highcharts.dateFormat(null, e.min) +
                                    ' | max: ' + Highcharts.dateFormat(null, e.max)
                            );
//                            if (e.trigger === "rangeSelectorInput" && e.min < current.min) {
                            if (e.trigger === "rangeSelectorInput") {
                                // Get new data
                                getNewData(e.min, e.max);
                            }
                        }
//                        afterSetExtremes: afterSetExtremes
                    }
                },
                yAxis: [{ // Primary yAxis
                    labels: {
                        format: '{value} V',
                        style: {
//                            color: Highcharts.getOptions().colors[2]
                        }
                    },
                    title: {
                        text: 'Voltage',
                        style: {
//                            color: Highcharts.getOptions().colors[2]
                        }
                    },
                    opposite: true

                }, { // Secondary yAxis
                    gridLineWidth: 0,
                    title: {
                        text: 'Watt',
                        style: {
//                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        format: '{value} W',
                        style: {
//                            color: Highcharts.getOptions().colors[0]
                        }
                    }
                }],

                title: {
//                    text: 'Hourly temperatures in Vik i Sogn, Norway, 2009-2015'
                },

                series: data.series
            });
        });

        //        /** Load the graph **/
        //        $.getJSON('/graph/jsonData', function (data) {
        //            console.log('loading', data.series);
        //            $('#chartVoltage').highcharts({
        //                chart: {type: 'line', marginRight: 50, height: graphHeight, backgroundColor: null, zoomType: 'x'},
        //                title: {text: ''},
        //                xAxis: {type: 'datetime', tickPixelInterval: 150, /*minRange: minRange*/},
        //                yAxis: {title: {text: ''}, plotLines: [{value: 0, width: 1, color: '#808080'}]},
        //                legend: {enabled: true},
        //                exporting: {enabled: false},
        //                tooltip: {shared: true},
        //                series: data.series
        //            });
        //        });
    </script>
@stop

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset("css/dropzone.css")}}">
@stop

@section('js')
    @parent

    <script src="{{ asset("js/dropzone.js")}}"></script>

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/cgps/file",
            params: {
                _token: token
            }
        })
                .on("addedfile", function (file) {
                    console.log(file);
                    /* Maybe display some more file information on your page */
                });

        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 20, // MB
            addRemoveLinks: true,
            accept: function (file, done) {

            },

        };
    </script>
@stop