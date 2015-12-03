<?php
namespace App\CGPS;

$CGPS_CLASS_VERSION = 'cgps.php v77 (supports module firmware up to version: Rev9:533 / Rev5..8:all)';
define('SV_LowestPositionSwitch', 0x00);
define('SV_Position', 0x00);
define('SV_PositionMotionUnknown', 0x01);
define('SV_PositionCompact', 0x02);
define('SV_PositionMotionUnknownCompact', 0x03);
define('SV_PositionTripMeters', 0x04);
define('SV_PositionTravelledMeters', 0x05);
define('SV_PositionAcceleration', 0x06);
define('SV_PositionAnalogInputs', 0x07);
define('SV_PositionCustom', 0x08);
define('SV_PositionTravelledMetersFuel', 0x09);
define('SV_HighestPositionSwitch', 0x09);
define('SV_PowerUp', 0x30);
define('SV_InternalStatus1', 0x31);
define('SV_Counters', 0x32);
define('SV_CountersHighestSpeed', 0x33);
define('SV_CountersAnalogInputs', 0x34);
define('SV_CountersUser', 0x35);
define('SV_Network', 0x40);
define('SV_InternalStatus2', 0x41);
define('SV_RestartAnnouncement', 0x42);
define('SV_ReceivedSMS', 0x45);
define('SV_CalledByUnknownPhoneNumber', 0x46);
define('SV_CalledByKnownPhoneNumber', 0x47);
define('SV_SettingsAccepted', 0x48);
define('SV_SettingsRejected', 0x49);
define('SV_Acknowledge', 0x4A);
define('SV_KeepAlive', 0x4E);
define('SV_TimeAlive', 0x4D);
define('SV_KeepAliveTripMeters', 0x20);
define('SV_TimeAliveTripMeters', 0x24);
define('SV_KeepAliveTravelledMeters', 0x21);
define('SV_TimeAliveTravelledMeters', 0x25);
define('SV_KeepAliveAcceleration', 0x22);
define('SV_TimeAliveAcceleration', 0x26);
define('SV_KeepAliveAnalogInputs', 0x23);
define('SV_TimeAliveAnalogInputs', 0x27);
define('SV_KeepAliveCustom', 0x28);
define('SV_TimeAliveCustom', 0x29);
define('SV_KeepAliveTravelledMetersFuel', 0x2A);
define('SV_TimeAliveTravelledMetersFuel', 0x2B);
define('SV_PowerDownBackup1', 0x3F);
define('SV_ServerDataUploadAccepted', 0x4B);
define('SV_ServerDataUploadRejected', 0x4C);
define('SV_Photo', 0x50);
define('SV_PhotoLog', 0x51);
define('SV_PhotoGpsLog', 0x53);
define('SV_PhotoGps', 0x54);
define('SV_PhotoLogData', 0x55);
define('SV_LogDataHeader', 0x56);
define('SV_LogData', 0x57);
define('SV_1WireDetached', 0x5D);
define('SV_iButton', 0x5F);
define('SV_Port1DataExtra', 0x60);
define('SV_Port2DataExtra', 0x61);
define('SV_Port3DataExtra', 0x62);
define('SV_Port4DataExtra', 0x63);
define('SV_Port1Data', 0x64);
define('SV_Port2Data', 0x65);
define('SV_Port3Data', 0x66);
define('SV_Port4Data', 0x67);
define('SV_DigTach1', 0x68);
define('SV_DigTachVIN', 0x69);
define('SV_DigTachVRN', 0x6A);
define('SV_DigTachCARD1', 0x6B);
define('SV_DigTachCARD2', 0x6C);
define('SV_LcdData1', 0x70);
define('SV_LcdData2', 0x71);
define('SV_LcdData3', 0x72);
define('SV_LcdData4', 0x73);
define('SV_LcdData5', 0x74);
define('SV_LcdData6', 0x75);
define('SV_LcdData7', 0x76);
define('SV_LcdData8', 0x77);
define('SV_LcdData9', 0x78);
define('SV_LcdData10', 0x79);
define('SV_LcdData11', 0x7A);
define('SV_LcdData12', 0x7B);
define('SV_LcdData13', 0x7C);
define('SV_LcdData14', 0x7D);
define('SV_LcdData15', 0x7E);
define('SV_LcdData16', 0x7F);
define('SV_1WireData1', 0x80);
define('SV_1WireData2', 0x81);
define('SV_1WireData3', 0x82);
define('SV_1WireData4', 0x83);
define('SV_1WireData5', 0x84);
define('SV_1WireData6', 0x85);
define('SV_1WireData7', 0x86);
define('SV_1WireData8', 0x87);
define('SV_1WireData9', 0x88);
define('SV_1WireData10', 0x89);
define('SV_1WireData11', 0x8A);
define('SV_1WireData12', 0x8B);
define('SV_1WireData13', 0x8C);
define('SV_1WireData14', 0x8D);
define('SV_1WireData15', 0x8E);
define('SV_1WireData16', 0x8F);
define('SV_GsmCellScan', 0xC0);
define('SV_GsmCellScanStrip', 0xC1);
define('SV_LowestInaccuratePositionSwitch', 0xF1);
define('SV_InaccuratePosition', 0xF1);
define('SV_InaccuratePositionCompact', 0xF2);
define('SV_InaccuratePositionTripMeters', 0xF3);
define('SV_InaccuratePositionTravelledMeters', 0xF4);
define('SV_InaccuratePositionAcceleration', 0xF5);
define('SV_InaccuratePositionAnalogInputs', 0xF6);
define('SV_InaccuratePositionCustom', 0xF7);
define('SV_InaccuratePositionTravelledMetersFuel', 0xF8);
define('SV_HighestInaccuratePositionSwitch', 0xFE);
define('SV_Invalid', 0xFF);
define('VSM_LatLong', 'a');
define('VSM_LatLongInaccurate', 'b');
define('VSM_LatLongMargin', 'c');
define('VSM_Altitude', 'd');
define('VSM_AltitudeMargin', 'e');
define('VSM_Speed', 'f');
define('VSM_Heading', 'g');
define('VSM_Accu', 'h');
define('VSM_GsmNetworkID', 'i');
define('VSM_Temperature', 'j');
define('VSM_Reset', 'k');
define('VSM_Index', 'l');
define('VSM_Shake', 'm');
define('VSM_HDOP', 'n');
define('VSM_MaxDB', 'o');
define('VSM_View', 'p');
define('VSM_Fix', 'q');
define('VSM_Fstr', 'r');
define('VSM_Version', 's');
define('VSM_IMSI', 't');
define('VSM_IO', 'u');
define('VSM_GpsFirmwareCRC', 'v');
define('VSM_PhoneNumber', 'w');
define('VSM_SettingsCRC', 'x');
define('VSM_EventID', 'y');
define('VSM_CGACT', 'z');
define('VSM_CGATT', 'A');
define('VSM_CREG', 'B');
define('VSM_GpsHighestMaxDB', 'C');
define('VSM_RestartCause', 'D');
define('VSM_Counters', 'E');
define('VSM_CounterTripMeters', 'F');
define('VSM_CounterTravelledMeters', 'G');
define('VSM_ExtraDataSize', 'H');
define('VSM_PortData', 'I');
define('VSM_HardwareStatus', 'J');
define('VSM_iButton', 'K');
define('VSM_LcdData', 'L');
define('VSM_1WireData', 'M');
define('VSM_PhotoGpsTimeDiff', 'N');
define('VSM_AnalogInputs', 'O');
define('VSM_GpsStatus', 'P');
define('VSM_AdditionalIO', 'Q');
define('VSM_MiscStatus', 'R');
define('VSM_SettingsError', 'S');
define('VSM_AccelerationX', 'T');
define('VSM_AccelerationY', 'U');
define('VSM_AccelerationZ', 'V');
define('VSM_PhotoLogDataSize', 'W');
define('VSM_PhotoLogDataBytes', 'X');
define('VSM_CustomPositionData', 'Y');
define('VSM_LogDataType', 'Z');
define('VSM_LogDataGpsTimeDiff', '1');
define('VSM_LogDataSize', '2');
define('VSM_LogDataBytes', '3');
define('VSM_GsmFirmwareCrc', '4');
define('VSM_SimPin', '5');
define('VSM_PhotoPort', '6');
define('VSM_Fuel', '7');
define('VSM_UserCounter', '8');
define('MDIO_Output1', 1);
define('MDIO_Output2', 2);
define('MDIO_Output3', 4);
define('MDIO_Output4', 8);
define('MDIO_Input1', 16);
define('MDIO_Input2', 32);
define('MDIO_Input3', 64);
define('MDIO_Input4', 128);
define('CGACT_Deactivated', 0x30);
define('CGACT_Activated', 0x31);
define('CGATT_Detached', 0x30);
define('CGATT_Attached', 0x31);
define('CREG_NotRegistered', 0x30);
define('CREG_HomeNetwork', 0x31);
define('CREG_Searching', 0x32);
define('CREG_AccessDenied', 0x33);
define('CREG_Unknown', 0x34);
define('CREG_Roaming', 0x35);
define('RACD_Photo_No', 0);
define('RACD_Photo_LoRes', 1);
define('RACD_Photo_HiRes', 2);
define('RACD_DigitalOutput_NoChange', 0);
define('RACD_DigitalOutput_Enable', 1);
define('RACD_DigitalOutput_Disable', 2);
define('RACD_DigitalOutput_Toggle', 3);
define('DTDCEBM_Motion', 1);
define('DTDCEBM_Driver1workstate', 2);
define('DTDCEBM_Driver2workstate', 4);
define('DTDCEBM_Overspeed', 8);
define('DTDCEBM_Driver1card', 16);
define('DTDCEBM_Driver2card', 32);
define('DTDCEBM_Driver1warning', 64);
define('DTDCEBM_Driver2warning', 128);
define('DTDCEBM_Ignition', 256);


class CGPS
{
    var $mHex;
    var $mLastError;
    var $mValidSwitchData;
    var $maParts;
    var $mbValidDataSelected;
    var $mImei;
    var $mCurrentSwitch;
    var $mCRC;
    var $mWantAck;

    function achanh($h)
    {
        switch ($this->GetRev()) {
            case 9:
                $B = '29';
                break;
            case 8:
                $B = '0B';
                break;
            case 5:
                $B = '0A';
                break;
            default:
                $B = '08';
                break;
        }
        $this->maParts[] = substr($h, 0, 28) . '0000000000000000000000' . substr($h, 28, 2) . '0000000000' . sprintf('%02X', hexdec(substr($h, 27, 1)) & 1) . $B;
    }

    var $mSettings;
    var $mFirmware;
    var $mFirmwareManufacturer;
    var $mSerialPort1;
    var $mSerialPort2;
    var $mSerialPort3;
    var $mSerialPort4;
    var $mGpsLog;
    var $mCountersLog;
    var $mPhoto;
    var $mTransmitLog;
    var $mResetTimer1;
    var $mResetTimer2;
    var $mResetTimer3;
    var $mResetTimer4;
    var $mResetTimer5;
    var $mResetTimer6;
    var $mResetTimer7;
    var $mResetTimer8;
    var $mSmsAlert1;
    var $mSmsAlert2;
    var $mSmsAlert3;
    var $mSmsAlertCalledBy1;
    var $mSmsAlertCalledBy2;
    var $mSmsAlertCalledBy3;
    var $mActionID;
    var $mRebootModule;
    var $mClearLog;
    var $mClearGPSConfig;
    var $mSyncTime;
    var $mDigitalOutput1;
    var $mDigitalOutput2;
    var $mDigitalOutput3;
    var $mDigitalOutput4;
    var $mBuzzer;
    var $mSourceCode;
    var $mOmitIdentification;
    var $mAcknowledgeCRC;
    var $mReserved;

    function CGPS()
    {
        $this->Clear();
        $this->ClearResponseActionMembers();
    }

    function Clear()
    {
        $this->mImei = $this->mValidSwitchData = $this->mLastError = '';
        $this->mCurrentSwitch = SV_Invalid;
        $this->mHex = '0000000000000000FF000000000000000000000000000000000000000000000000';
        $this->mbValidDataSelected = $this->mWantAck = false;
        $this->maParts = array();
    }

    function GetLastError()
    {
        return $this->mLastError;
    }

    function IsValid()
    {
        return $this->mbValidDataSelected;
    }

    function GetSwitch()
    {
        return $this->mCurrentSwitch;
    }

    function GetValidSwitchData()
    {
        return $this->mValidSwitchData;
    }

    function GetDataPartCount()
    {
        return count($this->maParts);
    }

    function SelectDataPart($DataPartNumber)
    {
        $this->mValidSwitchData = '';
        $this->mbValidDataSelected = false;
        if (!isset($this->maParts[$DataPartNumber])) {
            $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Requested data part does not exist";
            $this->mCurrentSwitch = SV_Invalid;
            return false;
        }
        $this->mHex = $this->maParts[$DataPartNumber];
        $Switch = hexdec(substr($this->mHex, 16, 2));
        if (($Switch < 0x10) || ($Switch > 0xF0)) {
            $GpsStatus = $this->GetGpsStatus();
            if (hexdec(substr($this->mHex, 64, 2)) & 8) {
                $Switch = SV_PositionCompact;
                $this->mValidSwitchData = VSM_IO;
                if ($GpsStatus & 1) {
                    if ($GpsStatus & 32) {
                        $this->mValidSwitchData .= VSM_LatLongInaccurate;
                        $Switch = SV_InaccuratePositionCompact;
                    } else {
                        $this->mValidSwitchData .= VSM_LatLong;
                        $Switch = SV_PositionMotionUnknownCompact;
                    }
                } else {
                    $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                    if ($GpsStatus & 32) {
                        $this->mValidSwitchData .= VSM_LatLongInaccurate;
                        $Switch = SV_InaccuratePositionCompact;
                    } else {
                        $this->mValidSwitchData .= VSM_LatLong;
                        $Switch = SV_PositionCompact;
                    }
                }
            } else {
                $this->mValidSwitchData = VSM_Accu . VSM_Index . VSM_LatLongMargin . VSM_Shake . VSM_IO . VSM_MaxDB . VSM_EventID . VSM_Version . VSM_View . VSM_Fix . VSM_GpsStatus . VSM_AdditionalIO . VSM_MiscStatus;
                $Sub = hexdec(substr($this->mHex, 32, 2));
                if ($Sub < 0xE0) {
                    $this->mValidSwitchData .= VSM_Altitude . VSM_Temperature . VSM_Reset;
                    if ($GpsStatus & 1) {
                        if ($GpsStatus & 32) {
                            $this->mValidSwitchData .= VSM_LatLongInaccurate;
                            $Switch = SV_InaccuratePosition;
                        } else {
                            $this->mValidSwitchData .= VSM_LatLong;
                            $Switch = SV_PositionMotionUnknown;
                        }
                    } else {
                        $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                        if ($GpsStatus & 32) {
                            $this->mValidSwitchData .= VSM_LatLongInaccurate;
                            $Switch = SV_InaccuratePosition;
                        } else {
                            $this->mValidSwitchData .= VSM_LatLong;
                            $Switch = SV_Position;
                        }
                    }
                } else {
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                    switch ($Sub) {
                        case 0xE0:
                            $this->mValidSwitchData .= VSM_CounterTripMeters;
                            if ($GpsStatus & 32) {
                                $this->mValidSwitchData .= VSM_LatLongInaccurate;
                                $Switch = SV_InaccuratePositionTripMeters;
                            } else {
                                $this->mValidSwitchData .= VSM_LatLong;
                                $Switch = SV_PositionTripMeters;
                            }
                            break;
                        case 0xE1:
                            $this->mValidSwitchData .= VSM_CounterTravelledMeters;
                            if ($GpsStatus & 32) {
                                $this->mValidSwitchData .= VSM_LatLongInaccurate;
                                $Switch = SV_InaccuratePositionTravelledMeters;
                            } else {
                                $this->mValidSwitchData .= VSM_LatLong;
                                $Switch = SV_PositionTravelledMeters;
                            }
                            break;
                        case 0xE2:
                            $this->mValidSwitchData .= VSM_AccelerationX . VSM_AccelerationY . VSM_AccelerationZ;
                            if ($GpsStatus & 32) {
                                $this->mValidSwitchData .= VSM_LatLongInaccurate;
                                $Switch = SV_InaccuratePositionAcceleration;
                            } else {
                                $this->mValidSwitchData .= VSM_LatLong;
                                $Switch = SV_PositionAcceleration;
                            }
                            break;
                        case 0xE3:
                            $this->mValidSwitchData .= VSM_AnalogInputs;
                            if ($GpsStatus & 32) {
                                $this->mValidSwitchData .= VSM_LatLongInaccurate;
                                $Switch = SV_InaccuratePositionAnalogInputs;
                            } else {
                                $this->mValidSwitchData .= VSM_LatLong;
                                $Switch = SV_PositionAnalogInputs;
                            }
                            break;
                        case 0xE4:
                            $this->mValidSwitchData .= VSM_CustomPositionData;
                            if ($GpsStatus & 32) {
                                $this->mValidSwitchData .= VSM_LatLongInaccurate;
                                $Switch = SV_InaccuratePositionCustom;
                            } else {
                                $this->mValidSwitchData .= VSM_LatLong;
                                $Switch = SV_PositionCustom;
                            }
                            break;
                        case 0xE5:
                            $this->mValidSwitchData .= VSM_CounterTravelledMeters . VSM_Fuel;
                            if ($GpsStatus & 32) {
                                $this->mValidSwitchData .= VSM_LatLongInaccurate;
                                $Switch = SV_InaccuratePositionTravelledMetersFuel;
                            } else {
                                $this->mValidSwitchData .= VSM_LatLong;
                                $Switch = SV_PositionTravelledMetersFuel;
                            }
                            break;
                        default:
                            $Switch = SV_Position;
                            break;
                    }
                }
            }
        } else switch ($Switch) {
            default:
            case SV_Invalid:
                break;
            case SV_PowerUp:
                $this->mValidSwitchData = VSM_Accu . VSM_Temperature . VSM_Reset . VSM_Index . VSM_Shake . VSM_Version . VSM_IO . VSM_GpsFirmwareCRC . VSM_SettingsCRC . VSM_MiscStatus;
                break;
            case SV_InternalStatus1:
                $this->mValidSwitchData = VSM_Accu . VSM_Version . VSM_CREG . VSM_MiscStatus;
                break;
            case SV_Counters:
                $this->mValidSwitchData = VSM_Counters . VSM_CounterTripMeters . VSM_CounterTravelledMeters . VSM_MiscStatus;
                break;
            case SV_CountersHighestSpeed:
                $GpsStatus = $this->GetGpsStatus();
                if (!($GpsStatus & 32)) {
                    $this->mValidSwitchData .= VSM_LatLong;
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                } else $this->mValidSwitchData .= VSM_LatLongInaccurate;
                $this->mValidSwitchData .= VSM_LatLongMargin . VSM_GpsStatus . VSM_AdditionalIO . VSM_Altitude . VSM_Accu . VSM_Temperature . VSM_Reset . VSM_Index . VSM_MaxDB . VSM_View . VSM_Fix . VSM_Version . VSM_IO . VSM_MiscStatus;
                break;
            case SV_CountersAnalogInputs:
                $this->mValidSwitchData = VSM_AnalogInputs . VSM_Accu . VSM_Index . VSM_IO . VSM_MiscStatus;
                break;
            case SV_CountersUser:
                $this->mValidSwitchData = VSM_UserCounter . VSM_Accu . VSM_Index . VSM_MiscStatus;
                break;
            case SV_Network:
                $this->mValidSwitchData = VSM_Accu . VSM_GsmNetworkID . VSM_Version . VSM_IMSI . VSM_Fstr . VSM_CREG . VSM_SettingsCRC . VSM_MiscStatus . VSM_GsmFirmwareCrc . VSM_SimPin;
                break;
            case SV_InternalStatus2:
                break;
            case SV_RestartAnnouncement:
                $this->mValidSwitchData = VSM_Accu . VSM_Temperature . VSM_Reset . VSM_Index . VSM_Shake . VSM_IO . VSM_Version . VSM_GpsHighestMaxDB . VSM_RestartCause . VSM_MiscStatus;
                break;
            case SV_ReceivedSMS:
                $this->mValidSwitchData = VSM_Accu . VSM_GsmNetworkID . VSM_PhoneNumber . VSM_MiscStatus;
                break;
            case SV_CalledByUnknownPhoneNumber:
                $this->mValidSwitchData = VSM_Accu . VSM_GsmNetworkID . VSM_Version . VSM_MiscStatus;
                break;
            case SV_CalledByKnownPhoneNumber:
                $this->mValidSwitchData = VSM_Accu . VSM_GsmNetworkID . VSM_PhoneNumber . VSM_Version . VSM_MiscStatus;
                break;
            case SV_SettingsAccepted:
                $this->mValidSwitchData = VSM_Accu . VSM_Version . VSM_IMSI . VSM_SettingsCRC . VSM_MiscStatus . VSM_SettingsError;
                break;
            case SV_SettingsRejected:
                $this->mValidSwitchData = VSM_Accu . VSM_Version . VSM_IMSI . VSM_MiscStatus . VSM_SettingsError;
                break;
            case SV_Acknowledge:
                break;
            case SV_KeepAlive:
                $this->mValidSwitchData = VSM_Accu . VSM_Index . VSM_LatLongMargin . VSM_IO . VSM_MaxDB . VSM_EventID . VSM_Version . VSM_View . VSM_Fix . VSM_GpsStatus . VSM_AdditionalIO . VSM_MiscStatus;
                $Rev = $this->GetRev();
                if (($Rev > 9) || (($Rev >= 8) && ($this->GetVersion() >= 415))) $this->mValidSwitchData .= VSM_Shake;
                $GpsStatus = $this->GetGpsStatus();
                $Sub = hexdec(substr($this->mHex, 32, 2));
                if (!($GpsStatus & 32)) {
                    $this->mValidSwitchData .= VSM_LatLong;
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                } else $this->mValidSwitchData .= VSM_LatLongInaccurate;
                if ($Sub < 0xE0) {
                    $Switch = SV_KeepAlive;
                    $this->mValidSwitchData .= VSM_Altitude . VSM_Temperature . VSM_Reset;
                } else switch ($Sub) {
                    case 0xE0:
                        $Switch = SV_KeepAliveTripMeters;
                        $this->mValidSwitchData .= VSM_CounterTripMeters;
                        break;
                    case 0xE1:
                        $Switch = SV_KeepAliveTravelledMeters;
                        $this->mValidSwitchData .= VSM_CounterTravelledMeters;
                        break;
                    case 0xE2:
                        $Switch = SV_KeepAliveAcceleration;
                        $this->mValidSwitchData .= VSM_AccelerationX . VSM_AccelerationY . VSM_AccelerationZ;
                        break;
                    case 0xE3:
                        $Switch = SV_KeepAliveAnalogInputs;
                        $this->mValidSwitchData .= VSM_AnalogInputs;
                        break;
                    case 0xE4:
                        $Switch = SV_KeepAliveCustom;
                        $this->mValidSwitchData .= VSM_CustomPositionData;
                        break;
                    case 0xE5:
                        $Switch = SV_KeepAliveTravelledMetersFuel;
                        $this->mValidSwitchData .= VSM_CounterTravelledMeters . VSM_Fuel;
                        break;
                }
                break;
            case SV_TimeAlive:
                $this->mValidSwitchData = VSM_Accu . VSM_Index . VSM_LatLongMargin . VSM_IO . VSM_MaxDB . VSM_EventID . VSM_Version . VSM_View . VSM_Fix . VSM_GpsStatus . VSM_AdditionalIO . VSM_MiscStatus;
                $Rev = $this->GetRev();
                if (($Rev > 9) || (($Rev >= 8) && ($this->GetVersion() >= 415))) $this->mValidSwitchData .= VSM_Shake;
                $GpsStatus = $this->GetGpsStatus();
                $Sub = hexdec(substr($this->mHex, 32, 2));
                if (!($GpsStatus & 32)) {
                    $this->mValidSwitchData .= VSM_LatLong;
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                } else $this->mValidSwitchData .= VSM_LatLongInaccurate;
                if ($Sub < 0xE0) {
                    $Switch = SV_TimeAlive;
                    $this->mValidSwitchData .= VSM_Altitude . VSM_Temperature . VSM_Reset;
                } else switch ($Sub) {
                    case 0xE0:
                        $Switch = SV_TimeAliveTripMeters;
                        $this->mValidSwitchData .= VSM_CounterTripMeters;
                        break;
                    case 0xE1:
                        $Switch = SV_TimeAliveTravelledMeters;
                        $this->mValidSwitchData .= VSM_CounterTravelledMeters;
                        break;
                    case 0xE2:
                        $Switch = SV_TimeAliveAcceleration;
                        $this->mValidSwitchData .= VSM_AccelerationX . VSM_AccelerationY . VSM_AccelerationZ;
                        break;
                    case 0xE3:
                        $Switch = SV_TimeAliveAnalogInputs;
                        $this->mValidSwitchData .= VSM_AnalogInputs;
                        break;
                    case 0xE4:
                        $Switch = SV_TimeAliveCustom;
                        $this->mValidSwitchData .= VSM_CustomPositionData;
                        break;
                    case 0xE5:
                        $Switch = SV_TimeAliveTravelledMetersFuel;
                        $this->mValidSwitchData .= VSM_CounterTravelledMeters . VSM_Fuel;
                        break;
                }
                break;
            case SV_Photo:
                $this->mValidSwitchData = VSM_Accu . VSM_Temperature . VSM_Reset . VSM_MaxDB . VSM_Version . VSM_IO . VSM_ExtraDataSize . VSM_MiscStatus . VSM_PhotoPort;
                break;
            case SV_PhotoLog:
                $this->mValidSwitchData = VSM_Accu . VSM_Temperature . VSM_Reset . VSM_MaxDB . VSM_Version . VSM_IO . VSM_PhotoLogDataSize . VSM_MiscStatus . VSM_PhotoPort;
                break;
            case SV_PhotoGpsLog:
                $GpsStatus = $this->GetGpsStatus();
                if (!($GpsStatus & 32)) {
                    $this->mValidSwitchData .= VSM_LatLong;
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                } else $this->mValidSwitchData .= VSM_LatLongInaccurate;
                $this->mValidSwitchData .= VSM_LatLongMargin . VSM_MaxDB . VSM_View . VSM_Fix . VSM_Version . VSM_IO . VSM_PhotoGpsTimeDiff . VSM_PhotoLogDataSize . VSM_GpsStatus . VSM_MiscStatus . VSM_PhotoPort;
                break;
            case SV_PhotoGps:
                $GpsStatus = $this->GetGpsStatus();
                if (!($GpsStatus & 32)) {
                    $this->mValidSwitchData .= VSM_LatLong;
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                } else $this->mValidSwitchData .= VSM_LatLongInaccurate;
                $this->mValidSwitchData .= VSM_LatLongMargin . VSM_MaxDB . VSM_View . VSM_Fix . VSM_Version . VSM_IO . VSM_PhotoGpsTimeDiff . VSM_ExtraDataSize . VSM_GpsStatus . VSM_MiscStatus . VSM_PhotoPort;
                break;
            case SV_PhotoLogData:
                $this->mValidSwitchData = VSM_Index . VSM_PhotoLogDataBytes;
                break;
            case SV_LogDataHeader:
                $GpsStatus = $this->GetGpsStatus();
                if (!($GpsStatus & 32)) {
                    $this->mValidSwitchData .= VSM_LatLong;
                    if (!($GpsStatus & 1)) $this->mValidSwitchData .= VSM_Speed . VSM_Heading;
                } else $this->mValidSwitchData .= VSM_LatLongInaccurate;
                $this->mValidSwitchData .= VSM_LatLongMargin . VSM_MaxDB . VSM_View . VSM_Fix . VSM_Version . VSM_IO . VSM_LogDataType . VSM_LogDataSize . VSM_GpsStatus . VSM_MiscStatus;
                break;
            case SV_LogData:
                $this->mValidSwitchData = VSM_Index . VSM_LogDataBytes;
                break;
            case SV_1WireDetached:
                $this->mValidSwitchData = VSM_iButton . VSM_MiscStatus;
                break;
            case SV_iButton:
                $this->mValidSwitchData = VSM_iButton . VSM_MiscStatus;
                break;
            case SV_Port1Data:
            case SV_Port2Data:
            case SV_Port3Data:
            case SV_Port4Data:
                $this->mValidSwitchData = VSM_PortData . VSM_MiscStatus;
                if (hexdec(substr($this->mHex, 18, 2)) & 128) $this->mValidSwitchData .= VSM_Index;
                break;
            case SV_Port1DataExtra:
            case SV_Port2DataExtra:
            case SV_Port3DataExtra:
            case SV_Port4DataExtra:
                $this->mValidSwitchData = VSM_ExtraDataSize . VSM_MiscStatus;
                break;
            case SV_LcdData1:
            case SV_LcdData2:
            case SV_LcdData3:
            case SV_LcdData4:
            case SV_LcdData5:
            case SV_LcdData6:
            case SV_LcdData7:
            case SV_LcdData8:
            case SV_LcdData9:
            case SV_LcdData10:
            case SV_LcdData11:
            case SV_LcdData12:
            case SV_LcdData13:
            case SV_LcdData14:
            case SV_LcdData15:
            case SV_LcdData16:
                $this->mValidSwitchData = VSM_LcdData . VSM_MiscStatus;
                break;
            case SV_1WireData1:
            case SV_1WireData2:
            case SV_1WireData3:
            case SV_1WireData4:
            case SV_1WireData5:
            case SV_1WireData6:
            case SV_1WireData7:
            case SV_1WireData8:
            case SV_1WireData9:
            case SV_1WireData10:
            case SV_1WireData11:
            case SV_1WireData12:
            case SV_1WireData13:
            case SV_1WireData14:
            case SV_1WireData15:
            case SV_1WireData16:
                $this->mValidSwitchData = VSM_1WireData . VSM_MiscStatus;
                break;
            case SV_GsmCellScan:
            case SV_GsmCellScanStrip:
                $this->mValidSwitchData = VSM_GsmNetworkID . VSM_MiscStatus;
                break;
        }
        $this->mCurrentSwitch = $Switch;
        if (hexdec(substr($this->mHex, 0, 8)) == 0xffffffff) {
            $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Data contains undetermined creation date";
            return true;
        }
        $fTime = $this->GetUtcTime();
        if ($fTime > (float)((float)time() + (float)86400)) {
            $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Data creation time (" . gmdate('YmdHis', $fTime) . "UTC) is in the future compared to the current server time (" . gmdate('YmdHis', time()) . "UTC)";
            if (!$this->IsForwardedByGateway()) {
                $this->mClearGPSConfig = $this->mSyncTime = true;
                $this->mLastError .= ". Automatic action taken: CGPS::mClearGPSConfig and CGPS::mSyncTime enabled";
            }
            return true;
        }
        if ((($Switch >= SV_LowestPositionSwitch) && ($Switch <= SV_HighestPositionSwitch)) || (($Switch >= SV_LowestInaccuratePositionSwitch) && ($Switch <= SV_HighestInaccuratePositionSwitch))) {
            if ($fTime < (float)1072911600) {
                $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Data creation time (" . gmdate('YmdHis', $fTime) . "UTC) is too old";
                return true;
            }
        }
        if ((strpos($this->mValidSwitchData, VSM_LatLong) !== false) || (strpos($this->mValidSwitchData, VSM_LatLongInaccurate) !== false)) {
            $fLatitude = $this->GetLatitudeFloat();
            if ($fLatitude >= 90.0) {
                $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Latitude ($fLatitude) is too high";
                return true;
            }
            if ($fLatitude <= -90.0) {
                $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Latitude ($fLatitude) is too low";
                return true;
            }
            $fLongitude = $this->GetLongitudeFloat();
            if ($fLongitude >= 180.0) {
                $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Longitude ($fLongitude) is too high";
                return true;
            }
            if ($fLongitude <= -180.0) {
                $this->mLastError = "CGPS::SelectDataPart($DataPartNumber) Longitude ($fLongitude) is too low";
                return true;
            }
        }
        $this->mbValidDataSelected = true;
        return true;
    }

