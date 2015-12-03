<?php $EXAMPLE_SERVER_VERSION='cgpsexample.php v29 (requires cgps.php v70 or greater)';
$EXAMPLE_SERVER_DESCRIPTION='This functional example server program shows you how to:
- receive the data and respond to it when a module transmits to your computer.
- use the CGPS class to extract information from received module data and how to upload things like commands/data to a module.
- store incoming module transmissions in a database (including a simple user interface to create/display/search/.. a database).
- forward incoming data in a dedicated format to a device, server script or program that can not make use of the CGPS class directly.

Read the documentation that is mixed in the source code of this program in a text editor (or a <A HREF="http://en.wikipedia.org/wiki/List_of_PHP_editors">PHP editor</A> but do NOT use a Word processor)
and make just a few custom changes where marked to make this server program functional for your computer and turn it into server.
But that is only a small part of the code, the biggest part is removable and exists only for you to easily experiment with
data and database creation/storage/decoding/manipulation, including uploading commands/settings/firmware/... to the module.

System requirements for this example code:
- CGPS class for extracting information from the module data.
- HTTP server software (e.g. Apache (info and free download from <A HREF="http://apache.org">apache.org</A>) or MS-IIS (included with Windows Server/Pro editions)).
- PHP (v5 or higher) scripting language (info and free download from <A HREF="http://php.net">php.net</A>).
- PDO supporting database engine like for example MySQL (info and free download from <A HREF="http://mysql.com">mysql.com</A>).
Single installer suggestion for Apache+PHP+MySQL: <A HREF="http://apachefriends.org/en/xampp.html">xampp</A>';





//////////////////////////////////////////////////////////
// Include CGPS  class code in the script so we can use it
//////////////////////////////////////////////////////////
require('cgps.php'); //A copy of this file is required in the same directory as this script having at least the version number mentioned above.




