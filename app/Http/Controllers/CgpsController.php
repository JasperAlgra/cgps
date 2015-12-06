<?php
/**
 * [Short description for file]
 *
 * [Long description for file (if any)...]
 *
 * @category      EuropeTrack 2.0
 * @package       EuropeTrack 2.0
 * @author        Jasper Algra <jasper@yarp-bv.nl>
 * @copyright  (C)Copyright 2015 YARP B.V.
 * @version       CVS: $Id:$
 * @since         3-12-2015 / 20:47
 */

namespace App\Http\Controllers;

use App\CGPS\CGPS;
use App\Data;
use App\Device;
use App\Report;
use App\Report_data;
use App\Voltage;
use Exception;
use Log;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Input;
use Validator;
use File;
use Response;

class CgpsController extends Controller
{
    /**
     * If set to false no writing to DB will occur
     * @var
     */
    var $writeToDB;

    /**
     * Storage for last error
     *
     * @var
     */
    var $lastError;

    /**
     * Response to module
     * @var
     */
    var $responseString;

    function __construct()
    {
        // Default to true
        $this->writeToDB = true;
    }

    /**
     * GET function to check received data from unit
     * and save to DB if right
     *
     * @param Request $request
     */
    public function receive(Request $request)
    {

        $ReceptionVariableName = 'DecodeHttpData';

        $ModuleDataString = $_GET[$ReceptionVariableName];
        if (!isset($ModuleDataString)) die ("No GET variable '{$ReceptionVariableName}' found");


        // Try to parse the data
        try {
            $pcGPS = $this->parseData($ModuleDataString);
        } catch (Exception $e) {
            //Makes the module retry later (assuming the transmission actually came from a module).
            if(!empty($this->responseString)) print($this->responseString);
            //Silent script exit.
            exit(0);
        }

        // Check if data needs to be saved
        if ($request->input('save') === "false") $this->writeToDB = false;

        // Save to db
        $this->saveToDb($pcGPS);

    }

    /**
     * File upload POST
     *
     * @return \Illuminate\Http\Response
     */
    public function file()
    {
        // POST input
        $input = Input::all();

        // The rules
        $rules = array(
            'file' => 'max:30000',
        );

        // Validate
        $validation = Validator::make($input, $rules);

        // Return error on failure
        if ($validation->fails()) {
            return Response::make($validation->errors()->first(), 400);
        }

        // upload path
        $destinationPath = 'uploads';
        // getting file extension
        $extension = Input::file('file')->getClientOriginalExtension();
        // Rename
        $fileName = rand(11111, 99999) . '.' . $extension;
        // uploading file to given path
        $upload_success = Input::file('file')->move($destinationPath, $fileName);

        if ($upload_success) {

            // Get the file contents
            $contents = File::get($upload_success);

            // Parse line by line
            $lines = preg_split("/((\r?\n)|(\r\n?))/", $contents);
            for($i=0; $i < count($lines); $i++) {
                // Skip empty lines + lines not 60 char long
                if(empty($lines[$i]) or $lines[$i] === "") continue;
                // Parse the data
                try {
                    $pcGPS = $this->parseData($lines[$i]);
                    $this->saveToDb($pcGPS);
                } catch (Exception $e) {
                    return Response::json("Error {$e} on line {$i}", 400);
                }
            }
            // On success
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    /**
     * Parsing data
     * @param $moduleData
     * @return CGPS
     * @throws Exception
     */
    public function parseData($moduleData)
    {

        // Initiate new CGPS class object
        $pcGPS = new CGPS();
        //Clear all response action members in the class by setting them to neutral.
        $pcGPS->ClearResponseActionMembers();

        // Check if class accepts data
        if (!$pcGPS->SetHttpData($moduleData)) {

            // Log
            Log::error($pcGPS->GetLastError() . ". Received data string: $moduleData");

            // Save a response string to pass back
            $this->responseString = $pcGPS->BuildResponseHTTP(0);

            // Throw exception
            throw new Exception($pcGPS->GetLastError() . ". Received data string: $moduleData");
        }

        return $pcGPS;
    }

    /**
     * Save the data from CGPS class to DB
     *
     * @param CGPS $pcGPS
     */
    private function saveToDb(CGPS $pcGPS)
    {

        // Check amount of parts in the data
        $dataParts = $pcGPS->GetDataPartCount();

        // Loop trough the parts
        for ($i = 0; $i < $dataParts; $i++) {
            // Select next data package and check if part is valid
            if (!$pcGPS->SelectDataPart($i) OR !$pcGPS->IsValid()) {
                Log::error($pcGPS->GetLastError() . '. Data string: ' . $pcGPS->GetHttpData());
                continue;
            }

            // Should we write to the database?
            if ($this->writeToDB === false) continue;

            // Find the device
            $IMEI = $pcGPS->GetImei();

            // If not in DB add
            $device = Device::firstOrCreate(array('IMEI' => $IMEI));

            // Write report for this device to the DB
            $report = $device->reports()->create([
                'datetime' => $pcGPS->GetUtcTimeMySQL(),
                'switch' => $pcGPS->GetSwitch(),
                'eventId' => $pcGPS->CanGetEventID(),
                'lat' => (($pcGPS->CanGetLatLong() OR $pcGPS->CanGetLatLongInaccurate()) ? sprintf('%.5f', (float)$pcGPS->GetLatitudeFloat()) : null),
                'lon' => (($pcGPS->CanGetLatLong() OR $pcGPS->CanGetLatLongInaccurate()) ? sprintf('%.5f', (float)$pcGPS->GetLongitudeFloat()) : null),
                'IO' => $pcGPS->GetIO(),
            ]);

            // Save data
            $reportData = new Data(['data' => $pcGPS->GetBinaryData()]);
//            $data = $report->data;
//            $data->data = $pcGPS->GetBinaryData();
            $report->data()->save($reportData);


            // Save voltage
            if($pcGPS->CanGetAnalogInputs()) {
                $report->voltages()->saveMany([
                    new Voltage(['input' => '1', 'value' => $pcGPS->GetAnalogInput1()]),
                    new Voltage(['input' => '2', 'value' => $pcGPS->GetAnalogInput2()]),
                    new Voltage(['input' => '3', 'value' => $pcGPS->GetAnalogInput3()]),
                    new Voltage(['input' => '4', 'value' => $pcGPS->GetAnalogInput4()]),
                ]);
            }

        }

    }


}