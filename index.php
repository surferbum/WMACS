<?php
/* -----------------INFORMATION & LICENSING-----------------
 * 
 *      AUTHOR: Christopher Sparrowgrove
 *      E-MAIL: developers@sparrowgrove.com
 *     WEBSITE: https://github.com/nam2long/WMACS
 *        DATE: JULY 8, 2011
 *        NAME: WMACS (Website Maintenance and Avilability Checking System)
 * DESCRIPTION: See README file
 *     LICENSE: See Included File or E-mail Developer for Copy
 *   COPYRIGHT: ©Copyright 2011 - All Rights Reserved   
 *      
 */
require_once('config.php'); //Global Configurations Script

//Website Maintenance and Availability Checking System
if (in_array($status, $VALID_STATUS)) //SECURITY: check for valid status
{
    //If a vaild status is given a switch operator will take over
    switch($status)
    {
        case 0: //Operational Mode
            include ($home_pge);
            break;
    case 1||2||3: //Other Modes
            include($down_pge);
            break; 		
    }
    //Script will Exit here and not display anything below
    exit();
}
//If an invalid status is given then this error will be displayed
echo "There is an error with the server. Please notify an admin and mention an invalid status";
?>