/////////////////////////////////////////////////////////////////////////////////////
// ### NOTE ###	!!! IMPORTANT !!!
// Because this script is executed when a module transmits data to your server,
// you will not be able to see any error/warning/other text output that is generated.
// Even worse, all such output will be send to the transmitting module which will not
// understand what your server sends and will probably keep retransmitting the same data.
// Therefore this script writes such messages to a log file for which you can decide
// the location and file name yourself.
// Check the contents of this log file regularly for errors (click "view error log" when
// you run this script) and especially if you experience a problem.
//Examples for your error log file name/location:
// "C:\\MyLogsDirectory\\cgpsErrorLog.txt" (Windows example. Notice the required double backslash).
// "/var/MyLogsDirectory/cgpsErrorLog.txt" (Unix/Linux example).
//!!! Make sure the directory already exists and allows the user account from which
//!!! this script is executed by your HTTP server to create (and write to) your log file.
/////////////////////////////////////////////////////////////////////////////////////
$LogFileName="cgpsErrorLog.txt"; //### CHANGE ### to the name/location of your error log text file.
if(!defined('PHP_EOL')) define('PHP_EOL', "\r\n");
function LogError($ErrorMessage)
{
	//This function writes messages to the error log file of which you can set the file name above.
	//Notice the usage of the @ character in this function and throughout the source code
	//(and the rest of this script) to suppress any possible HTML error/warning output,
	//because otherwise it will be sent to a transmitting module and not appear on some screen.
	global $LogFileName;
	for($Retries=0;$Retries<5;$Retries++) //Do some retries if the file is already in use
	{
		$hFile=@fopen($LogFileName, 'a'); //Create new file, or append to existing one
		if($hFile)
		{
			//### CHANGE ### Set your preferred time zone in the following line (or remove/disable it when you use a PHP version older than v5.1)
			date_default_timezone_set('UTC'); //Some time zone examples: 'ADT' 'CET' 'EET' 'America/New_York' 'Australia/Tasmania'
			$Log='###' . date('r', time()) . '### ' . $ErrorMessage . PHP_EOL;
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
	if(headers_sent())
	{
		//There has been output, so write a message about it in the error log file
		LogError(">>>>> Unwanted output (e.g. text/warning/error) detected before \"UnwantedOutputCheckpoint($CheckpointNumber)\" in the script ".$_SERVER['PHP_SELF']);
		print("\r\n"); //Send as additional output to the module so it can still recognize a real acknowledge that may follow.
		return true;
	}
	return false; //No output detected
}










/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
// ### NOTE ###
// Surely you want to record incoming data that a modules transmit to your server.
// This example code shows contains functional examples to:
// - Store the data in a database
//		Then use the "DATABASE STORAGE EXAMPLE" part below
//		and ignore/remove the "DATA FORWARDING EXAMPLE" that follows
// - Forward data in a dedicated format to an existing system/program in a different language
//		Then use the "DATA FORWARDING EXAMPLE" part
//		and ignore/remove the "DATABASE STORAGE EXAMPLE" part below
//		and ignore/remove all other parts that are marked to be for database use only
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////









///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
// DATABASE STORAGE EXAMPLE
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
// Some background info and things for you to consider:
// By storing the raw compressed data that the module transmits, you
// automatically store ALL available information that is encoded in compressed
// form.
// This will keep your database as fast and small as possible and compatible
// with future features and changes.
// In your database records you only need to store the following two items:
// - "Data": the raw data block that the module sends which contains all kinds
//   of information.
// - "Extra": extra binary data block if the module included one with the
//   transmission (e.g. a block of data like a photo in jpeg format).
// That is all the data that there is, so naturally there should not be
// anything more you will want to record in your database and everything you
// additionally store per record would in the end of course dramatically
// influence the size and performance your data in negative sense.
// Despite of that, additionally storing some carefully selected info already
// pre-extracted from the raw data additionally per record can have benefits.
// The raw compressed data contains for example a creation date/time which
// you can simply and easily extract from the raw data, but the database can
// from that raw data not directly find back all records that contain data
// with a creation time that you ask it to gather for you.
// Since the Date/Time will probably one of the key criteria for most
// information queries you will want to do from your database contents later,
// you will want to record that date/time double per record in your database.
// Once in the actual raw data and again already pre-extracted in a format
// that your database specifically likes and has support for in terms of fast
// searching and indexing.
// Suggested items that you may want to record double in every database record,
// already pre-extracted:
// - DateTime: when module created the Data. (e.g. to search for records
//   between a certain start and end date).
// - Imei: unique serial/identification-number of the module. (e.g. to search
//   for records of one or more specific modules).
//   Please note that this example description+code assumes all received data
//   records from every hardware module to be stored into one single table in
//   the database, with a table name referred to as $MySqlTableName.
//   Depending on the number of hardware modules that you will be using and the
//   frequency that you make them transmit data records to your server, you may
//   want to consider storing the data records from each individual hardware
//   module into individual tables instead.
//   Use for example the unique IMEI number of each hardware module as table
//   name (instead of the fixed $MySqlTableName), which will eliminates the
//   need for having to store the IMEI in every record.
// - Switch: value that tells which information is encoded in the Data.
//   (e.g. to search for records that contain specific information like GPS
//   position).
// - Latitude: part of the location where the module created the Data.
//   (e.g. to search for records inside or outside a certain region).
// - Longitude: part of the location where the module created the Data.
//   (e.g. to search for records inside or outside a certain region).
// - IO: status of the (optional) digital Input/Output lines of the module.
//   (e.g. to search for records with a special IO-status like "panic button
//   pressed" or "Status loading/unloading").
// - Record: not from the module data, but an automatically incrementing unique
//   record number generated by the database, to easily find back certain
//   records with follow-up SQL queries.
// This server program by default uses the database concept suggested above to
// store incoming data and you can create a compatible database and table for
// you with a click of your mouse.
//
//	### NOTE
//	The examples and code below, consider all received data records from every
//	hardware module to be stored into one single table in the database, with a
//	table name referred to as $MySqlTableName.
//	Depending on the number of hardware modules that you will be using and the
//	frequency that you make them transmit data records to your server, you may
//	want to consider storing the data records from each individual hardware
//	module into individual tables instead.
//	Use for example the unique IMEI number of each hardware module as table
//	name (instead of the fixed $MySqlTableName), which will eliminates the
//	need for storing the IMEI in every record while that is required in the
//	example below.
//	###
//
// Here are some examples for finding back specific records from in database
// setup like this.
// You can simply ask your database to do that for you with a so called SQL
// query.
// Just assume that you want your database to find all records
// (SELECT $MySqlColumnImei, $MySqlColumnData) from the table that contains the
// received data (FROM $MySqlTableName) that was transmitted by a module
// installed in a car that has IMEI number 123456789012345
// (WHERE $MySqlColumnImei=$Imei), sorted in order of most recent position
// first to oldest position last (ORDER BY $MySqlColumnDateTime DESC), from
// those only the 50 most recent positions (LIMIT 50).
// A (pseudo) code example to do an SQL query to search the info mentioned above is:
//	$Imei='123456789012345'; //The IMEI code of the module that is installed in the car.
//	$SwitchMin=SV_LowestPositionSwitch; //Lowest possible Switch value of data that contains a GPS position transmission from the module.
//	$SwitchMax=SV_HighestPositionSwitch; //Highest possible Switch value of data that contains a GPS position transmission from the module.
//	$SQLquery="SELECT $MySqlColumnData"
//		." FROM $MySqlTableName"
//		." WHERE $MySqlColumnImei=$Imei"
//		." AND $MySqlColumnSwitch>=$SwitchMin"
//		." AND $MySqlColumnSwitch<=$SwitchMax"
//		." GROUP BY $MySqlColumnData"
//		." ORDER BY $MySqlColumnDateTime DESC"
//		." LIMIT 50";
//	if($SqlQueryResult=mysql_query($SqlQuery)) //Let the database execute the SQL query
//	{
//		while($RowData=mysql_fetch_array($SqlQueryResult)) //Loop through all records that were found by the database
//		{
//			//Load the binary Data field contents from the database record into the CGPS class.
//			print( '<BR>-----------------------------------' );
//			if($pcGPS->SetBinaryData($Imei, $RowData[$MySqlColumnData]) && $pcGPS->IsValid()))
//			{
//				//Get any info you want from the CGPS class (just a very few things in this example only to get the idea)
//				print( '<BR>Date/Time: ' .date('r', $pcGPS->GetUtcTime()) );
//				print( '<BR>Latitude: ' .$pcGPS->GetLatitudeFloat() );
//				print( '<BR>Longitude: ' .$pcGPS->GetLongitudeFloat() );
//				print( '<BR>NMEA RMC: ' .$pcGPS->GetNMEA_RMC() );
//				print( '<BR>MAP link: <A HREF"' .htmlspecialchars($pcGPS->GetGoogleMapsUrl()) .'">click me<\A>' );
//				if( $pcGPS->CanGetSpeed() ) print( '<BR>Speed: '.$pcGPS->GetSpeedKPH().'km/h '.$pcGPS->GetSpeedMPH().'mph Knots: '.$pcGPS->GetSpeedKnots() );
//				if( $pcGPS->CanGetFix() ) print( '<BR>GPS satellites fix: '.$pcGPS->GetFix() );
//				if( $pcGPS->CanGetTemperature() ) print( '<BR>Temperature: '.$pcGPS->GetTemperatureCelcius().'C '.$pcGPS->GetTemperatureFahrenheit().'F' );
//				if( $pcGPS->CanGetVersion() ) print( '<BR>Firmware version: '.$pcGPS->GetVersion() );
//				//...Well, whatever info you need and should you later decide you need more, it will also be available since it will never be left out in your database setup.
//			} else print( htmlspecialchars( $pcGPS->GetLastError() ) ); //Since you only put valid data in your database you won't get this anyway, but with this construction you can display error message with possible HTML special characters converted.
//		} 
//	} else print(mysql_error());
//
//	Really simple as you can see, the database does the heavy search work for
//	you, from the resulting records you put the raw data in the CGPS class and
//	directly have access to all information recorded in it.
// But what is the "GROUP BY $MySqlColumnData" for in the SQL query above, you
// ask?
// Well, when a module sends data to your server, it expects a confirmation
// in return telling that the data is received/stored properly.
// When it receives this acknowledge from your server, the module deletes the
// transmitted items from its log, or else it will not delete them and resend
// them again later and repeat as long as necessary.
// If a response from your server does not reach the module within waiting time
// - server response took too long to respond.
// - server response got lost somewhere in your (providers) network or the
//   internet.
// - GPRS connection lost because GSM network signal was lost or too weak to
//   transport GPRS data.
// then the items are not deleted from the module's log and the same records
// will be resend later and thus arrive at you server and into your database
// twice.
// By using a GROUP BY statement in your SQL query on the table column that
// contains the raw module data, your database will filter out double records
// while fetching the ones you asked for.
//
// OK, now a more advanced SQL query example based on the one above.
// Just assume that you want your database to find all records that contain
// position information of a module between a start and end date/time
// sorted from the oldest to the most recent position.
// 	$Imei='123456789012345'; //The IMEI code of the module.
// 	$SwitchMin=SV_LowestPositionSwitch; //Lowest possible Switch value that contains a GPS position update from the module.
// 	$SwitchMax=SV_HighestPositionSwitch; //Highest possible Switch value that contains a GPS position update from the module.
// 	$DateTimeStart="20060822093000"; //The date and time of the beginning of the period (yyyymmddhhmmss = October 22 2006 9:30:00AM UTC).
// 	$DateTimeEnd="20060822170000"; //The date and time of the end of the period (yyyymmddhhmmss = October 22 2006 5:00:00PM UTC).
// 	$SQLquery="SELECT $MySqlColumnData"
//		." FROM $MySqlTableName"
//		." WHERE $MySqlColumnImei=$Imei"
//		." AND $MySqlColumnSwitch>=$SwitchMin"
//		." AND $MySqlColumnSwitch<=$SwitchMax"
//		." AND $MySqlColumnDateTime>=$DateTimeStart"
//		." AND $MySqlColumnDateTime<=$DateTimeEnd"
//		." GROUP BY $MySqlColumnData"
//		." ORDER BY $MySqlColumnDateTime ASC";
// And now an even more advanced SQL query using all of the suggested extra
// pre-extracted information suggested to stored double per database record.
// Just assume that you want your database to find records that contain a
// transmission from a specific module within a certain period in time, that
// contain a GPS position position inside a certain geographical region,
// while digital I/O input 1 was active that has a switch-button attached.
// Having possible double records filtered out, having the findings sorted
// by date/time and the number of findings limited to the 50 most recent ones.
// 	$Imei='123456789012345'; //The IMEI code of the module that you are looking for.
// 	$SwitchMin=SV_LowestPositionSwitch; //Lowest possible Switch value that contains a GPS position update from the module.
// 	$SwitchMax=SV_HighestPositionSwitch; //Highest possible Switch value that contains a GPS position update from the module.
// 	$DateTimeStart="20060822093000"; //The date and time of the beginning of the period (yyyymmddhhmmss = October 22 2006 9:30:00AM UTC).
// 	$DateTimeEnd="20060822170000"; //The date and time of the end of the period (yyyymmddhhmmss = October 22 2006 5:00:00PM UTC).
// 	$LatitudeMin=LatitudeFloatToSmall(0.12345); //Conversion to small form that we use in the database for less space and higher speed.
// 	$LatitudeMax=LatitudeFloatToSmall(0.23456); //Conversion to small form that we use in the database for less space and higher speed.
// 	$LongitudeMin=LongitudeFloatToSmall(-1.23456); //Conversion to small form that we use in the database for less space and higher speed.
// 	$LongitudeMax=LongitudeFloatToSmall(-1.12345); //Conversion to small form that we use in the database for less space and higher speed.
// 	$IO=MDIO_Input1; //Bit mask value of the digital input #1
// 	$SQLquery="SELECT $MySqlColumnData"
//		." FROM $MySqlTableName"
//		." WHERE $MySqlColumnImei=$Imei"
//		." AND $MySqlColumnSwitch>=$SwitchMin"
//		." AND $MySqlColumnSwitch<=$SwitchMax"
//		." AND $MySqlColumnDateTime>=$DateTimeStart"
//		." AND $MySqlColumnDateTime<=$DateTimeEnd"
//		." AND $MySqlColumnIO&$IO"
//		." AND $MySqlColumnLatitude>=$LatitudeMin"
//		." AND $MySqlColumnLatitude<=$LatitudeMax"
//		." AND $MySqlColumnLongitude>=$LongitudeMin"
//		." AND $MySqlColumnLongitude<=$LongitudeMax"
//		." GROUP BY $MySqlColumnData"
//		." ORDER BY $MySqlColumnDateTime DESC"
//		." LIMIT 50";
// As you see, for every option that you offer your users to view
// data/routes/reports, you simply leave the searching and sorting of the
// records (= original module transmissions) that you need up to the database.
// That is exactly what it is meant for and does that very efficiently, keeping
// your CPU and hard disk usage to a minimum.
// For info about the SQL SELECT command: http://google.com/search?q=sql+select
// Keep in mind that many modules transmitting data for many years to your
// server and do that for example every minute, will create much more data than
// even the biggest multinational warehouse/company that has all items they
// sell in their database.
// Therefore you really want to store ONLY the compressed original raw
// transmission and IMEI from each of your modules and ONLY those items already
// pre-extracted double stored per record to find them back for the features
// that you need.
// If you do not need to search for latitude/longitude/IO like the example
// above, then leave them out of your records.
// Since every record contains the raw compressed module data and its IMEI, you
// will always be able to add anything you like later.
// If you for example in the future want to add some useful view/report option
// for your users for which you need additional data pre-extracted per record,
// then you can always upgrade all your existing records.
// Simply insert an additional column in your database table with an SQL INSERT
// query and fill that new field in each existing record with the information
// that you extract from the raw module data in that record.

// ### CHANGE ###
// This example server program is already based on adding incoming data to a
// database as records containing all items as suggested above.
// The last part of this example server program even contains a simple user
// interface for database and table creations/deletion/queries.
// To enable all this, simply change variables below to match your SQL
// database installation:
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

//Function to store incoming transmissions in an existing database as suggested above.
function StoreInDatabase(&$pcGPS, $ExtraModuleData)
{
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
	global $Host, $MySqlLogin, $MySqlPassword, $MySqlDatabaseName, $MySqlTableName;
	global $MySqlColumnDateTime, $MySqlColumnImei, $MySqlColumnSwitch;
	global $MySqlColumnEventID, $MySqlColumnLatitude, $MySqlColumnLongitude, $MySqlColumnIO;
	global $MySqlColumnData, $MySqlColumnExtra;
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








///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
// DATAFORWARDING EXAMPLE
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
// If an existing system expects dedicated transmissions or when you can not
// make use of the CGPS class directly, you can forward incoming data
// pre-decoded in any format.
// In the example function below, we extract information from the received data
// and forward it as a HTTP POST to another script which can be running on the
// same or another computer connected to the same network or the internet.
// But you can of course forward extracted data in any format you like.
//
// ### CHANGE ### 
// Change variables below to where you want to forward the data
$ForwardHost="localhost";				//The host name of the computer to forward to like www.hostname.com ("localhost" can be used for a script on the same computer).
$ForwardScript="/ScriptOnHost.php?";	//The name and path of the script on the host computer to forward to.
$ForwardPort=80;						//The port number to be used for forwarding (usually 80 in case of HTTP forwarding).
$ForwardAcknowledgeResponse="#@!OK!@#"; //The receiver of the forwarded data uses this in a positive response.
//### WARNING ### in case of HTTP forwards (like the example below), make sure
//that you do not use something too basic like "OK" or "1" as positive
//acknowledge string that can also occur in header of that HTTP server.
// ### CHANGE ### 
// After you properly set the forwarding variables above and examined the
// ForwardData function below, you can change FALSE to TRUE below to enable
// data forwarding.
$All_data_forwarding_variables_and_code_are_properly_modified_to_support_it=false;
//
function ForwardData(&$pcGPS, $ExtraModuleData)
{
	//In this function we extract and forward the information we want from the
	//module data.
	//Notice @ usage in this function to avoid HTML error/warning output
	//because any text output will be sent to the module that called the script
	//and will not appear on screen in a browser.
	//Do *NOT* abort the script or generate output
	//(e.g. exit/die/echo/print/PHP-errors/...) because then the module will
	//not receive a proper response.
	//Also do *NOT* make the module wait too long either for a response,
	//because that too will make it time-out waiting and will retry sending the
	//same data (possibly over and over) again.
	//Assuming that you only want to forward position information from the
	//module, you need check the Switch value (CGPS:GetSwitch() function) to
	//determine if the received data actually contains position information.
	//In this example we simply use the CanGet...() functions of the CGPS class
	//to determine which information is available.
	//Then we forward the extracted data if available or the text that you put
	//in the $NotAvailable variable below instead.
	$NotAvailable=""; //### NOTE/CHANGE ### An empty string should be sufficient, but can be anything that the receiving side likes.
	global $ForwardHost, $ForwardScript, $ForwardPort, $ForwardAcknowledgeResponse;
	$ProcessedDataParts=0; //Create a variable starting at value 0 that we increase per processed data part
	for(;$ProcessedDataParts < $pcGPS->GetDataPartCount();$ProcessedDataParts++)
	{
		//Select next data part in the class if the module combined multiple transmissions.
		if(!$pcGPS->SelectDataPart($ProcessedDataParts) || !$pcGPS->IsValid())
		{
			LogError($pcGPS->GetLastError().'. Data string: '.$pcGPS->GetHttpData());
			continue;
		}

		//Now extract those items from the received module data with the CGPS
		//class that you want to forward.
		//When the CanGet...() function returns false, the variable is filled
		//with "NotAvailable" that you have set above.
		//Otherwise, the variable is filled with the result of the same
		//Get...() function of the same type.
		//See CGPS class API documentation for detailed information about the
		//information that is returned by the Get...() functions that are used
		//above.
		//You might see functions that return information that you want to
		//forward too.
		//This can be easily done by adding some extra items to the extraction
		//part below.
		$Imei=$pcGPS->GetImei(); //Unique serial number which you can use to identify the module.
		$DateTime=$pcGPS->GetUtcTimeMySQL(); //UTC date/time as yyyymmddhhmmss text.
		$Switch=$pcGPS->GetSwitch(); //The Switch value that tells which info is available.
		$Latitude=$pcGPS->CanGetLatLong() ? $pcGPS->GetLatitudeFloat() : $NotAvailable; //Latitude position as floating point coordinate.
		$Longitude=$pcGPS->CanGetLatLong() ? $pcGPS->GetLongitudeFloat() : $NotAvailable; //Longitude position as floating point coordinate.
		$Heading=$pcGPS->CanGetHeading() ? $pcGPS->GetHeading() : $NotAvailable; //Heading direction in degrees.
		$Speed=$pcGPS->CanGetSpeed() ? $pcGPS->GetSpeedKPH() : $NotAvailable; //Speed in kilometers per hour.
		$IO=$pcGPS->CanGetIO() ? $pcGPS->GetIO() : $NotAvailable; //Status of the digital IO lines.

		//When needed, the module includes extra data with a transmission.
		//This example already forwards this extra module data together with
		//your preferred extractions above via an HTTP POST below.
		//But if the receiver of the forwarded data does not support HTTP POST
		//or you need something dedicated, you could save this extra module
		//data to a disk file and forward the name of that file instead.
		//Here is an example that shows you how to write the extra module data
		//that are JPEG photos to disk.
		/***** Begin of example to save extra module data directly to a file *****
		$JpegPhoto=$NotAvailable; //Same system as used above.
		if(($pcGPS->GetSwitch()==SV_Photo) || ($pcGPS->GetSwitch()==SV_PhotoGps)) //SV_Photo or SV_PhotoGps type Switch?
		{
			//Received JPEG picture data as extra module data, so create disk file name "<Module IMEI number> <Date/Time>.jpg" and write the extra module data in it.
			$FileName=$pcGPS->GetImei()." ".$pcGPS->GetUtcTimeMySQL().".jpg"; //Construct the file name.
			if($hFile=@fopen($FileName, 'wb')) //Create a new file with this name.
			{
				if(@fwrite($hFile, $ExtraModuleData)==strlen($ExtraModuleData)) //Write extra module data into the created file.
					$JpegPhoto=$FileName; //Success, so change "NotAvailable" into the disk file name.
				else LogError("Error writing to picture file '$FileName' (are server settings properly set to allow this script to write to files?)");
				@fclose($hFile); //Close the file.
			} else LogError("Error creating picture file '$FileName' (are server settings properly set to allow this script to create files?)");
		}
		***** End of example to save extra module data directly to a file *****/

		//Now we combine all module data extracted above together in a HTTP URL
		//compatible way.
		//The variable $HttpData will be filled with something like:
		//  "Imei=123456789012345&DateTime=...&Switch=...&Latitude=........."
		//Even the original module data string is included in this example as
		//"Data=...", so you can store it too.
		//If you later decide that you need extra info from old receptions, you
		//still have all the data.
		$HttpData='Imei='.urlencode($Imei)
			.'&DateTime='.urlencode($DateTime)
			.'&Switch='.urlencode($Switch)
			.'&Latitude='.urlencode($Latitude)
			.'&Longitude='.urlencode($Longitude)
			.'&Heading='.urlencode($Heading)
			.'&Speed='.urlencode($Speed)
			.'&IO='.urlencode($IO)
			//.'&JpegPhoto='.urlencode($JpegPhoto) //Remove the // at the beginning of this line when you use the JPEG file saving example above to include its file name.
			.'&Data='.$pcGPS->GetHttpData();

		//Now forward the extracted information and if extra module data was
		//received, include that too.
		//On the receiving side, the type of extra data in the HTTP POST
		//(if any), can be determined from the Switch value.
		//With a Switch value of SV_Photo or SV_PhotoGps for example, the extra
		//binary data is a photo in JPEG format.
		//Notice the @ usage below to suppress error/warning output in case any
		//occurs because the module would receive it.
		$Response=''; //This variable will be filled with the response to the data that we forward
		if($hSocket=@fsockopen($ForwardHost, $ForwardPort, $errno, $errstr, 5)) //Connect to the forward server
		{
			//Construct standard HTTP POST command that contains the binary
			//data that we received from the module (e.g. data block or photo)
			//and all items that you have put in the $HttpData variable above.
			$Post="POST $ForwardScript$HttpData HTTP/1.0\r\n"
				."Host: $ForwardHost:$ForwardPort\r\n"
				."Content-Type: application/octet-stream\r\n"
				."Content-Length: ".strlen($ExtraModuleData)."\r\n\r\n"
				.$ExtraModuleData;
			if(@fwrite($hSocket, $Post)==strlen($Post)) //Send HTTP POST command
			{
				while(!feof($hSocket)) $Response.=@fread($hSocket, 1024); //Read full response from the receiver
			} else LogError("Unable to transmit a full HTTP POST to forward the data. The receiving party allows a connection, but the receiving program/script does not (exist?)"); //Write to error log
			@fclose($hSocket);
		} else LogError($errstr); //Write the error about not being able to connect to the error log.
		if(!strlen($Response)) break; //Stop forwarding data until the module tries to send it again.

		//Now check the response from the receiver of the HTTP POST above to
		//see if it contains the data that you defined for
		//$ForwardAcknowledgeResponse above in its response to signal a
		//successful reception.
		//This response is expected to be returned immediately, because when
		//the combined time for all data parts that are forwarded take too
		//long, the module will time-out waiting for his acknowledge too and
		//will send a new transmission resending the same data again.
		if(strpos($Response, $ForwardAcknowledgeResponse)===false)
		{
			//The response to the forwarded data does not contain the positive
			//acknowledge.
			//So we stop processing and forwarding further data parts, so
			//we don't acknowledge them to the module and that will make it
			//resend the same data again.
			LogError('The response that was received in answer to the forwarded data does not contain the expected positive acknowledge string'.PHP_EOL.'--- Forward transmission: '.$ForwardScript.$HttpData.PHP_EOL.'--- Expected positive acknowledge string: '.$ForwardAcknowledgeResponse.PHP_EOL.'--- Received response:'.PHP_EOL.$Response);
			break; //break the your processing loop
		}
	}
	return $ProcessedDataParts; //Return the number processed data parts
}













/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
// Example for actually receiving the data that is transmitted by a module to your server
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
//### CHANGE ### Change the variable name below from YourVariableName to anything URL compatible that you like.
$ReceptionVariableName="YourVariableName"; //<=== The name of the URL argument variable that receives the module data
//TIP:
//You can save transmission data usage with every transmission of the module
//to your HTTP server by using a single letter of the a-z alphabet for
//"YourVariableName".
//The same goes for the file name (and location) of this script on your HTTP
//server.
//Both will be part of the transmission format that you use in the settings
//of the module too, to transmit data to your HTTP server so it knows which
//script to execute and which variable should receive the real module data.
if(isset($_GET[$ReceptionVariableName])) //Here we check if this script received data via the variable above.
{
	//Create an instance of the CGPS class and initialize it with the received module data.
	$ModuleDataString=$_GET[$ReceptionVariableName];
	$pcGPS=new CGPS(); //Create new instance of the CGPS class.
	$pcGPS->ClearResponseActionMembers(); //Clear all response action members in the class by setting them to neutral.
	if(!$pcGPS->SetHttpData($ModuleDataString)) //Set class with received data.
	{
		//The class did not accept the received data.
		LogError($pcGPS->GetLastError().". Received data string: $ModuleDataString"); //Add message to the error log.
		UnwantedOutputCheckpoint(2); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
		print($pcGPS->BuildResponseHTTP(0)); //Makes the module retry later (assuming the transmission actually came from a module).
		exit(0); //Silent script exit.
	}

	//Get extra binary data if the module included it (e.g. picture data from a photo) and verify the data size
	$ExtraModuleData=@file_get_contents('php://input');
	if($pcGPS->CanGetExtraDataSize() && ($pcGPS->GetExtraDataSize()!=strlen($ExtraModuleData)))
	{
		//The data size does not match the received data size.
		LogError('ERROR: Extra data size mismatch. Module '.$pcGPS->GetImei().' transmitted '.$pcGPS->GetExtraDataSize().' bytes of extra data of which '.strlen($ExtraModuleData)." were received together with data string: $ModuleDataString");
		UnwantedOutputCheckpoint(3); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
		print($pcGPS->BuildResponseHTTP(0)); //Let the module know that it was not accepted
		exit(0); //Silent script exit.
	}

	//Process the received data.
	if(	isset($All_MySQL_variables_are_properly_set_to_enable_database_support)
		&& $All_MySQL_variables_are_properly_set_to_enable_database_support===true ) //See "DATABASE STORAGE EXAMPLE" information above.
	{
		//Store incoming data in the existing database.
		$NumberOfProcessedDataParts=StoreInDatabase($pcGPS, $ExtraModuleData);
		if(UnwantedOutputCheckpoint(4)) exit(0); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
	}
	else if( isset($All_data_forwarding_variables_and_code_are_properly_modified_to_support_it)
			&& $All_data_forwarding_variables_and_code_are_properly_modified_to_support_it===true ) //See "DATAFORWARDING EXAMPLE" information above.
	{
		//Forward incoming extracted and converted into dedicated form to another script/computer/device.
		$NumberOfProcessedDataParts=ForwardData($pcGPS, $ExtraModuleData);
		if(UnwantedOutputCheckpoint(5)) exit(0); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.
	}
	else
	{
		//This message below will be written to your error log file until you properly modified this script to actually perform any handling.
		LogError("Received data not stored or forwarded because you have not modified the program to do that. Received data: $ModuleDataString");
		$NumberOfProcessedDataParts=$pcGPS->GetDataPartCount(); //Just pretend all data parts are handled, otherwise the module retry forever.
	}
	
	//### INFO ### uploading from your server to the module
	//(e.g. new firmware, new settings, command's, port data).
	//At this point, we processed the received data, and are going to
	//acknowledge that in a response back to the transmitting module.
	//That will make the module remove the transmitted records from its
	//internal log and not send them again later.
	//That is done below in the code by sending the binary output from the
	//CGPS::BuildResponseHTTP() function to the module.
	//But if you want, you can include extra tasks for the module to performed
	//with that acknowledge.
	//All you need to do is set the response action members of the class to the
	//tasks that you want the module to perform.
	//Some examples with a few of the available class members:
	//	$pcGPS->Firmware=123; //Request the module to do a download attempt of firmware file 123 from your server.
	//	$pcGPS->mSettings=@file_get_contents('SettingsFileName.tms'); //Read settings data from this file on your server and upload it to the module.
	//	$pcGPS->mGpsLog=true; //Request module to record its current GPS position in the log.
	//	$pcGPS->mPhoto=RACD_Photo_LoRes; //Instruct module to take a picture in low resolution.
	//	$pcGPS->mDigitalOutput2=RACD_DigitalOutput_Enable; //Instruct module to enable digital output #2.
	//	$pcGPS->mSerialPort3='Some serial data'; //Instruct module to send some data via serial port #3.
	//That's it, the BuildResponseHTTP() function will automatically include
	//the requests that you have set via the class members with the acknowledge
	//in the binary output that it generates.
	//You are likely going to keep track of any requests that you want to send
	//to each specific module in your database, and check them those for
	//incoming transmissions for each individual module if you want to have one
	//or more of these class members set to some task or not.
	//Assuming you have not created such a system the way you like yet, below
	//is a simple system that you can use till then to manually do some
	//experimenting without having to write any code first.
	//For simplicity's sake of the system below, works with command files that
	//you create yourself and put in a directory on your server with the 15
	//digit IMEI number of a specific module in the file name.
	//Every time a module transmits to your server, the code below checks if
	//you have created such file for this specific module on your server's
	//hard disk.
	//When found, the contents is read and put in the appropriate class member
	//and then the file is deleted.
	//That way all your intended actions of the command files that you create
	//are performed only once.
	//### WARNING ###
	//Make sure that your system/directory/files grant this script the
	//priorities required to actually see, read and delete the command files
	//that you create.
	//In this ComFileDir your can specify below, you can choose the already
	//existing directory that you want to be checked for your command files.
	//You can use "" for the same directory that you copied this script into,
	//but also something like:
	//	"C:\\dir\\comfiles\\" (Windows example. Notice the required backslash at the end AND that you need to write them double).
	//	"/var/comfiles/"  (Unix/Linux example. Notice the required slash at the end).
	$ComFileDir=""; //### CHANGE ### to your preferred command file directory.
	$Imei=$pcGPS->GetImei(); //Extract the transmitting module's IMEI code like "123456789012345" that we are going to check for.
	if(	!$pcGPS->IsForwardedByGateway() //Did we receive the data directly from a module and NOT from a gateway that forwarded it?
		&& count(@glob("$ComFileDir$Imei.*")) ) //AND are there any "123456789012345.*" command files with this IMEI in the directory?
	{
		//***NEW MODULE SETTINGS***
		$FileName="$ComFileDir$Imei.tms"; //Construct file name like: 123456789012345.tms
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//The file is expected to contain settings from the CGPSsettings
			//class or written to disk with the settings application.
			//If uploaded settings are received by the module, it will let the
			//result know via a transmission with Switch value
			//SV_SettingsAccepted or SV_SettingsRejected.
			//
			//Simply "$pcGPS->mSettings=file_get_contents($FileName);" would be
			//sufficient, but below we put the file contents in the CGPSsettings
			//class first to check if the file really contains settings data,
			//calculate the CRC of the settings and write the findings to the
			//log too.
			$pcGPSsettings=new CGPSsettings(); //Create new instance object of the class
			if($pcGPSsettings->SetSettingsData(@file_get_contents($FileName))) //Put file contents in the class
			{
				//Class accepted the data, so it must be valid settings data
				$pcGPS->mSettings=$pcGPSsettings->GetSettingsData(); //Put settings data in mSettings to upload it
				$CRC=$pcGPSsettings->GetSettingsCRC(); //Calculate the CRC of the settings data
				LogError("INFO (not an error): Settings data from file '$FileName' with CRC value '$CRC' uploaded to module $Imei.");
			} else LogError("Settings file '$FileName' error (file will be deleted): ".$pcGPSsettings->GetLastError());
			@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later).");
			unset($pcGPSsettings); //Don't need the created class object anymore
		}

		//***UPDATING FIRMWARE***
		$FileName="$ComFileDir$Imei.tmf"; //Construct file name like: 123456789012345.tmf
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//An ASCII text file is expected, containing only the version
			//number digits of firmware to be downloaded.
			//(the number before the .hex in the "firmwarefilenameXXX.hex"
			// that is downloadable from your server).
			//NOTES:
			//- The specified firmware file must be downloadable from the
			// HTTP-root directory your server.
			// The module will try to download the firmware file from your
			// server using the same IP and port it already used to transmit to
			// your server.
			// It sends the standard HTTP download request just like a web
			// browser: "GET /filenameXXX.hex" followed by everything you
			// programmed after the %s marker in the data format string in the
			// transmission settings.
			// The XXX is replaced by the number of the firmware version that
			// is to be downloaded.
			// Check with a web browser if the firmware file is actually
			// downloadable from your server by executing the following in the
			// address of your web browser: http://IP:80/filenameXXX.hex
			//	 -	IP = the IP address that you used in the module's transmission settings.
			//	 -	80 = the port number that you have used in the module settings.
			//	 -	filename = the first part of the actual file name that the particular module type uses.
			//	 -	XXX = the digits of the firmware file that is to be downloaded.
			//	 -	.hex = the last part of the actual file name that the particular module type uses.
			// You may need to configure your HTTP server's settings and/or
			// add a new binary octet-stream mime type before it allows
			// downloads of binary files with the .hex extension that you put
			// in the http/www ROOT directory.
			//- The module will only download the firmware if it is newer than
			// the one already in use.
			//- The module will switch to a special mode and send the download
			// request once and writes all data that it receives into the
			// internal FLASH memory until the connection is closed (by the
			// server, or its own socket timeout setting, or more than 64KB is
			// received or even by the watchdog after about an hour to make
			// sure that even over a slow connection with packet timeouts and
			// retries caused by signal the full data can still be transferred
			// completely).
			// Then the module reboots itself and if during startup correct
			// firmware data is found (CRC checks) in the internal FLASH memory
			// that has a higher version than the firmware already in use, it
			// will automatically replace the previous internal version and use
			// that one instead in the future.
			// If the process fails, it will keep the firmware that was
			// already in use and the update process is not automatically
			// restarted, which you will have to do yourself in that case
			// (possibly waiting for better signal/network conditions first
			// that could have caused reception of corrupt data).
			//- Some GPRS providers use proxy system in their network that may
			// still keep the SIM card registered on the network after the
			// reboot, not allowing it to register to the network, until the
			// network closed the previous session.
			// During that time the unit will function normally, but the
			// transmission of the contents of the log will be delayed until
			// it is allowed to register to the network again (can take a
			// couple of hours, maybe even a day depending on your provider).
			// But some of these proxy systems have filters and limiters that
			// prohibit the firmware data to arrive at the module unmodified
			// and in its full length.
			// In that case you can only upload new firmware into a module via
			// a direct cable connection.
			$FileSize=@filesize($FileName); //Get the file in bytes of the file
			if(($FileSize>0) && ($FileSize<=6)) //File size between 0 and 6 bytes?
			{
				if(($FirmwareVersion=@file_get_contents($FileName))!==false) //Can we read the contents of the file?
				{
					$FirmwareVersion=trim($FirmwareVersion); //Strip possible leading/trailing spaces and newline characters
					if(strlen($FirmwareVersion)==strspn($FirmwareVersion, '0123456789')) //Only numbers left?
					{
						$pcGPS->mFirmware=(int)$FirmwareVersion; //Store firmware version value in the mFirmware member of the class.
						LogError("INFO (not an error): Module $Imei has been sent a request to do a download attempt of firmware version $FirmwareVersion");
					} else LogError("Firmware command file \"$FileName\" contains invalid characters (will be deleted).");
				} else LogError("Firmware command file \"$FileName\" can not be read (will be deleted).");
			} else LogError("Firmware command file \"$FileName\" file size was incorrect (will be deleted).");
			{@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later).");};
		}
		
		//***Module Serial Port Output***
		$FileName="$ComFileDir$Imei.sp1"; //Construct file name like: 123456789012345.sp1 (for serial port #1)
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//The contents of the file is expected to contain the data that is to be
			//sent to the module to have it output the data via its serial port 1.
			if(($pcGPS->mSerialPort1=@file_get_contents($FileName))!==false)
			{
				if(strlen($pcGPS->mSerialPort1)>250) //Is it more data than can be handled all at once?
				{
					if(@file_put_contents($FileName, substr($pcGPS->mSerialPort1, 250))) //Save last part back to the file
					{
						$pcGPS->mSerialPort1=substr($pcGPS->mSerialPort1, 0, 250); //Trim to upload only first part of the file
						$pcGPS->mActionID=37; //Ask module to send a SV_Acknowledge so the remaining data can be handled then.
					} else { $pcGPS->mSerialPort1=''; LogError("There was problem writing to serial port data file '$FileName' (will be retried later)."); }
				} else {@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later)."); }
			} else LogError("There was problem reading from serial port data file '$FileName' (will be retried later).");
		}
		$FileName="$ComFileDir$Imei.sp2"; //Construct file name like: 123456789012345.sp2 (for serial port #2)
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//The contents of the file is expected to contain the data that is to be
			//sent to the module to have it output the data via its serial port 2.
			if(($pcGPS->mSerialPort2=@file_get_contents($FileName))!==false)
			{
				if(strlen($pcGPS->mSerialPort2)>250) //Is it more data than can be handled all at once?
				{
					if(@file_put_contents($FileName, substr($pcGPS->mSerialPort2, 250))) //Save last part back to the file
					{
						$pcGPS->mSerialPort2=substr($pcGPS->mSerialPort2, 0, 250); //Trim to upload only first part of the file
						$pcGPS->mActionID=37; //Ask module to send a SV_Acknowledge so the remaining data can be handled then.
					} else { $pcGPS->mSerialPort2=''; LogError("There was problem writing to serial port data file '$FileName' (will be retried later)."); }
				} else {@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later)."); }
			} else LogError("There was problem reading from serial port data file '$FileName' (will be retried later).");
		}
		$FileName="$ComFileDir$Imei.sp3"; //Construct file name like: 123456789012345.sp3 (for serial port #3)
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//The contents of the file is expected to contain the data that is to be
			//sent to the module to have it output the data via its serial port 3.
			if(($pcGPS->mSerialPort3=@file_get_contents($FileName))!==false)
			{
				if(strlen($pcGPS->mSerialPort3)>250) //Is it more data than can be handled all at once?
				{
					if(@file_put_contents($FileName, substr($pcGPS->mSerialPort3, 250))) //Save last part back to the file
					{
						$pcGPS->mSerialPort3=substr($pcGPS->mSerialPort3, 0, 250); //Trim to upload only first part of the file
						$pcGPS->mActionID=37; //Ask module to send a SV_Acknowledge so the remaining data can be handled then.
					} else { $pcGPS->mSerialPort3=''; LogError("There was problem writing to serial port data file '$FileName' (will be retried later)."); }
				} else {@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later)."); }
			} else LogError("There was problem reading from serial port data file '$FileName' (will be retried later).");
		}
		$FileName="$ComFileDir$Imei.sp4"; //Construct file name like: 123456789012345.sp4 (for serial port #4)
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//The contents of the file is expected to contain the data that is to be
			//sent to the module to have it output the data via its serial port 4.
			if(($pcGPS->mSerialPort4=@file_get_contents($FileName))!==false)
			{
				if(strlen($pcGPS->mSerialPort4)>250) //Is it more data than can be handled all at once?
				{
					if(@file_put_contents($FileName, substr($pcGPS->mSerialPort4, 250))) //Save last part back to the file
					{
						$pcGPS->mSerialPort4=substr($pcGPS->mSerialPort4, 0, 250); //Trim to upload only first part of the file
						$pcGPS->mActionID=37; //Ask module to send a SV_Acknowledge so the remaining data can be handled then.
					} else { $pcGPS->mSerialPort4=''; LogError("There was problem writing to serial port data file '$FileName' (will be retried later)."); }
				} else {@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later)."); }
			} else LogError("There was problem reading from serial port data file '$FileName' (will be retried later).");
		}
		
		//***Source Code / LCD Menu***
		$FileName="$ComFileDir$Imei.src"; //Construct file name like: 123456789012345.src
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//The file is expected to contain the source code that is to be
			//executed by the module.
			//This source code can consist of a combination of things like:
			//- A full new program for example to generate a menu on the attached LCD display.
			//- One or more changes to variables of already executing code in the module at run-time.
			//- Replacement or additional parts of code for parts of the current code in the module.
			//- Execution of code parts that are included or already present in the module.
			//
			//Simply "$pcGPS->mSourceCode=file_get_contents($FileName);" would
			//be sufficient (which the code below actually does of course), but
			//first it does some checking and writes the results of that to the
			//error log too, so you can see in it what was uploaded.
			$LogText="Source code file '$FileName' for module '$Imei':"; //Beginning of the log message
			$FileContents=@file_get_contents($FileName); //Read file contents
			if($FileContents!==false) //File read error?
			{
				$pcGPSCODE=new CGPSCODE(); //Create instance of the code class class
				if($pcGPSCODE->AddSourceCode($FileContents)) //Add code in the file to the class
				{
					//Class accepted the data in the file, now let it check the code for anomalies
					$aErrors=$aWarnings=array(); //Create two empty arrays to receive possible anomalies into
					if($pcGPSCODE->CheckCurrentCode($aErrors, $aWarnings))
					{
						//Ooops... class detected one or more anomalies!
						foreach($aErrors as $Error) $LogText.=PHP_EOL."- ERROR: $Error"; //Add errors to the log message (if any)
						foreach($aWarnings as $Warning) $LogText.=PHP_EOL."- WARNING: $Warning"; //Add warnings to the log message (if any)
					}
					if(!count($aErrors)) //Any error messages?
					{
						//No error messages, so upload the source code (allowing possible warnings)
						//Upload the source code into the action response class member.
						$pcGPS->mSourceCode=$pcGPSCODE->GetSourceCode(); //Asking it back from the class ensures that it is always properly formatted.
						$LogText.=PHP_EOL.'INFO (not an error): Source below uploaded to the module:'.PHP_EOL.$pcGPS->mSourceCode;
					} else $LogText.=PHP_EOL.PHP_EOL.'!!!ERROR!!!: Source code below *NOT* uploaded to the module because of the error(s) above:'.PHP_EOL.$FileContents;
				} else $LogText.=PHP_EOL.PHP_EOL.'!!!ERROR!!!: '.$pcGPSCODE->GetLastError().PHP_EOL.$FileContents;; //Class did not accept the contents of the file
				unset($pcGPSCODE); //Don't need it anymore
			} else $LogText.=PHP_EOL.PHP_EOL."!!!ERROR!!!: The contents of the file '$FileName' could not be read";
			LogError($LogText); unset($LogText); unset($FileContents);
			@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later).");
		}

		//***PERFORM ACTION***
		$FileName="$ComFileDir$Imei.ra"; //Construct file name like: 123456789012345.ra
		if(@is_file($FileName) && !$pcGPS->RequireResponseActionMembersStall()) //Does this file exist and no need to wait processing it?
		{
			//An ASCII text file is expected containing the action(s) that you
			//want to be performed by the module.
			//All actions that you trigger in your file are set in the response
			//action members of the CGPS class and is used to build response
			//that is send to the module to perform these actions.
			/************ copy lines below into your "123456789012345.ra" file ************
			--- The following triggers will be executed when they are in your file, remove the lines that you don't want. ---
			GpsLog			//Log current GPS position
			CountersLog		//Log current reading of the counters
			TransmitLog		//Transmit current log
			ResetTimer1		//Reset timer 1
			ResetTimer2		//Reset timer 2
			ResetTimer3		//Reset timer 3
			ResetTimer4		//Reset timer 4
			ResetTimer5		//Reset timer 5
			ResetTimer6		//Reset timer 6
			ResetTimer7		//Reset timer 7
			ResetTimer8		//Reset timer 8
			SmsAlert1		//Send an alert SMS message to phone number 1
			SmsAlert2		//Send an alert SMS message to phone number 2
			SmsAlert3		//Send an alert SMS message to phone number 3
			SmsAlertCalledBy1	//Send an alert SMS message to "called by..." phone number 1
			SmsAlertCalledBy2	//Send an alert SMS message to "called by..." phone number 2
			SmsAlertCalledBy3	//Send an alert SMS message to "called by..." phone number 3
			ClearGPSConfig		//Clear configuration of the GPS receiver, resulting in a "cold start" position determination of the GPS receiver.
			SyncTime		//Synchronize module with servers date/time.
			ClearLog		//Erase the FLASH memory in the module, clearing both the contents of the log and possible LCD/source-code.
			--- The following triggers are only executed when a specific action type directly after the = sign ---
			Photo=			//Take picture with attached camera. Use =HiRes or =LoRes for high/low-resolution picture.
			DigitalOutput1=		//Digital output status change. Use =Enable or =Disable =Toggle to change the status.
			DigitalOutput2=
			DigitalOutput3=
			DigitalOutput4=
			ActionID=		//Perform action like =18 to activate the LCD's backlight. NOTE: When ActionID is used, all SmsAlert... triggers above are ignored.
			************* copy lines above into your "123456789012345.ra" file ************/
			//
			//The code below simply checks the contents of your file for
			//containing the keywords mentioned above.
			//If it for example contains the word "GpsLog" then the mGpsLog
			//class member is set to TRUE.
			if(($ResponseActionFile=@file_get_contents($FileName)) && strlen($ResponseActionFile))
			{
				$ActionResponseInfo='';
				if(strpos($ResponseActionFile, 'GpsLog')!==false) {$pcGPS->mGpsLog=true; $ActionResponseInfo.='GpsLog!';}
				if(strpos($ResponseActionFile, 'CountersLog')!==false) {$pcGPS->mCountersLog=true; $ActionResponseInfo.='CountersLog!';}
				if(strpos($ResponseActionFile, 'TransmitLog')!==false) {$pcGPS->mTransmitLog=true; $ActionResponseInfo.='TransmitLog!';}
				if(strpos($ResponseActionFile, 'ResetTimer1')!==false) {$pcGPS->mResetTimer1=true; $ActionResponseInfo.='ResetTimer1!';}
				if(strpos($ResponseActionFile, 'ResetTimer2')!==false) {$pcGPS->mResetTimer2=true; $ActionResponseInfo.='ResetTimer2!';}
				if(strpos($ResponseActionFile, 'ResetTimer3')!==false) {$pcGPS->mResetTimer3=true; $ActionResponseInfo.='ResetTimer3!';}
				if(strpos($ResponseActionFile, 'ResetTimer4')!==false) {$pcGPS->mResetTimer4=true; $ActionResponseInfo.='ResetTimer4!';}
				if(strpos($ResponseActionFile, 'ResetTimer5')!==false) {$pcGPS->mResetTimer5=true; $ActionResponseInfo.='ResetTimer5!';}
				if(strpos($ResponseActionFile, 'ResetTimer6')!==false) {$pcGPS->mResetTimer6=true; $ActionResponseInfo.='ResetTimer6!';}
				if(strpos($ResponseActionFile, 'ResetTimer7')!==false) {$pcGPS->mResetTimer7=true; $ActionResponseInfo.='ResetTimer7!';}
				if(strpos($ResponseActionFile, 'ResetTimer8')!==false) {$pcGPS->mResetTimer8=true; $ActionResponseInfo.='ResetTimer8!';}
				$ActionID=strpos($ResponseActionFile, 'ActionID=');
				if($ActionID!==false)
				{
					$ActionID=(int)substr($ResponseActionFile, $ActionID+9, 3);
					if(($ActionID>0)&&($ActionID<=191))
					{
						$pcGPS->mActionID=$ActionID;
						$ActionResponseInfo.="ActionID=$ActionID!";
					}
				}
				if(!$pcGPS->mActionID) //Check for SmsAlert... only if ActionID is not yet set to a value because they can't be mixed
				{
					if(strpos($ResponseActionFile, 'SmsAlert1')!==false) {$pcGPS->mSmsAlert1=true; $ActionResponseInfo.='SmsAlert1!';}
					if(strpos($ResponseActionFile, 'SmsAlert2')!==false) {$pcGPS->mSmsAlert2=true; $ActionResponseInfo.='SmsAlert2!';}
					if(strpos($ResponseActionFile, 'SmsAlert3')!==false) {$pcGPS->mSmsAlert3=true; $ActionResponseInfo.='SmsAlert3!';}
					if(strpos($ResponseActionFile, 'SmsAlertCalledBy1')!==false) {$pcGPS->mSmsAlertCalledBy1=true; $ActionResponseInfo.='SmsAlertCalledBy1!';}
					if(strpos($ResponseActionFile, 'SmsAlertCalledBy2')!==false) {$pcGPS->mSmsAlertCalledBy2=true; $ActionResponseInfo.='SmsAlertCalledBy2!';}
					if(strpos($ResponseActionFile, 'SmsAlertCalledBy3')!==false) {$pcGPS->mSmsAlertCalledBy3=true; $ActionResponseInfo.='SmsAlertCalledBy3!';}
				}
				if(strpos($ResponseActionFile, 'ClearGPSConfig')!==false) {$pcGPS->mClearGPSConfig=true; $ActionResponseInfo.='ClearGPSConfig!';}
				if(strpos($ResponseActionFile, 'SyncTime')!==false) {$pcGPS->mSyncTime=true; $ActionResponseInfo.='SyncTime!';}
				if(strpos($ResponseActionFile, 'ClearLog')!==false) {$pcGPS->mClearLog=true; $ActionResponseInfo.='ClearLog!';}
				if(strpos($ResponseActionFile, 'DigitalOutput1=Enable')!==false) {$pcGPS->mDigitalOutput1=RACD_DigitalOutput_Enable; $ActionResponseInfo.='DigitalOutput1=Enable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput1=Disable')!==false) {$pcGPS->mDigitalOutput1=RACD_DigitalOutput_Disable; $ActionResponseInfo.='DigitalOutput1=Disable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput1=Toggle')!==false) {$pcGPS->mDigitalOutput1=RACD_DigitalOutput_Toggle; $ActionResponseInfo.='DigitalOutput1=Toggle!';}
				if(strpos($ResponseActionFile, 'DigitalOutput2=Enable')!==false) {$pcGPS->mDigitalOutput2=RACD_DigitalOutput_Enable; $ActionResponseInfo.='DigitalOutput2=Enable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput2=Disable')!==false) {$pcGPS->mDigitalOutput2=RACD_DigitalOutput_Disable; $ActionResponseInfo.='DigitalOutput2=Disable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput2=Toggle')!==false) {$pcGPS->mDigitalOutput2=RACD_DigitalOutput_Toggle; $ActionResponseInfo.='DigitalOutput2=Toggle!';}
				if(strpos($ResponseActionFile, 'DigitalOutput3=Enable')!==false) {$pcGPS->mDigitalOutput3=RACD_DigitalOutput_Enable; $ActionResponseInfo.='DigitalOutput3=Enable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput3=Disable')!==false) {$pcGPS->mDigitalOutput3=RACD_DigitalOutput_Disable; $ActionResponseInfo.='DigitalOutput3=Disable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput3=Toggle')!==false) {$pcGPS->mDigitalOutput3=RACD_DigitalOutput_Toggle; $ActionResponseInfo.='DigitalOutput3=Toggle!';}
				if(strpos($ResponseActionFile, 'DigitalOutput4=Enable')!==false) {$pcGPS->mDigitalOutput4=RACD_DigitalOutput_Enable; $ActionResponseInfo.='DigitalOutput4=Enable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput4=Disable')!==false) {$pcGPS->mDigitalOutput4=RACD_DigitalOutput_Disable; $ActionResponseInfo.='DigitalOutput4=Disable!';}
				if(strpos($ResponseActionFile, 'DigitalOutput4=Toggle')!==false) {$pcGPS->mDigitalOutput4=RACD_DigitalOutput_Toggle; $ActionResponseInfo.='DigitalOutput4=Toggle!';}
				if(strpos($ResponseActionFile, 'Photo=HiRes')!==false) {$pcGPS->mPhoto=RACD_Photo_HiRes; $ActionResponseInfo.='Photo=HiRes!';}
				if(strpos($ResponseActionFile, 'Photo=LoRes')!==false) {$pcGPS->mPhoto=RACD_Photo_LoRes; $ActionResponseInfo.='Photo=LoRes!';}
				LogError("INFO (not an error): Action response sent to module $Imei: $ActionResponseInfo");
			} else LogError("The file $FileName could not read or was empty and will be deleted");
			@chmod($FileName, 0666); if(!@unlink($FileName)) LogError("!!!SERIOUS PROBLEM!!! The file '$FileName' could not be deleted (will be retried later).");
		}
	}

	if(UnwantedOutputCheckpoint(6)) exit(0); //Safety check to see if your code changes evoked any text/error/warning output in the execution before this checkpoint.

	//Build a response and return it to the transmitting module.
	//This response includes the acknowledge for the processed data parts
	//(so the module will not send them again) and the commands that are set
	//via the response action member variables of the class.
	print($pcGPS->BuildResponseHTTP($NumberOfProcessedDataParts)); //Build and send the response to acknowledge.
	exit(0); //Silent script exit
}














