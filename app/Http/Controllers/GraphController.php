<?php
/**
 * [Short description for file]
 *
 * [Long description for file (if any)...]
 *
 * @category   EuropeTrack 2.0
 * @package    EuropeTrack 2.0
 * @author     Jasper Algra <jasper@yarp-bv.nl>
 * @copyright  (C)Copyright 2015 YARP B.V.
 * @version    CVS: $Id:$
 * @since      3-12-2015 / 20:21
 */


namespace App\Http\Controllers;

use App\Device;
use App\Report;
use DB;
use Response;
use Request;

class GraphController extends Controller
{

    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function jsonData(Request $request, $type = '', $start = NULL, $end = NULL)
    {

        $test = \Input::all();
        // Convert from from string to UTC
        if (!is_null($start) AND !is_numeric($start)) $start = date("Y-m-d H:i:s", strtotime($start));
        if (!is_null($end) AND !is_numeric($end)) $end = date("Y-m-d H:i:s", strtotime($end));

        // Convert from numeric (possible timestamp) to UTC
        if (!is_null($start) AND is_numeric($start)) $start = date("Y-m-d H:i:s", $start);
        if (!is_null($end) AND is_numeric($end)) $end = date("Y-m-d H:i:s", $end);

        // Get the last report from db to find time
        $lastReport = DB::table('reports')
            ->select('datetime')
            ->orderBy('datetime', 'DESC')
            ->limit(1)
            ->first();
        // Default to last point from DB to 4 hours before that
        if (is_null($end)) $end = $lastReport->datetime;
//        if (is_null($start)) $start = date("Y-m-d H:i:s", strtotime($end .' - 4 hour'));
        if (is_null($start)) $start = date("Y-m-d H:i:s", strtotime($end .' - 1 year'));

        // Default to FROM -1 days TO now UCT
//        if (is_null($start)) $start = date("Y-m-d H:i:s", strtotime("-7 day"));
//        if (is_null($end)) $end = date("Y-m-d H:i:s", strtotime("now"));

        // Get the graph data
        $graphData = NULL;

        DB::enableQueryLog();
        $voltages = DB::table('reports')
            ->join('voltages', 'reports.id', '=', 'voltages.report_id')
            ->select('reports.datetime', 'voltages.input', 'voltages.value')
            ->orderBy('voltages.input')
            ->orderBy('reports.datetime', 'ASC')
            //            ->groupBy('reports.id','voltages.input')
            ->whereBetween('reports.datetime', [$start, $end])
            ->get();

        $log = DB::getQueryLog();

        // Sort in array grouped by input
        foreach($voltages as $volt) {
            $graphData[$volt->input][] = Array(
                // Convert from unix time to javascript (*1000)
                floatval(strtotime($volt->datetime)*1000),
                floatval($volt->value)
            );
        }

        $series = Array();
        foreach ($graphData as $key=>$value) {

            // add one data point of 1 jan 2015 to beginning of data to fake bigger range for highcharts
//            array_unshift($value, Array(1420066800000,0));

            $series[] = Array(
                'name' => 'Input'. $key,
//                'pointStart' => strtotime($start)*1000,
//                'type'=> 'area',
//                'pointinterval' => 60000,
//                'xAxis' => $key,
//                'yAxis' => $key,
                'tooltip' => Array(
                    'valueDecimals' => 2,
                    'valueSuffix' => 'Volt',
                ),
                'dataGrouping' => Array(
                    'enabled'   => false
                ),
                'data' => $value
            );
        }

        // Compensate for server time offset (daylight saving..)
//        $serverTimeOffset = date_offset_get(new DateTime);

        $result = Array(
            'time' => Array(
                'start' => ($start ? $start : NULL),
                'end' => ($end ? $end : NULL)
            ),
            'series' => $series
        );

//        echo json_encode($result, JSON_PRETTY_PRINT);

       return Response::json($result, 200);
    }


}