    function SetHttpData($HttpData)
    {
        $s = strspn($HttpData, '0123456789');
        if ($s > 20) $s = 20;
        $Imei = substr($HttpData, 0, $s);
        if (!CheckImeiCrc($Imei)) {
            $Imei = DecompressImei($Imei);
            if (!CheckImeiCrc($Imei)) {
                $this->Clear();
                $this->mLastError = "CGPS::SetHttpData() HttpData contains invalid IMEI '$Imei'";
                return false;
            }
        }
        $Len = strlen($HttpData);
        $this->maParts = array();
        $this->mImei = $Imei;
        $c = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        for ($i = $s; ; $i = $N) {
            $t = ($i < $Len) ? ord($HttpData[$i]) : -1;
            switch ($t) {
                case 124:
                    $N = ++$i + 44;
                    break;
                case 33:
                    $N = ++$i + 20;
                    break;
                default:
                    if (!count($this->maParts)) {
                        $this->Clear();
                        $this->mImei = $Imei;
                    } else $this->SelectDataPart(0);
                    $this->mLastError = 'CGPS::SetHttpData() unsupported type for data part ' . count($this->maParts);
                    return false;
            }
            $l = strspn($HttpData, $c, $i);
            if ($i + $l != $N) {
                if (!count($this->maParts)) {
                    $this->Clear();
                    $this->mImei = $Imei;
                } else $this->SelectDataPart(0);
                $this->mLastError = 'CGPS::SetHttpData() HttpData has invalid length for data part ' . count($this->maParts);
                return false;
            }
            $h = '';
            for (; $i < $N; $i += 4) $h .= sprintf('%06x', (strpos($c, $HttpData[$i]) << 18) + (strpos($c, $HttpData[$i + 1]) << 12) + (strpos($c, $HttpData[$i + 2]) << 6) + strpos($c, $HttpData[$i + 3]));
            if ($t == 33) $this->achanh($h); else $this->maParts[] = $h;
            if ($N == $Len) {
                $this->mWantAck = true;
                $this->mImei = $Imei;
                $this->mCRC = CGPSsettings::CreateCRC($Imei . substr($HttpData, $s));
                $this->SelectDataPart(0);
                return true;
            }
        }
    }

    function GetHttpData()
    {
        $Enc = CompressImei($this->mImei) . '|';
        $Hex = $this->mHex;
        $Conv = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        for ($Cur = 0, $Max = strlen($Hex) - 6; $Cur <= $Max; $Cur += 6) {
            $Dec = hexdec(substr($Hex, $Cur, 6));
            $Enc .= $Conv[($Dec >> 18) & 63] . $Conv[($Dec >> 12) & 63] . $Conv[($Dec >> 6) & 63] . $Conv[$Dec & 63];
        }
        return $Enc;
    }

    function SetTcpData($Imei, $TcpData)
    {
        $Len = strlen($TcpData);
        if ($Len > 15) {
            $db = ord($TcpData[0]);
            if (($db >= 0x80) && ($db <= 0x85)) {
                $b = true;
                $s = 0;
            } else if ($db <= 0x63) {
                $t = ord($TcpData[6]);
                if (($t >= 0x80) && ($t <= 0x85)) {
                    $IMEI = sprintf('%02d%03d%03d%03d%03d', $db, (ord($TcpData[1]) << 2) | (ord($TcpData[2]) >> 6), ((ord($TcpData[2]) & 0x3F) << 4) | (ord($TcpData[3]) >> 4), ((ord($TcpData[3]) & 0xF) << 6) | (ord($TcpData[4]) >> 2), ((ord($TcpData[4]) & 0x3) << 8) | (ord($TcpData[5])));
                    $c = 0;
                    for ($i = 0; $i < 14; $i += 2) {
                        $d = $IMEI[$i + 1] << 1;
                        $c += $IMEI[$i] + (int)($d / 10) + ($d % 10);
                    }
                    $IMEI = sprintf('%s%d', $IMEI, (10 - ($c % 10)) % 10);
                    $b = true;
                    $s = 6;
                }
            }
            if (isset($b)) {
                if (!isset($IMEI)) {
                    if (!CheckImeiCrc($Imei)) {
                        $this->Clear();
                        $this->mLastError = "CGPS::SetTcpData() provided IMEI invalid while required for TcpData without one";
                        return 0;
                    }
                } else $Imei = $IMEI;
                $this->maParts = array();
                for ($i = $s; ; $i = $N) {
                    if ($i < $Len) switch ($t = ord($TcpData[$i])) {
                        case 0x80:
                        case 0x82:
                        case 0x84:
                            $N = ++$i + 33;
                            if ($Len < $N) break;
                            $this->maParts[] = bin2hex(substr($TcpData, $i, 33));
                            if ($t == 0x80) continue 2;
                            $this->mWantAck = ($t == 0x84) ? false : true;
                            $this->mImei = $Imei;
                            $p = $N - 34;
                            $this->mCRC = CGPSsettings::CreateCRC($Imei . substr($TcpData, $s, $p - $s) . chr(0x80) . substr($TcpData, $p + 1, $N - $p - 1));
                            $this->SelectDataPart(0);
                            return $N;
                        case 0x81:
                        case 0x83:
                        case 0x85:
                            $N = ++$i + 15;
                            if ($Len < $N) break;
                            $this->achanh(bin2hex(substr($TcpData, $i, 15)));
                            if ($t == 0x81) continue 2;
                            $this->mWantAck = ($t == 0x85) ? false : true;
                            $this->mImei = $Imei;
                            $p = $N - 16;
                            $this->mCRC = CGPSsettings::CreateCRC($Imei . substr($TcpData, $s, $p - $s) . chr(0x81) . substr($TcpData, $p + 1, $N - $p - 1));
                            $this->SelectDataPart(0);
                            return $N;
                        default:
                            if (!count($this->maParts)) $this->Clear(); else $this->SelectDataPart(0);
                            $this->mImei = $Imei;
                            $this->mLastError = 'CGPS::SetTcpData() unsupported type for data part ' . count($this->maParts);
                            return 0;
                    }
                    $this->mImei = $Imei;
                    $this->SelectDataPart(0);
                    $this->mLastError = 'CGPS::SetTcpData() TcpData too short for data part ' . count($this->maParts);
                    return 0;
                }
            } else {
                $l = strpos($TcpData, "\n");
                $r = strpos($TcpData, "\r");
                if (($r !== false) && ($r < $l)) $l = $r;
                if ($l !== false) {
                    if (($db > 57) || ($db < 48)) $b = $this->SetHttpData($Imei . substr($TcpData, 0, $l)); else $b = $this->SetHttpData(substr($TcpData, 0, $l));
                    if ($b) {
                        if ($TcpData[$l] == "\r") return -($l + 1);
                        return $l + 1;
                    }
                    $this->mLastError = 'CGPS::SetTcpData() forward ' . $this->mLastError;
                    return 0;
                }
            }
        }
        $this->Clear();
        $this->mLastError = "CGPS::SetTcpData() Invalid TcpData";
        return 0;
    }

    function SetHexData($Imei, $HexData)
    {
        if (!CheckImeiCrc($Imei)) {
            $this->mImei = DecompressImei($Imei);
            if (!CheckImeiCrc($this->mImei)) {
                $this->Clear();
                $this->mLastError = "CGPS::SetHexData() Bad IMEI supplied: \"$Imei\"";
                return false;
            }
        } else $this->mImei = $Imei;
        if (strspn($HexData, '0123456789abcdefABCDEF') != 66) {
            $Imei = $this->mImei;
            $this->Clear();
            $this->mImei = $Imei;
            $this->mLastError = "CGPS::SetHexData() Bad HexData supplied: \"$HexData\"";
            return false;
        }
        $this->maParts = array($HexData);
        $this->SelectDataPart(0);
        return true;
    }

    function GetHexData()
    {
        return $this->mHex;
    }

    function SetBinaryData($Imei, $BinaryData)
    {
        if (!CheckImeiCrc($Imei)) {
            $this->mImei = DecompressImei($Imei);
            if (!CheckImeiCrc($this->mImei)) {
                $this->Clear();
                $this->mLastError = "CGPS::SetBinaryData() Bad IMEI supplied: \"$Imei\"";
                return false;
            }
        } else $this->mImei = $Imei;
        if (strlen($BinaryData) != 33) {
            $Imei = $this->mImei;
            $this->Clear();
            $this->mImei = $Imei;
            $this->mLastError = "CGPS::SetBinaryData() Bad binary data supplied";
            return false;
        }
        $this->maParts = array(bin2hex($BinaryData));
        $this->SelectDataPart(0);
        return true;
    }

    function GetBinaryData()
    {
        return pack('H*', $this->mHex);
    }

    function GetUtcTime()
    {
        $fTime = $this->GetGpsTime();
        if ($fTime >= 1435708816) return $fTime - 17;
        if ($fTime >= 1341100815) return $fTime - 16;
        if ($fTime >= 1230768014) return $fTime - 15;
        if ($fTime >= 1136073613) return $fTime - 14;
        return $fTime - 13.0;
    }

    function GetUtcTimeMySQL()
    {
        return gmdate('YmdHis', $this->GetUtcTime());
    }

    function GetImei()
    {
        return $this->mImei;
    }

    function IsForwardedByGateway()
    {
        return hexdec(substr($this->mHex, 64, 2)) & 4 ? true : false;
    }

    function CanGetEventID()
    {
        return strpos($this->mValidSwitchData, VSM_EventID) === false ? false : true;
    }

    function GetEventID()
    {
        return hexdec(substr($this->mHex, 54, 4));
    }

    function CanGetAccu()
    {
        return strpos($this->mValidSwitchData, VSM_Accu) === false ? false : true;
    }

    function GetAccu()
    {
        if ((hexdec(substr($this->mHex, 64, 2)) & 0x23) >= 2) return (float)hexdec(substr($this->mHex, 28, 4)) / 1969 + 0.2;
        return (float)hexdec(substr($this->mHex, 28, 4)) / 2327 + 0.2;
    }

    function CanGetTemperature()
    {
        return strpos($this->mValidSwitchData, VSM_Temperature) === false ? false : true;
    }

    function GetTemperatureCelcius()
    {
        return floatval(hexdec(substr($this->mHex, 36, 4))) / 256 - 60;
    }

    function GetTemperatureFahrenheit()
    {
        return (float)(((float)9 / (float)5) * (float)$this->GetTemperatureCelcius() + (float)32);
    }

    function CanGetReset()
    {
        return strpos($this->mValidSwitchData, VSM_Reset) === false ? false : true;
    }

    function GetReset()
    {
        $Reset = hexdec(substr($this->mHex, 40, 2));
        return (($Reset >> 5) & 7) << ($Reset & 31);
    }

    function CanGetIndex()
    {
        return strpos($this->mValidSwitchData, VSM_Index) === false ? false : true;
    }