//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
// All code below from here to the end of this script (except for the last line)
// can be removed.
// It is ONLY meant for testing purposes to:
// - Display a simple user interface to manually simulate module transmissions
//   to your server for testing purposes.
// - Display a user interface a URL and handling of it to display an overview
//   that shows which info is available per module data Switch Value type.
// - A user interface for database experiments that include creation, deletion,
//   SQL queries (only if you installed MySQL and enabled database usage).
// - Show you how to use the CGPS class and displays the output of some of its
//   API functions.
//
// *** WARNING ***
// The code below is specially meant to give you (and only you) as much unrestricted access
// as possible for easily doing your experiments.
// Just as easy as you can create a new database simply with a with a mouse click,
// you can just as easily delete it again, including all its contents.
// Of course really not something you will want your customers (or even some colleges ;-)
// to have access to.
// So simply make a copy of the script on your server and remove the code below only from
// the script that you give a simple and short name to which you set the settings of your
// modules to send their data to.
// Give the second copy of the script with the code below still in it a longer and more
// unguessable name on your server so only you know of its existence.
// When properly set up, a HTTP server does not show the files that are on it.
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////


//Some constants and globals used throughout the code below.
define('GHTT_FullSingleColumn', 0); define('GHTT_WideHeader', 1); define('GHTT_WideRow', 2);
define('GHTT_WideFooter', 3); define('GHTT_SwitchHeader', 4); define('GHTT_SwitchRow', 5);
define('GHTT_SwitchFooter', 6); $GenerateHtmlTableEvenOddRow=0;
$pcGPS=new CGPS(); //Create new instance of the CGPS class.
$RealScriptAddress=$_SERVER['PHP_SELF']; //Get the http://... address of this example server.


//Add some extra items to the HTTP server's header in an attempt to make the
//many possible caching mechanisms (e.g. in browsers and proxy servers) think
//that the data that it received last time is too old to re-use it again and
//therefore really fetch the page again instead of faking that and sending the
//old data again.
header('Expires: Mon, 26 Jul 2007 05:00:00 GMT');	// Date in the past
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');	// Always changed
header('Cache-Control: no-store, no-cache, must-revalidate');	// HTTP/1.1
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');	// HTTP/1.0


