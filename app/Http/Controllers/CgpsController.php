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
    use App\Report;
    use Log;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;

	class CgpsController extends Controller
	{
        /**
         * If set to false no writing to DB will occur
         * @var
         */
        var $writeToDB;

        function __construct() {
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

			if (!isset($_GET[$ReceptionVariableName])) die ("No GET variable '{$ReceptionVariableName}' found");

			//Create an instance of the CGPS class and initialize it with the received module data.
			$ModuleDataString = $_GET[$ReceptionVariableName];
			$pcGPS = new CGPS();
			$pcGPS->ClearResponseActionMembers(); //Clear all response action members in the class by setting them to neutral.

			if (!$pcGPS->SetHttpData($ModuleDataString)) {
				//The class did not accept the received data.
				Log::error($pcGPS->GetLastError() . ". Received data string: $ModuleDataString");
                //Makes the module retry later (assuming the transmission actually came from a module).
                print($pcGPS->BuildResponseHTTP(0));
                //Silent script exit.
                exit(0);
			}

            if($request->input('save') === "false") $this->writeToDB = false;
            $this->saveToDb($pcGPS);

		}

        public function upload() {

            return view('upload');
        }

        /**
         * Save the data from CGPS class to DB
         *
         * @param CGPS $pcGPS
         */
        private function saveToDb(CGPS $pcGPS) {

            // Check amount of parts in the data
            $dataParts = $pcGPS->GetDataPartCount();

            // Loop trough the parts
            for($i=0; $i < $dataParts; $i++) {
                // Select next data package and check if part is valid
                if(!$pcGPS->SelectDataPart($i) OR !$pcGPS->IsValid()) {
                    Log::error($pcGPS->GetLastError().'. Data string: '.$pcGPS->GetHttpData());
                    continue;
                }

                // Should we write to the database?
                if($this->writeToDB === false) continue;

                // Write to the DB
                $report = Report::create([
                    'IMEI' => $pcGPS->GetImei(),
                    'datetime' => $pcGPS->GetUtcTimeMySQL(),
                    'switch' => $pcGPS->GetSwitch(),
                    'eventId' => $pcGPS->CanGetEventID(),
                    'lat' => (($pcGPS->CanGetLatLong() OR $pcGPS->CanGetLatLongInaccurate()) ? sprintf('%.5f', (float)$pcGPS->GetLatitudeFloat()) : null),
                    'lon' => (($pcGPS->CanGetLatLong() OR $pcGPS->CanGetLatLongInaccurate()) ? sprintf('%.5f', (float)$pcGPS->GetLongitudeFloat()) : null),
                    'IO' => $pcGPS->GetIO(),
                    'data' => $pcGPS->GetBinaryData(),
                ]);
            }

        }




	}