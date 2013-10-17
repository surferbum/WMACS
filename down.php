<?PHP
/* -----------------INFORMATION & LICENSING-----------------
 * 
 *      AUTHOR: Christopher Sparrowgrove
 *      E-MAIL: developers@sparrowgrove.com
 *     WEBSITE: http://christopher.sparrowgrove.com
 *        DATE: JULY 8, 2011
 * DESCRIPTION: This script handels the different status setings and messages
 *     LICENSE: See Included File or E-mail Developer for Copy
 *   COPYRIGHT: ©Copyright 2011 - All Rights Reserved   
 *      
 */

$status = $_SESSION['status']; //Grabs status value from config and assigns it to $status var
         
        //Switch Operator for dynamicly assigning a status message to be displayed
         switch($status)
         {
                case 0: //Opperational Mode (Online Mode)
                echo "STATUS: Online<BR />";
                echo $_SERVER['SERVER_NAME']." is operating normaly";
                break;
                
                case 1: //Construction Mode
                echo "STATUS: Under Construction<BR />";
                echo $_SERVER['SERVER_NAME']." is under construction";
                break;
                
                case 2: //Offline Mode
                echo "STATUS: ERROR<BR />";
                echo $_SERVER['SERVER_NAME']." is having trouble connecting to the database";
                break;
         
                case 3: //Offline Mode
                echo "STATUS: Offline<BR />";
                echo $_SERVER['SERVER_NAME']." is currently offline";
                break;
                
                default:
                echo "Invalid Status: The site may be temporaily down";
        }
?>  