//### NOTE ### *** this part will only be used if you enabled database usage above.
//It retrieves and displays/uploads the module's extra data like that is stored
//in the database record with the given number.
//e.g. http://www.YourServer.com/ThisScriptName.php?ShowRecordExtraData=<RecordNumber>
$ShowRecordExtraDataVariableName='ShowRecordExtraData'; //The variable name to evoke this code and to pass the record number.
if(isset($_GET[$ShowRecordExtraDataVariableName]))
{
	$FatalErrorMessage='';
	try
	{
		//Connect to the database.
		$dbh=new PDO("mysql:host=$Host;dbname=$MySqlDatabaseName", $MySqlLogin, $MySqlPassword);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Now find the record with the given record number with an SQL query
		$RecordNumber=(int)$_GET[$ShowRecordExtraDataVariableName]; //Protection against anything else supplied than a value in the URL
		$SqlQueryResult=$dbh->query("SELECT $MySqlColumnImei, $MySqlColumnDateTime, $MySqlColumnData, $MySqlColumnExtra FROM $MySqlTableName WHERE $MySqlColumnRecord=$RecordNumber")
							->fetch(PDO::FETCH_ASSOC);
		if($SqlQueryResult!==false)
		{
			//SQL query successfully executed, put its data in the CGPS class
			if(	$pcGPS->SetBinaryData($SqlQueryResult[$MySqlColumnImei], $SqlQueryResult[$MySqlColumnData]) //Can we put it in the class?
				&& $pcGPS->IsValid() ) //and is it accepted and valid? 
			{
				//Retrieve the IMEI
				$Imei=$pcGPS->GetImei(); //Same as in $SqlQueryResult[$MySqlColumnImei]
				//### TIP ###
				//The IMEI of the module that transmitted the requested
				//binary data to the server is now known and you could
				//decide if you allow the user(account) that is now
				//requesting this data, to actually give it or not.
				
				//Check out the Switch Value of this record
				switch($pcGPS->GetSwitch())
				{
				//Records with these Switch values are announcement headers
				//of which the actual binary data was stored in the log
				//as additional records containing parts of that data.
				case SV_LogDataHeader:
					$DataType=$pcGPS->GetLogDataType(); //Type of the data
					$NumberOfDataBytes=$pcGPS->GetLogDataSize(); //Size of binary data in bytes
					switch($DataType)
					{
					case 1: $DataTypeDescription="Data type: $DataType(=Binary data read via smart card reader) / Total bytes: $NumberOfDataBytes"; break;
					case 2: $DataTypeDescription="Data type: $DataType(=Binary settings data from non-volatile backup memory) / Total bytes: $NumberOfDataBytes"; break;
					case 3: $DataTypeDescription="Data type: $DataType(=Binary LCD/source-code data from non-volatile backup memory) / Total bytes: $NumberOfDataBytes"; break;
					case 4: $DataTypeDescription="Data type: $DataType(=Binary settings data from run-time memory) / Total bytes: $NumberOfDataBytes"; break;
					case 5: $DataTypeDescription="Data type: $DataType(=Binary LCD/source-code data from run-time memory) / Total bytes: $NumberOfDataBytes"; break;
					case 6: $DataTypeDescription="Data type: $DataType(=Binary geographical regions data from non-volatile backup memory) / Total bytes: $NumberOfDataBytes"; break;
					case 7: $DataTypeDescription="Data type: $DataType(=Binary geographical regions data from run-time memory) / Total bytes: $NumberOfDataBytes"; break;
					case 8: $DataTypeDescription="Data type: $DataType(=Binary SiRF GPS ephemeris data) / Total bytes: $NumberOfDataBytes"; break;
					default: $DataTypeDescription="Data type: $DataType(=Data via the log) / Total bytes: $NumberOfDataBytes"; break;
					}
					$DataRecordsSwitch=SV_LogData; //Binary data is logged in records of this type
					break;
				case SV_PhotoLog:
				case SV_PhotoGpsLog:
					$DataType=0; //Picture in JPEG format
					$NumberOfDataBytes=$pcGPS->GetPhotoLogDataSize(); //Size of the JPEG data in bytes
					$CameraPort=$pcGPS->GetPhotoPort(); //Port to which this camera is attached
					$DataTypeDescription="Data type: Picture in JPEG format via the log / Total bytes: $NumberOfDataBytes / Camera on serial port: $CameraPort";
					$DataRecordsSwitch=SV_PhotoLogData; //Picture JPEG data are logged in records of this type
					break;
				//Records with these Switch values were transmitted asynchronously
				//including extra data and was not stored in individual smaller records.
				case SV_Photo:
				case SV_PhotoGps:
					$DataType=0; //Picture in JPEG format
					$NumberOfDataBytes=$pcGPS->GetExtraDataSize(); //Size of the JPEG data in bytes
					$CameraPort=$pcGPS->GetPhotoPort(); //Port to which this camera is attached
					$DataTypeDescription="Data type: Picture in JPEG format via asynchronous \"extra data\" / Total bytes: $NumberOfDataBytes / Camera on serial port: $CameraPort";
					$DataRecordsSwitch=-1; //A non existing Switch value to not have the database engine look them up
					break;
				default:
					$DataType=-1; //Other binary data
					$NumberOfDataBytes=$pcGPS->GetExtraDataSize(); //Size of the binary data in bytes
					$DataTypeDescription="Data type: Other data via asynchronous \"extra data\" / Total bytes: $NumberOfDataBytes";
					$DataRecordsSwitch=-1; //A non existing Switch value to not have the database engine look them up
					break;
				}
				if($DataRecordsSwitch<0) //Real Switch value to search additional records for?
				{
					//Nope, so this must have been received as an asynchronous transmission
					//with extra data included, so retrieve what was once recorded from
					//the record that we already have read.
					$BinaryData=$SqlQueryResult[$MySqlColumnExtra];
				}
				else
				{
					//Yes, so we have to ask the database engine to search the
					//records additional records that contain the binary data
					//that belongs to this header/announcement record.
					//This extra data is stored in multiple records in the
					//of which the first record has the same date/time stamp
					//as the current header/announcement record.
					$DateTimeFirstRecord=$SqlQueryResult[$MySqlColumnDateTime];
					//The last record of the full set containing the extra
					//data will contain a date/time than that of the first
					//record plus the time-span calculation in this formula.
					date_default_timezone_set('GMT'); //### NOTE ### Disable this timezone command if your PHP version is older than 5.1
					$DateTimeLastRecord=gmdate('YmdHis', strtotime($DateTimeFirstRecord) + ((0.16*(($NumberOfDataBytes/25.0)/256.0))+1) );
					//Number or records that contain this number of bytes
					$Limit=(int)(($NumberOfDataBytes+24)/25); //The number of records that contain the data
					//Now build the SQL query for the database to gather all
					//records containing the extra data.
					$stmt=$dbh->prepare
					(
						"SELECT $MySqlColumnRecord, $MySqlColumnData" //Retrieve the binary data of the records.
							." FROM $MySqlTableName" //From this table.
							." WHERE $MySqlColumnSwitch=$DataRecordsSwitch" //Being SV_LogData records.
							." AND $MySqlColumnImei=$Imei" //Of the current IMEI.
							." AND $MySqlColumnRecord>'$RecordNumber'" //With a higher record number than the SV_LogDataHeader is in.
							." AND $MySqlColumnDateTime>='$DateTimeFirstRecord'" //With a the same or higher timestamp than the SV_LogDataHeader.
							." AND $MySqlColumnDateTime<='$DateTimeLastRecord'" //With a timestamp lower than that of the SV_LogDataHeader record + calculated seconds.
							." GROUP BY $MySqlColumnData" //Makes the database deliver us the records with possible double records filtered out.
							." ORDER BY $MySqlColumnData ASC" //Makes the database deliver us the records found sorted from oldest to newest order.
							." LIMIT $Limit" //We only need the first "Limit" number records found that we calculated.
						, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL)
					);
					$stmt->execute();
					//Loop through all records found that were found, to
					//extract the binary from them with the CGPS class
					//and append all parts together to construct a complete
					//binary data block.
					$BinaryData=''; //Variable to construct the binary data in
					if($pcGPS->CanGetIndex()) $Index=$pcGPS->GetIndex(); else $Index=-1; //Get index of the announcement/header or use -1 if it has none
					while ($Row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
					{
						//Put data from current record in the CGPS class
						if(!$pcGPS->SetBinaryData($Imei, $Row[$MySqlColumnData]))
						{
							//Ooops... The CGPS class does not accept the data.
							//Generate some error message to display below and stop further processing.
							$FatalErrorMessage="Invalid data from '$MySqlColumnImei/$MySqlColumnData' fields in record '$MySqlColumnRecord=$RecordNumber' (".$pcGPS->GetLastError().')';
							break;
						}
						//If we know the Index of the previous already,
						//then check if the Index of the current record
						//is actually the next one we expect.
						if($Index!=-1) //Index of previous record known?
						{
							//Index of previous record known, so the current record
							//should have an Index one higher than the previous.
							if(++$Index>255) $Index=0; //Increase Index value and reset it to 0 again when it gets above 255
							if($pcGPS->GetIndex()!=$Index) //Does current record have this expected Index value?
							{
								//Ooops... This next record found contains data
								//that has a different Index value of the original
								//module's log than the previous record we found,
								//so the records in between are missing.
								//Generate some error message to display below
								//and stop further processing.
								$FatalErrorMessage="Missing database record! (Database record '$MySqlColumnRecord=".$Row[$MySqlColumnRecord]."' contains a GetIndex() value of ".$pcGPS->GetIndex().", while the record with the required value ($Index) is not in the database).";
								break;
							}
						} else $Index=$pcGPS->GetIndex(); //No Index of previous record known yet, so use Index of this record.
						//Append binary data part extracted with the CGPS
						//class to the data we already constructed so far
						$BinaryData.=$pcGPS->GetLogDataBytes(); //Append binary data from this record to the rest
					}
				}
				$dbh = $stmt = null; //Close the connection to the database
				//Now evaluate the result of what
				//happened in the loop above.
				if(!strlen($FatalErrorMessage)) //No error occurred earlier (empty error string) ?
				{
					if($DataRecordsSwitch>0) //Real Switch value that we searched and appended additional records for?
					{
						//Check if the total amount of data that
						//we appended together from individual
						//matches the the total of the full data
						if(strlen($BinaryData)<$NumberOfDataBytes)
						{
							//Not enough data, probably because the
							//module is still busy transmitting the rest
							//to the server.
							print('<HTML><HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="refresh" content="5"></head><body><P>' //Begin of HTML auto refresh code to make the calling web browser automatically retry every 5 seconds
								."$DataTypeDescription<BR><BR>Data on the server is currently incomplete: ".strlen($BinaryData).' bytes received there so far...'
								.'</body></html>'); //End of auto refresh HTML code
							exit(0); //Terminate this script
						}

						//Data appended together from logged records usually
						//have some extra undefined bytes at the end from the
						//last record which we strip off here.
						$BinaryData=substr($BinaryData, 0, $NumberOfDataBytes);
					}
					else
					{
						//Did the record contain all the asynchronously
						//transmitted extra data?
						if(strlen($BinaryData)!=$NumberOfDataBytes)
						{
							//Data in the record does not match the originally
							//transmitted extra data that was received and no
							//additional data can follow later.
							print("$DataTypeDescription<BR><BR>ERROR: Of the actual $NumberOfDataBytes bytes of data, the database contains ".strlen($BinaryData).'.</body></html>');
							exit(0); //Terminate this script
						}
					}
					
					//Upload the data to the web browser in a manner
					//that is suitable for the type of the data.
					switch($DataType)
					{
					case 0: //Data is a photo
						//Upload data to the web browser as a JPEG picture
						header('Content-type: image/jpeg');
						header('Content-transfer-encoding: binary');
						header("Content-length: $NumberOfDataBytes");
						print($BinaryData);
						exit(0); //Terminate this script
					case 2: //Module settings from EEPROM
					case 4: //Module settings from RAM
						//Upload data to the web browser as a settings file
						header('Content-Type: application/force-download'); 
						header('Content-transfer-encoding: binary');
						header("Content-Disposition: attachment; filename=\"Settings_$Imei.tms\"");
						header("Content-length: $NumberOfDataBytes");
						print($BinaryData);
						exit(0); //Terminate this script
					case 3: //Data is binary LCD/source-code block from FLASH
					case 5: //Data is binary LCD/source-code block from RAM
						$pcGPScode=new CGPSCODE();
						if($pcGPScode->SetBinaryData($BinaryData)) //Put binary data in the CGPSCODE class
						{
							//Success, so upload source code as file to the web browser
							$BinaryData=$pcGPScode->GetSourceCode(); //Replace binary data with source code text
							$NumberOfDataBytes=strlen($BinaryData); //Replace size with that of the source code text
							header('Content-Type: application/force-download'); 
							header('Content-transfer-encoding: binary');
							header("Content-Disposition: attachment; filename=\"SourceCode $Imei.src\"");
							header("Content-length: $NumberOfDataBytes");
							print($BinaryData);
						}
						else
						{
							//Error, so send error text + converted source code text (maybe it is partially useful) to the web browser
							header('Content-Type: text/html; charset=utf-8');
							print('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
								.'<HTML><HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><TITLE>Data display</TITLE></head><body><P style="white-space:nowrap">'
								."$DataTypeDescription<BR><BR>ERROR: ".$pcGPScode->GetLastError().'<BR>'
								.'Source code decoded from the data anyway ignoring all errors:<BR><BR><code>'
								.str_replace("\r\n", "<BR>\r\n", $pcGPScode->GetSourceCode())
								.'</code></p></body></html>');
						}
						exit(0); //Terminate this script
					case 1: //Binary data read via smart card reader
					case 6: //Regions data from FLASH
					case 7: //Regions data from RAM
						//Simply continue with same procedure as for "default:" below.
					default: //Other (possible future) data type
						//Output binary data in a HTML safe and human readable way to the web browser
						header('Content-Type: text/html; charset=utf-8');
						print('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
							.'<HTML><HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><TITLE>Data display</TITLE></head><body><P style="white-space:nowrap">'
							."$DataTypeDescription<BR><code>");
						$BytesPerLine=32;
						for($Byte=0;$Byte<$NumberOfDataBytes;$Byte+=$BytesPerLine)
						{
							printf("<BR>%08X: ", $Byte);
							print(chunk_split(bin2hex(substr($BinaryData, $Byte, $BytesPerLine)), 8, '|'));
							print(' '.str_replace("\0", '.', str_replace(' ', '&nbsp;', htmlspecialchars(utf8_encode(substr($BinaryData, $Byte, $BytesPerLine))))));
						}
						print('</code></p></body></html>');
						exit(0); //Terminate this script
					}
				}
			} else $FatalErrorMessage="'$MySqlColumnImei'/'$MySqlColumnData' contents of requested database record '$RecordNumber' is invalid (".$pcGPS->GetLastError().')';
		} else $FatalErrorMessage="Requested record '$RecordNumber' not found in database";
	}
	catch (PDOException $e)
	{
	    $SqlError=$e->getMessage();
	}
	header('Content-Type: text/html; charset=utf-8');
	print('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">');
	print('<HTML><HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><TITLE>ERROR</TITLE></head><body><P>');
	if(isset($DataTypeDescription)) print("$DataTypeDescription");
	if(strlen($FatalErrorMessage)) print('<BR><BR>ERROR: '.htmlentities($FatalErrorMessage, ENT_COMPAT, 'UTF-8'));
	if(isset($SqlError)) print('<BR><BR>DATABASE ERROR OCCURRED: '.htmlentities($SqlError, ENT_COMPAT, 'UTF-8'));
	print('</p></body></html>');
	exit(0);	//Stop execution of this script
}


//Start of standard HTML output to be sent to the web browser
//after which the rest will be added dynamically later on.
header('Content-Type: text/html; charset=utf-8');
$Title='Module server example';
print
(
	'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
	.'<HTML><HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8">'
	."<TITLE>$Title</TITLE><STYLE type=\"text/css\"><!--\r\n"
	.'html,body{margin:0;padding:0}body{color:black;background-color:#F0F0F0;margin:0 5px 5px 5px;padding:0}'
	.'table{color:black;background-color:gray;border:solid 0 #000000;border-collapse:collapse;border-spacing:1px 1px;border:outset 0;font-size:0.8em}'
	.'tr{background-color:#FFFFFF}tr.o{background-color:#E0E0FF}'
	.'th,th.l,td,td.l,td.c,td.tl{text-align:left;white-space:nowrap;border:inset 1pt #B0B0B0}'
	.'th,th.l{text-align:center;background-color:#9999CC}th.l{text-align:left}'
	.'td.c{text-align:center}td.tl{text-align:left;background-color:#CCCCFF}'
	.'.desc{cursor:help;text-decoration:none}span{white-space:nowrap}H2{font-size:1.1em;margin:.2em 0 0 0;padding:0}'
	.'p{margin:.1em 0 0;padding:.1em 0 0}form{margin:0;padding:0}'
	."\r\n".'--></style></head><body>'
	."<TABLE STYLE=\"margin-left:auto;margin-right:auto\"><TR class=o><th style=\"font-size:2em\">$Title<TD>$EXAMPLE_SERVER_VERSION<BR>$CGPS_CLASS_VERSION</table><P>"
);
$HtmlFooter='</body></html>';


//This part shows some example module data strings as clickable simulation 
//URL's in the simple user interface.
//The data strings are also modified before they are printed, to make them
//contain the current date/time of your computer.
//But there is absolutely no reason why you will want to examine or even try
//to understand how that is done below.
$ExampleModuleDataStrings=array("1234567|llvvyw0DNJM1SL3G4Tfj9w01k1E7d0r0--0G0qvfJu42","1234567|lluN6M0FGMs1SO22u2dzBw0JjTaelMd02x0S04hCKu42","1234567|l9KckM0ZDv4O05GB00Tgp0shyfs000000000008V2c02|lloCS00l10Q1LTiO07VzQw10mo2elMd42BkS02JCKuk2|003aTE5cwv0Q-Y3-M35N3v-0kU2BvM-3J000002P0c02|lkUZog0BaVQ1MGObliNFK_00dL1ZF0beJ00Ew2GZBY02|kXM9TizGXq5v50000exx0iwRfvM0000jn04N00380c00|k_OgmyzGXq602w000exD0g0000000000000000000c00|ifMh9BhEqndD5i1FsO1x87dBsCBxr21QpndQ00210c00|kJXOlAhOqnpM6mlOey1arSxKeO1jt65QtncW84NLos06|kJXOlChFrCtN6i1zon9DrPIwimVSrSBzpjEwcj8Pdc06|kJXOlzkSdPxO1000001N500Hkcn22000J00y002Z0c06|oIMZrr003glEqNtZvQIg0c0bvlH50g40001g0gc0SY43");
$pcGPSorg=new CGPS(); $TimeHex=sprintf("%08X", (int)((((float)time()+15-(float)946684800.0)*(float)100)/(float)16));
for($ilan=0;$ilan<count($ExampleModuleDataStrings);$ilan++) if($pcGPSorg->SetHttpData($ExampleModuleDataStrings[$ilan]) && $pcGPSorg->IsValid()) for($Part=0;;$Part++) {
	if($Part>0) {if($Part>=$pcGPSorg->GetDataPartCount()) {$ExampleModuleDataStrings[$ilan]=$Updated; break;};if(!$pcGPSorg->SelectDataPart($Part)) break;}
	else $Imei=$Updated=substr($ExampleModuleDataStrings[$ilan], 0, strpos($ExampleModuleDataStrings[$ilan], "|"));
	if(!$pcGPS->SetHexData($Imei, $TimeHex.substr($pcGPSorg->GetHexData(), 8))) break;
	$HttpData=$pcGPS->GetHttpData(); $Updated.=substr($HttpData, strpos($HttpData, "|")); }
//Display the "$EXAMPLE_SERVER_DESCRIPTION" from the beginning of this source code
if(!(isset($_GET) && count($_GET))) print('<B>'.str_replace('  ', ' &nbsp;', str_replace("\n", "<BR>", str_replace("\r", "\n", str_replace("\r\n", "\n", "$EXAMPLE_SERVER_DESCRIPTION")))).'</B><BR><BR>');
//Output the list with simulation URL's to the browser
print('These links can be used to manually simulate a module transmission to your server (their date/time is updated on each browser refresh).'
	.'<BR>Your server will receive and handle the incoming data and return a response, which your browser will display as something like: *A#G OK<BR>');
foreach($ExampleModuleDataStrings as $DataString) print("<SPAN><A HREF=\"$RealScriptAddress?$ReceptionVariableName=$DataString\">www.YourServer.com/YourScript.php?$ReceptionVariableName=$DataString</A></SPAN><BR>");
print('With the extra decoding feature, you can manually decode module data strings. Click one to see the decoding result of various CGPS class functions.<BR>');
foreach($ExampleModuleDataStrings as $DataString) print("<SPAN><A HREF=\"$RealScriptAddress?DecodeHttpData=$DataString\">$DataString</A></SPAN><BR>");


//Display some additional clickable functions in the webbrowser
//where some code parts below respond to.
print("Additional functions: <A HREF=\"$RealScriptAddress?ShowSwitchTable\">view available info per Switch Value</A> &nbsp; <A HREF=\"$RealScriptAddress?ViewRecentErrorLog\">view recent error log part</A> &nbsp; <A HREF=\"$RealScriptAddress?ViewFullErrorLog\">view full error log</A> &nbsp; <A HREF=\"$RealScriptAddress?EraseErrorLog\">create/erase error log</A><BR>");


