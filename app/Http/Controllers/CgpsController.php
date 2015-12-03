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
 * @since      3-12-2015 / 20:47
 */

namespace App\Http\Controllers;

use App\CGPS\CGPS;
use Log;

class CgpsController extends Controller
{

    public function receive()
    {

        $ReceptionVariableName = 'DecodeHttpData';

        if(!isset($_GET[$ReceptionVariableName])) die ("No GET variable '{$ReceptionVariableName}' found");

        //Create an instance of the CGPS class and initialize it with the received module data.
        $ModuleDataString = $_GET[$ReceptionVariableName];
        $pcGPS = new CGPS();
        $pcGPS->ClearResponseActionMembers(); //Clear all response action members in the class by setting them to neutral.
        if (!$pcGPS->SetHttpData($ModuleDataString)) //Set class with received data.
        {
            //The class did not accept the received data.
            Log::info($pcGPS->GetLastError() . ". Received data string: $ModuleDataString");
//            LogError($pcGPS->GetLastError() . ". Received data string: $ModuleDataString"); //Add message to the error log.

            $this->UnwantedOutputCheckpoint(2); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
            print($pcGPS->BuildResponseHTTP(0)); //Makes the module retry later (assuming the transmission actually came from a module).
            exit(0); //Silent script exit.
        }

        //Get extra binary data if the module included it (e.g. picture data from a photo) and verify the data size
        $ExtraModuleData = @file_get_contents('php://input');
        if ($pcGPS->CanGetExtraDataSize() && ($pcGPS->GetExtraDataSize() != strlen($ExtraModuleData))) {
            //The data size does not match the received data size.
            LogError('ERROR: Extra data size mismatch. Module ' . $pcGPS->GetImei() . ' transmitted ' . $pcGPS->GetExtraDataSize() . ' bytes of extra data of which ' . strlen($ExtraModuleData) . " were received together with data string: $ModuleDataString");
            UnwantedOutputCheckpoint(3); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
            print($pcGPS->BuildResponseHTTP(0)); //Let the module know that it was not accepted
            exit(0); //Silent script exit.
        }

        //Process the received data.
        if (isset($All_MySQL_variables_are_properly_set_to_enable_database_support)
            && $All_MySQL_variables_are_properly_set_to_enable_database_support === true
        ) //See "DATABASE STORAGE EXAMPLE" information above.
        {
            //Store incoming data in the existing database.
            $NumberOfProcessedDataParts = StoreInDatabase($pcGPS, $ExtraModuleData);
            if (UnwantedOutputCheckpoint(4)) exit(0); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
        } else if (isset($All_data_forwarding_variables_and_code_are_properly_modified_to_support_it)
            && $All_data_forwarding_variables_and_code_are_properly_modified_to_support_it === true
        ) //See "DATAFORWARDING EXAMPLE" information above.
        {
            //Forward incoming extracted and converted into dedicated form to another script/computer/device.
            $NumberOfProcessedDataParts = ForwardData($pcGPS, $ExtraModuleData);
            if (UnwantedOutputCheckpoint(5)) exit(0); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
        } else {
            //This message below will be written to your error log file until you properly modified this script to actually perform any handling.
            Log::error("Received data not stored or forwarded because you have not modified the program to do that. Received data: $ModuleDataString");
//            LogError("Received data not stored or forwarded because you have not modified the program to do that. Received data: $ModuleDataString");
            $NumberOfProcessedDataParts = $pcGPS->GetDataPartCount(); //Just pretend all data parts are handled, otherwise the module retry forever.
        }


    }


