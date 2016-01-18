<?php
include "header.php";
if (isset($_POST['requestId'])) {
   $requestId = $_POST['requestId'];
    //$bid = $_POST['bid'];
    //$driverId = $_POST['driverId'];
    $id = $_SESSION['userId'];
    
    $queryup = mysql_query("UPDATE `taxiapp`.`hire_request` SET `completed` = '1' WHERE `hire_request`.`request_id` = '$requestId'");
    
    $query = mysql_query("SELECT `driver_id`,`name`,`request_id`,`bid` FROM driverbid NATURAL JOIN driver WHERE request_id = '$requestId' AND request_id IN (SELECT request_id FROM hire_request NATURAL JOIN passenger WHERE `passenger`.`contact_no` = '$id')");
      while($row = mysql_fetch_array($query)){ // display all rows  from query
		$driverName = $row['name'];
		$driverId = $row['driver_id'];
		$bid = $row['bid'];
       
    }
    
    $result = mysql_query("INSERT INTO `taxiapp`.`tour` ( `charge`, `driver_id`, `request_id`) VALUES ( '$bid', '$driverId', '$requestId')");
}

?>