    function GetIndex()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PhotoLogData:
            case SV_LogData:
            case SV_Port1Data:
            case SV_Port2Data:
            case SV_Port3Data:
            case SV_Port4Data:
                return hexdec(substr($this->mHex, 8, 2));
            default:
                return hexdec(substr($this->mHex, 42, 2));
        }
    }

    function CanGetShake()
    {
        return strpos($this->mValidSwitchData, VSM_Shake) === false ? false : true;
    }

    function GetShake()
    {
        if (($this->mCurrentSwitch >= SV_LowestPositionSwitch) && ($this->mCurrentSwitch <= SV_HighestPositionSwitch)) return hexdec(substr($this->mHex, 48, 2));
        return (hexdec(substr($this->mHex, 46, 2)) & 32) ? 1 : 0;
    }

    function CanGetVersion()
    {
        return strpos($this->mValidSwitchData, VSM_Version) === false ? false : true;
    }

    function GetVersion()
    {
        $v = hexdec(substr($this->mHex, 58, 2));
        if ($this->GetRev() >= 8) {
            $b = hexdec(substr($this->mHex, 64, 2));
            return $v | (($b & 16) << 4) | (($b & 64) << 3);
        }
        return $v + 256;
    }

    function CanGetRev()
    {
        return true;
    }

    function GetRev()
    {
        if (strlen($this->mHex) >= 65) switch (hexdec(substr($this->mHex, 64, 2)) & 0x23) {
            case 0x01:
            case 0x02:
                return 5;
            case 0x03:
            case 0x20:
                return 8;
            case 0x21:
            case 0x22:
                return 9;
        }
        if (strlen($this->mImei) == 15) switch ((int)substr($this->mImei, 0, 6)) {
            case 352228:
            case 357541:
            case 352225:
            case 358279:
            case 358278:
                return 5;
            case 357023:
            case 352848:
            case 357820:
            case 354476:
            case 356265:
            case 4401:
            case 357938:
            case 357304:
                return 8;
            case 357460:
            case 351777:
            case 357164:
            case 354043:
            case 351579:
            case 357322:
            case 863071:
            case 861075:
                return 9;
        }
        return 0;
    }

    function CanGetSettingsError()
    {
        return strpos($this->mValidSwitchData, VSM_SettingsError) === false ? false : true;
    }

    function GetSettingsError()
    {
        return hexdec(substr($this->mHex, 18, 2));
    }

    function CanGetSettingsCrc()
    {
        return strpos($this->mValidSwitchData, VSM_SettingsCRC) === false ? false : true;
    }

    function GetSettingsCrc()
    {
        if ($this->mCurrentSwitch == SV_PowerUp) return hexdec(substr($this->mHex, 32, 4));
        return hexdec(substr($this->mHex, 12, 4));
    }

    function CanGetIO()
    {
        return strpos($this->mValidSwitchData, VSM_IO) === false ? false : true;
    }

    function GetIO()
    {
        return hexdec(substr($this->mHex, 50, 2));
    }

    function CanGetAdditionalIO()
    {
        return strpos($this->mValidSwitchData, VSM_AdditionalIO) === false ? false : true;
    }

    function GetAdditionalIO()
    {
        return hexdec(substr($this->mHex, 46, 2)) & 94;
    }

    function CanGetMiscStatus()
    {
        return strpos($this->mValidSwitchData, VSM_MiscStatus) === false ? false : true;
    }

    function GetMiscStatus()
    {
        return hexdec(substr($this->mHex, 62, 2)) & 236;
    }

    function CanGetHardwareStatus()
    {
        return strpos($this->mValidSwitchData, VSM_HardwareStatus) === false ? false : true;
    }

    function GetHardwareStatus()
    {
        return hexdec(substr($this->mHex, 8, 4));
    }

    function CanGetRestartCause()
    {
        return strpos($this->mValidSwitchData, VSM_RestartCause) === false ? false : true;
    }

    function GetRestartCause()
    {
        return hexdec(substr($this->mHex, 20, 2));
    }

    function CanGetCounters()
    {
        return strpos($this->mValidSwitchData, VSM_Counters) === false ? false : true;
    }

    function GetCounterSecondsActive()
    {
        return hexdec(substr($this->mHex, 8, 8));
    }

    function GetCounterSecondsMoving()
    {
        return hexdec(substr($this->mHex, 24, 8));
    }

    function CanGetCounterTravelledMeters()
    {
        return strpos($this->mValidSwitchData, VSM_CounterTravelledMeters) === false ? false : true;
    }

    function GetCounterTravelledMeters()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PositionTravelledMeters:
            case SV_PositionTravelledMetersFuel:
            case SV_InaccuratePositionTravelledMeters:
            case SV_InaccuratePositionTravelledMetersFuel:
            case SV_KeepAliveTravelledMeters:
            case SV_KeepAliveTravelledMetersFuel:
            case SV_TimeAliveTravelledMeters:
            case SV_TimeAliveTravelledMetersFuel:
                return (float)((double)hexdec(substr($this->mHex, 34, 8)) / (double)10);
            default:
                return (float)((double)hexdec(substr($this->mHex, 32, 8)) / (double)10);
        }
    }

    function CanGetCounterTripMeters()
    {
        return strpos($this->mValidSwitchData, VSM_CounterTripMeters) === false ? false : true;
    }

    function GetCounterTripMeters()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PositionTripMeters:
            case SV_KeepAliveTripMeters:
            case SV_TimeAliveTripMeters:
            case SV_InaccuratePositionTripMeters:
                return (float)((double)hexdec(substr($this->mHex, 34, 8)) / (double)10);
            default:
                return (float)((double)hexdec(substr($this->mHex, 56, 6)) / (double)10);
        }
    }

    function GetCounterPulsesInput1()
    {
        return hexdec(substr($this->mHex, 40, 8));
    }

    function GetCounterInput3Active()
    {
        return hexdec(substr($this->mHex, 48, 8));
    }

    function CanGetAnalogInputs()
    {
        return strpos($this->mValidSwitchData, VSM_AnalogInputs) === false ? false : true;
    }

    function GetAnalogInput1()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PositionAnalogInputs:
            case SV_KeepAliveAnalogInputs:
            case SV_TimeAliveAnalogInputs:
            case SV_InaccuratePositionAnalogInputs:
                if ($this->GetRev() < 8) return (float)((float)(hexdec(substr($this->mHex, 40, 2)) << 8) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 34, 2)) * 7680) / (float)65536);
            default:
                if ($this->GetRev() < 8) return (float)((float)hexdec(substr($this->mHex, 22, 4)) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 8, 4)) * 30) / (float)65536);
        }
    }

    function GetAnalogInput2()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PositionAnalogInputs:
            case SV_KeepAliveAnalogInputs:
            case SV_TimeAliveAnalogInputs:
            case SV_InaccuratePositionAnalogInputs:
                if ($this->GetRev() < 8) return (float)((float)(hexdec(substr($this->mHex, 38, 2)) << 8) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 36, 2)) * 7680) / (float)65536);
            default:
                if ($this->GetRev() < 8) return (float)((float)hexdec(substr($this->mHex, 18, 4)) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 12, 4)) * 30) / (float)65536);
        }
    }

    function GetAnalogInput3()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PositionAnalogInputs:
            case SV_KeepAliveAnalogInputs:
            case SV_TimeAliveAnalogInputs:
            case SV_InaccuratePositionAnalogInputs:
                if ($this->GetRev() < 8) return (float)((float)(hexdec(substr($this->mHex, 36, 2)) << 8) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 38, 2)) * 7680) / (float)65536);
            default:
                if ($this->GetRev() < 8) return (float)((float)hexdec(substr($this->mHex, 12, 4)) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 18, 4)) * 30) / (float)65536);
        }
    }

    function GetAnalogInput4()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PositionAnalogInputs:
            case SV_KeepAliveAnalogInputs:
            case SV_TimeAliveAnalogInputs:
            case SV_InaccuratePositionAnalogInputs:
                if ($this->GetRev() < 8) return (float)((float)(hexdec(substr($this->mHex, 34, 2)) << 8) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 40, 2)) * 7680) / (float)65536);
            default:
                if ($this->GetRev() < 8) return (float)((float)hexdec(substr($this->mHex, 8, 4)) / (float)25600); else return (float)((float)(hexdec(substr($this->mHex, 22, 4)) * 30) / (float)65536);
        }
    }

    function CanGetAnalogInput5()
    {
        return $this->mCurrentSwitch == SV_CountersAnalogInputs ? true : false;
    }

    function GetAnalogInput5()
    {
        return (float)((float)(hexdec(substr($this->mHex, 36, 4)) * 30) / (float)65536);
    }

    function CanGetExtraDataSize()
    {
        return strpos($this->mValidSwitchData, VSM_ExtraDataSize) === false ? false : true;
    }

    function GetExtraDataSize()
    {
        return hexdec(substr($this->mHex, 8, 8)) & 0x3FFFFFFF;
    }

    function CanGetPhotoPort()
    {
        return strpos($this->mValidSwitchData, VSM_PhotoPort) === false ? false : true;
    }

    function GetPhotoPort()
    {
        $p = hexdec(substr($this->mHex, 8, 1)) >> 2;
        if (!$p) return 4;
        return $p;
    }

    function CanGetPhotoLogDataSize()
    {
        return strpos($this->mValidSwitchData, VSM_PhotoLogDataSize) === false ? false : true;
    }

    function GetPhotoLogDataSize()
    {
        return hexdec(substr($this->mHex, 8, 8)) & 0x3FFFFFFF;
    }

    function CanGetPhotoLogDataBytes()
    {
        return strpos($this->mValidSwitchData, VSM_PhotoLogDataBytes) === false ? false : true;
    }

    function GetPhotoLogDataBytes()
    {
        $Data = '';
        for ($i = 10; $i < 62; $i += 2) if ($i != 16) $Data .= chr(hexdec(substr($this->mHex, $i, 2)));
        return $Data;
    }

    function CanGetPhotoGpsTimeDifference()
    {
        return strpos($this->mValidSwitchData, VSM_PhotoGpsTimeDiff) === false ? false : true;
    }

    function GetPhotoGpsTimeDifference()
    {
        $GpsTime = hexdec(substr($this->mHex, 18, 6));
        if ($GpsTime == 0x800000) return 0x800000;
        $PhotoTime = hexdec(substr($this->mHex, 2, 6));
        if ($GpsTime & 0x800000) {
            if (!($PhotoTime & 0x800000)) $PhotoTime += 0x01000000;
        } else if ($PhotoTime & 0x800000) $PhotoTime -= 0x01000000;
        return (float)($GpsTime - $PhotoTime) * (float)0.16;
    }

    function CanGetLogDataType()
    {
        return strpos($this->mValidSwitchData, VSM_LogDataType) === false ? false : true;
    }

    function GetLogDataType()
    {
        return hexdec(substr($this->mHex, 8, 2));
    }

    function CanGetLogDataSize()
    {
        return strpos($this->mValidSwitchData, VSM_LogDataSize) === false ? false : true;
    }

    function GetLogDataSize()
    {
        return hexdec(substr($this->mHex, 10, 6));
    }

    function CanGetLogDataBytes()
    {
        return strpos($this->mValidSwitchData, VSM_LogDataBytes) === false ? false : true;
    }

    function GetLogDataBytes()
    {
        $Data = '';
        for ($i = 10; $i < 62; $i += 2) if ($i != 16) $Data .= chr(hexdec(substr($this->mHex, $i, 2)));
        return $Data;
    }

    function CanGetLogDataGpsTimeDifference()
    {
        return strpos($this->mValidSwitchData, VSM_LogDataGpsTimeDiff) === false ? false : true;
    }

    function GetLogDataGpsTimeDifference()
    {
        $GpsTime = hexdec(substr($this->mHex, 18, 6));
        if ($GpsTime == 0x800000) return 0x800000;
        $LogTime = hexdec(substr($this->mHex, 2, 6));
        if ($GpsTime & 0x800000) {
            if (!($LogTime & 0x800000)) $LogTime += 0x01000000;
        } else if ($LogTime & 0x800000) $LogTime -= 0x01000000;
        return (float)($GpsTime - $LogTime) * (float)0.16;
    }

    function CanGetPortData()
    {
        return strpos($this->mValidSwitchData, VSM_PortData) === false ? false : true;
    }

    function GetPortDataSize()
    {
        return hexdec(substr($this->mHex, 18, 2)) & 31;
    }

    function GetPortDataBytes()
    {
        $Data = '';
        $Bytes = $this->GetPortDataSize();
        $Max = strlen($this->mHex) - 1;
        $Offset = $this->CanGetIndex() ? 10 : 8;
        for ($Byte = 0; $Byte < $Bytes; $Offset += 2) {
            if ($Offset == 16) continue;
            if ($Offset == 18) continue;
            if ($Offset >= $Max) break;
            $Data .= chr(hexdec(substr($this->mHex, $Offset, 2)));
            $Byte++;
        }
        return $Data;
    }

    function CanGetIButton()
    {
        if (($this->mCurrentSwitch == SV_iButton) || ($this->mCurrentSwitch == SV_1WireDetached)) return true;
        return false;
    }

    function GetIButtonAttached()
    {
        if ($this->mCurrentSwitch == SV_1WireDetached) return false;
        return hexdec(substr($this->mHex, 18, 2)) & 31 ? true : false;
    }

    function CanGetIButtonSerialNumber()
    {
        if (($this->mCurrentSwitch == SV_1WireDetached) || ($this->mCurrentSwitch == SV_1WireData1)) return true;
        return ((strpos($this->mValidSwitchData, VSM_iButton) !== false) && ($this->Get1WireDataLength() >= 7)) ? true : false;
    }

    function GetIButtonSerialNumberBinary()
    {
        $Bin = $this->Get1WireDataBytes();
        if ($this->Get1WireDataLength() > 8) $Bin = substr($Bin, 0, 8);
        return $Bin;
    }

    function GetIButtonSerialNumberText()
    {
        return strtoupper(bin2hex($this->GetIButtonSerialNumberBinary()));
    }

    function GetIButtonSerialNumberTextSwapped()
    {
        return ByteSwap1WireSerialNumber($this->GetIButtonSerialNumberText());
    }

    function CanGet1WireData()
    {
        return strpos($this->mValidSwitchData, VSM_1WireData) === false ? false : true;
    }

    function Get1WireDataPart()
    {
        return $this->mCurrentSwitch - SV_1WireData1 + 1;
    }

    function Get1WireDataClosure()
    {
        return ((hexdec(substr($this->mHex, 18, 2)) & 31) < 25) ? true : false;
    }

    function Get1WireDataLength()
    {
        return hexdec(substr($this->mHex, 18, 2)) & 31;
    }

    function Get1WireDataBytes()
    {
        $Data = '';
        $Bytes = $this->Get1WireDataLength();
        $Max = strlen($this->mHex) - 1;
        for ($Byte = 0, $Offset = 8; $Byte < $Bytes; $Offset += 2) {
            if ($Offset == 16) continue;
            if ($Offset == 18) continue;
            if ($Offset >= $Max) break;
            $Data .= chr(hexdec(substr($this->mHex, $Offset, 2)));
            $Byte++;
        }
        return $Data;
    }

    function CanGet1WireDS18B20temperature()
    {
        if (($this->mCurrentSwitch == SV_1WireData1) && ($this->Get1WireDataLength() == 10)) switch (hexdec(substr($this->mHex, 8, 2))) {
            case 0x28:
            case 0x10:
            case 0x22:
                return true;
        }
        return false;
    }

    function Get1WireDS18B20celcius()
    {
        $Temp = (hexdec(substr($this->mHex, 30, 2)) << 8) | hexdec(substr($this->mHex, 28, 2));
        if (hexdec(substr($this->mHex, 8, 2)) == 0x10) $Temp = ($Temp << 3) & 0xFFFF;
        if ($Temp & 0x8000) $Temp -= 0x10000;
        return (float)$Temp / (float)16;
    }

    function Get1WireDS18B20fahrenheit()
    {
        return (float)(((float)9 / (float)5) * (float)$this->Get1WireDS18B20celcius() + (float)32);
    }

    function CanGetLcdData()
    {
        return strpos($this->mValidSwitchData, VSM_LcdData) === false ? false : true;
    }

    function GetLcdDataPart()
    {
        return $this->mCurrentSwitch - SV_LcdData1 + 1;
    }

    function GetLcdDataClosure()
    {
        return ((hexdec(substr($this->mHex, 18, 2)) & 31) < 25) ? true : false;
    }

    function GetLcdDataLength()
    {
        return hexdec(substr($this->mHex, 18, 2)) & 31;
    }

    function GetLcdDataBytes()
    {
        $Data = '';
        $Bytes = $this->GetLcdDataLength();
        $Max = strlen($this->mHex) - 1;
        for ($Byte = 0, $Offset = 8; $Byte < $Bytes; $Offset += 2) {
            if ($Offset == 16) continue;
            if ($Offset == 18) continue;
            if ($Offset >= $Max) break;
            $Data .= chr(hexdec(substr($this->mHex, $Offset, 2)));
            $Byte++;
        }
        return $Data;
    }

    function CanGetCustomPositionData()
    {
        return strpos($this->mValidSwitchData, VSM_CustomPositionData) === false ? false : true;
    }

    function GetCustomPositionData()
    {
        return hexdec(substr($this->mHex, 34, 8));
    }

    function CanGetAccelerationX()
    {
        return strpos($this->mValidSwitchData, VSM_AccelerationX) === false ? false : true;
    }

    function GetAccelerationX()
    {
        $Accel = (hexdec(substr($this->mHex, 34, 2)) << 3) | (hexdec(substr($this->mHex, 40, 2)) >> 5);
        if ($Accel & 0x400) $Accel -= 0x800;
        return (float)(((double)6 / (double)0x400) * (double)$Accel);
    }

    function CanGetAccelerationY()
    {
        return strpos($this->mValidSwitchData, VSM_AccelerationY) === false ? false : true;
    }

    function GetAccelerationY()
    {
        $Accel = (hexdec(substr($this->mHex, 36, 2)) << 3) | ((hexdec(substr($this->mHex, 40, 2)) >> 2) & 7);
        if ($Accel & 0x400) $Accel -= 0x800;
        return (float)(((double)6 / (double)0x400) * (double)$Accel);
    }

    function CanGetAccelerationZ()
    {
        return strpos($this->mValidSwitchData, VSM_AccelerationZ) === false ? false : true;
    }

    function GetAccelerationZ()
    {
        $Accel = (hexdec(substr($this->mHex, 38, 2)) << 2) | (hexdec(substr($this->mHex, 40, 2)) & 3);
        if ($Accel & 0x200) $Accel -= 0x400;
        return (float)(((double)6 / (double)0x200) * (double)$Accel);
    }

    function GetGpsTime()
    {
        return (((float)hexdec(substr($this->mHex, 0, 8)) * 16.0) / 100.0) + 946684800.0;
    }

    function GetGpsTimeMySQL()
    {
        return gmdate('YmdHis', $this->GetGpsTime());
    }

    function CanGetLatLong()
    {
        return strpos($this->mValidSwitchData, VSM_LatLong) === false ? false : true;
    }

    function CanGetLatLongInaccurate()
    {
        return strpos($this->mValidSwitchData, VSM_LatLongInaccurate) === false ? false : true;
    }

    function GetLatitudeSmall()
    {
        switch ($this->mCurrentSwitch) {
            case SV_KeepAlive:
            case SV_TimeAlive:
            case SV_KeepAliveTripMeters:
            case SV_TimeAliveTripMeters:
            case SV_KeepAliveTravelledMeters:
            case SV_TimeAliveTravelledMeters:
            case SV_KeepAliveAcceleration:
            case SV_TimeAliveAcceleration:
            case SV_KeepAliveAnalogInputs:
            case SV_TimeAliveAnalogInputs:
            case SV_KeepAliveCustom:
            case SV_TimeAliveCustom:
            case SV_KeepAliveTravelledMetersFuel:
            case SV_TimeAliveTravelledMetersFuel:
            case SV_CountersHighestSpeed:
                return hexdec(substr($this->mHex, 48, 2) . substr($this->mHex, 18, 6));
            case SV_PhotoGps:
            case SV_PhotoGpsLog:
            case SV_LogDataHeader:
                return hexdec(substr($this->mHex, 28, 8));
            default:
                return hexdec(substr($this->mHex, 16, 8));
        }
    }

    function GetLatitudeFloat()
    {
        return LatitudeSmallToFloat($this->GetLatitudeSmall());
    }

    function GetLatitudeDegrees(&$rDegrees, &$rMinutes, &$rSeconds, &$rNS, &$rfDecimals)
    {
        LatitudeSmallToDegrees($this->GetLatitudeSmall(), $rDegrees, $rMinutes, $rSeconds, $rNS, $rfDecimals);
    }

    function GetLongitudeSmall()
    {
        switch ($this->mCurrentSwitch) {
            case SV_PhotoGps:
            case SV_PhotoGpsLog:
            case SV_LogDataHeader:
                return hexdec(substr($this->mHex, 36, 8));
            default:
                return hexdec(substr($this->mHex, 8, 8));
        }
    }

    function GetLongitudeFloat()
    {
        return LongitudeSmallToFloat($this->GetLongitudeSmall());
    }

    function GetLongitudeDegrees(&$rDegrees, &$rMinutes, &$rSeconds, &$rEW, &$rfDecimals)
    {
        LongitudeSmallToDegrees($this->GetLongitudeSmall(), $rDegrees, $rMinutes, $rSeconds, $rEW, $rfDecimals);
    }

    function CanGetLatLongMargin()
    {
        return strpos($this->mValidSwitchData, VSM_LatLongMargin) === false ? false : true;
    }

    function GetLatLongMargin()
    {
        return hexdec(substr($this->mHex, 44, 2));
    }

    function GetLatLongMarginInMeters()
    {
        return (pow(floatval(1.1), $this->GetLatLongMargin()) - 1.0) * 10.0;
    }

    function GetLatLongMarginInFeet()
    {
        return floatval($this->GetLatLongMarginInMeters() * 3.2808399166666664);
    }

    function CanGetAltitude()
    {
        return strpos($this->mValidSwitchData, VSM_Altitude) === false ? false : true;
    }

    function GetAltitudeInMeters()
    {
        return hexdec(substr($this->mHex, 32, 4));
    }

    function GetAltitudeInFeet()
    {
        return $this->GetAltitudeInMeters() * 3.2808399166666664;
    }

    function CanGetAltitudeMargin()
    {
        return strpos($this->mValidSwitchData, VSM_AltitudeMargin) === false ? false : true;
    }

    function GetAltitudeMargin()
    {
        return hexdec(substr($this->mHex, 54, 2));
    }

    function GetAltitudeMarginInMeters()
    {
        return floatval(pow(floatval(1.1), $this->GetAltitudeMargin()) - 1.0) * 10.0;
    }

    function GetAltitudeMarginInFeet()
    {
        return floatval($this->GetAltitudeMarginInMeters() * 3.2808399166666664);
    }

    function CanGetSpeed()
    {
        return strpos($this->mValidSwitchData, VSM_Speed) === false ? false : true;
    }

    function GetSpeedKPH()
    {
        if ((hexdec(substr($this->mHex, 64, 2)) & 0x23) >= 2) {
            $Bits = hexdec(substr($this->mHex, 63, 1));
            return floatval((hexdec(substr($this->mHex, 24, 2)) << 1) | ($Bits & 1) | (($Bits & 2) << 8)) * 1.852 * 32.0 / 100.0;
        } else return floatval(hexdec(substr($this->mHex, 24, 2))) * 1.852 * 64.0 / 100.0;
    }

    function GetSpeedMPH()
    {
        return $this->GetSpeedKPH() * 0.6213722;
    }

    function GetSpeedKnots()
    {
        return $this->GetSpeedKPH() / 1.852;
    }

    function CanGetHeading()
    {
        return strpos($this->mValidSwitchData, VSM_Heading) === false ? false : true;
    }

    function GetHeading()
    {
        return floatval(hexdec(substr($this->mHex, 26, 2))) * 2.56;
    }

    function CanGetHDOP()
    {
        return strpos($this->mValidSwitchData, VSM_HDOP) === false ? false : true;
    }

    function GetHDOP()
    {
        return (float)hexdec(substr($this->mHex, 50, 2)) / 10.0;
    }

    function CanGetView()
    {
        return strpos($this->mValidSwitchData, VSM_View) === false ? false : true;
    }

    function GetView()
    {
        return hexdec(substr($this->mHex, 60, 1));
    }

    function CanGetFix()
    {
        return strpos($this->mValidSwitchData, VSM_Fix) === false ? false : true;
    }

    function GetFix()
    {
        return hexdec(substr($this->mHex, 61, 1));
    }

    function CanGetMaxDB()
    {
        return strpos($this->mValidSwitchData, VSM_MaxDB) === false ? false : true;
    }

    function GetMaxDB()
    {
        return hexdec(substr($this->mHex, 52, 2));
    }

    function CanGetGpsHighestMaxDB()
    {
        return strpos($this->mValidSwitchData, VSM_GpsHighestMaxDB) === false ? false : true;
    }

    function GetGpsHighestMaxDB()
    {
        return hexdec(substr($this->mHex, 18, 2));
    }

    function CanGetGpsStatus()
    {
        return strpos($this->mValidSwitchData, VSM_GpsStatus) === false ? false : true;
    }

    function GetGpsStatus()
    {
        $GpsStatus = hexdec(substr($this->mHex, 46, 2));
        $GpsStatus &= ($this->GetRev() < 8) ? 33 : 1;
        if ((hexdec(substr($this->mHex, 64, 2)) & 0x23) >= 2) {
            $Bits = hexdec(substr($this->mHex, 63, 1));
            if ((hexdec(substr($this->mHex, 24, 2)) == 0xFF) && ($Bits & 1) && ($Bits & 2)) $GpsStatus |= 33;
        } else if (hexdec(substr($this->mHex, 24, 2)) == 0xFF) $GpsStatus |= 33;
        if (!(hexdec(substr($this->mHex, 48, 2) . substr($this->mHex, 18, 6))) && !hexdec(substr($this->mHex, 8, 8))) $GpsStatus |= 33;
        if ((hexdec(substr($this->mHex, 32, 2)) < 0xE0) && (hexdec(substr($this->mHex, 32, 4)) >= 49999)) $GpsStatus |= 33;
        return $GpsStatus;
    }

    function CanGetGpsFirmwareCrc()
    {
        return strpos($this->mValidSwitchData, VSM_GpsFirmwareCRC) === false ? false : true;
    }

    function GetGpsFirmwareCrc()
    {
        return hexdec(substr($this->mHex, 18, 4));
    }

    function CanGetGsmFirmwareCrc()
    {
        return strpos($this->mValidSwitchData, VSM_GsmFirmwareCrc) === false ? false : true;
    }

    function GetGsmFirmwareCrc()
    {
        return hexdec(substr($this->mHex, 60, 2));
    }

    function CanGetGsmCGACT()
    {
        return strpos($this->mValidSwitchData, VSM_CGACT) === false ? false : true;
    }

    function GetGsmCGACT()
    {
        return hexdec(substr($this->mHex, 10, 2));
    }

    function CanGetGsmCGATT()
    {
        return strpos($this->mValidSwitchData, VSM_CGATT) === false ? false : true;
    }

    function GetGsmCGATT()
    {
        return hexdec(substr($this->mHex, 8, 2));
    }

    function CanGetGsmCREG()
    {
        return strpos($this->mValidSwitchData, VSM_CREG) === false ? false : true;
    }

    function GetGsmCREG()
    {
        return hexdec(substr($this->mHex, 26, 2));
    }

    function CanGetFstr()
    {
        return strpos($this->mValidSwitchData, VSM_Fstr) === false ? false : true;
    }

    function GetFstr()
    {
        return hexdec(substr($this->mHex, 24, 2));
    }

    function CanGetIMSI()
    {
        return strpos($this->mValidSwitchData, VSM_IMSI) === false ? false : true;
    }

    function GetIMSI()
    {
        $IMSI = substr($this->mHex, 32, 15);
        $Len = strspn($IMSI, '0123456789');
        if ($Len < 15) $IMSI = substr($IMSI, 0, $Len);
        return $IMSI;
    }

    function CanGetGsmNetworkID()
    {
        return strpos($this->mValidSwitchData, VSM_GsmNetworkID) === false ? false : true;
    }

    function GetGsmNetworkID()
    {
        switch ($this->mCurrentSwitch) {
            case SV_GsmCellScan:
            case SV_GsmCellScanStrip:
                return ((hexdec(substr($this->mHex, 58, 2)) & 64) << 10) | hexdec(substr($this->mHex, 8, 4));
            default:
                return hexdec(substr($this->mHex, 18, 6));
        }
    }

    function CanGetSimPin()
    {
        return strpos($this->mValidSwitchData, VSM_SimPin) === false ? false : true;
    }

    function GetSimPin()
    {
        return (($this->GetRev() >= 8) && ($this->GetVersion() >= 172)) ? sprintf('%04X', hexdec(substr($this->mHex, 48, 4))) : 'FFFF';
    }

    function CanGetPhoneNumber()
    {
        return strpos($this->mValidSwitchData, VSM_PhoneNumber) === false ? false : true;
    }

    function GetPhoneNumber()
    {
        $PhoneNumber = '';
        for ($DigitOffset = 32; $DigitOffset < 58; $DigitOffset++) {
            $Digit = hexdec(substr($this->mHex, $DigitOffset, 1));
            if ($Digit == 0xF) break;
            if ($Digit <= 9) {
                $PhoneNumber .= sprintf('%d', $Digit);
                continue;
            }
            if (($Digit == 0xB) && !strlen($PhoneNumber)) {
                $PhoneNumber = '+';
                continue;
            }
        }
        return $PhoneNumber;
    }

    function GetMapquestUrl()
    {
        $Lat = str_replace(',', '.', sprintf('%.5f', $this->GetLatitudeFloat()));
        $Lon = str_replace(',', '.', sprintf('%.5f', $this->GetLongitudeFloat()));
        return 'http://www.mapquest.com/maps/map.adp?latlongtype=decimal&latitude=' . $Lat . '&longitude=' . $Lon;
    }

    function GetMultimapUrl()
    {
        $Lat = str_replace(',', '.', sprintf('%.5f', $this->GetLatitudeFloat()));
        $Lon = str_replace(',', '.', sprintf('%.5f', $this->GetLongitudeFloat()));
        return 'http://www.multimap.com/map/browse.cgi?lat=' . $Lat . '&lon=' . $Lon . '&scale=25000&icon=x';
    }

    function GetGoogleMapsUrl()
    {
        $Lat = str_replace(',', '.', sprintf('%.5f', $this->GetLatitudeFloat()));
        $Lon = str_replace(',', '.', sprintf('%.5f', $this->GetLongitudeFloat()));
        return 'http://maps.google.com/maps?q=' . $Lat . ',' . $Lon . '&t=h';
    }

    function GetLiveMapsUrl()
    {
        $Lat = str_replace(',', '.', sprintf('%.5f', $this->GetLatitudeFloat()));
        $Lon = str_replace(',', '.', sprintf('%.5f', $this->GetLongitudeFloat()));
        return 'http://maps.live.com/default.aspx?v=2&cp=' . $Lat . '~' . $Lon . '&lvl=16&style=h&rtp=pos.' . $Lat . '_' . $Lon . '~';
    }

    function GetNMEA_RMC()
    {
        $TimeStamp = $this->GetUtcTime();
        $NMEA = '$GPRMC,' . gmdate('His', $TimeStamp) . '.' . substr(($TimeStamp - (int)($TimeStamp)) . '00000', 2, 3);
        $ll = $this->CanGetLatLong();
        if ($ll || $this->CanGetLatLongInaccurate()) {
            if ($ll) $NMEA .= ',A,'; else $NMEA .= ',V,';
            $this->GetLatitudeDegrees($Degrees, $Minutes, $Seconds, $Letter, $Decimals);
            $NMEA .= sprintf('%02d%02d.%04d,%s,', $Degrees, $Minutes, (int)($Decimals * 10000), $Letter);
            $this->GetLongitudeDegrees($Degrees, $Minutes, $Seconds, $Letter, $Decimals);
            $NMEA .= sprintf('%03d%02d.%04d,%s,', $Degrees, $Minutes, (int)($Decimals * 10000), $Letter);
        } else $NMEA .= ',V,,,,,';
        if ($this->CanGetSpeed()) {
            $fFloat = $this->GetSpeedKnots();
            $NMEA .= sprintf('%d.%02d,', (int)$fFloat, (int)(($fFloat - (int)$fFloat) * 100));
        } else $NMEA .= ',';
        if ($this->CanGetHeading()) {
            $fFloat = $this->GetHeading();
            $NMEA .= sprintf('%d.%02d,', (int)$fFloat, (int)(($fFloat - (int)$fFloat) * 100));
        } else $NMEA .= ',';
        $NMEA .= gmdate('dmy', $TimeStamp);
        $NMEA .= ',,,';
        if ($ll) $NMEA .= 'A'; else $NMEA .= 'E';
        for ($CRC = 0, $Char = 1; $Char < strlen($NMEA); $Char++) $CRC ^= ord($NMEA[$Char]);
        $NMEA .= sprintf('*%02X', $CRC);
        return $NMEA;
    }

    function GetNMEA_GGA()
    {
        $TimeStamp = $this->GetUtcTime();
        $NMEA = '$GPGGA,' . gmdate('His', $TimeStamp) . '.' . substr(($TimeStamp - (int)$TimeStamp) . '00000', 2, 2) . ',';
        $ll = $this->CanGetLatLong();
        if ($ll || $this->CanGetLatLongInaccurate()) {
            $this->GetLatitudeDegrees($Degrees, $Minutes, $Seconds, $Letter, $Decimals);
            $NMEA .= sprintf('%02d%02d.%04d,%s,', $Degrees, $Minutes, (int)($Decimals * 10000), $Letter);
            $this->GetLongitudeDegrees($Degrees, $Minutes, $Seconds, $Letter, $Decimals);
            $NMEA .= sprintf('%03d%02d.%04d,%s,', $Degrees, $Minutes, (int)($Decimals * 10000), $Letter);
            if ($ll) $NMEA .= '1,'; else $NMEA .= '0,';
        } else $NMEA .= ',,,,0,';
        if ($this->CanGetFix()) $NMEA .= sprintf('%02d,', (int)$this->GetFix()); else $NMEA .= ',';
        if ($this->CanGetHDOP()) {
            $fHDOP = (float)$this->GetHDOP();
            $NMEA .= sprintf('%d.%d,', (int)$fHDOP, (int)(($fHDOP - (int)$fHDOP) * 10.0));
        } else $NMEA .= ',';
        if ($this->CanGetAltitude()) {
            $fAltitude = (float)$this->GetAltitudeInMeters();
            $NMEA .= sprintf('%d.%d,M,0.0,M,', (int)$fAltitude, (int)(($fAltitude - (int)$fAltitude) * 10.0));
        } else $NMEA .= ',,,,';
        $NMEA .= ',';
        for ($CRC = 0, $Char = 1; $Char < strlen($NMEA); $Char++) $CRC ^= ord($NMEA[$Char]);
        $NMEA .= sprintf('*%02X', $CRC);
        return $NMEA;
    }

    function GetNMEA_VTG()
    {
        $NMEA = '$GPVTG,';
        if ($this->CanGetHeading()) {
            $fFloat = $this->GetHeading() + .05;
            $NMEA .= sprintf('%d.%d,T,', (int)$fFloat, (int)(($fFloat - (int)$fFloat) * 10.0));
        } else $NMEA .= ',,';
        $NMEA .= ',,';
        if ($this->CanGetSpeed()) {
            $fFloat = $this->GetSpeedKnots() + .05;
            $NMEA .= sprintf('%03d.%d,N,', (int)$fFloat, (int)(($fFloat - (int)$fFloat) * 10.0));
            $fFloat = $this->GetSpeedKPH() + .05;
            $NMEA .= sprintf('%03d.%d,K,', (int)$fFloat, (int)(($fFloat - (int)$fFloat) * 10.0));
        } else $NMEA .= ',,,,';
        $NMEA .= $this->CanGetLatLong() ? 'A' : 'N';
        for ($CRC = 0, $Char = 1; $Char < strlen($NMEA); $Char++) $CRC ^= ord($NMEA[$Char]);
        $NMEA .= sprintf('*%02X', $CRC);
        return $NMEA;
    }

    function ClearResponseActionMembers()
    {
        $this->mSettings = $this->mFirmware = $this->mFirmwareManufacturer = $this->mSerialPort1 = $this->mSerialPort2 = $this->mSerialPort3 = $this->mSerialPort4 = '';
        $this->mGpsLog = $this->mCountersLog = $this->mTransmitLog = $this->mClearLog = $this->mClearGPSConfig = $this->mSyncTime = $this->mRebootModule = false;
        $this->mSmsAlert1 = $this->mSmsAlert2 = $this->mSmsAlert3 = false;
        $this->mSmsAlertCalledBy1 = $this->mSmsAlertCalledBy2 = $this->mSmsAlertCalledBy3 = $this->mActionID = false;
        $this->mResetTimer1 = $this->mResetTimer2 = $this->mResetTimer3 = $this->mResetTimer4 = false;
        $this->mResetTimer5 = $this->mResetTimer6 = $this->mResetTimer7 = $this->mResetTimer8 = $this->mOmitIdentification = $this->mAcknowledgeCRC = false;
        $this->mPhoto = RACD_Photo_No;
        $this->mDigitalOutput1 = $this->mDigitalOutput2 = $this->mDigitalOutput3 = $this->mDigitalOutput4 = RACD_DigitalOutput_NoChange;
        $this->mSourceCode = $this->mReserved = '';
    }

    function RequireResponseActionMembersStall()
    {
        if (strlen($this->mSettings) || ((int)$this->mFirmware > 0) || ((int)$this->mFirmwareManufacturer > 0) || $this->mRebootModule || ($this->mActionID == 64) || (strpos($this->mSourceCode, '+CLIMS') !== false) || strlen($this->mReserved)) return true;
        return false;
    }

    function BuildResponseHTTP($NumberOfDataPartsToAcknowledge)
    {
        $Response = '';
        $Init = "\r\n";
        $Delay = "\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n";
        if ($this->mSyncTime) {
            $Response .= (strlen($Response) ? $Delay : $Init) . sprintf('+CLITM%08X', (int)((((float)time() + 15 - (float)946684800.0) * (float)100) / (float)16));
        }
        if (strlen($this->mSerialPort1)) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= '+CLISER1' . bin2hex($this->mSerialPort1);
        }
        if (strlen($this->mSerialPort2)) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= '+CLISER2' . bin2hex($this->mSerialPort2);
        }
        if (strlen($this->mSerialPort3)) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= '+CLISER3' . bin2hex($this->mSerialPort3);
        }
        if (strlen($this->mSerialPort4)) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= '+CLISER4' . bin2hex($this->mSerialPort4);
        }
        if (strlen($this->mSourceCode)) {
            $aLines = explode("\n", str_replace("\r", "\n", str_replace("\r\n", "\r", $this->mSourceCode)));
            $Count = count($aLines);
            if ($Count) {
                $Response .= strlen($Response) ? $Delay : $Init;
                for ($i = 0; $i < $Count; $i++) {
                    $Start = strpos($aLines[$i], '+CLI');
                    if ($Start !== false) $Response .= substr($aLines[$i], $Start) . "\r\n";
                }
            }
        }
        $Byte0 = $Byte1 = $Byte2 = $Byte3 = 0;
        $Byte0 |= ($this->mDigitalOutput1 & 3) << 6;
        $Byte0 |= ($this->mDigitalOutput2 & 3) << 4;
        $Byte0 |= ($this->mDigitalOutput3 & 3) << 2;
        $Byte0 |= $this->mDigitalOutput4 & 3;
        if ($this->mGpsLog === true) $Byte1 |= 128;
        if ($this->mTransmitLog === true) $Byte1 |= 16;
        if ($this->mResetTimer1 === true) $Byte1 |= 8;
        if ($this->mResetTimer2 === true) $Byte1 |= 4;
        $Byte1 |= $this->mPhoto & 3;
        if ($this->mClearGPSConfig === true) $Byte2 |= 128;
        if ($this->mResetTimer8 === true) $Byte2 |= 32;
        if ($this->mResetTimer7 === true) $Byte2 |= 16;
        if ($this->mResetTimer6 === true) $Byte2 |= 8;
        if ($this->mResetTimer5 === true) $Byte2 |= 4;
        if ($this->mResetTimer4 === true) $Byte2 |= 2;
        if ($this->mResetTimer3 === true) $Byte2 |= 1;
        if ($this->mActionID > 0) {
            if ($this->mActionID & 64) $Byte1 &= ~64; else $Byte1 |= 64;
            if ($this->mActionID >= 64) $Byte2 |= 64; else $Byte2 &= ~64;
            $Byte3 |= ($this->mActionID & 63) << 2;
        } else {
            if ($this->mSmsAlertCalledBy3 === true) $Byte3 |= 128;
            if ($this->mSmsAlertCalledBy2 === true) $Byte3 |= 64;
            if ($this->mSmsAlertCalledBy1 === true) $Byte3 |= 32;
            if ($this->mSmsAlert3 === true) $Byte3 |= 16;
            if ($this->mSmsAlert2 === true) $Byte3 |= 8;
            if ($this->mSmsAlert1 === true) $Byte3 |= 4;
            if (($this->mRebootModule === true) && !$Byte3) $Byte2 |= 64;
        }
        if ($this->mCountersLog === true) $Byte3 |= 2;
        if ($this->mClearLog === true) $Byte3 |= 1;
        if ($Byte3 | $Byte2 | $Byte1 | $Byte0) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= sprintf("+CLIACT%02X%02X%02X%02X", $Byte3, $Byte2, $Byte1, $Byte0);
        }
        if (strlen($this->mReserved)) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= $this->mReserved;
        }
        if ($NumberOfDataPartsToAcknowledge && $this->mWantAck) {
            $Count = $this->GetDataPartCount();
            if ($Count == $NumberOfDataPartsToAcknowledge) {
                $Response .= strlen($Response) ? $Delay : $Init;
                switch ($this->mCurrentSwitch) {
                    case SV_Photo:
                    case SV_PhotoGps:
                        $Response .= "*A#F";
                        break;
                    default:
                        $Response .= ($this->mOmitIdentification === true) ? "*A#I" : "*A#G";
                        if ($this->mAcknowledgeCRC) $Response .= sprintf('%04X', $this->mCRC);
                        break;
                }
                $Rev = $this->CanGetRev() ? $this->GetRev() : 0;
                $Version = $this->CanGetVersion() ? $this->GetVersion() : 0;
                if (($Rev < 8) || (($Rev <= 9) && ($Version < 415))) $Response .= "\r\nOK";
            }
        }
        if ($this->mSyncTime) {
            $Response .= (strlen($Response) ? $Delay : $Init) . sprintf('+CLITM%08X', (int)((((float)time() + 16 - (float)946684800.0) * (float)100) / (float)16));
        }
        if (strlen($this->mSettings)) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= "+CLISET\r\nAAAA9B" . $this->mSettings;
        }
        if ((int)$this->mFirmwareManufacturer > 0) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= "*A#G" . (int)$this->mFirmwareManufacturer . "$\r\nOK";
        } else if ((int)$this->mFirmware > 0) {
            $Response .= strlen($Response) ? $Delay : $Init;
            $Response .= "*A#G" . (int)$this->mFirmware . "#\r\nOK";
        }
        return $Response . "\r\n";
    }

    function BuildResponseTCP($NumberOfDataPartsToAcknowledge)
    {
        $Response = $this->BuildResponseHTTP($NumberOfDataPartsToAcknowledge);
        if ($Response == "\r\n") return '';
        return $Response;
    }

    function CanGetDigTach1Info()
    {
        return ($this->mCurrentSwitch == SV_DigTach1) ? true : false;
    }

    function GetDigTach1UtcTime()
    {
        return gmmktime(hexdec(substr($this->mHex, 12, 2)), hexdec(substr($this->mHex, 10, 2)), hexdec(substr($this->mHex, 8, 2)) / 4, hexdec(substr($this->mHex, 14, 2)), (int)((hexdec(substr($this->mHex, 18, 2)) + 3) / 4), hexdec(substr($this->mHex, 20, 2)) + 1985);
    }

    function GetDigTach1PositionTime()
    {
        return $this->GetDigTach1UtcTime() + ((hexdec(substr($this->mHex, 22, 2)) - 125) * 60) + ((hexdec(substr($this->mHex, 24, 2)) - 125) * 3600);
    }

    function GetDigTach1StatusChanges()
    {
        return hexdec(substr($this->mHex, 58, 2) . substr($this->mHex, 56, 2));
    }

    function GetDigTach1Workstates()
    {
        return hexdec(substr($this->mHex, 26, 2));
    }

    function GetDigTach1Driver1()
    {
        return hexdec(substr($this->mHex, 28, 2));
    }

    function GetDigTach1Driver2()
    {
        return hexdec(substr($this->mHex, 30, 2));
    }

    function GetDigTach1SpeedKPH()
    {
        return hexdec(substr($this->mHex, 34, 2));
    }

    function GetDigTach1TravelledMeters()
    {
        return (float)((float)hexdec(substr($this->mHex, 42, 2) . substr($this->mHex, 40, 2) . substr($this->mHex, 38, 2) . substr($this->mHex, 36, 2)) / (float).2);
    }

    function GetDigTach1TripMeters()
    {
        return (float)((float)hexdec(substr($this->mHex, 50, 2) . substr($this->mHex, 48, 2) . substr($this->mHex, 46, 2) . substr($this->mHex, 44, 2)) / (float).2);
    }

    function GetDigTach1Info1()
    {
        return hexdec(substr($this->mHex, 52, 2));
    }

    function CanGetDigTachData()
    {
        switch ($this->mCurrentSwitch) {
            case SV_DigTachVIN:
            case SV_DigTachVRN:
            case SV_DigTachCARD1:
            case SV_DigTachCARD2:
                return true;
            default:
                return false;
        }
    }

    function GetDigTachDataSize()
    {
        return hexdec(substr($this->mHex, 18, 2)) & 31;
    }

    function GetDigTachDataBytes()
    {
        $Data = '';
        $Bytes = $this->GetDigTachDataSize();
        $Max = strlen($this->mHex) - 1;
        for ($Byte = 0, $Offset = 8; $Byte < $Bytes; $Offset += 2) {
            if ($Offset == 16) continue;
            if ($Offset == 18) continue;
            if ($Offset >= $Max) break;
            $Data .= chr(hexdec(substr($this->mHex, $Offset, 2)));
            $Byte++;
        }
        return $Data;
    }

    function CanGetFuel()
    {
        return strpos($this->mValidSwitchData, VSM_Fuel) === false ? false : true;
    }

    function GetFuel()
    {
        return hexdec(substr($this->mHex, 30, 2));
    }

    function CanGetUserCounter()
    {
        return strpos($this->mValidSwitchData, VSM_UserCounter) === false ? false : true;
    }

    function GetUserCounter($CounterNumber)
    {
        switch ($CounterNumber) {
            case -1:
                return hexdec(substr($this->mHex, 26, 2));
            case 0:
                return hexdec(substr($this->mHex, 8, 8));
            case 1:
                return hexdec(substr($this->mHex, 18, 8));
            case 2:
                return hexdec(substr($this->mHex, 32, 8));
            case 3:
                return hexdec(substr($this->mHex, 44, 8));
            case 4:
                return hexdec(substr($this->mHex, 52, 8));
            default:
                return 0;
        }
    }

    function CanGetPowerUpReason()
    {
        if ($this->mCurrentSwitch == SV_PowerUp) return true;
        return false;
    }

    function GetPowerUpReason()
    {
        $Reason = 0;
        $Rev = $this->GetRev();
        if (($Rev >= 9) || (($Rev == 8) && ($this->GetVersion() >= 185))) $Reason = hexdec(substr($this->mHex, 46, 2));
        if ($Reason == 0) {
            if (($Rev >= 8) && ($Rev <= 9)) {
                $Byte = hexdec(substr($this->GetHexData(), 44, 2));
                if ($Byte & 1) return -1;
                if ($Byte & 2) return -2;
                if ($Byte & 4) return -3;
                if ($Byte & 8) return -4;
            } else if (($Rev >= 4) && ($Rev <= 7)) {
                $Byte = hexdec(substr($this->GetHexData(), 10, 2));
                if ($Byte & 1) return -1;
                if ($Byte & 2) return -2;
                if ($Byte & 8) return -4;
            }
        }
        return $Reason;
    }
}

;
function LatitudeSmallToFloat($LatitudeSmall)
{
    if (($LatitudeSmall > 0) && ($LatitudeSmall >> 31)) $LatitudeSmall = -(0x7FFFFFFF - ($LatitudeSmall & 0x7FFFFFFF)) - 1;
    return (float)$LatitudeSmall / (float)600000;
}

function LatitudeFloatToSmall($LatitudeFloat)
{
    $Latitude = round((float)$LatitudeFloat * (float)600000);
    if ($Latitude < 0) $Latitude += 0xFFFFFFFF;
    return $Latitude;
}

function LatitudeSmallToDegrees($LatitudeSmall, &$rDegrees, &$rMinutes, &$rSeconds, &$rNS, &$rfDecimals)
{
    $Latitude = LatitudeSmallToFloat($LatitudeSmall);
    if ($Latitude < 0) {
        $rNS = 'S';
        $Latitude = -$Latitude;
    } else $rNS = 'N';
    $rDegrees = (int)$Latitude;
    $Latitude = ($Latitude - $rDegrees) * 60.0;
    $rfDecimals = $Latitude - (int)$Latitude;
    $rMinutes = (int)$Latitude;
    $rSeconds = (int)($rfDecimals * 60);
}

function LongitudeSmallToFloat($LongitudeSmall)
{
    if (($LongitudeSmall > 0) && ($LongitudeSmall >> 31)) $LongitudeSmall = -(0x7FFFFFFF - ($LongitudeSmall & 0x7FFFFFFF)) - 1;
    return (float)$LongitudeSmall / (float)600000;
}

function LongitudeFloatToSmall($LongitudeFloat)
{
    $Longitude = round((float)$LongitudeFloat * (float)600000);
    if ($Longitude < 0) $Longitude += 0xFFFFFFFF;
    return $Longitude;
}

function LongitudeSmallToDegrees($LongitudeSmall, &$rDegrees, &$rMinutes, &$rSeconds, &$rEW, &$rfDecimals)
{
    $Longitude = LongitudeSmallToFloat($LongitudeSmall);
    if ($Longitude < 0) {
        $rEW = 'W';
        $Longitude = -$Longitude;
    } else $rEW = 'E';
    $rDegrees = (int)$Longitude;
    $Longitude = ($Longitude - $rDegrees) * 60.0;
    $rfDecimals = $Longitude - (int)$Longitude;
    $rMinutes = (int)$Longitude;
    $rSeconds = (int)($rfDecimals * 60);
}

function DecompressImei($CompressedIMEI)
{
    $Len = strlen($CompressedIMEI);
    if (($Len <= 4) || ($Len >= 11)) return $CompressedIMEI;
    if ($Len != strspn($CompressedIMEI, '0123456789')) return $CompressedIMEI;
    $e = (int)substr($CompressedIMEI, 1);
    switch ((int)$CompressedIMEI[0]) {
        case 8:
            return sprintf('352228%09d', $e);
        case 1:
            return sprintf('357541%09d', $e);
        case 5:
            return sprintf('352225%09d', $e);
        case 9:
            return sprintf('358279%09d', $e);
        case 7:
            return sprintf('358278%09d', $e);
        case 3:
            return sprintf('357023%09d', $e);
        case 4:
            return sprintf('352848%09d', $e);
        case 2:
            return sprintf('357820%09d', $e);
        case 6:
            return sprintf('354476%09d', $e);
        default:
            return $CompressedIMEI;
    }
}

function CompressImei($IMEI)
{
    if (!CheckImeiCrc($IMEI)) return $IMEI;
    $e = (int)substr($IMEI, 6);
    switch (substr($IMEI, 0, 6)) {
        case '352228':
            return "8$e";
        case '357541':
            return "1$e";
        case '352225':
            return "5$e";
        case '358279':
            return "9$e";
        case '358278':
            return "7$e";
        case '357023':
            return "3$e";
        case '352848':
            return "4$e";
        case '357820':
            return "2$e";
        case '354476':
            return "6$e";
        default:
            return $IMEI;
    }
}

function CheckImeiCrc($IMEI)
{
    if ((strlen($IMEI) != 15) || (strspn($IMEI, '0123456789') != 15)) return false;
    $c = 0;
    for ($i = 0; $i < 14; $i += 2) {
        $d = $IMEI[$i + 1] << 1;
        $c += $IMEI[$i] + (int)($d / 10) + ($d % 10);
    }
    if ($IMEI[14] == (10 - ($c % 10)) % 10) return true;
    if (($IMEI == "357541000234567") || ($IMEI == "358278000654321")) return true;
    return false;
}

