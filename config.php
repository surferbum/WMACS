<?php
/* -----------------INFORMATION & LICENSING-----------------
 * 
 *      AUTHOR: Christopher Sparrowgrove
 *      E-MAIL: developers@sparrowgrove.com
 *     WEBSITE: http://christopher.sparrowgrove.com
 *        DATE: JULY 8, 2011
 * DESCRIPTION: Global Configuration File
 *     LICENSE: See Included File or E-mail Developer for Copy
 *   COPYRIGHT: ©Copyright 2011 - All Rights Reserved   
 *      
 */
//Default Pages
$home_pge = "home.php";
$down_pge = "down.php";

//MYSQL CONFIGURATION
$mysql_host = "localhost";              $mysql_user = "user";      $mysql_pass = "pass";
$mysql_database = "database";           $mysql_table = "table";    $mysql_port = "3306";//default
    

$wmacs = "disabled"; //WMACS Database Support Override: Make sure to set the below switch if disabled
$switch = "0"; // Check README file for valid status numbers and what they do

//-----------------------------------\\
      //.....................\\
     //.......................\\
    //DONT CHANGE ANYTHING ELSE\\
   //DO NOT EDIT AFTER THIS LINE\\
  //DO NOT MODIFY BELOW THIS LINE\\
 //DO NOT MODIFY BEYOND THIS POINT\\
//.................................\\
$VALID_STATUS = array('0', '1', '2', '3'); //Valid Status Codes.

if ($wmacs == 'disabled') //If WMACS is disabled the below code uses the swith method set above override
{
    $status = $switch;
}
else //If WMACS is enabled the database method will be used
{
    //MYSQLi Database Connect
    $dbconnect = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_database, $mysql_port);
    if($dbconnect->connect_error) 
    {
        //If connection failed set status to 2 and exit 
        $status = "2";
        exit();
    }
    else //If connection was successful continue
    {
        //The below can be configured by experienced developers
        $query = "SELECT * FROM $mysql_table"; 
        $data = $dbconnect->prepare($query);
        $data->bind_result($id, $srv_name, $admin, $email, $status);
	    $data->execute(); 
	    while($data->fetch())
            {
                $_SESSION['id'] = $id;
                $_SESSION['srv_name'] = $srv_name;
                $_SESSION['admin'] = $admin;
                $_SESSION['e-mail'] = $email;
                $_SESSION['status'] = $status;
            }
    }
}
?>
