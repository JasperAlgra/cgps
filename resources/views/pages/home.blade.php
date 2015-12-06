@extends('layouts.dashboard')

@section('section')
    <div class="conter-wrapper home-container">
        <div class="row home-row">
            <div class="col-md-4 col-lg-3">
                @include('widgets.stats',array('icon'=>'cloud-upload','value'=>'88','bgclass'=>'info', 'link'=>'c3chart', 'progress-value'=>'88','text'=> Lang::get(\Session::get('lang').'.stat1')))
            </div>
            <div class="col-md-4">
                @include('widgets.stats',array('icon'=>'heartbeat','value'=>'94','bgclass'=>'success', 'link'=>'c3chart', 'progress-value'=>'88','text'=>Lang::get(\Session::get('lang').'.stat2')))
            </div>
            <div class="col-md-4">
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

    <script>

        // How much data to fetch (start) at loading of page
        var loadStartData = '-24hours';
        // How much data to fetch (end) at loading of page
        var loadEndDate = '';
        // minRange for graphs. 24*3600*1000 = 1 day
        var minRange = 2 * 3600 * 1000;

        if (!graphHeight) var graphHeight = 400;

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
            timers.push(setInterval('updateData("chartSims")', 60000));
            timers.push(setInterval('updateData("chartSockets")', 60000));
            timers.push(setInterval('updateData("chartUsers")', 60000));
            timers.push(setInterval('updateData("chartQueue")', 60000));
            timers.push(setInterval('updateData("chartTemp")', 60000));
            timers.push(setInterval('updateHeatMap()', 300000));
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

        function afterSetExtremes(e) {

            var chart = $('#chartVoltage').highcharts();
            console.log(e);
            // Get current extremes
            var current = chart.axes[0].getExtremes();
            if (e.max > current.max || e.min < current.min) {
                console.log("getting more data");

                var start = Math.round(e.min) / 1000;
                var end = Math.round(e.max) / 1000;

                $.getJSON('/graph/jsonData/chartVoltage/' + start + '/' + end, function (data) {
                    console.log("data", data);

                    // Add all series to the chart
                    for (var i = 0; i < data.series.length; i++) {

                        if (data.series[i].data) {
                            // Add new data to chart
                            for (var j = 0; j < data.series[i].data.length; j++) {
                                // add point to chart serie
                                chart.series[i].addPoint(data.series[i].data[j], false, true);
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


        }

        /** Load the graph **/
        $.getJSON('/graph/jsonData', function (data) {
            console.log('loading', data.series);
            $('#chartVoltage').highcharts('StockChart', {
                chart: {
                    zoomType: 'x',
//                    ordinal: false
                },
                rangeSelector: {

                    buttons: [{
                        type: 'day',
                        count: 3,
                        text: '3d'
                    }, {
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
                    selected: 3
                },

                xAxis: {
                    ordinal: false,
                    events: {
                        setExtremes: afterSetExtremes
                    }
                },

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