define('ACTION_GpsLog', 0);
define('ACTION_Photo', 1);
define('ACTION_CountersLog', 2);
define('ACTION_TransmitLog', 3);
define('ACTION_ResetTimer1', 4);
define('ACTION_ResetTimer2', 5);
define('ACTION_ResetTimer3', 6);
define('ACTION_ResetTimer4', 7);
define('ACTION_ResetTimer5', 8);
define('ACTION_ResetTimer6', 9);
define('ACTION_ResetTimer7', 10);
define('ACTION_ResetTimer8', 11);
define('ACTION_SmsAlert1', 12);
define('ACTION_SmsAlert2', 13);
define('ACTION_SmsAlert3', 14);
define('ACTION_SmsAlertIncomingKnown1', 15);
define('ACTION_SmsAlertIncomingKnown2', 16);
define('ACTION_SmsAlertIncomingKnown3', 17);
define('ACTION_Output1', 18);
define('ACTION_Output2', 19);
define('ACTION_Output3', 20);
define('ACTION_Output4', 21);
define('ACTION_RebootModule', 22);
define('ACTION_ClearGPSConfig', 23);
define('ACTION_ClearLog', 24);
define('ACTION_TYPE_PerformActionInsteadOfSmsAlerts', 25);
define('ACTION_ActionID', 26);
define('EVENT_IO_1A', 4);
define('EVENT_IO_1B', 8);
define('EVENT_IO_2A', 12);
define('EVENT_IO_2B', 16);
define('EVENT_IO_3A', 20);
define('EVENT_IO_3B', 24);
define('EVENT_IO_4A', 28);
define('EVENT_IO_4B', 32);
define('EVENT_TIMERS_1', 36);
define('EVENT_TIMERS_2', 48);
define('EVENT_TIMERS_3', 60);
define('EVENT_TIMERS_4', 72);
define('EVENT_TIMERS_5', 84);
define('EVENT_TIMERS_6', 96);
define('EVENT_TIMERS_7', 108);
define('EVENT_TIMERS_8', 120);
define('EVENT_TIME_1', 132);
define('EVENT_TIME_2', 138);
define('EVENT_TIMES_1', 144);
define('EVENT_TIMES_2', 152);
define('EVENT_StartMoving', 160);
define('EVENT_WhileMoving', 2039);
define('EVENT_StopMoving', 164);
define('EVENT_WhileNotMoving', 2043);
define('EVENT_SPEED_Above', 168);
define('EVENT_SPEED_Below', 174);
define('EVENT_DISTANCE_1', 180);
define('EVENT_PHONE_CalledBy1', 186);
define('EVENT_PHONE_CalledBy2', 200);
define('EVENT_PHONE_CalledBy3', 214);
define('EVENT_CalledByUnknownPhone', 228);
define('EVENT_RestartModule', 232);
define('EVENT_PowerSaving', 236);
define('EVENT_PowerDown', 240);
define('EVENT_ServerTransmitSuccess', 244);
define('EVENT_HEADING_Degrees', 3033);
define('EVENT_VOLTAGE_Below', 3045);
define('EVENT_VOLTAGE_Above', 3051);
define('EVENT_AttachIButton', 2031);
define('EVENT_DetachIButton', 2035);
define('EVENT_ReceivedGpsFix', 2047);
define('EVENT_OutputsStatusChange', 2413);
define('EVENT_ACCELERATION_XPmax', 1905);
define('EVENT_ACCELERATION_XPmin', 1911);
define('EVENT_ACCELERATION_XNmax', 1917);
define('EVENT_ACCELERATION_XNmin', 1923);
define('EVENT_ACCELERATION_Ymax', 1968);
define('EVENT_ACCELERATION_Ymin', 1974);
define('EVENT_ACCELERATION_Zmax', 1980);
define('EVENT_ACCELERATION_Zmin', 1986);
define('EVENT_WhileRoaming', 2434);
define('EVENT_DigTachReceivedValidData', 2456);
define('EVENT_DigTachStatusChanges', 2460);
define('EVENT_DigTachWhileIgnitionActive', 2466);
define('EVENT_SPEED_DigTachAbove', 2470);
define('EVENT_SPEED_DigTachBelow', 2476);
define('EVENT_GpsCurrentOutOfRangeStart', 1951);
define('EVENT_GpsCurrentOutOfRangeEnd', 1955);
define('EVENT_GpsCurrentWhileOutOfRange', 1959);
define('EVENT_HERTZ_PulseCounterAbove', 2014);
define('EVENT_HERTZ_PulseCounterBelowOrEqual', 2653);
define('EVENT_InputPattern1', 2163);
define('EVENT_InputPattern2', 2178);
define('EVENT_InputPattern3', 2193);
define('EVENT_AccidentRecording1', 2397);
define('EVENT_AccidentRecording2', 2403);
define('EVENT_LoggedSerialData', 2393);
define('EVENT_ReceivedSerialData', 2857);
define('SETTING_PowerSavingVoltage', 1);
define('SETTING_PowerDownVoltage', 2);
define('SETTING_PowerUpVoltage', 3);
define('SETTING_MovingWhenPowerBetween', 4);
define('SETTING_MovingWhenPowerBetween2', 130);
define('SETTING_MovingOnSensorDetect', 5);
define('SETTING_MovingOnGpsDelta', 6);
define('SETTING_MovingInputDetection', 7);
define('SETTING_MovingMinVoltage', 8);
define('SETTING_MovingMaxVoltage', 9);
define('SETTING_MovingMinVoltage2', 131);
define('SETTING_MovingMaxVoltage2', 132);
define('SETTING_MovingVoltageChange', 10);
define('SETTING_MotionDetectionSecondsTimeout', 11);
define('SETTING_DoNotSendInternalStatusMessages', 12);
define('SETTING_AcknowledgeSmsToIncomingCallsAndSms', 14);
define('SETTING_MaxBatchTransmission', 15);
define('SETTING_DoNotOverWriteFullLog', 16);
define('SETTING_DisableModuleIndicatorLEDs', 17);
define('SETTING_DisableGpsConfirmation', 18);
define('SETTING_DisableSpeedAboveEventRegions', 19);
define('SETTING_FasterSocketClosing', 20);
define('SETTING_MaximumPowerSaving', 21);
define('SETTING_ForceSpeedToZeroWhenNotMoving', 22);
define('SETTING_AlertSmsPositionFormat', 23);
define('SETTING_UseGsmPowerSaving', 24);
define('SETTING_SeparateEventIdTransmissions', 25);
define('SETTING_SubstituteTemperatureWithExternalDS18B20', 26);
define('SETTING_SendSettingsWhenChanged', 27);
define('SETTING_GsmAutoBanding', 28);
define('SETTING_MinRegionDetectAccuracyValue', 29);
define('SETTING_IncludeGpsPositionWithPhoto', 30);
define('SETTING_MinimumSatellitesForRegionDetection', 31);
define('SETTING_IgnoreSmsCommands', 32);
define('SETTING_ModuleDataLogging', 33);
define('SETTING_AccessPointName', 34);
define('SETTING_AccessPointLogin', 35);
define('SETTING_AccessPointPassword', 36);
define('SETTING_GprsTransmitInterval', 37);
define('SETTING_PrimaryServerDomain', 121);
define('SETTING_SecondaryServerDomain', 122);
define('SETTING_PrimaryServerIP', 38);
define('SETTING_SecondaryServerIP', 39);
define('SETTING_PrimaryServerTcpPort', 40);
define('SETTING_SecondaryServerTcpPort', 41);
define('SETTING_PrimaryTcpDataFormat', 42);
define('SETTING_SecondaryTcpDataFormat', 43);
define('SETTING_PrimaryTcpExtraDataFormat', 44);
define('SETTING_SecondaryTcpExtraDataFormat', 45);
define('SETTING_PrimaryServerUdpPort', 46);
define('SETTING_SecondaryServerUdpPort', 47);
define('SETTING_SendGpsLogWhenRoaming', 48);
define('SETTING_SmsServerPhone', 50);
define('SETTING_SmsTransmitInterval', 51);
define('SETTING_SmsAlertMinimumInterval', 52);
define('SETTING_SmsAlertPhone1', 53);
define('SETTING_SmsAlertPhone2', 54);
define('SETTING_SmsAlertPhone3', 55);
define('SETTING_GmtOffsetInQuarters', 56);
define('SETTING_GsmDataPhone', 57);
define('SETTING_GsmDataTransmitInterval', 58);
define('SETTING_TransmitLogWhenGpsRecordsReaches', 59);
define('SETTING_LogItemsLimit', 60);
define('SETTING_SocketTimeout', 61);
define('SETTING_KeepAliveTimeOutSecs', 62);
define('SETTING_KeepAliveTimeOutSecsPowerSaving', 63);
define('SETTING_RestartGpsTimeOutMins', 64);
define('SETTING_RestartGpsTimeOutMinsPowerSaving', 65);
define('SETTING_CleanGpsInfoTimeOutMins', 66);
define('SETTING_CleanGpsInfoTimeOutMinsPowerSaving', 67);
define('SETTING_PowerDownGpsTimeOutMins', 68);
define('SETTING_PowerDownGpsTimeOutMinsPowerSaving', 69);
define('SETTING_RebootWithoutServerConnectionSeconds', 70);
define('SETTING_RebootOnDelayedTransmissionInSeconds', 71);
define('SETTING_SocketClosureDelaySecs', 72);
define('SETTING_ModulePortMode1', 73);
define('SETTING_ModulePortMode2', 74);
define('SETTING_ModulePortMode3', 75);
define('SETTING_ModulePortMode4', 76);
define('SETTING_ModulePortProtocol1', 77);
define('SETTING_ModulePortProtocol2', 78);
define('SETTING_ModulePortProtocol3', 79);
define('SETTING_ModulePortProtocol4', 80);
define('SETTING_ModulePortBaudrate1', 81);
define('SETTING_ModulePortBaudrate2', 82);
define('SETTING_ModulePortBaudrate3', 83);
define('SETTING_ModulePortBaudrate4', 84);
define('SETTING_PortDataBufferingTimeout', 85);
define('SETTING_AnalogInput1and2NOTdigital', 86);
define('SETTING_AnalogInput3and4NOTdigital', 87);
define('SETTING_AnalogInputLoggingWithCounters', 88);
define('SETTING_AnalogInput_LowPassFilter_Disabled', 89);
define('SETTING_GpsLogSwitchType', 90);
define('SETTING_NoGpsLogsWithUndefinedEventId', 91);
define('SETTING_UseSystemTimeForKeepAlive', 92);
define('SETTING_DoNotLogReceivedSmsEvent', 93);
define('SETTING_DoNotLogCalledByEvent', 94);
define('SETTING_LogPhotos', 95);
define('SETTING_HomeNetwork1', 96);
define('SETTING_HomeNetwork2', 97);
define('SETTING_HomeNetwork3', 98);
define('SETTING_HomeNetwork4', 99);
define('SETTING_HomeNetwork5', 100);
define('SETTING_HomeNetwork6', 101);
define('SETTING_HomeNetwork7', 102);
define('SETTING_HomeNetwork8', 103);
define('SETTING_MaxGprsCost', 104);
define('SETTING_MaxGprsConnectTimeout', 105);
define('SETTING_SmsTimeout', 106);
define('SETTING_ProhibitSettingsReadback', 107);
define('SETTING_1WireBusChangeEvent', 108);
define('SETTING_ResetDistanceEventPerGpsLog', 109);
define('SETTING_RestartGpsAboveSpeed', 110);
define('SETTING_ModuleIndicatorLEDsBrightness', 111);
define('SETTING_DigitalLevelVoltageInput1', 112);
define('SETTING_DigitalLevelVoltageInput2', 113);
define('SETTING_DigitalLevelVoltageInput3', 114);
define('SETTING_DigitalLevelVoltageInput4', 115);
define('SETTING_DigitalLevelVoltageInput5', 116);
define('SETTING_PowerSavingVoltageBackup', 117);
define('SETTING_PowerDownVoltageBackup', 118);
define('SETTING_PowerUpVoltageBackup', 119);
define('SETTING_Input4ConnectedToVSS', 120);
define('SETTING_PretendInput4LikeOutput1Status', 123);
define('SETTING_MinSensorDetectionStartMoving', 124);
define('SETTING_MinSensorDetectionKeepMoving', 125);
define('SETTING_DisableStationaryMotionFilter', 126);
define('SETTING_DoNotLogHighestSpeedWithCounters', 127);
define('SETTING_MinimumGpsSpeedForMotionDetection', 128);
define('SETTING_MinimumGpsSpeedForTravelling', 129);
define('SETTING_iButtonRemovalDelay', 133);
define('SETTING_MinPositionAccuracyValue', 134);
define('SETTING_MinimumSatellitesForPosition', 135);
define('SETTING_MaximumSpeedForPosition', 136);
define('SETTING_AllowDisablingSerialAndPower', 137);
define('SETTING_MinimumAccelSensorMotionForRegionDetection', 138);
define('SETTING_PowerDownAboveDegreesCelcius', 139);
define('SETTING_PowerSavingAboveDegreesCelcius', 140);
define('SETTING_Input1BehaviorSimulationType', 141);
define('SETTING_Input2BehaviorSimulationType', 142);
define('SETTING_Input3BehaviorSimulationType', 143);
define('SETTING_Input5BehaviorSimulationType', 144);
define('SETTING_Input4BehaviorSimulationType', 145);
define('SETTING_DigitalLevelHysteresisVoltageInput1', 146);
define('SETTING_DigitalLevelHysteresisVoltageInput2', 147);
define('SETTING_DigitalLevelHysteresisVoltageInput3', 148);
define('SETTING_DigitalLevelHysteresisVoltageInput4', 149);
define('SETTING_DigitalLevelHysteresisVoltageInput5', 150);
define('SETTING_DisablePulseCounterHardware', 151);
define('SETTING_SerialPortInputBytesFilterMode12', 152);
define('SETTING_SerialPortInputBytesFilterMode34', 153);
define('SETTING_IncomingPhoneCallAction', 154);
define('SETTING_AutoAccelSensorOrientationCalibration', 155);
define('SETTING_DoNotLog1WireAttach', 156);
define('SETTING_DoNotLog1WireDetach', 157);
define('SETTING_PrivateSMSC', 158);
define('SETTING_AccelEventsTriggering', 159);
define('SETTING_SpeedEventsTriggering', 160);
define('SETTING_CameraIlluminationOutputs', 161);
define('SETTING_EncryptSimPin', 162);
define('SETTING_GPSC_onoff', 163);
define('SETTING_GPSC_T_on', 164);
define('SETTING_GPSC_T_off', 165);
define('SETTING_GPSC_T_acq', 166);
define('SETTING_GPSC_T_acq_off', 167);
define('SETTING_GPSC_T_reacq', 168);
define('SETTING_GPSC_T_reacq_off', 169);
define('SETTING_NoAutomaticApnOverride', 170);
define('SETTING_MovingOnVibrationSensorDetect', 171);
define('SETTING_VibrationSensorMinimumEventCount', 172);
define('SETTING_VibrationSensorCountTimeSpan', 173);
define('SETTING_PostponeActionJumpWhileExecutingIndexBelow', 174);
define('SETTING_PostponeActionJumpWhileExecutingIndexAbove', 175);
define('SETTING_WakeUpBy_Time', 176);
define('SETTING_WakeUpBy_VibrationSensor', 177);
define('SETTING_WakeUpBy_IOchange', 178);
define('SETTING_WakeUpTime', 179);
define('SETTING_VibrationSensorNextWakeUpDelay', 180);
define('SETTING_WakeUpIOchange', 181);
define('SETTING_NetworkRecordHandling', 182);
define('SETTING_OnlyLogInternalPowerSupplyVoltage', 183);
define('SETTING_GPScurrentMin', 184);
define('SETTING_GPScurrentMax', 185);
define('SETTING_GPScurrentDelay', 186);
define('SETTING_FilterLevelInput1', 187);
define('SETTING_FilterLevelInput2', 188);
define('SETTING_FilterLevelInput3', 189);
define('SETTING_FilterLevelInput4', 190);
define('SETTING_FilterLevelInput5', 191);
define('SETTING_TestCode', 192);
define('SETTING_CanBusInterface', 193);
define('SETTING_CanBusSpeed', 194);
define('SETTING_GprsClass', 195);
define('SETTING_VirtualizeOutputs', 196);
define('SETTING_DisableGpsBackup', 197);
define('SETTING_EnableSBAS', 198);
define('SETTING_DisableAccelSensor', 199);
define('SETTING_UseGsmPowerSaving2', 200);
define('SETTING_MotionTriggerAction_Voltage', 201);
define('SETTING_MotionTriggerAction_Voltage2', 202);
define('SETTING_MotionTriggerAction_VibrationSensor', 203);
define('SETTING_MotionTriggerAction_AccelSensor', 204);
define('SETTING_MotionTriggerAction_GpsSpeed', 205);
define('SETTING_SmsRetries', 206);
define('SETTING_TimeStampBitMark', 207);
define('SETTING_Action39GpsPowerTimeMoving', 208);
define('SETTING_Action39GpsPowerTimeNotMoving', 209);
define('SETTING_GpsReceiverPort', 210);
define('SETTING_IncludeIndexWithSerialRecords', 211);
define('SETTING_TriggerCalledByPhone1ForAnyNumber', 212);
define('SETTING_ActionID91', 213);
define('SETTING_ActionID92', 214);
define('SETTING_ActionID93', 215);
define('SETTING_ActionID94', 216);
define('SETTING_SignalPattern1', 217);
define('SETTING_SignalPattern2', 218);
define('SETTING_SignalPattern3', 219);
define('SETTING_SignalPattern4', 220);
define('SETTING_SignalPattern5', 221);
define('SETTING_SignalPattern6', 222);
define('SETTING_SignalPattern7', 223);
define('SETTING_SignalPattern8', 224);
define('SETTING_VibrationSensorCountMinimumSeconds', 225);
define('SETTING_ServerAckTimeout', 226);
define('SETTING_StartWithSecondaryServerForOddImei', 227);
define('SETTING_IgnorePowerDownVoltage', 228);
define('SETTING_InsideOutsideRegionEventTriggering', 229);
define('SETTING_WakeUpIOchangeInput1', 230);
define('SETTING_WakeUpIOchangeInput2', 231);
define('SETTING_WakeUpIOchangeInput3', 232);
define('SETTING_WakeUpIOchangeInput4', 233);
define('SETTING_WakeUpIOchangeInput5', 234);
define('SETTING_WakeUpIOchangeInput6', 235);
define('SETTING_WakeUpIOchangeInput7', 236);
define('SETTING_WakeUpIOchangeInput8', 237);
define('SETTING_PowerUpRecordHandling', 238);
define('SETTING_WhilePowerSaving_OpenSocket', 239);
define('SETTING_WhilePowerSaving_GpsFix', 240);
define('SETTING_WhilePowerSaving_GpsPower', 241);
define('SETTING_WhilePowerSaving_CpuSpeed', 242);
define('SETTING_UseSettleDelayUpFlankInput1', 243);
define('SETTING_UseSettleDelayUpFlankInput2', 244);
define('SETTING_UseSettleDelayUpFlankInput3', 245);
define('SETTING_UseSettleDelayUpFlankInput4', 246);
define('SETTING_UseSettleDelayUpFlankInput5', 247);
define('SETTING_UseSettleDelayDownFlankInput1', 248);
define('SETTING_UseSettleDelayDownFlankInput2', 249);
define('SETTING_UseSettleDelayDownFlankInput3', 250);
define('SETTING_UseSettleDelayDownFlankInput4', 251);
define('SETTING_UseSettleDelayDownFlankInput5', 252);
define('SETTING_SettleDelayTimeInput1', 253);
define('SETTING_SettleDelayTimeInput2', 254);
define('SETTING_SettleDelayTimeInput3', 255);
define('SETTING_SettleDelayTimeInput4', 256);
define('SETTING_SettleDelayTimeInput5', 257);
define('SETTING_GpsBackupInPowerDownMode', 258);
define('SETTING_ModuleRedLedIndications', 259);
define('SETTING_ActiveRFIDremovalDelayMultiply', 260);
define('SETTING_TransmitSV_LcdData1AtBatchStart', 261);
define('SETTING_DoNotTurnOnGpsAtStartup', 262);
define('SETTING_SingleTriggerTimer', 263);
define('SETTING_GSMPCL', 264);
define('SETTING_DCSPCL', 265);
define('SETTING_LcdMode', 266);
define('SETTING_GpsSpeedInvalidateSeconds', 267);
define('SETTING_GpsSpeedInvalidateMinimumKmh', 268);
define('SETTING_GpsSpeedInvalidateAboveOdoKmh', 269);
define('SETTING_GpsSpeedInvalidateBelowOdoKmh', 270);
define('SETTING_GpsSpeedInvalidateKmhChangePerSecond', 271);
define('SETTING_AccidentRecordingHistoryRecordAmount', 272);
define('SETTING_AccidentRecordingFutureRecordAmount', 273);
define('SETTING_RandomizeTimeOfDayEvents', 274);
define('SETTING_DigitsCheckCalledBy1', 275);
define('SETTING_DigitsCheckCalledBy2', 276);
define('SETTING_DigitsCheckCalledBy3', 277);
define('SETTING_WakeUpBy_AccelSensor', 278);
define('SETTING_TestCode2', 279);
define('SETTING_TestCode3', 280);
define('SETTING_TestCode4', 281);
define('SETTING_WakeUpBy_RF', 282);
define('SETTING_RFPollIntervalWhenAccelMotionActive', 283);
define('SETTING_RFPollIntervalWhenAccelMotionInactive', 284);
define('SETTING_RFPollTimeout', 285);
define('SETTING_VirtualVibrationMotorConnection', 286);
define('SETTING_HeadingDegreesRelativity', 287);
define('SETTING_LogReceivedSmsText', 288);
define('SETTING_TransmitPowerDownBackupRecords', 289);
define('SETTING_MinDbmForMinSatsForGpsPosition', 290);
define('SETTING_RFport1_Channel', 291);
define('SETTING_RFport1_Speed', 292);
define('SETTING_RFport1_Power', 293);
define('SETTING_RFport1_Address', 294);
define('SETTING_RFport1_Transmit', 295);
define('SETTING_RFport1_Listen', 296);
define('SETTING_RFport1_Forward', 297);
define('SETTING_RFport1_PingNoAckRequest', 298);
define('SETTING_RFport2_Channel', 299);
define('SETTING_RFport2_Speed', 300);
define('SETTING_RFport2_Power', 301);
define('SETTING_RFport2_Address', 302);
define('SETTING_RFport2_Transmit', 303);
define('SETTING_RFport2_Listen', 304);
define('SETTING_RFport2_Forward', 305);
define('SETTING_RFport2_PingNoAckRequest', 306);
define('SETTING_RFport3_Channel', 307);
define('SETTING_RFport3_Speed', 308);
define('SETTING_RFport3_Power', 309);
define('SETTING_RFport3_Address', 310);
define('SETTING_RFport3_Transmit', 311);
define('SETTING_RFport3_Listen', 312);
define('SETTING_RFport3_Forward', 313);
define('SETTING_RFport3_PingNoAckRequest', 314);
define('SETTING_RFport4_Channel', 315);
define('SETTING_RFport4_Speed', 316);
define('SETTING_RFport4_Power', 317);
define('SETTING_RFport4_Address', 318);
define('SETTING_RFport4_Transmit', 319);
define('SETTING_RFport4_Listen', 320);
define('SETTING_RFport4_Forward', 321);
define('SETTING_RFport4_PingNoAckRequest', 322);
define('SETTING_RS485PortSimulation', 323);
define('SETTING_RS485Wires', 324);
define('SETTING_DoNotLogCounters', 325);
define('SETTING_DoNotLogPowerDownBackupRecords', 326);
define('SETTING_WakeUpRFpollInterval', 327);
define('SETTING_RFpatchXmitPowerInSerial', 328);
define('SETTING_InvertSerialRxTx', 329);
define('SETTING_RFpingCustomData', 330);
define('SETTING_MinMotionDetectionAccuracy', 331);
define('SETTING_LogRecordSimulateInputVolt', 332);
define('SETTING_NoAccelEventsWhileNotMoving', 333);
define('SETTING_AccelSensorFilter', 334);
define('SETTING_SpeedAboveEventSamples', 335);
define('SETTING_DoNotUseSmartFlashLogging', 336);
define('SETTING_CameraType', 337);
define('SETTING_SignalPattern9', 338);
define('SETTING_SignalPattern10', 339);
define('SETTING_SignalPattern11', 340);
define('SETTING_SignalPattern12', 341);
define('SETTING_SignalPatternOutput1', 342);
define('SETTING_SignalPatternOutput2', 343);
define('SETTING_SignalPatternOutput3', 344);
define('SETTING_SignalPatternOutput4', 345);
define('SETTING_TravelledMetersODO', 346);
define('SETTING_MicrophoneGain', 9999);
define('MILB_Bright', 0);
define('MILB_Dimmed', 1);
define('MILB_Faint', 2);
define('SGLWR_Yes', 0);
define('SGLWR_NoNever', 3);
define('IOES_InputActive', 0);
define('IOES_InputInactive', 1);
define('IOES_InputActivated', 2);
define('IOES_InputDeactivated', 3);
define('IOES_InputChanged', 4);
define('IOES_InputUnchanged', 5);
define('IOES_OutputActive', 6);
define('IOES_OutputInactive', 7);
define('IOES_OutputActivated', 8);
define('IOES_OutputDeactivated', 9);
define('IOES_OutputChanged', 10);
define('IOES_OutputUnchanged', 11);
define('REGION_EVENT_Entering', 0);
define('REGION_EVENT_Inside', 1);
define('REGION_EVENT_Leaving', 2);
define('REGION_EVENT_Outside', 3);
define('EMPTY_REGION_COORDINATE', 1 << 31);
define('MDL_Normal', 1);
define('MDL_DataLoggingGsmOn', 2);
define('MDL_DataLoggingGsmOff', 3);
define('GAB_Automatic', 0);
define('GAB_900and1800', 1);
define('GAB_850and1900', 2);
define('MMID_Disabled', 0);
define('MMID_Input1', 1);
define('MMID_Input2', 2);
define('MMID_Input3', 3);
define('MMID_Input4', 4);
define('MMID_Input5', 5);
define('MMID_Output1', 6);
define('MMID_TachoIgnition', 7);
define('MMID_TachoMoving', 8);
define('MMID_TachoDriver1Driving', 9);
define('MPM_Disabled', 0);
define('MPM_Nmea', 1);
define('MPM_Camera', 2);
define('MPM_LcdKeyboard', 3);
define('MPM_SerialInOut', 4);
define('MPM_SerialOut', 5);
define('MPM_Switch', 6);
define('MPM_IButtonDS2480', 7);
define('MPM_Buzzer', 8);
define('MPM_CommandModeRequestDetection', 9);
define('MPM_1WireBus', 10);
define('MPM_DigitalTachograph', 11);
define('MPM_CanBus', 12);
define('MPM_ActiveRFIDreader', 13);
define('MPM_CustomDeviceData', 14);
define('MPM_AnalogInput', 15);
define('MPM_GarminFMI', 16);
define('MPM_ForwardRxDport1', 17);
define('MPM_ForwardRxDport2', 18);
define('MPM_ForwardRxDport3', 19);
define('MPM_ForwardRxDport4', 20);
define('MPM_IOextension', 21);
define('MPM_PCR300R', 22);
define('MPM_GP20', 23);
define('MPM_WiFi', 24);
define('MPM_Iridium', 25);
define('MPM_Squarell', 26);
define('MPP_8N1', 0);
define('MPP_8E1', 1);
define('MPP_8O1', 2);
define('MPP_7E1', 3);
define('MPP_7O1', 4);
define('MPB_300', 7);
define('MPB_1200', 8);
define('MPB_2400', 9);
define('MPB_4800', 1);
define('MPB_9600', 2);
define('MPB_10400', 10);
define('MPB_19200', 3);
define('MPB_38400', 4);
define('MPB_57600', 5);
define('MPB_115200', 6);
define('MPB_230400', 11);
define('MPB_460800', 12);
define('GLST_Position', 0);
define('GLST_PositionTripMeters', 1);
define('GLST_PositionTravelledMeters', 2);
define('GLST_PositionAcceleration', 3);
define('GLST_PositionAnalogInputs', 4);
define('GLST_PositionCompact', 5);
define('GLST_PositionCustom', 6);
define('GLST_PositionTravelledMetersFuel', 7);
define('IBST_Normal', 0);
define('IBST_ConnectedToLiIonBackup', 1);
define('IBST_ConnectedToInput5', 3);
define('IBST_ConnectedToADC6', 4);
define('IBST_ConnectedToLogSize', 5);
define('I4BST_Normal', 0);
define('I4BST_ConnectedToVSS', 1);
define('I4BST_ConnectedOutput1', 2);
define('I4BST_ConnectedToInput5', 3);
define('SPIBFM_None', 0);
define('SPIBFM_Below0x20exept0x0Aand0x0D', 1);
define('SPIBFM_Remove0x02Replace0x03with0x0D', 2);
define('SPIBFM_Remove0x0A', 3);
define('SPIBFM_Remove0x0D', 4);
define('SPIBFM_Replace0x43With0x0D', 5);
define('SPIBFM_6', 6);
define('SPIBFM_7', 7);
define('MIPCA_Reject', 0);
define('MIPCA_AutoAnswer', 1);
define('MIPCA_AutoAnswerIfKnown', 2);
define('MIPCA_Ignore', 3);
define('WUIOCBM_Input1', 1);
define('WUIOCBM_Input2', 2);
define('WUIOCBM_Input3', 4);
define('WUIOCBM_Input4', 8);
define('WUIOCBM_Input5', 16);
define('SVNRH_Asynchronous', 0);
define('SVNRH_Disabled', 2);

class CGPSsettings
{
    var $mSettings;
    var $mLastError;

    static function CreateCRC($Data, $Start = 0)
    {
        $CRC = 0;
        $Bytes = strlen($Data);
        for (; $Start < $Bytes; $Start++) {
            $CRC = ($CRC >> 8) | ($CRC << 8);
            $CRC ^= ord($Data[$Start]);
            $CRC ^= ($CRC & 0xFF) >> 4;
            $CRC ^= ($CRC << 8) << 4;
            $CRC ^= (($CRC & 0xFF) << 4) << 1;
            $CRC &= 0xFFFF;
        }
        return $CRC;
    }

    function CGPSsettings()
    {
        $this->ClearSettings();
    }

    function ClearSettings()
    {
        $this->mSettings = '';
        for ($i = 0; $i < 3093; $i++) $this->mSettings .= chr(0);
        $this->SetSetting(SETTING_MaxBatchTransmission, 10);
        $this->SetSetting(SETTING_GsmDataPhone, '');
        $this->SetSetting(SETTING_SmsServerPhone, '');
        $this->SetSetting(SETTING_SmsAlertPhone1, '');
        $this->SetSetting(SETTING_SmsAlertPhone2, '');
        $this->SetSetting(SETTING_SmsAlertPhone3, '');
        $this->SetEventPhone(EVENT_PHONE_CalledBy1, '');
        $this->SetEventPhone(EVENT_PHONE_CalledBy2, '');
        $this->SetEventPhone(EVENT_PHONE_CalledBy3, '');
        for ($i = 1; $i <= 50; $i++) $this->SetEventRegion($i, EMPTY_REGION_COORDINATE, EMPTY_REGION_COORDINATE, EMPTY_REGION_COORDINATE, EMPTY_REGION_COORDINATE);
        $this->SetSetting(SETTING_ModuleDataLogging, MDL_Normal);
        $this->mSettings[1859] = chr(ord($this->mSettings[1859]) | (7 << 4));
        $this->SetSetting(SETTING_ModulePortBaudrate1, MPB_38400);
        $this->SetSetting(SETTING_ModulePortBaudrate2, MPB_38400);
        $this->SetSetting(SETTING_ModulePortBaudrate3, MPB_38400);
        $this->SetSetting(SETTING_ModulePortBaudrate4, MPB_38400);
        $this->mSettings[2031] = chr(ord($this->mSettings[2031]) ^ 0x10);
        $this->mSettings[2035] = chr(ord($this->mSettings[2035]) ^ 0x20);
        $this->SetSetting(SETTING_SeparateEventIdTransmissions, true);
    }

    function GetLastError()
    {
        return $this->mLastError;
    }

    function GetSettingsCRC()
    {
        $Data = $this->mSettings;
        $Len = strlen($Data);
        $Data[2] = chr($Len & 0xFF);
        $Data[3] = chr(($Len >> 8) & 0xFF);
        $Data[2031] = chr(ord($Data[2031]) ^ 0x10);
        $Data[2035] = chr(ord($Data[2035]) ^ 0x20);
        return $this->CreateCRC($Data, 2);
    }

    function GetSettingsData()
    {
        $Data = $this->mSettings;
        $Len = strlen($Data);
        $Data[2] = chr($Len & 0xFF);
        $Data[3] = chr(($Len >> 8) & 0xFF);
        $Data[2031] = chr(ord($Data[2031]) ^ 0x10);
        $Data[2035] = chr(ord($Data[2035]) ^ 0x20);
        $Crc = $this->CreateCRC($Data, 2);
        $Data[0] = chr($Crc & 0xFF);
        $Data[1] = chr(($Crc >> 8) & 0xFF);
        for ($i = 267; $i < 1848; $i += 16) for ($c = $i + 16; $i < $c; $i += 4) $Data[$i] = chr(ord($Data[$i]) ^ 0x80);
        for ($i = 1, $r = $l = $Data[0], $m = $Len - 1; $i < $Len; $i++) {
            $a = $Data[$i];
            if ($a == $l) {
                for ($c = 0; ($i < $m) && ($a == $Data[$i + 1]) && ($c < 255); $i++, $c++) ;
                $r .= $a;
                $r .= chr($c);
                $l = chr($c);
                continue;
            }
            $r .= $a;
            $l = $a;
        }
        $Data = chr(0);
        $Len = strlen($r) + 2;
        $Data .= chr($Len & 0xFF);
        $Data .= chr(($Len >> 8) & 0xFF);
        $Data .= chr(($Len >> 16) & 0xFF);
        $Data .= chr(($Len >> 24) & 0xFF);
        $Crc = $this->CreateCRC($r);
        $Data .= chr($Crc & 0xFF);
        $Data .= chr(($Crc >> 8) & 0xFF);
        return $Data . $r;
    }