    function LogError($ErrorMessage)
    {

        //### CHANGE ### to the name/location of your error log text file.
        $LogFileName = "cgpsErrorLog.txt";
        if (!defined('PHP_EOL')) define('PHP_EOL', "\r\n");

        //This function writes messages to the error log file of which you can set the file name above.
        //Notice the usage of the @ character in this function and throughout the source code
        //(and the rest of this script) to suppress any possible HTML error/warning output,
        //because otherwise it will be sent to a transmitting module and not appear on some screen.
        for ($Retries = 0; $Retries < 5; $Retries++) //Do some retries if the file is already in use
        {
            $hFile = @fopen($LogFileName, 'a'); //Create new file, or append to existing one
            if ($hFile) {
                //### CHANGE ### Set your preferred time zone in the following line (or remove/disable it when you use a PHP version older than v5.1)
                date_default_timezone_set('UTC'); //Some time zone examples: 'ADT' 'CET' 'EET' 'America/New_York' 'Australia/Tasmania'
                $Log = '###' . date('r', time()) . '### ' . $ErrorMessage . PHP_EOL;
                @fwrite($hFile, $Log);
                @fclose($hFile);
                return true;
            }
            sleep(1);
            @chmod($LogFileName, 0644);
        }
        return false;
    }

//This is a simple function that is called in the code at several checkpoints.
//It checks if your script generated any text/error/warning output that you
//of course should take care of that it does not happen.
//If any output is detected, a message about it will be written to your error
//log file, including the given checkpoint number where output was detected.
    function UnwantedOutputCheckpoint($CheckpointNumber)
    {
        if (headers_sent()) {
            //There has been output, so write a message about it in the error log file
            LogError(">>>>> Unwanted output (e.g. text/warning/error) detected before \"UnwantedOutputCheckpoint($CheckpointNumber)\" in the script " . $_SERVER['PHP_SELF']);
            print("\r\n"); //Send as additional output to the module so it can still recognize a real acknowledge that may follow.
            return true;
        }
        return false; //No output detected
    }



//Function to store incoming transmissions in an existing database as suggested above.
    function StoreInDatabase(&$pcGPS, $ExtraModuleData)
    {

        $Host='localhost';					//Change into the IP or www.domain.com name of your SQL server. (use loopback IP '127.0.0.1' or 'localhost' when it is running on the same computer as this script).
        $MySqlLogin='root';					//Change into the login that you have set as login for your SQL server.
        $MySqlPassword='';					//Change into the password that you have set for your SQL server.
// The name of your database, table and columns below can be changed if you like but should be fine just the way they are.
// But if you do, use only a..z A..Z and 0..9 characters and no spaces.
        $MySqlDatabaseName='DataBaseName';	//The name of the database that you want to use.
        $MySqlTableName='TableName';		//The name of the table in the database that holds the data.
        $MySqlColumnRecord='Record';		//The table field/column name in the database that holds the record number.
        $MySqlColumnDateTime='DateTime';	//The table field/column name in the database that holds the date/time.
        $MySqlColumnImei='Imei';			//The table field/column name in the database that holds the IMEI.
        $MySqlColumnSwitch='Switch';		//The table field/column name in the database that holds the Switch.
        $MySqlColumnEventID='EventID';		//The table field/column name in the database that holds the EventID.
        $MySqlColumnLatitude='Latitude';	//The table field/column name in the database that holds the latitude in small storage form.
        $MySqlColumnLongitude='Longitude';	//The table field/column name in the database that holds the longitude in small storage form.
        $MySqlColumnIO='IO';				//The table field/column name in the database that holds the Input/Output lines status.
        $MySqlColumnData='Data';			//The table field/column name in the database that holds the raw module data (e.g. position/status).
        $MySqlColumnExtra='Extra';			//The table field/column name in the database that holds the extra module data (e.g. pictures/data).
// When you have properly set all SQL variables above, change FALSE to TRUE below to enable database support and user interface when you run the program.
        $All_MySQL_variables_are_properly_set_to_enable_database_support=false;

        //This example function adds a new record with the received data to the
        //database.
        //Do *NOT* generate any text/error/warning output because that will be sent to
        //the module that called the script and will not appear on screen in a browser,
        //so log all messages in a file like with your LogError() function above.
        //Do *NOT* abort the script or generate output (e.g. exit/die/echo/print/PHP-errors/...)
        //because then the module will not receive a proper response.
        //Also do *NOT* make the module wait for a response, because it will time-out
        //and will retry sending the same data again.
        //This function uses a PDO driver to connect to and work with the database like
        //MySQL as below, but you can of course use any database you wish.
        $ProcessedDataParts=0; //Create a variable starting at value 0 that we increase per processed data part
        //Connect to the database.
        try
        {
            $dbh=new PDO("mysql:host=$Host;dbname=$MySqlDatabaseName", $MySqlLogin, $MySqlPassword);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Prepare SQL query to store the extracted data in the database.
            $query=$dbh->prepare
            (
                "INSERT INTO $MySqlTableName ("
                ."$MySqlColumnDateTime,"
                ."$MySqlColumnImei,"
                ."$MySqlColumnSwitch,"
                ."$MySqlColumnEventID,"
                ."$MySqlColumnLatitude,"
                ."$MySqlColumnLongitude,"
                ."$MySqlColumnIO,"
                ."$MySqlColumnData,"
                ."$MySqlColumnExtra )"
                ." VALUES (:DateTime,:Imei,:Switch,:EventID,:Latitude,:Longitude,:IO,:Data,:Extra)"
            );
            for(;$ProcessedDataParts<$pcGPS->GetDataPartCount();$ProcessedDataParts++)
            {
                //Select next data part in the class if the module combined multiple transmissions.
                if(!$pcGPS->SelectDataPart($ProcessedDataParts) || !$pcGPS->IsValid())
                {
                    LogError($pcGPS->GetLastError().'. Data string: '.$pcGPS->GetHttpData());
                    continue;
                }

                //Extract and insert items that you store double per record
                //in your database to find back the record later.
                $query->execute
                (
                    array
                    (
                        ':DateTime'=>$pcGPS->GetUtcTimeMySQL(), //###NOTE### intentionally in UTC time. That way it can be automatically converted at display time in the time preferred time zone of every user individually
                        ':Imei'=>$pcGPS->GetImei(),
                        ':Switch'=>$pcGPS->GetSwitch(),
                        ':EventID'=>( $pcGPS->CanGetEventID() ? $pcGPS->GetEventID() : 0 ), //Using value 0 for records without EventID
                        ':Latitude'=>$pcGPS->GetLatitudeSmall(),
                        ':Longitude'=>$pcGPS->GetLongitudeSmall(),
                        ':IO'=>$pcGPS->GetIO(),
                        ':Data'=>$pcGPS->GetBinaryData(), //The real data containing the above already and much more in compact form
                        ':Extra'=>$ExtraModuleData //Possibly included extra data
                    )
                );
            }
            //Close database
            $dbh = null;
        }
        catch (PDOException $e)
        {
            LogError('Error in StoreInDatabase(): '.$e->getMessage());
        }
        return $ProcessedDataParts; //Return the number of data parts that were processed
    }



}