//Store Switch Value textual and value definitions in an array so we can use them
//conveniently convert between them later on.
$aSwitchDefines=array
(
	//Name of the definition			//Value of the definition
	'SV_Position'							=>	SV_Position,
	'SV_PositionMotionUnknown'				=>	SV_PositionMotionUnknown,
	'SV_PositionCompact'					=>	SV_PositionCompact,
	'SV_PositionMotionUnknownCompact'		=>	SV_PositionMotionUnknownCompact,
	'SV_PositionTripMeters'					=>	SV_PositionTripMeters,
	'SV_PositionTravelledMeters'			=>	SV_PositionTravelledMeters,
	'SV_PositionAcceleration'				=>	SV_PositionAcceleration,
	'SV_PositionAnalogInputs'				=>	SV_PositionAnalogInputs,
	'SV_PositionCustom'						=>	SV_PositionCustom,
	'SV_PositionTravelledMetersFuel'		=>	SV_PositionTravelledMetersFuel,
	'SV_PowerUp'							=>	SV_PowerUp,
	'SV_InternalStatus1'					=>	SV_InternalStatus1,
	'SV_Counters'							=>	SV_Counters,
	'SV_CountersHighestSpeed'				=>	SV_CountersHighestSpeed,
	'SV_CountersAnalogInputs'				=>	SV_CountersAnalogInputs,
	'SV_CountersUser'						=>	SV_CountersUser,
	'SV_Network'							=>	SV_Network,
	'SV_InternalStatus2'					=>	SV_InternalStatus2,
	'SV_RestartAnnouncement'				=>	SV_RestartAnnouncement,
	'SV_ReceivedSMS'						=>	SV_ReceivedSMS,
	'SV_CalledByUnknownPhoneNumber'			=>	SV_CalledByUnknownPhoneNumber,
	'SV_CalledByKnownPhoneNumber'			=>	SV_CalledByKnownPhoneNumber,
	'SV_SettingsAccepted'					=>	SV_SettingsAccepted,
	'SV_SettingsRejected'					=>	SV_SettingsRejected,
	'SV_KeepAlive'							=>	SV_KeepAlive,
	'SV_TimeAlive'							=>	SV_TimeAlive,
	'SV_Acknowledge'						=>	SV_Acknowledge,
	'SV_KeepAliveTripMeters'				=>	SV_KeepAliveTripMeters,
	'SV_TimeAliveTripMeters'				=>	SV_TimeAliveTripMeters,
	'SV_KeepAliveTravelledMeters'			=>	SV_KeepAliveTravelledMeters,
	'SV_TimeAliveTravelledMeters'			=>	SV_TimeAliveTravelledMeters,
	'SV_KeepAliveAcceleration'				=>	SV_KeepAliveAcceleration,
	'SV_TimeAliveAcceleration'				=>	SV_TimeAliveAcceleration,
	'SV_KeepAliveAnalogInputs'				=>	SV_KeepAliveAnalogInputs,
	'SV_TimeAliveAnalogInputs'				=>	SV_TimeAliveAnalogInputs,
	'SV_KeepAliveCustom'					=>	SV_KeepAliveCustom,
	'SV_TimeAliveCustom'					=>	SV_TimeAliveCustom,
	'SV_KeepAliveTravelledMetersFuel'		=>	SV_KeepAliveTravelledMetersFuel,
	'SV_TimeAliveTravelledMetersFuel'		=>	SV_TimeAliveTravelledMetersFuel,
	'SV_PowerDownBackup1'					=>	SV_PowerDownBackup1,
	'SV_ServerDataUploadAccepted'			=>	SV_ServerDataUploadAccepted,
	'SV_ServerDataUploadRejected'			=>	SV_ServerDataUploadRejected,
	'SV_Photo'								=>	SV_Photo,
	'SV_PhotoLog'							=>	SV_PhotoLog,
	'SV_PhotoGpsLog'						=>	SV_PhotoGpsLog,
	'SV_PhotoGps'							=>	SV_PhotoGps,
	'SV_PhotoLogData'						=>	SV_PhotoLogData,
	'SV_LogDataHeader'						=>	SV_LogDataHeader,
	'SV_LogData'							=>	SV_LogData,
	'SV_1WireDetached'						=>	SV_1WireDetached,
	'SV_iButton'							=>	SV_iButton,
	'SV_Port1Data'							=>	SV_Port1Data,
	'SV_Port2Data'							=>	SV_Port2Data,
	'SV_Port3Data'							=>	SV_Port3Data,
	'SV_Port4Data'							=>	SV_Port4Data,
	'SV_DigTach1'							=>	SV_DigTach1,
	'SV_DigTachVIN'							=>	SV_DigTachVIN,
	'SV_DigTachVRN'							=>	SV_DigTachVRN,
	'SV_DigTachCARD1'						=>	SV_DigTachCARD1,
	'SV_DigTachCARD2'						=>	SV_DigTachCARD2,
	'SV_LcdData1'							=>	SV_LcdData1,
	'SV_LcdData2'							=>	SV_LcdData2,
	'SV_LcdData3'							=>	SV_LcdData3,
	'SV_LcdData4'							=>	SV_LcdData4,
	'SV_LcdData5'							=>	SV_LcdData5,
	'SV_LcdData6'							=>	SV_LcdData6,
	'SV_LcdData7'							=>	SV_LcdData7,
	'SV_LcdData8'							=>	SV_LcdData8,
	'SV_LcdData9'							=>	SV_LcdData9,
	'SV_LcdData10'							=>	SV_LcdData10,
	'SV_LcdData11'							=>	SV_LcdData11,
	'SV_LcdData12'							=>	SV_LcdData12,
	'SV_LcdData13'							=>	SV_LcdData13,
	'SV_LcdData14'							=>	SV_LcdData14,
	'SV_LcdData15'							=>	SV_LcdData15,
	'SV_LcdData16'							=>	SV_LcdData16,
	'SV_1WireData1'							=>	SV_1WireData1,
	'SV_1WireData2'							=>	SV_1WireData2,
	'SV_1WireData3'							=>	SV_1WireData3,
	'SV_1WireData4'							=>	SV_1WireData4,
	'SV_1WireData5'							=>	SV_1WireData5,
	'SV_1WireData6'							=>	SV_1WireData6,
	'SV_1WireData7'							=>	SV_1WireData7,
	'SV_1WireData8'							=>	SV_1WireData8,
	'SV_1WireData9'							=>	SV_1WireData9,
	'SV_1WireData10'						=>	SV_1WireData10,
	'SV_1WireData11'						=>	SV_1WireData11,
	'SV_1WireData12'						=>	SV_1WireData12,
	'SV_1WireData13'						=>	SV_1WireData13,
	'SV_1WireData14'						=>	SV_1WireData14,
	'SV_1WireData15'						=>	SV_1WireData15,
	'SV_1WireData16'						=>	SV_1WireData16,
	'SV_GsmCellScan'						=>	SV_GsmCellScan,
	'SV_GsmCellScanStrip'					=>	SV_GsmCellScanStrip,
	'SV_InaccuratePosition'					=>	SV_InaccuratePosition,
	'SV_InaccuratePositionCompact'			=>	SV_InaccuratePositionCompact,
	'SV_InaccuratePositionTripMeters'		=>	SV_InaccuratePositionTripMeters,
	'SV_InaccuratePositionTravelledMeters'	=>	SV_InaccuratePositionTravelledMeters,
	'SV_InaccuratePositionAcceleration'		=>	SV_InaccuratePositionAcceleration,
	'SV_InaccuratePositionAnalogInputs'		=>	SV_InaccuratePositionAnalogInputs,
	'SV_InaccuratePositionCustom'			=>	SV_InaccuratePositionCustom,
	'SV_InaccuratePositionTravelledMetersFuel'	=>	SV_InaccuratePositionTravelledMetersFuel,
	'SV_Invalid'							=>	SV_Invalid
);