    function SetSettingsData($SettingsData)
    {
        $Len = strlen($SettingsData);
        if ($Len < 7) {
            $this->mLastError = 'Data is too small to be settings data';
            return false;
        }
        if (ord($SettingsData[0])) {
            $this->mLastError = 'Data type is not supported';
            return false;
        }
        if (((ord($SettingsData[4]) << 24) | (ord($SettingsData[3]) << 16) | (ord($SettingsData[2]) << 8) | (ord($SettingsData[1]))) != $Len - 5) {
            $this->mLastError = 'Data has an invalid length';
            return false;
        }
        if (((ord($SettingsData[6]) << 8) | ord($SettingsData[5])) != $this->CreateCRC($SettingsData, 7)) {
            $this->mLastError = 'Data has a CRC error';
            return false;
        }
        for ($i = 7, $Data = $SettingsData[$i++]; $i < $Len; $i++) {
            $Char = $SettingsData[$i];
            $Data .= $Char;
            if ($Char != $SettingsData[$i - 1]) continue;
            if (++$i >= $Len) {
                $this->mLastError = 'Data is corrupt';
                return false;
            }
            for ($Rep = 0, $Cnt = ord($SettingsData[$i]); $Rep < $Cnt; $Rep++) $Data .= $Char;
        }
        for ($i = 267; $i < 1848; $i += 16) for ($c = $i + 16; $i < $c; $i += 4) $Data[$i] = chr(ord($Data[$i]) ^ 0x80);
        $Len = strlen($Data);
        if (($Len < 2) || (((ord($Data[1]) << 8) | ord($Data[0])) != $this->CreateCRC($Data, 2))) {
            $this->mLastError = 'Data structure has a CRC error';
            return false;
        }
        if (($Len < 4) || (((ord($Data[3]) << 8) | (ord($Data[2]))) != $Len)) {
            $this->mLastError = 'Data structure has an invalid length';
            return false;
        }
        $Data[2031] = chr(ord($Data[2031]) ^ 0x10);
        $Data[2035] = chr(ord($Data[2035]) ^ 0x20);
        $this->mSettings = $Data;
        return true;
    }

