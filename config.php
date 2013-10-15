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

if ($wmacs == 'enabled')
{
    //MYSQLi Database Connect
    $dbconnect = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_database, $mysql_port);
    if($dbconnect->connect_error) //if connection failed status to 2 and exit 
    {
        $status = "2";
        exit();
    }
    else
    {
        $query = "SELECT * FROM $mysql_table"; 
        $data = $dbconnect->prepare($query);
        $data->bind_result($id, $srv_name, $url, $admin, $email, $status, $status_msg, $version, $copyright_label, $copyright_link, $created_date, $modified_date, $last_user);
	    $data->execute(); 
	    while($data->fetch())
            {
                $_SESSION['id'] = $id;
                $_SESSION['srv_name'] = $srv_name;
                $_SESSION['url'] = $url;
                $_SESSION['admin'] = $admin;
                $_SESSION['e-mail'] = $email;
                $_SESSION['status'] = $status;
                $_SESSION['status_msg'] = $status_msg;
                $_SESSION['version'] = $version;
                $_SESSION['copyright_label'] = $copyright_label;
                $_SESSION['copyright_link'] = $copyright_link;
                $_SESSION['created_date'] = $created_date;
                $_SESSION['modified'] = $modified_date; 
                $_SESSION['last_user'] = $last_user;
            }
    }
}
else{$status = $switch;} //If orride is selected this will be processed.
?>