//### NOTE ### *** this part will only be used if you enabled database usage
//This part displays and handles manually supplied SQL queries you enabled
//database support.
//### WARNING ### !!! WARNING !!! WARNING !!! WARNING !!! WARNING !!!
//### WARNING ### !!! WARNING !!! WARNING !!! WARNING !!! WARNING !!!
//### WARNING ### !!! WARNING !!! WARNING !!! WARNING !!! WARNING !!!
//This part is only done this way so you can easily experiment with manual
//constructed SQL queries and see the result without restrictions.
//You should of course !NEVER! allow anyone but yourself such freedom this way
//with your database.
//Therefore you will want to remove this from your (short named) receiption-
//script and have another copy for yourself with a long and unguessable name
//online while you are making use of it. 
//Example SQL queries are included to create a database and table as suggested
//in the "DATABASE STORAGE EXAMPLE" info above.
//They will be displayed to you and you can simply create a proper database and
//table by clicking them.
//Additionally you will see an entry field where you can manually enter SQL
//queries for easy experimenting.
//The result of your SQL queries will be displayed including some timing or
//other available information.
//You can even execute SQL commands with it like:
//  OPTIMIZE TABLE NameOfYourTable    and     REPAIR TABLE NameOfYourTable
if(	isset($All_MySQL_variables_are_properly_set_to_enable_database_support)
	&& $All_MySQL_variables_are_properly_set_to_enable_database_support===true ) //See "DATABASE STORAGE EXAMPLE" information above
{
	print('<H2>Database SQL query examples</H2>');
	$ThisScript=$_SERVER['PHP_SELF'];
	$DatabaseSqlQueryVariableName="DatabaseSqlQuery";

	//Display some links with example SQL queries that can be executed via the browser
	$SqlQuery=$CreateDatabaseSqlQuery="CREATE DATABASE $MySqlDatabaseName";
	print("<P><SPAN>Create database: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A>&nbsp;&nbsp;&nbsp;&nbsp;");
	$SqlQuery="CREATE TABLE $MySqlTableName"
		." ( "
			."$MySqlColumnRecord INT UNSIGNED NOT NULL AUTO_INCREMENT,"
			."$MySqlColumnDateTime DATETIME NOT NULL,"
			."$MySqlColumnImei BIGINT NOT NULL,"
			."$MySqlColumnSwitch TINYINT UNSIGNED NOT NULL,"
			."$MySqlColumnEventID SMALLINT UNSIGNED NOT NULL,"
			."$MySqlColumnLatitude INT UNSIGNED NOT NULL,"
			."$MySqlColumnLongitude INT UNSIGNED NOT NULL,"
			."$MySqlColumnIO TINYINT UNSIGNED NOT NULL,"
			."$MySqlColumnData TINYBLOB NOT NULL,"
			."$MySqlColumnExtra LONGBLOB NOT NULL,"
			."PRIMARY KEY ($MySqlColumnRecord),"
			."KEY $MySqlColumnDateTime ($MySqlColumnDateTime),"
			."KEY $MySqlColumnImei ($MySqlColumnImei),"
			."KEY $MySqlColumnSwitch ($MySqlColumnSwitch),"
			."KEY $MySqlColumnEventID ($MySqlColumnEventID)"
		.") Engine=MyISAM";
	print("Create table: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars(substr($SqlQuery, 0, 30), ENT_COMPAT, 'UTF-8')."...</A>&nbsp;&nbsp;&nbsp;&nbsp;");
	$SqlQuery="DROP TABLE $MySqlTableName";
	print("Delete table: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A>&nbsp;&nbsp;&nbsp;&nbsp;");
	$SqlQuery="DROP DATABASE $MySqlDatabaseName";
	print("Delete database: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A><BR>");
	$SqlQuery="SELECT * FROM $MySqlTableName ORDER BY $MySqlColumnRecord DESC LIMIT 50";
	print("</SPAN><SPAN>Receptions: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A></SPAN><BR>");
	$SqlQuery="SELECT * FROM $MySqlTableName WHERE $MySqlColumnSwitch>=SV_LowestPositionSwitch AND $MySqlColumnSwitch<=SV_HighestPositionSwitch GROUP BY $MySqlColumnData ORDER BY $MySqlColumnDateTime DESC, $MySqlColumnRecord DESC LIMIT 50";
	print("<SPAN>Positions: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A></SPAN><BR>");
	$SqlQuery="SELECT * FROM $MySqlTableName WHERE $MySqlColumnEventID!=0 GROUP BY $MySqlColumnData ORDER BY $MySqlColumnRecord DESC LIMIT 50";
	print("<SPAN>Positions2: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A></SPAN><BR>");
	$SqlQuery="SELECT * FROM $MySqlTableName WHERE ((($MySqlColumnEventID&1023)=40) OR (($MySqlColumnEventID&1023)=41) OR ($MySqlColumnSwitch=SV_Counters) OR ($MySqlColumnSwitch=SV_CountersHighestSpeed) OR ($MySqlColumnSwitch=SV_RestartAnnouncement) OR ($MySqlColumnSwitch=SV_PowerUp) OR ($MySqlColumnSwitch=SV_SettingsAccepted)) GROUP BY $MySqlColumnData ORDER BY $MySqlColumnDateTime DESC, $MySqlColumnRecord DESC LIMIT 50";
	print("<SPAN>Start+stop+counters: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A></SPAN><BR>");
	$SqlQuery="SELECT * FROM $MySqlTableName WHERE ($MySqlColumnSwitch>=SV_Photo AND $MySqlColumnSwitch<=SV_PhotoGps) OR ($MySqlColumnSwitch=SV_LogDataHeader) GROUP BY $MySqlColumnData ORDER BY $MySqlColumnRecord DESC LIMIT 50";
	print("<SPAN>Photos/data: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A></SPAN><BR>");
	$SqlQuery="SELECT * FROM $MySqlTableName WHERE ($MySqlColumnSwitch<SV_Photo OR $MySqlColumnSwitch>SV_PhotoLogData) AND $MySqlColumnSwitch!=SV_LogData AND $MySqlColumnEventID=0 ORDER BY $MySqlColumnRecord DESC LIMIT 50";
	print("<SPAN>Other than positions and photos: <A HREF=\"$ThisScript?$DatabaseSqlQueryVariableName=".urlencode($SqlQuery)."\">".htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8')."</A></SPAN><BR>");
	if(isset($_GET[$DatabaseSqlQueryVariableName]) && strlen($_GET[$DatabaseSqlQueryVariableName])) $SqlQuery=str_replace('\\"', '"', str_replace("\\'", "'", $_GET[$DatabaseSqlQueryVariableName]));
	else $SqlQuery="SELECT * FROM $MySqlTableName WHERE ($MySqlColumnImei=357541000234567) OR ($MySqlColumnImei=358278000654321) ORDER BY $MySqlColumnDateTime DESC, $MySqlColumnRecord DESC LIMIT 50";
	print("<form name=MySQLquery method=get action=\"$ThisScript\">"
		."<P><SPAN>SQL: </SPAN><input type=text name=\"$DatabaseSqlQueryVariableName\" value=\"$SqlQuery\" size=120>"
		.'<SPAN><input type=submit name=execute value="execute">'
		.'<input type=checkbox name=realdb value="yes"' );
	if(isset($_GET['realdb'])) print(' checked');
	print('>real</SPAN></form>');

	//Did we receive such an SQL query to be executed
	if(isset($_GET[$DatabaseSqlQueryVariableName]))
	{
		//Yes, we received an SQL query command
		//Restore " and ' signs that were translated by the browser to send it to this script
		$SqlQuery=str_replace('\\"', '"', str_replace("\\'", "'", $_GET[$DatabaseSqlQueryVariableName]));
		//Replace the used SV_... definitions with the values that they represent
		$aSwitchArray=$aSwitchDefines;  $aSwitchArray=array_merge($aSwitchArray, array(
			'SV_HighestPositionSwitch'				=>	SV_HighestPositionSwitch,
			'SV_LowestPositionSwitch'				=>	SV_LowestPositionSwitch,
			'SV_LowestInaccuratePositionSwitch'		=>	SV_LowestInaccuratePositionSwitch,
			'SV_HighestInaccuratePositionSwitch'	=>	SV_HighestInaccuratePositionSwitch ) );
		krsort($aSwitchArray); $SqlQuery=str_replace(array_keys($aSwitchArray), array_values($aSwitchArray), $SqlQuery);
		//Display the SQL query in the browser and execute it
		print('<P><B>Executing SQL query:</B> '.htmlspecialchars($SqlQuery, ENT_COMPAT, 'UTF-8').'<BR>');
		flush();
		$SqlQueryResult=false;
		try
		{
			if(strpos($SqlQuery, 'CREATE DATABASE')!==false)
			{
				//Attempt to have the engine create a new database
				print('<span style="color:red">NOTE: This request to create a new database may result in an unjustified error message or real failure to create a database.<br>'
					.'So you may need to just try the create table feature afterward to check if the database engine you are using actually created a database,<br>'
					.'or that it requires you (or your system administrator) to use its own special tools to create a new database for you.</span><br>');
				$dbh=new PDO("mysql:host=$Host", $MySqlLogin, $MySqlPassword);
			}
			else
			{
				//Connect to the already existing database.
				$dbh=new PDO("mysql:host=$Host;dbname=$MySqlDatabaseName", $MySqlLogin, $MySqlPassword);
			}
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Execute the SQL query
			list($usec, $sec)=explode(' ', microtime()); $ExecutionTime=(float)((float)$usec+(float)$sec); //Time before execution
			$stmt=$dbh->prepare($SqlQuery);
			$stmt->execute();
			list($usec, $sec)=explode(' ', microtime()); $ExecutionTime=(float)((float)$usec+(float)$sec)-$ExecutionTime; //Time after-before execution
			$num_rows=$stmt->rowCount();
			printf("<B>Result:</B> Success in %f seconds. Selected rows: %d<BR>", $ExecutionTime, $num_rows);
			flush();
			if($num_rows)
			{
				//The SQL query did select one or more rows, so display them
				$Row=$BlockRow=0; $RecordColumn=$ImeiColumn=$SwitchColumn=$DataColumn=$ExtraColumn=-1;
				while($RowData=$stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
				{
					if($BlockRow==-1) //NOTE: Use 25 on this line for example (instead of -1) to divide the output into separate tables of 25 records
					{
						if(isset($_GET['realdb'])) print('</table>');
						else GenerateHtmlTable($pcGPS, GHTT_WideFooter);
						flush();
						$BlockRow=0;
					}
					if(!$BlockRow++)
					{
						//Create table header
						if(isset($_GET['realdb']))
						{
							print("\r\n<TABLE><TR>");
							foreach($RowData as $Column=>$Data)
								print('<TH>'.htmlspecialchars($Column, ENT_COMPAT, 'UTF-8'));
						} else GenerateHtmlTable($pcGPS, GHTT_WideHeader);
					}
					$Row++;
					$iColumn=0;
					if(isset($_GET['realdb']))
					{
						print("\r\n<TR>");
						foreach($RowData as $Column=>$Data)
						{
							if($Column==$MySqlColumnData)
							{
								if(isset($RowData[$MySqlColumnImei]))
								{
									if($pcGPS->SetBinaryData($RowData[$MySqlColumnImei], $Data))
										$Data="<A HREF=\"$ThisScript?DecodeHttpData=".$pcGPS->GetHttpData()."\">decode</A>";
									else $Data=htmlspecialchars($pcGPS->GetLastError(), ENT_COMPAT, 'UTF-8'); //"ERROR"; //CGPS class can't decode the data
								}
							}
							else if(($iColumn==$ExtraColumn) && $RecordColumn>=0) $Data=strlen($Data) ? '<A HREF="'.$ThisScript.'?'.$ShowRecordExtraDataVariableName.'='.$RowData[$RecordColumn].'">extract</A>' : '';
							else $Data=htmlspecialchars(substr($Data, 0, 50), ENT_COMPAT, 'UTF-8');
							if(strlen($Data)) print("<TD>$Data"); else print('<TD>');
							$iColumn++;
						}
					}
					else
					{
						if($pcGPS->SetBinaryData($RowData[$MySqlColumnImei], $RowData[$MySqlColumnData]))
						{
							if(strlen($RowData[$MySqlColumnExtra]) || ($RowData[$MySqlColumnSwitch]==SV_PhotoLog) || ($RowData[$MySqlColumnSwitch]==SV_PhotoGpsLog) || ($RowData[$MySqlColumnSwitch]==SV_LogDataHeader))
								GenerateHtmlTable($pcGPS, GHTT_WideRow, $RowData[$MySqlColumnRecord], "<A HREF=\"$ThisScript?$ShowRecordExtraDataVariableName=".$RowData[$MySqlColumnRecord].'">extract</A>');
							else GenerateHtmlTable($pcGPS, GHTT_WideRow, $RowData[$MySqlColumnRecord]);
						} else print("\r\n<TR><TD>".htmlspecialchars($pcGPS->GetLastError(), ENT_COMPAT, 'UTF-8')); //"ERROR"; //CGPS class can't decode the data
					}
				}
				if(isset($_GET['realdb'])) print('</table>'); else GenerateHtmlTable($pcGPS, GHTT_WideFooter);
			}
			//Close database
			$dbh = null;
		}
		catch (PDOException $e)
		{
			printf("<B>Result:</B> ERROR: %s<BR>", htmlspecialchars($e->getMessage(), ENT_COMPAT, 'UTF-8')); //Display error if one occurred
		}
	}
}


//This part generates an overview table that shows which information
//is available in each module data Switch Value.
//In the table you can see which info/function is available for each
//SV_... switch-type, so you can see when certain info is available
//and when it is not.
//You can call this feature in the script on your server with a link
//like: http://www.YourServer.com/cgpsexample.php?ShowSwitchTable
//But the simple GUI already shows you a clickable link.
//Use the info in the generated table if you like, but there is
//absolutely no reason why you will want to examine or even try to
//understand what the code below does to generate it.
if(isset($_GET['ShowSwitchTable']))
{
	print('<H2>Available functions per module data Switch Value</H2>');
	$pcGPS->SetHttpData('1234567|llvvyw0DNJM1SL3G4Tfj9w01k1E7d0r0--0G0qvfJu42');
	$Hex=$pcGPS->GetHexData(); GenerateHtmlTable($pcGPS, GHTT_SwitchHeader);
	$Hex1='2FFFFFFF'.substr($Hex, 8, 8); $Hex3=substr($Hex, 18, 32-18); $Hex5=substr($Hex, 34, 46-34);
	$Hex7=substr($Hex, 48, 64-48); $Hex9=substr($Hex, 66); foreach($aSwitchDefines as $SwitchDefine=>$Switch) {
		$Hex2=$Hex4=$Hex6=$Hex8='00'; switch($Switch) {
			case SV_PositionMotionUnknown: $Hex6='01'; break;
			case SV_PositionCompact: $Hex8='08'; break;
			case SV_PositionMotionUnknownCompact: $Hex6='01'; $Hex8='08'; break;
			case SV_PositionTripMeters: $Hex4='E0'; break;
			case SV_PositionTravelledMeters: $Hex4='E1'; break;
			case SV_PositionAcceleration: $Hex4='E2'; break;
			case SV_PositionAnalogInputs: $Hex4='E3'; break;
			case SV_PositionCustom: $Hex4='E4'; break;
			case SV_PositionTravelledMetersFuel: $Hex4='E5'; break;
			case SV_KeepAliveTripMeters: $Hex2='4E'; $Hex4='E0'; $Hex6='20'; break;
			case SV_TimeAliveTripMeters: $Hex2='4D'; $Hex4='E0'; $Hex6='20'; break;
			case SV_KeepAliveTravelledMeters: $Hex2='4E'; $Hex4='E1'; $Hex6='20'; break;
			case SV_TimeAliveTravelledMeters: $Hex2='4D'; $Hex4='E1'; $Hex6='20'; break;
			case SV_KeepAliveAcceleration: $Hex2='4E'; $Hex4='E2'; $Hex6='20'; break;
			case SV_TimeAliveAcceleration: $Hex2='4D'; $Hex4='E2'; $Hex6='20'; break;
			case SV_KeepAliveAnalogInputs: $Hex2='4E'; $Hex4='E3'; $Hex6='20'; break;
			case SV_TimeAliveAnalogInputs: $Hex2='4D'; $Hex4='E3'; $Hex6='20'; break;
			case SV_KeepAliveCustom: $Hex2='4E'; $Hex4='E4'; $Hex6='20'; break;
			case SV_TimeAliveCustom: $Hex2='4D'; $Hex4='E4'; $Hex6='20'; break;
			case SV_KeepAliveTravelledMetersFuel: $Hex2='4E'; $Hex4='E5'; $Hex6='20'; break;
			case SV_TimeAliveTravelledMetersFuel: $Hex2='4D'; $Hex4='E5'; $Hex6='20'; break;
			case SV_PhotoGps: $Hex2='54'; $Hex5='01'.substr($Hex5,2); break;
			case SV_InaccuratePosition: $Hex6='20'; break;
			case SV_InaccuratePositionCompact: $Hex6='20'; $Hex8='08'; break;
			case SV_InaccuratePositionTripMeters: $Hex4='E0'; $Hex6='20'; break;
			case SV_InaccuratePositionTravelledMeters: $Hex4='E1'; $Hex6='20'; break;
			case SV_InaccuratePositionAcceleration: $Hex4='E2'; $Hex6='20'; break;
			case SV_InaccuratePositionAnalogInputs: $Hex4='E3'; $Hex6='20'; break;
			case SV_InaccuratePositionCustom: $Hex4='E4'; $Hex6='20'; break;
			case SV_InaccuratePositionTravelledMetersFuel: $Hex4='E5'; $Hex6='20'; break;
			case SV_Invalid: $Hex2='2F'; break;
			default: $Hex2=sprintf('%02X', $Switch); break; }
		if($pcGPS->SetHexData('1234567', $Hex1.$Hex2.$Hex3.$Hex4.$Hex5.$Hex6.$Hex7.$Hex8.$Hex9)) GenerateHtmlTable($pcGPS, GHTT_SwitchRow, 0, $SwitchDefine);
		else print("\r\n<TR><TD COLSPAN=20>$Switch (=$SwitchDefine) ".htmlspecialchars($pcGPS->GetLastError(), ENT_COMPAT, 'UTF-8'));
	} GenerateHtmlTable($pcGPS, GHTT_SwitchFooter);
}


//This part will create/erase the error log file
//when clicked in the web browser to do so.
if(isset($_GET['EraseErrorLog'])) for($Retries=0;;$Retries++)
{
	if($Retries>=5) {print("<BR><BR><B>*** Check your server's permission settings for this script/file/directory.<BR>You can also manually create an empty text file and set the file permissions properly for this script to write to the file.</B>");break;}
	if($Retries) {print("<BR><B>Could not create/erase error log file \"$LogFileName\". Retrying...</B><BR>"); flush(); @chmod($LogFileName, 0666); sleep(1);}
	if($hFile=@fopen($LogFileName, 'w')) {@fclose($hFile); if(LogError('Error log file created/erased')) {print('<BR><B>Error log file created/erased</B><BR>'); break;}}
}


//This part will display the contents of the error log
//file in the web browser when clicked in it to do so.
if(isset($_GET['ViewRecentErrorLog'])||isset($_GET['ViewFullErrorLog'])) for($Retries=0;;$Retries++)
{
	if($Retries>=5) {print("<BR><BR><B>Have you created one and are your server's permission settings for this script/file/directory set properly?<BR>You can also manually create an empty text file and set the file permissions properly for this script to write to the file.</B>");break;}
	if($Retries) {print("<BR>Error reading contents of file \"$LogFileName\". Retrying...<BR>"); flush(); @chmod($LogFileName, 0666); sleep(1);}
	if($hFile=@fopen($LogFileName, 'r'))
	{
		$LastBytes=1024*50; if(isset($_GET['ViewRecentErrorLog'])&&(filesize($LogFileName)>$LastBytes)&&!fseek($hFile, $LastBytes*-1, SEEK_END))
			print("<BR><B>========== Most recent contents part of error log file \"$LogFileName\"</B><BR><P style=\"white-space:nowrap\">..........");
		else print("<BR><B>========== Full contents of error log file \"$LogFileName\"</B><BR><P STYLE=\"white-space:nowrap\">");
		while(!feof($hFile)) print(htmlentities(fgets($hFile), ENT_QUOTES, 'UTF-8').'<BR>');
		fclose($hFile); break;
	}
}


//This part uses the CGPS class to extract various information from the
//supplied module data and conveniently displays the output of many CGPS
//class functions in your web browser.
//The simple GUI already shows you some clickable links to make use of
//this feature, but you can of course call it yourself too with a link
//like: http://www.YourServer.com/YourScript.php?DecodeHttpData=<Module HTTP data string>
//That enables you to easily manually check the contents of module data
//strings that you found for example in the error log or any data string
//you may have some day like from the log that your HTTP server generates.
if(isset($_GET['DecodeHttpData']))
{
	printf('<H2>Module data decoding output</H2><P>CGPS::SetHttpData("%s") result: '
		, htmlspecialchars($_GET['DecodeHttpData'], ENT_COMPAT, 'UTF-8'));
	if(!$pcGPS->SetHttpData($_GET['DecodeHttpData']))
	{
		//HTTP data is invalid
		printf('FALSE<BR>CGPS::GetLastError() result: %s<BR>', htmlspecialchars($pcGPS->GetLastError(), ENT_COMPAT, 'UTF-8'));
		print($HtmlFooter); //The closing part of the HTML output of this script
		exit(0);
	}
	printf('TRUE<BR>CGPS::GetDataPartCount() result: %d<BR>', $pcGPS->GetDataPartCount());
	for($DataPart=0;$DataPart<$pcGPS->GetDataPartCount();$DataPart++)
	{
		print("CGPS::SelectDataPart($DataPart) result: ");
		if($pcGPS->SelectDataPart($DataPart)) print('TRUE<BR>');
		else print('FALSE<BR>CGPS::GetLastError() result: '.htmlspecialchars($pcGPS->GetLastError(), ENT_COMPAT, 'UTF-8').'<BR>');
		print('CGPS::IsValid() result: ');
		if($pcGPS->IsValid()) print('TRUE<BR>');
		else print('FALSE<BR>CGPS::GetLastError() result: '.htmlspecialchars($pcGPS->GetLastError(), ENT_COMPAT, 'UTF-8').'<BR>');
		GenerateHtmlTable($pcGPS, GHTT_FullSingleColumn);
		print('<HR><P>');
	}
}


//The TableOutput() and GenerateHtmlTable() below are used by the
//user interface to display results in a table in your web browser.
//No need to change anything, but you will want to have a look at the
//the way various CGPS class functions are used to retrieve the info.
//There is a special note about this some lines below.
function TableOutput($Type, $Function, $Description, $Result)
{
	switch($Type)
	{	case GHTT_WideRow: print("<TD>$Result"); return;
		case GHTT_FullSingleColumn: global $GenerateHtmlTableEvenOddRow; print(($GenerateHtmlTableEvenOddRow++&1?"\r\n<TR class=\"o\">":"\r\n<TR>").'<td class="tl">'.$Function."<TD>$Result<TD>$Description"); return;
		case GHTT_WideHeader: case GHTT_SwitchHeader: print("<TH><SPAN title=\"$Description\" class=\"desc\">$Function</SPAN>"); return;
		case GHTT_SwitchRow: print(strlen($Result)?'<td class="c">X':'<TD>'); return;
	};
}
function GenerateHtmlTable($pcGPS, $Type, $Record=0, $Extra='')
{
	$NotEncoded=''; global $aSwitchDefines, $GenerateHtmlTableEvenOddRow;
	switch($Type)
	{
	case GHTT_FullSingleColumn:
		print('<TABLE STYLE="font-size: 0.9em"><TR><th class="l">CGPS::Get...() function<th class="l">Result<th class="l">Description');
		$NotEncoded=htmlspecialchars('<not available>', ENT_COMPAT, 'UTF-8'); //Text that is displayed for info that is not available
		$GenerateHtmlTableEvenOddRow=0;
		break;
	case GHTT_WideHeader:
		print('<TABLE><TR><TH><SPAN title="Database record number" class="desc">#</SPAN><TH><SPAN title="Additional data that was included by the module with the transmission" class="desc">ExtraData</SPAN>');
		$GenerateHtmlTableEvenOddRow=0;
		break;
	case GHTT_WideRow:
		print((($GenerateHtmlTableEvenOddRow++&1)?"\r\n<TR class=\"o\">":"\r\n<TR>").((strlen($Extra))?"<TD>$Record<TD>$Extra":"<TD>$Record<TD>"));
		break;
	case GHTT_WideFooter:
		print('</table>');
		return;
	case GHTT_SwitchHeader:
		print('<TABLE><TR><TH>'.htmlspecialchars('v== Switch / CGPS::Get...() ==>', ENT_COMPAT, 'UTF-8'));
		$GenerateHtmlTableEvenOddRow=0;
		break;
	case GHTT_SwitchRow:
		print((($GenerateHtmlTableEvenOddRow++&1)?"\r\n<TR class=\"o\">":"\r\n<TR>").'<td class="tl">'.$Extra);
		break;
	case GHTT_SwitchFooter:
		print('</table>');
		return;
	}

	//### INFO ###
	//Below are examples how to check/extract/display the result of various
	//CGPS class functions.
	//Each block below outputs the result of a CGPS class function with which
	//the simple user interface of this script displays info in a HTML table
	//for your web browser.
	//You can reorder/remark/remove them if you wish.
	//Some are bigger than others, but you should be able to distinguish
	//the beginning of each one of them, by the blank line that separates them.
	
	$Function='UtcTime';//'GetUtcTime()';
	$Description='UTC date/time of the data as a timestamp';
	$UtcTime=$pcGPS->GetUtcTime();
	//Instead of "gmdate(...)" you could use "date(...)" and enable the next line to set your preferred time zone.
	//	date_default_timezone_set('UTC'); //Preferred time zone like: 'ADT' 'CET' 'EET' 'America/New_York' 'Australia/Tasmania'
	$Result=htmlspecialchars(sprintf("%.2f", $UtcTime).' (='.gmdate('r', $UtcTime).')', ENT_COMPAT, 'UTF-8');
		TableOutput($Type, $Function, $Description, $Result);
		
	$Function='Imei';//'GetImei()';
	$Description='International Mobile Equipment Identification code of the module';
	$Result=$pcGPS->GetImei();
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Switch';//'GetSwitch()';
	$Description='Switch value type that tells what information is encoded in the data';
	$Result=$pcGPS->GetSwitch();
	if(($SwitchDefine=array_search($Result, $aSwitchDefines))===false) $SwitchDefine="SV_?$Result?";
	$Result.=" (=$SwitchDefine)";
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Index';//'GetIndex()';
	$Description='Module log index number of the data';
	$Result=$pcGPS->CanGetIndex() ? $pcGPS->GetIndex() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='EventID';//'GetEventID()';
	$Description='ID code value of the event(s) that triggered the module to log the data';
	//Create text from the event(s) in EventID.
	if($pcGPS->CanGetEventID())
	{
		$EventID=$pcGPS->GetEventID();
		$EventValue=$EventID&0x3FF;
		switch($EventValue)
		{
		case 0: $Desc=''; break;
		//IO events
		case 11: $Desc='IO 1a'; break;
		case 21: $Desc='IO 1b'; break;
		case 12: $Desc='IO 2a'; break;
		case 22: $Desc='IO 2b'; break;
		case 13: $Desc='IO 3a'; break;
		case 23: $Desc='IO 3b'; break;
		case 14: $Desc='IO 4a'; break;
		case 24: $Desc='IO 4b'; break;
		//Timer events
		case 33: $Desc='Timer 3'; break;
		case 34: $Desc='Timer 4'; break;
		case 37: $Desc='Timer 7'; break;
		case 38: $Desc='Timer 8'; break;
		case 81: $Desc='Daily time a'; break;
		case 82: $Desc='Daily time b'; break;
		case 91: $Desc='BetweenTimes a'; break;
		case 92: $Desc='BetweenTimes b'; break;
		//iButton
		case 71: $Desc='iButton attach'; break;
		case 72: $Desc='iButton detach'; break;
		//Misc events
		case 40: $Desc='Stop moving'; break;
		case 41: $Desc='Start moving'; break;
		case 42: $Desc='Travelled distance'; break;
		case 43: $Desc='Changed direction'; break;
		case 44: $Desc='While moving'; break;
		case 45: $Desc='While not moving'; break;
		case 48: $Desc='While roaming'; break;
		case 50: $Desc='Called by unknown'; break;
		case 51: $Desc='Called by #1'; break;
		case 52: $Desc='Called by #2'; break;
		case 53: $Desc='Called by #3'; break;
		case 54: $Desc='SMS by unknown'; break;
		case 55: $Desc='SMS from #1'; break;
		case 56: $Desc='SMS from #2'; break;
		case 57: $Desc='SMS from #3'; break;
		case 60: $Desc='Announce PowerDown'; break;
		case 61: $Desc='Success GPRS transmit'; break;
		case 62: $Desc='(Re)started'; break;
		case 63: $Desc='Power saving mode'; break;
		case 64: $Desc='Power supply above'; break;
		case 65: $Desc='Power supply below'; break;
		case 66: $Desc='Received GPS-fix'; break;
		case 67: $Desc='Output(s) changed'; break;
		case 68: $Desc='Above speed limit'; break;
		case 69: $Desc='Below speed limit'; break;
		case 70: $Desc='Custom'; break;
		case 75: $Desc='GPS current out of range start'; break;
		case 76: $Desc='GPS current out of range end'; break;
		case 77: $Desc='GPS current while out of range'; break;
		case 78: $Desc='Logged serial data'; break;  //(130=Received serial data)
		case 85: $Desc='Input pattern 1'; break;
		case 86: $Desc='Input pattern 2'; break;
		case 87: $Desc='Input pattern 3'; break;
		case 88: $Desc='Pulse counter Hz above'; break;
		case 89: $Desc='Pulse counter Hz below/equal'; break;
		//
		case 95: $Desc='LCD/source Type 10'; break;
		case 96: $Desc='SACT command'; break;
		case 97: $Desc='SMS/phone/POS acknowledge'; break;
		case 98: $Desc='SMS initiated'; break;
		case 99: $Desc='Server initiated'; break;
		//	Acceleration/Deceleration
		case 100: $Desc='Accel +X max'; break;
		case 101: $Desc='Accel +X min'; break;
		case 102: $Desc='Accel -X max'; break;
		case 103: $Desc='Accel -X min'; break;
		case 104: $Desc='Accel Y max'; break;
		case 105: $Desc='Accel y min'; break;
		case 106: $Desc='Accel Z max'; break;
		case 107: $Desc='Accel Z min'; break;
		//	Tachograph
		case 110: $Desc='Received valid tachograph data'; break;
		case 111: $Desc='Tachograph ignition active'; break;
		case 112: $Desc='Tachograph status change'; break;
		case 113: $Desc='Tachograph speed above'; break;
		case 114: $Desc='Tachograph speed below'; break;
		//	Accident recording and detection
		case 115: $Desc='Roll-over'; break;
		case 116: $Desc='Upside-down'; break;
		case 117: $Desc='While upside-down'; break;
		case 118: $Desc='Crash #1'; break;
		case 119: $Desc='Crash #2'; break;
		case 122: $Desc='Accident recording 1'; break;
		case 123: $Desc='Accident recording 2'; break;
		case 124: $Desc='Crash #3'; break;
		//	Serial port
		//(78=Logged serial data)
		case 130: $Desc='Received serial data'; break;
		//	ActionID batch
		case 150: $Desc='Action91_1'; break;
		case 151: $Desc='Action91_2'; break;
		case 152: $Desc='Action91_3'; break;
		case 153: $Desc='Action91_4'; break;
		case 154: $Desc='Action92_1'; break;
		case 155: $Desc='Action92_2'; break;
		case 156: $Desc='Action92_3'; break;
		case 157: $Desc='Action92_4'; break;
		case 158: $Desc='Action93_1'; break;
		case 159: $Desc='Action93_2'; break;
		case 160: $Desc='Action93_3'; break;
		case 161: $Desc='Action93_4'; break;
		case 162: $Desc='Action94_1'; break;
		case 163: $Desc='Action94_2'; break;
		case 164: $Desc='Action94_3'; break;
		case 165: $Desc='Action94_4'; break;
		default:
			//Regions
			if($EventValue>=201 && $EventValue<=250)
			{
				$Desc=sprintf('Inside region %d', $EventValue-200);
				break;
			}
			if($EventValue>=301 && $EventValue<=350)
			{
				$Desc=sprintf('Outside region %d', $EventValue-300);
				break;
			}
			if($EventValue>=401 && $EventValue<=450)
			{
				$Desc=sprintf('Entering region %d', $EventValue-400);
				break;
			}
			if($EventValue>=501 && $EventValue<=550)
			{
				$Desc=sprintf('Leaving region %d', $EventValue-500);
				break;
			}
			//Some new value that is not listed above, so use the value as text: ?value?
			$Desc=sprintf('?%d?', $EventValue);
		};
		if($EventID&0x8000) {if(strlen($Desc)) $Desc.='+'; $Desc.='Timer 1';};
		if($EventID&0x4000) {if(strlen($Desc)) $Desc.='+'; $Desc.='Timer 2';};
		if($EventID&0x2000) {if(strlen($Desc)) $Desc.='+'; $Desc.='Timer 5';};
		if($EventID&0x1000) {if(strlen($Desc)) $Desc.='+'; $Desc.='Timer 6';};
		if($EventID&0x800) {if(strlen($Desc)) $Desc.='+'; $Desc.='Multiple different events';};
		if($EventID&0x400) {if(strlen($Desc)) $Desc.='+'; $Desc.='Multiple identical events';};
		if(strlen($Desc)) $Result=sprintf('%d (=%s)', $EventID, $Desc);
		else $Result='0 (=undefined)';
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CanGet<BR>LatLong()';//'CanGetLatLong()';
	$Description='Test for availability of probably accurate GPS information';
	$Result=$pcGPS->CanGetLatLong() ? 'TRUE' : 'FALSE';
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CanGetLatLong<BR>Inaccurate()';//'CanGetLatLongInaccurate()';
	$Description='Test for availability of probably inaccurate GPS information';
	$Result=$pcGPS->CanGetLatLongInaccurate() ? 'TRUE' : 'FALSE';
		TableOutput($Type, $Function, $Description, $Result);

	//Remove the // at the beginning of the following 4 lines to enable this info.
	//$Function='MapquestUrl';//'GetMapquestUrl()';
	//$Description='A www.mapquest.com compatible URL (service might not be available)';
	//$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? '<A HREF="'.htmlspecialchars($pcGPS->GetMapquestUrl(), ENT_COMPAT, 'UTF-8').'">ClickMe</A>' : $NotEncoded;
	//	TableOutput($Type, $Function, $Description, $Result);

	//Remove the // at the beginning of the following 4 lines to enable this info.
	//$Function='MultimapUrl';//'GetMultimapUrl()';
	//$Description='A www.multimap.com compatible URL (service might not be available)';
	//$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? '<A HREF="'.htmlspecialchars($pcGPS->GetMultimapUrl(), ENT_COMPAT, 'UTF-8').'">ClickMe</A>' : $NotEncoded;
	//	TableOutput($Type, $Function, $Description, $Result);

	$Function='GoogleMapsUrl';//'GetGoogleMapsUrl()';
	$Description='A maps.google.com compatible URL (service might not be available)';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? '<A HREF="'.htmlspecialchars($pcGPS->GetGoogleMapsUrl(), ENT_COMPAT, 'UTF-8').'">ClickMe</A>' : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LiveMapsUrl';//'GetLiveMapsUrl()';
	$Description='A maps.live.com compatible URL (service might not be available)';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? '<A HREF="'.htmlspecialchars($pcGPS->GetLiveMapsUrl(), ENT_COMPAT, 'UTF-8').'">ClickMe</A>' : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Heading';//'GetHeading()';
	$Description='Heading direction from 0.0 up to 359.9 degrees';
	if($pcGPS->CanGetHeading())
	{
		$fDegrees=$pcGPS->GetHeading();
		if($fDegrees<22.5) $Text='North';
		else if($fDegrees<67.5) $Text='North/East';
		else if($fDegrees<112.5) $Text='East';
		else if($fDegrees<157.5) $Text='South/East';
		else if($fDegrees<202.5) $Text='South';
		else if($fDegrees<247.5) $Text='South/West';
		else if($fDegrees<292.5) $Text='West';
		else if($fDegrees<337.5) $Text='North/West';
		else $Text='North';
		$Result=sprintf('%.1f (=%s)', (float)$fDegrees, $Text);
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='SpeedKPH';//'GetSpeedKPH()';
	$Description='Speed in kilometers per hour';
	$Result=$pcGPS->CanGetSpeed() ? sprintf('%.1f', (float)$pcGPS->GetSpeedKPH()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='SpeedMPH';//'GetSpeedMPH()';
	$Description='Speed in miles per hour';
	$Result=$pcGPS->CanGetSpeed() ? sprintf('%.1f', (float)$pcGPS->GetSpeedMPH()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='SpeedKnots';//'GetSpeedKnots()';
	$Description='Speed in knots';
	$Result=$pcGPS->CanGetSpeed() ? sprintf('%.1f', (float)$pcGPS->GetSpeedKnots()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GpsStatus';//'GetGpsStatus()';
	$Description='Status of the GPS receiver';
	if($pcGPS->CanGetGpsStatus())
	{
		$Result=$pcGPS->GetGpsStatus();
		$Text='';
		if($Result)
		{
			if($Result&32) $Text='Accuracy not met';
			if($Result&1) { if($Text!='') $Text.=' + '; $Text.='Speed/heading invalid'; }
		} else $Text='OK';
		$Result="$Result (=$Text)";
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='IO';//'GetIO()';
	$Description='Digital input/output active/inactive status';
	if($pcGPS->CanGetIO())
	{
		$IO=$pcGPS->GetIO();
		$Result=sprintf('%d (=in: 1%s 2%s 3%s 4%s / out: 1%s 2%s 3%s 4%s)'
			, $IO
			, ($IO & MDIO_Input1) ? 'a' : 'i'  //Input 1 (in)active status
			, ($IO & MDIO_Input2) ? 'a' : 'i'  //...
			, ($IO & MDIO_Input3) ? 'a' : 'i'
			, ($IO & MDIO_Input4) ? 'a' : 'i'
			, ($IO & MDIO_Output1) ? 'a' : 'i' //Output 1 (in)active status
			, ($IO & MDIO_Output2) ? 'a' : 'i' //...
			, ($IO & MDIO_Output3) ? 'a' : 'i'
			, ($IO & MDIO_Output4) ? 'a' : 'i' );
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AdditionalIO';//'GetAdditionalIO()';
	$Description='Additional digital input/output active/inactive status of connector pins, Input5 (and accel-sensor calibration status)';
	if($pcGPS->CanGetAdditionalIO())
	{
		$IO=$pcGPS->GetAdditionalIO();
		$Result="$IO (=";
		$Rev=$pcGPS->GetRev();
		$Ver=$pcGPS->GetVersion();
		if(	( ($Rev==5) && ($Ver>=468) ) //Rev5 with at least firmware 468 ?
			|| ($Rev==8) //OR Rev8 with any firmware version ?
			|| ($Rev==9) //OR Rev9 with any firmware version ?
		  ) $Result.=($IO & 2) ? ' p10:i' : ' p10:a'; //Connector pin 10 Inactive/Active status
		if(	( ($Rev==5) && ($Ver>=468) ) //Rev5 with at least firmware 468 ?
			|| ( ($Rev==8) && ($Ver>=161) )  //OR Rev8 with at least firmware 161 ?
			|| ($Rev==9)  //OR Rev9 with any firmware version ?
		  ) $Result.=($IO & 4) ? ' p20:i' : ' p20:a'; //Connector pin 20 Inactive/Active status
		if(	($Rev==5) && ($Ver>=468) //Rev5 with at least firmware 468 ?
		  ) $Result.=($IO & 8) ? ' p19:i' : ' p19:a'; //Connector pin 19 Inactive/Active status
		if(	( ($Rev==8) && ($Ver>=161) ) //Rev8 with at least firmware 161 ?
			|| ($Rev==9) //OR Rev9 with any firmware version ?
		  ) $Result.=($IO & 16) ? ' p6:i' : ' p6:a'; //Connector pin 6 Inactive/Active status
		if(	( ($Rev==8) && ($Ver>=172) ) //Rev8 with at least firmware 172 ?
			|| ($Rev==9) //OR Rev9 with any firmware version ?
		  ) $Result.=($IO & 64) ? ' I5:a' : ' I5:i'; //Digital Input 5 Active/Active status
		if(	( ( ($Rev==8) && ($Ver>=162) ) //Rev8 with at least firmware 162 ?
			|| ($Rev==9) //OR Rev9 any version ?
			) && ($IO & 8) //AND automatic accel/G-force sensor calibration/conversion in use ?
		  ) $Result.=' AccelCal'; //Yes, automatic accel/G-force sensor calibration/conversion in use
		$Result.=')';
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='MiscStatus';//'GetMiscStatus()';
	$Description='Miscellaneous status of the module (Virtual Outputs active/inactive, camera successfully used and power saving)';
	if($pcGPS->CanGetMiscStatus())
	{
		$MiscStatus=$pcGPS->GetMiscStatus();
		$Result="$MiscStatus (=";
		if($MiscStatus&64)
		{
			if($MiscStatus & 8) $Result.='vo1:a'; else $Result.='vo1:i'; //Virtual Output 1 (in)active status
			if($MiscStatus & 4) $Result.='/vo2:a'; else $Result.='/vo2:i'; //Virtual Output 2 (in)active status
			if($MiscStatus & 32) $Result.='/CamUsed'; //Camera successfully used to take a picture
			if(!($MiscStatus & 128)) $Result.='/PowerSave'; //Module in power-save mode (since Rev8:161)
		} else $Result.='invalid';
		$Result.=')';
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AnalogInput1';//'GetAnalogInput1()';
	$Description='Analog input #1 voltage level';
	$Result=$pcGPS->CanGetAnalogInputs() ? sprintf("%.2f", $pcGPS->GetAnalogInput1()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AnalogInput2';//'GetAnalogInput2()';
	$Description='Analog input #2 voltage level';
	$Result=$pcGPS->CanGetAnalogInputs() ? sprintf("%.2f", $pcGPS->GetAnalogInput2()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AnalogInput3';//'GetAnalogInput3()';
	$Description='Analog input #3 voltage level';
	$Result=$pcGPS->CanGetAnalogInputs() ? sprintf("%.2f", $pcGPS->GetAnalogInput3()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AnalogInput4';//'GetAnalogInput4()';
	$Description='Analog input #4 voltage level';
	$Result=$pcGPS->CanGetAnalogInputs() ? sprintf("%.2f", $pcGPS->GetAnalogInput4()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AnalogInput5';//'GetAnalogInput5()';
	$Description='Analog input #5 voltage level';
	$Result=$pcGPS->CanGetAnalogInput5() ? sprintf("%.2f", $pcGPS->GetAnalogInput5()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LogDataType';//'GetLogDataType()';
	$Description='Type value of the logged data';
	if($pcGPS->CanGetLogDataType())
	{
		$LogDataType=$pcGPS->GetLogDataType();
		switch($LogDataType)
		{
		case 1: $Result="1 (=smart card)"; break;
		case 2: $Result="2 (=settings backup)"; break;
		case 3: $Result="3 (=LCD/source-code backup)"; break;
		case 4: $Result="4 (=settings runtime)"; break;
		case 5: $Result="5 (=LCD/source-code runtime)"; break;
		case 6: $Result="6 (=Regions backup)"; break;
		case 7: $Result="7 (=Regions runtime)"; break;
		case 8: $Result="8 (=SiRF GPS ephemeris data)"; break;
		default: $Result=$LogDataType;
		}
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LogDataSize';//'GetLogDataSize()';
	$Description='Size in bytes of a logged data that spread over several other records';
	$Result=$pcGPS->CanGetLogDataSize() ? $pcGPS->GetLogDataSize() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LogDataGpsTimeDifference';//'GetLogDataGpsTimeDifference()';
	$Description='Time difference in seconds between logged data and the included GPS information';
	$Result=$pcGPS->CanGetLogDataGpsTimeDifference() ? $pcGPS->GetLogDataGpsTimeDifference() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='UtcTimeMySQL';//'GetUtcTimeMySQL()';
	$Description='UTC date/time of the data in SQL query format (yyyymmddhhmmss text)';
	$Result=$pcGPS->GetUtcTimeMySQL();
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GpsTimeMySQL';//'GetGpsTimeMySQL()';
	$Description='GPS date/time of the data in SQL query format (yyyymmddhhmmss text)';
	$Result=$pcGPS->GetGpsTimeMySQL();
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GpsTime';//'GetGpsTime()';
	$Description='GPS date/time of the data as a timestamp';
	$GpsTime=$pcGPS->GetGpsTime();
	$Result=htmlspecialchars(sprintf("%.2f", $GpsTime).' (='.gmdate('r', $GpsTime).' GPS)', ENT_COMPAT, 'UTF-8');
		TableOutput($Type, $Function, $Description, $Result);

	$Function='View';//'GetView()';
	$Description='Number of &quot;visible&quot; satellites';
	$Result=$pcGPS->CanGetView() ? $pcGPS->GetView() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);
	
	$Function='Fix';//'GetFix()';
	$Description='Number of satellites used to determine the GPS information';
	$Result=$pcGPS->CanGetFix() ? $pcGPS->GetFix() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);
	
	$Function='MaxDB';//'GetMaxDB()';
	$Description='Signal reception strength in dBm (decibel referenced to 1 milliwatt) of the strongest GPS satellite';
	$Result=$pcGPS->CanGetMaxDB() ? $pcGPS->GetMaxDB() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);
	
	$Function='GpsHighestMaxDB';//'GetGpsHighestMaxDB()';
	$Description='Highest recorded GPS satellite signal strength in decibels received since module (re)started';
	$Result=$pcGPS->CanGetGpsHighestMaxDB() ? $pcGPS->GetGpsHighestMaxDB() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='HDOP';//'GetHDOP()';
	$Description='Horizontal Dilution Of Precision';
	$Result=$pcGPS->CanGetHDOP() ? $pcGPS->GetHDOP() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LatitudeSmall';//'GetLatitudeSmall()';
	$Description='Latitude in small storage form';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? $pcGPS->GetLatitudeSmall().sprintf(' (=0x%X)', $pcGPS->GetLatitudeSmall()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LatitudeFloat';//'GetLatitudeFloat()';
	$Description='Latitude as floating point value';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? sprintf('%.5f', (float)$pcGPS->GetLatitudeFloat()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LatitudeDegrees';//'GetLatitudeDegrees()';
	$Description='Latitude in Degrees, Minutes, Seconds, N(orth)/S(outh) and minute decimals';
	if($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate())
	{
		$pcGPS->GetLatitudeDegrees($Degrees, $Minutes, $Seconds, $NS, $fDecimals);
		$Result=sprintf("%d&deg;%02d'%02d\" %s / %d&deg;%07.4f' %s", $Degrees, $Minutes, $Seconds, $NS, $Degrees, (float)$Minutes+$fDecimals, $NS);
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LongitudeSmall';//'GetLongitudeSmall()';
	$Description='Longitude in small storage form';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? $pcGPS->GetLongitudeSmall().sprintf(' (=0x%X)', $pcGPS->GetLongitudeSmall()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LongitudeFloat';//'GetLongitudeFloat()';
	$Description='Longitude as floating point value';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? sprintf('%.5f', (float)$pcGPS->GetLongitudeFloat()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LongitudeDegrees';//'GetLongitudeDegrees()';
	$Description='Longitude in Degrees, Minutes, Seconds, E(ast)/W(est) and minute decimals';
	if($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate())
	{
		$pcGPS->GetLongitudeDegrees($Degrees, $Minutes, $Seconds, $EW, $fDecimals);
		$Result=sprintf("%d&deg;%02d'%02d\" %s / %d&deg;%07.4f' %s", $Degrees, $Minutes, $Seconds, $EW, $Degrees, (float)$Minutes+$fDecimals, $EW);
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LatLongMarginInMeters';//'GetLatLongMarginInMeters()';
	$Description='Maximum Latitude/Longitude position dislocation in meters with a probability of 67%';
	$Result=$pcGPS->CanGetLatLongMargin() ? sprintf('%.1f', (float)$pcGPS->GetLatLongMarginInMeters()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LatLongMarginInFeet';//'GetLatLongMarginInFeet()';
	$Description='Maximum Latitude/Longitude position dislocation in feet with a probability of 67%';
	$Result=$pcGPS->CanGetLatLongMargin() ? sprintf('%.1f', (float)$pcGPS->GetLatLongMarginInFeet()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AltitudeInMeters';//'GetAltitudeInMeters()';
	$Description='Altitude in meters (above WGS84 ellipsoid)';
	$Result=$pcGPS->CanGetAltitude() ? sprintf('%.1f', (float)$pcGPS->GetAltitudeInMeters()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AltitudeInFeet';//'GetAltitudeInFeet()';
	$Description='Altitude in feet (above WGS84 ellipsoid)';
	$Result=$pcGPS->CanGetAltitude() ? sprintf('%.1f', (float)$pcGPS->GetAltitudeInFeet()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AltitudeMarginInMeters';//'GetAltitudeMarginInMeters()';
	$Description='Maximum altitude position dislocation in meters with a probability of 67%';
	$Result=$pcGPS->CanGetAltitudeMargin() ? sprintf('%.1f', (float)$pcGPS->GetAltitudeMarginInMeters()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AltitudeMarginInFeet';//'GetAltitudeMarginInFeet()';
	$Description='Maximum altitude position dislocation in feet with a probability of 67%';
	$Result=$pcGPS->CanGetAltitudeMargin() ? sprintf('%.1f', (float)$pcGPS->GetAltitudeMarginInFeet()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Version';//'GetVersion()';
	$Description='Firmware version of the module';
	$Result=$pcGPS->CanGetVersion() ? $pcGPS->GetVersion() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Rev';//'GetRev()';
	$Description='Revision series number of the module for firmware requirement identification';
	$Result=$pcGPS->CanGetRev() ? $pcGPS->GetRev() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='SettingsError';//'GetSettingsError()';
	$Description='Error code of the uploaded settings data';
	if($pcGPS->CanGetSettingsError())
	{
		$Result=$pcGPS->GetSettingsError();
		switch($Result)
		{
		case 0: $Result='0 (=No error)'; break;
		case 2: $Result='2 (=Invalid size)'; break;
		case 3: $Result='3 (=RS232 only)'; break;
		case 33: $Result='33 (=CRC error)'; break;
		}
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='SettingsCrc';//'GetSettingsCrc()';
	$Description='&quot;Cyclic Redundancy Check&quot; value of the settings data used by the module';
	$Result=$pcGPS->CanGetSettingsCrc() ? $pcGPS->GetSettingsCrc() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GpsFirmwareCrc';//'GetGpsFirmwareCrc()';
	$Description='&quot;Cyclic Redundancy Check&quot; value of GPS firmware';
	$Result=$pcGPS->CanGetGpsFirmwareCrc() ? $pcGPS->GetGpsFirmwareCrc() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GsmFirmwareCrc';//'GetGsmFirmwareCrc()';
	$Description='&quot;Cyclic Redundancy Check&quot; value of GSM/GPRS firmware';
	$Result=$pcGPS->CanGetGsmFirmwareCrc() ? $pcGPS->GetGsmFirmwareCrc() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='IsForwarded<BR>ByGateway()';//'IsForwardedByGateway()';
	$Description='Check if the data was forwarded by a gateway and not received directly from a module';
	$Result=$pcGPS->IsForwardedByGateway() ? 'TRUE' : 'FALSE';
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Accu';//'GetAccu()';
	$Description='Power supply voltage of the module';
	$Result=$pcGPS->CanGetAccu() ? sprintf('%.2f', (float)$pcGPS->GetAccu()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Reset';//'GetReset()';
	$Description='Number of seconds since the module was powered-up (or reset)';
	$Result=$pcGPS->CanGetReset() ? $pcGPS->GetReset() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Shake';//'GetShake()';
	$Description='Minimum number of seconds left for the module to return to the &quot;Not Moving&quot; state';
	$Result=$pcGPS->CanGetShake() ? $pcGPS->GetShake() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='TemperatureCelcius';//'GetTemperatureCelcius()';
	$Description='Temperature of the built in (or external substitute) sensor in degrees Celsius';
	$Result=$pcGPS->CanGetTemperature() ? sprintf('%.1f', (float)$pcGPS->GetTemperatureCelcius()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='TemperatureFahrenheit';//'GetTemperatureFahrenheit()';
	$Description='Temperature of the built in (or external substitute) sensor in degrees Fahrenheit';
	$Result=$pcGPS->CanGetTemperature() ? sprintf('%.1f', (float)$pcGPS->GetTemperatureFahrenheit()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CounterSecondsActive';//'GetCounterSecondsActive()';
	$Description='Total number of seconds that the module has been active';
	$Result=$pcGPS->CanGetCounters() ? $pcGPS->GetCounterSecondsActive() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CounterSecondsMoving';//'GetCounterSecondsMoving()';
	$Description='Total number of seconds that the module has been active';
	$Result=$pcGPS->CanGetCounters() ? $pcGPS->GetCounterSecondsMoving() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CounterTravelledMeters';//'GetCounterTravelledMeters()';
	$Description='Total number of GPS determined meters that the module has travelled';
	$Result=$pcGPS->CanGetCounterTravelledMeters() ? $pcGPS->GetCounterTravelledMeters() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CounterTripMeters';//'GetCounterTripMeters()';
	$Description='GPS determined meters travelled since the last &quot;Start Moving&quot; event';
	$Result=$pcGPS->CanGetCounterTripMeters() ? $pcGPS->GetCounterTripMeters() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CounterPulsesInput1';//'GetCounterPulsesInput1()';
	$Description='Total number of pulses counted by the internal hardware pulse counter';
	$Result=$pcGPS->CanGetCounters() ? $pcGPS->GetCounterPulsesInput1() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CounterInput3Active';//'GetCounterInput3Active()';
	$Description='Total number of 100 milliseconds units that the module detected an active signal on digital input 3';
	$Result=$pcGPS->CanGetCounters() ? $pcGPS->GetCounterInput3Active() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='PortDataSize';//'GetPortDataSize()';
	$Description='Size in bytes of the data that the module received via a serial port';
	$Result=$pcGPS->CanGetPortData() ? $pcGPS->GetPortDataSize() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='PortDataBytes';//'GetPortDataBytes()';
	$Description='The data bytes that the module received via a serial port';
	$Result=$pcGPS->CanGetPortData() ? 'TEXT: '.htmlspecialchars(utf8_encode($pcGPS->GetPortDataBytes())).'<BR>HEX: '.strtoupper(rtrim(chunk_split(bin2hex($pcGPS->GetPortDataBytes()), 2, ' '))) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='ExtraDataSize';//'GetExtraDataSize()';
	$Description='Size in bytes of the data that the module included with this record';
	$Result=$pcGPS->CanGetExtraDataSize() ? $pcGPS->GetExtraDataSize() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='PhotoLogDataSize';//'GetPhotoLogDataSize()';
	$Description='Size in bytes of a logged picture that spread over several other records';
	$Result=$pcGPS->CanGetPhotoLogDataSize() ? $pcGPS->GetPhotoLogDataSize() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='PhotoPort';//'GetPhotoPort()';
	$Description='The port number used to take the picture (for identification which camera was used in a multiple camera setup)';
	$Result=$pcGPS->CanGetPhotoPort() ? $pcGPS->GetPhotoPort() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='PhotoGpsTimeDifference';//'GetPhotoGpsTimeDifference()';
	$Description='Time difference in seconds between picture taken and the included GPS information';
	$Result=$pcGPS->CanGetPhotoGpsTimeDifference() ? $pcGPS->GetPhotoGpsTimeDifference() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='IButtonAttached';//'GetIButtonAttached()';
	$Description='Determine if an iButton or 1-Wire device was being attached or detached';
	$Result=$pcGPS->CanGetIButton() ? ($pcGPS->GetIButtonAttached() ? 'TRUE' : 'FALSE') : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='IButtonSerialNumberText';//'GetIButtonSerialNumberText()';
	$Description='The serial number of an iButton or 1-Wire device as text';
	$Result=$pcGPS->CanGetIButtonSerialNumber() ? $pcGPS->GetIButtonSerialNumberText() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	//Just like above, but displaying 1-Wire (e.g. iButton) serial number in byte swapped order as usually imprinted as text on such a device
	//$Function='IButtonSerialNumberText(swapped)';//'GetIButtonSerialNumberText()';
	//$Description='The serial number of an iButton or 1-Wire device as text (in byte swapped order)';
	//$Result=$pcGPS->CanGetIButtonSerialNumber() ? ByteSwap1WireSerialNumber($pcGPS->GetIButtonSerialNumberText()) : $NotEncoded;
	//	TableOutput($Type, $Function, $Description, $Result);

	$Function='1WireDataPart';//'Get1WireDataPart()';
	$Description='The part number of the current part of the 1-Wire (iButton) device data structure';
	$Result=$pcGPS->CanGet1WireData() ? $pcGPS->Get1WireDataPart() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='1WireDataClosure';//'Get1WireDataClosure()';
	$Description='Determine if this is the last part of the 1-Wire (iButton) data';
	$Result=$pcGPS->CanGet1WireData() ? $pcGPS->Get1WireDataClosure()?'TRUE':'FALSE' : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='1WireDataLength';//'Get1WireDataLength()';
	$Description='Length in bytes of this part of the 1-Wire device (iButton) data structure';
	$Result=$pcGPS->CanGet1WireData() ? $pcGPS->Get1WireDataLength() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='1WireDataBytes';//'Get1WireDataBytes()';
	$Description='The binary data bytes of this part of the 1-Wire (iButton) device data structure';
	$Result=$pcGPS->CanGet1WireData() ? 'HEX: '.chunk_split(bin2hex($pcGPS->Get1WireDataBytes()), 2, ' ') : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='1WireDS18B20celcius';//'Get1WireDS18B20celcius()';
	$Description='Temperature of a DS18B20/DS18S20/DS1822 1-Wire device in degrees Celsius';
	$Result=$pcGPS->CanGet1WireDS18B20temperature() ? sprintf('%.1f', (float)$pcGPS->Get1WireDS18B20celcius()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='1WireDS18B20fahrenheit';//'Get1WireDS18B20fahrenheit()';
	$Description='Temperature of a DS18B20/DS18S20/DS1822 1-Wire device in degrees Fahrenheit';
	$Result=$pcGPS->CanGet1WireDS18B20temperature() ? sprintf('%.1f', (float)$pcGPS->Get1WireDS18B20fahrenheit()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AccelerationX';//'GetAccelerationX()';
	$Description='G-Force reading of the X direction acceleration sensor';
	$Result=$pcGPS->CanGetAccelerationX() ? sprintf('%.3f', (float)$pcGPS->GetAccelerationX()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AccelerationY';//'GetAccelerationY()';
	$Description='G-Force reading of the Y direction acceleration sensor';
	$Result=$pcGPS->CanGetAccelerationY() ? sprintf('%.3f', (float)$pcGPS->GetAccelerationY()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='AccelerationZ';//'GetAccelerationZ()';
	$Description='G-Force reading of the Z direction acceleration sensor';
	$Result=$pcGPS->CanGetAccelerationZ() ? sprintf('%.3f', (float)$pcGPS->GetAccelerationZ()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LcdDataPart';//'GetLcdDataPart()';
	$Description='The part number of the current part of the LCD-display data';
	$Result=$pcGPS->CanGetLcdData() ? $pcGPS->GetLcdDataPart() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LcdDataClosure';//'GetLcdDataClosure()';
	$Description='Determine if this is the last part of the LCD-display data';
	$Result=$pcGPS->CanGetLcdData() ? ($pcGPS->GetLcdDataClosure() ? 'TRUE' : 'FALSE') : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LcdDataLength';//'GetLcdDataLength()';
	$Description='Length in bytes of this part of the LCD-display data';
	$Result=$pcGPS->CanGetLcdData() ? $pcGPS->GetLcdDataLength() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='LcdDataBytes';//'GetLcdDataBytes()';
	$Description='The data bytes of this part of the LCD-display data';
	$Result=$pcGPS->CanGetLcdData() ? 'TEXT: '.htmlspecialchars(utf8_encode($pcGPS->GetLcdDataBytes())).'<BR>HEX: '.strtoupper(rtrim(chunk_split(bin2hex($pcGPS->GetPortDataBytes()), 2, ' '))) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='CustomPositionData';//'GetCustomPositionData()';
	$Description='Custom data produced by custom firmware';
	$Result=$pcGPS->CanGetCustomPositionData() ? sprintf('%d (=0x%08x)', $pcGPS->GetCustomPositionData(), $pcGPS->GetCustomPositionData()) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GsmCREG';//'GetGsmCREG()';
	$Description='Network Registration Report (AT+CREG?)';
	if($pcGPS->CanGetGsmCREG())
	{
		$CREG=$pcGPS->GetGsmCREG();
		switch($CREG)
		{
		case CREG_NotRegistered: $Text='CREG_NotRegistered'; break;
		case CREG_HomeNetwork: $Text='CREG_HomeNetwork'; break;
		case CREG_Searching: $Text='CREG_Searching'; break;
		case CREG_AccessDenied: $Text='CREG_AccessDenied'; break;
		case CREG_Unknown: $Text='CREG_Unknown'; break;
		case CREG_Roaming: $Text='CREG_Roaming'; break;
		default: $Text='CREG_...'; break;
		}
		$Result="$CREG (=$Text)";
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Fstr';//'GetFstr()';
	$Description='GSM network signal quality from 0 up to 31 or 99 for unknown (AT+CSQ?)';
	$Result=$pcGPS->CanGetFstr() ? $pcGPS->GetFstr() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='IMSI';//'GetIMSI()';
	$Description='International Mobile Subscriber Identity (AT+CIMI?)';
	$Result=$pcGPS->CanGetIMSI() ? $pcGPS->GetIMSI() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='GsmNetworkID';//'GetGsmNetworkID()';
	$Description='The ID number of the GSM network provider that is in use';
	$Result=$pcGPS->CanGetGsmNetworkID() ? $pcGPS->GetGsmNetworkID() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='SimPin';//'GetSimPin()';
	$Description='The PIN-code used to attempt to unlock the SIM-card (FFFF=no PIN-code or 0000 was tried)';
	$Result=$pcGPS->CanGetSimPin() ? $pcGPS->GetSimPin() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='PhoneNumber';//'GetPhoneNumber()';
	$Description='Phone number that called or sent an SMS to the module';
	$Result=$pcGPS->CanGetPhoneNumber() ? $pcGPS->GetPhoneNumber() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1UtcTime';//'GetDigTach1UtcTime()';
	$Description='UTC date/time of the digital tachograph as a timestamp';
	if($pcGPS->CanGetDigTach1Info())
	{
		$TimeStamp=$pcGPS->GetDigTach1UtcTime();
		$Result=$TimeStamp.' (='.gmdate('M j Y H:i:s', $TimeStamp).')';
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1PositionTime';//'GetDigTach1PositionTime()';
	$Description='UTC date/time with current position adjustment of the digital tachograph as a timestamp';
	if($pcGPS->CanGetDigTach1Info())
	{
		$TimeStamp=$pcGPS->GetDigTach1PositionTime();
		$Result=$TimeStamp.' (='.gmdate('M j Y H:i:s', $TimeStamp).')';
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1StatusChanges';//'GetDigTach1StatusChanges()';
	$Description='Bitmask with status changes since the previous data output of the digital tachograph';
	if($pcGPS->CanGetDigTach1Info())
	{
		$Result=$pcGPS->GetDigTach1StatusChanges();
		if($Result) //Has it a value different than 0? 
		{
			$Text=' (=DTDCEBM_';
			if($Result & DTDCEBM_Motion) $Text.='Motion+';
			if($Result & DTDCEBM_Driver1workstate) $Text.='Driver1workstate+';
			if($Result & DTDCEBM_Driver2workstate) $Text.='Driver2workstate+';
			if($Result & DTDCEBM_Overspeed) $Text.='Overspeed+';
			if($Result & DTDCEBM_Driver1card) $Text.='Driver1card+';
			if($Result & DTDCEBM_Driver2card) $Text.='Driver2card+';
			if($Result & DTDCEBM_Driver1warning) $Text.='Driver1warning+';
			if($Result & DTDCEBM_Driver2warning) $Text.='Driver2warning+';
			if($Result & DTDCEBM_Ignition) $Text.='Ignition+';
			$Text=substr($Text, 0, -1).')';
		} else $Text=' (=No changes)';
		$Result.=$Text;
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1Workstates';//'GetDigTach1Workstates()';
	$Description='Workstates information of the digital tachograph';
	if($pcGPS->CanGetDigTach1Info())
	{
		$Workstates=$pcGPS->GetDigTach1Workstates();
		$Result=$Workstates.' (=Motion:';
		switch(($Workstates>>6)&3)
		{
		case 0: $Result.='no'; break;
		case 1: $Result.='yes'; break;
		case 2: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / Driver1:';
		switch($Workstates&7)
		{
		case 0: $Result.='resting'; break;
		case 1: $Result.='available'; break;
		case 2: $Result.='working'; break;
		case 3: $Result.='driving'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / Driver2:';
		switch(($Workstates>>3)&7)
		{
		case 0: $Result.='resting'; break;
		case 1: $Result.='available'; break;
		case 2: $Result.='working'; break;
		case 3: $Result.='driving'; break;
		default: $Result.='reserved'; break;
		}
		$Result=htmlspecialchars($Result.')', ENT_COMPAT, 'UTF-8');
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1Driver1';//GetDigTach1Driver1()
	$Description='Driver 1 information of the digital tachograph';
	if($pcGPS->CanGetDigTach1Info())
	{
		$Driver=$pcGPS->GetDigTach1Driver1();
		$Result=$Driver.' (=Overspeed:';
		switch(($Driver>>6)&3)
		{
		case 0: $Result.='no'; break;
		case 1: $Result.='yes'; break;
		case 2: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / Card:';
		switch(($Driver>>4)&3)
		{
		case 0: $Result.='none'; break;
		case 1: $Result.='present'; break;
		case 2: $Result.='malfunction'; break;
		case 3: $Result.='driving'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / Time:';
		switch($Driver&15)
		{
		case 0: $Result.='no warning (0..4.25h)'; break;
		case 1: $Result.='warning 1 (4.25..4.5h)'; break;
		case 2: $Result.='warning 2 (4.5..8.75h)'; break;
		case 3: $Result.='warning 3 (8.75..9h)'; break;
		case 4: $Result.='warning 4 (9..15.75h)'; break;
		case 5: $Result.='warning 5 (15.75..16h)'; break;
		case 14: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result=htmlspecialchars($Result.')', ENT_COMPAT, 'UTF-8');
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1Driver2';//GetDigTach1Driver2()
	$Description='Driver 2 information of the digital tachograph';
	if($pcGPS->CanGetDigTach1Info())
	{
		$Driver=$pcGPS->GetDigTach1Driver2();
		$Result=$Driver.' (=Card:';
		switch(($Driver>>4)&3)
		{
		case 0: $Result.='none'; break;
		case 1: $Result.='present'; break;
		case 2: $Result.='malfunction'; break;
		case 3: $Result.='driving'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / Time:';
		switch($Driver&15)
		{
		case 0: $Result.='no warning (0..4.25h)'; break;
		case 1: $Result.='warning 1 (4.25..4.5h)'; break;
		case 2: $Result.='warning 2 (4.5..8.75h)'; break;
		case 3: $Result.='warning 3 (8.75..9h)'; break;
		case 4: $Result.='warning 4 (9..15.75h)'; break;
		case 5: $Result.='warning 5 (15.75..16h)'; break;
		case 14: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result=htmlspecialchars($Result.')', ENT_COMPAT, 'UTF-8');
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1SpeedKPH';//'GetDigTach1SpeedKPH()';
	$Description='Speed in kilometers per hour of the digital tachograph';
	$Result=$pcGPS->CanGetDigTach1Info() ? $pcGPS->GetDigTach1SpeedKPH() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1TravelledMeters';//'GetDigTach1TravelledMeters()';
	$Description='Travelled meters of the digital tachograph';
	$Result=$pcGPS->CanGetDigTach1Info() ? $pcGPS->GetDigTach1TravelledMeters() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1TripMeters';//'GetDigTach1TripMeters()';
	$Description='Trip meters of the digital tachograph';
	$Result=$pcGPS->CanGetDigTach1Info() ? $pcGPS->GetDigTach1TripMeters() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTach1Info1';//GetDigTach1Info1()
	$Description='Information 1 of the digital tachograph';
	if($pcGPS->CanGetDigTach1Info())
	{
		$Val=$pcGPS->GetDigTach1Info1();
		$Result=$Val.' (=Printer:';
		switch(($Val>>6)&3)
		{
		case 0: $Result.='door open or no paper'; break;
		case 1: $Result.='door closed and paper present'; break;
		case 2: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / Ignition:';
		switch(($Val>>4)&3)
		{
		case 0: $Result.='off'; break;
		case 1: $Result.='on'; break;
		case 2: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / D2:';
		switch(($Val>>4)&3)
		{
		case 0: $Result.='off'; break;
		case 1: $Result.='on'; break;
		case 2: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result.=' / D1:';
		switch($Val&3)
		{
		case 0: $Result.='off'; break;
		case 1: $Result.='on'; break;
		case 2: $Result.='error'; break;
		default: $Result.='reserved'; break;
		}
		$Result=htmlspecialchars($Result.')', ENT_COMPAT, 'UTF-8');
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTachDataSize';//'GetDigTachDataSize()';
	$Description='Size in bytes of the data of the digital tachograph';
	$Result=$pcGPS->CanGetDigTachData() ? $pcGPS->GetDigTachDataSize() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='DigTachDataBytes';//'GetDigTachDataBytes()';
	$Description='The data bytes of the digital tachograph';
	$Result=$pcGPS->CanGetDigTachData() ? 'TEXT: '.htmlspecialchars(utf8_encode($pcGPS->GetDigTachDataBytes())).'<BR>HEX: '.strtoupper(rtrim(chunk_split(bin2hex($pcGPS->GetDigTachDataBytes()), 2, ' '))) : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='Fuel';//'GetFuel()';
	$Description='Fuel level (0..100% / 255=unknown)';
	$Result=$pcGPS->CanGetFuel() ? $pcGPS->GetFuel() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='UserCounter';//'GetUserCounter()';
	$Description='User counters that can count whatever you make them count';
	if($pcGPS->CanGetUserCounter())
	{
		$BlockOffset=$pcGPS->GetUserCounter(-1);
		$Result="[$BlockOffset]";
		for($RecordCounter=0;$RecordCounter<5;$RecordCounter++)
			$Result.=' '.($BlockOffset+$RecordCounter).':'.($pcGPS->GetUserCounter($RecordCounter));
	} else $Result=$NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);



	//This is the end of the items for the single column table.
	//All info blocks above are decoded and displayed from the
	//manually decoded data strings.
	if($Type==GHTT_FullSingleColumn)
	{
		print("</table><P>Note: Result fields marked with \"$NotEncoded\" are not encoded in this module data, according to the value that is returned by the \"GetSwitch()\" function.<BR>");
		return;
	}



	//The info blocks below are additionally decoded and displayed from the
	//database contents (not with the manual data string decoding feature).

	$Function='NMEA_RMC';//'GetNMEA_RMC()';
	$Description='NMEA 0183 RMC protocol compatible string of the current position';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? $pcGPS->GetNMEA_RMC() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);

	$Function='NMEA_GGA';//'GetNMEA_GGA()';
	$Description='NMEA 0183 GGA protocol compatible string of the current position';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? $pcGPS->GetNMEA_GGA() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);
	
	$Function='NMEA_VTG';//'GetNMEA_VTG()';
	$Description='NMEA 0183 VTG protocol compatible string of the current position';
	$Result=($pcGPS->CanGetLatLong() || $pcGPS->CanGetLatLongInaccurate()) ? $pcGPS->GetNMEA_VTG() : $NotEncoded;
		TableOutput($Type, $Function, $Description, $Result);



	//This comes at the end of a decoded database view.
	//HTTP data strings are the textual representation of module record.
	if(($Type==GHTT_WideRow)||($Type==GHTT_WideHeader))
	{
		$Function='HttpData';//'GetHttpData()';
		$Description='Module data encoded in HTTP URL compatible format';
		$Result=$pcGPS->GetHttpData();
			TableOutput($Type, $Function, $Description, $Result);
	}
}
print($HtmlFooter); //The closing part of the HTML output of this script
?>