    function GetEventAction($Event, $Action, &$rSetting, $Get = true)
    {
        if (($Event >= 4) && ($Event <= 3051)) switch ($Action) {
            case ACTION_GpsLog:
                $Offset = $Event + 1;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 128); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~128);
                } else $rSetting = ord($this->mSettings[$Offset]) & 128 ? true : false;
                return true;
            case ACTION_Photo:
                $Offset = $Event + 1;
                if (!$Get) $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & ~3) | ($rSetting & 3)); else $rSetting = ord($this->mSettings[$Offset]) & 3;
                return true;
            case ACTION_CountersLog:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 2); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~2);
                } else $rSetting = ord($this->mSettings[$Offset]) & 2 ? true : false;
                return true;
            case ACTION_TransmitLog:
                $Offset = $Event + 1;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 16); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~16);
                } else $rSetting = ord($this->mSettings[$Offset]) & 16 ? true : false;
                return true;
            case ACTION_ResetTimer1:
                $Offset = $Event + 1;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 8); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~8);
                } else $rSetting = ord($this->mSettings[$Offset]) & 8 ? true : false;
                return true;
            case ACTION_ResetTimer2:
                $Offset = $Event + 1;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 4); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~4);
                } else $rSetting = ord($this->mSettings[$Offset]) & 4 ? true : false;
                return true;
            case ACTION_ResetTimer3:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 1); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~1);
                } else $rSetting = ord($this->mSettings[$Offset]) & 1 ? true : false;
                return true;
            case ACTION_ResetTimer4:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 2); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~2);
                } else $rSetting = ord($this->mSettings[$Offset]) & 2 ? true : false;
                return true;
            case ACTION_ResetTimer5:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 4); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~4);
                } else $rSetting = ord($this->mSettings[$Offset]) & 4 ? true : false;
                return true;
            case ACTION_ResetTimer6:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 8); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~8);
                } else $rSetting = ord($this->mSettings[$Offset]) & 8 ? true : false;
                return true;
            case ACTION_ResetTimer7:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 16); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~16);
                } else $rSetting = ord($this->mSettings[$Offset]) & 16 ? true : false;
                return true;
            case ACTION_ResetTimer8:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 32); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~32);
                } else $rSetting = ord($this->mSettings[$Offset]) & 32 ? true : false;
                return true;
            case ACTION_SmsAlert1:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 4); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~4);
                } else $rSetting = ord($this->mSettings[$Offset]) & 4 ? true : false;
                return true;
            case ACTION_SmsAlert2:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 8); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~8);
                } else $rSetting = ord($this->mSettings[$Offset]) & 8 ? true : false;
                return true;
            case ACTION_SmsAlert3:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 16); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~16);
                } else $rSetting = ord($this->mSettings[$Offset]) & 16 ? true : false;
                return true;
            case ACTION_SmsAlertIncomingKnown1:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 32); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~32);
                } else $rSetting = ord($this->mSettings[$Offset]) & 32 ? true : false;
                return true;
            case ACTION_SmsAlertIncomingKnown2:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 64); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~64);
                } else $rSetting = ord($this->mSettings[$Offset]) & 64 ? true : false;
                return true;
            case ACTION_SmsAlertIncomingKnown3:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 128); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~128);
                } else $rSetting = ord($this->mSettings[$Offset]) & 128 ? true : false;
                return true;
            case ACTION_Output1:
                $Offset = $Event;
                if (!$Get) $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & ~192) | (($rSetting & 3) << 6)); else $rSetting = (ord($this->mSettings[$Offset]) >> 6) & 3;
                return true;
            case ACTION_Output2:
                $Offset = $Event;
                if (!$Get) $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & ~48) | (($rSetting & 3) << 4)); else $rSetting = (ord($this->mSettings[$Offset]) >> 4) & 3;
                return true;
            case ACTION_Output3:
                $Offset = $Event;
                if (!$Get) $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & ~12) | (($rSetting & 3) << 2)); else $rSetting = (ord($this->mSettings[$Offset]) >> 2) & 3;
                return true;
            case ACTION_Output4:
                $Offset = $Event;
                if (!$Get) $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & ~3) | ($rSetting & 3)); else $rSetting = ord($this->mSettings[$Offset]) & 3;
                return true;
            case ACTION_RebootModule:
                $Offset = $Event + 2;
                if (!$Get) {
                    $this->mLastError = "ACTION_RebootModule not supported, use ACTION_ActionID with value 64 instead.";
                    return false;
                } else {
                    $rSetting = $Setting = false;
                    if (GetEventAction($Event, ACTION_TYPE_PerformActionInsteadOfSmsAlerts, $Setting)) {
                        if (GetEventAction($Event, ACTION_ActionID, $Setting)) {
                            if ($Setting == 64) $rSetting = true;
                        }
                    }
                }
                return true;
            case ACTION_ClearGPSConfig:
                $Offset = $Event + 2;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 128); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~128);
                } else $rSetting = ord($this->mSettings[$Offset]) & 128 ? true : false;
                return true;
            case ACTION_ClearLog:
                $Offset = $Event + 3;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 1); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~1);
                } else $rSetting = ord($this->mSettings[$Offset]) & 1 ? true : false;
                return true;
            case ACTION_TYPE_PerformActionInsteadOfSmsAlerts:
                $Offset = $Event;
                if (!$Get) {
                    if (!$rSetting) {
                        $this->mSettings[$Offset + 1] = chr(ord($this->mSettings[$Offset + 1]) & ~64);
                        $this->mSettings[$Offset + 2] = chr(ord($this->mSettings[$Offset + 2]) & ~64);
                    }
                } else $rSetting = ((ord($this->mSettings[$Offset + 1]) & 64) | (ord($this->mSettings[$Offset + 2]) & 64)) ? true : false;
                return true;
            case ACTION_ActionID:
                $Offset = $Event;
                if ($Get) {
                    $rSetting = (ord($this->mSettings[$Offset + 1]) & 64) ? 1 : 0;
                    if (ord($this->mSettings[$Offset + 2]) & 64) $rSetting |= 2;
                    switch ($rSetting) {
                        case 1:
                            $rSetting = (ord($this->mSettings[$Offset + 3]) >> 2) & 63;
                            break;
                        case 2:
                            $rSetting = 64 + ((ord($this->mSettings[$Offset + 3]) >> 2) & 63);
                            break;
                        case 3:
                            $rSetting = 128 + ((ord($this->mSettings[$Offset + 3]) >> 2) & 63);
                            break;
                    }
                } else {
                    $Byte1 = ord($this->mSettings[$Offset + 1]);
                    $Byte2 = ord($this->mSettings[$Offset + 2]);
                    $ActionID = 0;
                    if ($rSetting <= 0) {
                        $Byte1 &= ~64;
                        $Byte2 &= ~64;
                    } else {
                        $ActionID = $rSetting;
                        if ($ActionID & 64) $Byte1 &= ~64; else $Byte1 |= 64;
                        if ($ActionID >= 64) $Byte2 |= 64; else $Byte2 &= ~64;
                    }
                    $this->mSettings[$Offset + 1] = chr($Byte1);
                    $this->mSettings[$Offset + 2] = chr($Byte2);
                    $this->mSettings[$Offset + 3] = chr((ord($this->mSettings[$Offset + 3]) & 3) | (($ActionID & 63) << 2));
                }
                return true;
            case 1000:
                $Offset = $Event + 1;
                if (!$Get) {
                    if ($rSetting) $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) | 32); else $this->mSettings[$Offset] = chr(ord($this->mSettings[$Offset]) & ~32);
                } else $rSetting = ord($this->mSettings[$Offset]) & 32 ? true : false;
                return true;
            default:
                $this->mLastError = "Unsupported ACTION_... ($Action)";
                return false;
        }
        $rSetting = null;
        $this->mLastError = "Unsupported EVENT_... ($Event)";
        return false;
    }

    function SetEventAction($Event, $Action, $Setting)
    {
        return $this->GetEventAction($Event, $Action, $Setting, false);
    }

    function GetEventActionRegion($Region, $Event, $Action, &$rSetting, $Get = true)
    {
        if (($Region < 1) || ($Region > 50)) {
            $this->mLastError = "Unsupported region ($Region)";
            return false;
        }
        if (($Event < 0) || ($Event > 3)) {
            $this->mLastError = "Unsupported REGION_EVENT_... ($Event)";
            return false;
        }
        return $this->GetEventAction(248 + (($Region - 1) * 32) + ($Event * 4), $Action, $rSetting, $Get);
    }

    function SetEventActionRegion($Region, $Event, $Action, $Setting)
    {
        return $this->GetEventAction(248 + (($Region - 1) * 32) + ($Event * 4), $Action, $Setting, false);
    }

    function GetEventIO($Event, &$rCondition, $Get = true)
    {
        switch ($Event) {
            case EVENT_IO_1A:
                $Offset = 3025;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) & 0xF; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0xF0) | ($rCondition & 0xF));
                return true;
            case EVENT_IO_1B:
                $Offset = 3025;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) >> 4; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0x0F) | (($rCondition << 4) & 0xF0));
                return true;
            case EVENT_IO_2A:
                $Offset = 3026;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) & 0xF; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0xF0) | ($rCondition & 0xF));
                return true;
            case EVENT_IO_2B:
                $Offset = 3026;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) >> 4; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0x0F) | (($rCondition << 4) & 0xF0));
                return true;
            case EVENT_IO_3A:
                $Offset = 3027;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) & 0xF; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0xF0) | ($rCondition & 0xF));
                return true;
            case EVENT_IO_3B:
                $Offset = 3027;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) >> 4; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0x0F) | (($rCondition << 4) & 0xF0));
                return true;
            case EVENT_IO_4A:
                $Offset = 3028;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) & 0xF; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0xF0) | ($rCondition & 0xF));
                return true;
            case EVENT_IO_4B:
                $Offset = 3028;
                if ($Get) $rCondition = ord($this->mSettings[$Offset]) >> 4; else $this->mSettings[$Offset] = chr((ord($this->mSettings[$Offset]) & 0x0F) | (($rCondition << 4) & 0xF0));
                return true;
        }
        $this->mLastError = "Unsupported EVENT_IO_... ($Event)";
        return false;
    }

    function SetEventIO($Event, $Condition)
    {
        return $this->GetEventIO($Event, $Condition, false);
    }

    function GetEventTimers($Event, &$rMovingInterval, &$rNotMovingInterval, $Get = true)
    {
        switch ($Event) {
            case EVENT_TIMERS_1:
            case EVENT_TIMERS_2:
            case EVENT_TIMERS_3:
            case EVENT_TIMERS_4:
            case EVENT_TIMERS_5:
            case EVENT_TIMERS_6:
            case EVENT_TIMERS_7:
            case EVENT_TIMERS_8:
                $i = $Event + 4;
                if ($Get) {
                    $rMovingInterval = ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8) | (ord($this->mSettings[$i++]) << 16) | (ord($this->mSettings[$i++]) << 24);
                    $rNotMovingInterval = ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8) | (ord($this->mSettings[$i++]) << 16) | (ord($this->mSettings[$i++]) << 24);
                    return true;
                }
                $this->mSettings[$i++] = chr($rMovingInterval & 255);
                $this->mSettings[$i++] = chr(($rMovingInterval >> 8) & 255);
                $this->mSettings[$i++] = chr(($rMovingInterval >> 16) & 255);
                $this->mSettings[$i++] = chr(($rMovingInterval >> 24) & 255);
                $this->mSettings[$i++] = chr($rNotMovingInterval & 255);
                $this->mSettings[$i++] = chr(($rNotMovingInterval >> 8) & 255);
                $this->mSettings[$i++] = chr(($rNotMovingInterval >> 16) & 255);
                $this->mSettings[$i++] = chr(($rNotMovingInterval >> 24) & 255);
                return true;
        }
        $this->mLastError = "Unsupported EVENT_TIMERS_... ($Event)";
        return false;
    }

    function SetEventTimers($Event, $MovingInterval, $NotMovingInterval)
    {
        return $this->GetEventTimers($Event, $MovingInterval, $NotMovingInterval, false);
    }

    function GetEventTime($Event, &$rTime, $Get = true)
    {
        switch ($Event) {
            case EVENT_TIME_1:
            case EVENT_TIME_2:
                $i = $Event + 4;
                if ($Get) {
                    $rTime = (ord($this->mSettings[$i++]) | (ord($this->mSettings[$i]) << 8)) * 2;
                    return true;
                }
                if (($rTime < 0) || ($rTime >= 86400)) {
                    $this->mLastError = "Invalid time value ($rTime)";
                    return false;
                }
                $Time = $rTime / 2;
                $this->mSettings[$i++] = ($Time & 255);
                $this->mSettings[$i] = (($Time >> 8) & 255);
                return true;
        }
        $this->mLastError = "Unsupported EVENT_TIME_... ($Event)";
        return false;
    }

    function SetEventTime($Event, $Time)
    {
        return $this->GetEventTime($Event, $Time, false);
    }

    function GetEventTimes($Event, &$rTimeStart, &$rTimeEnd, $Get = true)
    {
        switch ($Event) {
            case EVENT_TIMES_1:
            case EVENT_TIMES_2:
                $i = $Event + 4;
                if ($Get) {
                    $rTimeStart = (ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8)) * 2;
                    $rTimeEnd = (ord($this->mSettings[$i++]) | (ord($this->mSettings[$i]) << 8)) * 2;
                    return true;
                }
                if (($rTimeStart < 0) || ($rTimeStart >= 86400)) {
                    $this->mLastError = "Invalid start time ($rTimeStart)";
                    return false;
                }
                if (($rTimeEnd < 0) || ($rTimeEnd >= 86400)) {
                    $this->mLastError = "Invalid end time ($rTimeEnd)";
                    return false;
                }
                $Time = $rTimeStart /= 2;
                $this->mSettings[$i++] = chr($Time & 255);
                $this->mSettings[$i++] = chr(($Time >> 8) & 255);
                $Time = $rTimeEnd / 2;
                $this->mSettings[$i++] = chr($Time & 255);
                $this->mSettings[$i] = chr(($Time >> 8) & 255);
                return true;
        }
        $this->mLastError = "Unsupported EVENT_TIMES_... ($Event)";
        return false;
    }

    function SetEventTimes($Event, $TimeStart, $TimeEnd)
    {
        return $this->GetEventTimes($Event, $TimeStart, $TimeEnd, false);
    }

    function GetEventAccidentRecordingInterval($Event, &$rInterval, $Get = true)
    {
        switch ($Event) {
            case EVENT_AccidentRecording1:
            case EVENT_AccidentRecording2:
                $i = $Event + 4;
                if ($Get) {
                    $rInterval = (ord($this->mSettings[$i++]) | (ord($this->mSettings[$i]) << 8));
                    return true;
                }
                if (($rInterval < 0) || ($rInterval >= 65000)) {
                    $this->mLastError = "Invalid time value ($rInterval)";
                    return false;
                }
                $this->mSettings[$i++] = chr($rInterval & 255);
                $this->mSettings[$i] = chr(($rInterval >> 8) & 255);
                return true;
        }
        $this->mLastError = "Unsupported EVENT_AccidentRecording... ($Event)";
        return false;
    }

    function SetEventAccidentRecordingInterval($Event, $Interval)
    {
        return $this->GetEventAccidentRecordingInterval($Event, $Interval, false);
    }

    function GetEventSpeed($Event, &$rSpeed, $Get = true)
    {
        switch ($Event) {
            case EVENT_SPEED_Above:
            case EVENT_SPEED_Below:
            case EVENT_SPEED_DigTachAbove:
            case EVENT_SPEED_DigTachBelow:
                if ($Get) {
                    $rSpeed = ord($this->mSettings[$Event + 4]) | (ord($this->mSettings[$Event + 5]) << 8);
                    return true;
                }
                if (($rSpeed < 0) || ($rSpeed >= (1 << 16))) {
                    $this->mLastError = "Invalid speed ($rSpeed)";
                    return false;
                }
                $this->mSettings[$Event + 4] = chr($rSpeed & 255);
                $this->mSettings[$Event + 5] = chr(($rSpeed >> 8) & 255);
                return true;
            default:
                $this->mLastError = "Unsupported EVENT_SPEED_... ($Event)";
                return false;
        }
    }

    function SetEventSpeed($Event, $Speed)
    {
        return $this->GetEventSpeed($Event, $Speed, false);
    }

    function GetEventDistance($Event, &$rDistance, $Get = true)
    {
        switch ($Event) {
            case EVENT_DISTANCE_1:
                if ($Get) {
                    $rDistance = ord($this->mSettings[$Event + 4]) | (ord($this->mSettings[$Event + 5]) << 8);
                    return true;
                }
                if (($rDistance < 0) || ($rDistance >= 65535)) {
                    $this->mLastError = "Invalid distance ($rDistance)";
                    return false;
                }
                $this->mSettings[$Event + 4] = chr($rDistance & 255);
                $this->mSettings[$Event + 5] = chr(($rDistance >> 8) & 255);
                return true;
            default:
                $this->mLastError = "Unsupported EVENT_DISTANCE_... ($Event)";
                return false;
        }
    }

    function SetEventDistance($Event, $Distance)
    {
        return $this->GetEventDistance($Event, $Distance, false);
    }

    function GetEventPhone($Event, &$rPhone, $Get = true)
    {
        switch ($Event) {
            case EVENT_PHONE_CalledBy1:
            case EVENT_PHONE_CalledBy2:
            case EVENT_PHONE_CalledBy3:
                if ($Get) return $this->GetSetting($Event + 99000, $rPhone, $Get); else return $this->SetSetting($Event + 99000, $rPhone);
            default:
                $this->mLastError = "Unsupported EVENT_PHONE_... ($Event)";
                return false;
        }
    }

    function SetEventPhone($Event, $Phone)
    {
        return $this->GetEventPhone($Event, $Phone, false);
    }

    function GetEventHeadingDegrees($Event, &$rDegrees, $Get = true)
    {
        switch ($Event) {
            case EVENT_HEADING_Degrees:
                if ($Get) {
                    $rDegrees = ord($this->mSettings[$Event + 4]);
                    return true;
                }
                if (($rDegrees < 0) || ($rDegrees > 180)) {
                    $this->mLastError = "Invalid degrees ($rDegrees)";
                    return false;
                }
                $this->mSettings[$Event + 4] = chr($rDegrees & 255);
                return true;
            default:
                $this->mLastError = "Unsupported EVENT_HEADING_... ($Event)";
                return false;
        }
    }

    function SetEventHeadingDegrees($Event, $Degrees)
    {
        return $this->GetEventHeadingDegrees($Event, $Degrees, false);
    }

    function GetEventHertz($Event, &$rHertz, $Get = true)
    {
        switch ($Event) {
            case EVENT_HERTZ_PulseCounterAbove:
            case EVENT_HERTZ_PulseCounterBelowOrEqual:
                if ($Get) {
                    $rHertz = ord($this->mSettings[$Event + 4]) | (ord($this->mSettings[$Event + 5]) << 8);
                    return true;
                }
                if (($rHertz < 0) || ($rHertz >= (1 << 16))) {
                    $this->mLastError = "Invalid hertz ($rHertz)";
                    return false;
                }
                $this->mSettings[$Event + 4] = chr($rHertz & 255);
                $this->mSettings[$Event + 5] = chr(($rHertz >> 8) & 255);
                return true;
            default:
                $this->mLastError = "Unsupported EVENT_HERTZ_... ($Event)";
                return false;
        }
    }

    function SetEventHertz($Event, $Hertz)
    {
        return $this->GetEventHertz($Event, $Hertz, false);
    }

    function GetEventInputPattern($Event, &$raPattern, $Get = true)
    {
        switch ($Event) {
            case EVENT_InputPattern1:
            case EVENT_InputPattern2:
            case EVENT_InputPattern3:
                $o = $Event + 4;
                if ($Get) {
                    $raPattern = array();
                    $b = ord($this->mSettings[$o++]);
                    $raPattern[] = $b >> 1;
                    $raPattern[] = $b & 1;
                    for ($i = 2; $i < 12; $i++) $raPattern[] = ord($this->mSettings[$o++]);
                    return true;
                }
                if (is_array($raPattern) && (count($raPattern) == 12)) {
                    $b = ($raPattern[0] & 127) << 1;
                    $b |= $raPattern[1] & 1;
                    $this->mSettings[$o++] = chr($b);
                    for ($i = 2; $i < 12; $i++) $this->mSettings[$o++] = chr($raPattern[$i] & 255);
                    return true;
                }
                $this->mLastError = "Invalid array length";
                return false;
            default:
                $this->mLastError = "Unsupported EVENT_InputPattern... ($Event)";
                return false;
        }
    }

    function SetEventInputPattern($Event, $aPattern)
    {
        return $this->GetEventInputPattern($Event, $aPattern, false);
    }

    function GetEventVoltage($Event, &$rVoltage, $Get = true)
    {
        switch ($Event) {
            case EVENT_VOLTAGE_Below:
            case EVENT_VOLTAGE_Above:
                return $this->GetSetting($Event, $rVoltage, $Get);
            default:
                $this->mLastError = "Unsupported EVENT_VOLTAGE_... ($Event)";
                return false;
        }
    }

    function SetEventVoltage($Event, $Voltage)
    {
        return $this->GetEventVoltage($Event, $Voltage, false);
    }

    function GetEventRegion($Region, &$rLatTopLeft, &$rLonTopLeft, &$rLatBotRight, &$rLonBotRight, $Get = true)
    {
        if (($Region < 1) || ($Region > 50)) {
            $this->mLastError = "Unsupported region ($Region)";
            return false;
        }
        $i = 232 + ($Region * 32);
        if ($Get) {
            $rLatTopLeft = ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8) | (ord($this->mSettings[$i++]) << 16) | (ord($this->mSettings[$i++]) << 24);
            if ($rLatTopLeft != EMPTY_REGION_COORDINATE) {
                if ($rLatTopLeft > 0x80000000) $rLatTopLeft -= 0x100000000;
                $rLatTopLeft = (float)$rLatTopLeft * (float)600000 / (float)11930464;
            }
            $rLonTopLeft = ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8) | (ord($this->mSettings[$i++]) << 16) | (ord($this->mSettings[$i++]) << 24);
            if ($rLonTopLeft != EMPTY_REGION_COORDINATE) {
                if ($rLonTopLeft > 0x80000000) $rLonTopLeft -= 0x100000000;
                $rLonTopLeft = (float)$rLonTopLeft * (float)600000 / (float)11930464;
            }
            $rLatBotRight = ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8) | (ord($this->mSettings[$i++]) << 16) | (ord($this->mSettings[$i++]) << 24);
            if ($rLatBotRight != EMPTY_REGION_COORDINATE) {
                if ($rLatBotRight > 0x80000000) $rLatBotRight -= 0x100000000;
                $rLatBotRight = (float)$rLatBotRight * (float)600000 / (float)11930464;
            }
            $rLonBotRight = ord($this->mSettings[$i++]) | (ord($this->mSettings[$i++]) << 8) | (ord($this->mSettings[$i++]) << 16) | (ord($this->mSettings[$i++]) << 24);
            if ($rLonBotRight != EMPTY_REGION_COORDINATE) {
                if ($rLonBotRight > 0x80000000) $rLonBotRight -= 0x100000000;
                $rLonBotRight = (float)$rLonBotRight * (float)600000 / (float)11930464;
            }
            return true;
        }
        if (($rLatTopLeft != EMPTY_REGION_COORDINATE) && ($rLonTopLeft != EMPTY_REGION_COORDINATE) && ($rLatBotRight != EMPTY_REGION_COORDINATE) && ($rLonBotRight != EMPTY_REGION_COORDINATE)) {
            $LatTopLeft = LatitudeSmallToFloat($rLatTopLeft);
            $LonTopLeft = LongitudeSmallToFloat($rLonTopLeft);
            $LatBotRight = LatitudeSmallToFloat($rLatBotRight);
            $LonBotRight = LongitudeSmallToFloat($rLonBotRight);
            if (($LatTopLeft < (float)-90) || ($LatTopLeft > (float)90)) {
                $this->mLastError = "Top left latitude out of range ($LatTopLeft)";
                return false;
            }
            if (($LonTopLeft < (float)-180) || ($LonTopLeft > (float)180)) {
                $this->mLastError = "Top left longitude out of range ($LonTopLeft)";
                return false;
            }
            if (($LatBotRight < (float)-90) || ($LatBotRight > (float)90)) {
                $this->mLastError = "Bottom right latitude out of range ($LatBotRight)";
                return false;
            }
            $Delta = $LatTopLeft - $LatBotRight;
            if ($Delta < 0) {
                $this->mLastError = 'Latitude top left point below bottom right point';
                return false;
            }
            if ($Delta < (float)0.00028) {
                $this->mLastError = 'Distance between top left and bottom right latitude too small';
                return false;
            }
            $Delta = $LonBotRight - $LonTopLeft;
            if ($Delta < 0) {
                $this->mLastError = 'Longitude top left point below bottom right point';
                return false;
            }
            if ($Delta < (float)0.00028) {
                $this->mLastError = 'Distance between top left and bottom right longitude too small';
                return false;
            }
            $LatTopLeft = (int)($LatTopLeft * 11930464);
            $LonTopLeft = (int)($LonTopLeft * 11930464);
            $LatBotRight = (int)($LatBotRight * 11930464);
            $LonBotRight = (int)($LonBotRight * 11930464);
        } else {
            if (($rLatTopLeft != EMPTY_REGION_COORDINATE) || ($rLonTopLeft != EMPTY_REGION_COORDINATE) || ($rLatBotRight != EMPTY_REGION_COORDINATE) || ($rLonBotRight != EMPTY_REGION_COORDINATE)) {
                $this->mLastError = 'All four coordinates must be cleared to disable the region event. (EMPTY_REGION_COORDINATE)';
                return false;
            }
            $LatTopLeft = $LonTopLeft = $LatBotRight = $LonBotRight = EMPTY_REGION_COORDINATE;
        }
        $this->mSettings[$i++] = chr($LatTopLeft & 255);
        $this->mSettings[$i++] = chr(($LatTopLeft >> 8) & 255);
        $this->mSettings[$i++] = chr(($LatTopLeft >> 16) & 255);
        $this->mSettings[$i++] = chr(($LatTopLeft >> 24) & 255);
        $this->mSettings[$i++] = chr($LonTopLeft & 255);
        $this->mSettings[$i++] = chr(($LonTopLeft >> 8) & 255);
        $this->mSettings[$i++] = chr(($LonTopLeft >> 16) & 255);
        $this->mSettings[$i++] = chr(($LonTopLeft >> 24) & 255);
        $this->mSettings[$i++] = chr($LatBotRight & 255);
        $this->mSettings[$i++] = chr(($LatBotRight >> 8) & 255);
        $this->mSettings[$i++] = chr(($LatBotRight >> 16) & 255);
        $this->mSettings[$i++] = chr(($LatBotRight >> 24) & 255);
        $this->mSettings[$i++] = chr($LonBotRight & 255);
        $this->mSettings[$i++] = chr(($LonBotRight >> 8) & 255);
        $this->mSettings[$i++] = chr(($LonBotRight >> 16) & 255);
        $this->mSettings[$i++] = chr(($LonBotRight >> 24) & 255);
        return true;
    }

    function SetEventRegion($Region, $LatTopLeft, $LonTopLeft, $LatBotRight, $LonBotRight)
    {
        return $this->GetEventRegion($Region, $LatTopLeft, $LonTopLeft, $LatBotRight, $LonBotRight, false);
    }

    function GetEventAcceleration($Event, &$rGforce, $Get = true)
    {
        switch ($Event) {
            case EVENT_ACCELERATION_XPmax:
            case EVENT_ACCELERATION_XPmin:
            case EVENT_ACCELERATION_XNmax:
            case EVENT_ACCELERATION_XNmin:
            case EVENT_ACCELERATION_Ymax:
            case EVENT_ACCELERATION_Ymin:
            case EVENT_ACCELERATION_Zmax:
            case EVENT_ACCELERATION_Zmin:
                if ($Get) {
                    $rGforce = (float)((double)(ord($this->mSettings[$Event + 4]) | ((ord($this->mSettings[$Event + 5]) << 8))) * ((double)6 / (double)32768));
                    return true;
                }
                $fUnit = (double)6 / (double)32768;
                if (((double)$rGforce < (double)0.0) || ((double)$rGforce > ($fUnit * 32767))) {
                    $this->mLastError = "Invalid G-Force level ($rGforce)";
                    return false;
                }
                $Val = (int)(((double)$rGforce + ($fUnit / 2)) / $fUnit);
                $this->mSettings[$Event + 4] = chr($Val & 255);
                $this->mSettings[$Event + 5] = chr(($Val >> 8) & 255);
                return true;
            default:
                $this->mLastError = "Unsupported EVENT_ACCELERATION_... ($Event)";
                return false;
        }
    }

    function SetEventAcceleration($Event, $Gforce)
    {
        return $this->GetEventAcceleration($Event, $Gforce, false);
    }

    function GetEventReceivedSerialData($Event, &$rConditions, $Get = true)
    {
        switch ($Event) {
            case EVENT_ReceivedSerialData:
                if ($Get) {
                    $rConditions = ord($this->mSettings[$Event + 4]);
                    return true;
                }
                $this->mSettings[$Event + 4] = chr($rConditions & 255);
                return true;
            default:
                $this->mLastError = "Unsupported EVENT_ReceivedSerialData... ($Event)";
                return false;
        }
    }

    function SetEventReceivedSerialData($Event, $Conditions)
    {
        return $this->GetEventReceivedSerialData($Event, $Conditions, false);
    }

    function SetTimerPulseCount($Bitmask)
    {
        if (($Bitmask >= 0) && ($Bitmask <= 255)) {
            $this->mSettings[2512] = chr($Bitmask);
            return true;
        }
        $this->mLastError = "Invalid bitmask";
        return false;
    }

    function GetTimerPulseCount(&$rBitmask)
    {
        $rBitmask = ord($this->mSettings[2512]);
        return true;
    }

    function SetEventOutputsStatusChange($BitmaskOfPortsToBeMonitored)
    {
        if ($BitmaskOfPortsToBeMonitored >= 0 && $BitmaskOfPortsToBeMonitored <= 63) {
            $this->mSettings[2413 + 4] = chr($BitmaskOfPortsToBeMonitored);
            return true;
        }
        $this->mLastError = "Invalid bitmask for ports to be monitored";
        return false;
    }

    function GetEventOutputsStatusChange(&$rBitmaskOfPortsToBeMonitored)
    {
        $rBitmaskOfPortsToBeMonitored = ord($this->mSettings[2413 + 4]);
        return true;
    }

    function SetEventDigTachStatusChange($BitmaskOfStatusesToBeMonitored)
    {
        if ($BitmaskOfStatusesToBeMonitored >= 0 && $BitmaskOfStatusesToBeMonitored <= 65536) {
            $this->mSettings[EVENT_DigTachStatusChanges + 4] = chr($BitmaskOfStatusesToBeMonitored & 255);
            $this->mSettings[EVENT_DigTachStatusChanges + 5] = chr(($BitmaskOfStatusesToBeMonitored >> 8) & 255);
            return true;
        }
        $this->mLastError = "Invalid DTDCEBM_... bitmask";
        return false;
    }

    function GetEventDigTachStatusChange(&$rBitmaskOfStatusesToBeMonitored)
    {
        $rBitmaskOfStatusesToBeMonitored = (ord($this->mSettings[EVENT_DigTachStatusChanges + 5]) << 8) | ord($this->mSettings[EVENT_DigTachStatusChanges + 4]);
        return true;
    }

    function GetSetting($Setting, &$rData, $Get = true)
    {
        $o = $m = 0;
        switch ($Setting) {
            case SETTING_GsmDataPhone:
                if (!$o) $o = 3003;
            case SETTING_SmsServerPhone:
                if (!$o) $o = 2975;
            case SETTING_SmsAlertPhone1:
                if (!$o) $o = 2989;
            case SETTING_SmsAlertPhone2:
                if (!$o) $o = 3069;
            case SETTING_SmsAlertPhone3:
                if (!$o) $o = 3079;
            case 99186:
                if (!$o) $o = EVENT_PHONE_CalledBy1 + 4;
            case 99200:
                if (!$o) $o = EVENT_PHONE_CalledBy2 + 4;
            case 99214:
                if (!$o) $o = EVENT_PHONE_CalledBy3 + 4;
            case SETTING_PrivateSMSC:
                if (!$o) $o = 2942;
                if ($Get) {
                    $rData = '';
                    for ($b = $o, $e = $b + 10; $b < $e; $b++) for ($n = 0; $n < 2; $n++) {
                        if (!$n) $d = ord($this->mSettings[$b]) >> 4; else $d = ord($this->mSettings[$b]) & 0xF;
                        if ($d == 0xF) return true;
                        if ($d > 9) {
                            $rData = '';
                            return true;
                        }
                        $rData .= sprintf('%d', $d);
                    }
                    if (strspn($rData, '0') >= 20) $rData = '';
                    return true;
                }
                $Len = strlen($rData);
                if ($Len && (($Len != strspn($rData, '0123456789')) || ($Len > 20))) {
                    $this->mLastError = "Invalid phone number ($rData)";
                    return false;
                }
                for ($i = 0; $i < 20; $i++) {
                    if ($i < $Len) $d = (int)$rData[$i]; else $d = 0xF;
                    $b = ord($this->mSettings[$o]);
                    if ($i % 2) {
                        $this->mSettings[$o] = chr(($b & 0xF0) | $d);
                        $o++;
                    } else $this->mSettings[$o] = chr(($b & 0xF) | ($d << 4));
                }
                return true;
            case SETTING_AccessPointName:
                if (!$o) {
                    $o = 1866;
                    $m = 29;
                }
            case SETTING_AccessPointLogin:
                if (!$o) {
                    $o = 1929;
                    $m = 19;
                }
            case SETTING_AccessPointPassword:
                if (!$o) {
                    $o = 1992;
                    $m = 19;
                }
                if ($Get) {
                    for ($rData = '', $e = $o + $m; ($o < $e) && ord($this->mSettings[$o]); $o++) $rData .= $this->mSettings[$o];
                    return true;
                }
                $l = strlen($rData);
                if (($l > $m)) {
                    $this->mLastError = "Invalid or too many characters ($rData)";
                    return false;
                }
                for ($i = 0, $e = $o + $m; $o < $e; $i++, $o++) $this->mSettings[$o] = $i < $l ? $rData[$i] : chr(0);
                return true;
            case SETTING_PrimaryServerDomain:
                if (!$o) {
                    $o = 2871;
                    $m = 32;
                }
            case SETTING_SecondaryServerDomain:
                if (!$o) {
                    $o = 2903;
                    $m = 32;
                }
            case SETTING_PrimaryTcpDataFormat:
                if (!$o) {
                    $o = 2063;
                    $m = 100;
                }
            case SETTING_PrimaryTcpExtraDataFormat:
                if (!$o) {
                    $o = 2213;
                    $m = 160;
                }
            case SETTING_SecondaryTcpDataFormat:
                if (!$o) {
                    $o = 2521;
                    $m = 100;
                }
            case SETTING_SecondaryTcpExtraDataFormat:
                if (!$o) {
                    $o = 2671;
                    $m = 160;
                }
                if ($Get) {
                    for ($rData = '', $e = $o + $m; ($o < $e) && ord($this->mSettings[$o]); $o++) $rData .= $this->mSettings[$o];
                    return true;
                }
                $l = strlen($rData);
                if ($l > $m) {
                    $this->mLastError = "Too many characters ($rData)";
                    return false;
                }
                for ($i = 0, $e = $o + $m; $o < $e; $i++, $o++) $this->mSettings[$o] = $i < $l ? $rData[$i] : chr(0);
                return true;
            case SETTING_PowerSavingVoltage:
                if (!$o) $o = 1848;
            case SETTING_PowerDownVoltage:
                if (!$o) $o = 1850;
            case SETTING_PowerUpVoltage:
                if (!$o) $o = 1852;
            case SETTING_MovingMinVoltage:
                if (!$o) $o = 1854;
            case SETTING_MovingMaxVoltage:
                if (!$o) $o = 1856;
            case SETTING_MovingMinVoltage2:
                if (!$o) $o = 2438;
            case SETTING_MovingMaxVoltage2:
                if (!$o) $o = 2440;
            case SETTING_MovingVoltageChange:
                if (!$o) $o = 3067;
            case EVENT_VOLTAGE_Below:
                if (!$o) $o = 3049;
            case EVENT_VOLTAGE_Above:
                if (!$o) $o = 3055;
            case SETTING_PowerSavingVoltageBackup:
                if (!$o) $o = 2424;
            case SETTING_PowerDownVoltageBackup:
                if (!$o) $o = 2426;
            case SETTING_PowerUpVoltageBackup:
                if (!$o) $o = 2428;
                if ($Get) {
                    $rData = (float)(ord($this->mSettings[$o]) | (ord($this->mSettings[$o + 1]) << 8)) / (float)2184;
                    return true;
                }
                if (($rData < 0.0) || ($rData > 30.0)) {
                    $this->mLastError = "Invalid voltage ($rData)";
                    return false;
                }
                $i = (int)((float)$rData * (float)2184);
                $this->mSettings[$o] = chr($i & 255);
                $this->mSettings[$o + 1] = chr(($i >> 8) & 255);
                return true;
            case SETTING_DoNotUseSmartFlashLogging:
                if (!$o) {
                    $o = 2854;
                    $m = 64;
                }
            case SETTING_NoAccelEventsWhileNotMoving:
                if (!$o) {
                    $o = 2854;
                    $m = 16;
                }
            case SETTING_RFpatchXmitPowerInSerial:
                if (!$o) {
                    $o = 2854;
                    $m = 128;
                }
            case SETTING_DoNotLogPowerDownBackupRecords:
                if (!$o) {
                    $o = 2856;
                    $m = 128;
                }
            case SETTING_DoNotLogCounters:
                if (!$o) {
                    $o = 2856;
                    $m = 64;
                }
            case SETTING_RFport1_Transmit:
                if (!$o) {
                    $o = 2379;
                    $m = 128;
                }
            case SETTING_RFport1_Listen:
                if (!$o) {
                    $o = 2380;
                    $m = 1;
                }
            case SETTING_RFport1_PingNoAckRequest:
                if (!$o) {
                    $o = 2870;
                    $m = 32;
                }
            case SETTING_RFport2_Transmit:
                if (!$o) {
                    $o = 2383;
                    $m = 128;
                }
            case SETTING_RFport2_Listen:
                if (!$o) {
                    $o = 2384;
                    $m = 1;
                }
            case SETTING_RFport2_PingNoAckRequest:
                if (!$o) {
                    $o = 2384;
                    $m = 32;
                }
            case SETTING_RFport3_Transmit:
                if (!$o) {
                    $o = 2387;
                    $m = 128;
                }
            case SETTING_RFport3_Listen:
                if (!$o) {
                    $o = 2388;
                    $m = 1;
                }
            case SETTING_RFport3_PingNoAckRequest:
                if (!$o) {
                    $o = 2388;
                    $m = 32;
                }
            case SETTING_RFport4_Transmit:
                if (!$o) {
                    $o = 2391;
                    $m = 128;
                }
            case SETTING_RFport4_Listen:
                if (!$o) {
                    $o = 2392;
                    $m = 1;
                }
            case SETTING_RFport4_PingNoAckRequest:
                if (!$o) {
                    $o = 2392;
                    $m = 32;
                }
            case SETTING_TransmitPowerDownBackupRecords:
                if (!$o) {
                    $o = 2870;
                    $m = 128;
                }
            case SETTING_LogReceivedSmsText:
                if (!$o) {
                    $o = 2870;
                    $m = 64;
                }
            case SETTING_MovingWhenPowerBetween:
                if (!$o) {
                    $o = 1858;
                    $m = 1;
                }
            case SETTING_MovingOnSensorDetect:
                if (!$o) {
                    $o = 1858;
                    $m = 2;
                }
            case SETTING_IncludeGpsPositionWithPhoto:
                if (!$o) {
                    $o = 3018;
                    $m = 1;
                }
            case 1002:
                if (!$o) {
                    $o = 1859;
                    $m = 1;
                }
            case SETTING_DoNotSendInternalStatusMessages:
                if (!$o) {
                    $o = 1859;
                    $m = 2;
                }
            case SETTING_MovingOnGpsDelta:
                if (!$o) {
                    $o = 1859;
                    $m = 4;
                }
            case 1003:
                if (!$o) {
                    $o = 1859;
                    $m = 8;
                }
            case SETTING_AcknowledgeSmsToIncomingCallsAndSms:
                if (!$o) {
                    $o = 1859;
                    $m = 128;
                }
            case SETTING_DoNotOverWriteFullLog:
                if (!$o) {
                    $o = 1860;
                    $m = 64;
                }
            case SETTING_DisableModuleIndicatorLEDs:
                if (!$o) {
                    $o = 1860;
                    $m = 128;
                }
            case SETTING_DisableGpsConfirmation:
                if (!$o) {
                    $o = 1861;
                    $m = 1;
                }
            case SETTING_DisableSpeedAboveEventRegions:
                if (!$o) {
                    $o = 1861;
                    $m = 2;
                }
            case SETTING_FasterSocketClosing:
                if (!$o) {
                    $o = 1861;
                    $m = 4;
                }
            case SETTING_MaximumPowerSaving:
                if (!$o) {
                    $o = 1861;
                    $m = 8;
                }
            case SETTING_ForceSpeedToZeroWhenNotMoving:
                if (!$o) {
                    $o = 1861;
                    $m = 16;
                }
            case SETTING_AlertSmsPositionFormat:
                if (!$o) {
                    $o = 1861;
                    $m = 32;
                }
            case SETTING_UseGsmPowerSaving:
                if (!$o) {
                    $o = 1861;
                    $m = 64;
                }
            case SETTING_SeparateEventIdTransmissions:
                if (!$o) {
                    $o = 3091;
                    $m = 2;
                }
            case SETTING_SubstituteTemperatureWithExternalDS18B20:
                if (!$o) {
                    $o = 3091;
                    $m = 4;
                }
            case SETTING_SendSettingsWhenChanged:
                if (!$o) {
                    $o = 3091;
                    $m = 8;
                }
            case SETTING_DoNotLogReceivedSmsEvent:
                if (!$o) {
                    $o = 3091;
                    $m = 16;
                }
            case SETTING_IgnoreSmsCommands:
                if (!$o) {
                    $o = 3018;
                    $m = 32;
                }
            case SETTING_AnalogInput1and2NOTdigital:
                if (!$o) {
                    $o = 3018;
                    $m = 64;
                }
            case SETTING_AnalogInput3and4NOTdigital:
                if (!$o) {
                    $o = 3018;
                    $m = 128;
                }
            case SETTING_AnalogInputLoggingWithCounters:
                if (!$o) {
                    $o = 3019;
                    $m = 1;
                }
            case SETTING_AnalogInput_LowPassFilter_Disabled:
                if (!$o) {
                    $o = 3019;
                    $m = 2;
                }
            case SETTING_NoGpsLogsWithUndefinedEventId:
                if (!$o) {
                    $o = 3019;
                    $m = 32;
                }
            case SETTING_UseSystemTimeForKeepAlive:
                if (!$o) {
                    $o = 3019;
                    $m = 64;
                }
            case SETTING_DoNotLogCalledByEvent:
                if (!$o) {
                    $o = 3019;
                    $m = 128;
                }
            case SETTING_LogPhotos:
                if (!$o) {
                    $o = 1858;
                    $m = 16;
                }
            case SETTING_ProhibitSettingsReadback:
                if (!$o) {
                    $o = 2051;
                    $m = 1;
                }
            case SETTING_ResetDistanceEventPerGpsLog:
                if (!$o) {
                    $o = 1858;
                    $m = 32;
                }
            case SETTING_DisableStationaryMotionFilter:
                if (!$o) {
                    $o = 2052;
                    $m = 2;
                }
            case SETTING_DoNotLogHighestSpeedWithCounters:
                if (!$o) {
                    $o = 2052;
                    $m = 4;
                }
            case SETTING_MovingWhenPowerBetween2:
                if (!$o) {
                    $o = 2052;
                    $m = 8;
                }
            case SETTING_AllowDisablingSerialAndPower:
                if (!$o) {
                    $o = 2052;
                    $m = 16;
                }
            case SETTING_DisablePulseCounterHardware:
                if (!$o) {
                    $o = 2052;
                    $m = 64;
                }
            case SETTING_AutoAccelSensorOrientationCalibration:
                if (!$o) {
                    $o = 2052;
                    $m = 128;
                }
            case SETTING_GPSC_onoff:
                if (!$o) {
                    $o = 2483;
                    $m = 16;
                }
            case SETTING_DoNotLog1WireAttach:
                if (!$o) {
                    $o = 2483;
                    $m = 32;
                }
            case SETTING_DoNotLog1WireDetach:
                if (!$o) {
                    $o = 2483;
                    $m = 64;
                }
            case SETTING_EncryptSimPin:
                if (!$o) {
                    $o = 2483;
                    $m = 128;
                }
            case SETTING_NoAutomaticApnOverride:
                if (!$o) {
                    $o = 2967;
                    $m = 1;
                }
            case SETTING_MovingOnVibrationSensorDetect:
                if (!$o) {
                    $o = 2967;
                    $m = 2;
                }
            case SETTING_OnlyLogInternalPowerSupplyVoltage:
                if (!$o) {
                    $o = 2967;
                    $m = 16;
                }
            case SETTING_WakeUpBy_Time:
                if (!$o) {
                    $o = 1900;
                    $m = 1;
                }
            case SETTING_WakeUpBy_VibrationSensor:
                if (!$o) {
                    $o = 1900;
                    $m = 2;
                }
            case SETTING_WakeUpBy_IOchange:
                if (!$o) {
                    $o = 1900;
                    $m = 4;
                }
            case SETTING_WakeUpBy_AccelSensor:
                if (!$o) {
                    $o = 1900;
                    $m = 8;
                }
            case SETTING_DisableGpsBackup:
                if (!$o) {
                    $o = 2968;
                    $m = 128;
                }
            case SETTING_EnableSBAS:
                if (!$o) {
                    $o = 1965;
                    $m = 64;
                }
            case SETTING_DisableAccelSensor:
                if (!$o) {
                    $o = 1965;
                    $m = 128;
                }
            case SETTING_IncludeIndexWithSerialRecords:
                if (!$o) {
                    $o = 1966;
                    $m = 64;
                }
            case SETTING_TriggerCalledByPhone1ForAnyNumber:
                if (!$o) {
                    $o = 1966;
                    $m = 128;
                }
            case SETTING_StartWithSecondaryServerForOddImei:
                if (!$o) {
                    $o = 2020;
                    $m = 1;
                }
            case SETTING_IgnorePowerDownVoltage:
                if (!$o) {
                    $o = 2020;
                    $m = 4;
                }
            case SETTING_InsideOutsideRegionEventTriggering:
                if (!$o) {
                    $o = 2020;
                    $m = 8;
                }
            case SETTING_PowerUpRecordHandling:
                if (!$o) {
                    $o = 2020;
                    $m = 2;
                }
            case SETTING_UseSettleDelayUpFlankInput1:
                if (!$o) {
                    $o = 2027;
                    $m = 1;
                }
            case SETTING_UseSettleDelayUpFlankInput2:
                if (!$o) {
                    $o = 2027;
                    $m = 2;
                }
            case SETTING_UseSettleDelayUpFlankInput3:
                if (!$o) {
                    $o = 2027;
                    $m = 4;
                }
            case SETTING_UseSettleDelayUpFlankInput4:
                if (!$o) {
                    $o = 2027;
                    $m = 8;
                }
            case SETTING_UseSettleDelayUpFlankInput5:
                if (!$o) {
                    $o = 2027;
                    $m = 16;
                }
            case SETTING_UseSettleDelayDownFlankInput1:
                if (!$o) {
                    $o = 2028;
                    $m = 1;
                }
            case SETTING_UseSettleDelayDownFlankInput2:
                if (!$o) {
                    $o = 2028;
                    $m = 2;
                }
            case SETTING_UseSettleDelayDownFlankInput3:
                if (!$o) {
                    $o = 2028;
                    $m = 4;
                }
            case SETTING_UseSettleDelayDownFlankInput4:
                if (!$o) {
                    $o = 2028;
                    $m = 8;
                }
            case SETTING_UseSettleDelayDownFlankInput5:
                if (!$o) {
                    $o = 2028;
                    $m = 16;
                }
            case SETTING_ActiveRFIDremovalDelayMultiply:
                if (!$o) {
                    $o = 2020;
                    $m = 64;
                }
            case SETTING_TransmitSV_LcdData1AtBatchStart:
                if (!$o) {
                    $o = 2020;
                    $m = 128;
                }
            case SETTING_DoNotTurnOnGpsAtStartup:
                if (!$o) {
                    $o = 2021;
                    $m = 1;
                }
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) & $m) ? true : false;
                    return true;
                }
                if ($rData) $this->mSettings[$o] = chr(ord($this->mSettings[$o]) | $m); else $this->mSettings[$o] = chr(ord($this->mSettings[$o]) & ~$m);
                return true;
            case SETTING_TravelledMetersODO:
                if (!$o) {
                    $o = 2840;
                    $s = 0;
                }
            case SETTING_SignalPatternOutput1:
                if (!$o) {
                    $o = 2850;
                    $s = 4;
                }
            case SETTING_SignalPatternOutput2:
                if (!$o) {
                    $o = 2850;
                    $s = 5;
                }
            case SETTING_SignalPatternOutput3:
                if (!$o) {
                    $o = 2850;
                    $s = 6;
                }
            case SETTING_SignalPatternOutput4:
                if (!$o) {
                    $o = 2850;
                    $s = 7;
                }
            case SETTING_CameraType:
                if (!$o) {
                    $o = 2850;
                    $s = 3;
                }
            case SETTING_LogRecordSimulateInputVolt:
                if (!$o) {
                    $o = 2854;
                    $s = 5;
                }
            case SETTING_RS485Wires:
                if (!$o) {
                    $o = 2855;
                    $s = 4;
                }
            case SETTING_HeadingDegreesRelativity:
                if (!$o) {
                    $o = 2021;
                    $s = 3;
                }
            case SETTING_RandomizeTimeOfDayEvents:
                if (!$o) {
                    $o = 2021;
                    $s = 2;
                }
            case SETTING_LcdMode:
                if (!$o) {
                    $o = 2021;
                    $s = 1;
                }
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> $s) & 1;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(1 << $s)) | (($rData & 1) << $s));
                return true;
            case SETTING_RFport1_Speed:
                if (!$o) {
                    $o = 2380;
                    $s = 1;
                }
            case SETTING_RFport2_Speed:
                if (!$o) {
                    $o = 2384;
                    $s = 1;
                }
            case SETTING_RFport3_Speed:
                if (!$o) {
                    $o = 2388;
                    $s = 1;
                }
            case SETTING_RFport4_Speed:
                if (!$o) {
                    $o = 2392;
                    $s = 1;
                }
            case SETTING_RFport1_Power:
                if (!$o) {
                    $o = 2380;
                    $s = 3;
                }
            case SETTING_RFport2_Power:
                if (!$o) {
                    $o = 2384;
                    $s = 3;
                }
            case SETTING_RFport3_Power:
                if (!$o) {
                    $o = 2388;
                    $s = 3;
                }
            case SETTING_RFport4_Power:
                if (!$o) {
                    $o = 2392;
                    $s = 3;
                }
            case SETTING_RFport1_Forward:
                if (!$o) {
                    $o = 2865;
                    $s = 0;
                }
            case SETTING_RFport2_Forward:
                if (!$o) {
                    $o = 2865;
                    $s = 2;
                }
            case SETTING_RFport3_Forward:
                if (!$o) {
                    $o = 2865;
                    $s = 4;
                }
            case SETTING_RFport4_Forward:
                if (!$o) {
                    $o = 2865;
                    $s = 6;
                }
            case SETTING_VirtualVibrationMotorConnection:
                if (!$o) {
                    $o = 2870;
                    $s = 4;
                }
            case SETTING_WakeUpBy_RF:
                if (!$o) {
                    $o = 1900;
                    $s = 4;
                }
            case SETTING_SendGpsLogWhenRoaming:
                if (!$o) {
                    $o = 1858;
                    $s = 2;
                }
            case 1001:
                if (!$o) {
                    $o = 1858;
                    $s = 6;
                }
            case SETTING_ModuleDataLogging:
                if (!$o) {
                    $o = 1860;
                    $s = 0;
                }
            case SETTING_GsmAutoBanding:
                if (!$o) {
                    $o = 3091;
                    $s = 6;
                }
            case SETTING_NetworkRecordHandling:
                if (!$o) {
                    $o = 2967;
                    $s = 2;
                }
            case SETTING_UseGsmPowerSaving2:
                if (!$o) {
                    $o = 1966;
                    $s = 0;
                }
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> $s) & 3;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(3 << $s)) | (($rData & 3) << $s));
                return true;
            case SETTING_AccelSensorFilter:
                if (!$o) {
                    $o = 2850;
                    $s = 0;
                }
            case SETTING_WakeUpRFpollInterval:
                if (!$o) {
                    $o = 2855;
                    $s = 5;
                }
            case SETTING_FilterLevelInput1:
                if (!$o) {
                    $o = 2967;
                    $s = 5;
                }
            case SETTING_FilterLevelInput2:
                if (!$o) {
                    $o = 2968;
                    $s = 0;
                }
            case SETTING_FilterLevelInput3:
                if (!$o) {
                    $o = 2968;
                    $s = 3;
                }
            case SETTING_FilterLevelInput4:
                if (!$o) {
                    $o = 1965;
                    $s = 0;
                }
            case SETTING_FilterLevelInput5:
                if (!$o) {
                    $o = 1965;
                    $s = 3;
                }
            case SETTING_MotionTriggerAction_Voltage:
                if (!$o) {
                    $o = 2022;
                    $s = 0;
                }
            case SETTING_MotionTriggerAction_Voltage2:
                if (!$o) {
                    $o = 2022;
                    $s = 3;
                }
            case SETTING_MotionTriggerAction_AccelSensor:
                if (!$o) {
                    $o = 2023;
                    $s = 1;
                }
            case SETTING_MotionTriggerAction_GpsSpeed:
                if (!$o) {
                    $o = 2023;
                    $s = 4;
                }
            case SETTING_GpsReceiverPort:
                if (!$o) {
                    $o = 1966;
                    $s = 3;
                }
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> $s) & 7;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(7 << $s)) | (($rData & 7) << $s));
                return true;
            case SETTING_MotionTriggerAction_VibrationSensor:
                if ($Get) {
                    $rData = (((ord($this->mSettings[2023]) << 8) | ord($this->mSettings[2022])) >> 6) & 7;
                    return true;
                }
                $this->mSettings[2022] = chr((ord($this->mSettings[2022]) & ~(7 << 6)) | (($rData & 7) << 6));
                $this->mSettings[2023] = chr((ord($this->mSettings[2023]) & ~1) | (($rData >> 2) & 1));
                return true;
            case SETTING_GpsLogSwitchType:
                if (!$o) {
                    $o = 3019;
                    $s = 2;
                }
                if ($Get) {
                    $rData = ord($this->mSettings[1899]);
                    if (!$rData) $rData = (ord($this->mSettings[$o]) >> $s) & 7;
                    return true;
                }
                if ($rData >= 7) {
                    $this->mSettings[1899] = chr($rData & 255);
                    $this->mSettings[$o] = chr(ord($this->mSettings[$o]) & ~(7 << $s));
                } else {
                    $this->mSettings[1899] = chr(0);
                    $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(7 << $s)) | (($rData & 7) << $s));
                }
                return true;
            case SETTING_MicrophoneGain:
                if (!$o) {
                    $o = 2854;
                    $s = 0;
                }
            case SETTING_SpeedAboveEventSamples:
                if (!$o) {
                    $o = 2849;
                    $s = 0;
                }
            case SETTING_RS485PortSimulation:
                if (!$o) {
                    $o = 2855;
                    $s = 0;
                }
            case SETTING_MinimumSatellitesForRegionDetection:
                if (!$o) {
                    $o = 3018;
                    $s = 1;
                }
            case SETTING_ModulePortProtocol1:
                if (!$o) {
                    $o = 3058;
                    $s = 0;
                }
            case SETTING_ModulePortProtocol2:
                if (!$o) {
                    $o = 3060;
                    $s = 0;
                }
            case SETTING_ModulePortProtocol3:
                if (!$o) {
                    $o = 3062;
                    $s = 0;
                }
            case SETTING_ModulePortProtocol4:
                if (!$o) {
                    $o = 3064;
                    $s = 0;
                }
            case SETTING_ModulePortBaudrate1:
                if (!$o) {
                    $o = 3058;
                    $s = 4;
                }
            case SETTING_ModulePortBaudrate2:
                if (!$o) {
                    $o = 3060;
                    $s = 4;
                }
            case SETTING_ModulePortBaudrate3:
                if (!$o) {
                    $o = 3062;
                    $s = 4;
                }
            case SETTING_ModulePortBaudrate4:
                if (!$o) {
                    $o = 3064;
                    $s = 4;
                }
            case SETTING_IncomingPhoneCallAction:
                if (!$o) {
                    $o = 2483;
                    $s = 0;
                }
            case SETTING_SerialPortInputBytesFilterMode12:
                if (!$o) {
                    $o = 2482;
                    $s = 0;
                }
            case SETTING_SerialPortInputBytesFilterMode34:
                if (!$o) {
                    $o = 2482;
                    $s = 4;
                }
            case SETTING_CanBusInterface:
                if (!$o) {
                    $o = 1967;
                    $s = 0;
                }
            case SETTING_CanBusSpeed:
                if (!$o) {
                    $o = 1967;
                    $s = 4;
                }
            case SETTING_GprsClass:
                if (!$o) {
                    $o = 2013;
                    $s = 0;
                }
            case SETTING_GpsSpeedInvalidateSeconds:
                if (!$o) {
                    $o = 2021;
                    $s = 4;
                }
            case SETTING_GSMPCL:
                if (!$o) {
                    $o = 2012;
                    $s = 0;
                }
            case SETTING_DCSPCL:
                if (!$o) {
                    $o = 2012;
                    $s = 4;
                }
            case SETTING_DigitsCheckCalledBy1:
                if (!$o) {
                    $o = 2869;
                    $s = 0;
                }
            case SETTING_DigitsCheckCalledBy2:
                if (!$o) {
                    $o = 2869;
                    $s = 4;
                }
            case SETTING_DigitsCheckCalledBy3:
                if (!$o) {
                    $o = 2870;
                    $s = 0;
                }
            case SETTING_VirtualizeOutputs:
                if (!$o) {
                    $o = 2013;
                    $s = 4;
                }
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> $s) & 15;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(15 << $s)) | (($rData & 15) << $s));
                return true;
            case SETTING_MinDbmForMinSatsForGpsPosition:
                if ($Get) {
                    $rData = ord($this->mSettings[2856]) & 63;
                    return true;
                }
                $this->mSettings[2856] = chr((ord($this->mSettings[2856]) & ~63) | ($rData & 63));
                return true;
            case SETTING_RFport1_Channel:
                if (!$o) {
                    $o = 2379;
                    $s = 0;
                }
            case SETTING_RFport2_Channel:
                if (!$o) {
                    $o = 2383;
                    $s = 0;
                }
            case SETTING_RFport3_Channel:
                if (!$o) {
                    $o = 2387;
                    $s = 0;
                }
            case SETTING_RFport4_Channel:
                if (!$o) {
                    $o = 2391;
                    $s = 0;
                }
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> $s) & 127;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(127 << $s)) | (($rData & 127) << $s));
                return true;
            case SETTING_MinRegionDetectAccuracyValue:
                $o = 3092;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]) >> 3;
                    return true;
                }
                if ($rData && (($rData < 2) || ($rData > 21))) {
                    $this->mLastError = "Invalid data ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & 7) | ($rData << 3));
                return true;
            case SETTING_InvertSerialRxTx:
                if (!$o) $o = 2853;
            case SETTING_MinMotionDetectionAccuracy:
                if (!$o) $o = 2851;
            case SETTING_RFpingCustomData:
                if (!$o) $o = 2852;
            case SETTING_RFPollIntervalWhenAccelMotionActive:
                if (!$o) $o = 2866;
            case SETTING_RFPollIntervalWhenAccelMotionInactive:
                if (!$o) $o = 2867;
            case SETTING_RFPollTimeout:
                if (!$o) $o = 2868;
            case SETTING_KeepAliveTimeOutSecs:
                if (!$o) $o = 3023;
            case SETTING_KeepAliveTimeOutSecsPowerSaving:
                if (!$o) $o = 3024;
            case SETTING_RestartGpsTimeOutMins:
                if (!$o) $o = 3029;
            case SETTING_RestartGpsTimeOutMinsPowerSaving:
                if (!$o) $o = 3038;
            case SETTING_ModulePortMode1:
                if (!$o) $o = 3057;
            case SETTING_ModulePortMode2:
                if (!$o) $o = 3059;
            case SETTING_ModulePortMode3:
                if (!$o) $o = 3061;
            case SETTING_ModulePortMode4:
                if (!$o) $o = 3063;
            case SETTING_MaxGprsConnectTimeout:
                if (!$o) $o = 2510;
            case SETTING_SmsTimeout:
                if (!$o) $o = 2511;
            case SETTING_CleanGpsInfoTimeOutMins:
                if (!$o) $o = 3039;
            case SETTING_CleanGpsInfoTimeOutMinsPowerSaving:
                if (!$o) $o = 3040;
            case SETTING_PowerDownGpsTimeOutMins:
                if (!$o) $o = 3041;
            case SETTING_PowerDownGpsTimeOutMinsPowerSaving:
                if (!$o) $o = 3042;
            case SETTING_PortDataBufferingTimeout:
                if (!$o) $o = 3066;
            case SETTING_MinimumGpsSpeedForMotionDetection:
                if (!$o) $o = 2935;
            case SETTING_MinimumGpsSpeedForTravelling:
                if (!$o) $o = 2936;
            case SETTING_iButtonRemovalDelay:
                if (!$o) $o = 2937;
            case SETTING_MinPositionAccuracyValue:
                if (!$o) $o = 2442;
            case SETTING_MinimumSatellitesForPosition:
                if (!$o) $o = 2443;
            case SETTING_MaximumSpeedForPosition:
                if (!$o) $o = 2444;
            case SETTING_PowerDownAboveDegreesCelcius:
                if (!$o) $o = 2454;
            case SETTING_PowerSavingAboveDegreesCelcius:
                if (!$o) $o = 2455;
            case SETTING_AccelEventsTriggering:
                if (!$o) $o = 2484;
            case SETTING_SpeedEventsTriggering:
                if (!$o) $o = 2964;
            case SETTING_VibrationSensorMinimumEventCount:
                if (!$o) $o = 1895;
            case SETTING_VibrationSensorCountTimeSpan:
                if (!$o) $o = 1896;
            case SETTING_PostponeActionJumpWhileExecutingIndexBelow:
                if (!$o) $o = 1897;
            case SETTING_PostponeActionJumpWhileExecutingIndexAbove:
                if (!$o) $o = 1898;
            case SETTING_GPScurrentMin:
                if (!$o) $o = 1948;
            case SETTING_GPScurrentMax:
                if (!$o) $o = 1949;
            case SETTING_GPScurrentDelay:
                if (!$o) $o = 1950;
            case SETTING_SmsRetries:
                if (!$o) $o = 3020;
            case SETTING_Action39GpsPowerTimeMoving:
                if (!$o) $o = 2024;
            case SETTING_Action39GpsPowerTimeNotMoving:
                if (!$o) $o = 2025;
            case SETTING_VibrationSensorCountMinimumSeconds:
                if (!$o) $o = 2026;
            case SETTING_ServerAckTimeout:
                if (!$o) $o = 2029;
            case SETTING_SettleDelayTimeInput1:
                if (!$o) $o = 2208;
            case SETTING_SettleDelayTimeInput2:
                if (!$o) $o = 2209;
            case SETTING_SettleDelayTimeInput3:
                if (!$o) $o = 2210;
            case SETTING_SettleDelayTimeInput4:
                if (!$o) $o = 2211;
            case SETTING_SettleDelayTimeInput5:
                if (!$o) $o = 2212;
            case SETTING_TestCode:
                if (!$o) $o = 2011;
            case SETTING_TestCode2:
                if (!$o) $o = 2668;
            case SETTING_TestCode3:
                if (!$o) $o = 2669;
            case SETTING_TestCode4:
                if (!$o) $o = 2670;
            case SETTING_GpsSpeedInvalidateMinimumKmh:
                if (!$o) $o = 2664;
            case SETTING_GpsSpeedInvalidateAboveOdoKmh:
                if (!$o) $o = 2665;
            case SETTING_GpsSpeedInvalidateBelowOdoKmh:
                if (!$o) $o = 2666;
            case SETTING_GpsSpeedInvalidateKmhChangePerSecond:
                if (!$o) $o = 2667;
            case SETTING_SingleTriggerTimer:
                if (!$o) $o = 2663;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]);
                    return true;
                }
                if (($rData & 255) != $rData) {
                    $this->mLastError = "Invalid data ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr($rData & 255);
                return true;
            case SETTING_MaxGprsCost:
                if (!$o) $o = 2509;
            case SETTING_SocketClosureDelaySecs:
                if (!$o) $o = 3065;
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) ^ 0xFF) & 0xFF;
                    return true;
                }
                if (($rData & 255) != $rData) {
                    $this->mLastError = "Invalid data ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr((($rData & 255) ^ 0xFF) & 0xFF);
                return true;
            case SETTING_RFport1_Address:
                if (!$o) $o = 2377;
            case SETTING_RFport2_Address:
                if (!$o) $o = 2381;
            case SETTING_RFport3_Address:
                if (!$o) $o = 2385;
            case SETTING_RFport4_Address:
                if (!$o) $o = 2389;
            case SETTING_PrimaryServerTcpPort:
                if (!$o) $o = 2059;
            case SETTING_PrimaryServerUdpPort:
                if (!$o) $o = 2061;
            case SETTING_SecondaryServerTcpPort:
                if (!$o) $o = 2517;
            case SETTING_SecondaryServerUdpPort:
                if (!$o) $o = 2519;
            case SETTING_TransmitLogWhenGpsRecordsReaches:
                if (!$o) $o = 3013;
            case SETTING_LogItemsLimit:
                if (!$o) $o = 3015;
            case SETTING_SocketTimeout:
                if (!$o) $o = 3021;
            case SETTING_RebootWithoutServerConnectionSeconds:
                if (!$o) $o = 3043;
            case SETTING_RebootOnDelayedTransmissionInSeconds:
                if (!$o) $o = 3089;
            case SETTING_MinSensorDetectionStartMoving:
                if (!$o) $o = 2430;
            case SETTING_MinSensorDetectionKeepMoving:
                if (!$o) $o = 2432;
            case SETTING_MinimumAccelSensorMotionForRegionDetection:
                if (!$o) $o = 2445;
            case SETTING_CameraIlluminationOutputs:
                if (!$o) $o = 2965;
            case SETTING_GPSC_T_on:
                if (!$o) $o = 2952;
            case SETTING_GPSC_T_off:
                if (!$o) $o = 2954;
            case SETTING_GPSC_T_acq:
                if (!$o) $o = 2956;
            case SETTING_GPSC_T_acq_off:
                if (!$o) $o = 2958;
            case SETTING_GPSC_T_reacq:
                if (!$o) $o = 2960;
            case SETTING_GPSC_T_reacq_off:
                if (!$o) $o = 2962;
            case SETTING_WakeUpTime:
                if (!$o) $o = 1901;
            case SETTING_WakeUpIOchange:
                if (!$o) $o = 1903;
            case SETTING_AccidentRecordingHistoryRecordAmount:
                if (!$o) $o = 2409;
            case SETTING_AccidentRecordingFutureRecordAmount:
                if (!$o) $o = 2411;
            case SETTING_VibrationSensorNextWakeUpDelay:
                if (!$o) $o = 1963;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]) | (ord($this->mSettings[$o + 1]) << 8);
                    return true;
                }
                $this->mSettings[$o] = chr($rData & 255);
                $this->mSettings[$o + 1] = chr(($rData >> 8) & 255);
                return true;
            case SETTING_GprsTransmitInterval:
                if (!$o) $o = 1862;
            case SETTING_PrimaryServerIP:
                if (!$o) $o = 2055;
            case SETTING_SecondaryServerIP:
                if (!$o) $o = 2513;
            case SETTING_SmsTransmitInterval:
                if (!$o) $o = 2971;
            case SETTING_SmsAlertMinimumInterval:
                if (!$o) $o = 2985;
            case SETTING_GsmDataTransmitInterval:
                if (!$o) $o = 2999;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]) | (ord($this->mSettings[$o + 1]) << 8) | (ord($this->mSettings[$o + 2]) << 16) | (ord($this->mSettings[$o + 3]) << 24);
                    return true;
                }
                $this->mSettings[$o] = chr($rData & 255);
                $this->mSettings[$o + 1] = chr(($rData >> 8) & 255);
                $this->mSettings[$o + 2] = chr(($rData >> 16) & 255);
                $this->mSettings[$o + 3] = chr(($rData >> 24) & 255);
                return true;
            case SETTING_GmtOffsetInQuarters:
                $o = 3030;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]);
                    if ($rData & 0x80) $rData = -(($rData ^ 0xFF) - 3); else $rData += 4;
                    return true;
                }
                $rData -= 4;
                if ($rData >= 0) $this->mSettings[$o] = chr($rData & 127); else $this->mSettings[$o] = chr($rData & 255);
                return true;
            case SETTING_MotionDetectionSecondsTimeout:
                $o = 3031;
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) | (ord($this->mSettings[$o + 1]) << 8)) + 180;
                    if ($rData > 65355) $rData -= 65356 + 180;
                    return true;
                }
                $i = $rData - 180;
                if ($i < 0) $i += 65356 + 180;
                $this->mSettings[$o] = chr($i & 255);
                $this->mSettings[$o + 1] = chr(($i >> 8) & 255);
                return true;
            case SETTING_MaxBatchTransmission:
                $o = 1860;
                if ($Get) {
                    $rData = ((ord($this->mSettings[2051]) & 48) | ((ord($this->mSettings[$o]) >> 2) & 15)) + 1;
                    return true;
                }
                if (($rData < 1) || ($rData > 42)) {
                    $this->mLastError = "Invalid size ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~(15 << 2)) | ((((int)$rData - 1) & 15) << 2));
                $this->mSettings[2051] = chr((ord($this->mSettings[2051]) & ~48) | (((int)$rData - 1) & 48));
                return true;
            case SETTING_1WireBusChangeEvent:
                $o = 2051;
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> 1) & 1;
                    return true;
                }
                if (($rData < 0) || ($rData > 1)) {
                    $this->mLastError = "Invalid value ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & ~2) | (((int)$rData & 1) << 1));
                return true;
            case SETTING_HomeNetwork1:
                if (!$o) $o = 2485;
            case SETTING_HomeNetwork2:
                if (!$o) $o = 2488;
            case SETTING_HomeNetwork3:
                if (!$o) $o = 2491;
            case SETTING_HomeNetwork4:
                if (!$o) $o = 2494;
            case SETTING_HomeNetwork5:
                if (!$o) $o = 2497;
            case SETTING_HomeNetwork6:
                if (!$o) $o = 2500;
            case SETTING_HomeNetwork7:
                if (!$o) $o = 2503;
            case SETTING_HomeNetwork8:
                if (!$o) $o = 2506;
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) << 16) | (ord($this->mSettings[$o + 1]) << 8) | ord($this->mSettings[$o + 2]);
                    return true;
                }
                if (($rData < 0) || ($rData > 99999)) {
                    $this->mLastError = "Invalid network code ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr(($rData >> 16) & 0xFF);
                $this->mSettings[$o + 1] = chr(($rData >> 8) & 0xFF);
                $this->mSettings[$o + 2] = chr($rData & 0xFF);
                return true;
            case SETTING_RestartGpsAboveSpeed:
                $o = 2418;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]) << 1;
                    return true;
                }
                if (($rData < 0) || ($rData > 510)) {
                    $this->mLastError = "Invalid value ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr(($rData >> 1) & 255);
                return true;
            case SETTING_ModuleIndicatorLEDsBrightness:
                $o = 2051;
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> 2) & 3;
                    return true;
                }
                if (($rData < 0) || ($rData > 3)) {
                    $this->mLastError = "Invalid MILB_... definition ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & 243) | (($rData & 3) << 2));
                return true;
            case SETTING_DigitalLevelVoltageInput1:
                if (!$o) $o = 2419;
            case SETTING_DigitalLevelVoltageInput2:
                if (!$o) $o = 2420;
            case SETTING_DigitalLevelVoltageInput3:
                if (!$o) $o = 2421;
            case SETTING_DigitalLevelVoltageInput4:
                if (!$o) $o = 2422;
            case SETTING_DigitalLevelVoltageInput5:
                if (!$o) $o = 2423;
                if ($Get) {
                    $rData = (float)ord($this->mSettings[$o]) / 10;
                    return true;
                }
                if (((float)$rData < 0.0) || ((float)$rData > 255.5)) {
                    $this->mLastError = "Invalid voltage ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr((int)((float)$rData * 10) & 0xFF);
                return true;
            case SETTING_MovingInputDetection:
                if ($Get) {
                    $rData = ((ord($this->mSettings[2052]) >> 2) & 8) | (ord($this->mSettings[3092]) & 7);
                    return true;
                }
                $this->mSettings[2052] = chr((ord($this->mSettings[2052]) & ~32) | (($rData & 8) << 2));
                $this->mSettings[3092] = chr((ord($this->mSettings[3092]) & ~7) | ($rData & 7));
                return true;
            case SETTING_Input1BehaviorSimulationType:
                $o = 2447;
            case SETTING_Input3BehaviorSimulationType:
                if (!$o) $o = 2448;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]) & 15;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & 240) | ($rData & 15));
                return true;
            case SETTING_Input2BehaviorSimulationType:
                $o = 2447;
            case SETTING_Input5BehaviorSimulationType:
                if (!$o) $o = 2448;
                if ($Get) {
                    $rData = (ord($this->mSettings[$o]) >> 4) & 15;
                    return true;
                }
                $this->mSettings[$o] = chr((ord($this->mSettings[$o]) & 15) | (($rData & 15) << 4));
                return true;
            case SETTING_Input4BehaviorSimulationType:
                if ($Get) {
                    $rData = 0;
                    if (ord($this->mSettings[2051]) & 64) $rData = 1;
                    if (ord($this->mSettings[2052]) & 1) $rData = 2;
                    if (ord($this->mSettings[2968]) & 64) $rData = 3;
                    return true;
                }
                switch ($rData) {
                    case I4BST_Normal:
                        $this->mSettings[2051] = chr(ord($this->mSettings[2051]) & ~64);
                        $this->mSettings[2052] = chr(ord($this->mSettings[2052]) & ~1);
                        $this->mSettings[2968] = chr(ord($this->mSettings[2968]) & ~64);
                        return true;
                    case I4BST_ConnectedToVSS:
                        $this->mSettings[2051] = chr(ord($this->mSettings[2051]) | 64);
                        $this->mSettings[2052] = chr(ord($this->mSettings[2052]) & ~1);
                        $this->mSettings[2968] = chr(ord($this->mSettings[2968]) & ~64);
                        return true;
                    case I4BST_ConnectedOutput1:
                        $this->mSettings[2051] = chr(ord($this->mSettings[2051]) & ~64);
                        $this->mSettings[2052] = chr(ord($this->mSettings[2052]) | 1);
                        $this->mSettings[2968] = chr(ord($this->mSettings[2968]) & ~64);
                        return true;
                    case I4BST_ConnectedToInput5:
                        $this->mSettings[2051] = chr(ord($this->mSettings[2051]) & ~64);
                        $this->mSettings[2052] = chr(ord($this->mSettings[2052]) & ~1);
                        $this->mSettings[2968] = chr(ord($this->mSettings[2968]) | 64);
                        return true;
                    default:
                        $this->mLastError = "Invalid I4BST_... definition ($rData)";
                        return false;
                }
            case SETTING_DigitalLevelHysteresisVoltageInput1:
                if (!$o) $o = 2449;
            case SETTING_DigitalLevelHysteresisVoltageInput2:
                if (!$o) $o = 2450;
            case SETTING_DigitalLevelHysteresisVoltageInput3:
                if (!$o) $o = 2451;
            case SETTING_DigitalLevelHysteresisVoltageInput4:
                if (!$o) $o = 2452;
            case SETTING_DigitalLevelHysteresisVoltageInput5:
                if (!$o) $o = 2453;
                if ($Get) {
                    $rData = ord($this->mSettings[$o]);
                    return true;
                }
                if (!is_int($rData) || ($rData < 0) || ($rData > 250)) {
                    $this->mLastError = "Invalid value ($rData)";
                    return false;
                }
                $this->mSettings[$o] = chr($rData);
                return true;
            case SETTING_TimeStampBitMark:
                if ($Get) {
                    $rData = (ord($this->mSettings[1966]) & 4) ? 1 : 0;
                    return true;
                }
                switch ((int)$rData) {
                    case 0:
                        $this->mSettings[$o] = chr(ord($this->mSettings[$o]) & ~4);
                        return true;
                    case 1:
                        $this->mSettings[$o] = chr(ord($this->mSettings[$o]) | 4);
                        return true;
                    default:
                        $this->mLastError = "Invalid value ($rData)";
                        return false;
                }
            case SETTING_ActionID91:
                if (!$o) $o = 2621;
            case SETTING_ActionID92:
                if (!$o) $o = 2625;
            case SETTING_ActionID93:
                if (!$o) $o = 2629;
            case SETTING_ActionID94:
                if (!$o) $o = 2633;
                if ($Get) {
                    $rData = array();
                    for ($i = 0; $i < 4; $i++) $rData[] = (int)ord($this->mSettings[$o + $i]);
                    return true;
                }
                for ($i = 0; $i < 4; $i++) $this->mSettings[$o + $i] = chr((isset($rData[$i]) ? $rData[$i] : 0) & 0xFF);
                return true;
            case SETTING_SignalPattern1:
                if (!$o) $o = 2637;
            case SETTING_SignalPattern2:
                if (!$o) $o = 2639;
            case SETTING_SignalPattern3:
                if (!$o) $o = 2641;
            case SETTING_SignalPattern4:
                if (!$o) $o = 2643;
            case SETTING_SignalPattern5:
                if (!$o) $o = 2645;
            case SETTING_SignalPattern6:
                if (!$o) $o = 2647;
            case SETTING_SignalPattern7:
                if (!$o) $o = 2649;
            case SETTING_SignalPattern8:
                if (!$o) $o = 2651;
            case SETTING_SignalPattern9:
                if (!$o) $o = 2841;
            case SETTING_SignalPattern10:
                if (!$o) $o = 2843;
            case SETTING_SignalPattern11:
                if (!$o) $o = 2845;
            case SETTING_SignalPattern12:
                if (!$o) $o = 2847;
                if ($Get) {
                    $rData = array();
                    $uw = (ord($this->mSettings[$o + 1]) << 8) | ord($this->mSettings[$o]);
                    $rData[] = $uw & 1 ? 1 : 0;
                    $rData[] = $uw & 2 ? 1 : 0;
                    $rData[] = $uw & 4 ? 1 : 0;
                    $rData[] = $uw & 8 ? 1 : 0;
                    $rData[] = $uw & 16 ? 1 : 0;
                    $rData[] = $uw & 32 ? 1 : 0;
                    $rData[] = $uw & 64 ? 1 : 0;
                    $rData[] = $uw & 128 ? 1 : 0;
                    $rData[] = (($uw >> 8) & 0x1F) + 1;
                    $rData[] = ($uw >> 13) & 7;
                    return true;
                }
                $i = $b = 0;
                for (; $i < 8; $i++) if (isset($rData[$i])) $b |= (($rData[$i] & 1) << $i);
                $this->mSettings[$o] = chr($b);
                $b = isset($rData[$i]) ? (($rData[$i] - 1) & 0x1F) : 0;
                if (isset($rData[++$i])) $b |= ($rData[$i] & 7) << 5;
                $this->mSettings[$o + 1] = chr($b);
                return true;
            case SETTING_WhilePowerSaving_OpenSocket:
                if (!$o) {
                    $o = 2030;
                    $m = 0;
                }
            case SETTING_WhilePowerSaving_GpsFix:
                if (!$o) {
                    $o = 2030;
                    $m = 1;
                }
            case SETTING_WhilePowerSaving_CpuSpeed:
                if (!$o) {
                    $o = 2030;
                    $m = 3;
                }
            case SETTING_ModuleRedLedIndications:
                if (!$o) {
                    $o = 2020;
                    $m = 4;
                }
                if ($Get) {
                    $rData = ((ord($this->mSettings[$o]) & (1 << $m)) >> $m);
                    return true;
                }
                if ($rData & 1) $this->mSettings[$o] = chr(ord($this->mSettings[$o]) | (1 << $m)); else $this->mSettings[$o] = chr(ord($this->mSettings[$o]) & ~(1 << $m));
                return true;
            case SETTING_WakeUpIOchangeInput1:
                if (!$o) {
                    $o = 1903;
                    $m = 0;
                    $o2 = 1904;
                    $m2 = 0;
                }
            case SETTING_WakeUpIOchangeInput2:
                if (!$o) {
                    $o = 1903;
                    $m = 1;
                    $o2 = 1904;
                    $m2 = 1;
                }
            case SETTING_WakeUpIOchangeInput3:
                if (!$o) {
                    $o = 1903;
                    $m = 2;
                    $o2 = 1904;
                    $m2 = 2;
                }
            case SETTING_WakeUpIOchangeInput4:
                if (!$o) {
                    $o = 1903;
                    $m = 3;
                    $o2 = 1904;
                    $m2 = 3;
                }
            case SETTING_WakeUpIOchangeInput5:
                if (!$o) {
                    $o = 1903;
                    $m = 4;
                    $o2 = 1904;
                    $m2 = 4;
                }
            case SETTING_WakeUpIOchangeInput6:
                if (!$o) {
                    $o = 1903;
                    $m = 5;
                    $o2 = 1904;
                    $m2 = 5;
                }
            case SETTING_WakeUpIOchangeInput7:
                if (!$o) {
                    $o = 1903;
                    $m = 6;
                    $o2 = 1904;
                    $m2 = 6;
                }
            case SETTING_WakeUpIOchangeInput8:
                if (!$o) {
                    $o = 1903;
                    $m = 7;
                    $o2 = 1904;
                    $m2 = 7;
                }
            case SETTING_WhilePowerSaving_GpsPower:
                if (!$o) {
                    $o = 2030;
                    $m = 2;
                    $o2 = 2030;
                    $m2 = 4;
                }
            case SETTING_GpsBackupInPowerDownMode:
                if (!$o) {
                    $o = 2968;
                    $m = 7;
                    $o2 = 2020;
                    $m2 = 5;
                }
                if ($Get) {
                    $rData = ((ord($this->mSettings[$o]) & (1 << $m)) >> $m) | (((ord($this->mSettings[$o2]) & (1 << $m2)) >> $m2) << 1);
                    return true;
                }
                if ($rData & 1) $this->mSettings[$o] = chr(ord($this->mSettings[$o]) | (1 << $m)); else $this->mSettings[$o] = chr(ord($this->mSettings[$o]) & ~(1 << $m));
                if ($rData & 2) $this->mSettings[$o2] = chr(ord($this->mSettings[$o2]) | (1 << $m2)); else $this->mSettings[$o2] = chr(ord($this->mSettings[$o2]) & ~(1 << $m2));
                return true;
            default:
                $this->mLastError = "Invalid SETTING_... definition ($Setting)";
                return false;
        }
    }

    function SetSetting($Setting, $Data)
    {
        return $this->GetSetting($Setting, $Data, false);
    }

    function GetRegionCodeData($Region, $AdditionalSettings, &$rDataResult)
    {
        $rDataResult = '';
        if (($Region < 1) || ($Region > 50)) {
            $this->mLastError = "Invalid Region '$Region'";
            return false;
        }
        if (!isset($AdditionalSettings[0])) {
            $this->mLastError = "Missing required AdditionalSettings[0]";
            return false;
        }
        $rDataResult .= chr($AdditionalSettings[0] & 0xFF);
        $rDataResult .= chr(($AdditionalSettings[0] >> 8) & 0xFF);
        $rDataResult .= substr($this->mSettings, 248 + (($Region - 1) * 32), 32);
        $NullByte = chr(0);
        for ($i = strlen($rDataResult); $i < 42; $i++) $rDataResult .= $NullByte;
        return true;
    }

    function SetRegionCodeData($Region, $Data, &$rAdditionalSettings)
    {
        $rAdditionalSettings = array();
        if (($Region < 1) || ($Region > 50)) {
            $this->mLastError = "Invalid Region '$Region'";
            return false;
        }
        $DataLen = strlen($Data);
        $rAdditionalSettings[0] = ($DataLen >= 2) ? (ord($Data[1]) << 8) | ord($Data[0]) : 123;
        $Default = '';
        $NullByte = chr(0);
        for ($i = 0; $i < 18; $i++) $Default .= $NullByte;
        $Disabled = chr(EMPTY_REGION_COORDINATE & 0xFF) . chr((EMPTY_REGION_COORDINATE & 0xFF00) >> 8) . chr((EMPTY_REGION_COORDINATE & 0xFF0000) >> 16) . chr((EMPTY_REGION_COORDINATE & 0xFF000000) >> 24);
        for ($i = 0; $i < 4; $i++) $Default .= $Disabled;
        $i = 248 + (($Region - 1) * 32);
        $this->mSettings = substr($this->mSettings, 0, $i) . substr($Data . substr($Default, $DataLen), 2, 32) . substr($this->mSettings, $i + 32);
        return true;
    }
}

