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

        // Default to FROM -1 days TO now UCT
        if (is_null($start)) $start = date("Y-m-d H:i:s", strtotime("-7 day"));
        if (is_null($end)) $end = date("Y-m-d H:i:s", strtotime("now"));

        // Get the graph data
        $graphData = NULL;

        DB::enableQueryLog();
        $voltages = DB::table('reports')
            ->join('voltages', 'reports.id', '=', 'voltages.report_id')
            ->select('reports.id','reports.datetime', 'voltages.input', 'voltages.value')
//            ->groupBy('reports.id','voltages.input')
            ->whereBetween('reports.datetime', [$start, $end])
            ->get();

        $log = DB::getQueryLog();

        $adasd = true;

//        $result['perfData'][] = Array((floatval($value[0]) ) * 1000, floatval(round($value[1],$round)));

        // Sort in array grouped by input
        foreach($voltages as $volt) {
            $graphData[$volt->input][] = Array(
                // Convert from unix time to javascript (*1000)
                floatval(strtotime($volt->datetime)*1000),
                $volt->value
            );
        }

        $series = Array();
        foreach ($graphData as $key=>$value) {
            $series[] = Array(
                'name' => $key,
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