;
define('GSC_Variables', 1);
define('GSC_Instructions', 2);
define('GSC_PreCommands', 4);
define('GSC_PostCommands', 8);
define('GSC_AllCommands', 0xFF);
define('MIA_Name', 0);
define('MIA_Index', 1);
define('MIA_Type', 2);
define('MIA_Up', 3);
define('MIA_Down', 4);
define('MIA_Left', 5);
define('MIA_Right', 6);
define('MIA_Select', 7);
define('MIA_Cancel', 8);
define('MIA_Timeout', 9);
define('MIA_TimeoutUnits', 10);
define('MIA_Data', 18);
define('ITVS_Reserved', 0);
define('ITVS_DontCare', 1);
define('ITVS_Valid', 2);
define('ITVS_ACTION_Ignored', 3);
define('ITVS_ACTION_Index', 4);
define('ITVS_ACTION_IndexAndNext', 5);
define('ITVS_ACTION_AllowedIndex', 6);
define('ITVS_ACTION_AllowedAction', 7);
define('ITVS_ACTION_Allowed', 8);
define('ITVS_TIMEOUTUNITS_Disabled', 9);
define('ITVS_TIMEOUTUNITS_Automatic', 10);
define('ITVS_TIMEOUTUNITS_Ignored', 11);
define('ITVS_TIMEOUTUNITS_Allowed', 12);

class CGPSCODE
{
    var $Instructions;
    var $Variables;
    var $Commands;
    var $LastError;
    var $AllowableUserVarChars;

    function GetInstructionTypeVariableSpecifics($Type)
    {
        switch ($Type) {
            case 0:
            default:
                return array(ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_DontCare, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_DontCare);
            case 1:
            case 16:
            case 17:
            case 18:
            case 19:
            case 20:
            case 21:
            case 22:
            case 23:
            case 24:
            case 25:
            case 26:
            case 27:
            case 28:
            case 29:
            case 30:
            case 31:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Allowed, ITVS_ACTION_Allowed, ITVS_ACTION_Allowed, ITVS_ACTION_Allowed, ITVS_ACTION_Allowed, ITVS_ACTION_Allowed, ITVS_ACTION_AllowedIndex, ITVS_TIMEOUTUNITS_Allowed, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 43:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Index, ITVS_TIMEOUTUNITS_Automatic, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 12:
            case 13:
            case 14:
            case 15:
            case 33:
            case 36:
            case 37:
            case 45:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Index, ITVS_ACTION_AllowedIndex, ITVS_ACTION_Ignored, ITVS_TIMEOUTUNITS_Ignored, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 32:
            case 34:
            case 38:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_TIMEOUTUNITS_Ignored, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 35:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Index, ITVS_ACTION_Index, ITVS_ACTION_Ignored, ITVS_TIMEOUTUNITS_Ignored, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 40:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_IndexAndNext, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_TIMEOUTUNITS_Ignored, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 41:
            case 42:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_AllowedIndex, ITVS_ACTION_AllowedIndex, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Index, ITVS_ACTION_AllowedIndex, ITVS_ACTION_Ignored, ITVS_TIMEOUTUNITS_Ignored, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
            case 50:
            case 51:
            case 52:
            case 53:
            case 61:
            case 62:
            case 63:
            case 69:
                return array(ITVS_DontCare, ITVS_Valid, ITVS_Valid, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_ACTION_Ignored, ITVS_TIMEOUTUNITS_Ignored, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Reserved, ITVS_Valid);
        }
    }

    function GetIndexArrayWithDefinitionTypes(&$rArray)
    {
        $rArray = array();
        foreach ($this->Instructions as $Index => $Instruction) {
            if (!isset($Instruction[MIA_Type])) continue;
            switch ($Instruction[MIA_Type]) {
                case 12:
                case 13:
                case 14:
                case 15:
                case 32:
                case 33:
                case 34:
                case 36:
                case 37:
                case 38:
                case 39:
                case 40:
                case 45:
                case 50:
                case 51:
                case 52:
                case 53:
                case 61:
                case 62:
                case 63:
                case 69:
                    $rArray[$Index] = $Instruction[MIA_Type];
                    break;
            }
        }
        return 0;
    }

    function CGPSCODE()
    {
        $this->Clear();
        $this->LastError = '';
        $this->AllowableUserVarChars = array(39 => '0123456789', 69 => ' ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 99 => " !\"#\$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    }

    function Clear()
    {
        $this->Instructions = array();
        $this->Variables = array();
        $this->Commands = array();
    }

    function GetLastError()
    {
        return $this->LastError;
    }

    function GetInstructionIndexFromName($InstructionName)
    {
        foreach ($this->Instructions as $Index => $Instruction) {
            if (isset($Instruction[MIA_Name]) && ($Instruction[MIA_Name] == $InstructionName)) return $Index;
        }
        return 0;
    }

    function SetInstructionArgument($InstructionIndexNumber, $InstructionArgument, $ArgumentData)
    {
        if (($InstructionIndexNumber < 1) || ($InstructionIndexNumber > 300)) {
            $this->LastError = "Invalid Index number: $InstructionIndexNumber";
            return false;
        }
        if (!isset($this->Instructions[(int)$InstructionIndexNumber])) {
            $Instruction = array();
            $Instruction[MIA_Index] = (int)$InstructionIndexNumber;
        } else $Instruction = $this->Instructions[(int)$InstructionIndexNumber];
        switch ($InstructionArgument) {
            case MIA_Name:
                if (strpos(strtoupper($ArgumentData), '+CLI') !== false) {
                    $this->LastError = 'Label name can not contain: +CLI';
                    return false;
                }
                $Instruction[(int)$InstructionArgument] = $ArgumentData;
                break;
            case MIA_Index:
                if (($ArgumentData < 1) || ($ArgumentData > 300)) {
                    $this->LastError = "Invalid Index number: '$InstructionIndexNumber'";
                    return false;
                }
                $Instruction[(int)$InstructionArgument] = (int)$ArgumentData;
                break;
            case MIA_Type:
                if ($ArgumentData == 34) $Min = 32; else $Min = 1;
                if (($ArgumentData != 0) && (($ArgumentData < $Min) || ($ArgumentData > 999))) {
                    $this->LastError = "Index '$InstructionIndexNumber' does not support Type '$ArgumentData'";
                    return false;
                }
                $Instruction[MIA_Type] = (int)$ArgumentData;
                break;
            case MIA_Up:
            case MIA_Down:
            case MIA_Left:
            case MIA_Right:
            case MIA_Select:
            case MIA_Cancel:
            case MIA_Timeout:
            case MIA_TimeoutUnits:
                if (($ArgumentData < 0) || ($ArgumentData > 999)) {
                    $this->LastError = "InstructionArgument $InstructionArgument does not support ArgumentData $ArgumentData";
                    return false;
                }
                $Instruction[(int)$InstructionArgument] = (int)$ArgumentData;
                break;
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
            case 16:
            case 17:
                if ((int)$ArgumentData) {
                    $this->LastError = "InstructionArgument $InstructionArgument does not support ArgumentData $ArgumentData";
                    return false;
                }
                $Instruction[(int)$InstructionArgument] = (int)$ArgumentData;
                break;
            case MIA_Data:
                if ($InstructionIndexNumber < 32) $MaxLen = 256 - 22; else $MaxLen = 64 - 22;
                if (strlen($ArgumentData) > $MaxLen) {
                    $this->LastError = "Data contains more than $MaxLen character bytes";
                    return false;
                }
                if (strpos($ArgumentData, '\0') != false) {
                    $this->LastError = 'Data can not contain a nul-byte';
                    return false;
                }
                $Instruction[(int)$InstructionArgument] = $ArgumentData;
                break;
            default:
                $this->LastError = "Invalid InstructionArgument $InstructionArgument";
                return false;
        }
        $this->Instructions[(int)$InstructionIndexNumber] = $Instruction;
        return true;
    }

    function GetInstructionArgument($Index, $Parameter)
    {
        if (isset($this->Instructions[$Index])) {
            if (isset($this->Instructions[$Index][$Parameter])) return $this->Instructions[$Index][$Parameter];
            if (isset($this->Instructions[$Index][MIA_Type])) {
                $aSpecifics = $this->GetInstructionTypeVariableSpecifics($this->Instructions[$Index][MIA_Type]);
                if (isset($aSpecifics[$Parameter])) switch ($aSpecifics[$Parameter]) {
                    case ITVS_DontCare:
                    case ITVS_Valid:
                    default:
                        break;
                    case ITVS_ACTION_Ignored:
                        return 0;
                    case ITVS_ACTION_Index:
                    case ITVS_ACTION_IndexAndNext:
                        return 1;
                    case ITVS_ACTION_AllowedIndex:
                    case ITVS_ACTION_AllowedAction:
                    case ITVS_ACTION_Allowed:
                        return 0;
                    case ITVS_TIMEOUTUNITS_Disabled:
                    case ITVS_TIMEOUTUNITS_Automatic:
                    case ITVS_TIMEOUTUNITS_Ignored:
                        return 255;
                    case ITVS_TIMEOUTUNITS_Allowed:
                        if (!isset($this->Instructions[$Index][MIA_Timeout]) || !$this->Instructions[$Index][MIA_Timeout]) return 255;
                        return 50;
                }
            }
        }
        switch ($Parameter) {
            case MIA_Name:
            case MIA_Data:
                return '';
            case MIA_Index:
                return (int)$Index;
            case MIA_Type:
                return 0;
            case MIA_TimeoutUnits:
                return 255;
            default:
                return 0;
        }
    }

    function GetHighestIndex()
    {
        return count($this->Instructions) ? max(array_keys($this->Instructions)) : 0;
    }

    function IsIndexInUse($Index)
    {
        return isset($this->Instructions[$Index]);
    }

    function GetUserVariableAllowableCharacters($UserVariableNumber)
    {
        foreach ($this->AllowableUserVarChars as $Maximum => $String) {
            if ($UserVariableNumber <= $Maximum) return $String;
        }
        return '';
    }

    function SetUserVariableByName($UserVariableName, $UserVariableData)
    {
        if ((strlen($UserVariableName) != 4) || ($UserVariableName[0] != '%') || (($UserVariableName[1] != 'U') && ($UserVariableName[1] != 'V')) || (strspn(substr($UserVariableName, 2), '0123456789') != 2)) {
            $this->LastError = "Invalid user variable: '$UserVariableName'";
            return false;
        }
        $Len = strlen($UserVariableData);
        if ($Len > 16) {
            $this->LastError = 'User variable ' . (int)substr($UserVariableName, 2) . ' does not support more than 16 character bytes';
            return false;
        }
        if ($UserVariableData !== null) $this->Variables[$UserVariableName] = $UserVariableData; else unset($this->Variables[$UserVariableName]);
        return true;
    }

    function SetUserVariableByNumber($UserVariableNumber, $UserVariableData)
    {
        return $this->SetUserVariableByName(sprintf('%%U%02d', (int)$UserVariableNumber), $UserVariableData);
    }

    function GetUserVariableByName($UserVariableName)
    {
        if (!isset($this->Variables[$UserVariableName])) return null;
        return $this->Variables[$UserVariableName];
    }

    function GetUserVariableByNumber($UserVariableNumber)
    {
        $UserVariableName = sprintf('%%U%02d', $UserVariableNumber);
        if (!isset($this->Variables[$UserVariableName])) return null;
        return $this->Variables[$UserVariableName];
    }

    function GetUserVariablesArray()
    {
        return $this->Variables;
    }

    function SetCommand($Command, $Data, $Line, $Remark = '')
    {
        $Command = strtoupper($Command);
        switch ($Command) {
            case 'MB':
            case 'MG':
            case 'MS':
            case 'MW':
                break;
            default:
                $this->LastError = "Unsupported \"$Command\" command";
                return false;
        }
        $String = trim($Data, ' \t\r\n');
        $Len = strspn($String, '0123456789');
        if (($Command == 'MB') || ($Command == 'MG')) {
            if ($Len <= 0) {
                $this->LastError = "First argument value for the Index is missing";
                return false;
            }
            if ($Len > 3) {
                $this->LastError = "First argument value consists out of too many digits for an Index";
                return false;
            }
            $Arg = (int)substr($String, 0, $Len);
            if (($Arg < 1) || ($Arg > 300)) {
                $this->LastError = "First argument value is out of valid Index number range";
                return false;
            }
            $String = ltrim(substr($String, $Len));
            if ($Command == 'MB') {
                $Len = strlen($String);
                if ($Len <= 0) {
                    $this->LastError = "The mask argument is missing";
                    return false;
                }
                if (strspn($String, "012") != $Len) {
                    $this->LastError = "The mask contains unsupported character byte(s)";
                    return false;
                }
                if (301 - $Arg < $Len) $String = substr($String, 0, 301 - $Arg);
            }
        } else if ($Command == 'MS') {
            if ($Len <= 0) {
                $this->LastError = "First argument value for the storage command is missing";
                return false;
            }
            if ($Len > 3) {
                $this->LastError = "First argument value consists out of too many digits for a storage command";
                return false;
            }
            $Arg = (int)substr($String, 0, $Len);
            if ($Arg != 2) {
                $this->LastError = "First argument value is unsupported storage command";
                return false;
            }
        } else if ($Command == "MW") {
            if ($Len <= 0) {
                $this->LastError = 'First argument value is missing';
                return false;
            }
            if ($Len > 3) {
                $this->LastError = 'First argument value consists out of too many digits';
                return false;
            }
            $Arg = (int)substr($String, 0, $Len);
            if (($Arg < 0) || ($Arg > 1)) {
                $this->LastError = 'First argument is unsupported value';
                return false;
            }
        }
        if (($Command == "MS") || ($Command == "MG") || ($Command == "MW")) {
            $String = trim(substr($String, $Len));
            $Len = strlen($String);
            if ($Len) {
                if (strspn($String, "0123456789") != $Len) {
                    $this->LastError = "The second argument contains non number character bytes";
                    return false;
                }
                if ($Len > 3) {
                    $this->LastError = "The second argument value consists of too many digits";
                    return false;
                }
                if ((int)substr($String, 0, $Len) != 0) {
                    $this->LastError = "The second argument value is not supported";
                    return false;
                }
            }
            $String = "000";
        }
        $this->Commands[$Line] = array($Command, trim(sprintf("%03d %s", $Arg, $String)), $Remark);
        return true;
    }

    function GetCommandArray()
    {
        return $this->Commands;
    }

    function GetInstructionArray()
    {
        return $this->Instructions;
    }

    function GetInstructionSourceCode($Index)
    {
        $Source = '';
        if ($this->IsIndexInUse($Index)) {
            $Source = $this->GetInstructionArgument($Index, MIA_Name);
            $Data = $this->GetInstructionArgument($Index, MIA_Data);
            $bHex = false;
            switch ($this->GetInstructionArgument($Index, MIA_Type)) {
                case 34:
                    $bHex = true;
                    break;
                default:
                    $Len = strlen($Data);
                    for ($i = 0; $i < $Len; $i++) {
                        $Val = ord($Data[$i]);
                        if (($Val < 0x20) || ($Val > 0x7D) || ($Val == 0x22)) {
                            $bHex = true;
                            break;
                        }
                    }
            }
            $Source .= ($bHex) ? '+CLIMH' : '+CLIMD';
            for ($Arg = MIA_Index; $Arg < MIA_Data; $Arg++) $Source .= sprintf(' %03d', $this->GetInstructionArgument($Index, $Arg));
            if ($bHex) $Source .= ' "' . strtoupper(bin2hex($Data)) . "\"\r\n"; else $Source .= " \"$Data\"\r\n";
        }
        return $Source;
    }

    function AddSourceCode($SourceCodeData)
    {
        while (strpos($SourceCodeData, "\r\n") !== false) $SourceCodeData = str_replace("\r\n", "\r", $SourceCodeData);
        while (strpos($SourceCodeData, "\r") !== false) $SourceCodeData = str_replace("\r", "\n", $SourceCodeData);
        $aLines = explode("\n", "\n" . $SourceCodeData);
        $Lines = count($aLines);
        for ($Line = 1; $Line < $Lines; $Line++) {
            $LineData = ltrim($aLines[$Line]);
            $Len = strlen($LineData);
            if (!$Len) continue;
            for ($Start = 0; $Start < $Len; $Start++) {
                $Start = strpos($LineData, '+', $Start);
                if (($Start === false) || ($Start + 6 > $Len)) {
                    $this->LastError = "No '+CLI..' marker found in source line #$Line";
                    return false;
                }
                if (strtoupper(substr($LineData, $Start, 4)) == '+CLI') break;
            }
            if ($Start) $Remark = substr($LineData, 0, $Start); else $Remark = '';
            $Start += 4;
            $CLItype = strtoupper(substr($LineData, $Start, 2));
            $ItemData = substr($LineData, $Start + 2);
            switch ($CLItype) {
                case 'MD':
                case 'MH':
                    $End = strpos($ItemData, '"');
                    if ($End === false) {
                        $this->LastError = "No \" character found to mark Data start in source line #$Line";
                        return false;
                    }
                    $ActionArguments = trim(substr($ItemData, 0, $End));
                    while (strpos($ActionArguments, "\t") !== false) $ActionArguments = str_replace("\t", ' ', $ActionArguments);
                    while (strpos($ActionArguments, '  ') !== false) $ActionArguments = str_replace('  ', ' ', $ActionArguments);
                    if (strspn($ActionArguments, ' 0123456789') != strlen($ActionArguments)) {
                        $this->LastError = "Argument 1 in source code line #$Line contains non digit character";
                        return false;
                    }
                    $aActionArguments = explode(' ', ' ' . $ActionArguments);
                    $Data = rtrim(substr($ItemData, $End + 1));
                    $Len = strlen($Data);
                    if (($Len < 1) || ($Data[$Len - 1] != '"')) {
                        $this->LastError = "The Data part is missing a closing \" character in source line #$Line";
                        return false;
                    }
                    $Data = substr($Data, 0, -1);
                    if (strpos($Data, '"') !== false) {
                        $this->LastError = "Invalid \" character in Data of source code line #$Line";
                        return false;
                    }
                    if ($CLItype == 'MH') {
                        $Len = strlen($Data);
                        if ($Len % 2) {
                            $this->LastError = "Data contents has odd length in source line #$Line";
                            return false;
                        }
                        if ($Len != strspn($Data, '0123456789abcdefABCDEF')) {
                            $this->LastError = "Data does not contain only ASCII hex characters in source line #$Line";
                            return false;
                        }
                        $Bin = '';
                        for ($i = 0; $i < $Len; $i += 2) $Bin .= chr(hexdec(substr($Data, $i, 2)));
                        $Data = $Bin;
                    }
                    $aActionArguments[MIA_Name] = $Remark;
                    $aActionArguments[MIA_Data] = $Data;
                    $Index = $aActionArguments[MIA_Index];
                    for ($i = MIA_Name; $i <= MIA_Data; $i++) {
                        if (!isset($aActionArguments[$i])) continue;
                        if (!$this->SetInstructionArgument($Index, $i, $aActionArguments[$i])) {
                            $this->LastError = "Data field error in source code line #$Line: " . $this->GetLastError();
                            return false;
                        }
                    }
                    continue;
                case 'MU':
                    $Data = ltrim($ItemData);
                    $Len = strspn($Data, '01234567890');
                    if ($Len < 1) {
                        $this->LastError = "No user variable number following the +CLIMU marker in source code line #$Line";
                        return false;
                    }
                    $Number = (int)substr($Data, 0, $Len);
                    if (strlen($Data) > $Len + 1) $Data = substr($Data, $Len + 1); else $Data = '';
                    if (!$this->SetUserVariableByNumber($Number, $Data)) {
                        $this->LastError = "Invalid data for user variable in line #$Line: " . $this->LastError;
                        return false;
                    }
                    continue;
                case 'MG':
                case 'MS':
                case 'MB':
                case 'MW':
                    if (!$this->SetCommand($CLItype, $ItemData, $Line, $Remark)) {
                        $this->LastError = "Error in data following '+CLI$CLItype' in source line #$Line: " . $this->LastError;
                        return false;
                    }
                    continue;
                default:
                    $this->LastError = sprintf("Unsupported '+CLI$CLItype' at source line #%d", $Line + 1);
                    return false;
            }
        }
        return true;
    }

    function SetBinaryData($BinaryData)
    {
        $bResult = true;
        $this->Clear();
        if (strlen($BinaryData) == 32768) {
            $CRC = 0;
            for ($i = 4; $i < 32768; $i++) {
                $d = ord($BinaryData[$i]);
                $d ^= $CRC & 0xFF;
                $d ^= $d << 4;
                $CRC = (((($CRC >> 8) ^ (($d & 0xFF) >> 4)) & 0xFF) | (($d & 0xFF) << 8)) & 0xFFFF;
            }
            if ((int)$CRC != (int)(ord($BinaryData[0]) | (ord($BinaryData[1]) << 8))) {
                $bResult = false;
                $this->LastError = 'Binary data CRC error';
            }
        } else {
            while (strlen($BinaryData) < 32768) $BinaryData .= chr(0);
            $bResult = false;
            $this->LastError = 'Binary data size invalid';
        }
        $o = 256;
        for ($i = 1; $i <= 31; $i++) {
            $a = array();
            $a[MIA_Name] = '';
            $a[MIA_Index] = $i;
            $o += 2;
            for ($ii = MIA_Type; $ii <= MIA_TimeoutUnits; $ii++) $a[$ii] = ord($BinaryData[$o++]) | (ord($BinaryData[$o++]) << 8);
            $o += 2;
            $a[MIA_Data] = substr($BinaryData, $o, (strcspn($BinaryData, "\x00", $o, 234)));
            $o += 234;
            $this->Instructions[$i] = $a;
        }
        for ($i = 32; $i <= 300; $i++) {
            $a = array();
            $a[MIA_Name] = '';
            $a[MIA_Index] = $i;
            $o += 2;
            for ($ii = MIA_Type; $ii <= MIA_TimeoutUnits; $ii++) $a[$ii] = ord($BinaryData[$o++]) | (ord($BinaryData[$o++]) << 8);
            $o += 2;
            $a[MIA_Data] = substr($BinaryData, $o, (strcspn($BinaryData, "\x00", $o, 42)));
            $o += 42;
            $this->Instructions[$i] = $a;
        }
        for ($i = 0, $o = 30208; $i <= 99; $i++, $o += 16) $this->Variables[sprintf('%%U%02d', $i)] = rtrim(substr($BinaryData, $o, 16), "\x00");
        return $bResult;
    }

    function GetSourceCode($Retrieve = 0xFF)
    {
        $Data = '';
        $Ordered = array();
        if (($Retrieve & GSC_PreCommands) || ($Retrieve & GSC_PostCommands)) {
            $Array = $this->GetCommandArray();
            foreach ($Array as $Line => $Command) {
                if ($Command[0] == 'MS') {
                    if (substr($Command[1], 0, 3) == '001') $Priority = -50; else $Priority = 100;
                    if (!isset($Ordered[$Priority])) $Ordered[$Priority] = $Command;
                    continue;
                }
                if ($Command[0] == 'MG') {
                    $Priority = 50;
                    if (!isset($Ordered[$Priority])) $Ordered[$Priority] = $Command;
                    continue;
                }
                if ($Command[0] == 'MB') {
                    $Priority = -100;
                    if (!isset($Ordered[$Priority])) $Ordered[$Priority] = $Command;
                    continue;
                }
                if ($Command[0] == 'MW') {
                    $Priority = -150;
                    if (!isset($Ordered[$Priority])) $Ordered[$Priority] = $Command;
                    continue;
                }
                $Ordered[] = array(0 => $Command);
            }
            ksort($Ordered, SORT_NUMERIC);
            if ($Retrieve & GSC_PreCommands) foreach ($Ordered as $Priority => $Command) {
                if ($Priority >= 0) break;
                $Data .= sprintf("%s+CLI%s %s\r\n", $Command[2], $Command[0], $Command[1]);
            }
        }
        if ($Retrieve & GSC_Variables) {
            ksort($this->Variables, SORT_STRING);
            foreach ($this->Variables as $VarName => $VarData) $Data .= sprintf("+CLIMU %03d %s\r\n", (int)substr($VarName, 2), $VarData);
        }
        if ($Retrieve & GSC_Instructions) {
            ksort($this->Instructions, SORT_NUMERIC);
            foreach ($this->Instructions as $Index => $Instruction) $Data .= $this->GetInstructionSourceCode($Index);
        }
        if ($Retrieve & GSC_PostCommands) foreach ($Ordered as $Priority => $Command) {
            if ($Priority < 0) continue;
            $Data .= sprintf("%s+CLI%s %s\r\n", $Command[2], $Command[0], $Command[1]);
        }
        return $Data;
    }

    function GetFirstServerUploadStallLine()
    {
        if (!$this->GetCommandArray()) return 0;
        return count($this->Variables) + count($this->Commands) + 1;
    }

    function GetCustomSmsCommands()
    {
        $Array = array();
        foreach ($this->Instructions as $Instruction) {
            if (!isset($Instruction[MIA_Type]) || ($Instruction[MIA_Type] != 12)) continue;
            $Array[$Instruction[MIA_Index]] = (isset($Instruction[MIA_Data])) ? $Instruction[MIA_Data] : '';
        }
        return $Array;
    }

    function GetIButtons()
    {
        $Array = array();
        foreach ($this->Instructions as $Instruction) {
            if (!isset($Instruction[MIA_Type])) continue;
            switch ($Instruction[MIA_Type]) {
                case 13:
                case 14:
                case 15:
                case 40:
                    if (!isset($Instruction[MIA_Data])) continue;
                    $Data = $Instruction[MIA_Data];
                    $Len = strlen($Data);
                    if ($Len >= 16) $Array[substr($Instruction[MIA_Data], 0, 16)] = $Instruction[MIA_Index];
                    for ($i = 17; ; $i += 13) {
                        if ($i > $Len) break;
                        $Array[substr($Instruction[MIA_Data], $i, 12)] = $Instruction[MIA_Index];
                    }
                    break;
            }
        }
        return $Array;
    }

    function GetRegions()
    {
        $Array = array();
        foreach ($this->Instructions as $Index => $Instruction) {
            if ($Index < 32) continue;
            if (!isset($Instruction[MIA_Type]) || !isset($Instruction[MIA_Data]) || ($Instruction[MIA_Type] != 34)) continue;
            if (strlen($Instruction[MIA_Data]) < 2) $Val = 0; else $Val = (ord($Instruction[MIA_Data][1]) << 8) | ord($Instruction[MIA_Data][0]);
            $Array[$Instruction[MIA_Index]] = $Val;
        }
        return $Array;
    }

    function CheckCurrentCode(&$raErrors, &$raWarnings)
    {
        $raErrors = $raWarnings = $aDefTypeIndexes = $aDisabledIndexes = array();
        $asMIA = array('MIA_Name', 'MIA_Index', 'MIA_Type', 'MIA_Up', 'MIA_Down', 'MIA_Left', 'MIA_Right', 'MIA_Select', 'MIA_Cancel', 'MIA_Timeout', 'MIA_TimeoutUnits');
        for ($i = 11; $i <= 17; $i++) $asMIA[] = sprintf('MIA_Reserved%d', $i);
        $asMIA[] = 'MIA_Data';
        $this->GetIndexArrayWithDefinitionTypes($aDefTypeIndexes);
        foreach ($this->Commands as $Line => $aContents) {
            if (isset($aContents[0]) && isset($aContents[1])) switch ($aContents[0]) {
                case 'MB':
                    $Data = $aContents[1];
                    $Index = (int)substr($Data, 0, 3);
                    $Len = strlen($Data);
                    for ($i = 4; $i < $Len; $i++, $Index++) if ($Data[$i] == '2') $aDisabledIndexes[$Index] = true;
                    break;
                case 'MS':
                    if ($aContents[1] == '002 000') $MS = '+CLIMS 002 000';
                    break;
                case 'MW':
                    $aMW = $aContents;
                    break;
            }
        }
        if (isset($MS)) {
            $Warn = 'When using "' . $MS . '" you probably also want to use "+CLIMW 001 000"';
            if (isset($aMW)) {
                if ($aMW[1] == '001 000') unset($Warn); else $Warn .= ' instead of "+CLIMW ' . $aMW[1] . '"';
            }
            if (isset($Warn)) $raWarnings[] = $Warn;
        }
        for ($Index = 1; $Index <= 300; $Index++) if (isset($this->Instructions[$Index])) if (isset($this->Instructions[$Index][MIA_Type]) && !$this->Instructions[$Index][MIA_Type]) $aDisabledIndexes[$Index] = true; else unset($aDisabledIndexes[$Index]);
        for ($Index = 1; $Index <= 300; $Index++) {
            $Type = $this->GetInstructionArgument($Index, MIA_Type);
            if (!$Type) continue;
            $aSpecifics = $this->GetInstructionTypeVariableSpecifics($Type);
            $Name = $this->GetInstructionArgument($Index, MIA_Name);
            if (strlen($Name)) $Name = " [$Name]";
            switch ($Type) {
                case 41:
                case 42:
                    if ($this->GetInstructionArgument($Index, MIA_Cancel) != 0) {
                        $i = $this->GetInstructionArgument($Index, MIA_Up);
                        if ($i != 0) $raWarnings[] = "Index $Index$Name: MIA_Up is set but should be disabled (not $i but 0)";
                        $i = $this->GetInstructionArgument($Index, MIA_Down);
                        if ($i != 0) $raWarnings[] = "Index $Index$Name: MIA_Down is set but should be disabled (not $i but 0)";
                    } else {
                        $i = $this->GetInstructionArgument($Index, MIA_Up);
                        if (($i < 1) || ($i > 300)) $raErrors[] = "Index $Index$Name: MIA_Up is not programmed to an Index to jump to";
                        $i = $this->GetInstructionArgument($Index, MIA_Down);
                        if (($i < 1) || ($i > 300)) $raErrors[] = "Index $Index$Name: MIA_Down is not programmed to an Index to jump to";
                    }
                    break;
                case 52:
                case 62:
                    for ($i = 0; $i <= 4; $i++) if (($Index + $i >= 300) || ($this->GetInstructionArgument($Index + $i + 1, MIA_Type) != 69)) break;
                    if ($i < 4) $raErrors[] = "Index $Index$Name: Requires 4 (found $i) adjacent Type 69 instruction slots containing WEP key parts";
                    break;
                case 53:
                case 63:
                    if (($Index >= 300) || ($this->GetInstructionArgument($Index + 1, MIA_Type) != 69)) $raErrors[] = "Index $Index$Name: Requires 1 adjacent Type 69 instruction slot containing WPA/WPA2 pass-word/phrase";
                    break;
            }
            foreach ($asMIA as $iMIA => $sMIA) {
                if (!isset($aSpecifics[$iMIA])) continue;
                $Spec = $aSpecifics[$iMIA];
                $Arg = $this->GetInstructionArgument($Index, $iMIA);
                switch ($Spec) {
                    case ITVS_DontCare:
                    default:
                        break;
                    case ITVS_Valid:
                        if ($iMIA == MIA_Data) {
                            $Data = $Arg;
                            $Len = strlen($Data);
                            switch ($Type) {
                                case 13:
                                case 14:
                                case 15:
                                case 40:
                                    $Serial = substr($Data, 0, 16);
                                    $Span = strspn($Serial, '0123456789ABCDEF');
                                    $Result = Check1WireSerialNumber(strtoupper($Serial));
                                    if ($Result != 1) {
                                        if ($Result == -1) $raWarnings[] = "Index $Index$Name: $sMIA first 16 characters '$Serial' seems to be a serial number in wrong byte order (perhaps you mean " . ByteSwap1WireSerialNumber(strtoupper($Serial)) . ')'; else if ($Span != 16) $raWarnings[] = "Index $Index$Name: $sMIA first 16 characters '$Serial' are not all in upper case"; else $raWarnings[] = "Index $Index$Name: $sMIA first 16 characters '$Serial' are not a valid serial number in upper case HEX character bytes";
                                    } else if ($Span != 16) $raWarnings[] = "Index $Index$Name: $sMIA the serial number '$Serial' is not fully in upper case";
                                    for ($i = 16; $i < 42; $i += 13) {
                                        if ($Len <= $i) break;
                                        $Serial = substr($Data, $i + 1, 12);
                                        if ((strlen($Serial) != 12) || (strspn($Serial, '0123456789abcdefABCDEF') != 12)) $raWarnings[] = "Index $Index$Name: $sMIA contains more than $i characters, while the serial number '$Serial' that follows after the separator is not the middle 12 characters of another serial number"; else if (strspn($Serial, "0123456789ABCDEF") != 12) $raWarnings[] = "Index $Index$Name: $sMIA the additional middle 12 serial number characters '$Serial' are not all in upper case";
                                    }
                                    break;
                                case 50:
                                    break;
                                case 51:
                                case 52:
                                case 53:
                                    if (!$Len) $raErrors[] = "Index $Index$Name: $sMIA does not contain SSID";
                                    break;
                                case 61:
                                case 62:
                                case 63:
                                    for ($i = 0; $i < $Len; $i++) if (($i + 1) % 3) {
                                        if (strspn($Data, '0123456789abcdef', $i, 1) != 1) break;
                                    } else if ($Data[$i] != ':') break;
                                    if (($Len != 17) || ($i != $Len)) $raErrors[] = "Index $Index$Name: $sMIA does not contain BSSID in lower case hex with semicolons like: \"1a:2b:3c:4d:5e:6f\"";
                                    break;
                                case 69:
                                    for ($i = $Index; ;) {
                                        if ($i > 1) switch ($this->GetInstructionArgument(--$i, MIA_Type)) {
                                            case 52:
                                            case 62:
                                                if ($Index - $i > 4) $i = 1; else if (!$Len || ($Len != 14) || (substr($Data, 0, 2) != sprintf('%d=', $Index - $i)) || (strspn($Data, '0123456789abcdefABCDEF', 2) != 12)) $raErrors[] = "Index $Index$Name: $sMIA does not contain proper WEP key part formatted like: " . sprintf('"%d=1a2B3c4D5e6F"', $Index - $i);
                                                break;
                                            case 53:
                                            case 63:
                                                if ($Index - $i > 1) $i = 1; else if (!$Len) $raErrors[] = "Index $Index$Name: $sMIA does not contain WPA/WPA2 pass-word/phrase";
                                                break;
                                            default:
                                                continue 2;
                                        }
                                        if ($i <= 1) $raWarnings[] = "Index $Index$Name: MIA_Type 69 instruction slot only useful for preceeding one that require it";
                                        break;
                                    }
                                    break;
                                default:
                                    if (($Type >= 16) && ($Type <= 31)) {
                                        $Pos = strpos($Data, '%U');
                                        if (($Pos === false) || ($Pos + 4 > $Len)) $raWarnings[] = "Index $Index$Name: $sMIA does not contain user variable (%U..) to edit";
                                    }
                                    break;
                            }
                        }
                        break;
                    case ITVS_ACTION_Ignored:
                        if ($Arg) $raWarnings[] = "Index $Index$Name: $sMIA should be disabled (not $Arg but 0)";
                        break;
                    case ITVS_ACTION_Allowed:
                    case ITVS_ACTION_AllowedIndex:
                        if (!$Arg) break;
                    case ITVS_ACTION_Index:
                    case ITVS_ACTION_IndexAndNext:
                        if (isset($aDefTypeIndexes[$Arg])) $raErrors[] = "Index $Index$Name: $sMIA is set to jump to Index $Arg which the current code sets to a non executable definition Type (" . $aDefTypeIndexes[$Arg] . ")";
                        if (($Arg >= 1) && ($Arg <= 300)) {
                            if (isset($aDisabledIndexes[$Arg])) $raErrors[] = "Index $Index$Name: $sMIA is set to jump to Index $Arg which the current code sets to a disabled/cleared Type (0)"; else if (!$this->IsIndexInUse($Arg)) $raWarnings[] = "Index $Index$Name: $sMIA is set to jump to Index $Arg which is not defined in the current code"; else if ($Arg == $Index) $raWarnings[] = "Index $Index$Name: $sMIA is set to jump to its own Index $Arg";
                            if ($Spec == ITVS_ACTION_IndexAndNext) {
                                if ($Arg != 300) {
                                    if (isset($aDisabledIndexes[$Arg + 1])) $raErrors[] = "Index $Index$Name: $sMIA is set to jump to alternative Index jump $Arg+1 which the current code sets to a disabled/cleared Type (0)"; else if (!$this->IsIndexInUse($Arg + 1)) $raWarnings[] = "Index $Index$Name: $sMIA is set to alternative Index jump $Arg+1 which is not defined in the current code"; else if ($Arg + 1 == $Index) $raWarnings[] = "Index $Index$Name: $sMIA is set to alternative Index jump $Arg+1 which is its own Index";
                                } else $raErrors[] = "Index $Index$Name: $sMIA is set to alternative Index jump $Arg+1 which is not a valid Index";
                            }
                            break;
                        }
                        if ($Spec != ITVS_ACTION_Allowed) {
                            $raErrors[] = "Index $Index$Name: $sMIA is set to an invalid Index jump ($Arg)";
                            break;
                        }
                    case ITVS_ACTION_AllowedAction:
                        if (!$Arg) break;
                        if ($Arg <= 300) $raErrors[] = "Index $Index$Name: $sMIA is set to an invalid action ($Arg)";
                        break;
                    case ITVS_TIMEOUTUNITS_Disabled:
                        if ($Arg != 255) $raErrors[] = "Index $Index$Name: $sMIA must be disabled (not $Arg but 255)";
                        break;
                    case ITVS_TIMEOUTUNITS_Automatic:
                        if ($Arg != 255) $raErrors[] = "Index $Index$Name: $sMIA must be automatic (not $Arg but 255)";
                        break;
                    case ITVS_TIMEOUTUNITS_Ignored:
                        if ($Arg != 255) $raWarnings[] = "Index $Index$Name: $sMIA should be disabled (not $Arg but 255)";
                        break;
                    case ITVS_TIMEOUTUNITS_Allowed:
                        if (!$this->GetInstructionArgument($Index, MIA_Timeout)) {
                            if ($Arg != 255) $raWarnings[] = "Index $Index$Name: $sMIA should be disabled and not a timeout in seconds when MIA_Timeout is disabled too (not $Arg but 255)";
                        } else if ($Arg == 255) $raWarnings[] = "Index $Index$Name: $sMIA should be set to a timeout in seconds when MIA_Timeout is set to jump to an Index (not $Arg but 1..254)";
                        break;
                }
            }
        }
        if (count($raErrors) || count($raWarnings)) return true;
        return false;
    }

    function RemoveDisabledInstructions()
    {
        $Removed = 0;
        foreach ($this->Instructions as $Index => $Instruction) {
            if (!isset($Instruction[MIA_Type])) continue;
            $Type = $Instruction[MIA_Type];
            if ($Type > 0) continue;
            if (isset($Instruction[MIA_Data]) && strlen($Instruction[MIA_Data])) continue;
            unset($this->Instructions[$Index]);
            $Removed++;
        }
        return $Removed;
    }

    function RemoveBlankUserVariableInitialisations()
    {
        $Removed = 0;
        foreach ($this->Variables as $Variable => $Contents) {
            if (strlen($Contents)) continue;
            unset($this->Variables[$Variable]);
            $Removed++;
        }
        return $Removed;
    }
}

;
function Check1WireSerialNumber($SerialNumber)
{
    $s = $SerialNumber;
    if ((strlen($s) == 16) && (strspn($s, '0123456789ABCDEF') == 16)) for ($r = 1; $r >= -1; $r -= 2) {
        $c = 0;
        for ($o = 0; $o < 14; $o += 2) {
            $b = hexdec(substr($s, $o, 2));
            {
                $i = $b ^ $c;
                $c = 0;
                if ($i & 1) $c ^= 0x5e;
                if ($i & 2) $c ^= 0xbc;
                if ($i & 4) $c ^= 0x61;
                if ($i & 8) $c ^= 0xc2;
                if ($i & 0x10) $c ^= 0x9d;
                if ($i & 0x20) $c ^= 0x23;
                if ($i & 0x40) $c ^= 0x46;
                if ($i & 0x80) $c ^= 0x8c;
            }
        }
        if ($c == hexdec(substr($s, 14, 2))) return $r;
        $s = ByteSwap1WireSerialNumber($SerialNumber);
    }
    return 0;
}

function ByteSwap1WireSerialNumber($SerialNumber)
{
    if ((strlen($SerialNumber) != 16) || (strspn($SerialNumber, '0123456789ABCDEF') != 16)) return $SerialNumber;
    $s = '';
    for ($o = 14; $o >= 0; $o -= 2) $s .= substr($SerialNumber, $o, 2);
    return $s;
}

return ('included'); ?>
